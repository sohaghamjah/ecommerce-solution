@extends('frontend.layouts.app')
@section('title', 'Update password')
@push('style')

@endpush

@section('frontend')

<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            @include('frontend.layouts.includes.user-profile-menu')

            <div class="col-md-1"></div>

            <div class="col-md-7">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger"> Hi.... </span><strong>{{ Auth::user()->name }}</strong> Update your password </h3>

                    <div class="card-body" style="margin-top: 30px">
                        <form method="POST" action="{{ route('user.password.update') }}">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="current_password">Current Password <span>*</span></label>
                                <input type="password" name="oldpassword" class="form-control unicase-form-control text-input"
                                    id="current_password">
                                    @error('oldpassword')
                                        <span class="invalid-feedback text-danger" role="alert">
                                        {{ $message }}
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="current_password">New Password <span>*</span></label>
                                <input type="password" name="password" class="form-control unicase-form-control text-input"
                                    id="password">
                                @error('password')
                                    <span class="invalid-feedback text-danger" role="alert">
                                       {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="current_password">Confirm Password <span>*</span></label>
                                <input type="password" name="password_confirmation" class="form-control unicase-form-control text-input"
                                    id="password_confirmation">
                                @error('password_confirmation')
                                    <span class="invalid-feedback text-danger" role="alert">
                                       {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@push('script')
  
@endpush
