@extends('webaru_bs5/layout_index')

@section('content')

<style>

.carousel-inner .carousel-item {
  width: 100%;
  height: 100%;
}

.carousel-inner .carousel-item img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.carousel-item::before {
    width: 100%;
    height: 100%;
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, #fff 0%, black 100%);
    z-index: 1;
    mix-blend-mode: multiply;
    }

 .carousel-caption {
      position: absolute;
      top: 30%;
      left: 20%;
      z-index: 2;
 }
</style>

<div class="container">
    <div id="carouselExamplePause" class="carousel slide" data-bs-ride="carousel" data-bs-pause="false">
        <div class="carousel-action-bar">
          <button type="button" class="btn btn-icon carousel-control-play-pause pause" data-bs-target="#carouselExamplePause" data-bs-play-text="Play Carousel" data-bs-pause-text="Pause Carousel" title="Pause Carousel">
            <span class="visually-hidden">Pause Carousel</span>
          </button>
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExamplePause" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExamplePause" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExamplePause" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" src="{{ url('2025-01-07-142426.png') }}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" src="{{ url('2024-10-28-161502.gif') }}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" src="{{ url('2024-10-28-161502.gif') }}" alt="First slide">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExamplePause" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExamplePause" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
</div>

{{-- tab --}}
<style>
    .underline-tabs .nav-tabs {

        border-bottom: 2px solid #e9ecef;
        border: 1px solid #e8e8e8;
    }

    .underline-tabs .nav-link {
        border: none;
        border-bottom: 2px solid transparent;
        padding: 1rem 1.5rem;
        margin-bottom: -2px;
        font-weight: 500;
        color: #6c757d;
        padding: 15px 25px;
        transition: all 0.3s ease;
        font-size: 16px;
    }

    .underline-tabs .nav-link:hover {
        /* border-bottom-color: #0d6efd50;
        color: #0d6efd; */
        border-bottom-color: #A01D29;
        color: #A01D29;

    }

    .underline-tabs .nav-link.active {
        /* border-bottom-color: #0d6efd;
        color: #0d6efd; */
                border-bottom-color: #FBB040;
        color: #FBB040;
    }

    .underline-tabs .tab-content {
        padding: 30px;
        border: 1px solid #e8e8e8;
        border-top: none;
    }
    .dayTopic{
        position:relative;
        float:left;
        top:5px;
        display: block;
        width: 60px;
        height: 60px;
        background-color: #FFFFFF;
        text-align: center;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
        padding-bottom: 45px;
        text-transform:uppercase;
        color: #000;
    }
li.listTopic{
        list-style:none;
        padding:0px;
        margin:0px;
        margin-bottom:5px;
        padding: 3px;
        border-bottom: 1px dashed #CCC;
        padding-bottom: 20px
    }
</style>
<div class="container mt-5 mb-10">
    <h2 class="text-center mb-4">ประกาศข่าวสาร</h2>
    <div class="underline-tabs">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">สมัครงาน</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">จัดซื้อจัดจ้าง</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">ข่าวนักศึกษาภาคปกติ</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact2" type="button" role="tab" aria-controls="contact2" aria-selected="false">ข่าวนักศึกษาภาคพิเศษ</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <ul class="clearfix row">
                    <li class="listTopic" style="border-bottom: 1px dashed #ff0000;">
                        <div class="dayTopic" style="border: 1px solid #ff0000;">18 ก.พ.
                            <div style="background-color: #ff0000;">2568</div>
                        </div>
                        <div style="margin-left: 80px;">
                            <h4><a href="#">เปิดรับสมัครนักศึกษาใหม่ ประจำปีการศึกษา 2562</a></h4>
                            <p>เปิดรับสมัครนักศึกษาใหม่ ประจำปีการศึกษา 2562</p>
                        </div>
                    </li>
                    <li class="listTopic" style="border-bottom: 1px dashed #ffd149;">
                        <div class="dayTopic" style="border: 1px solid #ffd149;">18 ก.พ.
                            <div style="background-color: #ffd149;">2568</div>
                        </div>
                        <div style="margin-left: 80px;">
                            <h4><a href="#">เปิดรับสมัครนักศึกษาใหม่ ประจำปีการศึกษา 2562</a></h4>
                            <p>เปิดรับสมัครนักศึกษาใหม่ ประจำปีการศึกษา 2562</p>
                        </div>
                    </li>
                </ul>


            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <h3 class="mb-3">User Profile</h3>
                <p>Here you can find information about your profile and account settings.</p>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <h3 class="mb-3">Contact Us</h3>
                <p>Get in touch with us for any inquiries or support you may need.</p>
            </div>
        </div>
    </div>
