<section class="aru-complaint-hero">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="aru-breadcrumb">
                    <a href="{{ url('/') }}">หน้าแรก</a> / <span>ศูนย์รับเรื่องร้องเรียนและข้อเสนอแนะ</span>
                </div>
                <h1 class="aru-hero-title">ศูนย์รับเรื่องร้องเรียนและข้อเสนอแนะ</h1>
                <p class="aru-hero-subtitle">ช่องทางการสื่อสารที่ปลอดภัย โปร่งใส และตอบกลับอย่างเป็นธรรม</p>
                <div class="aru-contact-card">
                    <h6>ติดต่อศูนย์รับเรื่องร้องเรียน</h6>
                    <ul>
                        <li>โทรศัพท์: 035-527-6555 ต่อ 1321</li>
                        <li>อีเมล: complaint@aru.ac.th</li>
                        <li>เวลาทำการ: จันทร์ - ศุกร์ 08:30 - 16:30 น.</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="aru-hero-card">
                    <h5 class="mb-2">ติดตามเรื่องร้องเรียน</h5>
                    <p class="mb-3">กรอกเลขอ้างอิงและรหัสติดตาม (PIN) เพื่อดูสถานะความคืบหน้า</p>

                    <form method="get" action="{{ route('complaint.tracking') }}" class="row g-2">
                        <div class="col-12">
                            <input type="text" name="case_no" class="form-control aru-input"
                                placeholder="เลขอ้างอิง เช่น ARU-2026-000123" required>
                        </div>
                        <div class="col-12">
                            <input type="password" name="pin" class="form-control aru-input"
                                placeholder="รหัสติดตาม (PIN)" required>
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

            </div>
        </div>
    </div>
</section>
