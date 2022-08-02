@extends('admin.layouts.app')
@section('title', 'State Edit')
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
                        <h4 class="box-title">State Edit</h4>
                        <div>
                            <a href="{{ route('state') }}" class="btn btn-success btn-rounded">Manage State</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <form novalidate="" method="POST" action="{{ route('state.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $state -> id }}">

                            <div class="form-group">
                                <label for="" class="required">Division Name</label>
                                <select name="division_id" id="division_id" class="form-control">
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}" {{ $division->id ==  $state-> id ? 'selected' : ''}}>{{ $division->name }}</option>
                                    @endforeach
                                </select>
                                @error('division')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="" class="required">District Name</label>
                                <select name="district_id" id="district_id" class="form-control">
                                        
                                </select>
                                @error('district_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h5>Name<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" id="name" class="form-control" required=""
                                        data-validation-required-message="This field is required" aria-invalid="false" value="{{ $state->name }}">
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
    <script>
        // District get data with ajax

        $(document).ready(function () {
            let value = $('#division_id').val();
            $('#district_id').html('');
            $.ajax({
                type: "POST",
                url: "{{ route('get.district') }}",
                data: {_token: _token, id: value},
                dataType: "JSON",
                success: function (data) {
                    $('#district_id').html(data);
                }
            });
        });

        function division(value){
            $('#district_id').html('');
            $.ajax({
                type: "POST",
                url: "{{ route('get.district') }}",
                data: {_token: _token, id: value},
                dataType: "JSON",
                success: function (data) {
                    $('#district_id').html(data);
                }
            });
        }
    </script>
@endpush