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

<section class="banner-blog-area ptb-50 gray-bg">
    <div class="container">
        <div class="row">
            <div class="hidden-md col-lg-3 col-sm-6">
                <div class="blog-img">
                    <img src="{{url('webaru_bs3/home_banner_1.png')}}" alt="" >
                </div>
                <div class="blog-details">
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
                        <span>Learn Now</span>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 col-sm-6">
                <div class="blog-all mrg-xs">
                    <div class="blog-img">
                        <a href="#"><img src="{{url('webaru_bs3/home_banner_22.png')}}" alt="" ></a>
                    </div>
                    <div class="blog-details">
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
                            <span>Learn Now</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 col-sm-6">
                <div class="blog-all mrg-sm mrg-xs">
                    <div class="blog-img">
                        <a href="#"><img src="{{url('webaru_bs3/home_banner_333.png')}}" style="height: 204" ></a>
                    </div>
                    <div class="blog-details">
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
                            <span>Learn Now</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


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
                        <img src="{{url('webaru_bs3/2024-10-28-161502.gif')}}" class="img-fluid img-thumbnail">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="event-text-img mrg-sm2 mrg-xs4">
                    <div class="aru-public-visual-inner">
                        <img src="{{url('webaru_bs3/2024-10-28-161502.gif')}}" class="img-fluid img-thumbnail">
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
            <div class="col-md-6 col-sm-12">
                <div class="event-text-img mt-40">
                    <div class="aru-public-visual-inner">
                        <img src="{{url('webaru_bs3/2024-10-28-161502.gif')}}" class="img-fluid img-thumbnail">
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

