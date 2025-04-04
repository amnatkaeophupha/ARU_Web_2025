@extends('webaru_bs3/home_layout')

@section('content')
<section class="breadcrumbs-area bg-3 ptb-50 bg-opacity bg-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title" style="font-size:30px;b"ปรัญชา พันธกิจ วิสัยทัศน์ ปรัชญาการศึกษา</h2>
                    <ul>
                        <li>
                            <a class="active" href="{{url('/')}}">หน้าแรก</a>
                        </li>
                        <li>
                            <a>แนะนำมหาวิทยาลัย</a>
                        </li>
                        <li>ปรัญชา พันธกิจ วิสัยทัศน์ ปรัชญาการศึกษามหาวิทยาลัยฯ</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="aru-details-area pt-30">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <img src="{{url('webaru')}}/2025_aru_bg_white.jpg" alt="aru" >
                    <p>ปรัญชา พันธกิจ วิสัยทัศน์ มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา</p>
                    <div class="separator my mtb-15">
                        <i class="icofont icofont-hat-alt" style="background-color:#fff"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start page content -->
<section class="events-page pt-20 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="aru-event-text-img mb-50">
                    <div class="aru-visual-inner">
                        <img src="{{url('webaru/strategic/2567-vision.png')}}" class="img-thumbnail" alt="2567-vision">
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12">
                <div class="aru- mrg-sm2 mrg-xs">
                    <div class="event-img3">
                        <a href="#"><img src="images/blog/5.jpg" alt=""></a>
                    </div>
                    <div class="aru-visual-inner">
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
        </div>
    </div>
</section>
        <!-- End page content -->
@endsection
