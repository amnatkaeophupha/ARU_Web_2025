@extends('webaru_bs3/home_layout')

@section('content')
<section class="breadcrumbs-area bg-3 ptb-50 bg-opacity bg-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title" style="font-size:30px;">โครงสร้างการแบ่งส่วนราชการภายในมหาวิทยาลัยฯ</h2>
                    <ul>
                        <li>
                            <a class="active" href="{{url('/')}}">หน้าแรก</a>
                        </li>
                        <li>
                            <a>แนะนำมหาวิทยาลัย</a>
                        </li>
                        <li>โครงสร้างการแบ่งส่วนราชการภายใน</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="aru-details-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-50">
                <div class="section-title text-center">
                    <img src="{{url('webaru')}}/2025_aru_bg_white.jpg">
                    <p>โครงสร้างมหาวิทยาลัยราชภัฏพระนครศรีอยุธยา</p>
                    <div class="separator my mtb-15">
                        <i class="icofont icofont-hat-alt" style="background-color:#fff"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="events-page pt-30 pb-50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="aru-event-text-img">
                    <div class="aru-visual-inner">
                        <img src="{{url('webaru/plans/structure-66-1.png')}}" class="img-thumbnail">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="events-page pb-50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="aru-event-text-img mb-30 text-center">
                    <div class="aru-visual-inner">
                        <img src="{{url('webaru/plans/structure-administration-2568.jpg')}}" class="img-thumbnail">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
