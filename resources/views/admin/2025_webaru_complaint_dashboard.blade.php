@extends('admin/roker_layout/2025_webaru_complaint_layout')
@section('title', 'ศูนย์รับเรื่องร้องเรียนและข้อเสนอแนะ - มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา')

@section('content')

<style>
    .complaint-documents-page,
    .complaint-documents-page * {
        font-family: 'Chakra Petch', sans-serif;
    }
</style>

<div class="page-wrapper">
    <div class="page-content complaint-admin-page complaint-documents-page">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3" style="font-family:'Chakra Petch', sans-serif;">
            <div class="breadcrumb-title pe-3">ศูนย์รับเรื่องร้องเรียนและข้อเสนอแนะ</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">รายงานสรุปผล</li>
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

            $priorityLabels = [
                'LOW' => ['label' => 'ต่ำ', 'class' => 'badge bg-light text-dark'],
                'NORMAL' => ['label' => 'ปกติ', 'class' => 'badge bg-primary'],
                'HIGH' => ['label' => 'สูง', 'class' => 'badge bg-warning text-dark'],
                'URGENT' => ['label' => 'เร่งด่วน', 'class' => 'badge bg-danger'],
            ];
        @endphp

        <div class="row g-3 mb-3">
            <div class="col-12 col-md-6 col-xl-2">
                <div class="card radius-10 border-0 border-start border-primary border-4">
                    <div class="card-body">
                        <p class="mb-1 text-secondary stat-label">เรื่องทั้งหมด</p>
                        <h5 class="mb-0 stat-value">{{ $stats['total'] ?? 0 }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-2">
                <div class="card radius-10 border-0 border-start border-warning border-4">
                    <div class="card-body">
                        <p class="mb-1 text-secondary stat-label">ใหม่</p>
                        <h5 class="mb-0 stat-value">{{ $stats['new'] ?? 0 }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-2">
                <div class="card radius-10 border-0 border-start border-info border-4">
                    <div class="card-body">
                        <p class="mb-1 text-secondary stat-label">กำลังดำเนินการ</p>
                        <h5 class="mb-0 stat-value">{{ $stats['in_progress'] ?? 0 }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-2">
                <div class="card radius-10 border-0 border-start border-secondary border-4">
                    <div class="card-body">
                        <p class="mb-1 text-secondary stat-label">รอข้อมูลเพิ่ม</p>
                        <h5 class="mb-0 stat-value">{{ $stats['need_info'] ?? 0 }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-2">
                <div class="card radius-10 border-0 border-start border-success border-4">
                    <div class="card-body">
                        <p class="mb-1 text-secondary stat-label">ปิดเรื่อง</p>
                        <h5 class="mb-0 stat-value">{{ $stats['closed'] ?? 0 }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-2">
                <div class="card radius-10 border-0 border-start border-danger border-4">
                    <div class="card-body">
                        <p class="mb-1 text-secondary stat-label">ยกเลิก</p>
                        <h5 class="mb-0 stat-value">{{ $stats['rejected'] ?? 0 }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-12 col-lg-4">
                <div class="card border-primary border-top border-3 border-0 h-100">
                    <div class="card-body">
                        <div class="card-title">
                            <h6 class="text-primary mb-0">รายงานตามประเภท</h6>
                        </div>
                        <hr/>
                        <ul class="list-group list-group-flush">
                            @foreach ($typeLabels as $code => $label)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $label }}</span>
                                    <span class="badge bg-primary rounded-pill">{{ $typeCounts[$code] ?? 0 }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card border-primary border-top border-3 border-0 h-100">
                    <div class="card-body">
                        <div class="card-title">
                            <h6 class="text-primary mb-0">รายงานตามสถานะ</h6>
                        </div>
                        <hr/>
                        <ul class="list-group list-group-flush">
                            @foreach ($statusLabels as $code => $meta)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $meta['label'] }}</span>
                                    <span class="{{ $meta['class'] }}">{{ $statusCounts[$code] ?? 0 }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card border-primary border-top border-3 border-0 h-100">
                    <div class="card-body">
                        <div class="card-title">
                            <h6 class="text-primary mb-0">รายงานตามความเร่งด่วน</h6>
                        </div>
                        <hr/>
                        <ul class="list-group list-group-flush">
                            @foreach ($priorityLabels as $code => $meta)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $meta['label'] }}</span>
                                    <span class="{{ $meta['class'] }}">{{ $priorityCounts[$code] ?? 0 }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 mt-1">
            <div class="col-12 col-lg-8">
                <div class="card border-primary border-top border-3 border-0 h-100">
                    <div class="card-body">
                        <div class="card-title">
                            <h6 class="text-primary mb-0">สถิติ 6 เดือนล่าสุด</h6>
                        </div>
                        <hr/>
                        <div class="table-responsive">
                            <table class="table table-striped align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>เดือน</th>
                                        <th class="text-end">จำนวนเรื่อง</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($monthlyCounts as $month => $count)
                                        <tr>
                                            <td>{{ $month }}</td>
                                            <td class="text-end">{{ $count }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card border-primary border-top border-3 border-0 h-100">
                    <div class="card-body">
                        <div class="card-title">
                            <h6 class="text-primary mb-0">รายการล่าสุด</h6>
                        </div>
                        <hr/>
                        <div class="table-responsive">
                            <table class="table table-sm align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>เลขที่</th>
                                        <th>ประเภท</th>
                                        <th>สถานะ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($recentCases as $case)
                                        <tr>
                                            <td>{{ $case->case_no }}</td>
                                            <td>{{ $typeLabels[$case->type_code] ?? $case->type_code }}</td>
                                            <td>
                                                @php $status = $statusLabels[$case->status] ?? null; @endphp
                                                @if ($status)
                                                    <span class="{{ $status['class'] }}">{{ $status['label'] }}</span>
                                                @else
                                                    {{ $case->status }}
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-muted text-center">ยังไม่มีข้อมูล</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
