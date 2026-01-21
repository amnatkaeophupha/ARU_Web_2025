@extends('webaru_bs3/home_layout')

@section('content')
<style>
.top-courses .blog-all {
    background: #fff;
    border-radius: 12px;
    border: 1px solid #e2e2e2;
    box-shadow: 0 10px 28px rgba(0, 0, 0, 0.12), 0 2px 6px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.top-courses .blog-all:hover {
    transform: translateY(-4px);
    box-shadow: 0 16px 40px rgba(0, 0, 0, 0.18), 0 6px 14px rgba(0, 0, 0, 0.12);
}
.top-courses .aru-blog-img {
    background: transparent;
    padding: 0;
}
.top-courses .aru-blog-img img {
    display: block;
    width: 100%;
    border-radius: 8px;
    border: 0;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
}
.top-courses .blog-details {
    background: #f7f7f7;
}
</style>
<section class="breadcrumbs-area bg-3 ptb-50 bg-opacity bg-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title" style="font-size:30px;b">ชุดอัตลักษณ์มหาวิทยาลัยฯ</h2>
                    <ul>
                        <li>
                            <a class="active" href="{{url('/')}}">หน้าแรก</a>
                        </li>
                        <li>
                            <a>แนะนำมหาวิทยาลัย</a>
                        </li>
                        <li>ชุดอัตลักษณ์มหาวิทยาลัยฯ</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="aru-details-area pt-50">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center mb-30">
                    <img src="{{url('webaru_bs5/aru_images/logo')}}/2025_aru_bg_white.jpg" alt="aru" >
                    <p>อัตลักษณ์ มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา</p>
                    <div class="separator my mtb-15">
                        <i class="icofont icofont-hat-alt" style="background-color:#fff"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        <!-- Start page content -->
        <section class="top-courses pt-20 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="blog-all mrg-xs">
                            <div class="aru-blog-img clearfix">
                                <img src="{{url('webaru_bs5/aru_images/symbol/symbol_download_1.jpg')}}">
                            </div>
                            <div class="blog-details gray-bg">
                                <h3><a href="#">ตราสัญลักษณ์</a></h3>
                                <div class="blog-meta">
                                </div>
                                <p>ตราสัญลักษณ์ มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา</p>
                                <a class="button extra-small" href="{{url('webaru_bs5/aru_images/symbol/logo-aru.zip')}}">
                                    <span>Download</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="blog-all mrg-xs">
                            <div class="aru-blog-img">
                                <img src="{{url('webaru_bs5/aru_images/symbol/symbol_download_2.jpg')}}">
                            </div>
                            <div class="blog-details gray-bg">
                                <h3><a href="#">ตราสัญลักษณ์รอง</a></h3>
                                <div class="blog-meta">
                                </div>
                                <p>ตราสัญลักษณ์รอง มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา</p>
                                <a class="button extra-small" href="{{url('webaru_bs5/aru_images/symbol/ARU_SUB-LOGO-20240723T124923Z-001.zip')}}">
                                    <span>Download</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="blog-all mrg-xs">
                            <div class="aru-blog-img">
                                <img src="{{url('webaru_bs5/aru_images/symbol/symbol_download_3.jpg')}}">
                            </div>
                            <div class="blog-details gray-bg">
                                <h3><a href="#">ตราสัญลักษณ์รองหน่วยงาน</a></h3>
                                <div class="blog-meta">
                                </div>
                                <p>ตราสัญลักษณ์รอง ของหน่วยงานภายในมหาวิทยาลัย</p>
                                <a class="button extra-small" href="{{url('webaru_bs5/aru_images/symbol/FACALTY LOGO-20240723T124926Z-001.zip')}}">
                                    <span>Download</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="blog-all mrg-xs">
                            <div class="aru-blog-img">
                                <img src="{{url('webaru_bs5/aru_images/symbol/symbol_download_4.jpg')}}">
                            </div>
                            <div class="blog-details gray-bg">
                                <h3><a href="#">ชุดตัวอักษร</a></h3>
                                <div class="blog-meta">
                                </div>
                                <p>Line seed san / TH Sarabun มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา </p>
                                <a class="button extra-small" href="{{url('webaru_bs5/aru_images/symbol/FONT-20240723T155613Z-001.zip')}}">
                                    <span>Download</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="blog-all mrg-xs">
                            <div class="aru-blog-img">
                                <img src="{{url('webaru_bs5/aru_images/symbol/symbol_download_5.jpg')}}">
                            </div>
                            <div class="blog-details gray-bg">
                                <h3><a href="#">เทมเพลต powerpoint </a></h3>
                                <div class="blog-meta">
                                </div>
                                <p>เทมเพลต powerpoint มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา </p>
                                <a class="button extra-small" href="{{url('webaru_bs5/aru_images/symbol/TemplateARU-2568.pptx')}}">
                                    <span>Download</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="blog-all mrg-xs">
                            <div class="aru-blog-img">
                                <img src="{{url('webaru_bs5/aru_images/symbol/symbol_download_6.jpg')}}">
                            </div>
                            <div class="blog-details gray-bg">
                                <h3><a href="#">สัญลักษณ์ ครบรอบ 120 ปี</a></h3>
                                <div class="blog-meta">
                                    {{-- <span class="published3">
                                        <a href="#"><i class="icofont icofont-eye"></i> 12</a>
                                    </span>
                                    <span class="published4">
                                        <a href="#"><i class="icofont icofont-comment"></i> 32</a>
                                    </span> --}}
                                </div>
                                <p>ตราสัญลักษณ์ ครบรอบ 120 ปี มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา</p>
                                <a class="button extra-small" href="{{url('webaru_bs5/aru_images/symbol/120thARULOGO.ai')}}">
                                    <span>Download</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End page content -->
@endsection
