@extends('admin-layout.master') @section('title') Hotels @endsection @section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="/admin-view">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Bill Summary</li>
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
	<h1>Bill Accounting</h1>
	<table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>Hotel</th>
				<th>Room No.</th>
				<th>Customer</th>
                <th>Email</th>
                <th>Arrival Date</th>
				<th>Rate</th>
                <th>Duration</th>
                <th>Fee Charged</th>
				<th>Generated</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@forelse($bills as $bill)
			<tr>
				<td>{{$bill->hotel->name}}</td>
				<td>{{$bill->room_number}}</td>
				<td>{{$bill->user->name}}</td>
                <td>{{$bill->user->email}}</td>
                <td>{{$bill->arrival_date}}</td>
                <td>{{$bill->room_rate}}</td>
                <td>{{$bill->duration}}</td>
                <td>N{{$bill->bill}}.00</td>
                <td>{{$bill->created_at->diffForHumans()}}.</td>
				<td>
					<a href="/bill/{{$bill->id}}/receipt" class="btn btn-sm btn-warning">Print</a>
				</td>
				<!--td>
					<a href="/admin/hotels/{{$bill->id}}/edit" class="">Edit</a>
				</td-->
				<!--td>
					<form action="/admin/hotels/{{$bill->id}}" method="POST">
						{{method_field('DELETE')}} {{ csrf_field() }}
						<input type="submit" class="btn btn-sm btn-danger" value="Remove">
					</form>
				</td-->
				<!--td>
					<a href="/admin/hotels/manage/{{$bill->id}}" class="btn btn-sm btn-primary">Manage</a>
				</td-->
			</tr>
			@empty
			<tr>
				<td colspan="10">No Record.</td>
			</tr>
			@endforelse
		</tbody>
	</table>
</div>


@endsection @section('scripts') @endsection