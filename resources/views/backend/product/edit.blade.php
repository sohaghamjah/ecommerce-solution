@extends('admin.layouts.app')
@section('title','Product Add')
@push('style')
    {{-- <style>

        input[type="file"] {
        display: block;
        }

        .imageThumb {
            height: 60px;
            width: 60px;
            border: 2px solid #ebebeb;
            padding: 1px;
            cursor: pointer;
        }

        .pip {
            display: inline-block;
            margin: 5px;
            position: relative;
        }

        .remove {
            position: absolute;
            content: "";
            left: 0;
            top: 0px;
            width: 100%;
            height: 0%;
            font-size: 18px;
            background: #444444a8;
            color: white;
            text-align: center;
            cursor: pointer;
            display: none;
        }
        .remove i{
            margin-top: 20px
        }
       .pip:hover .remove{
           transition: 3s all ease;
            height: 100%;
            display: block;
       }
    </style> --}}
@endpush
@section('admin')
<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col">
                <div class="box">
                    <div class="box-header d-flex justify-content-between align-items-center">
                        <h4 class="box-title">Edit Product</h4>
                        <div>
                            <a href="{{ route('product') }}" class="btn btn-success btn-rounded">Manage Product</a>
                        </div>
                    </div>

                    <div class="box-body">
                        <form novalidate="" method="POST" action="{{ route('product.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product -> id }}">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <h5>Brand <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="brand" id="brand" required class="form-control" aria-invalid="false">
                                                <option value="">Select One</option>
                                                @foreach ($brands as $brand)
                                                    <option {{ $brand->id == $product -> brand_id ? "selected" : '' }} value="{{ $brand -> id }}">{{ $brand -> name_en }}</option>
                                                @endforeach
                                            </select>
                                        <div class="help-block"></div></div>
                                        @error('brand')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <h5>Category <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select onchange="addSubCategory()" name="category_id" id="category_id" required class="form-control" aria-invalid="false">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option {{ $category -> id == $product -> category_id ? 'selected' : '' }} value="{{ $category -> id }}">{{ $category -> name_en }}</option>
                                                @endforeach
                                            </select>
                                        <div class="help-block"></div></div>
                                        @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <h5>Sub Category <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select onchange="addSubSubCategory()" name="subcategory_id" id="subcategory_id" required class="form-control" aria-invalid="false">
                                                <option value="">Select Subategory</option>
                                                @foreach ($subcategories as $subcategory)
                                                    <option {{ $subcategory -> id == $product -> subcategory_id ? 'selected' : '' }} value="{{ $subcategory -> id }}">{{ $subcategory -> name_en }}</option>
                                                @endforeach
                                            </select>
                                        <div class="help-block"></div></div>
                                        @error('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <h5>Sub Sub Category <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subsubcategory_id" id="subsubcategory_id" required class="form-control" aria-invalid="false">  
                                                <option value="">Select Subsubategory</option>
                                                @foreach ($subsubcategories as $subsubcategory)
                                                    <option {{ $subsubcategory -> id == $product -> subsubcategory_id ? 'selected' : '' }} value="{{ $subsubcategory -> id }}">{{ $subsubcategory -> name_en }}</option>
                                                @endforeach
                                            </select>
                                        <div class="help-block"></div></div>
                                        @error('subsubcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <h5>Product Name En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Product Name En" aria-invalid="false" required value="{{ $product->name_en }}"> 
                                        <div class="help-block"></div></div>
                                        @error('name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <h5>Product Name Bn <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="name_bn" id="name_bn" placeholder="Product Name Bn" aria-invalid="false" required value="{{ $product->name_bn }}""> 
                                        <div class="help-block"></div></div>
                                        @error('name_bn')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <h5>Product Code <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="code" id="code" placeholder="Product Code" aria-invalid="false" required value="{{ $product->code }}"> 
                                        <div class="help-block"></div></div>
                                        @error('code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <h5>Product Quantity <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="qty" id="qty" placeholder="Product Quantity" aria-invalid="false" required value="{{ $product->qty }}"> 
                                        <div class="help-block"></div></div>
                                        @error('qty')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <h5>Tags En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input name="tag_en" id="tag_en" type="text" value="{{ $product->tag_en }}" data-role="tagsinput" required>
                                        </div>
                                        @error('tag_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <h5>Tags Bn <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input name="tag_bn" id="tag_bn" type="text" value="{{ $product->tag_bn }}" data-role="tagsinput" required>
                                        </div>
                                        @error('tag_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <h5>Size En</h5>
                                        <div class="controls">
                                            <input name="size_en" id="size_en" type="text" value="{{ $product->size_en }}" data-role="tagsinput" >
                                        </div>
                                        @error('size_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <h5>Size Bn</h5>
                                        <div class="controls">
                                            <input name="size_bn" id="size_bn" type="text" value="{{ $product->size_bn }}" data-role="tagsinput" >
                                        </div>
                                        @error('size_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <h5>Color En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input name="color_en" id="color_en" type="text" value="{{ $product->color_en }}" data-role="tagsinput" required>
                                        </div>
                                        @error('color_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <h5>Color Bn <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input name="color_bn" id="color_bn" type="text" value="{{ $product->color_bn }}" data-role="tagsinput" required>
                                        </div>
                                        @error('color_bn')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <h5>Sale Price <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="sale_price" id="sale_price" placeholder="Sale Price" aria-invalid="false" required value="{{ $product->sale_price }}"> 
                                        <div class="help-block"></div></div>
                                        @error('sale_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <h5>Discount Price</h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="discount_price" id="discount_price" placeholder="Discount Price" aria-invalid="false" value="{{ $product->discount_price }}"> 
                                        <div class="help-block"></div></div>
                                        @error('discount_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <h5>Short Description En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea rows="5" name="short_desc_en" id="short_desc_en" class="form-control" required placeholder="Short Description En" aria-invalid="false">{{ $product->short_desc_en }}</textarea>
                                        <div class="help-block"></div></div>
                                        @error('short_desc_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <h5>Short Description Bn <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea rows="5" name="short_desc_bn" id="short_desc_bn" class="form-control" required placeholder="Short Description Bn" aria-invalid="false">{{ $product->short_desc_bn }}</textarea>
                                        <div class="help-block"></div></div>
                                        @error('short_desc_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <h5>Long Description En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="long_desc_en" id="editor1" class="form-control" required placeholder="Short Description Bn" aria-invalid="false">{{ $product->long_desc_en }}</textarea>
                                        <div class="help-block"></div></div>
                                        @error('long_desc_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <h5>Long Description Bn <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="long_desc_bn" id="editor2" class="form-control" required placeholder="Short Description Bn" aria-invalid="false">{{ $product->long_desc_bn }}</textarea>
                                        <div class="help-block"></div></div>
                                        @error('long_desc_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="hot_deals" name="hot_deals" {{ $product->hot_deals == 1 ? 'checked' : '' }} value="1" aria-invalid="false">
                                                <label for="hot_deals">Hot Dealts</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="featured" name="featured" {{ $product->hot_deals == 1 ? 'checked' : '' }} value="1" aria-invalid="false">
                                                <label for="featured">Featured</label>
                                            </fieldset>
                                        <div class="help-block"></div></div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="special_offer" name="special_offer" {{ $product->special_offer == 1 ? 'checked' : '' }} value="1" aria-invalid="false">
                                                <label for="special_offer">Special Offer</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="special_deals" name="special_deals" {{ $product->special_deals == 1 ? 'checked' : '' }}value="1" aria-invalid="false">
                                                <label for="special_deals">Secial Deals</label>
                                            </fieldset>
                                        <div class="help-block"></div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Update Product">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="box">
                    <div class="box-header d-flex justify-content-between align-items-center">
                        <h4 class="box-title">Edit Product Thumbnail Image</h4>
                        <div>
                            <a href="{{ route('product') }}" class="btn btn-success btn-rounded">Manage Product</a>
                        </div>
                    </div>

                    <div class="box-body">
                        <form novalidate="" method="POST" action="{{ route('product.thumbnail.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card" style="margin: 5px">
                                        <img class="card-img-top" src="{{ asset($product->thumbnail) }}" alt="{{ $product -> name_en }}" width="100">
                                        <div class="card-body" style="padding: 10px 5px">
                                            <div class="form-group">
                                                <h5>Change Photo</h5>
                                                <div class="controls">
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <input type="hidden" name="old_img" value="{{ $product->thumbnail }}">
                                                    <input type="file" class="form-control" name="thumbnail" id="thumbnail" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Update Product">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="box">
                    <div class="box-header d-flex justify-content-between align-items-center">
                        <h4 class="box-title">Edit Product Multiple Image</h4>
                        <div>
                            <a href="{{ route('product') }}" class="btn btn-success btn-rounded">Manage Product</a>
                        </div>
                    </div>

                    <div class="box-body">
                        <form novalidate="" method="POST" action="{{ route('product.multi.image.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                               @foreach ($multimages as $item)
                                <div class="col-md-3">
                                    <div class="card" style="margin: 5px">
                                        <img class="card-img-top" src="{{ asset($item->image) }}" alt="Card image cap" width="100">
                                        <div class="card-body" style="padding: 10px 5px">
                                            <a href="{{ route('product.multi.image.delete') }}" data-id="{{ $item -> id }}" class="btn btn-danger btn-rounded delete-data"><i class="fas fa-trash"></i></a>
                                            <br><br>
                                            <div class="form-group">
                                                <h5>Change Photo</h5>
                                                <div class="controls">
                                                    <input type="file" class="form-control" name="multi_img[{{ $item -> id }}]" id="image" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               @endforeach
                               <div class="col-md-3">
                                    <div class="card" style="margin: 5px">
                                        <im5g id="show_new_multimage" class="card-img-top" src="" width="100">
                                        <div class="card-body" style="padding: 10px 5px">
                                            <div class="form-group">
                                                <h5>Add New Image</h5>
                                                <div class="controls">
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <input onchange="addNewMultImage(this)" type="file" class="form-control" name="image" id="image" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Update Product">
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



        // Add sub category ajax
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
                        html+= '<option value="">Select One</option>';
                        $.each(response, function (key, value) { 
                             html += '<option value="'+value.id+'">'+value.name_en+'</option>';
                        });
                        $('#subcategory_id').append(html);
                    }
                });
            }
        }
        // Add sub sub category ajax

        function addSubSubCategory(){
            let id = $('#subcategory_id').val();
            if(id){
                $.ajax({
                    type: "post",
                    url: "{{ route('get.subsubcategory.ajax') }}",
                    data: {
                        id: id,
                        _token: _token
                    },
                    dataType: "json",
                    success: function (response) {
                        $('#subsubcategory_id').empty();
                        var html = '';
                        html+= '<option value="">Select One</option>';
                        $.each(response, function (key, value) { 
                             html += '<option value="'+value.id+'">'+value.name_en+'</option>';
                        });
                        $('#subsubcategory_id').append(html);
                    }
                });
            }
        }

        // Add New multiple image

        function addNewMultImage(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#show_new_multimage').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }


        $(document).on('click','.delete-data', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var url = "{{ route('product.multi.image.delete') }}";
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            id: id,
                            _token: _token,
                        },
                        dataType: "json",
                        success: function (response) {
                            Swal.fire(
                                'Deleted!',
                                'One image deleted successfull.',
                                'success'
                            )
                            window.location.reload();
                        }
                    })
                }
            })
        });

    </script>
@endpush
