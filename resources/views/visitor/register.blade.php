@extends('visitor-layout.master') @section('content')
<div class="card" style="color:black">
	<div class="card-header">Register</div>
	<div class="card-body">
		<form role="form" method="POST" action="{{ url('/users') }}">
			{!! csrf_field() !!} @if(session('error'))
			<div class="alert alert-danger">
				{{session('error')}}
			</div>
			@endif @if(session('success'))
			<div class="alert alert-success">
				{{session('success')}}
			</div>
			@endif
			<div class="form-group row">
				<label class="col-lg-4 col-form-label text-lg-right">Name</label>

				<div class="col-lg-6">
					<input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
					 required> @if ($errors->has('name'))
					<div class="invalid-feedback">
						<strong>{{ $errors->first('name') }}</strong>
					</div>
					@endif
				</div>
			</div>

			<div class="form-group row">
				<label class="col-lg-4 col-form-label text-lg-right">E-Mail Address</label>

				<div class="col-lg-6">
					<input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
					 required> @if ($errors->has('email'))
					<div class="invalid-feedback">
						<strong>{{ $errors->first('email') }}</strong>
					</div>
					@endif
				</div>
			</div>
			<div class="form-group">
				<div class="form-row">
					<div class="col-md-6">
						<label for="exampleType">Phone Number</label>
						<div class="input-group">
							<input class="form-control" type="text" name="phone_number" required>
						</div>
                    </div>
                    <div class="col-md-6">
                            <label for="exampleType">Passport/Indentity Number</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="identity_number" required>
                            </div>
                        </div>
				</div>
			</div>
			<input type="hidden" value="customer">
			<div class="form-group row">
				<label class="col-lg-4 col-form-label text-lg-right">Password</label>

				<div class="col-lg-6">
					<input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required> @if ($errors->has('password'))
					<div class="invalid-feedback">
						<strong>{{ $errors->first('password') }}</strong>
					</div>
					@endif
				</div>
			</div>

			<div class="form-group row">
				<label class="col-lg-4 col-form-label text-lg-right">Confirm Password</label>

				<div class="col-lg-6">
					<input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation"
					 required> @if ($errors->has('password_confirmation'))
					<div class="invalid-feedback">
						<strong>{{ $errors->first('password_confirmation') }}</strong>
					</div>
					@endif
				</div>
			</div>

			<div class="form-group row">
				<div class="col-lg-6 offset-lg-4">
					<button type="submit" class="btn btn-dark">
						Register
					</button>
				</div>
			</div>
	</div>
</div>
</div>
@endsection