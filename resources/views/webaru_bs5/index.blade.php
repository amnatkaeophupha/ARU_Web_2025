<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา | Phranakhon Si Ayutthaya Rajabhat University</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('webaru_bs5/images/favicon.jpg') }}">

    <!-- All css files are included here. -->
    <!-- Bootstrap 5.3 main css -->
    <link rel="stylesheet" href="{{ url('webaru_bs5/bootstrap-5.3.3/css/bootstrap.min.css') }}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{ url('webaru_bs5/css/core.css') }}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{ url('webaru_bs5/css/shortcode/shortcodes.css') }}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ url('webaru_bs5/style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ url('webaru_bs5/css/responsive.css') }}">
    <!-- Custom css -->
    <link rel="stylesheet" href="{{ url('webaru_bs5/css/custom.css') }}">
    <!-- Style customizer (Remove these two lines please) -->
    <link rel="stylesheet" href="{{ url('webaru_bs5/css/color/color-aru.css') }}">
    <!-- Modernizr JS -->
    <script src="{{ url('webaru_bs5/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start of header area -->
        <header class="header-area">
            <div class="header-top aru-darkred-bg ptb-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="header-top-info">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="icofont icofont-ui-call"></i>
                                            Call us (+66) 035-276-555-9
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icofont icofont-envelope"></i>
                                            saraban@aru.ac.th
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 d-none d-sm-block">
                            <div class="header-top-right f-right">
                                <div class="header-top-language f-right">
                                    <ul>
                                        <li><a href="https://edoc.aru.ac.th/" target="_blank">E-DOC</a></li>
                                    </ul>
                                </div>
                                <div class="header-top-language f-left">
                                    <ul>
                                        <li><a href="https://www.aru.ac.th/regis/?page=euni" target="_blank">ระบบบริการนักศึกษา</a></li>
                                    </ul>
                                </div>
                                <div class="header-top-language f-left">
                                    <ul>
                                        <li><a href="http://e-uni8.aru.ac.th:81/e-uni/" target="_blank">ระบบบริหารการศึกษา</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom stick-h2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-12">
                            <div class="logo">
                                <a href="index.html"><img src="{{ url('webaru_bs5/aru_images/logo/index_aru_logo.png') }}" alt=""> </a>
                            </div>
                        </div>
                        <div class="col-md-8 d-none d-lg-block">
                            <div class="menu-area f-right">
                                <nav>
                                    <ul>
                                        {{-- <li class="active"><a href="about-us.html">สมัครเรียน </a></li> --}}
                                        <li class="coloumn-one"><a href="#">แนะนำมหาวิทยาลัย <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                            <ul>
                                                <li><a href="{{ url('intro') }}">ประวัติมหาวิทยาลัย </a></li>
                                                <li><a href="{{ url('videointro') }}">วีดิทัศน์แนะนำมหาวิทยาลัย</a></li>
                                                <li><a href="{{ url('symbol') }}">สัญลักษณ์ของมหาวิทยาลัย</a></li>
                                                <li><a href="{{ url('strategic') }}">ปรัชญา พันธกิจ วิสัยทัศน์</a></li>
                                                <li><a href="{{ url('map') }}">แผนผังมหาวิทยาลัย</a></li>
                                                <li><a href="{{ url('webaru_bs3/plans/plans-2566-2570.pdf') }}">นโยบาย แผนยุทธศาสตร์</a></li>
                                                <li><a href="{{ url('') }}">กฎหมายเกี่ยวกับทรัพยากรบุคคล</a></li>
                                                <li><a href="{{ url('') }}">กฎหมายเกี่ยวกับมหาวิทยาลัย</a></li>
                                                <li><a href="{{ url('structure') }}">โครงสร้างการแบ่งส่วนราชการภายใน</a></li>
                                                <li><a href="https://www.aru.ac.th/council/?page=committee">คณะกรรมการสภามหาวิทยาลัย</a></li>
                                                <li><a href="{{ url('administrators') }}">คณะผู้บริหาร</a></li>
                                            </ul>
                                        </li>
                                        <li class="mega-parent"><a href="#">หน่วยงานภายใน <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                            <div class="mega-menu-area mma-970">
                                                <ul class="single-mega-item">
                                                    <li class="menu-title uppercase">สภา / สำนักงานอธิการบดี</li>
                                                    <li><a href="#">สภามหาวิทยาลัย</a></li>
                                                    <li><a href="#">สภาคณาจารย์และข้าราชการ</a></li>
                                                    <li><a href="#">สำนักงานอธิการบดี </a></li>
                                                    <li><a href="#"> + กองกลาง </a></li>
                                                    <li><a href="#">&nbsp;&nbsp;&nbsp; - งานทรัพยากรบุคคล</a></li>
                                                    <li><a href="#">&nbsp;&nbsp;&nbsp; - งานการเงินและบัญชี</a></li>
                                                    <li><a href="#" style="font-size: 13px;">&nbsp;&nbsp;&nbsp; - งานบริการวิชาการและจัดหารายได้</a></li>
                                                    <li><a href="#">&nbsp;&nbsp;&nbsp; - งานพัสดุ</a></li>
                                                    <li><a href="#"> + กองบริการการศึกษา </a></li>
                                                    <li><a href="#"> + กองนโยบายและแผน </a></li>
                                                    <li><a href="#"> + กองพัฒนานักศึกษา </a></li>
                                                </ul>
                                                <ul class="single-mega-item">
                                                    <li class="menu-title uppercase">คณะ</li>
                                                    <li><a href="shop.html">คณะครุศาสตร์</a></li>
                                                    <li><a href="shop.html">คณะมนุษยศาสตร์และสังคมศาสตร์</a></li>
                                                    <li><a href="shop.html">คณะวิทยาศาสตร์และเทคโนโลยี</a></li>
                                                    <li><a href="shop.html">คณะวิทยาการจัดการ</a></li>
                                                    <li><a href="shop.html">บัณฑิตวิทยาลัย </a></li>
                                                    <li><a href="shop.html">โรงเรียนสาธิตฯ </a></li>
                                                </ul>
                                                <ul class="single-mega-item">
                                                    <li class="menu-title uppercase">หน่วยงานสนับสนุนและบริการ</li>
                                                    <li><a href="#">สถาบันวิจัยและพัฒนา </a></li>
                                                    <li><a href="#">สถาบันอยุธยาศึกษา </a></li>
                                                    <li><a href="#">สำนักวิทยบริการและเทคโนโลยีสารสนเทศ</a></li>
                                                    <li><a href="#">ศูนย์ภาษาและการศึกษานานาชาติ </a></li>
                                                    <li><a href="#">ศูนย์บ่มเพาะวิสาหกิจ(ARUBI) </a></li>
                                                    <li><a href="#">ศูนย์ฝึกปฏิบัติการวิชาชีพธุรกิจ </a></li>
                                                    <li><a href="#" style="font-size: 13px;">ศูนย์นวัตกรรมและดิจิทัลเพื่อการเรียนรู้</a></li>
                                                    <li><a href="#">ศูนย์สหกิจศึกษา</a></li>
                                                </ul>
                                                <ul class="single-mega-item">
                                                    <li class="menu-title uppercase">งาน/อื่นๆ</li>
                                                    <li><a href="#">มหาวิทยาลัยสีเขียว (Green ARU) </a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="coloumn-one"><a href="#">สำหรับนักศึกษา <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                            <ul>
                                                <li><a href="https://www.aru.ac.th/regis/?page=tabs&subpage=tab_home2&cid=100&ctid=101" target="_blank">ปฏิทินการศึกษา</a></li>
                                                <li><a href="https://www.aru.ac.th/regis/?page=euni" target="_blank">ระบบบริการนักศึกษา</a></li>
                                                <li><a href="https://www.aru.ac.th/regis/?page=graduate" target="_blank">รายชื่อผู้สำเร็จการศึกษา</a></li>
                                            </ul>
                                        </li>
                                        <li class="coloumn-one"><a href="#">สำหรับบุคลากร <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                            <ul>
                                                <li><a href="http://e-uni8.aru.ac.th:81/e-uni/" target="_blank">ระบบบริหารการศึกษา</a></li>
                                                <li><a href="https://edoc.aru.ac.th/" target="_blank">ระบบสารบรรณอิเล็กทรอนิกส์</a></li>
                                                <li><a href="https://edoc.aru.ac.th/" target="_blank">ระบบการลาออนไลน์</a></li>
                                                <li><a href="/staff/?page=hr&subpage=hr_form" target="_blank">ระบบการประชุมอิเล็กทรอนิกส์</a></li>
                                                <li><a href="https://www.turnitin.com/" target="_blank">turnitin</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="news-page.html">ผู้สำเร็จการศึกษา  </a></li>
                                        <li><a href="contact.html">ITA </a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- mobile-menu-area start -->
        <div class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="d-lg-none col-sm-12 col-12">
                        <div class="mobile-menu">
                            <button class="aru-mobile-toggle" type="button">Menu</button>
                            <nav id="dropdown">
                                <ul>
                                    <li><a href="#">หน่วยงานภายใน</a>
                                        <ul>
                                            <li><a href="#">สภา / สำนักงานอธิการบดี</a>
                                                <ul>
                                                    <li><a href="#">สภามหาวิทยาลัย</a></li>
                                                    <li><a href="#">สภาคณาจารย์และข้าราชการ</a></li>
                                                    <li><a href="#">สำนักงานอธิการบดี </a></li>
                                                    <li><a href="#"> + กองกลาง </a></li>
                                                    <li><a href="#">&nbsp;&nbsp;&nbsp; - งานทรัพยากรบุคคล</a></li>
                                                    <li><a href="#">&nbsp;&nbsp;&nbsp; - งานการเงินและบัญชี</a></li>
                                                    <li><a href="#" style="font-size: 13px;">&nbsp;&nbsp;&nbsp; - งานบริการวิชาการและจัดหารายได้</a></li>
                                                    <li><a href="#">&nbsp;&nbsp;&nbsp; - งานพัสดุ</a></li>
                                                    <li><a href="#"> + กองบริการการศึกษา </a></li>
                                                    <li><a href="#"> + กองนโยบายและแผน </a></li>
                                                    <li><a href="#"> + กองพัฒนานักศึกษา </a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">คณะ</a>
                                                <ul>
                                                    <li><a href="shop.html">คณะครุศาสตร์</a></li>
                                                    <li><a href="shop.html">คณะมนุษยศาสตร์และสังคมศาสตร์</a></li>
                                                    <li><a href="shop.html">คณะวิทยาศาสตร์และเทคโนโลยี</a></li>
                                                    <li><a href="shop.html">คณะวิทยาการจัดการ</a></li>
                                                    <li><a href="shop.html">บัณฑิตวิทยาลัย </a></li>
                                                    <li><a href="shop.html">โรงเรียนสาธิตฯ </a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">หน่วยงานสนับสนุนและบริการ</a>
                                                <ul>
                                                    <li><a href="#">สถาบันวิจัยและพัฒนา </a></li>
                                                    <li><a href="#">สถาบันอยุธยาศึกษา </a></li>
                                                    <li><a href="#">สำนักวิทยบริการและเทคโนโลยีสารสนเทศ</a></li>
                                                    <li><a href="#">ศูนย์ภาษาและการศึกษานานาชาติ </a></li>
                                                    <li><a href="#">ศูนย์บ่มเพาะวิสาหกิจ(ARUBI) </a></li>
                                                    <li><a href="#">ศูนย์ฝึกปฏิบัติการวิชาชีพธุรกิจ </a></li>
                                                    <li><a href="#" style="font-size: 13px;">ศูนย์นวัตกรรมและดิจิทัลเพื่อการเรียนรู้</a></li>
                                                    <li><a href="#">ศูนย์สหกิจศึกษา</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">งาน/อื่นๆ</a>
                                                <ul>
                                                    <li><a href="#">มหาวิทยาลัยสีเขียว (Green ARU) </a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">สำหรับนักศึกษา</a>
                                        <ul>
                                            <li><a href="https://www.aru.ac.th/regis/?page=tabs&subpage=tab_home2&cid=100&ctid=101" target="_blank">ปฏิทินการศึกษา</a></li>
                                            <li><a href="https://www.aru.ac.th/regis/?page=euni" target="_blank">ระบบบริการนักศึกษา</a></li>
                                            <li><a href="https://www.aru.ac.th/regis/?page=graduate" target="_blank">รายชื่อผู้สำเร็จการศึกษา</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">สำหรับบุคลากร</a>
                                        <ul>
                                            <li><a href="http://e-uni8.aru.ac.th:81/e-uni/" target="_blank">ระบบบริหารการศึกษา</a></li>
                                            <li><a href="https://edoc.aru.ac.th/" target="_blank">ระบบสารบรรณอิเล็กทรอนิกส์</a></li>
                                            <li><a href="https://edoc.aru.ac.th/" target="_blank">ระบบการลาออนไลน์</a></li>
                                            <li><a href="/staff/?page=hr&subpage=hr_form" target="_blank">ระบบการประชุมอิเล็กทรอนิกส์</a></li>
                                            <li><a href="https://www.turnitin.com/" target="_blank">turnitin</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="news-page.html">ผู้สำเร็จการศึกษา</a></li>
                                    <li><a href="contact.html">ITA</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile-menu-area end -->
        <!-- End of header area -->

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
                                    <a class="button extra-small arunew-read-btn" href="{{ asset('storage/2025_webaru_home_arunews/69410916e4350.pdf') }}" target="_blank" rel="noopener">
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
                                            <a class="button extra-small arunew-read-btn" href="{{ asset('storage/2025_webaru_home_arunews/69410916e4350.pdf') }}" target="_blank" rel="noopener">
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
                                            <a class="button extra-small arunew-read-btn" href="{{ asset('storage/2025_webaru_home_arunews/69410916e4350.pdf') }}" target="_blank" rel="noopener">
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
                        <div class="countdown-all">
                            <h3>Get 100 of online courses for free </h3>
                            <h1>Register Now</h1>
                            <div class="timer">
                                <div data-countdown="2019/01/01"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-12">
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
                                <a href="#"><img src="{{ url('webaru_bs5/images/blog/4.jpg') }}" alt=""></a>
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
                                <a href="#"><img src="{{ url('webaru_bs5/images/blog/5.jpg') }}" alt=""></a>
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
                                <a href="#"><img src="{{ url('webaru_bs5/images/blog/6.jpg') }}" alt=""></a>
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
                                <a href="#"><img src="{{ url('webaru_bs5/images/blog/7.jpg') }}" alt=""></a>
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
                    <div class="col-md-12">
                        <div class="section-title text-center pt-110 mb-60">
                            <h1 class="uppercase">Academic News</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                            <div class="separator my mtb-15">
                                <i class="icofont icofont-hat-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="news-are">
                            <div class="news-img">
                                <img src="{{ url('webaru_bs5/images/blog/8.jpg') }}" alt="" >
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
                                <h3><a href="#">Testing is a great thing</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim </p>
                                <a class="button extra-small" href="#">
                                    <span>Read More</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="news-are mrg-xs">
                            <div class="news-img">
                                <img src="{{ url('webaru_bs5/images/blog/9.jpg') }}" alt="" >
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
                                <h3><a href="#">A variation of the ordinary lor</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim </p>
                                <a class="button extra-small" href="#">
                                    <span>Read More</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-block d-md-none d-lg-block">
                        <div class="news-are mrg-xs">
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
                                <div class="counter cnt-two">
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
                                <div class="counter cnt-two">
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
                                <div class="counter cnt-two">
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
                                <div class="counter cnt-two">
                                    <h1>44</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="testimonial-area ptb-110">
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
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididu
nt ut la et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ulla
mlaboris nisi ut aliquip ex ea commodo conseq</p>
                                </div>
                                <div class="testimonial-img">
                                    <img alt="" src="{{ url('webaru_bs5/images/banner/2.jpg') }}" >
                                    <div class="img-title navy-bg">
                                        <h3>Al-Rayed</h3>
                                        <p>Student</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-all">
                                <div class="testimonial-peragraph">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididu
