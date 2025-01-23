<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{url('rocker');}}/images/favicon-32x32.png" type="image/png"/>
	<!--plugins-->
	<link href="{{url('rocker');}}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{{url('rocker');}}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{{url('rocker');}}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>
	<!-- loader-->
	<link href="{{url('rocker');}}/css/pace.min.css" rel="stylesheet"/>
	<script src="{{url('rocker');}}/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="{{url('rocker');}}/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{url('rocker');}}/css/bootstrap-extended.css" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{url('rocker');}}/css/app.css" rel="stylesheet">
	<link href="{{url('rocker');}}/css/icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anuphan:wght@100..700&family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Niramit:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{url('rocker');}}/css/dark-theme.css"/>
	<link rel="stylesheet" href="{{url('rocker');}}/css/semi-dark.css"/>
	<link rel="stylesheet" href="{{url('rocker');}}/css/header-colors.css"/>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>@yield('title', 'Default Title')</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
        @include('admin.roker_layout.sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
        @include('admin.roker_layout.header')
		<!--end header -->
		<!--start page wrapper -->
        @yield('content')
		<!--end page wrapper -->
		<!--start overlay-->
		 <div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
        @include('admin.roker_layout.footer_layout')
	</div>
	<!--end wrapper-->

	<!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="{{url('rocker');}}/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	{{-- <script src="{{url('rocker');}}/js/jquery.min.js"></script> --}}
	<script src="{{url('rocker');}}/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{url('rocker');}}/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{url('rocker');}}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--app JS-->
	<script src="{{url('rocker');}}/js/app.js"></script>
</body>

</html>
