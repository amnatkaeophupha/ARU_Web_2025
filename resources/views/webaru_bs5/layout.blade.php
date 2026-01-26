<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา | Phranakhon Si Ayutthaya Rajabhat University</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('webaru_bs5/aru_images/logo/aru_favicon.png') }}">

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
    <!-- Executives css -->
    <link rel="stylesheet" href="{{ url('webaru_bs5/css/aru-executives.css') }}">
    <!-- Fancybox v5 css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">
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
                        <div class="col-md-6 col-sm-12 col-12 d-none d-sm-block">
                            <div class="header-top-info">
                                <ul class="d-flex flex-wrap align-items-center gap-3">
                                    <li>
                                        <a href="#">
                                            <i class="icofont icofont-ui-call"></i>
                                            Call us (+66) 035-276-555-9
                                        </a>
                                    </li>
                                    <li class="d-none d-lg-block">
                                        <a href="#">
                                            <i class="icofont icofont-envelope"></i>
                                            saraban@aru.ac.th
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 d-none d-lg-block">
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
                                <a href="{{ url('') }}"><img src="{{ url('webaru_bs5/aru_images/logo/index_aru_logo.png') }}" alt=""> </a>
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
                                                <li><a href="{{ url('webaru_bs5/aru_images/plans/plans-2566-2570.pdf') }}">นโยบาย แผนยุทธศาสตร์</a></li>
                                                <li><a href="{{ url('') }}">กฎหมายเกี่ยวกับทรัพยากรบุคคล</a></li>
                                                <li><a href="{{ url('') }}">กฎหมายเกี่ยวกับมหาวิทยาลัย</a></li>
                                                <li><a href="{{ url('structure') }}">โครงสร้างการแบ่งส่วนราชการภายใน</a></li>
                                                <li><a href="https://www.aru.ac.th/council/?page=committee">คณะกรรมการสภามหาวิทยาลัย</a></li>
                                                <li><a href="{{ url('executives') }}">คณะผู้บริหาร</a></li>
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
                            <button class="aru-mobile-toggle" type="button" style="font-size: 10px;">Menu</button>
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

        @yield('content')

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
    <!-- Fancybox v5 -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.Fancybox) {
                Fancybox.bind('[data-fancybox="aru-gallery"]', {
                    Thumbs: { autoStart: true },
                    Toolbar: { display: ['zoom', 'slideshow', 'thumbs', 'close'] }
                });
            }
        });
    </script>
    <script>
        document.addEventListener('click', function (e) {
            var trigger = e.target.closest('[data-fancybox="aru-gallery"]');
            if (!trigger || !window.Fancybox) {
                return;
            }
            var items = Array.prototype.slice.call(document.querySelectorAll('[data-fancybox="aru-gallery"]'));
            var startIndex = items.indexOf(trigger);
            if (startIndex === -1) {
                return;
            }
            e.preventDefault();
            e.stopPropagation();
            var slides = items.map(function (el) {
                return {
                    src: el.getAttribute('href'),
                    type: 'image',
                    caption: el.getAttribute('data-caption') || ''
                };
            });
            Fancybox.show(slides, { startIndex: startIndex });
        }, true);
    </script>
    <script src="{{ url('webaru_bs5/js/main.js') }}"></script>
    <script src="{{ url('webaru_bs5/js/custom.js') }}"></script>
</body>

</html>
