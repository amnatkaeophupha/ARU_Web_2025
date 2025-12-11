@extends('webaru_bs3/home_layout')

@section('content')
<!-- Start of slider area -->
<div class="slider-area">
    <div class="slider-active">
        <div class="slider-all">
            <img src="{{url('eduguide')}}/images/slider/1.jpg" alt="">
            <div class="slider-text-wrapper">
                <div class="table">
                    <div class="table-cell">
                        <div class="slider-text animated">
                            <h1>Education For Everyone</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <br> aliqua.  minim veniam, quis nostrud exercitation ullamco </p>
                            <a class="button extra-small mb-20" href="#">
                                <span>Apply Now</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-all">
            <img src="{{url('eduguide')}}/images/slider/1.jpg" alt="">
            <div class="slider-text-wrapper">
                <div class="table">
                    <div class="table-cell">
                        <div class="slider-text animated">
                            <h1>Education For Everyone</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <br> aliqua.  minim veniam, quis nostrud exercitation ullamco </p>
                            <a class="button extra-small mb-20" href="#">
                                <span>Apply Now</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-all">
            <img src="{{url('eduguide')}}/images/slider/1.jpg" alt="">
            <div class="slider-text-wrapper">
                <div class="table">
                    <div class="table-cell">
                        <div class="slider-text animated">
                            <h1>Education For Everyone</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <br> aliqua.  minim veniam, quis nostrud exercitation ullamco </p>
                            <a class="button extra-small mb-20" href="#">
                                <span>Apply Now</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="slider-area">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
    <div class="item active">
        <img src="{{url('eduguide')}}/images/slider/1.jpg" alt="Slide 1">
        <div class="carousel-caption">
        <h3>Slide 1</h3>
        <p>This is the first slide.</p>
        </div>
    </div>

    <div class="item">
        <img src="{{url('eduguide')}}/images/slider/1.jpg" alt="Slide 2">
        <div class="carousel-caption">
        <h3>Slide 2</h3>
        <p>This is the second slide.</p>
        </div>
    </div>

    <div class="item">
        <img src="{{url('eduguide')}}/images/slider/1.jpg" alt="Slide 3">
        <div class="carousel-caption">
        <h3>Slide 3</h3>
        <p>This is the third slide.</p>
        </div>
    </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
    </a>
</div>
</div> --}}
<!-- End of slider area -->


<!-- Start of Banner Blog Area -->
<section class="banner-blog-area ptb-20 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                <div class="blog-all mrg-xs">
                    {{-- <div class="blog-img">
                        <img src="{{url('webaru_bs3/home_banner_1.png')}}" alt="" >
                    </div> --}}
                    <div class="blog-details" style="border:#ccc 1px solid; padding:10px;">
                        <h3><a href="#">ศูนย์รับข้อร้องเรียน</a></h3>
                        <div class="blog-meta">
                            <span class="published3">
                                <a href="#"><i class="icofont icofont-eye"></i> 34</a>
                            </span>
                            <span class="published4">
                                <a href="#"><i class="icofont icofont-comment"></i> 20</a>
                            </span>
                        </div>
                        {{-- <p>Lorem ipsum dolor sit amet, consect elit, sed do eiusmod </p> --}}
                        <a class="button extra-small" href="#">
                            <span>เข้าสู่ระบบร้องเรียน</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                <div class="blog-all mrg-xs">
                    {{-- <div class="blog-img">
                        <a href="#"><img class="img-responsive" src="{{url('webaru_bs3/home_banner_22.png')}}" alt="" ></a>
                    </div> --}}
                    <div class="blog-details" style="border:#ccc 1px solid; padding:10px;">
                        <h3><a href="#">ร้องเรียนการทุจริต</a></h3>
                        <div class="blog-meta">
                            <span class="published3">
                                <a href="#"><i class="icofont icofont-eye"></i> 34</a>
                            </span>
                            <span class="published4">
                                <a href="#"><i class="icofont icofont-comment"></i> 20</a>
                            </span>
                        </div>
                        {{-- <p>Lorem ipsum dolor sit amet, consect elit, sed do eiusmod </p> --}}
                        <a class="button extra-small" href="#">
                            <span>แจ้งเรื่องร้องเรียน</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                <div class="blog-all mrg-sm mrg-xs">
                    {{-- <div class="blog-img">
                        <a href="#"><img class="img-responsive" src="{{url('webaru_bs3/home_banner_333.png')}}" style="height: 204" ></a>
                    </div> --}}
                    <div class="blog-details" style="border:#ccc 1px solid; padding:10px;">
                        <h3><a href="#">Q&A / รับฟังความคิดเห็น</a></h3>
                        <div class="blog-meta">
                            <span class="published3">
                                <a href="#"><i class="icofont icofont-eye"></i> 34</a>
                            </span>
                            <span class="published4">
                                <a href="#"><i class="icofont icofont-comment"></i> 20</a>
                            </span>
                        </div>
                        {{-- <p>Lorem ipsum dolor sit amet, consect elit, sed do eiusmod </p> --}}
                        <a class="button extra-small" href="#">
                            <span>เว็บบอร์ด</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                <div class="blog-all mrg-sm mrg-xs">
                    {{-- <div class="blog-img">
                        <a href="#"><img class="img-responsive" src="{{url('eduguide')}}/images/blog/3.jpg" alt="" ></a>
                    </div> --}}
                    <div class="blog-details" style="border:#ccc 1px solid; padding:10px;">
                        <h3><a href="#">สายตรงอธิการบดี</a></h3>
                        <div class="blog-meta">
                            <span class="published3">
                                <a href="#"><i class="icofont icofont-eye"></i> 34</a>
                            </span>
                            <span class="published4">
                                <a href="#"><i class="icofont icofont-comment"></i> 20</a>
                            </span>
                        </div>
                        {{-- <p>Lorem ipsum dolor sit amet, consect elit, sed do eiusmod </p> --}}
                        <a class="button extra-small" href="#">
                            <span>ติดต่ออธิการบดี</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Banner Blog Area -->


