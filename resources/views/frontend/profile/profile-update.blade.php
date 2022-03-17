@extends('frontend.layouts.app')
@section('title', 'Profile update')
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
                    <h3 class="text-center"><span class="text-danger"> Hi.... </span><strong>{{ Auth::user()->name }}</strong> Update your profile </h3>

                    <div class="card-body" style="margin-top: 30px">
                        <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="name">Name <span>*</span></label>
                                <input type="text" name="name" class="form-control unicase-form-control text-input"
                                    id="name" value="{{ $user -> name }}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="email">Email Address <span>*</span></label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input"
                                    id="email" value="{{ $user -> email }}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control unicase-form-control text-input"
                                    id="phone" value="{{ $user -> phone }}">
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="info-title" for="phone">Photo</label>
                                        <input type="hidden" name="old_photo" value="{{ $user -> profile_photo_path }}">
                                        <input type="file" name="profile_photo_path" class="form-control unicase-form-control text-input"
                                            id="profile_photo_path">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                   <div class="form-group">
                                    <img id="profile_image_show" src="{{ $user -> profile_photo_path ? asset('upload/user/profile/'. $user -> profile_photo_path) : asset('upload/user/profile/avatar.png')}}" alt="" style="width: 100px; height: 100px">
                                   </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update Profile</button>
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
    <script>
        $(document).ready(function () {
            $('#profile_photo_path').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#profile_image_show').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endpush
