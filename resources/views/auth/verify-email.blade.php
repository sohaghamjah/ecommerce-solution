@extends('frontend.layouts.app')
@section('title', 'Login/Register')
@push('style')

@endpush

@section('frontend')
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li class='active'>Email Veriry</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container --> 
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page" style="margin-bottom: 60px">
            <div class="row">
                <!-- Sign-in -->
                <div class="col-md-6 col-sm-6 sign-in">
                    <h4 class="">Verify your email address</h4>
                    <p class="">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.</p>
                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif
                    <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Resend Verification Email</button>
                    </form>
                    <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Logout</button>
                    </form>
                </div>
                <!-- Sign-in -->
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->

    </div><!-- /.container -->
</div><!-- /.body-content -->

@endsection

@push('script')

@endpush