<!-- Start of Aru News -->
<section class="service-area gray-bg ptb-110">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

        const pdfFiles = [
            { url: "{{url('webaru_bs3/arunews-2.pdf')}}", canvasId: "pdf-canvas-1" },
            { url: "{{url('webaru_bs3/arunews-3.pdf')}}", canvasId: "pdf-canvas-2" },
            { url: "{{url('webaru_bs3/arunews-4.pdf')}}", canvasId: "pdf-canvas-3" }
        ];

        const scale = 2.0;

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
            <div class="col-md-8">
                <div class="service-all white-bg" >
                    <h2 style="margin-bottom:30px;">ARU NEWS</h2>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="service-left" style="margin:0px;">
                                <canvas id="pdf-canvas-1" style="border:1px solid #ccc;width:100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-from navy-bg" style="padding-top: 35px;">
                    <h3>Courses Search</h3>
                    <canvas id="pdf-canvas-2" style="border:1px solid #ccc;width:100%;"></canvas>
                    {{-- <form class="ordering">
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
                    </form> --}}
                </div>
                <div class="service-from navy-bg" style="margin-top:25px;padding-top:35px;">
                    <h3>Courses Search</h3>
                    <canvas id="pdf-canvas-3" style="border:1px solid #ccc;width:100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Aru News -->



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

    <section class="banner-blog-area ptb-110">
        <div class="container">
            <div class="row">
                <div class="hidden-md col-lg-3 col-sm-6">
                    <div class="banner-img">
                        <img src="{{url('eduguide')}}/images/banner/1.jpg" alt="" >
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 col-sm-6">
                    <div class="blog-all mrg-xs">
                        <div class="blog-img">
                            <a href="#"><img src="{{url('eduguide')}}/images/blog/1.jpg" alt="" ></a>
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
                            <p>Lorem ipsum dolor sit amet, consect elit, sed do eiusmod </p>
                            <a class="button extra-small" href="#">
                                <span>Learn Now</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 col-sm-6">
                    <div class="blog-all mrg-sm mrg-xs">
                        <div class="blog-img">
                            <a href="#"><img src="{{url('eduguide')}}/images/blog/2.jpg" alt="" ></a>
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
                            <p>Lorem ipsum dolor sit amet, consect elit, sed do eiusmod </p>
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
    </section>

    <div class="countdown-area bg-1 ptb-110 bg-opacity bg-relative">
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
    </div>

    <div class="event-area ptb-110">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center mb-60">
                        <h1 class="uppercase">Upcoming Events</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
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
                            <a href="#"><img src="{{url('eduguide')}}/images/blog/4.jpg" alt=""></a>
                            <div class="event-date">
                                <span class="tb-publish">25</span>
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
                    <div class="event-text-img mrg-sm2 mrg-xs4">
                        <div class="event-img3">
                            <a href="#"><img src="{{url('eduguide')}}/images/blog/5.jpg" alt=""></a>
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
                            <a href="#"><img src="{{url('eduguide')}}/images/blog/6.jpg" alt=""></a>
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
                            <a href="#"><img src="{{url('eduguide')}}/images/blog/7.jpg" alt=""></a>
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

            <!-- ส่วนหัวกิจกรรม -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center pt-110 mb-60">
                        <h1 class="uppercase" style="font-family:'sarabun',sans-serif;">กิจกรรม</h1>
                        <p>ภาพกิจกรรมนักศึกษา บุคลากรมหาวิทยาลัยราชภัฏพระนครศรีอยุธยา </p>
                        <div class="separator my mtb-15">
                            <i class="icofont icofont-hat-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- จบส่วนหัวกิจกรรม -->

            <div class="row">
                <div class="col-md-4 hidden-sm">
                    <div class="news-are mrg-xs">
                        <div class="news-img">
                            <img src="{{url('webaru_bs3/gallery/G1.jpg')}}">
                            <div class="webaru-home-news-date navy-bg">
                                <div class="blog-meta-2">
                                    <span class="published3">
                                        <i class="icofont icofont-ui-calendar"></i>
                                        14 Sep 2016
                                    </span>
                                </div>
                                <div class="blog-meta for-news">
                                    <span class="published3">
                                        <a href="#">
                                            <i class="icofont icofont-eye"></i> 34
                                        </a>
                                    </span>
                                    <span class="published4">
                                        <a href="#">
                                            <i class="icofont icofont-comment"></i> 20
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="img-text gray-bg">
                            {{-- <h3><a href="#">In publishing and graphic desi</a></h3> --}}
                            <p style="min-height:90px;">สองมหาวิทยาลัยผนึกกำลังกับภาครัฐท้องถิ่น นำโดยนายอำเภออุทัย ขับเคลื่อน “Reinventing University” สู่การพัฒนาท้องถิ่นอย่างยั่งยืน</p>
                            <a class="button extra-small" href="#">
                                <span>Read More</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 hidden-sm">
                    <div class="news-are mrg-xs">
                        <div class="news-img">
                            <img src="{{url('webaru_bs3/gallery/G2.jpg')}}">
                            <div class="webaru-home-news-date navy-bg">
                                <div class="blog-meta-2">
                                    <span class="published3">
                                        <i class="icofont icofont-ui-calendar"></i>
                                        14 Sep 2016
                                    </span>
                                </div>
                                <div class="blog-meta for-news">
                                    <span class="published3">
                                        <a href="#">
                                            <i class="icofont icofont-eye"></i> 34
                                        </a>
                                    </span>
                                    <span class="published4">
                                        <a href="#">
                                            <i class="icofont icofont-comment"></i> 20
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="img-text gray-bg">
                            {{-- <h3><a href="#">In publishing and graphic desi</a></h3> --}}
                            <p style="min-height:90px;">มหกรรมแก้หนี้ ปีที่ 2 สร้างวิถีแห่งความเป็นธรรม ประจำปี 2568” จังหวัดพระนครศรีอยุธยา</p>
                            <a class="button extra-small" href="#">
                                <span>Read More</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 hidden-sm">
                    <div class="news-are mrg-xs">
                        <div class="news-img">
                            <img src="{{url('eduguide')}}/images/blog/10.jpg" alt="" >
                            <div class="webaru-home-news-date navy-bg">
                                <div class="blog-meta-2">
                                    <span class="published3">
                                        <i class="icofont icofont-ui-calendar"></i>
                                        14 Sep 2016
                                    </span>
                                </div>
                                <div class="blog-meta for-news">
                                    <span class="published3">
                                        <a href="#">
                                            <i class="icofont icofont-eye"></i> 34
                                        </a>
                                    </span>
                                    <span class="published4">
                                        <a href="#">
                                            <i class="icofont icofont-comment"></i> 20
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="img-text gray-bg">
                            {{-- <h3><a href="#">In publishing and graphic desi</a></h3> --}}
                            <p style="min-height:90px;">หลักสูตรพัฒนาผู้นำทางการเมืองฯ พนต.1 จัดกิจกรรมวิเคราะห์บทบาทโซเชียลมีเดียในการส่งเสริมประชาธิปไตยและการมีส่วนร่วมของเยาวชน</p>
                            <a class="button extra-small" href="#">
                                <span>Read More</span>
                            </a>
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
