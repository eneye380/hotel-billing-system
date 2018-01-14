<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content=" CarPark Booking System">
	<meta name="author" content="Abdulmumin - 08051185104">
	<link rel="icon" href="../../../../favicon.ico">

	<title>CarPark Booking System</title>

	<!-- Bootstrap core CSS -->
	<link href="{{asset('css/app.css')}}" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/dashboard.css" rel="stylesheet">

	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
	<div class="card  col-lg-4 col-lg-offset-4">
		<h3 class="card-header">{{$hotel->name}} <small>Receipt</small></h3>
		<div class=" card-body">
			<p><b>Room Number:</b> {{$booking->room_number}}</p>
			<p><b>Room Rate:</b> {{$booking->room_rate}}</p>
			<p><b>Duration:</b> {{$booking->duration}}</p>
			<p><b>Arrival Date:</b> {{$booking->arrival_date}}</p>
		</div>
		<div class="card-footer text-center">
			<button class="btn btn-default" onclick="window.print()">Print</button>
		</div>

	</div>
</body>