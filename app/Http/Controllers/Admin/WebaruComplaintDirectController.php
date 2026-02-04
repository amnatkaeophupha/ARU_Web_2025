<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebaruComplaintCase;
use App\Models\User;
use App\Models\WebaruComplaintCaseLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ComplaintUpdateMail;

class WebaruComplaintDirectController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin', 'verified']);
    }

    public function index(Request $request)
    {
        $filters = [
            'status' => $request->query('status'),
            'start_date' => $request->query('start_date'),
            'q' => $request->query('q'),
        ];

        $query = WebaruComplaintCase::query()
            ->where('type_code', 'DIRECT');

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (!empty($filters['start_date'])) {
            $query->whereDate('created_at', '>=', $filters['start_date']);
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
            'total' => WebaruComplaintCase::where('type_code', 'DIRECT')->count(),
            'pending' => WebaruComplaintCase::where('type_code', 'DIRECT')->where('status', 'NEW')->count(),
            'investigating' => WebaruComplaintCase::where('type_code', 'DIRECT')->where('status', 'IN_PROGRESS')->count(),
            'closed' => WebaruComplaintCase::where('type_code', 'DIRECT')->where('status', 'CLOSED')->count(),
        ];

        $cases = $query->orderByDesc('created_at')
            ->paginate(20)
            ->withQueryString();

        return view('admin.2025_webaru_complaint_direct_grid', compact('stats', 'cases', 'filters'));
    }

    public function show(WebaruComplaintCase $case)
    {
        if ($case->type_code !== 'DIRECT') {
            return redirect(url('admin/webaru-complaint-direct-grid'));
        }

        $case->load(['attachments', 'logs', 'assignee']);
        $assignees = User::orderBy('name')->get();

        $statusLabels = [
            'NEW'         => ['label' => 'ใหม่', 'class' => 'badge bg-warning text-dark'],
            'IN_PROGRESS' => ['label' => 'กำลังดำเนินการ', 'class' => 'badge bg-info'],
            'NEED_INFO'   => ['label' => 'รอข้อมูลเพิ่มเติม', 'class' => 'badge bg-secondary'],
            'CLOSED'      => ['label' => 'ปิดเรื่อง', 'class' => 'badge bg-success'],
            'REJECTED'    => ['label' => 'ยกเลิก', 'class' => 'badge bg-danger'],
        ];

        $priorityLabels = [
            'LOW'    => ['label' => 'ต่ำ', 'class' => 'badge bg-light text-dark'],
            'NORMAL' => ['label' => 'ปกติ', 'class' => 'badge bg-primary'],
            'HIGH'   => ['label' => 'สูง', 'class' => 'badge bg-warning text-dark'],
            'URGENT' => ['label' => 'เร่งด่วน', 'class' => 'badge bg-danger'],
        ];

        return view('admin.2025_webaru_complaint_direct_detail', compact('case', 'assignees', 'statusLabels', 'priorityLabels'));
    }

    public function store(Request $request, WebaruComplaintCase $case)
    {
        if ($case->type_code !== 'DIRECT') {
            return redirect(url('admin/webaru-complaint-direct-grid'));
        }

        $validated = $request->validate([
            'assigned_to'  => 'nullable|exists:users,id',
            'status'       => 'required|in:NEW,IN_PROGRESS,NEED_INFO,CLOSED,REJECTED',
            'priority'     => 'required|in:LOW,NORMAL,HIGH,URGENT',
            'internal_note'=> 'nullable|string',
            'public_reply' => 'nullable|string',
            'notify'       => 'nullable|boolean',
        ]);

        DB::transaction(function () use ($request, $case, $validated) {
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
        });

        $shouldNotify = !empty($validated['notify']);
        if ($shouldNotify && !empty($validated['public_reply']) && !empty($case->contact_email) && !$case->is_anonymous) {
            Mail::to($case->contact_email)->send(new ComplaintUpdateMail($case, $validated['public_reply']));
        }

        return redirect()
            ->route('admin.webaru-complaints.direct.show', $case)
            ->with('success', 'บันทึกการพิจารณาเรียบร้อยแล้ว');
    }

    public function deleteLog(WebaruComplaintCase $case, WebaruComplaintCaseLog $log)
    {
        if ($case->type_code !== 'DIRECT') {
            return redirect(url('admin/webaru-complaint-direct-grid'));
        }

        if ($log->case_id !== $case->id) {
            return redirect()
                ->route('admin.webaru-complaints.direct.show', $case)
                ->with('fail', 'ไม่พบรายการที่ต้องการลบ');
        }

        $log->delete();

        return redirect()
            ->route('admin.webaru-complaints.direct.show', $case)
            ->with('success', 'ลบรายการประวัติเรียบร้อยแล้ว');
    }
}
