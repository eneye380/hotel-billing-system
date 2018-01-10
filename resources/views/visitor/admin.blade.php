@extends('visitor-layout.master')
@section('content')
<div class="card"  style="color:black">
    <div class="card-header">Login</div>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="/admin">
            {{ csrf_field() }}
            @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
            @endif @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="email" class="col-lg-4 col-form-label text-lg-right">E-Mail Address</label>

                <div class="col-lg-6">
                    <input
                            id="email"
                            type="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                    >

                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-lg-4 col-form-label text-lg-right">Password</label>

                <div class="col-lg-6">
                    <input
                            id="password"
                            type="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                            name="password"
                            required
                    >

                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-6 offset-lg-4">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-8 offset-lg-4">
                    <button type="submit" class="btn btn-dark">
                        Login
                    </button>

                   
                </div>
            </div>
        </form>
    </div>
</div>
            @endsection