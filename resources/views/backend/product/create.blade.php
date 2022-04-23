@extends('admin.layouts.app')
@section('title','Product Add')
@push('style')
    <style>

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
    </style>
@endpush
@section('admin')
<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col">
                <div class="box">
                    <div class="box-header d-flex justify-content-between align-items-center">
                        <h4 class="box-title">Add New Product</h4>
                        <div>
                            <a href="{{ route('product') }}" class="btn btn-success btn-rounded">Manage Product</a>
                        </div>
                    </div>

                    <div class="box-body">
                        <form novalidate="" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <h5>Brand <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="brand" id="brand" required class="form-control" aria-invalid="false">
                                                <option value="">Select One</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand -> id }}">{{ $brand -> name_en }}</option>
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
                                                    <option value="{{ $category -> id }}">{{ $category -> name_en }}</option>
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
                                            <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Product Name En" aria-invalid="false" required value="{{ old('name_en') }}"> 
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
                                            <input type="text" class="form-control" name="name_bn" id="name_bn" placeholder="Product Name Bn" aria-invalid="false" required value="{{ old('name_bn') }}"> 
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
                                            <input type="text" class="form-control" name="code" id="code" placeholder="Product Code" aria-invalid="false" required value="{{ old('code') }}"> 
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
                                            <input type="text" class="form-control" name="qty" id="qty" placeholder="Product Quantity" aria-invalid="false" required value="{{ old('qty') }}"> 
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
                                            <input name="tag_en" id="tag_en" type="text" value="Tag 1, Tag 2, Tag 3, Tag 4" data-role="tagsinput" required>
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
                                            <input name="tag_bn" id="tag_bn" type="text" value="ট্যাগ ১, ট্যাগ ২, ট্যাগ ৩, ট্যাগ ৪" data-role="tagsinput" required>
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
                                            <input name="size_en" id="size_en" type="text" value="S,M,L,XL,XXL" data-role="tagsinput" >
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
                                            <input name="size_bn" id="size_bn" type="text" value="S,M,L,XL,XXL" data-role="tagsinput" >
                                        </div>
                                        @error('size_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <h5>Color En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input name="color_en" id="color_en" type="text" value="Black,White,Red" data-role="tagsinput" required>
                                        </div>
                                        @error('color_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <h5>Color Bn <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input name="color_bn" id="color_bn" type="text" value="কালো,সাদা,লাল" data-role="tagsinput" required>
                                        </div>
                                        @error('color_bn')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <h5>Sale Price <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="sale_price" id="sale_price" placeholder="Sale Price" aria-invalid="false" required value="{{ old('sale_price') }}"> 
                                        <div class="help-block"></div></div>
                                        @error('sale_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>

                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <h5>Discount Price</h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="discount_price" id="discount_price" placeholder="Discount Price" aria-invalid="false" value="{{ old('discount_price') }}"> 
                                        <div class="help-block"></div></div>
                                        @error('discount_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <h5>Thumbnail <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input onchange="thumbnailChange(this)" type="file" class="form-control" name="thumbnail" id="thumbnail" aria-invalid="false" required>  
                                            <div class="help-block"></div>
                                            <img src="" alt="" id="showThumbnail">
                                            @error('thumbnail')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <h5>Multi Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg"  required>
                                            <div class="help-block"></div>
                                            <div id="preview_img"></div>
                                        </div>
                                        @error('multi_img')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <h5>Short Description En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea rows="5" name="short_desc_en" id="short_desc_en" class="form-control" required placeholder="Short Description En" aria-invalid="false">{{ old('short_desc_en') }}</textarea>
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
                                            <textarea rows="5" name="short_desc_bn" id="short_desc_bn" class="form-control" required placeholder="Short Description Bn" aria-invalid="false">{{ old('short_desc_bn') }}</textarea>
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
                                            <textarea name="long_desc_en" id="editor1" class="form-control" required placeholder="Short Description Bn" aria-invalid="false">{{ old('long_desc_en') }}</textarea>
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
                                            <textarea name="long_desc_bn" id="editor2" class="form-control" required placeholder="Short Description Bn" aria-invalid="false">{{ old('long_desc_bn') }}</textarea>
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
                                                <input type="checkbox" id="hot_deals" name="hot_deals" value="1" aria-invalid="false">
                                                <label for="hot_deals">Hot Dealts</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_3" name="checkbox_3" value="1" aria-invalid="false">
                                                <label for="checkbox_3">Featured</label>
                                            </fieldset>
                                        <div class="help-block"></div></div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="special_offer" name="special_offer" value="1" aria-invalid="false">
                                                <label for="special_offer">Special Offer</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="special_deals" name="special_deals" value="1" aria-invalid="false">
                                                <label for="special_deals">Secial Deals</label>
                                            </fieldset>
                                        <div class="help-block"></div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Add Product">
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

        // Thumbnail Image show

        function thumbnailChange(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showThumbnail').attr('src', e.target.result).css({"width": "60px", "height": "60px", "margin": "5px", "border": "2px solid #ebebeb"});
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // multiple image upload

        $(document).ready(function(){
            $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data
                    
                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                            return function(e) {
                                var img = '<span class="pip">'+
                                            '<img class="imageThumb" src="'+e.target.result+'" alt="'+e.target.result.name+'" title="'+e.target.result.name+'">'+
                                            '<br><span class="remove"><i class="fas fa-times"><i></span>'+
                                        '</span>'
                                $('#preview_img').append(img);
                            };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });
                    
                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });

            $(document).on('click', '.remove', function(){
                var pips = $('.pip').toArray();
                var $selectedPip = $(this).parent('.pip');
                var index = pips.indexOf($selectedPip[0]);

                var dt = new DataTransfer();
                var files = $("#multiImg")[0].files;

                for (var fileIdx = 0; fileIdx < files.length; fileIdx++) {
                    if (fileIdx !== index) {
                    dt.items.add(files[fileIdx]);
                    }
                }

                $("#multiImg")[0].files = dt.files;

                $selectedPip.remove();
            });
        });
    </script>
@endpush
