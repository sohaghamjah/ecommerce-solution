@extends('admin.layouts.app')
@push('style')

@endpush
@section('admin')
<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="box">
                <div class="box-header with-border d-flex justify-content-between">
                    <h4 class="box-title">Profile Update</h4>
                    <a href="{{ route('admin.profile.index') }}" class="btn btn-success mb-5">Go Back</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form novalidate="" method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" required="" value="{{ $admin -> name }}"
                                                            data-validation-required-message="This field is required"
                                                            aria-invalid="false">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin Email <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control" required="" value="{{ $admin -> email }}"
                                                            data-validation-required-message="This field is required"
                                                            aria-invalid="false">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Profile Photo <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="hidden" name="old_admin_photo" value="{{ $admin -> profile_photo_path }}">
                                                        <input id="profileImageInput" type="file" name="profile_photo_path" class="form-control" required=""
                                                            aria-invalid="false">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <img id="profileImageShow" src="{{ $admin -> profile_photo_path ? asset('upload/admin/profile/'. $admin -> profile_photo_path) : asset('upload/admin/profile/avatar.png') }}" alt="User Avatar" style="width: 88px; height: 88px">
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Submit">
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
@push('script')
    <script>
        $(document).ready(function () {
            $('#profileImageInput').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#profileImageShow').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endpush