nt ut la et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ulla
mlaboris nisi ut aliquip ex ea commodo conseq</p>
                                </div>
                                <div class="testimonial-img">
                                    <img alt="" src="{{ url('webaru_bs5/images/banner/2.jpg') }}" >
                                    <div class="img-title navy-bg">
                                        <h3>Al-Mamun</h3>
                                        <p>Student</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-all">
                                <div class="testimonial-peragraph">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididu
nt ut la et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ulla
mlaboris nisi ut aliquip ex ea commodo conseq</p>
                                </div>
                                <div class="testimonial-img">
                                    <img alt="" src="{{ url('webaru_bs5/images/banner/2.jpg') }}" >
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
        </section>
        <!-- End page content -->
        <!-- Start footer area -->
        <footer class="footer-area">
            <div class="footer-top ptb-110 aru-darkred-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="footer-logo-address">
                                <div class="footer-logo">
                                    <a href="#"><img src="{{ url('webaru_bs5/aru_images/logo/footer_logo.png') }}" alt=""></a>
                                </div>
                                <div class="footer-address">
                                    <div class="header-top-info">
                                        <ul>
                                            <li>
                                                <a href="#" class="footer-contact-link footer-contact-chakra">
                                                    <i class="icofont icofont-ui-call"></i>
                                                    Call us (+66) 035-276-555-9
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="footer-contact-link footer-contact-chakra">
                                                    <i class="icofont icofont-envelope"></i>
                                                    saraban@aru.ac.th
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="footer-contact-link footer-contact-prompt">
                                                    <i class="icofont icofont-location-pin"></i>
                                                    ดูแผนที่ตั้งมหาวิทยาลัย.
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-text">
                                <h3>ตำราการสอนและวิจัย</h3>
                                <ul class="footer-text-all">
                                    <li><a href="#">โครงการตำรา/หนังสือ</a></li>
                                    <li><a href="#">เอกสารประกอบการสอน (PowerPoint)</a></li>
                                    <li><a href="#">เอกสารวิชาการภายใน</a></li>
                                    <li><a href="#">Micro Biology</a></li>
                                    <li><a href="#">กฏหมายมหาวิทยาลัยฯ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-text mrg-sm3 mrg-xs">
                                <h3>หน่วยงานสำคัญ</h3>
                                <ul class="footer-text-all">
                                    <li><a href="#">โรงเรียนสาธิตฯ</a></li>
                                    <li><a href="#">กองบริการการศึกษา</a></li>
                                    <li><a href="#">กองพัฒนานักศึกษา</a></li>
                                    <li><a href="#">กองนโยบายและแผน</a></li>
                                    <li><a href="#">งานทรัพยากรบุคคล</a></li>
                                    <li><a href="#">งานพัสดุ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-text mrg-xs">
                                <h3>Link ที่เกี่ยวข้อง</h3>
                                <ul class="footer-text-all">
                                    <li><a href="#">ARU SDGs </a></li>
                                    <li><a href="#">การเปิดเผยข้อมูลสาธารณะ (OpenData)</a></li>
                                    <li><a href="#">นโยบายความเป็นส่วนบุคคล</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-text mrg-sm3 mrg-xs">
                                <h3>Contact Us</h3>
                                <form action="#">
                                    <input placeholder="Name*" type="text">
                                    <input class="in-mrg" placeholder="Email*" type="email">
                                    <textarea placeholder="Massage*"></textarea>
                                    <button class="submit" type="submit">send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="footer-bottom-text ptb-20">
                                <p>
                                    Copyrights © <a href="http://bootexperts.com/" target="_blank"> 2026 Phranakhon Si Ayutthaya Rajabhat University | All Rights Reserved</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End footer area -->
        <!-- start scrollUp
        ============================================ -->
        <div id="toTop">
            <i class="fa fa-chevron-up"></i>
        </div>

    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->
    <!-- jquery latest version -->
    <script src="{{ url('webaru_bs5/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap 5.3 bundle js -->
    <script src="{{ url('webaru_bs5/bootstrap-5.3.3/js/bootstrap.bundle.min.js') }}"></script>
    <!--  ajax-mail.js  -->
    <script src="{{ url('webaru_bs5/js/ajax-mail.js') }}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{ url('webaru_bs5/js/plugins.js') }}"></script>
    <!-- Updated plugin versions (override legacy ones in plugins.js) -->
    <script src="{{ url('webaru_bs5/js/vendor/jquery-ui-1.13.2.min.js') }}"></script>
    <script src="{{ url('webaru_bs5/js/vendor/waypoints-4.0.1.min.js') }}"></script>
    <script src="{{ url('webaru_bs5/js/vendor/slick-1.8.1.min.js') }}"></script>
    <script src="{{ url('webaru_bs5/js/vendor/meanmenu-2.0.8.min.js') }}"></script>
    <script src="{{ url('webaru_bs5/js/vendor/chosen-1.8.7.min.js') }}"></script>
    <script src="{{ url('webaru_bs5/js/main.js') }}"></script>
    <script src="{{ url('webaru_bs5/js/custom.js') }}"></script>

</body>

</html>
