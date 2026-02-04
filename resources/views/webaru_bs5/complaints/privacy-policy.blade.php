@extends('webaru_bs5/layout')

@section('content')

@include('webaru_bs5.complaints.complaint-header')

<link rel="stylesheet" href="{{ url('webaru_bs5/aru_complaint.css') }}">

<section class="aru-section alt" style="padding: 56px 0;">
    <div class="container">
        {{-- Breadcrumb --}}
        <div class="mb-3">
            <div class="aru-breadcrumb">
                <a href="{{ url('/') }}">หน้าแรก</a> / <span>นโยบายความเป็นส่วนบุคคล</span>
            </div>
        </div>

        <div class="row g-4">
            {{-- Main content --}}
            <div class="col-lg-8">
                <div class="aru-form-wrap">
                    <div class="d-flex align-items-start gap-3 mb-3">
                        <div class="aru-privacy-icon">
                            <i class="icofont icofont-shield"></i>
                        </div>
                        <div>
                            <h1 class="aru-section-title mb-1" style="font-size: 26px;">นโยบายความเป็นส่วนบุคคล</h1>
                            <div class="text-muted" style="font-size: 14px;">
                                สำหรับระบบศูนย์รับเรื่องร้องเรียนและข้อเสนอแนะ มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-warning border-0" style="background:#fff3cd;">
                        <div class="fw-semibold">สรุปสำคัญ</div>
                        <ul class="mb-0" style="padding-left: 18px;">
                            <li>ข้อมูลของท่านถูกเก็บเป็นความลับ ใช้เพื่อการรับเรื่อง ตรวจสอบ และติดตามผลเท่านั้น</li>
                            <li>กรณี “ไม่เปิดเผยตัวตน” มหาวิทยาลัยอาจไม่สามารถติดต่อกลับเพื่อขอข้อมูลเพิ่มเติมได้</li>
                            <li>หากต้องการให้ติดต่อกลับ กรุณากรอกข้อมูลติดต่อให้ครบถ้วน</li>
                        </ul>
                    </div>

                    {{-- Content sections --}}
                    <div class="privacy-content" style="font-size: 14px; color:#4f5a68; line-height: 1.8;">

                        <h5 class="mt-4" style="color:#7a2430; font-weight:700;">1) ผู้ควบคุมข้อมูลส่วนบุคคล</h5>
                        <p>
                            มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา (“มหาวิทยาลัย”) เป็นผู้ควบคุมข้อมูลส่วนบุคคล
                            ที่เก็บรวบรวมผ่านระบบศูนย์รับเรื่องร้องเรียนและข้อเสนอแนะ
                        </p>

                        <h5 class="mt-4" style="color:#7a2430; font-weight:700;">2) วัตถุประสงค์ในการเก็บรวบรวม ใช้ และ/หรือเปิดเผยข้อมูล</h5>
                        <ul style="padding-left: 18px;">
                            <li>เพื่อรับเรื่องร้องเรียน/ข้อเสนอแนะ และดำเนินการตรวจสอบ พิจารณา แก้ไข หรือประสานงานที่เกี่ยวข้อง</li>
                            <li>เพื่อการติดตามสถานะความคืบหน้าและแจ้งผล (กรณีมีข้อมูลติดต่อ)</li>
                            <li>เพื่อจัดทำรายงานเชิงสถิติและปรับปรุงคุณภาพการให้บริการ (โดยไม่ระบุตัวตน)</li>
                            <li>เพื่อปฏิบัติตามกฎหมาย ระเบียบ หรือคำสั่งของหน่วยงานรัฐที่มีอำนาจ</li>
                        </ul>

                        <h5 class="mt-4" style="color:#7a2430; font-weight:700;">3) ประเภทข้อมูลที่เก็บรวบรวม</h5>
                        <ul style="padding-left: 18px;">
                            <li>ข้อมูลเรื่องร้องเรียน: หัวข้อ รายละเอียด และเอกสารประกอบ (ถ้ามี)</li>
                            <li>ข้อมูลผู้ติดต่อ (ถ้าระบุ): ชื่อ-นามสกุล อีเมล เบอร์โทรศัพท์</li>
                            <li>ข้อมูลทางเทคนิคเพื่อความปลอดภัย: IP Address และข้อมูล User Agent ของอุปกรณ์/เบราว์เซอร์</li>
                        </ul>

                        <h5 class="mt-4" style="color:#7a2430; font-weight:700;">4) การเปิดเผยข้อมูล</h5>
                        <p>
                            มหาวิทยาลัยจะเปิดเผยข้อมูลเท่าที่จำเป็นแก่หน่วยงาน/บุคลากรที่เกี่ยวข้องเพื่อการดำเนินการตามเรื่อง
                            และจะไม่เปิดเผยข้อมูลแก่บุคคลภายนอก เว้นแต่เป็นไปตามกฎหมาย หรือมีคำสั่งจากหน่วยงานที่มีอำนาจตามกฎหมาย
                        </p>

                        <h5 class="mt-4" style="color:#7a2430; font-weight:700;">5) ระยะเวลาการเก็บรักษาข้อมูล</h5>
                        <p>
                            มหาวิทยาลัยจะเก็บรักษาข้อมูลเท่าที่จำเป็นตามวัตถุประสงค์ และ/หรือระยะเวลาที่กฎหมายกำหนด
                            เมื่อพ้นกำหนดจะลบ ทำลาย หรือทำให้ข้อมูลไม่สามารถระบุตัวตนได้ตามกระบวนการที่เหมาะสม
                        </p>

                        <h5 class="mt-4" style="color:#7a2430; font-weight:700;">6) สิทธิของเจ้าของข้อมูลส่วนบุคคล</h5>
                        <ul style="padding-left: 18px;">
                            <li>สิทธิขอเข้าถึงและขอรับสำเนาข้อมูลส่วนบุคคล</li>
                            <li>สิทธิขอแก้ไขข้อมูลให้ถูกต้อง</li>
                            <li>สิทธิขอให้ลบ ทำลาย หรือระงับการใช้ข้อมูลในบางกรณี</li>
                            <li>สิทธิถอนความยินยอม (หากการประมวลผลอาศัยความยินยอม)</li>
                        </ul>

                        <h5 class="mt-4" style="color:#7a2430; font-weight:700;">7) ช่องทางติดต่อ</h5>
                        <p class="mb-0">
                            ศูนย์รับเรื่องร้องเรียนและข้อเสนอแนะ มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา<br>
                            โทรศัพท์: 035-527-6555 ต่อ 1321<br>
                            อีเมล: complaint@aru.ac.th
                        </p>

                        <hr class="my-4">

                        <div class="small text-muted">
                            หมายเหตุ: เอกสารฉบับนี้เป็นข้อความแสดงนโยบายเพื่อการใช้งานระบบรับเรื่องร้องเรียนและข้อเสนอแนะ
                            หากมหาวิทยาลัยมีประกาศ/นโยบายฉบับทางการเผยแพร่ในเว็บไซต์หลัก ให้ยึดถือตามประกาศฉบับนั้นเป็นหลัก
                        </div>
                    </div>
                </div>
            </div>

            {{-- Side card --}}
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-header" style="font-weight:700;">เกี่ยวกับการไม่เปิดเผยตัวตน</div>
                    <div class="card-body">
                        <p class="mb-2" style="font-size:14px;">
                            หากท่านเลือก “ไม่เปิดเผยตัวตน” ระบบจะไม่บันทึกข้อมูลติดต่อของท่าน
                            ทำให้มหาวิทยาลัยอาจไม่สามารถสอบถามข้อมูลเพิ่มเติมได้
                        </p>
                        <ul class="aru-report-list">
                            <li>กรอก “รายละเอียด” ให้ครบถ้วน ชัดเจน</li>
                            <li>แนบหลักฐานที่เกี่ยวข้อง (ถ้ามี)</li>
                            <li>เก็บเลขอ้างอิงและ PIN เพื่อใช้ติดตามเรื่อง</li>
                        </ul>

                        <div class="mt-3">
                            <a href="{{ url('/complaint') }}" class="aru-submit d-inline-block text-decoration-none">
                                กลับไปหน้าศูนย์รับเรื่อง
                            </a>
                        </div>

                        <div class="mt-3 small text-muted">
                            ลิงก์นี้ใช้สำหรับการแสดงนโยบายในหน้าเดียว และรองรับการตรวจ ITA/PDPA
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