</div>
 {{-- End Tab  --}}

 <div class="event-area bg-img default-overlay pt-130 pb-130" style="background-image:url(assets/img/bg/bg-3.jpg);">
    <div class="container">
        <div class="section-title mb-75">
            <h2><span>Our</span> Event</h2>
            <p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <br>veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip </p>
        </div>
        <div class="event-active owl-carousel nav-style-1">
            <div class="single-event event-white-bg">
                <div class="event-img">
                    <a href="event-details.html"><img src="{{ url('glaxdu') }}/assets/img/event/event-1.jpg" alt=""></a>
                    <div class="event-date-wrap">
                        <span class="event-date">1st</span>
                        <span>Dec</span>
                    </div>
                </div>
                <div class="event-content">
                    <h3><a href="event-details.html">Aempor incididunt ut labore ejam.</a></h3>
                    <p>Pvolupttem accusantium doloremque laudantium, totam erspiciatis unde omnis iste natus error .</p>
                    <div class="event-meta-wrap">
                        <div class="event-meta">
                            <i class="fa fa-location-arrow"></i>
                            <span>Mascot Plaza ,Uttara</span>
                        </div>
                        <div class="event-meta">
                            <i class="fa fa-clock-o"></i>
                            <span>11:00 am</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-event event-white-bg">
                <div class="event-img">
                    <a href="event-details.html"><img src="{{ url('glaxdu') }}/assets/img/event/event-2.jpg" alt=""></a>
                    <div class="event-date-wrap">
                        <span class="event-date">10th</span>
                        <span>Dec</span>
                    </div>
                </div>
                <div class="event-content">
                    <h3><a href="event-details.html">Global Conference on Business.</a></h3>
                    <p>Pvolupttem accusantium doloremque laudantium, totam erspiciatis unde omnis iste natus error .</p>
                    <div class="event-meta-wrap">
                        <div class="event-meta">
                            <i class="fa fa-location-arrow"></i>
                            <span>Shubastu ,Dadda</span>
                        </div>
                        <div class="event-meta">
                            <i class="fa fa-clock-o"></i>
                            <span>08:30 am</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-event event-white-bg">
                <div class="event-img">
                    <a href="event-details.html"><img src="{{ url('glaxdu') }}/assets/img/event/event-3.jpg" alt=""></a>
                    <div class="event-date-wrap">
                        <span class="event-date">1st</span>
                        <span>Dec</span>
                    </div>
                </div>
                <div class="event-content">
                    <h3><a href="event-details.html">Academic Conference Maui.</a></h3>
                    <p>Pvolupttem accusantium doloremque laudantium, totam erspiciatis unde omnis iste natus error .</p>
                    <div class="event-meta-wrap">
                        <div class="event-meta">
                            <i class="fa fa-location-arrow"></i>
                            <span>Banasree ,Rampura</span>
                        </div>
                        <div class="event-meta">
                            <i class="fa fa-clock-o"></i>
                            <span>10:00 am</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-event event-white-bg">
                <div class="event-img">
                    <a href="event-details.html"><img src="{{ url('glaxdu') }}/assets/img/event/event-2.jpg" alt=""></a>
                    <div class="event-date-wrap">
                        <span class="event-date">1st</span>
                        <span>Dec</span>
                    </div>
                </div>
                <div class="event-content">
                    <h3><a href="event-details.html">Social Sciences & Education.</a></h3>
                    <p>Pvolupttem accusantium doloremque laudantium, totam erspiciatis unde omnis iste natus error .</p>
                    <div class="event-meta-wrap">
                        <div class="event-meta">
                            <i class="fa fa-location-arrow"></i>
                            <span>Shubastu ,Badda</span>
                        </div>
                        <div class="event-meta">
                            <i class="fa fa-clock-o"></i>
                            <span>10:30 am</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


 <div class="blog-event-area pt-130 pb-115">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title-3 mb-45 mrg-bottom-small">
                    <h2>Our <span>Blog</span></h2>
                    <p>Hempor incididunt ut labore et dolore mm, <br> itation ullamco laboris nisi ut aliquip. </p>
                </div>
                <div class="blog-active">
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="{{ url('glaxdu') }}/assets/img/blog/blog-1.jpg" alt=""></a>
                        </div>
                        <div class="blog-content-wrap">
                            <span>Education</span>
                            <div class="blog-content">
                                <h4><a href="blog-details.html">Testing is a great thing.</a></h4>
                                <p>doloremque laudan tium, totam ersps uns iste natus</p>
                                <div class="blog-meta">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i> Adrin Azra</a></li>
                                        <li><a href="#"><i class="fa fa-comments-o"></i> 22</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-date">
                                <a href="#"><i class="fa fa-calendar-o"></i> Jun, 24th 2018</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="{{ url('glaxdu') }}/assets/img/blog/blog-2.jpg" alt=""></a>
                        </div>
                        <div class="blog-content-wrap">
                            <span>Education</span>
                            <div class="blog-content">
                                <h4><a href="blog-details.html">Learn English in ease.</a></h4>
                                <p>doloremque laudan tium, totam ersps uns iste natus</p>
                                <div class="blog-meta">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i> Tayeb Jon</a></li>
                                        <li><a href="#"><i class="fa fa-comments-o"></i> 12</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-date">
                                <a href="#"><i class="fa fa-calendar-o"></i> Feb, 10th 2017</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="{{ url('glaxdu') }}/assets/img/blog/blog-3.jpg" alt=""></a>
                        </div>
                        <div class="blog-content-wrap">
                            <span>Education</span>
                            <div class="blog-content">
                                <h4><a href="blog-details.html">In publishing and graphic.</a></h4>
                                <p>doloremque laudan tium, totam ersps uns iste natus</p>
                                <div class="blog-meta">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i> Md Tamim</a></li>
                                        <li><a href="#"><i class="fa fa-comments-o"></i> 20</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-date">
                                <a href="#"><i class="fa fa-calendar-o"></i> Oct, 26th 2017</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-title-3 mb-45 ml-70">
                    <h2><span>Up Coming</span> Event</h2>
                    <p>Hempor incididunt ut labore et dolore mm, <br> itation ullamco laboris nisi ut aliquip. </p>
                </div>
                <div class="event-active-2 ml-70">
                    <div class="single-event single-event-2">
                        <div class="event-img">
                            <a href="event-details.html"><img src="{{ url('glaxdu') }}/assets/img/event/event-4.jpg" alt=""></a>
                            <div class="event-date-wrap">
                                <span class="event-date">1st</span>
                                <span>Dec</span>
                            </div>
                        </div>
                        <div class="event-content">
                            <h3><a href="event-details.html">Aempor incididunt ut labore ejam.</a></h3>
                            <p>Pvolupttem accusantium doloremque laudantium, totam erspiciatis unde omnis iste natus error .</p>
                            <div class="event-meta-wrap">
                                <div class="event-meta">
                                    <i class="fa fa-location-arrow"></i>
                                    <span>Mascot Plaza ,Uttara</span>
                                </div>
                                <div class="event-meta">
                                    <i class="fa fa-clock-o"></i>
                                    <span>10:30 am</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-event single-event-2">
                        <div class="event-img">
                            <a href="event-details.html"><img src="{{ url('glaxdu') }}/assets/img/event/event-4.jpg" alt=""></a>
                            <div class="event-date-wrap">
                                <span class="event-date">1st</span>
                                <span>Dec</span>
                            </div>
                        </div>
                        <div class="event-content">
                            <h3><a href="event-details.html">Social Sciences & Education.</a></h3>
                            <p>Pvolupttem accusantium doloremque laudantium, totam erspiciatis unde omnis iste natus error .</p>
                            <div class="event-meta-wrap">
                                <div class="event-meta">
                                    <i class="fa fa-location-arrow"></i>
                                    <span>Shuvastu ,Badda</span>
                                </div>
                                <div class="event-meta">
                                    <i class="fa fa-clock-o"></i>
                                    <span>10:30 am</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blog-area pt-130 pb-100">
    <div class="container">
        <div class="section-title mb-75">
            <h2>Our <span>Newsfeed</span></h2>
            <p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <br>veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip </p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="single-blog mb-30">
                    <div class="blog-img">
                        <a href="blog-details.html"><img src="{{ url('glaxdu') }}/assets/img/blog/blog-1.jpg" alt=""></a>
                    </div>
                    <div class="blog-content-wrap">
                        <span>Education</span>
                        <div class="blog-content">
                            <h4><a href="blog-details.html">Testing is a great thing.</a></h4>
                            <p>doloremque laudan tium, totam ersps uns iste natus</p>
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#"><i class="fa fa-user"></i> Adrin Azra</a></li>
                                    <li><a href="#"><i class="fa fa-comments-o"></i> 15</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog-date">
                            <a href="#"><i class="fa fa-calendar-o"></i> Jun, 24th 2018</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-blog mb-30">
                    <div class="blog-img">
                        <a href="blog-details.html"><img src="{{ url('glaxdu') }}/assets/img/blog/blog-2.jpg" alt=""></a>
                    </div>
                    <div class="blog-content-wrap">
                        <span>Education</span>
                        <div class="blog-content">
                            <h4><a href="blog-details.html">A variation of the ordinary.</a></h4>
                            <p>doloremque laudan tium, totam ersps uns iste natus</p>
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#"><i class="fa fa-user"></i> Tayeb Jon</a></li>
                                    <li><a href="#"><i class="fa fa-comments-o"></i> 12</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog-date">
                            <a href="#"><i class="fa fa-calendar-o"></i> Feb, 18th 2017</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-blog mb-30">
                    <div class="blog-img">
                        <a href="blog-details.html"><img src="{{ url('glaxdu') }}/assets/img/blog/blog-3.jpg" alt=""></a>
                    </div>
                    <div class="blog-content-wrap">
                        <span>Education</span>
                        <div class="blog-content">
                            <h4><a href="blog-details.html">In publishing and graphic.</a></h4>
                            <p>doloremque laudan tium, totam ersps uns iste natus</p>
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#"><i class="fa fa-user"></i> Rifat Al</a></li>
                                    <li><a href="#"><i class="fa fa-comments-o"></i> 20</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog-date">
                            <a href="#"><i class="fa fa-calendar-o"></i> Oct, 14th 2018</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-blog mb-30">
                    <div class="blog-img">
                        <a href="blog-details.html"><img src="{{ url('glaxdu') }}/assets/img/blog/blog-4.jpg" alt=""></a>
                    </div>
                    <div class="blog-content-wrap">
                        <span>Education</span>
                        <div class="blog-content">
                            <h4><a href="blog-details.html">Learn English in ease.</a></h4>
                            <p>doloremque laudan tium, totam ersps uns iste natus</p>
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#"><i class="fa fa-user"></i>Md Tamim</a></li>
                                    <li><a href="#"><i class="fa fa-comments-o"></i> 08</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog-date">
                            <a href="#"><i class="fa fa-calendar-o"></i> Jun, 21th 2017</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- bannaer-area -->
<div class="brand-logo-area pb-130">
    <div class="container">
        <div class="brand-logo-active owl-carousel">
            <div class="single-brand-logo">
                <a href="#"><img src="{{ url('glaxdu') }}/assets/img/brand-logo/1.png" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="{{ url('glaxdu') }}/assets/img/brand-logo/2.png" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="{{ url('glaxdu') }}/assets/img/brand-logo/3.png" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="{{ url('glaxdu') }}/assets/img/brand-logo/4.png" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="{{ url('glaxdu') }}/assets/img/brand-logo/5.png" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="{{ url('glaxdu') }}/assets/img/brand-logo/6.png" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="{{ url('glaxdu') }}/assets/img/brand-logo/2.png" alt=""></a>
            </div>
        </div>
    </div>
</div>
<!-- bannaer-area-end -->
@endsection
