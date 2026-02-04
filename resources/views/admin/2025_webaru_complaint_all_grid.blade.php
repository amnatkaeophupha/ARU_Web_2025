@extends('admin/roker_layout/2025_webaru_complaint_layout')
@section('title', 'ศูนย์รับเรื่องร้องเรียนและข้อเสนอแนะ - มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา')

@section('content')
<link rel="stylesheet" href="{{ url('rocker/plugins/datetimepicker/css/classic.css') }}">
<link rel="stylesheet" href="{{ url('rocker/plugins/datetimepicker/css/classic.date.css') }}">
<style>
    .complaint-admin-page,
    .complaint-admin-page * {
        font-family: 'Chakra Petch', sans-serif;
    }
    .complaint-admin-page .breadcrumb-title {
        font-size: 18px;
        font-weight: 600;
        color: #1f2a37;
    }
    .complaint-admin-page .card-title h5 {
        font-size: 18px;
        font-weight: 700;
    }
    .complaint-admin-page .stat-label {
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 0.2px;
    }
    .complaint-admin-page .stat-value {
        font-size: 22px;
        font-weight: 700;
    }
    .complaint-admin-page .form-label {
        font-size: 13px;
        font-weight: 600;
        color: #374151;
    }
    .complaint-admin-page .form-control,
    .complaint-admin-page .form-select {
        font-size: 13px;
    }
    .complaint-admin-page .table th {
        font-size: 13px;
        font-weight: 700;
        color: #374151;
        letter-spacing: 0.2px;
    }
    .complaint-admin-page .table td {
        font-size: 13px;
        color: #1f2937;
    }
    .complaint-admin-page .btn {
        font-size: 12px;
        font-weight: 600;
    }
    .complaint-admin-page .badge {
        font-size: 12px;
        font-weight: 600;
    }
    .complaint-admin-page .picker__holder,
    .complaint-admin-page .picker__frame,
    .complaint-admin-page .picker__box,
    .complaint-admin-page .picker__table,
    .complaint-admin-page .picker__table *,
    .complaint-admin-page .picker__header,
    .complaint-admin-page .picker__footer,
    .complaint-admin-page .picker__nav--prev,
    .complaint-admin-page .picker__nav--next,
    .complaint-admin-page .picker__button--today,
    .complaint-admin-page .picker__button--clear,
    .complaint-admin-page .picker__button--close {
        font-size: 12px;
    }
