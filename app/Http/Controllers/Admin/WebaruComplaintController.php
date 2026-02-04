<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebaruComplaintCase;
use App\Models\WebaruComplaintCaseLog;
use App\Models\WebaruComplaintDocument;
use App\Models\User;
use App\Mail\ComplaintUpdateMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class WebaruComplaintController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin', 'verified']);
    }

    public function index()
    {
        $filters = [
            'type'       => request('type'),
            'status'     => request('status'),
            'start_date' => request('start_date'),
            'end_date'   => request('end_date'),
            'q'          => request('q'),
        ];

        $query = WebaruComplaintCase::query()
            ->where('type_code', '!=', 'DIRECT');

        if (!empty($filters['type'])) {
            $query->where('type_code', $filters['type']);
        }

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (!empty($filters['start_date'])) {
            $query->whereDate('created_at', '>=', $filters['start_date']);
        }

        if (!empty($filters['end_date'])) {
            $query->whereDate('created_at', '<=', $filters['end_date']);
        }

        if (!empty($filters['q'])) {
            $q = $filters['q'];
            $query->where(function ($sub) use ($q) {
                $sub->where('case_no', 'like', '%' . $q . '%')
                    ->orWhere('subject', 'like', '%' . $q . '%')
                    ->orWhere('contact_name', 'like', '%' . $q . '%')
                    ->orWhere('contact_phone', 'like', '%' . $q . '%')
                    ->orWhere('contact_email', 'like', '%' . $q . '%');
            });
        }

        $stats = [
            'total'        => WebaruComplaintCase::where('type_code', '!=', 'DIRECT')->count(),
            'pending'      => WebaruComplaintCase::where('type_code', '!=', 'DIRECT')->where('status', 'NEW')->count(),
            'investigating'=> WebaruComplaintCase::where('type_code', '!=', 'DIRECT')->where('status', 'IN_PROGRESS')->count(),
            'closed'       => WebaruComplaintCase::where('type_code', '!=', 'DIRECT')->where('status', 'CLOSED')->count(),
        ];

        $cases = $query->orderByDesc('created_at')
            ->paginate(20)
            ->withQueryString();

        return view('admin.2025_webaru_complaint_all_grid', compact('stats', 'cases', 'filters'));
    }

    public function dashboard()
    {
        $statusCounts = WebaruComplaintCase::select('status', DB::raw('COUNT(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        $typeCounts = WebaruComplaintCase::select('type_code', DB::raw('COUNT(*) as total'))
            ->groupBy('type_code')
            ->pluck('total', 'type_code');

        $priorityCounts = WebaruComplaintCase::select('priority', DB::raw('COUNT(*) as total'))
            ->groupBy('priority')
            ->pluck('total', 'priority');

        $monthStart = Carbon::now()->subMonths(5)->startOfMonth();
        $rawMonthly = WebaruComplaintCase::select(
                DB::raw("DATE_FORMAT(created_at, '%Y-%m') as ym"),
                DB::raw('COUNT(*) as total')
            )
            ->where('created_at', '>=', $monthStart)
            ->groupBy('ym')
            ->orderBy('ym')
            ->pluck('total', 'ym');

        $monthlyCounts = collect();
        for ($i = 0; $i < 6; $i++) {
            $key = $monthStart->copy()->addMonths($i)->format('Y-m');
            $monthlyCounts[$key] = (int) ($rawMonthly[$key] ?? 0);
        }

        $recentCases = WebaruComplaintCase::orderByDesc('created_at')
            ->limit(8)
            ->get();

        $stats = [
            'total' => WebaruComplaintCase::count(),
            'new' => (int) ($statusCounts['NEW'] ?? 0),
            'in_progress' => (int) ($statusCounts['IN_PROGRESS'] ?? 0),
            'need_info' => (int) ($statusCounts['NEED_INFO'] ?? 0),
            'closed' => (int) ($statusCounts['CLOSED'] ?? 0),
            'rejected' => (int) ($statusCounts['REJECTED'] ?? 0),
        ];

        return view('admin.2025_webaru_complaint_dashboard', [
            'stats' => $stats,
            'statusCounts' => $statusCounts,
            'typeCounts' => $typeCounts,
            'priorityCounts' => $priorityCounts,
            'monthlyCounts' => $monthlyCounts,
            'recentCases' => $recentCases,
        ]);
    }

    public function show(WebaruComplaintCase $case)
    {
        $case->load(['attachments', 'logs', 'assignee']);
        $assignees = User::orderBy('name')->get();

        return view('admin.2025_webaru_complaint_all_detail', compact('case', 'assignees'));
    }

    public function update(Request $request, WebaruComplaintCase $case)
    {
        $validated = $request->validate([
            'assigned_to'  => 'nullable|exists:users,id',
            'status'       => 'required|in:NEW,IN_PROGRESS,NEED_INFO,CLOSED,REJECTED',
            'priority'     => 'required|in:LOW,NORMAL,HIGH,URGENT',
            'internal_note'=> 'nullable|string',
            'public_reply' => 'nullable|string',
            'notify'       => 'nullable|boolean',
        ]);

        $originalStatus = $case->status;
        $originalPriority = $case->priority;
        $originalAssignee = $case->assigned_to;

        $case->assigned_to = $validated['assigned_to'] ?? null;
        $case->status = $validated['status'];
        $case->priority = $validated['priority'];
        $case->updated_by = auth()->id();

        if ($originalStatus !== $case->status) {
            if ($case->status === 'CLOSED' && $case->closed_at === null) {
                $case->closed_at = now();
            }
            if ($case->status !== 'CLOSED') {
                $case->closed_at = null;
            }
        }

        if (!empty($validated['public_reply'])) {
            $case->answered_at = now();
        }

        $case->save();

        if ($originalStatus !== $case->status) {
            WebaruComplaintCaseLog::create([
                'case_id'    => $case->id,
                'action'     => 'status_changed',
                'from_status'=> $originalStatus,
                'to_status'  => $case->status,
                'remark'     => 'เปลี่ยนสถานะโดยผู้ดูแลระบบ',
                'is_public'  => false,
                'meta'       => json_encode(['updated_by' => auth()->id()]),
                'created_by' => auth()->id(),
                'created_ip' => $request->ip(),
            ]);
        }

        if ($originalPriority !== $case->priority || $originalAssignee !== $case->assigned_to) {
            WebaruComplaintCaseLog::create([
                'case_id'    => $case->id,
                'action'     => 'updated',
                'remark'     => 'ปรับข้อมูลการดูแลเรื่อง',
                'is_public'  => false,
                'meta'       => json_encode([
                    'priority'    => $case->priority,
                    'assigned_to' => $case->assigned_to,
                ]),
                'created_by' => auth()->id(),
                'created_ip' => $request->ip(),
            ]);
        }

        if (!empty($validated['internal_note'])) {
            WebaruComplaintCaseLog::create([
                'case_id'    => $case->id,
                'action'     => 'internal_note',
                'remark'     => $validated['internal_note'],
                'is_public'  => false,
                'created_by' => auth()->id(),
                'created_ip' => $request->ip(),
            ]);
        }

        if (!empty($validated['public_reply'])) {
            WebaruComplaintCaseLog::create([
                'case_id'    => $case->id,
                'action'     => 'reply',
                'remark'     => $validated['public_reply'],
                'is_public'  => (bool) ($validated['notify'] ?? false),
                'created_by' => auth()->id(),
                'created_ip' => $request->ip(),
            ]);
        }

        $shouldNotify = !empty($validated['notify']);
        if ($shouldNotify && !$case->is_anonymous && !empty($case->contact_email) && !empty($validated['public_reply'])) {
            Mail::to($case->contact_email)->send(new ComplaintUpdateMail($case, $validated['public_reply']));
        }

        return redirect()
            ->route('admin.webaru-complaints.show', $case)
            ->with('success', 'บันทึกการจัดการเรื่องเรียบร้อยแล้ว');
    }

    public function destroy(WebaruComplaintCase $case)
    {
        $case->load('attachments');

        DB::transaction(function () use ($case) {
            foreach ($case->attachments as $attachment) {
                $path = $attachment->file_path ?? '';
                if (!empty($path) && Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
                $attachment->delete();
            }

            $caseFolder = '2025_webaru_complaints/' . $case->id;
            if (Storage::disk('public')->exists($caseFolder)) {
                Storage::disk('public')->deleteDirectory($caseFolder);
            }

            $case->logs()->delete();
            $case->delete();
        });

        return redirect(url('admin/webaru-complaints-grid'))
            ->with('success', 'ลบเรื่องร้องเรียนเรียบร้อยแล้ว');
    }

    public function deleteLog(WebaruComplaintCase $case, WebaruComplaintCaseLog $log)
    {
        if ($log->case_id !== $case->id) {
            return redirect()
                ->route('admin.webaru-complaints.show', $case)
                ->with('fail', 'ไม่พบรายการที่ต้องการลบ');
        }

        $log->delete();

        return redirect()
            ->route('admin.webaru-complaints.show', $case)
            ->with('success', 'ลบรายการประวัติเรียบร้อยแล้ว');
    }

    public function documentIndex()
    {
        $documents = WebaruComplaintDocument::query()
            ->orderBy('category')
            ->orderBy('sort_order')
            ->orderByDesc('fiscal_year')
            ->paginate(20);

        return view('admin.2025_webaru_complaint_documents', compact('documents'));
    }

    public function documentStore(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|in:report,manual,form',
            'title' => 'required|string|max:255',
            'fiscal_year' => 'nullable|integer|min:2000|max:3000',
            'report_quarter' => 'nullable|integer|min:1|max:4',
            'agency' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'sort_order' => 'nullable|integer|min:0',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
            'is_active' => 'nullable|boolean',
        ]);

        $file = $request->file('file');
        $extension = strtolower($file->getClientOriginalExtension());
        $fileName = 'doc_' . Str::lower(Str::random(8)) . '.' . $extension;
        $filePath = $file->storeAs('2025_webaru_complaints/documents', $fileName, 'public');

        WebaruComplaintDocument::create([
            'category' => $validated['category'],
            'title' => $validated['title'],
            'fiscal_year' => $validated['fiscal_year'] ?? null,
            'report_quarter' => $validated['report_quarter'] ?? null,
            'agency' => $validated['agency'] ?? null,
            'file_url' => $filePath,
            'file_type' => $extension,
            'published_at' => $validated['published_at'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect(url('admin/webaru-complaint-documents'))
            ->with('success', 'เพิ่มเอกสารเรียบร้อยแล้ว');
    }

    public function documentUpdate(Request $request, WebaruComplaintDocument $document)
    {
        $validated = $request->validate([
            'category' => 'required|in:report,manual,form',
            'title' => 'required|string|max:255',
            'fiscal_year' => 'nullable|integer|min:2000|max:3000',
            'report_quarter' => 'nullable|integer|min:1|max:4',
            'agency' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'sort_order' => 'nullable|integer|min:0',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = strtolower($file->getClientOriginalExtension());
            $fileName = 'doc_' . Str::lower(Str::random(8)) . '.' . $extension;
            $filePath = $file->storeAs('2025_webaru_complaints/documents', $fileName, 'public');

            $oldPath = $document->file_url;
            if (!empty($oldPath) && Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }

            $document->file_url = $filePath;
            $document->file_type = $extension;
        }

        $document->category = $validated['category'];
        $document->title = $validated['title'];
        $document->fiscal_year = $validated['fiscal_year'] ?? null;
        $document->report_quarter = $validated['report_quarter'] ?? null;
        $document->agency = $validated['agency'] ?? null;
        $document->published_at = $validated['published_at'] ?? null;
        $document->sort_order = $validated['sort_order'] ?? 0;
        $document->is_active = $request->boolean('is_active');
        $document->save();

        return redirect(url('admin/webaru-complaint-documents'))
            ->with('success', 'อัปเดตเอกสารเรียบร้อยแล้ว');
    }

    public function documentDestroy(WebaruComplaintDocument $document)
    {
        $path = $document->file_url;
        if (!empty($path) && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        $document->delete();

        return redirect(url('admin/webaru-complaint-documents'))
            ->with('success', 'ลบเอกสารเรียบร้อยแล้ว');
    }
}
