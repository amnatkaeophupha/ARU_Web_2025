<!doctype html>
{{-- <html lang="en" class="minimal-theme color-sidebar sidebarcolor6"> --}}
<html lang="en" class="minimal-theme">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png"/>
	<!--plugins-->
	<link href="{{url('rocker');}}/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
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
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{url('rocker');}}/css/dark-theme.css"/>
	<link rel="stylesheet" href="{{url('rocker');}}/css/semi-dark.css"/>
	<link rel="stylesheet" href="{{url('rocker');}}/css/header-colors.css"/>
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
	<script src="{{url('rocker');}}/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{{url('rocker');}}/js/jquery.min.js"></script>
	<script src="{{url('rocker');}}/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{url('rocker');}}/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{url('rocker');}}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="{{url('rocker');}}/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{url('rocker');}}/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="{{url('rocker');}}/plugins/chartjs/js/chart.js"></script>
	<script src="{{url('rocker');}}/js/index.js"></script>
	<!--app JS-->
	<script src="{{url('rocker');}}/js/app.js"></script>
	<script>
		new PerfectScrollbar(".app-container")
	</script>
</body>

</html>
