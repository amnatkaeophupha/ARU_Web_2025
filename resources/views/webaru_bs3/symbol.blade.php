@extends('webaru_bs3/home_layout')

@section('content')
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
<section class="aru-details-area pt-30">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center mb-30">
                    <img src="{{url('webaru')}}/2025_aru_bg_white.jpg" alt="aru" >
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
                {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="courses-area bg-2 bg-opacity bg-relative ptb-40 mb-60">
                            <div class="courses pr-100 pl-100">
                                <form class="ordering">
                                    <div class="orderby-wrapper">
                                        <select name="orderby" class="orderby">
                                            <option value="popularity" selected='selected'>Select Degree*</option>
                                            <option value="menu_order">GED</option>
                                            <option value="rating">Associate Degree</option>
                                            <option value="date">Bachelor's Degree</option>
                                            <option value="price">Master's Degree</option>
                                            <option value="price-desc">Doctorate/Prof Degree</option>
                                        </select>
                                    </div>
                                    <div class="orderby-wrapper mrg-chosen">
                                        <select name="orderby" class="orderby">
                                            <option value="popularity" selected='selected'>Ceategory*</option>
                                            <option value="menu_order">GED</option>
                                            <option value="rating">Associate Degree</option>
                                            <option value="date">Bachelor's Degree</option>
                                            <option value="price">Master's Degree</option>
                                            <option value="price-desc">Doctorate/Prof Degree</option>
                                        </select>
                                    </div>
                                    <div class="orderby-wrapper">
                                        <select name="orderby" class="orderby">
                                            <option value="popularity" selected='selected'>Subject*</option>
                                            <option value="menu_order">GED</option>
                                            <option value="rating">Associate Degree</option>
                                            <option value="date">Bachelor's Degree</option>
                                            <option value="price">Master's Degree</option>
                                            <option value="price-desc">Doctorate/Prof Degree</option>
                                        </select>
                                    </div>
                                    <div class="chosen-submit">
                                        <a class="button extra-small" href="#">
                                            <span>Search Courses</span>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="blog-all mrg-xs">
                            <div class="aru-blog-img clearfix">
                                <a href="#"><img src="{{url('webaru/symbol_download_1.jpg')}}"></a>
                            </div>
                            <div class="blog-details gray-bg">
                                <h3><a href="#">ตราสัญลักษณ์</a></h3>
                                <div class="blog-meta">
                                    <span class="published3">
                                        <a href="#"><i class="icofont icofont-eye"></i> 34</a>
                                    </span>
                                    <span class="published4">
                                        <a href="#"><i class="icofont icofont-comment"></i> 20</a>
                                    </span>
                                </div>
                                <p>ตราสัญลักษณ์ มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา</p>
                                <a class="button extra-small" href="{{url('webaru/symbol/logo-aru.zip')}}">
                                    <span>Download</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="blog-all mrg-xs">
                            <div class="aru-blog-img">
                                <a href="#"><img src="{{url('webaru/symbol_download_2.jpg')}}"></a>
                            </div>
                            <div class="blog-details gray-bg">
                                <h3><a href="#">ตราสัญลักษณ์รอง</a></h3>
                                <div class="blog-meta">
                                    <span class="published3">
                                        <a href="#"><i class="icofont icofont-eye"></i> 34</a>
                                    </span>
                                    <span class="published4">
                                        <a href="#"><i class="icofont icofont-comment"></i> 20</a>
                                    </span>
                                </div>
                                <p>ตราสัญลักษณ์รอง มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา</p>
                                <a class="button extra-small" href="{{url('webaru/symbol/ARU_SUB-LOGO-20240723T124923Z-001.zip')}}">
                                    <span>Download</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="blog-all mrg-xs">
                            <div class="aru-blog-img">
                                <a href="#"><img src="{{url('webaru/symbol_download_3.jpg')}}"></a>
                            </div>
                            <div class="blog-details gray-bg">
                                <h3><a href="#">ตราสัญลักษณ์รองหน่วยงาน</a></h3>
                                <div class="blog-meta">
                                    <span class="published3">
                                        <a href="#"><i class="icofont icofont-eye"></i> 34</a>
                                    </span>
                                    <span class="published4">
                                        <a href="#"><i class="icofont icofont-comment"></i> 20</a>
                                    </span>
                                </div>
                                <p>ตราสัญลักษณ์รอง ของหน่วยงานภายในมหาวิทยาลัย</p>
                                <a class="button extra-small" href="{{url('webaru/symbol/FACALTY LOGO-20240723T124926Z-001.zip')}}">
                                    <span>Download</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="blog-all mrg-xs">
                            <div class="aru-blog-img">
                                <a href="#"><img src="{{url('webaru/symbol_download_4.jpg')}}"></a>
                            </div>
                            <div class="blog-details gray-bg">
                                <h3><a href="#">ชุดตัวอักษร</a></h3>
                                <div class="blog-meta">
                                    <span class="published3">
                                        <a href="#"><i class="icofont icofont-eye"></i> 50</a>
                                    </span>
                                    <span class="published4">
                                        <a href="#"><i class="icofont icofont-comment"></i> 40</a>
                                    </span>
                                </div>
                                <p>Line seed san / TH Sarabun มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา </p>
                                <a class="button extra-small" href="{{url('webaru/symbol/FONT-20240723T155613Z-001.zip')}}">
                                    <span>Download</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="blog-all mrg-xs">
                            <div class="aru-blog-img">
                                <a href="#"><img src="{{url('webaru/symbol_download_5.jpg')}}"></a>
                            </div>
                            <div class="blog-details gray-bg">
                                <h3><a href="#">เทมเพลต powerpoint </a></h3>
                                <div class="blog-meta">
                                    <span class="published3">
                                        <a href="#"><i class="icofont icofont-eye"></i> 34</a>
                                    </span>
                                    <span class="published4">
                                        <a href="#"><i class="icofont icofont-comment"></i> 20</a>
                                    </span>
                                </div>
                                <p>เทมเพลต powerpoint มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา </p>
                                <a class="button extra-small" href="{{url('webaru/symbol/TemplateARU-2568.pptx')}}">
                                    <span>Download</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="blog-all mrg-xs">
                            <div class="aru-blog-img">
                                <a href="#"><img src="{{url('webaru/symbol_download_6.jpg')}}"></a>
                            </div>
                            <div class="blog-details gray-bg">
                                <h3><a href="#">ตราสัญลักษณ์ ครบรอบ 120 ปี</a></h3>
                                <div class="blog-meta">
                                    <span class="published3">
                                        <a href="#"><i class="icofont icofont-eye"></i> 12</a>
                                    </span>
                                    <span class="published4">
                                        <a href="#"><i class="icofont icofont-comment"></i> 32</a>
                                    </span>
                                </div>
                                <p>ตราสัญลักษณ์ ครบรอบ 120 ปี มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา</p>
                                <a class="button extra-small" href="{{url('webaru/symbol/120thARULOGO.ai')}}">
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
