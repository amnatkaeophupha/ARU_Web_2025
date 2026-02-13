@extends('webaru_bs5/layout')

@section('content')
<section class="breadcrumbs-area bg-3 ptb-50 bg-opacity bg-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title" style="font-size:30px;">นโยบายคุกกี้</h2>
                    <ul>
                        <li><a class="active" href="{{ url('/') }}">หน้าแรก</a></li>
                        <li>นโยบายคุกกี้</li>
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
                        <h3 class="mb-3">การใช้คุกกี้บนเว็บไซต์</h3>
                        <p class="mb-2">
                            หน้านี้อธิบายการใช้งานคุกกี้และเทคโนโลยีที่คล้ายกัน เพื่อให้เว็บไซต์ทำงานได้ตามปกติ
                            และช่วยปรับปรุงประสบการณ์การใช้งานของผู้ใช้
                        </p>

                        <h5 class="mt-4">คุกกี้คืออะไร</h5>
                        <p class="mb-2">
                            คุกกี้คือไฟล์ข้อมูลขนาดเล็กที่ถูกจัดเก็บไว้บนอุปกรณ์ของผู้ใช้ เมื่อเข้าชมเว็บไซต์
                            เพื่อช่วยให้เว็บไซต์จดจำการตั้งค่าบางอย่าง หรือทำให้การใช้งานสะดวกยิ่งขึ้น
                        </p>

                        <h5 class="mt-4">คุกกี้ที่จำเป็น (Strictly Necessary Cookies)</h5>
                        <p class="mb-2">
                            เว็บไซต์อาจใช้คุกกี้/ตัวจัดเก็บข้อมูลที่จำเป็นเพื่อการทำงานของเว็บไซต์ เช่น การจดจำสถานะการรับทราบประกาศคุกกี้
                            หรือการทำงานพื้นฐานของระบบ
                        </p>

                        <h5 class="mt-4">การจัดการคุกกี้</h5>
                        <p class="mb-2">
                            ผู้ใช้สามารถจัดการหรือลบคุกกี้ได้ผ่านการตั้งค่าในเว็บเบราว์เซอร์ของท่าน ทั้งนี้การปิดใช้งานคุกกี้บางประเภท
                            อาจส่งผลให้บางส่วนของเว็บไซต์ไม่สามารถทำงานได้ตามปกติ
                        </p>

                        <div class="mt-4">
                            <a href="{{ route('privacy.policy') }}" class="btn btn-outline-secondary btn-sm">อ่านนโยบายความเป็นส่วนตัว</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
