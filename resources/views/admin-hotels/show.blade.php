@extends('admin-layout.master') @section('title') {{$hotel->name}} Parking Lot @endsection @section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="/admin-view">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">{{$hotel->name}}</li>
</ol>
<div class="row">
	<div class="col-xl-3 col-sm-6 mb-3">
		<a href="/hotel/{{$hotel->id}}/bookings" class="btn btn-lg btn-danger btn-block">Bookings</a>
	</div>
	<div class="col-xl-3 col-sm-6 mb-3">
		<div class="card text-white bg-primary">
			<div class="card-body">
				<div class="card-text">{{$hotel->name}}</div>
			</div>
			<div class="card-footer">
				<small class="card-text">Name</small>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6 mb-3">
		<div class="card text-white bg-success">
			<div class="card-body">
				<div class="card-text">{{$hotel->address}}</div>
			</div>
			<div class="card-footer">
				<small class="card-text">Address</small>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6 mb-3">
		<div class="card text-white bg-dark">
			<div class="card-body">
				<div class="card-text"> {{$hotel->capacity}}</div>
			</div>
			<div class="card-footer">
				<small class="card-text">Capacity</small>
			</div>
		</div>
	</div>
</div>
@if(session('error'))
<div class="alert alert-danger">
	{{session('error')}}
</div>
@endif @if(session('success'))
<div class="alert alert-success">
	{{session('success')}}
</div>
@endif
<input type="hidden" value="{{$hotel->id}}" name="hotel_id">
<input type="hidden" value="{{Sentinel::check()->id}}" name="user_id">
<div class="card">
	<div class="card-header">
			<label>Arrival Date:- </label><input type="date" name="arrival_date">
	</div>
	<div class="card-body">
		<?php 
				$count = count($spaces);
				$i = 0;
				?> @forelse($spaces as $space)
		<?php $available = true; ?> @if($i%4 == 0)
		<div class="row">
			@endif
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" style="padding:2px">
				@forelse($booked as $booking) @if($space == $booking->room_number) @if($booking->user_id == Sentinel::check()->id)
				<!--button onclick="unbook(this)" id="{{$booking->id}}" class="btn btn-primary btn-block">Unbook {{$space}}</button-->
				<form action="/admin/bookings/{{$booking->id}}" method="POST">
					{{method_field('DELETE')}} {{ csrf_field() }}
					<input id="{{$booking->id}}" type="submit" class="btn btn-primary btn-block" value="Unbook {{$space}}">
				</form>
				@else
				<button onclick="" id="{{$space}}" class="btn btn-dark btn-block">Room {{$space}}</button>
				@endif
				<?php $available = false; ?> @break @endif @empty @endforelse @if($available)
				<button onclick="booking(this)" id="{{$space}}" class="btn btn-warning btn-block">Room {{$space}}</button>
				@endif
			</div>
			@if($i%4==3||$i==$count)
		</div>
		@endif
		<?php $i++ ?> @empty @endforelse

	</div>
</div>
@endsection @section('scripts')
<script>
	
	function unbook(obj){
		swal(obj.id);
	}

	function booking(obj){
		var date = $('input[name=arrival_date]').val();
		if(date === ""){
			return swal('Select Arrival Date');
	}
		
		$.ajaxSetup({
            headers:{
                'X-CSRF_TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		swal("Enter Duration", {
			content: "input",
		  })
		  .then((value) => {

			var postData = {
				'duration': value,
				'arrival_date': $('input[name=arrival_date]').val(),
				'hotel_id': $('input[name=hotel_id]').val(),
				'user_id': $('input[name=user_id]').val(),
				'room_number': obj.id,
			};
		
			$.ajax({
				type:'POST',
				url:'/admin/bookings',
				data:postData,
				success: function(response){
				   //console.log(response.redirect);
				   if(response.redirect == "true"){
					var space = document.getElementById(obj.id);
					space.setAttribute('class','btn btn-primary btn-block');
					space.setAttribute('onclick','unbook(this)');
					space.innerHTML = "Unbook "+obj.id
					var i = response.booking;
					var no = obj.id;
					space.setAttribute('id',i.id);
					   return swal("Room "+no+" booked successfully.")
					   .then(() => {
						document.location.reload();
					 });
				   }
				   return swal(response.redirect);
				   
				},
				error: function(response){
					//$('.alert-danger').text(response.responseJSON.error);
					//$('.alert-danger').show();
					return swal(response.responseJSON.error);
				}
			})
		  });
	}

</script>
@endsection