<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Phranakhon Si Ayutthaya Rajabhat University</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('webaru_bs3/aru_favicon.png') }}">

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{url('eduguide')}}/bootstrap-3.4.1/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="{{url('eduguide')}}/css/bootstrap.min.css"> --}}

    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{url('eduguide')}}/css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{url('eduguide')}}/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{url('eduguide')}}/style.css">
    <link rel="stylesheet" href="{{url('eduguide')}}/css/custom.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{url('eduguide')}}/css/responsive.css">
    <!-- Style customizer (Remove these two lines please) -->
    <link rel="stylesheet" href="{{url('eduguide')}}/css/color/color-aru.css">

    <!-- Modernizr JS -->
    <script src="{{url('eduguide')}}/js/vendor/modernizr-2.8.3.min.js"></script>
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
                        <div class="col-md-6 col-sm-6 col-xs-12">
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
                        <div class="col-md-6 col-sm-6 hidden-xs">
                            <div class="header-top-right f-right">
                                <div class="header-top-language f-right">
                                    <ul>
                                        <li><a href="#">E-DOC</i></a></li>
                                    </ul>
                                </div>
                                <div class="header-top-language f-left">
                                    <ul>
                                        <li><a href="#">ระบบบริการนักศึกษา</i></a></li>
                                    </ul>
                                </div>
                                <div class="header-top-language f-left">
                                    <ul>
                                        <li><a href="#">ระบบบริหารการศึกษา</i></a></li>
                                    </ul>
                                </div>
                                {{-- <div class="header-top-language f-left">
                                    <ul>
                                        <li><a href="#" data-toggle="dropdown">English<i class="icofont icofont-simple-down"></i></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">English</a></li>
                                                <li><a href="#">English</a></li>
                                                <li><a href="#">English</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom stick-h2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="logo">
                                <a href="{{url('/')}}"><img src="{{url('webaru_bs3/index_aru_logo.png')}}"></a>
                            </div>
                        </div>
                        <div class="col-md-8 hidden-sm hidden-xs">
                            <div class="menu-area f-right">
                                <nav>
                                    <ul>
                                        {{-- <li class="active"><a href="about-us.html">สมัครเรียน </a></li> --}}
                                        <li class="coloumn-one"><a href="#">แนะนำมหาวิทยาลัย <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                            <ul>
                                                <li><a href="{{url('intro')}}">ประวัติมหาวิทยาลัย </a></li>
                                                <li><a href="{{url('videointro')}}">วีดิทัศน์แนะนำมหาวิทยาลัย</a></li>
                                                <li><a href="{{url('symbol')}}">สัญลักษณ์ของมหาวิทยาลัย</a></li>
                                                <li><a href="{{url('strategic')}}">ปรัชญา พันธกิจ วิสัยทัศน์</a></li>
                                                <li><a href="{{url('map')}}">แผนผังมหาวิทยาลัย</a></li>
                                                <li><a href="{{url('webaru_bs3/plans/plans-2566-2570.pdf')}}">นโยบาย แผนยุทธศาสตร์</a></li>
                                                <li><a href="{{url('')}}"">กฎหมายเกี่ยวกับทรัพยากรบุคคล</a></li>
                                                <li><a href="{{url('')}}">กฎหมายเกี่ยวกับมหาวิทยาลัย</a></li>
                                                <li><a href="{{url('structure')}}">โครงสร้างการแบ่งส่วนราชการภายใน</a></li>
                                                <li><a href="https://www.aru.ac.th/council/?page=committee">คณะกรรมการสภามหาวิทยาลัย</a></li>
                                                <li><a href="{{url('administrators')}}">คณะผู้บริหาร</a></li>
                                            </ul>
                                        </li>
                                        {{-- <li class="level-menu"><a href="#">แนะนำมหาวิทยาลัย  <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                            <ul class="tas">
                                                <li><a href="{{url('administrators')}}">คณะผู้บริหาร</a></li>
                                                <li><a href="#">คณะผู้บริหาร <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                                    <ul class="tas">
                                                        <li><a href="header-1.html">คณะกรรมการสภามหาวิทยาลัย</a></li>
                                                        <li><a href="{{url('administrators')}}">ผู้บริหารมหาวิทยาลัย</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Footer <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                                    <ul class="tas">
                                                        <li><a href="footer-1.html">Footer One</a></li>
                                                        <li><a href="footer-2.html">Footer Two</a></li>
                                                        <li><a href="footer-3.html">Footer Three</a></li>
                                                        <li><a href="footer-4.html">Footer Four</a></li>
                                                        <li><a href="footer-5.html">Footer Five</a></li>
                                                        <li><a href="footer-6.html">Footer Six</a></li>
                                                        <li><a href="footer-7.html">Footer Seven</a></li>
                                                        <li><a href="footer-8.html">Footer Eight</a></li>
                                                        <li><a href="footer-9.html">Footer Nine</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Page Title <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                                    <ul class="tas">
                                                        <li><a href="page-title-default.html"> Default Title</a></li>
                                                        <li><a href="page-title-bg-fixed.html"> Background Fixed</a></li>
                                                        <li><a href="page-title-dark.html"> Dark Title</a></li>
                                                        <li><a href="page-title-no-bg.html"> No Background</a></li>
                                                        <li><a href="page-title-pattern.html"> Pattern Title</a></li>
                                                        <li><a href="page-title-solid-bg-color.html">solid Title</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>  --}}
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
                    <div class="hidden-lg hidden-md col-sm-12 col-xs-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul>
                                    <li class="active"><a href="index.html">HOME </a>
                                        <ul>
                                            <li><a href="text-animation-1.html">home animated text 1</a></li>
                                            <li><a href="text-animation-2.html">home animated text 2</a></li>
                                            <li><a href="text-animation-3.html">home animated text 3</a></li>
                                            <li><a href="text-animation-4.html">home animated text 4</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about-us.html">ABOUT US  </a></li>
                                    <li><a href="#">shortcode <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                        <ul>
                                            <li><a href="#">shortcode style 1</a>
                                                <ul>
                                                    <li><a href="shortcode-alert.html">alert</a></li>
                                                    <li><a href="shortcode-blog.html">blog</a></li>
                                                    <li><a href="shortcode-buttons.html">buttons</a></li>
                                                    <li><a href="shortcode-countdown.html">countdown</a></li>
                                                    <li><a href="shortcode-counter.html">counter</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">shortcode style 2</a>
                                                <ul>
                                                    <li><a href="shortcode-course.html">course</a></li>
                                                    <li><a href="shortcode-event.html">event</a></li>
                                                    <li><a href="shortcode-map.html">map</a></li>
                                                    <li><a href="shortcode-progressbar.html">progressbar</a></li>
                                                    <li><a href="shortcode-service.html">service</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">shortcode style 3</a>
                                                <ul>
                                                    <li><a href="shortcode-social-icon.html">social icon</a></li>
                                                    <li><a href="shortcode-tab.html">tab</a></li>
                                                    <li><a href="shortcode-team.html">team</a></li>
                                                    <li><a href="shortcode-testimonial.html">testimonial</a></li>
                                                    <li><a href="shortcode-testimonial-2.html">testimonial 2</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">structure <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                        <ul>
                                            <li><a href="#">Header</a>
                                                <ul>
                                                    <li><a href="header-1.html">Header One</a></li>
                                                    <li><a href="header-2.html">Header Two</a></li>
                                                    <li><a href="header-3.html">Header Three</a></li>
                                                    <li><a href="header-4.html">Header Four</a></li>
                                                    <li><a href="header-5.html">Header Five</a></li>
                                                    <li><a href="header-6.html">Header Six</a></li>
                                                    <li><a href="header-7.html">Header Seven</a></li>
                                                    <li><a href="header-8.html">Header Eight</a></li>
                                                    <li><a href="header-9.html">Header nine</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Footer</a>
                                                <ul>
                                                    <li><a href="footer-1.html">Footer One</a></li>
                                                    <li><a href="footer-2.html">Footer Two</a></li>
                                                    <li><a href="footer-3.html">Footer Three</a></li>
                                                    <li><a href="footer-4.html">Footer Four</a></li>
                                                    <li><a href="footer-5.html">Footer Five</a></li>
                                                    <li><a href="footer-6.html">Footer Six</a></li>
                                                    <li><a href="footer-7.html">Footer Seven</a></li>
                                                    <li><a href="footer-8.html">Footer Eight</a></li>
                                                    <li><a href="footer-9.html">Footer Nine</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Page Title</a>
                                                <ul>
                                                    <li><a href="page-title-default.html"> Default Title</a></li>
                                                    <li><a href="page-title-bg-fixed.html"> Background Fixed</a></li>
                                                    <li><a href="page-title-dark.html"> Dark Title</a></li>
                                                    <li><a href="page-title-no-bg.html"> No Background</a></li>
                                                    <li><a href="page-title-pattern.html"> Pattern Title</a></li>
                                                    <li><a href="page-title-solid-bg-color.html">solid Title</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">pages <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                        <ul>
                                            <li><a href="about-us.html">about us</a></li>
                                            <li><a href="contact.html">contact</a></li>
                                            <li><a href="course.html">course</a></li>
                                            <li><a href="course-details.html">course details</a></li>
                                            <li><a href="events.html">events</a></li>
                                            <li><a href="events-details.html">events details</a></li>
                                            <li><a href="news-details.html">news details</a></li>
                                            <li><a href="news-page.html">news page</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="news-page.html">NEWS  </a></li>
                                    <li><a href="contact.html">CONTACT </a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile-menu-area end -->
        <!-- End of header area -->

        @yield('content')

        <!-- Start footer area -->
        <footer class="footer-area">
        <div class="footer-top ptb-110 aru-darkred-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="footer-logo-address">
                            <div class="footer-logo">
                                <a href="#"><img src="{{url('webaru_bs3/footer_logo.png')}}" alt="" ></a>
                            </div>
                            <div class="footer-address">
                                <div class="header-top-info">
                                    <ul>
                                        <li>
                                            <a href="#" style="font-family:'Chakra Petch', sans-serif;font-size:14px;">
                                                <i class="icofont icofont-ui-call"></i>
                                                Call us (+66) 035-276-555-9
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" style="font-family:'Chakra Petch', sans-serif;font-size:14px;">
                                                <i class="icofont icofont-envelope"></i>
                                                saraban@aru.ac.th
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" style="font-family:'Prompt', sans-serif;font-size:14px;">
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
                                Copyrights © <a href="http://bootexperts.com/" target="_blank"> 2025 Phranakhon Si Ayutthaya Rajabhat University | All Rights Reserved.</a>
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
    {{-- <script src="{{url('eduguide')}}/js/vendor/jquery-1.12.0.min.js"></script> --}}
    <script src="{{url('eduguide')}}/js/vendor/jquery-2.2.4.min.js"></script>
    {{-- <script src="{{ url('glaxdu') }}/assets/js/vendor/jquery-3.7.1.min.js"></script> --}}

    <!-- Bootstrap framework js -->
    {{-- <script src="{{url('eduguide')}}/js/bootstrap.min.js"></script> --}}
    <script src="{{url('eduguide') }}/bootstrap-3.4.1/js/bootstrap.min.js"></script>

    <!--  ajax-mail.js  -->
    <script src="{{url('eduguide')}}/js/ajax-mail.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{url('eduguide')}}/js/plugins.js"></script>
    <script src="{{url('eduguide')}}/js/main.js"></script>

    {{-- Toggle dropdown when the <a> tag with data-toggle="dropdown" --}}
    <script>
      $(document).ready(function() {
        // Toggle dropdown when the <a> tag with data-toggle="dropdown" is clicked
        $('a[data-toggle="dropdown"]').click(function(event) {
          event.preventDefault(); // Prevent the default link behavior
          $(this).siblings('.dropdown-menu').toggle(); // Toggle the dropdown menu
        });

        // Close the dropdown when clicking outside
        $(document).click(function(event) {
          if (!$(event.target).closest('li').length) {
            $('.dropdown-menu').hide(); // Hide all dropdown menus
          }
        });
      });
    </script>

    {{-- banner ประชาสัมพันธ์ popup --}}
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const images = document.querySelectorAll('.popup-image');

        images.forEach(img => {
            img.addEventListener('click', function () {
                const link = this.getAttribute('data-link');

                // 📱 MOBILE MODE — เปิดลิงก์ทันที
                if (window.innerWidth <= 767) {
                    if (link) {
                        window.open(link, '_blank');
                    }
                    return;
                }

                // 🖥 DESKTOP MODE — เปิด Popup
                if (link) {
                    document.getElementById('modalDetailLink').href = link;
                    document.getElementById('modalDetailLink').style.display = 'block';
                } else {
                    document.getElementById('modalDetailLink').style.display = 'none';
                }

                document.getElementById('modalImage').src = this.src;
                $('#imageModal').modal('show');
            });
        });
    });
    </script>

</body>

</html>