</style>
<div class="page-wrapper">
    <div class="page-content complaint-admin-page">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3" style="font-family:'Chakra Petch', sans-serif;">
            <div class="breadcrumb-title pe-3">ศูนย์รับเรื่องร้องเรียนและข้อเสนอแนะ</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">รายการเรื่องร้องเรียน</li>
                    </ol>
                </nav>
            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger border-0 alert-dismissible fade show" style="font-family:'Chakra Petch', sans-serif;">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('success'))
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show" style="font-family:'Chakra Petch', sans-serif;">
            <div class="text-white">{{ session('success') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('fail'))
        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show" style="font-family:'Chakra Petch', sans-serif;">
            <div class="text-white">{{ session('fail') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

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
        @endphp

        <div class="row g-3 mb-3">
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card radius-10 border-0 border-start border-primary border-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-1 text-secondary stat-label">เรื่องทั้งหมด</p>
                                <h5 class="mb-0 stat-value">{{ $stats['total'] ?? 0 }}</h5>
                            </div>
                            <div class="ms-auto text-primary"><i class="bx bx-file-blank font-30"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card radius-10 border-0 border-start border-warning border-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-1 text-secondary stat-label">รอดำเนินการ</p>
                                <h5 class="mb-0 stat-value">{{ $stats['pending'] ?? 0 }}</h5>
                            </div>
                            <div class="ms-auto text-warning"><i class="bx bx-time-five font-30"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card radius-10 border-0 border-start border-info border-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-1 text-secondary stat-label">อยู่ระหว่างตรวจสอบ</p>
                                <h5 class="mb-0 stat-value">{{ $stats['investigating'] ?? 0 }}</h5>
                            </div>
                            <div class="ms-auto text-info"><i class="bx bx-search-alt-2 font-30"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card radius-10 border-0 border-start border-success border-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-1 text-secondary stat-label">ปิดเรื่องแล้ว</p>
                                <h5 class="mb-0 stat-value">{{ $stats['closed'] ?? 0 }}</h5>
                            </div>
                            <div class="ms-auto text-success"><i class="bx bx-check-circle font-30"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-primary border-top border-3 border-0">
            <div class="card-body">
                <div class="card-title" style="font-family:'Chakra Petch', sans-serif;">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <h5 class="text-primary rounded mb-0">รายการเรื่องร้องเรียน</h5>
                        <div class="d-flex gap-2 flex-wrap">
                            <button class="btn btn-primary btn-sm"><i class="bx bx-download me-1"></i>Export</button>
                        </div>
                    </div>
                </div>
                <hr/>

                <div class="tab-content py-0">
                    <form method="get" class="row g-2 mb-3">
                        <div class="col-12 col-md-3">
                            <label class="form-label">ประเภทเรื่อง</label>
                            <select class="form-select form-select-sm" name="type">
                                <option value="">ทั้งหมด</option>
                                <option value="GRIEVANCE" @selected(($filters['type'] ?? '') === 'GRIEVANCE')>ร้องเรียน-ร้องทุกข์</option>
                                <option value="OPINION" @selected(($filters['type'] ?? '') === 'OPINION')>รับความคิดเห็น</option>
                                <option value="CORRUPTION" @selected(($filters['type'] ?? '') === 'CORRUPTION')>ร้องเรียนการทุจริตฯ</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-3">
                            <label class="form-label">สถานะ</label>
                            <select class="form-select form-select-sm" name="status">
                                <option value="">ทั้งหมด</option>
                                <option value="NEW" @selected(($filters['status'] ?? '') === 'NEW')>ใหม่</option>
                                <option value="IN_PROGRESS" @selected(($filters['status'] ?? '') === 'IN_PROGRESS')>กำลังดำเนินการ</option>
                                <option value="NEED_INFO" @selected(($filters['status'] ?? '') === 'NEED_INFO')>รอข้อมูลเพิ่มเติม</option>
                                <option value="CLOSED" @selected(($filters['status'] ?? '') === 'CLOSED')>ปิดเรื่อง</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-2">
                            <label class="form-label">วันที่รับเรื่อง (เริ่มต้น)</label>
                            <input type="text" class="form-control form-control-sm js-date-th" name="start_date_display" value="" autocomplete="off">
                            <input type="hidden" name="start_date" value="{{ $filters['start_date'] ?? '' }}">
                        </div>
                        <div class="col-12 col-md-2">
                            <label class="form-label">ค้นหา</label>
                            <input type="text" class="form-control form-control-sm" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="เลขอ้างอิง/หัวข้อ/ชื่อผู้ติดต่อ">
                        </div>
                        <div class="col-12 col-md-2 d-flex align-items-end gap-2">
                            <button class="btn btn-primary btn-sm" type="submit"><i class="bx bx-search me-1"></i>ค้นหา</button>
                            <a class="btn btn-outline-secondary btn-sm" href="{{ url('admin/webaru-complaints') }}"><i class="bx bx-reset me-1"></i>ล้างตัวกรอง</a>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 130px;">เลขอ้างอิง</th>
                                    <th style="width: 150px;">ประเภท</th>
                                    <th>หัวข้อเรื่อง</th>
                                    <th style="width: 140px;">วันที่รับเรื่อง</th>
                                    <th style="width: 140px;">สถานะ</th>
                                    <th style="width: 120px;">การดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cases as $case)
                                    @php
                                        $typeLabel = $typeLabels[$case->type_code] ?? $case->type_code;
                                        $statusInfo = $statusLabels[$case->status] ?? ['label' => $case->status, 'class' => 'badge bg-secondary'];
                                    @endphp
                                    <tr>
                                        <td>{{ $case->case_no ?? '-' }}</td>
                                        <td>{{ $typeLabel }}</td>
                                        <td>{{ $case->subject ?? '-' }}</td>
                                        <td>{{ optional($case->created_at)->format('d/m/Y') ?? '-' }}</td>
                                        <td><span class="{{ $statusInfo['class'] }}">{{ $statusInfo['label'] }}</span></td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.webaru-complaints.show', $case) }}">ดูรายละเอียด</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted">-</td>
                                        <td class="text-muted">-</td>
                                        <td class="text-muted">ยังไม่มีข้อมูล</td>
                                        <td class="text-muted">-</td>
                                        <td class="text-muted">-</td>
                                        <td class="text-center text-muted">-</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if(method_exists($cases, 'links'))
                        <div class="mt-3">
                            {{ $cases->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ url('rocker/plugins/datetimepicker/js/picker.js') }}"></script>
<script src="{{ url('rocker/plugins/datetimepicker/js/picker.date.js') }}"></script>
<script>
    $(function () {
        const toThaiDate = (yyyy, mm, dd) => {
            const yearBE = parseInt(yyyy, 10) + 543;
            const pad = (n) => String(n).padStart(2, '0');
            return `${pad(dd)}/${pad(mm)}/${yearBE}`;
        };

        $('.js-date-th').each(function () {
            const $input = $(this);
            const $hidden = $input.closest('form').find('input[name="start_date"]');
            const initialValue = $hidden.val();
            const picker = $input.pickadate({
                format: 'dd/mm/yyyy',
                formatSubmit: 'yyyy-mm-dd',
                hiddenName: false,
                selectYears: true,
                selectMonths: true,
                monthsFull: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
                monthsShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'],
                weekdaysFull: ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'],
                weekdaysShort: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
                today: 'วันนี้',
                clear: 'ล้าง',
                close: 'ปิด',
                firstDay: 1,
                onSet: function () {
                    const select = this.get('select');
                    if (!select) return;
                    const display = toThaiDate(select.year, select.month + 1, select.date);
                    $input.val(display);
                    const iso = `${select.year}-${String(select.month + 1).padStart(2, '0')}-${String(select.date).padStart(2, '0')}`;
                    $hidden.val(iso);
                },
                onClear: function () {
                    $input.val('');
                    $hidden.val('');
                }
            }).pickadate('picker');

            if (initialValue) {
                picker.set('select', initialValue, { format: 'yyyy-mm-dd' });
                const select = picker.get('select');
                if (select) {
                    $input.val(toThaiDate(select.year, select.month + 1, select.date));
                }
            }
        });

    });
</script>
@endpush
