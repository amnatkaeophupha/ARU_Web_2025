<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Phranakhon Si Ayutthaya Rajabhat University</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('glaxdu') }}/assets/img/aru_favicon.png">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('glaxdu') }}/assets/css/bootstrap.min.css">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ url('glaxdu') }}/assets/css/icons.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ url('glaxdu') }}/assets/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ url('glaxdu') }}/assets/css/aru_style.css">

    <!-- Modernizer JS -->
    <script src="{{ url('glaxdu') }}/assets/js/vendor/modernizr-3.11.7.min.js"></script>

    <!-- Google Font Thai Set -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Noto+Serif+Thai:wght@100..900&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
</head>

<body>
<header class="header-area">
    @include('webaru.layout_header')
</header>

@yield('content')

<footer class="footer-area">
    @include('webaru.layout_footer')
</footer>

<!-- JS
============================================ -->

<!-- jQuery JS Up date 3.7.1 -->
<script src="{{ url('glaxdu') }}/assets/js/vendor/jquery-3.7.1.min.js"></script>
<!-- Popper JS -->
<script src="{{ url('glaxdu') }}/assets/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="{{ url('glaxdu') }}/assets/js/bootstrap.min.js"></script>
<!-- Plugins JS -->
<script src="{{ url('glaxdu') }}/assets/js/plugins.js"></script>
<!-- Ajax Mail -->
<script src="{{ url('glaxdu') }}/assets/js/ajax-mail.js"></script>
<!-- Main JS -->
<script src="{{ url('glaxdu') }}/assets/js/main.js"></script>

</body>

</html>
