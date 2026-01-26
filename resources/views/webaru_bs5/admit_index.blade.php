@extends('webaru_bs5/layout')
@section('content')

<section class="breadcrumbs-area bg-3 py-5 bg-opacity bg-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title mb-0" style="font-size:30px; font-family:'Sarabun', sans-serif;">ประกาศผลการรับเข้า</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="lecturers-area py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <style>
                    .admit-link {
                        color: #2e7d32;
                        font-weight: 500;
                        text-decoration: none;
                    }
                    .admit-link:hover,
                    .admit-link:focus {
                        color: #1b5e20;
                        text-decoration: underline;
                    }
                    .admit-card {
                        border: 1px solid #e6e9ef;
                        border-radius: 14px;
                        box-shadow: 0 10px 24px rgba(0,0,0,.06);
                        overflow: hidden;
                    }
                    .admit-card .card-header {
                        background: linear-gradient(135deg, #f8f9fb, #ffffff);
                    }
                    .admit-table thead th {
                        font-weight: 600;
                        color: #334155;
                        background: #f4f6f9;
                    }
                    .admit-table tbody tr:hover {
                        background: #f8fafc;
                    }
                    .admit-badge {
                        font-size: 12px;
                        padding: .35rem .6rem;
                        border-radius: 999px;
                        background: #eef7ee;
                        color: #1b5e20;
                        font-weight: 600;
                    }
                </style>

                <div class="card admit-card">
                    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
                        <div class="fw-semibold text-primary">รายการประกาศผลการรับเข้า</div>
                        <span class="admit-badge">อัปเดตล่าสุด</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0 admit-table" style="background:#fff;">
                        <thead>
                            <tr>
                                <th style="width:70px;" class="text-center text-nowrap">ลำดับ</th>
                                <th class="text-center">ชื่อประกาศ</th>
                                <th style="width:140px;" class="text-center text-nowrap">ปีการศึกษา</th>
                                <th style="width:180px;" class="text-center text-nowrap">การทำรายการ</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($cycles as $cycle)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ url('/admit/'.$cycle->id) }}" class="admit-link">
                                        {{ $cycle->title ?? '-' }}
                                    </a>
                                </td>
                                <td class="text-center text-nowrap">
                                    <span class="badge bg-light text-dark border">{{ $cycle->year ?? '-' }}</span>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm me-1" href="{{ url('/admit/'.$cycle->id) }}">
                                        <i class="fa fa-search"></i> ดูรายละเอียด
                                    </a>
                                    @if(!empty($cycle->file_pdf))
                                        <a class="btn btn-outline-secondary btn-sm" href="{{ asset($cycle->file_pdf) }}" target="_blank" rel="noopener">
                                            <i class="fa fa-download"></i> ดาวน์โหลด
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center" style="padding:20px; color:#777;">
                                    ไม่มีประกาศผลในขณะนี้
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
