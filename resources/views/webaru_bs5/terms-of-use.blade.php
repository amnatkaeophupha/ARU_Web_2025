@extends('webaru_bs5/layout')

@section('content')
<section class="breadcrumbs-area bg-3 ptb-50 bg-opacity bg-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title" style="font-size:30px;">ข้อกำหนดการใช้งาน</h2>
                    <ul>
                        <li><a class="active" href="{{ url('/') }}">หน้าแรก</a></li>
                        <li>ข้อกำหนดการใช้งาน</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="aru-details-area pt-30 pb-50 cookie-policy-area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 col-xl-9 mx-auto">
                <div class="aru-visual-inner cookie-policy-card">
                    <div class="aru-event-text-img cookie-policy-content">
                        <h3 class="mb-3">ข้อกำหนดการใช้งานเว็บไซต์</h3>
                        <p class="mb-2">
                            หน้านี้เป็นข้อกำหนดการใช้งานเว็บไซต์ เพื่อให้ผู้ใช้งานเข้าใจแนวทางการใช้งานเว็บไซต์อย่างเหมาะสม
                            และช่วยให้การใช้งานเป็นไปอย่างปลอดภัย
                        </p>

                        <h5 class="mt-4">การใช้งานเว็บไซต์</h5>
                        <p class="mb-2">
                            ผู้ใช้งานตกลงจะใช้เว็บไซต์ตามกฎหมาย และไม่กระทำการใด ๆ ที่อาจก่อให้เกิดความเสียหายต่อระบบ ความปลอดภัย
                            หรือสิทธิของผู้อื่น
                        </p>

                        <h5 class="mt-4">ความถูกต้องของข้อมูล</h5>
                        <p class="mb-2">
                            มหาวิทยาลัยพยายามจัดทำข้อมูลให้ถูกต้องและเป็นปัจจุบัน อย่างไรก็ดี ข้อมูลบางส่วนอาจมีการเปลี่ยนแปลงได้
                            โดยไม่ต้องแจ้งให้ทราบล่วงหน้า
                        </p>

                        <h5 class="mt-4">ลิงก์ไปยังเว็บไซต์ภายนอก</h5>
                        <p class="mb-2">
                            เว็บไซต์อาจมีลิงก์ไปยังเว็บไซต์ของหน่วยงานภายนอก ซึ่งอยู่ภายใต้นโยบายของเว็บไซต์นั้น ๆ
                            มหาวิทยาลัยไม่รับผิดชอบต่อเนื้อหาหรือการดำเนินการของเว็บไซต์ภายนอก
                        </p>

                        <div class="mt-4 d-flex flex-wrap gap-2">
                            <a href="{{ route('privacy.policy') }}" class="btn btn-outline-secondary btn-sm">นโยบายความเป็นส่วนบุคคล</a>
                            <a href="{{ route('cookie.policy') }}" class="btn btn-outline-secondary btn-sm">นโยบายคุกกี้</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