<!-- Start of ประชาสัมพันธ์ข่าวสาร -->
</style>
<div class="event-area ptb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center mb-60">
                    <img src="{{url('webaru_bs3')}}/2025_aru_bg_white.jpg" alt="aru" >
                    <h1 style="font-family:'sarabun',sans-serif;">ประชาสัมพันธ์</h1>
                    <p>ประชาสัมพันธ์ข่าวสารมหาวิทยาลัยและหน่วยงานต่างๆ </p>
                    <div class="separator my mtb-15">
                        <i class="icofont icofont-hat-alt"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="event-text-img">
                    <div class="aru-public-visual-inner">
                        <img src="{{url('webaru_bs3/2025-10-27-140003.png')}}" class="img-fluid img-thumbnail popup-image" data-link="https://www.aru.ac.th/">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="event-text-img mrg-sm2 mrg-xs4">
                    <div class="aru-public-visual-inner">
                        <img src="{{url('webaru_bs3/2025-11-27-110738.jpg')}}" class="img-fluid img-thumbnail popup-image" data-link="https://www.aru.ac.th/">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="event-text-img mt-40">
                    <div class="aru-public-visual-inner">
                        <img src="{{url('webaru_bs3/2024-10-28-161502.gif')}}" class="img-fluid img-thumbnail popup-image">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="event-text-img mt-40">
                    <div class="aru-public-visual-inner">
                        <img src="{{url('webaru_bs3/2024-10-28-161502.gif')}}" class="img-fluid img-thumbnail">
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-md-12 text-center">
                <a class="button extra-small news-btn mt-60" href="#">
                    <span  style="font-family:'sarabun',sans-serif;">View All News</span>
                </a>
            </div>
        </div> --}}
    </div>
</div>
<!-- Modal Image Popup -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="image-frame position-relative text-center">
                    <img id="modalImage" src="" class="img-fluid">

                    <a id="modalDetailLink"
                       href="#"
                       target="_blank"
                       class="btn btn-warning btn-sm mt-3 detail-btn"
                       style="font-family:'sarabun',sans-serif; position: absolute; bottom: 10px; right: 10px; z-index: 10; ">
                        ดูรายละเอียดเพิ่มเติม
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of ประชาสัมพันธ์ข่าวสาร -->


<!-- Start of Aru News -->
<style>
    .aru-news-card {
        background: #ffffff;
        border: 1px solid #e5e5e5;
        border-radius: 4px;
        padding: 15px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.04);
    }

    /* ปุ่มอ่านฉบับเต็ม เว้นระยะด้านบนเล็กน้อย */
    .aru-news-card .aru-read-btn {
        margin-top: 20px;
    }

    /* การ์ดในพื้น navy-bg ให้ขอบดูเบาลง */
    .service-from.navy-bg .aru-news-card {
        background: transparent;
        border-color: rgba(255,255,255,0.3);
        box-shadow: none;
    }

    .button.aru-news-extra-small {
        background: #8B0000 !important;   /* สีแดงเข้ม ARU */
        color: #fff !important;
        border: none;
        border-radius: 4px;
        padding: 6px 15px;
    }

    .button.aru-news-extra-small:hover {
        background: #600000 !important;   /* สีแดงเข้มเข้มขึ้นเมื่อ hover */
        color: #fff !important;
    }

