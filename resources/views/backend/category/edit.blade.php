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
                    <div class="box-header">
                        <h4 class="box-title">Category Edit</h4>
                        <div class="box-controls pull-right">

                        </div>
                    </div>

                    <div class="box-body">
                        <form novalidate="" method="POST" action="{{ route('category.update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $category -> id }}">
                            <div class="form-group">
                                <h5>Category Name En<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name_en" id="name_en" class="form-control" required=""
                                        data-validation-required-message="This field is required" aria-invalid="false" value="{{ $category -> name_en }}">
                                    <div class="help-block"></div>
                                    @error('name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Category Name Bn<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name_bn" id="name_bn" class="form-control" required=""
                                        data-validation-required-message="This field is required" aria-invalid="false" value="{{ $category -> name_bn }}">
                                    <div class="help-block"></div>
                                    @error('name_bn')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Category Icon<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <span class="btn btn-success" style="display: inline-block; margin-bottom: 10px"><i class="{{ $category->icon }}"></i></span>
                                    <input type="text" name="icon" id="icon" class="form-control" required=""
                                        data-validation-required-message="This field is required" aria-invalid="false" value="{{ $category->icon }}">
                                    <div class="help-block"></div>
                                    @error('icon')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Update Category">
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