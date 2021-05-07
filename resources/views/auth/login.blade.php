@extends('layouts.guest')
@section('content')
<div class="login-box">
	<!-- /.login-logo -->
	<div class="card card-outline card-primary">
		@include('layouts.login-logo')
		<div class="card-body">
			<p class="login-box-msg">Sign in to start your session</p>
			@if(session()->has('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
			@endif

			@if ($errors->any())
			<div class="alert alert-danger" role="alert">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ __($error) }}</li>
					@endforeach
				</ul>
			</div>
			@endif

			<form action="{{ route('login') }}" method="post">
				@csrf
				<div class="input-group mb-3">
					<input type="email"name="email" value="{{ old('email') }}" class="form-control" placeholder="{{ __('Email') }}" required autofocus>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>

				<div class="input-group mb-3">
					<input type="password" name="password" class="form-control" placeholder="{{ __('Password') }}" required autocomplete="current-password">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-7">
						<div class="icheck-primary">
							<input type="checkbox" id="remember_me" name="remember">
							<label for="remember_me" class="text-sm">
								{{ __('Remember me') }}
							</label>
						</div>
					</div>
					<!-- /.col -->
					<div class="col-5">
						<button type="submit" class="btn btn-primary btn-block">{{ __('Log in') }}</button>
					</div>
					<!-- /.col -->
				</div>
			</form>

			<div class="social-auth-links text-center mt-2 mb-3">
				<a href="#" class="btn btn-block btn-primary">
					<i class="fab fa-facebook mr-2"></i> Sign in using Facebook
				</a>
				<a href="#" class="btn btn-block btn-danger">
					<i class="fab fa-google-plus mr-2"></i> Sign in using Google+
				</a>
			</div>
			<!-- /.social-auth-links -->

			@if (Route::has('password.request'))
			<p class="mb-1">
				<a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
			</p>
			@endif

			@if (Route::has('register'))
                <p class="mb-0">
					<a href="{{ route('register') }}" class="text-center">{{ __('Register') }}</a>
				</p>
            @endif
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>
@endsection