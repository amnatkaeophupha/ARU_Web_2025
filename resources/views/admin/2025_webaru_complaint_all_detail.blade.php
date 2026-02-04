@extends('admin/roker_layout/2025_webaru_complaint_layout')
@section('title', 'รายละเอียดเรื่องร้องเรียน - มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา')

@section('content')
<style>
    .complaint-direct-detail,
    .complaint-direct-detail * {
        font-family: 'Chakra Petch', sans-serif;
    }
    .complaint-direct-detail .breadcrumb-title {
        font-size: 18px;
        font-weight: 600;
        color: #1f2a37;
    }
    .complaint-direct-detail h5 {
        font-size: 18px;
        font-weight: 700;
    }
    .complaint-direct-detail .stat-label {
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.2px;
        color: #6b7280;
    }
    .complaint-direct-detail .stat-value {
        font-size: 14px;
        font-weight: 600;
        color: #111827;
    }
    .complaint-direct-detail .badge {
        font-size: 12px;
        font-weight: 600;
    }
    .complaint-direct-detail .timeline-step {
        position: relative;
        padding-left: 34px;
        margin-bottom: 16px;
    }
    .complaint-direct-detail .timeline-step::before {
        content: '';
        position: absolute;
        left: 10px;
        top: 6px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #2563eb;
    }
    .complaint-direct-detail .timeline-step::after {
        content: '';
        position: absolute;
        left: 15px;
        top: 20px;
        width: 2px;
        height: calc(100% - 12px);
        background: #e5e7eb;
    }
    .complaint-direct-detail .timeline-step:last-child::after {
        display: none;
    }
    .complaint-direct-detail .text-muted.small {
        font-size: 12px;
    }
    .complaint-direct-detail .log-list {
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        background: #ffffff;
        overflow: hidden;
    }
    .complaint-direct-detail .log-item {
        padding: 12px 14px;
        border-bottom: 1px solid #eef2f7;
    }
    .complaint-direct-detail .log-item:last-child {
        border-bottom: 0;
    }
    .complaint-direct-detail .log-meta {
        font-size: 12px;
        color: #6b7280;
    }
    @media print {
        body * {
            visibility: hidden !important;
        }
        .print-area, .print-area * {
            visibility: visible !important;
        }
        .print-area {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        .no-print {
            display: none !important;
        }
    }
</style>

<div class="page-wrapper">
    <div class="page-content complaint-direct-detail">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">ศูนย์รับเรื่องร้องเรียน</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin/webaru-complaints-grid') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">รายละเอียดเรื่องร้องเรียน</li>
                    </ol>
                </nav>
            </div>
        </div>

        @php
            $typeLabels = [
                'GRIEVANCE'  => 'ร้องเรียน-ร้องทุกข์',
                'OPINION'    => 'รับความคิดเห็น',
                'CORRUPTION' => 'ร้องเรียนการทุจริตฯ',
                'DIRECT'     => 'สายตรงอธิการ',
            ];
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
            $typeLabel = $typeLabels[$case->type_code] ?? $case->type_code;
            $statusInfo = $statusLabels[$case->status] ?? ['label' => $case->status, 'class' => 'badge bg-secondary'];
            $priorityInfo = $priorityLabels[$case->priority] ?? ['label' => $case->priority, 'class' => 'badge bg-secondary'];
        @endphp

        <div class="row g-3">
            <div class="col-12">
                <div class="card border-primary border-top border-3 border-0 print-area">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 no-print">
                            <div>
                                <h5 class="text-primary mb-1">รายละเอียดเรื่องร้องเรียน: {{ $case->case_no }}</h5>
                                <div class="text-muted small">จัดการโดยงานนิติกร/ผู้รับผิดชอบ</div>
                            </div>
                            <div class="d-flex gap-2">
                                <a class="btn btn-outline-secondary btn-sm" href="{{ url('admin/webaru-complaints-grid') }}">
                                    <i class="bx bx-arrow-back me-1"></i>กลับรายการ
                                </a>
                                <button class="btn btn-outline-primary btn-sm" type="button" id="print-all-detail"><i class="bx bx-printer me-1"></i>พิมพ์</button>
                                <form method="POST"
                                      action="{{ route('admin.webaru-complaints.destroy', $case) }}"
                                      class="d-inline delete-complaint-form"
                                      data-case="{{ $case->case_no ?? $case->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bx bx-trash me-1"></i>ลบ</button>
                                </form>
                            </div>
                        </div>
                        <hr/>

                        <div class="row g-3">
                            <div class="col-12 col-lg-8">
                                <div class="row g-3">
                                    <div class="col-12 col-md-6">
                                        <div class="stat-label">หัวข้อเรื่อง</div>
                                        <div class="stat-value">{{ $case->subject ?? '-' }}</div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="stat-label">สถานะ</div>
                                        <div><span class="{{ $statusInfo['class'] }}">{{ $statusInfo['label'] }}</span></div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="stat-label">ความเร่งด่วน</div>
                                        <div><span class="{{ $priorityInfo['class'] }}">{{ $priorityInfo['label'] }}</span></div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="stat-label">วันที่รับเรื่อง</div>
                                        <div class="stat-value">{{ optional($case->created_at)->format('d/m/Y H:i') ?? '-' }}</div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="stat-label">ช่องทาง</div>
                                        <div class="stat-value">{{ $case->channel ?? '-' }}</div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="stat-label">ประเภท</div>
                                        <div class="stat-value">{{ $typeLabel }}</div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <h6 class="text-primary mb-2">รายละเอียดเรื่อง</h6>
                                    <div class="border rounded p-3 bg-light">
                                        {!! nl2br(e($case->detail ?? '-')) !!}
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <h6 class="text-primary mb-2">ข้อมูลผู้ติดต่อ</h6>
                                    <div class="row g-2">
                                        <div class="col-12 col-md-4">
                                            <div class="stat-label">ชื่อ</div>
                                            <div class="stat-value">{{ $case->is_anonymous ? '-' : ($case->contact_name ?? '-') }}</div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="stat-label">โทรศัพท์</div>
                                            <div class="stat-value">{{ $case->is_anonymous ? '-' : ($case->contact_phone ?? '-') }}</div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="stat-label">อีเมล</div>
                                            <div class="stat-value">{{ $case->is_anonymous ? '-' : ($case->contact_email ?? '-') }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <h6 class="text-primary mb-2">ไฟล์แนบ</h6>
                                    @if (!empty($case->attachments) && $case->attachments->count())
                                        <ul class="list-group">
                                            @foreach ($case->attachments as $att)
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <a href="{{ asset('storage/' . $att->file_path) }}" target="_blank" rel="noopener">
                                                            {{ $att->original_name ?? basename($att->file_path) }}
                                                        </a>
                                                        @if (!empty($att->file_size))
                                                            <span class="text-muted small">({{ number_format($att->file_size / 1024, 1) }} KB)</span>
                                                        @endif
                                                    </div>
                                                    <span class="badge bg-light text-dark">{{ strtoupper(pathinfo($att->file_path, PATHINFO_EXTENSION)) }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <div class="text-muted small">ไม่มีไฟล์แนบ</div>
                                    @endif
                                </div>

                                <div class="mt-4">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="text-primary mb-0">ประวัติการดำเนินการ</h6>
                                        <span class="badge bg-light text-dark">{{ $case->logs ? $case->logs->count() : 0 }} รายการ</span>
                                    </div>
                                    @if ($case->logs && $case->logs->count())
                                        <div class="log-list">
                                            @foreach ($case->logs as $log)
                                                <div class="log-item">
                                                    <div class="d-flex align-items-start justify-content-between">
                                                        <div>
                                                            <div class="fw-semibold">{{ $log->action ?? '-' }}</div>
                                                            <div class="text-muted small">{{ $log->remark ?? '-' }}</div>
                                                        </div>
                                                        <div class="text-end">
                                                            <div class="log-meta">{{ optional($log->created_at)->format('d/m/Y H:i') }}</div>
                                                            <form method="POST" action="{{ url('admin/webaru-complaints/' . $case->id . '/logs/' . $log->id) }}" class="d-inline js-log-delete">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-outline-danger btn-sm mt-1">ลบ</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="text-muted small">ยังไม่มีประวัติการดำเนินการ</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">
                                        <h6 class="text-primary mb-3">ขั้นตอนการพิจารณา</h6>
                                        <div class="timeline-step">
                                            <div class="fw-semibold">ผู้รับผิดชอบพิจารณาเรื่องร้องเรียน</div>
                                            <div class="text-muted small">ตรวจสอบข้อมูลและประเมินความเร่งด่วน</div>
                                        </div>
                                        <div class="timeline-step">
                                            <div class="fw-semibold">ดำเนินการตามขั้นตอน</div>
                                            <div class="text-muted small">มอบหมายหน่วยงาน/ติดตามผล</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">
                                        <h6 class="text-primary mb-3">การจัดการโดยผู้รับผิดชอบ</h6>
                                        <form method="post" action="{{ route('admin.webaru-complaints.update', $case) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-2">
                                                <label class="form-label">ผู้รับผิดชอบ</label>
                                                <select class="form-select form-select-sm" name="assigned_to">
                                                    <option value="">- ไม่ระบุ -</option>
                                                    @foreach($assignees as $user)
                                                        <option value="{{ $user->id }}" @selected($case->assigned_to === $user->id)>{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">สถานะ</label>
                                                <select class="form-select form-select-sm" name="status">
                                                    <option value="NEW" @selected($case->status === 'NEW')>ใหม่</option>
                                                    <option value="IN_PROGRESS" @selected($case->status === 'IN_PROGRESS')>กำลังดำเนินการ</option>
                                                    <option value="NEED_INFO" @selected($case->status === 'NEED_INFO')>รอข้อมูลเพิ่มเติม</option>
                                                    <option value="CLOSED" @selected($case->status === 'CLOSED')>ปิดเรื่อง</option>
                                                    <option value="REJECTED" @selected($case->status === 'REJECTED')>ยกเลิก</option>
                                                </select>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">ความเร่งด่วน</label>
                                                <select class="form-select form-select-sm" name="priority">
                                                    <option value="LOW" @selected($case->priority === 'LOW')>ต่ำ</option>
                                                    <option value="NORMAL" @selected($case->priority === 'NORMAL')>ปกติ</option>
                                                    <option value="HIGH" @selected($case->priority === 'HIGH')>สูง</option>
                                                    <option value="URGENT" @selected($case->priority === 'URGENT')>เร่งด่วน</option>
                                                </select>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">บันทึกภายใน</label>
                                                <textarea class="form-control form-control-sm" name="internal_note" rows="3" placeholder="บันทึกสำหรับงานนิติกร/ผู้รับผิดชอบ"></textarea>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">ข้อความแจ้งผู้ร้อง</label>
                                                <textarea class="form-control form-control-sm" name="public_reply" rows="3" placeholder="ข้อความสำหรับแจ้งผู้ร้อง (ถ้ามี)"></textarea>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" value="1" id="notify" name="notify" checked>
                                                        <label class="form-check-label" for="notify">บันทึกเป็นข้อความแจ้งผู้ร้อง</label>
                                                    </div>
                                                    <div class="text-muted small mt-1">
                                                        ถ้าไม่ติ๊ก ข้อความตอบกลับจะไม่แสดงในหน้าติดตามผล
                                                        และถ้าผู้ร้องมีอีเมล ระบบจะส่งอีเมลแจ้งกลับเมื่อบันทึก
                                                    </div>
                                            </div>
                                            <button class="btn btn-primary btn-sm" type="submit"><i class="bx bx-save me-1"></i>บันทึก</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <h6 class="text-primary mb-2">หมายเหตุ/แนวทางปฏิบัติ</h6>
                                        <ul class="mb-0 small text-muted">
                                            <li>ตรวจสอบเอกสารแนบให้ครบถ้วนก่อนปิดเรื่อง</li>
                                            <li>กรณีข้อมูลไม่เพียงพอ ให้ตั้งสถานะ “รอข้อมูลเพิ่มเติม”</li>
                                            <li>บันทึกการติดต่อทุกครั้งเพื่อเก็บเป็นหลักฐาน</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const bindConfirm = (selector, message) => {
            document.querySelectorAll(selector).forEach(function (form) {
                form.addEventListener('submit', function (e) {
                    const caseNo = form.getAttribute('data-case') || '';
                    const resolved = typeof message === 'function' ? message(caseNo) : message;

                    if (window.Swal) {
                        e.preventDefault();
                        Swal.fire({
                            title: 'ยืนยันการลบ',
                            text: resolved,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'ลบ',
                            cancelButtonText: 'ยกเลิก'
                        }).then(function (result) {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                        return;
                    }

                    if (!confirm(resolved)) {
                        e.preventDefault();
                    }
                });
            });
        };

        bindConfirm('.delete-complaint-form', (caseNo) => caseNo ? `ยืนยันลบเรื่องร้องเรียนเลขที่ ${caseNo} ?` : 'ยืนยันลบเรื่องร้องเรียน ?');
        bindConfirm('.js-log-delete', 'ยืนยันลบรายการประวัติการดำเนินการ ?');

        const printBtn = document.getElementById('print-all-detail');
        if (printBtn) {
            printBtn.addEventListener('click', function () {
                window.print();
            });
        }
    });
</script>
@endpush
