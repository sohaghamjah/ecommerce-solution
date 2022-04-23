@extends('admin.layouts.app')
@section('title', 'Sub Sub Category Edit')
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
                        <h4 class="box-title">Edit Sub Sub Category</h4>
                        <div class="box-controls pull-right">
                            
                        </div>
                    </div>

                    <div class="box-body">
                        <form novalidate="" method="POST" action="{{ route('sub.sub.category.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $subsubcategory->id }}">
                            <div class="form-group">
								<h5>Category <span class="text-danger">*</span></h5>
								<div class="controls">
									<select onchange="addSubCategory()" name="category_id" id="category_id" required="" class="form-control" aria-invalid="false">
										<option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option {{ $subsubcategory->category->id == $category -> id ? "selected" : '' }} value="{{ $category -> id }}" >{{ $category -> name_en }}</option>
                                        @endforeach
									</select>
								<div class="help-block"></div></div>
                                @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
							</div>
                            <div class="form-group">
								<h5>Sub Category <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="subcategory_id" id="subcategory_id" required="" class="form-control" aria-invalid="false">
										<option value="">Select Sub Category</option>
									</select>
								<div class="help-block"></div></div>
                                @error('subcategory_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
							</div>
                            <div class="form-group">
                                <h5>Sub Category Name En<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name_en" id="name_en" class="form-control" required=""
                                        data-validation-required-message="This field is required" aria-invalid="false" value="{{ $subsubcategory -> name_en }}">
                                    <div class="help-block"></div>
                                    @error('name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Sub Category Name Bn<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name_bn" id="name_bn" class="form-control" required=""
                                        data-validation-required-message="This field is required" aria-invalid="false" value="{{ $subsubcategory -> name_bn }}">
                                    <div class="help-block"></div>
                                    @error('name_bn')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Update Sub Category">
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
        let id = $('#category_id').val();
        if(id){
            $.ajax({
                type: "post",
                url: "{{ route('add.subcategory.ajax') }}",
                data: {
                    id: id,
                    _token: _token
                },
                dataType: "json",
                success: function (response) {
                    $('#subcategory_id').empty();
                    var html = '';
                    $.each(response, function (key, value) { 
                            html += '<option value="'+value.id+'">'+value.name_en+'</option>';
                    });
                    $('#subcategory_id').append(html);
                }
            });
        }
        function addSubCategory(){
            let id = $('#category_id').val();
            if(id){
                $.ajax({
                    type: "post",
                    url: "{{ route('add.subcategory.ajax') }}",
                    data: {
                        id: id,
                        _token: _token
                    },
                    dataType: "json",
                    success: function (response) {
                        $('#subcategory_id').empty();
                        var html = '';
                        $.each(response, function (key, value) { 
                             html += '<option value="'+value.id+'">'+value.name_en+'</option>';
                        });
                        $('#subcategory_id').append(html);
                    }
                });
            }
        }
</script>
@endpush