</style>
<section class="service-area gray-bg ptb-110">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

        const pdfFiles = [
            { url: "{{ url('webaru_bs3/arunews-2.pdf') }}", canvasId: "pdf-canvas-1" },
            { url: "{{ url('webaru_bs3/arunews-3.pdf') }}", canvasId: "pdf-canvas-2" },
            { url: "{{ url('webaru_bs3/arunews-4.pdf') }}", canvasId: "pdf-canvas-3" }
        ];

        const scale = 1.5;

        pdfFiles.forEach(pdfFile => {
            const loadingTask = pdfjsLib.getDocument(pdfFile.url);
            loadingTask.promise.then(function(pdf) {
                pdf.getPage(1).then(function(page) {
                    const viewport = page.getViewport({ scale: scale });
                    const canvas = document.getElementById(pdfFile.canvasId);
                    const context = canvas.getContext('2d');

                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    page.render({
                        canvasContext: context,
                        viewport: viewport
                    });
                });
            });
        });
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center mb-60">
                    <img src="{{url('webaru_bs3')}}/2025_aru_title.png" alt="aru" >
                    <h1 class="uppercase">ARU NEWS</h1>
                    <p>เอกสารเพื่อการเผยแพร่และประชาสัมพันธ์ข่าวสาร</p>
                    <div class="separator my mtb-15">
                        <i class="icofont icofont-hat-alt"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="service-all white-bg" >
                    <h2 style="margin-bottom:30px;">ARU NEWS</h2>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="service-left" style="margin:0px;">
                                <a href="{{url('webaru_bs3/arunews-2.pdf')}}" target="_blank">
                                <canvas id="pdf-canvas-1" style="border:1px solid #ccc;width:100%;"></canvas>
                                </a>
                            </div>
                            <div class="text-right aru-read-btn">
                                <a href="{{url('webaru_bs3/arunews-2.pdf')}}"
                                    target="_blank"
                                    class="button aru-news-extra-small">
                                    <span style="font-family:'sarabun',sans-serif;">อ่านฉบับเต็ม</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-from navy-bg" style="padding-top:35px;padding-bottom:20px;">
                    <h3 style="font-family: 'sarabun', sans-serif;">ฉบับย้อนหลัง 1</h3>
                    <a href="{{url('webaru_bs3/arunews-3.pdf')}}" target="_blank">
                    <canvas id="pdf-canvas-2" style="border:1px solid #ccc;width:100%;"></canvas>
                    </a>
                    <div class="text-right aru-read-btn">
                        <a href="{{url('webaru_bs3/arunews-3.pdf')}}"
                            target="_blank"
                            class="button aru-news-extra-small">
                            <span style="font-family:'sarabun',sans-serif;">อ่านฉบับเต็ม</span>
                        </a>
                    </div>
                </div>
                <div class="service-from navy-bg" style="margin-top:25px;padding-top:35px;padding-bottom:20px;">
                    <h3 style="font-family: 'sarabun', sans-serif;">ฉบับย้อนหลัง 2</h3>
                    <a href="{{url('webaru_bs3/arunews-4.pdf')}}" target="_blank">
                    <canvas id="pdf-canvas-3" style="border:1px solid #ccc;width:100%;"></canvas>
                    </a>
                    <div class="text-right aru-read-btn">
                        <a href="{{url('webaru_bs3/arunews-4.pdf')}}"
                            target="_blank"
                            class="button aru-news-extra-small ">
                            <span style="font-family:'sarabun',sans-serif;">อ่านฉบับเต็ม</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Aru News -->


<!-- Start of Tabs -->
<style>
    .dayTopic {
        width: 70px;
        float: left;
        text-align: center;
        border-radius: 10px;
        overflow: hidden;
        font-size: 16px;
        margin-right: 15px;
        font-family:'sarabun',sans-serif;
    }
    .listTopic {
        display: flex;
        align-items: flex-start;
        padding: 10px 0px 0px 0px;
    }

    .dayTopic {
        flex: 0 0 70px;
    }

    .topic-text {
        margin-left: 0px;
        flex: 1;
    }
    .topic-text h4 {
        margin-top: 0;
        font-size: 18px;
        font-family:'sarabun',sans-serif;
    }
    .topic-text p {

        font-size: 13px;
        font-family:'sarabun',sans-serif;
    }

    .dayTopic .day,
    .dayTopic .year {
        padding: 3px 0;
        display:block;
        width:100%;   /* ให้กินเต็มพื้นที่ */
    }

    /* สีประจำวัน */
    /* .day-sun { border:1px solid #ffb3b3; }
    .day-sun .year { background:#ff9e9e; color:#fff; }

    .day-mon { border:1px solid #F2D768; }
    .day-mon .year { background:#F2C94C; color:#fff; }

    .day-tue { border:1px solid #FF9EC4; }
    .day-tue .year { background:#FF9EC4; color:#fff; }

    .day-wed { border:1px solid #78C67A; }
    .day-wed .year { background:#4CAF50; color:#fff; }

    .day-thu { border:1px solid #FFA860; }
    .day-thu .year { background:#FF8A3D; color:#fff; }

    .day-fri { border:1px solid #6EC6FF; }
    .day-fri .year { background:#42A5F5; color:#fff; }

    .day-sat { border:1px solid #C39BD3; }
    .day-sat .year { background:#A569BD; color:#fff; } */

    .day-sun { border:1px solid #FFB3B3; }
    .day-sun .year { background:#FF9E9E; color:#fff; }

    .day-mon { border:1px solid #F6E29B; }
    .day-mon .year { background:#F3D97D; color:#fff; }

    .day-tue { border:1px solid #FFB8D9; }
    .day-tue .year { background:#FFA3CF; color:#fff; }

    .day-wed { border:1px solid #A8E5AC; }
    .day-wed .year { background:#8DDC92; color:#fff; }

    .day-thu { border:1px solid #FFC999; }
    .day-thu .year { background:#FFB780; color:#fff; }

    .day-fri { border:1px solid #A6DDFF; }
    .day-fri .year { background:#8CCFFF; color:#fff; }

    .day-sat { border:1px solid #D9C2EA; }
    .day-sat .year { background:#C8A8E2; color:#fff; }
</style>
<div class="event-area ptb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center mb-20">
                    <img src="{{url('webaru_bs3')}}/2025_aru_bg_white.jpg">
                    <h1 style="font-family:'sarabun',sans-serif;">ประชาสัมพันธ์</h1>
                    <p>ประชาสัมพันธ์ข่าวสารมหาวิทยาลัยและหน่วยงานต่างๆ </p>
                    <div class="separator my mtb-15">
                        <i class="icofont icofont-hat-alt"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="event-text-img">
                    {{-- <div class="aru-public-visual-inner"> --}}
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">ประชาสัมพันธ์ทั่วไป</a></li>
                            <li><a href="#tab3" data-toggle="tab">จัดซื้อจัดจ้าง</a></li>
                            <li><a href="#tab5" data-toggle="tab">รับสมัครงาน</a></li>
                            <li><a href="#tab99" data-toggle="tab">ข่าวสารนักศึกษา</a></li>
                            <li><a href="#tab100" data-toggle="tab">ปฏิทินการศึกษา(ภาคปกติ)</a></li>
                            <li><a href="#tab101" data-toggle="tab">ปฏิทินการศึกษา(กศ.บป)</a></li>
                        </ul>

                        <div class="tab-content">
                            <!-- แท็บประชาสัมพันธ์ -->
                            <div class="tab-pane active" id="tab1">
                                <article class="has-divider" style="border-bottom: none !important;">
                                <ul class="list-unstyled">
                                    <li class="listTopic" style="border-bottom:1px dashed #FFB3B3;">
                                        <div class="dayTopic day-sun">
                                            <div class="day">05 มี.ค.</div>
                                            <div class="year">2568</div>
                                        </div>
                                        <div class="topic-text">
                                            <h4><a href="#">ประกาศรายชื่อผู้ผ่านการสอบสัมภาษณ์</a></h4>
                                            <p>รายละเอียดเพิ่มเติมเกี่ยวกับการสอบสัมภาษณ์และการขึ้นทะเบียนนักศึกษา</p>
                                        </div>
                                    </li>
                                    <li class="listTopic" style="border-bottom:1px dashed #F6E29B;">
                                        <div class="dayTopic day-mon">
                                            <div class="day">05 มี.ค.</div>
                                            <div class="year">2568</div>
                                        </div>
                                        <div class="topic-text">
                                            <h4><a href="#">ประกาศรายชื่อผู้ผ่านการสอบสัมภาษณ์</a></h4>
                                            <p>รายละเอียดเพิ่มเติมเกี่ยวกับการสอบสัมภาษณ์และการขึ้นทะเบียนนักศึกษา</p>
                                        </div>
                                    </li>
                                    <li class="listTopic" style="border-bottom:1px dashed #FF9EC4;">
                                        <div class="dayTopic day-tue">
                                            <div class="day">05 มี.ค.</div>
                                            <div class="year">2568</div>
                                        </div>
                                        <div class="topic-text">
                                            <h4><a href="#">ประกาศรายชื่อผู้ผ่านการสอบสัมภาษณ์</a></h4>
                                            <p>รายละเอียดเพิ่มเติมเกี่ยวกับการสอบสัมภาษณ์และการขึ้นทะเบียนนักศึกษา</p>
                                        </div>
                                    </li>
                                    <li class="listTopic" style="border-bottom:1px dashed #A8E5AC;">
                                        <div class="dayTopic day-wed">
                                            <div class="day">05 มี.ค.</div>
                                            <div class="year">2568</div>
                                        </div>
                                        <div class="topic-text">
                                            <h4><a href="#">ประกาศรายชื่อผู้ผ่านการสอบสัมภาษณ์</a></h4>
                                            <p>รายละเอียดเพิ่มเติมเกี่ยวกับการสอบสัมภาษณ์และการขึ้นทะเบียนนักศึกษา</p>
                                        </div>
                                    </li>
                                    <li class="listTopic" style="border-bottom:1px dashed #FFC999;">
                                        <div class="dayTopic day-thu">
                                            <div class="day">05 มี.ค.</div>
                                            <div class="year">2568</div>
                                        </div>
                                        <div class="topic-text">
                                            <h4><a href="#">ประกาศรายชื่อผู้ผ่านการสอบสัมภาษณ์</a></h4>
                                            <p>รายละเอียดเพิ่มเติมเกี่ยวกับการสอบสัมภาษณ์และการขึ้นทะเบียนนักศึกษา</p>
                                        </div>
                                    </li>
                                    <li class="listTopic" style="border-bottom:1px dashed #A6DDFF;">
                                        <div class="dayTopic day-fri">
                                            <div class="day">05 มี.ค.</div>
                                            <div class="year">2568</div>
                                        </div>
                                        <div class="topic-text">
                                            <h4><a href="#">ประกาศรายชื่อผู้ผ่านการสอบสัมภาษณ์</a></h4>
                                            <p>รายละเอียดเพิ่มเติมเกี่ยวกับการสอบสัมภาษณ์และการขึ้นทะเบียนนักศึกษา</p>
                                        </div>
                                    </li>
                                    <li class="listTopic" style="border-bottom:1px dashed #D9C2EA;">
                                        <div class="dayTopic day-sat">
                                            <div class="day">05 มี.ค.</div>
                                            <div class="year">2568</div>
                                        </div>
                                        <div class="topic-text">
                                            <h4><a href="#">ประกาศรายชื่อผู้ผ่านการสอบสัมภาษณ์</a></h4>
                                            <p>รายละเอียดเพิ่มเติมเกี่ยวกับการสอบสัมภาษณ์และการขึ้นทะเบียนนักศึกษา</p>
                                        </div>
                                    </li>
                                </ul>
                                </article>
                            </div>

                            <!-- แท็บจัดซื้อจัดจ้าง -->
                            <div class="tab-pane" id="tab3">
                                <article class="has-divider" style="border-bottom: none !important;">
                                <ul class="list-unstyled">
                                </ul>
                                </article>
                            </div>

                            <!-- แท็บรับสมัครงาน -->
                            <div class="tab-pane" id="tab5">
                                <article class="has-divider">
                                    เนื้อหา: รับสมัครงาน
                                </article>
                            </div>

                            <!-- แท็บข่าวนักศึกษา -->
                            <div class="tab-pane" id="tab99">
                                <article class="has-divider">
                                    เนื้อหา: ข่าวสารนักศึกษา
                                </article>
                            </div>
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <a class="button extra-small news-btn mt-20" href="#" >
                    <span style="font-family:'sarabun',sans-serif;font-size:14px;">ดูข่าวทั้งหมด</span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- End of Tabs -->


    {{-- <section class="service-area gray-bg ptb-110">
        <!-- Demo Section    -->
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="service-all white-bg">
                        <h2>We Have 65 Years <br>Experience In This Passion</h2>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="service-left">
                                    <div class="offer-icon">
                                        <i class="icofont icofont-support"></i>
                                    </div>
                                    <div class="offer-text">
                                        <h3>Quick Help</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur ad asese do eiusmod tempor incididunt utarla oreetdolo magna aliqua</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="service-left mrg-xs">
                                    <div class="offer-icon">
                                        <i class="icofont icofont-world"></i>
                                    </div>
                                    <div class="offer-text">
                                        <h3>In Your Country</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur ad asese do eiusmod tempor incididunt utarla oreetdolo magna aliqua</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="service-left service-mrg mrg-xs">
                                    <div class="offer-icon">
                                        <i class="icofont icofont-gift"></i>
                                    </div>
                                    <div class="offer-text">
                                        <h3>Scholarship For Students</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur ad asese do eiusmod tempor incididunt utarla oreetdolo magna aliqua</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="service-left service-mrg mrg-xs">
                                    <div class="offer-icon">
                                        <i class="icofont icofont-football-american"></i>
                                    </div>
                                    <div class="offer-text">
                                        <h3>Sports & Events</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur ad asese do eiusmod tempor incididunt utarla oreetdolo magna aliqua</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-from navy-bg">
                        <h3>Courses Search</h3>
                        <form class="ordering">
                            <div class="orderby-wrapper">
                                <label>Select Degree*</label>
                                <select name="orderby" class="orderby">
                                    <option value="menu_order">GED</option>
                                    <option value="popularity" selected='selected'>HS Diploma</option>
                                    <option value="rating">Associate Degree</option>
                                    <option value="date">Bachelor's Degree</option>
                                    <option value="price">Master's Degree</option>
                                    <option value="price-desc">Doctorate/Prof Degree</option>
                                </select>
                            </div>
                            <div class="orderby-wrapper mrg-chosen">
                                <label>Ceategory*</label>
                                <select name="orderby" class="orderby">
                                    <option value="menu_order">GED</option>
                                    <option value="popularity" selected='selected'>HS Diploma</option>
                                    <option value="rating">Associate Degree</option>
                                    <option value="date">Bachelor's Degree</option>
                                    <option value="price">Master's Degree</option>
                                    <option value="price-desc">Doctorate/Prof Degree</option>
                                </select>
                            </div>
                            <div class="orderby-wrapper">
                                <label>Subject*</label>
                                <select name="orderby" class="orderby">
                                    <option value="menu_order">GED</option>
                                    <option value="popularity" selected='selected'>HS Diploma</option>
                                    <option value="rating">Associate Degree</option>
                                    <option value="date">Bachelor's Degree</option>
                                    <option value="price">Master's Degree</option>
                                    <option value="price-desc">Doctorate/Prof Degree</option>
                                </select>
                            </div>
                            <div class="chosen-submit text-center">
                                <a class="button extra-small" href="#">
                                    <span>search</span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}



    {{-- <section class="banner-blog-area ptb-110">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-3 col-sm-6">
                    <div class="blog-all mrg-xs">
                        <div class="aru-blog-img-gallery">
                            <a href="#"><img src="{{url('webaru_bs3/G-1.png')}}"></a>
                        </div>
                        <div class="blog-details">
                            <h3><a href="#">Political Science</a></h3>
                            <div class="blog-meta">
                                <span class="published3">
                                    <a href="#"><i class="icofont icofont-eye"></i> 34</a>
                                </span>
                                <span class="published4">
                                    <a href="#"><i class="icofont icofont-comment"></i> 20</a>
                                </span>
                            </div>
                            <p>ลอยกระทงอยุธยา อนุรักษ์สายน้ำกรุงเก่า ประจำปีงบประมาณ พ.ศ. 2569 </p>
                            <a class="button extra-small" href="#">
                                <span>Learn Now</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 col-sm-6">
                    <div class="blog-all mrg-xs">
                        <div class="aru-blog-img-gallery">
                            <a href="#"><img src="{{url('webaru_bs3/G-3.png')}}"></a>
                        </div>
                        <div class="blog-details">
                            <h3><a href="#">Political Science</a></h3>
                            <div class="blog-meta">
                                <span class="published3">
                                    <a href="#"><i class="icofont icofont-eye"></i> 34</a>
                                </span>
                                <span class="published4">
                                    <a href="#"><i class="icofont icofont-comment"></i> 20</a>
                                </span>
                            </div>
                            <p>อัญเชิญผ้าพระกฐินพระราชทาน ประจำปี 2568 ทอดถวาย ณ วัดไชโยวรวิหาร จังหวัดอ่างทอง </p>
                            <a class="button extra-small" href="#">
                                <span>Learn Now</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 col-sm-6">
                    <div class="blog-all mrg-sm mrg-xs">
                        <div class="blog-img">
                            <a href="#"><img src="{{url('webaru_bs3/G-2.png')}}" alt="" ></a>
                        </div>
                        <div class="blog-details">
                            <h3><a href="#">Micro Biology</a></h3>
                            <div class="blog-meta">
                                <span class="published3">
                                    <a href="#"><i class="icofont icofont-eye"></i> 34</a>
                                </span>
                                <span class="published4">
                                    <a href="#"><i class="icofont icofont-comment"></i> 20</a>
                                </span>
                            </div>
                            <p>พิธีพระราชทานปริญญาบัตรแก่บัณฑิตที่สำเร็จการศึกษาจากมหาวิทยาลัยราชภัฏพระนครศรีอยุธยา ประจำปีการศึกษา 2566 </p>
                            <a class="button extra-small" href="#">
                                <span>Learn Now</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 col-sm-6">
                    <div class="blog-all mrg-sm mrg-xs">
                        <div class="blog-img">
                            <a href="#"><img src="{{url('eduguide')}}/images/blog/3.jpg" alt="" ></a>
                        </div>
                        <div class="blog-details">
                            <h3><a href="#">Computer Science</a></h3>
                            <div class="blog-meta">
                                <span class="published3">
                                    <a href="#"><i class="icofont icofont-eye"></i> 34</a>
                                </span>
                                <span class="published4">
                                    <a href="#"><i class="icofont icofont-comment"></i> 20</a>
                                </span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consect elit, sed do eiusmod </p>
                            <a class="button extra-small" href="#">
                                <span>Learn Now</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <div class="countdown-area bg-1 ptb-110 bg-opacity bg-relative">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-7 col-xs-12 text-center">
                    <div class="countdown-all">
                        <h3>Get 100 of online courses for free </h3>
                        <h1>Register Now</h1>
                        <div class="timer">
                            <div data-countdown="2019/01/01"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="register-from">
                        <h3>Fil The Register Form</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicng elit, sed do eiusmod tempor </p>
                        <form class="ordering">
                            <input required="" placeholder="Your Name*" type="text">
                            <input class="form-control2" required="" placeholder="Email Address*" type="email">
                            <div class="orderby-wrapper">
                                <select name="orderby" class="orderby">
                                    <option value="menu_order">Courses*</option>
                                    <option value="popularity" selected='selected'>HS Diploma</option>
                                    <option value="rating">Associate Degree</option>
                                    <option value="date">Bachelor's Degree</option>
                                    <option value="price">Master's Degree</option>
                                    <option value="price-desc">Doctorate/Prof Degree</option>
                                </select>
                            </div>
                            <div class="sent text-center">
                                <button class="submit" type="submit">
                                    submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="event-area gray-bg ptb-110">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center mb-60">
                        <img src="{{url('webaru_bs3')}}/2025_aru_title.png" alt="aru" >
                        <h1 class="uppercase">Photo Gallery</h1>
                        <p>ภาพกิจกรรมนักศึกษา บุคลากรมหาวิทยาลัยราชภัฏพระนครศรีอยุธยา</p>
                        <div class="separator my mtb-15">
                            <i class="icofont icofont-hat-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="event-text-img">
                        <div class="event-img3">
                            <a href="{{url('gallery')}}"><img src="{{url('webaru_bs3/APG2-1.png')}}" alt=""></a>
                        </div>
                        <div class="visual-inner">
                            <h3 class="blog-title">
                                <a href="#">Become a Product Manage</a>
                            </h3>
                            <div class="blog-meta">
                                <span class="published3">
                                    <i class="icofont icofont-clock-time"></i>
                                    08 am to 12 pm
                                </span>
                                <span class="published4">
                                    <i class="icofont icofont-social-google-map"></i>
                                    T House USA
                                </span>
                            </div>
                            <div class="blog-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore p aliqua. Ut enim ad minim veniam,</p>
                            </div>
                            <div class="readmore">
                                <a href="#">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="event-text-img mrg-sm2 mrg-xs4">
                        <div class="event-img3">
                            <a href="#"><img src="{{url('webaru_bs3/gallery/170X200.jpg')}}" class="img-fluid"></a>
                            <div class="event-date">
                                <span class="tb-publish">22</span>
                                <span class="tb-publish2">Oct</span>
                            </div>
                        </div>
                        <div class="visual-inner">
                            <h3 class="blog-title">
                                <a href="#">Become a Product Manage</a>
                            </h3>
                            <div class="blog-meta">
                                <span class="published3">
                                    <i class="icofont icofont-clock-time"></i>
                                    08 am to 12 pm
                                </span>
                                <span class="published4">
                                    <i class="icofont icofont-social-google-map"></i>
                                    T House USA
                                </span>
                            </div>
                            <div class="blog-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore p aliqua. Ut enim ad minim veniam,</p>
                            </div>
                            <div class="readmore">
                                <a href="#">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="event-text-img mt-40">
                        <div class="event-img3">
                            <a href="#"><img src="{{url('webaru_bs3/APG2-33.png')}}" class="img-fluid"></a>
                            <div class="event-date">
                                <span class="tb-publish">27</span>
                                <span class="tb-publish2">Oct</span>
                            </div>
                        </div>
                        <div class="visual-inner">
                            <h3 class="blog-title">
                                <a href="#">Political Science</a>
                            </h3>
                            <div class="blog-meta">
                                <span class="published3">
                                    <i class="icofont icofont-clock-time"></i>
                                    08 am to 12 pm
                                </span>
                                <span class="published4">
                                    <i class="icofont icofont-social-google-map"></i>
                                    T House USA
                                </span>
                            </div>
                            <div class="blog-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore p aliqua. Ut enim ad minim veniam,</p>
                            </div>
                            <div class="readmore">
                                <a href="#">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="event-text-img mt-40">
                        <div class="event-img3">
                            <a href="#"><img src="{{url('webaru_bs3/340X402.png')}}" alt=""></a>
                            <div class="event-date">
                                <span class="tb-publish">29</span>
                                <span class="tb-publish2">Oct</span>
                            </div>
                        </div>
                        <div class="visual-inner">
                            <h3 class="blog-title">
                                <a href="#">Coumputer Science</a>
                            </h3>
                            <div class="blog-meta">
                                <span class="published3">
                                    <i class="icofont icofont-clock-time"></i>
                                    08 am to 12 pm
                                </span>
                                <span class="published4">
                                    <i class="icofont icofont-social-google-map"></i>
                                    T House USA
                                </span>
                            </div>
                            <div class="blog-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore p aliqua. Ut enim ad minim veniam,</p>
                            </div>
                            <div class="readmore">
                                <a href="#">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-12 text-center">
                    <a class="button extra-small news-btn mt-60" href="#">
                        <span>View All News</span>
                    </a>
                </div>
            </div>

        </div>
    </div>

    {{-- <div class="counter-area bg-2 bg-opacity bg-relative ptb-110">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 text-center">
                    <div class="counter-bottom2">
                        <div class="counter-img">
                            <img src="{{url('eduguide')}}/images/icons/1.png" alt="" >
                        </div>
                        <div class="counter-all">
                            <div class="counter-next2">
                                <h2>Teachers</h2>
                            </div>
                            <div class="counter cnt-two">
                                <h1>34</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3  text-center">
                    <div class="counter-bottom2 mrg-xs">
                        <div class="counter-img">
                            <img src="{{url('eduguide')}}/images/icons/2.png" alt="" >
                        </div>
                        <div class="counter-all">
                            <div class="counter-next2">
                                <h2>Students</h2>
                            </div>
                            <div class="counter cnt-two">
                                <h1>3554</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3  text-center">
                    <div class="counter-bottom2 mrg-xs">
                        <div class="counter-img">
                            <img src="{{url('eduguide')}}/images/icons/3.png" alt="" >
                        </div>
                        <div class="counter-all">
                            <div class="counter-next2">
                                <h2>Research</h2>
                            </div>
                            <div class="counter cnt-two">
                                <h1>354</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3  text-center">
                    <div class="counter-bottom2 mrg-xs">
                        <div class="counter-img">
                            <img src="{{url('eduguide')}}/images/icons/4.png" alt="" >
                        </div>
                        <div class="counter-all">
                            <div class="counter-next2">
                                <h2>Awards</h2>
                            </div>
                            <div class="counter cnt-two">
                                <h1>44</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <section class="testimonial-area ptb-110">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="testimonial-text">
                        <h2>Our Student Say</h2>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9">
                    <div class="slider-active2">
                        <div class="testimonial-all">
                            <div class="testimonial-peragraph">
                                <p>Lorem ipsure magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ulla</p>
                            </div>
                            <div class="testimonial-img">
                                <img alt="" src="{{url('eduguide')}}/images/banner/2.jpg" >
                                <div class="img-title navy-bg">
                                    <h3>Al-Rayed</h3>
                                    <p>Student</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-all">
                            <div class="testimonial-peragraph">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididu</p>
                            </div>
                            <div class="testimonial-img">
                                <img alt="" src="{{url('eduguide')}}/images/banner/2.jpg" >
                                <div class="img-title navy-bg">
                                    <h3>Al-Mamun</h3>
                                    <p>Student</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-all">
                            <div class="testimonial-peragraph">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut la et </p>
                            </div>
                            <div class="testimonial-img">
                                <img alt="" src="{{url('eduguide')}}/images/banner/2.jpg" >
                                <div class="img-title navy-bg">
                                    <h3>Al-Mamun</h3>
                                    <p>Student</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

@endsection
