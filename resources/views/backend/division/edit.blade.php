@extends('admin.layouts.app')
@push('style')

@endpush
@section('admin')
<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header d-flex justify-content-between align-items-center">
                        <h4 class="box-title">Division Edit</h4>
                        <div>
                            <a href="{{ route('division') }}" class="btn btn-success btn-rounded">Manage Division</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <form novalidate="" method="POST" action="{{ route('division.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $division -> id }}">

                            <div class="form-group">
                                <h5>Name<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" id="name" class="form-control" required=""
                                        data-validation-required-message="This field is required" aria-invalid="false" value="{{ $division->name }}">
                                    <div class="help-block"></div>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Update Division">
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