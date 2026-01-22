@extends('webaru_bs5/layout')
@section('content')
        <!-- Start of slider area -->
        <div class="slider-area">
            <div class="slider-active">
                <div class="slider-all">
                    <img src="{{ url('webaru_bs5/images/slider/1.jpg') }}" alt="">
                    <div class="slider-text-wrapper">
                        <div class="d-flex h-100 align-items-center justify-content-center">
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
                <div class="slider-all">
                    <img src="{{ url('webaru_bs5/images/slider/1.jpg') }}" alt="">
                    <div class="slider-text-wrapper">
                        <div class="d-flex h-100 align-items-center justify-content-center">
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
                <div class="slider-all">
                    <img src="{{ url('webaru_bs5/images/slider/1.jpg') }}" alt="">
                    <div class="slider-text-wrapper">
                        <div class="d-flex h-100 align-items-center justify-content-center">
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
        <!-- End of slider area -->
        <!-- Start page complaint_center content -->
        <section class="complaint_center-area gray-bg ptb-110">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="service-all white-bg">
                            <h2 class="service-title-th">ศูนย์รับเรื่องร้องเรียน สายตรงอธิการบดี</h2>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="service-left">
                                        <div class="offer-icon">
                                            <i class="icofont icofont-ui-message"></i>
                                        </div>
                                        <div class="offer-text">
                                            <h3><a class="service-link" href="#">รับเรื่องร้องเรียนร้องทุกข์</a></h3>
                                            <p>เปิดช่องทางให้บุคลากร นักศึกษา และประชาชนทั่วไป เพื่อให้มหาวิทยาลัยรับทราบและดำเนินการอย่างเหมาะสม</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="service-left mrg-xs">
                                        <div class="offer-icon">
                                            <i class="icofont icofont-ui-chat"></i>
                                        </div>
                                        <div class="offer-text">
                                            <h3><a class="service-link" href="#">ถามตอบข้อสงสัย</a></h3>
                                            <p>ให้บริการตอบข้อซักถาม ข้อเสนอแนะ และข้อมูลที่เกี่ยวข้องกับการดำเนินงานของมหาวิทยาลัย  เพื่อสร้างความเข้าใจที่ถูกต้องและโปร่งใส</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="service-left service-mrg mrg-xs">
                                        <div class="offer-icon">
                                            <i class="icofont icofont-law-document"></i>
                                        </div>
                                        <div class="offer-text">
                                            <h3><a class="service-link" href="#">ร้องเรียนการทุจริตและประพฤติมิชอบ</a></h3>
                                            <p>แจ้งเบาะแสการทุจริต การใช้อำนาจโดยมิชอบ หรือการกระทำที่ไม่ถูกต้องเพื่อส่งเสริมธรรมาภิบาลและความโปร่งใสในองค์กร</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="service-left service-mrg mrg-xs">
                                        <div class="offer-icon">
                                            <i class="icofont icofont-ui-call"></i>
                                        </div>
                                        <div class="offer-text">
                                            <h3><a class="service-link" href="#">สายตรงอธิการบดี</a></h3>
                                            <p> ช่องทางการสื่อสารโดยตรงถึงอธิการบดี สำหรับเสนอข้อคิดเห็น ปัญหา หรือข้อร้องเรียนสำคัญ เพื่อให้ได้รับการพิจารณาอย่างเร่งด่วนและเป็นธรรม</p>
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
        </section>
        <!-- End page complaint_center content -->

        <!-- Start of arunew area content   -->
        <section class="arunew-area pt-60 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="section-title text-center mb-30">
                            <img src="{{ url('webaru_bs5/aru_images/logo/2025_aru_Logo_title.png') }}" alt="aru" >
                            <h1 style="font-family:'sarabun',sans-serif;">ประชาสัมพันธ์</h1>
                            <p>ประชาสัมพันธ์ข่าวสารมหาวิทยาลัยและหน่วยงานต่างๆ </p>
                            <div class="separator my mtb-15">
                                <i class="icofont icofont-hat-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="arunew-pdf-preview-1" style="display:block; width:100%; height:auto;"></canvas>
                                <div class="text-center mt-3">
                                    <a class="button extra-small arunew-read-btn" href="{{ asset('storage/2025_webaru_home_arunews/6972037212b81.pdf') }}" target="_blank" rel="noopener">
                                        <span>ดูฉบับจริง</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="arunew-sidebar pl-20">
                            <div class="arunew-widget mb-40">
                                <div class="card">
                                    <div class="card-body">
                                        <canvas id="arunew-pdf-preview-2" style="display:block; width:100%; height:auto;"></canvas>
                                        <div class="text-center mt-3">
                                            <a class="button extra-small arunew-read-btn" href="{{ asset('storage/2025_webaru_home_arunews/6972037212b81.pdf') }}" target="_blank" rel="noopener">
                                                <span>ดูฉบับจริง</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="arunew-widget">
                                <div class="card">
                                    <div class="card-body">
                                        <canvas id="arunew-pdf-preview-3" style="display:block; width:100%; height:auto;"></canvas>
                                        <div class="text-center mt-3">
                                            <a class="button extra-small arunew-read-btn" href="{{ asset('storage/2025_webaru_home_arunews/6972037212b81.pdf') }}" target="_blank" rel="noopener">
                                                <span>ดูฉบับจริง</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="arunew-more text-center mt-30 mb-60">
                    <a class="button extra-small arunew-read-btn arunew-more-btn" href="#">
                        <span>ดูทั้งหมด</span>
                    </a>
                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    if (!window.pdfjsLib) {
                        return;
                    }
                    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
                    var pdfUrl = "{{ asset('storage/2025_webaru_home_arunews/69410916e4350.pdf') }}";
                    var canvasIds = [
                        'arunew-pdf-preview-1',
                        'arunew-pdf-preview-2',
                        'arunew-pdf-preview-3'
                    ];
                    pdfjsLib.getDocument(pdfUrl).promise.then(function (pdf) {
                        return pdf.getPage(1).then(function (page) {
                            var scale = 1.6;
                            var viewport = page.getViewport({ scale: scale });
                            var dpr = window.devicePixelRatio || 1;
                            canvasIds.forEach(function (canvasId) {
                                var canvas = document.getElementById(canvasId);
                                if (!canvas) {
                                    return;
                                }
                                var context = canvas.getContext('2d');
                                canvas.width = Math.floor(viewport.width * dpr);
                                canvas.height = Math.floor(viewport.height * dpr);
                                canvas.style.width = '100%';
                                canvas.style.height = 'auto';
                                context.setTransform(dpr, 0, 0, dpr, 0, 0);
                                page.render({
                                    canvasContext: context,
                                    viewport: viewport
                                });
                            });
                        });
                    });
                });
            </script>
        </section>
        <!-- End of arunew area content   -->

        <!-- Start of banner carousel area content   -->
        <section class="banner_carousel-area gray-bg pb-80 pt-50">
            <div class="container">
                <div class="row">
                    {{-- <div class="col-md-12 col-sm-12">
                        <div class="section-title text-center mb-30">
                            <img src="{{ url('webaru_bs5/aru_images/logo/2025_aru_Logo_title.png') }}" alt="aru" >
                            <h1 style="font-family:'sarabun',sans-serif;">ประชาสัมพันธ์</h1>
                            <p>ประชาสัมพันธ์ข่าวสารมหาวิทยาลัยและหน่วยงานต่างๆ </p>
                            <div class="separator my mtb-15">
                                <i class="icofont icofont-hat-alt"></i>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-md-6">
                        <div class="banner-card">
                            <a class="banner-modal-trigger" href="{{ asset('storage/2025_webaru_home_carousels/2026-01-06-094810.jpg') }}" data-full="{{ asset('storage/2025_webaru_home_carousels/2026-01-06-094810.jpg') }}">
                                <img src="{{ asset('storage/2025_webaru_home_carousels/2026-01-06-094810.jpg') }}" alt="ประกาศ">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="banner-card">
                            <a class="banner-modal-trigger" href="{{ asset('storage/2025_webaru_home_carousels/1765428260.jpg') }}" data-full="{{ asset('storage/2025_webaru_home_carousels/1765428260.jpg') }}">
                                <img src="{{ asset('storage/2025_webaru_home_carousels/1765428260.jpg') }}" alt="ประกาศ">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade" id="bannerModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-body text-center" style="padding: 5px;">
                        <img id="bannerModalImage" src="" alt="ประกาศ" class="img-fluid">
                    </div>
                    <div class="modal-footer">
                        <a id="bannerModalOpen" class="button extra-small" href="#" target="_blank" rel="noopener">
                            <span>Open link</span>
                        </a>
                        <a class="button extra-small banner-modal-close-btn" data-bs-dismiss="modal">
                            <span>Close</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- End of banner carousel area content   -->
        <section class="aru_tab-area pb-80 pt-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="section-title text-center mb-30">
                            <img src="{{ url('webaru_bs5/aru_images/logo/2025_aru_Logo_title.png') }}" alt="aru" >
                            <h1 style="font-family:'sarabun',sans-serif;">ประชาสัมพันธ์</h1>
                            <p>ประชาสัมพันธ์ข่าวสารมหาวิทยาลัยและหน่วยงานต่างๆ </p>
                            <div class="separator my mtb-15">
                                <i class="icofont icofont-hat-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="tabs">
                            <div class="tab-button-outer">
                                <ul id="tab-button">
                                @foreach($tabCategories as $index => $category)
                                    @php
                                        $tabId = 'tab' . str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                                    @endphp
                                    <li><a href="#{{ $tabId }}">{{ $category->name }}</a></li>
                                @endforeach
                                </ul>
                            </div>
                            <div class="tab-select-outer">
                                <select id="tab-select">
                                @foreach($tabCategories as $index => $category)
                                    @php
                                        $tabId = 'tab' . str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                                    @endphp
                                    <option value="#{{ $tabId }}">{{ $category->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            @foreach($tabCategories as $index => $category)
                                @php
                                    $tabId = 'tab' . str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                                    $items = $tabsByCategory[$category->id] ?? collect();
                                    $dayClasses = ['day-sun', 'day-mon', 'day-tue', 'day-wed', 'day-thu', 'day-fri', 'day-sat'];
                                @endphp
                                <div id="{{ $tabId }}" class="tab-contents">
                                    <article class="aru-tab-list pt-20" style="border-bottom: none !important;">
                                        <ul class="list-unstyled" style="margin-top: 10px;">
                                            @forelse($items->take(10) as $item)
                                                @php
                                                    $date = $item->created_at ?: $item->updated_at;
                                                    $dayClass = $date
                                                        ? $dayClasses[$date->dayOfWeek]
                                                        : $dayClasses[0];
                                                    if ($date) {
                                                        $date->locale('th');
                                                    }
                                                    $dayText = $date
                                                        ? $date->isoFormat('D MMMM')
                                                        : '';
                                                    $yearText = $date ? (int) $date->format('Y') + 543 : '';
                                                    $fileUrl = $item->files
                                                        ? asset('storage/2025_webaru_home_tab/'.$item->files)
                                                        : '#';
                                                @endphp
                                                <li class="listTopic {{ $dayClass }}">
                                                    <div class="dayTopic {{ $dayClass }}">
                                                        <div class="day">{{ $dayText }}</div>
                                                        <div class="year">{{ $yearText }}</div>
                                                    </div>
                                                    <div class="topic-text">
                                                        <h4><a href="{{ $fileUrl }}" target="_blank">{{ $item->title }}</a></h4>
                                                    </div>
                                                </li>
                                            @empty
                                                <li class="listTopic day-sun">
                                                    <div class="topic-text">
                                                        <h4>ไม่มีข้อมูลประกาศ</h4>
                                                    </div>
                                                </li>
                                            @endforelse
                                        </ul>
                                    </article>
                                    <div class="tab-view-all">
                                        <a href="#">ดูทั้งหมด</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- <section class="banner_blog-area ptb-110">
            <div class="container">
                <div class="row">
                    <div class="d-block d-lg-none d-xl-block col-lg-3 col-sm-6">
                        <div class="banner-img">
                            <img src="{{ url('webaru_bs5/images/banner/1.jpg') }}" alt="" >
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="blog-all mrg-xs">
                            <div class="blog-img">
                                <a href="#"><img src="{{ url('webaru_bs5/images/blog/1.jpg') }}" alt="" ></a>
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
                                <a href="#"><img src="{{ url('webaru_bs5/images/blog/2.jpg') }}" alt="" ></a>
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
                                <a href="#"><img src="{{ url('webaru_bs5/images/blog/3.jpg') }}" alt="" ></a>
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

        <div class="countdown-area bg-1 ptb-110 bg-opacity bg-relative">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-7 col-12 text-center">
                        <div class="webaru_video-content">
                            <iframe src="https://www.youtube.com/embed/G8LDCq2rbrc?si=7yAtsQbwMdamfLgl" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-12">
                        <div class="register-from" style="height: 420px;">
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

        <!-- Start page Photo Gallery content -->
        <div class="event-area pt-100 pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center pt-10 mb-60">
                            <img src="{{ url('webaru_bs5/aru_images/logo/2025_aru_Logo_title.png') }}" alt="aru" >
                            <h1 class="uppercase">Photo Gallery</h1>
                            <p>ภาพกิจกรรมนักศึกษา บุคลากรมหาวิทยาลัยราชภัฏพระนครศรีอยุธยา </p>
                            <div class="separator my mtb-15">
                                <i class="icofont icofont-hat-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="webaru_gallery-area">
                            <div class="news-img">
                                <img src="{{ asset('storage/2025_webaru_home_gallery/pg-1.png') }}" alt="" >
                                <div class="news-date navy-bg">
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

                                <p>พิธีทำบุญตักบาตรข้าวสารอาหารแห้งต้อนรับปีใหม่ 2569</p>
                                <a class="button extra-small" href="#">
                                    <span>ดูเพิ่มเติม</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="webaru_gallery-area mrg-xs">
                            <div class="news-img">
                                <img src="{{ asset('storage/2025_webaru_home_gallery/pg-2.png') }}" alt="" >
                                <div class="news-date navy-bg">
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
                                <p>พิธีบวงสรวงสิ่งศักดิ์สิทธิ์และงานแถลงข่าว เพื่อความเป็นสิริมงคลก่อนการจัดงานมหกรรมศิลปวัฒนธรรม งานมหกรรมศิลปวัฒนธรรม “อยุธยา เฟสติวัล”และรำลึก ๒๕๙ ปี “วีระมหากษัตราพระเจ้าตากสินกู้แผ่นดิน” </p>
                                <a class="button extra-small" href="#">
                                    <span>ดูเพิ่มเติม</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-block d-md-none d-lg-block">
                        <div class="webaru_gallery-area mrg-xs">
                            <div class="news-img">
                                <img src="{{ url('webaru_bs5/images/blog/10.jpg') }}" alt="" >
                                <div class="news-date navy-bg">
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
                                <h3><a href="#">In publishing and graphic desi</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim </p>
                                <a class="button extra-small" href="#">
                                    <span>ดูเพิ่มเติม</span>
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
       <!-- End page Photo Gallery content -->

        <div class="counter-area bg-2 bg-opacity bg-relative ptb-110">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3 text-center">
                        <div class="counter-bottom2">
                            <div class="counter-img">
                                <img src="{{ url('webaru_bs5/images/icons/1.png') }}" alt="" >
                            </div>
                            <div class="counter-all">
                                <div class="counter-next2">
                                    <h2>Teachers</h2>
                                </div>
                                <div class="counter cnt-two" data-target="34">
                                    <h1>34</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3  text-center">
                        <div class="counter-bottom2 mrg-xs">
                            <div class="counter-img">
                                <img src="{{ url('webaru_bs5/images/icons/2.png') }}" alt="" >
                            </div>
                            <div class="counter-all">
                                <div class="counter-next2">
                                    <h2>Students</h2>
                                </div>
                                <div class="counter cnt-two" data-target="3554">
                                    <h1>3554</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3  text-center">
                        <div class="counter-bottom2 mrg-xs">
                            <div class="counter-img">
                                <img src="{{ url('webaru_bs5/images/icons/3.png') }}" alt="" >
                            </div>
                            <div class="counter-all">
                                <div class="counter-next2">
                                    <h2>Research</h2>
                                </div>
                                <div class="counter cnt-two" data-target="354">
                                    <h1>354</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3  text-center">
                        <div class="counter-bottom2 mrg-xs">
                            <div class="counter-img">
                                <img src="{{ url('webaru_bs5/images/icons/4.png') }}" alt="" >
                            </div>
                            <div class="counter-all">
                                <div class="counter-next2">
                                    <h2>Awards</h2>
                                </div>
                                <div class="counter cnt-two" data-target="44">
                                    <h1>44</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
