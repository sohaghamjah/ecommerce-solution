@extends('admin.layouts.app')
@section('title','Slider Edit')
@push('style')

@endpush
@section('admin')
<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Update Slider</h4>
                        <div class="box-controls pull-right">

                        </div>
                    </div>

                    <div class="box-body">
                        <form novalidate="" method="POST" action="{{ route('slider.update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $slider -> id }}">
                            <div class="form-group">
                                <h5>Slider Title</h5>
                                <div class="controls">
                                    <input type="text" name="title" id="title" class="form-control" required=""
                                        data-validation-required-message="This field is required" aria-invalid="false" value="{{ $slider -> title }}">
                                    <div class="help-block"></div>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Slider Description</h5>
                                <div class="controls">
                                    <textarea rows="5" name="description" id="description" class="form-control" required placeholder="Short Description En" aria-invalid="false">{{ $slider -> description }}</textarea>
                                <div class="help-block"></div></div>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <h5>Slider Image<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="hidden" name="slider_old_image" value="{{ $slider->image }}">
                                    <img src="{{ asset($slider->image) }}" alt="" width="120px" height="60px" style="margin-bottom: 10px">
                                    <input type="file" name="image" id="image" class="form-control" required=""
                                        data-validation-required-message="This field is required" aria-invalid="false">
                                    <div class="help-block"></div>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Update Slider">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
@push('script')

@endpush