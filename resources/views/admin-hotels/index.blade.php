@extends('admin-layout.master') @section('title') Hotels @endsection @section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="/admin-view">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Hotels</li>
</ol>
<!-- Icon Cards-->
<div class="row">
	<!--div class="col-xl-3 col-sm-6 mb-3">
		<a href="/admin/hotels/create" class="btn btn-lg btn-warning btn-block">Add Parking Lot</a>
	</div>
	<div class="col-xl-3 col-sm-6 mb-3">
		<a href="/admin/pricings" class="btn btn-lg btn-dark btn-block text-white">Pricing Schedules</a>
	</div>
	<div class="col-xl-3 col-sm-6 mb-3">
		<a href="/admin/bookings" class="btn btn-lg btn-danger btn-block">Bookings</a>
	</div>
	<div-- class="col-xl-3 col-sm-6 mb-3">
		<a class="btn btn-lg btn-primary btn-block">Value</a>
	</div-->
</div>
@if(session('success'))
<div class="alert alert-success">
	{{session('success')}}
</div>
@endif
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header bg-white">
				<h3 class="card-title">Add a Hotel</h3>
			</div>
			<div class="card-body">
				<form action="/admin/hotels" method="POST">
					{{ csrf_field() }} @if(session('error'))
					<div class="alert alert-danger">
						{{session('error')}}
					</div>
					@endif @if(session('success1'))
					<div class="alert alert-success">
						{{session('success1')}}
					</div>
					@endif
					<div class="form-group">
						<label for="exampleInputName">Name</label>
						<div class="input-group">
							<input class="form-control" id="exampleInputName" name="name" type="text" aria-describedby="emailHelp" placeholder="Enter name"
							 required>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputAddress">Address</label>
						<div class="input-group">
							<input class="form-control" id="exampleInputAddress" name="address" type="text" aria-describedby="emailHelp" placeholder="Enter address"
							 required>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<label for="exampleType">Hotel Room Capacity</label>
								<div class="input-group">
								<input class="form-control" type="number" min="1" name="capacity" required>
								</div>
							</div>
						</div>
					</div>
					<input type="hidden" value="{{Sentinel::check()->id}}" name="user_id">
					<input type="hidden" value="" name="property_id">
					<div class="card-footer">
						<!--a- class="btn btn-primary btn-block" href="login.html">Register</a-->
						<input type="submit" value="Add" class="btn btn-secondary btn-block">
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

<div class="table-responsive mt-3">
	<table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>Capacity</th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<!--th></th-->
			</tr>
		</thead>
		<tbody>
			@forelse($hotels as $hotel)
			<tr>
				<td>{{$hotel->name}}</td>
				<td>{{$hotel->address}}</td>
				<td>{{$hotel->capacity}}</td>
				<td>{{$hotel->created_at->diffForHumans()}}.</td>
				<td>
					<a href="/admin/hotels/{{$hotel->id}}" class="btn btn-sm btn-warning">Manage</a>
				</td>
				<td>
					<a href="/admin/hotels/{{$hotel->id}}/edit" class="">Edit</a>
				</td>
				<td>
					<form action="/admin/hotels/{{$hotel->id}}" method="POST">
						{{method_field('DELETE')}} {{ csrf_field() }}
						<input type="submit" class="btn btn-sm btn-danger" value="Remove">
					</form>
				</td>
				<!--td>
					<a href="/admin/hotels/manage/{{$hotel->id}}" class="btn btn-sm btn-primary">Manage</a>
				</td-->
			</tr>
			@empty
			<tr>
				<td colspan="7">No Hotels.</td>
			</tr>
			@endforelse
		</tbody>
	</table>
</div>


@endsection @section('scripts') @endsection