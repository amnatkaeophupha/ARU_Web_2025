@extends('webaru_bs5/layout')

@section('content')

<link rel="stylesheet" href="{{ url('webaru_bs5/aru_complaint.css') }}">

<section class="aru-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="aru-form-wrap">
                    <div class="text-center mb-3">
                        <div class="aru-privacy-icon mx-auto">
                            <i class="icofont icofont-check-circled"></i>
                        </div>
                        <h3 class="aru-section-title mt-3">ส่งเรื่องสำเร็จ</h3>
                        <p class="aru-section-lead mb-0">
                            ขอบคุณที่ส่งเรื่อง ระบบได้รับข้อมูลของท่านเรียบร้อยแล้ว
                        </p>
                    </div>

                    @php
                        $caseNo = session('case_no');
                        $pin = session('pin');
                    @endphp

                    @if($caseNo)
                        <div class="bg-light border rounded-3 p-3 mb-3 text-center">
                            <div class="fw-semibold mb-1">รหัสอ้างอิง</div>
                            <div class="h5 mb-2">{{ $caseNo }}</div>
                            @if($pin)
                                <div class="fw-semibold mb-1">รหัสติดตาม (PIN)</div>
                                <div class="h5 mb-0">{{ $pin }}</div>
                            @else
                                <div class="text-muted small">ระบบไม่พบรหัสติดตามสำหรับรายการนี้</div>
                            @endif
                        </div>
                        <div class="text-muted small text-center">
                            กรุณาเก็บรหัสอ้างอิงและรหัสติดตามไว้สำหรับการติดตามผลในภายหลัง
                        </div>
                    @else
                        <div class="alert alert-warning mb-0" role="alert">
                            ไม่พบข้อมูลรหัสอ้างอิงในระบบ โปรดลองส่งเรื่องใหม่อีกครั้ง
                        </div>
                    @endif

                    <div class="mt-4 d-flex justify-content-center gap-2 flex-wrap">
                        <a href="{{ route('complaint.index') }}" class="aru-submit text-decoration-none">กลับหน้ารวมเรื่องร้องเรียน</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
