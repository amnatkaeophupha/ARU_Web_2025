<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use App\Models\WebaruComplaintCase;
use App\Models\WebaruComplaintAttachment;
use App\Models\WebaruComplaintCaseLog;
use App\Mail\ComplaintUpdateMail;
use App\Mail\ComplaintDirectMail;
use App\Models\WebaruComplaintDocument;

class WebaruComplaintPublicController extends Controller
{
    /**
     * หน้าแบบฟอร์ม
     */

    public function index()
    {
        $baseQuery = WebaruComplaintDocument::query()
            ->where('is_active', true)
            ->orderBy('sort_order');

        $manuals = (clone $baseQuery)
            ->where('category', 'manual')
            ->orderByDesc('fiscal_year')
            ->get();

        $reports = (clone $baseQuery)
            ->where('category', 'report')
            ->orderByDesc('fiscal_year')
            ->get();

        $forms = (clone $baseQuery)
            ->where('category', 'form')
            ->get();

        return view('webaru_bs5.complaints.index', [
            'manuals' => $manuals,
            'reports' => $reports,
            'forms' => $forms,
        ]);
    }

    public function create(string $type)
    {
        $map = [
            'grievance'  => 'GRIEVANCE',
            'opinion'    => 'OPINION',
            'corruption' => 'CORRUPTION',
            'direct'     => 'DIRECT',
        ];

        $typeCode = $map[strtolower($type)] ?? 'GRIEVANCE';

        return view('webaru_bs5.complaints.create', [
            'type' => $typeCode
        ]);
    }

    /**
     * บันทึกเรื่องร้องเรียน
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type_code' => 'required|in:GRIEVANCE,OPINION,CORRUPTION,DIRECT',

            'subject'   => 'required|string|max:255',
            'detail'    => 'required|string',

            'priority'  => 'required|in:LOW,NORMAL,HIGH,URGENT',

            'is_anonymous' => 'required|boolean',

            'contact_name'  => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:50',
            'contact_email' => 'nullable|email|max:255',

            'attachment' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',

            'pdpa_accept' => 'required|accepted',
            'consent'     => 'required|accepted',
        ]);

        // rule เสริมตาม type
        if ($validated['type_code'] === 'DIRECT') {
            $request->validate([
                'contact_name'  => 'required|string|max:255',
                'contact_phone' => 'required|string|max:50',
            ]);
            // เอาค่าที่ validate ซ้ำมาอัปเดตใส่ validated
            $validated['contact_name']  = $request->input('contact_name');
            $validated['contact_phone'] = $request->input('contact_phone');
        }

        // OPINION: ล็อก priority ฝั่ง server
        if ($validated['type_code'] === 'OPINION') {
            $validated['priority'] = 'NORMAL';
        }

        // anonymous: ล้างข้อมูลติดต่อ
        if ($validated['is_anonymous']) {
            $validated['contact_name']  = null;
            $validated['contact_phone'] = null;
            $validated['contact_email'] = null;
        }

        $reverseMap = [
            'GRIEVANCE'  => 'grievance',
            'OPINION'    => 'opinion',
            'CORRUPTION' => 'corruption',
            'DIRECT'     => 'direct',
        ];

        return DB::transaction(function () use ($request, $validated, $reverseMap) {

            $plainPin = random_int(100000, 999999);

            // ✅ ใส่ case_no ชั่วคราวที่ไม่ซ้ำแน่นอน (กันชน unique)
            $tempCaseNo = 'TEMP-' . uniqid();

            $case = WebaruComplaintCase::create([
                'case_no'   => $tempCaseNo,
                'pin_hash'  => Hash::make($plainPin),

                'type_code' => $validated['type_code'],
                'channel'   => 'WEB',

                'subject'   => $validated['subject'],
                'detail'    => $validated['detail'],

                'priority'  => $validated['priority'],
                'status'    => 'NEW',

                'is_anonymous' => $validated['is_anonymous'],
                'contact_name' => $validated['contact_name'],
                'contact_phone'=> $validated['contact_phone'],
                'contact_email'=> $validated['contact_email'],

                'submitted_ip'         => $request->ip(),
                'submitted_user_agent' => $request->userAgent(),
            ]);

            // ✅ update case_no จริงจาก id (ปลอดภัยจาก race condition)
            $year = now()->format('Y');
            $caseNo = 'ARU-' . $year . '-' . str_pad((string)$case->id, 6, '0', STR_PAD_LEFT);
            $case->update(['case_no' => $caseNo]);

            WebaruComplaintCaseLog::create([
                'case_id'    => $case->id,
                'action'     => 'created',
                'to_status'  => 'NEW',
                'remark'     => 'ระบบรับเรื่องร้องเรียนเรียบร้อย',
                'is_public'  => true,
                'created_ip' => $request->ip(),
            ]);

            $attachedPaths = [];

            if ($request->hasFile('attachment')) {
                $file = $request->file('attachment');
                $extension = $file->getClientOriginalExtension();
                $shortName = Str::random(16) . ($extension ? '.' . $extension : '');
                $path = $file->storeAs('2025_webaru_complaints/' . $case->id, $shortName, 'public');

                WebaruComplaintAttachment::create([
                    'case_id'       => $case->id,
                    'original_name' => $file->getClientOriginalName(),
                    'file_name'     => $shortName,
                    'file_path'     => $path,
                    'mime_type'     => $file->getMimeType(),
                    'file_size'     => $file->getSize(),
                    'sha256'        => hash_file('sha256', $file->getRealPath()),
                ]);

                $attachedPaths[] = $path;
            }

            if ($validated['type_code'] === 'DIRECT') {
                $rectorEmail = env('RECTOR_EMAIL');
                if (!empty($rectorEmail)) {
                    $labelStyle = 'color:#a01d29; font-weight:600;';
                    $valueStyle = 'color:#1f2a37;';
                    $messageText = "<span style=\"{$labelStyle}\">เรื่องสายตรงอธิการเลขที่</span> "
                        . "<span style=\"{$valueStyle}\">{$caseNo}</span>"
                        . "<br><span style=\"{$labelStyle}\">หัวข้อ:</span> "
                        . "<span style=\"{$valueStyle}\">{$case->subject}</span>"
                        . "<br><span style=\"{$labelStyle}\">รายละเอียด:</span> "
                        . "<span style=\"{$valueStyle}\">{$case->detail}</span>";
                    Mail::to($rectorEmail)
                        ->send(new ComplaintDirectMail($case, $messageText, $attachedPaths));
                }
            }

            return redirect()
                ->route('complaint.success')
                ->with('success', 'ส่งเรื่องเรียบร้อย')
                ->with('type_code', $validated['type_code'])
                ->with('case_no', $caseNo)
                ->with('pin', $plainPin);
        });
    }

    /**
     * หน้านโยบายความเป็นส่วนตัว
     */
    public function privacy()
    {
        return view('webaru_bs5.complaints.privacy-policy');
    }

