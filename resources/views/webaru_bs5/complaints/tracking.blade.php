@extends('webaru_bs5/layout')

@section('content')
<link rel="stylesheet" href="{{ url('webaru_bs5/aru_complaint.css') }}">

@php
    $typeLabels = [
        'GRIEVANCE'  => 'ร้องเรียน-ร้องทุกข์',
        'OPINION'    => 'รับความคิดเห็น',
        'CORRUPTION' => 'ร้องเรียนการทุจริตฯ',
        'DIRECT'     => 'สายตรงอธิการ',
    ];
    $statusLabels = [
        'NEW'         => ['label' => 'ใหม่', 'class' => 'aru-status-new'],
        'IN_PROGRESS' => ['label' => 'กำลังดำเนินการ', 'class' => 'aru-status-progress'],
        'NEED_INFO'   => ['label' => 'รอข้อมูลเพิ่มเติม', 'class' => 'aru-status-wait'],
        'CLOSED'      => ['label' => 'ปิดเรื่อง', 'class' => 'aru-status-closed'],
        'REJECTED'    => ['label' => 'ยกเลิก', 'class' => 'aru-status-rejected'],
    ];
@endphp

<section class="aru-tracking-hero">
    <div class="container">
        <div class="aru-breadcrumb">
            <a href="{{ url('/') }}">หน้าแรก</a> / <a href="{{ route('complaint.index') }}">ศูนย์รับเรื่องร้องเรียน</a> / <span>ติดตามผล</span>
        </div>
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <h1 class="aru-tracking-title">ติดตามผลเรื่องร้องเรียน</h1>
                <p class="aru-tracking-subtitle">
                    ตรวจสอบความคืบหน้าด้วยเลขอ้างอิงและรหัสติดตาม (PIN)
                    ข้อมูลจะถูกแสดงเฉพาะกรณีที่เลขอ้างอิงและ PIN ถูกต้อง
                </p>
                <div class="aru-tracking-tags">
                    <span class="aru-tracking-tag">ปลอดภัย</span>
                    <span class="aru-tracking-tag">ตรวจสอบได้</span>
                    <span class="aru-tracking-tag">เป็นความลับ</span>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="aru-tracking-note">
                    <h6>คำแนะนำการติดตาม</h6>
                    <ul>
                        <li>เลขอ้างอิงเริ่มต้นด้วย ARU-YYYY-xxxxxx</li>
                        <li>PIN ได้จากหน้าจอหลังส่งเรื่อง หรืออีเมลยืนยัน</li>
                        <li>ระบบจะแสดงเฉพาะข้อมูลที่อนุญาตให้เผยแพร่</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="aru-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-5">
                <div class="aru-tracking-card">
                    <h5>ฟอร์มติดตามผล</h5>
                    <p>กรอกข้อมูลให้ครบถ้วนเพื่อดูผลการดำเนินการ</p>
                    <form method="get" action="{{ route('complaint.tracking') }}" class="row g-2 mt-2">
                        <div class="col-12">
                                <label class="aru-tracking-label">เลขอ้างอิง</label>
                            <input type="text"
                                name="case_no"
                                value="{{ $caseNo }}"
                                class="form-control aru-input aru-input-pad"
                                placeholder="เช่น ARU-2026-000123"
                                required>
                        </div>
                        <div class="col-12">
                                <label class="aru-tracking-label">รหัสติดตาม (PIN)</label>
                            <input type="password"
                                name="pin"
                                value="{{ $pin }}"
                                class="form-control aru-input aru-input-pad"
                                placeholder="ใส่รหัส 6 หลัก"
                                required>
                        </div>
                        <div class="col-12 d-flex gap-2">
                            <button class="aru-submit w-100" type="submit">ตรวจสอบสถานะ</button>
                        </div>
                        <div class="col-12">
                            <div class="small text-muted">
                                * หากท่านไม่ทราบ PIN โปรดตรวจสอบจากหน้าจอหลังส่งเรื่อง หรืออีเมลที่แจ้งไว้
                            </div>
                        </div>
                    </form>
                </div>

                <div class="aru-tracking-help mt-3">
                    <div class="aru-tracking-help-icon">
                        <i class="icofont icofont-info-circle"></i>
                    </div>
                    <div>
                        <div class="aru-tracking-help-title">ต้องการความช่วยเหลือ?</div>
                        <div class="aru-tracking-help-text">ติดต่อศูนย์รับเรื่องร้องเรียน โทร 035-527-6555 ต่อ 1321</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="aru-tracking-result">
                    <div class="aru-tracking-result-header">
                        <h5>ผลการติดตาม</h5>
                        <span class="aru-tracking-status">อัปเดตล่าสุดภายในระบบ</span>
                    </div>

                    @if($error)
                        <div class="aru-tracking-error">
                            <div class="aru-tracking-error-icon">
                                <i class="icofont icofont-warning-alt"></i>
                            </div>
                            <div>
                                <div class="aru-tracking-error-title">ไม่พบข้อมูล</div>
                                <div class="aru-tracking-error-text">{{ $error }}</div>
                            </div>
                        </div>
                    @elseif($case)
                        @php
                            $typeLabel = $typeLabels[$case->type_code] ?? $case->type_code;
                            $statusInfo = $statusLabels[$case->status] ?? ['label' => $case->status, 'class' => 'aru-status-progress'];
                        @endphp
                        <div class="aru-tracking-case">
                            <div class="aru-tracking-case-head">
                                <div>
                                    <div class="aru-tracking-case-label">เลขอ้างอิง</div>
                                    <div class="aru-tracking-case-no">{{ $case->case_no }}</div>
                                </div>
                                <span class="aru-tracking-pill {{ $statusInfo['class'] }}">{{ $statusInfo['label'] }}</span>
                            </div>
                            <div class="aru-tracking-case-grid">
                                <div>
                                    <div class="aru-tracking-case-label">ประเภทเรื่อง</div>
                                    <div class="aru-tracking-case-value">{{ $typeLabel }}</div>
                                </div>
                                <div>
                                    <div class="aru-tracking-case-label">วันที่รับเรื่อง</div>
                                    <div class="aru-tracking-case-value">{{ optional($case->created_at)->format('d/m/Y H:i') }}</div>
                                </div>
                                <div class="aru-tracking-case-full">
                                    <div class="aru-tracking-case-label">หัวข้อเรื่อง</div>
                                    <div class="aru-tracking-case-value">{{ $case->subject }}</div>
                                </div>
                                @if(!empty($case->answered_at))
                                    <div class="aru-tracking-case-full">
                                        <div class="aru-tracking-case-label">ตอบกลับล่าสุด</div>
                                        <div class="aru-tracking-case-value">{{ optional($case->answered_at)->format('d/m/Y H:i') }}</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @elseif($hasQuery)
                        <div class="aru-tracking-state">
                            <div class="aru-tracking-state-icon">
                                <i class="icofont icofont-search"></i>
                            </div>
                            <div>
                                <div class="aru-tracking-state-title">ระบบกำลังตรวจสอบข้อมูล</div>
                                <div class="aru-tracking-state-text">
                                    หากเลขอ้างอิงและ PIN ถูกต้อง ระบบจะแสดงผลการดำเนินการ
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="aru-tracking-empty">
                            <div class="aru-tracking-empty-icon">
                                <i class="icofont icofont-ui-search"></i>
                            </div>
                            <div class="aru-tracking-empty-title">กรุณากรอกเลขอ้างอิงและ PIN</div>
                            <div class="aru-tracking-empty-text">ผลการติดตามจะแสดงที่นี่เมื่อท่านทำการค้นหา</div>
                        </div>
                    @endif

                    <div class="aru-tracking-timeline mt-4">
                        <div class="aru-tracking-timeline-title">สถานะการดำเนินงาน</div>
                        @if($case && $publicLogs->count())
                            @foreach($publicLogs as $log)
                                <div class="aru-tracking-step {{ $loop->last ? 'is-active' : '' }}">
                                    <div class="dot"></div>
                                    <div>
                                        <div class="title">{{ $log->action_label ?? ($log->action ?? 'ดำเนินการ') }}</div>
                                        <div class="desc">{{ $log->remark ?? '-' }}</div>
                                    </div>
                                    <div class="time">{{ optional($log->created_at)->format('d/m/Y H:i') }}</div>
                                </div>
                            @endforeach
                        @else
                            <div class="aru-tracking-empty">
                                <div class="aru-tracking-empty-icon">
                                    <i class="icofont icofont-ui-timer"></i>
                                </div>
                                <div class="aru-tracking-empty-title">ยังไม่มีสถานะการดำเนินงานให้แสดง</div>
                                <div class="aru-tracking-empty-text">เมื่อมีการอัปเดตสถานะ ระบบจะแสดงรายการในส่วนนี้</div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="aru-tracking-note-card mt-3">
                    <div class="aru-tracking-note-title">หมายเหตุสำคัญ</div>
                    <p class="mb-0">
                        ข้อมูลที่แสดงเป็นความคืบหน้าที่อนุญาตให้เผยแพร่เท่านั้น
                        หากต้องการรายละเอียดเพิ่มเติม กรุณาติดต่อศูนย์รับเรื่องร้องเรียน
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
