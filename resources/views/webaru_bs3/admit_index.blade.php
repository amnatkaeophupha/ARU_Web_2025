@extends('webaru_bs3/home_layout')
@section('content')
<section class="breadcrumbs-area bg-3 ptb-50 bg-opacity bg-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title" style="font-size:30px;">ประกาศผลการรับเข้า</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start page content -->
<section class="lecturers-area ptb-30">
    <div class="container">
        <!-- อธิการบดี -->
        <div class="row">
        <div class="col-md-12">
        <style>
        .admit-link {
        color: #2e7d32;          /* เขียวเข้มสุภาพ */
        font-weight: 500;
        text-decoration: none;
        }

        .admit-link:hover,
        .admit-link:focus {
        color: #1b5e20;          /* เขียวเข้มขึ้นตอน hover */
        text-decoration: underline;
        }
        </style>
            <div class="table-responsive">
            <table class="table table-bordered table-hover" style="background:#fff;">
                <thead>
                <tr class="active">
                    <th style="width:70px;" class="text-center">ลำดับ</th>
                    <th class="text-center">ชื่อประกาศ</th>
                    <th style="width:140px;" class="text-center">ปีการศึกษา</th>
                    <th style="width:180px;" class="text-center">การทำรายการ</th>
                </tr>
                </thead>

                <tbody>
                @forelse($cycles as $cycle)
                    <tr>
                    <td class="text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        <a href="{{ url('/admit/'.$cycle->id) }}" class="admit-link">
                        {{ $cycle->title ?? '-' }}
                        </a>
                    </td>

                    <td class="text-center">
                        {{ $cycle->year ?? '-' }}
                    </td>

                    <td class="text-center">
                        <a class="btn btn-primary btn-sm" href="{{ url('/admit/'.$cycle->id) }}">
                        <i class="fa fa-search"></i> ดูรายละเอียด
                        </a>

                        {{-- ถ้ามีไฟล์ประกาศ เช่น file_pdf --}}
                        @if(!empty($cycle->file_pdf))
                        <a class="btn btn-default btn-sm" href="{{ asset($cycle->file_pdf) }}" target="_blank">
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
    </div> <!-- End container -->
</section> <!-- End section -->
<!-- End page content -->
@endsection
