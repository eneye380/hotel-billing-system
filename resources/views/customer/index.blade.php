@extends('customer-layout.master') @section('content')
<h1>Dashboard</h1>
<div class="card">
	<div class="row">
		<div class="card-body m-lg-5">
			<div class="card-header">
				My Bookings
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Hotel</th>
							<th>Room</th>
							<th>Arrival</th>
							<th>Rate</th>
							<th>Duration</th>
							<th>Fee</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@forelse($bookings as $booking)
						<tr>
							<td>{{$booking->hotel->name}}</td>
							<td>{{$booking->room_number}}</td>
							<td>{{$booking->arrival_date}}</td>
							<td>{{$booking->room_rate}}</td>
							<td>{{$booking->duration}}</td>
							<?php 
								$bill = $booking->room_rate * $booking->duration;
							?>
							<td>{{$bill}}</td>
							<td>{{$booking->created_at->diffForHumans()}}.</td>
							<td>
								<a href="/customer/booking/{{$booking->id}}" class="btn btn-sm btn-dark">Print</a>
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="8">No Bookings.</td>
						</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
		<div class="card-body m-lg-5">
			<div class="card-header">
				Hotels
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Name</th>
							<th>Address</th>
							<th>Capacity</th>
							<!--th></th-->
							<th></th>
						</tr>
					</thead>
					<tbody>
						@forelse($hotels as $hotel)
						<tr>
							<td>{{$hotel->name}}</td>
							<td>{{$hotel->address}}</td>
							<td>{{$hotel->capacity}}</td>
							<!--td>{{$hotel->created_at->diffForHumans()}}.</td-->
							<td>
								<a href="/customer/hotels/{{$hotel->id}}" class="btn btn-sm btn-secondary">View</a>
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="5">No Hotels.</td>
						</tr>
						@endforelse
					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>
@endsection @section('scripts')
<script>

</script>
@endsection