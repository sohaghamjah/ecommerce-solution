@extends('frontend.layouts.app')
@section('title', 'User Dashboard')
@push('style')

@endpush

@section('frontend')

<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            
            @include('frontend.layouts.includes.user-profile-menu')

            <div class="col-md-1"></div>
            <div class="col-md-9">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger"> Hi.... </span><strong>{{ Auth::user()->name }}</strong> Welcome To Ecommerce Solution </h3>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@push('script')

@endpush