    public function success()
    {
        // ถ้าเข้าหน้านี้โดยไม่มี session (เช่น refresh หรือพิมพ์ url เอง)
        // จะไม่มี case_no/pin -> ให้กลับหน้าเริ่มต้น
        if (!session()->has('case_no')) {
            return redirect()->route('complaint.create', ['type' => 'grievance']);
        }

        return view('webaru_bs5.complaints.success', [
            'case_no'   => session('case_no'),
            'pin'       => session('pin'),
            'type_code' => session('type_code'),
        ]);
    }

    public function tracking(Request $request)
    {
        $caseNo = trim((string) $request->query('case_no', ''));
        $pin = trim((string) $request->query('pin', ''));

        $data = [
            'caseNo' => $caseNo,
            'pin' => $pin,
            'hasQuery' => ($caseNo !== '' || $pin !== ''),
            'case' => null,
            'publicLogs' => collect(),
            'error' => null,
        ];

        if (!$data['hasQuery']) {
            return view('webaru_bs5.complaints.tracking', $data);
        }

        $validated = $request->validate([
            'case_no' => 'required|string|max:40',
            'pin'     => 'required|string|max:12',
        ]);

        $case = WebaruComplaintCase::where('case_no', $validated['case_no'])->first();

        if (!$case || !Hash::check($validated['pin'], $case->pin_hash)) {
            $data['error'] = 'ไม่พบข้อมูลหรือรหัสติดตามไม่ถูกต้อง';
            return view('webaru_bs5.complaints.tracking', $data);
        }

        $case->load('logs');

        $data['case'] = $case;
        $data['publicLogs'] = $case->publicLogs()->get();

        return view('webaru_bs5.complaints.tracking', $data);
    }

}
