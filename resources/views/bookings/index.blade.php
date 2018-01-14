@extends('admin-layout.master') @section('title') Hotels @endsection @section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="/admin-view">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Bookings</li>
</ol>

@if(session('success'))
<div class="alert alert-success">
	{{session('success')}}
</div>
@endif
@if(session('error'))
<div class="alert alert-warning">
	{{session('error')}}
</div>
@endif

<div class="table-responsive mt-3">
	<h1>{{$hotel->name}}</h1>
	<table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>Customer</th>
				<th>Identity No</th>
				<th>Email</th>
				<th>Phone Number</th>
				<th></th>
				<th></th>
				<!--th></th-->
				<!--th></th-->
			</tr>
		</thead>
		<tbody>
			@forelse($bookings as $booking)
			<tr>
				<td>{{$booking->user->name}}</td>
				<td>{{$booking->user->identity_number}}</td>
				<td>{{$booking->user->email}}</td>
				<td>{{$booking->user->phone_number}}</td>
				<td>{{$booking->created_at->diffForHumans()}}.</td>
				<td>
					<a href="/booking/{{$booking->id}}/bill" class="btn btn-sm btn-warning">Bill Customer</a>
				</td>
				<!--td>
					<a href="/admin/hotels/{{$booking->id}}/edit" class="">Edit</a>
				</td-->
				<!--td>
					<form action="/admin/hotels/{{$booking->id}}" method="POST">
						{{method_field('DELETE')}} {{ csrf_field() }}
						<input type="submit" class="btn btn-sm btn-danger" value="Remove">
					</form>
				</td-->
				<!--td>
					<a href="/admin/hotels/manage/{{$booking->id}}" class="btn btn-sm btn-primary">Manage</a>
				</td-->
			</tr>
			@empty
			<tr>
				<td colspan="7">No Bookings.</td>
			</tr>
			@endforelse
		</tbody>
	</table>
</div>


@endsection @section('scripts') @endsection