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
                        <h4 class="box-title">Coupon Edit</h4>
                        <div class="box-controls pull-right">

                        </div>
                    </div>

                    <div class="box-body">
                        <form novalidate="" method="POST" action="{{ route('coupon.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $coupon -> id }}">

                            <div class="form-group">
                                <h5>Name<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" id="name" class="form-control" required=""
                                        data-validation-required-message="This field is required" aria-invalid="false" value="{{ $coupon->name }}">
                                    <div class="help-block"></div>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Discount<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="discount" id="discount" class="form-control" required=""
                                        data-validation-required-message="This field is required" aria-invalid="false" value="{{ $coupon->discount }}">
                                    <div class="help-block"></div>
                                    @error('discount')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Validity<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" name="validity" id="validity" class="form-control" required=""
                                    value="{{ $coupon->validity }}">
                                    <div class="help-block"></div>
                                    @error('validity')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="demo-checkbox">
                                    <input type="checkbox" id="status" name="status" value="1" {{ $coupon -> status == 1 ? 'checked' : '' }}>
                                    <label for="status" >Status</label>
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Update Coupon">
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