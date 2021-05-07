@extends('layouts.guest')
@section('content')
<div class="login-box">
    <div class="card card-outline card-primary">
        @include('layouts.login-logo')

        <div class="card-body">
            <p class="login-box-msg">{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</p>
            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success" role="alert">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
                @endif
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Resend Verification Email') }}</button>
                    </div>

                </div>
            </form>



            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-secondary btn-block">{{ __('Log out') }}</button>
                    </div>
                </div>

                
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection