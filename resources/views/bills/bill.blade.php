@extends('admin-layout.master') @section('title') Hotels @endsection @section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="/admin-view">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Receipt</li>
</ol>

@if(session('success'))
<div class="alert alert-success">
	{{session('success')}}
</div>
@endif

<div class="table-responsive mt-3">
	<div class="card">
        <table class="table">
            <tr class="text-center">
                <th colspan="4" style="font-size:32px">{{$booking->hotel->name}} <small>Bill Receipt</small></th>
            </tr>
            <tr style="color:green">
                <th colspan="2" >Customer Information</th>
                <th colspan="2" >Bill Information</th>
            </tr>
            <tr>
                <th>Name</th>
                <td colspan="3">{{$booking->user->name}}</td>
            </tr>
            <tr>
                    <th>Phone</th>
                    <td>{{$booking->user->phone_number}}</td>
                    <td><b>Rate</b> - N{{$booking->room_rate}}</td>
                    <td><b>Duration</b> - {{$booking->duration}} days</td>
                </tr>
                <tr>
                        <th>Email</th>
                        <td>{{$booking->user->email}}</td>
                        <td colspan="2"><b>Bill:-  </b> N{{$fee}}</td>
                    
                    </tr>
            </table>
    </div>
	
</div>


@endsection @section('scripts') @endsection