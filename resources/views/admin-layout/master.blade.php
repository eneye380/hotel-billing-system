<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Hotel Billing System | @yield('title')</title>
	<link rel="shortcut icon" href="{{asset('img/fmrepex.jpg')}}"/>
	<link href="{{asset('css/app.css')}}" rel="stylesheet">
	<!-- Custom styles for this template-->
	
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
	<!-- Navigation-->
	@include('admin-layout.top-menu')

	<div class="content-wrapper">
		<div class="container-fluid">
			<!-- Breadcrumbs-->
			@yield('content')
		</div>
		<!-- /.container-fluid-->
		<!-- /.content-wrapper-->

		<!--footer-->
		@include('admin-layout.footer')

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fa fa-angle-up"></i>
		</a>
		<!-- Logout Modal-->
		@include('admin-layout.logout-modal')
		<script src="{{asset('js/app.js')}}"></script>
		@yield('scripts')
		

	</div>
</body>

</html>