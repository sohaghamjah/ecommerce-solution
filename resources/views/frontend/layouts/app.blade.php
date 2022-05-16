<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ecommerce Solution - @yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/bootstrap.min.css">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/main.css">
    <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/blue.css">
    <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/owl.transitions.css">
    <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/rateit.css">
    <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/bootstrap-select.min.css">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/font-awesome.css">
    <style>
        .swal2-popup.swal2-toast .swal2-title {
            margin: 10px 5px !important;
            font-size: 15px !important;
        }

        .swal2-popup.swal2-toast .swal2-success {
            font-size: 15px !important;
        }
    </style>
    @stack('style')

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    @include('frontend.layouts.includes.header')

    <!-- ============================================== HEADER : END ============================================== -->
    @yield('frontend')
    <!-- /#top-banner-and-menu -->

    <!-- ============================================================= FOOTER ============================================================= -->
    @include('frontend.layouts.includes.footer')
    <!-- ============================================================= FOOTER : END============================================================= -->

    <!-- For demo purposes – can be removed on production -->

    <!-- For demo purposes – can be removed on production : End -->

    <!-- Button trigger modal -->

    <!-- Cart Modal -->
    <div class="modal fade" id="add_cart_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h5 class="modal-title" id="pname"></h5>
                    <button style="margin-top: -20px" type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width:200px;">
                                <img id="pimage" src="" class="card-img-top" alt="" style="height: 200px;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item">Price: <strong class="text-danger">TK <span
                                            id="pprice"></span> </strong>
                                    <del id="pdprice"> </del>
                                </li>
                                <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
                                <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
                                <li class="list-group-item">Brand: <strong id="pbrand"></strong> </li>
                                <li class="list-group-item">Stock: <span class="badge badge-pill badge-success"
                                        id="aviable" style="background:green; color:white;"></span>
                                    <span class="badge badge-pill badge-danger" id="stockout"
                                        style="background:red; color:white;"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" id="cartModalColorArea">
                                <label for="color">Select Color</label>
                                <select id="cartModalColor" class="form-control" id="color" name="color">
                                </select>
                            </div>
                            <div class="form-group" id="cartModalSizeArea">
                                <label for="size">Select Size</label>
                                <select id="cartModalSize" class="form-control" id="size" name="size">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="qty">Quantity</label>
                                <input type="number" class="form-control" id="qty" value="1" min="1">
                            </div>
                            <input type="hidden" id="addToCartProductId">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" id="addTocartBtn">Add To Cart</button>
                </div>
            </div>
        </div>
    </div>


    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="{{ asset('frontend/') }}/assets/js/jquery-1.11.1.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/js/owl.carousel.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/js/echo.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/js/jquery.easing-1.3.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/js/bootstrap-slider.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="{{ asset('frontend/') }}/assets/js/lightbox.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/js/scripts.js"></script>
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>
    <script>
        // Notification 
        let _token = '{!! csrf_token() !!}';
        function notification(type, message) {
            Swal.fire({
                position: 'top-end',
                toast: true,
                icon: type,
                title: message,
                showConfirmButton: false,
                timer: 1500
            })
        }
        $(document).ready(function () {
            @if(session('success'))
                notification('success', "{{ session('success') }}");
            @endif

            // Add to cart modal show

            $(document).on('click', '#add_to_cart_btn', function () {
                var id = $(this).data('id');
                
                $.ajax({
                    type: "POST",
                    url: "{{ route('product.cart.modal.show') }}",
                    data: {
                        'id': id,
                        '_token': _token,
                    },
                    dataType: "JSON",
                    success: function (data) {
                        $('#pname').text(data.product.name_en);
                        // $('#pprice').text(data.product.sale_price);
                        $('#pcode').text(data.product.code);
                        $('#pcategory').text(data.product.category.name_en);
                        $('#pbrand').text(data.product.brand.name_en);
                        $('#pimage').attr('src', "{{ asset('/') }}"+data.product.thumbnail);
                        $('#addToCartProductId').val(id);
                        $('#qty').val(1);

                        //stock
                        if (data.product.qty > 0) {
                                $('#aviable').text('');
                                $('#stockout').text('');
                                $('#aviable').text('In Stock');
                        }else{
                                $('#aviable').text('');
                                $('#stockout').text('');
                                $('#stockout').text('Out Of Stock');
                        }

                        // Product price
                        if (data.product.discount_price == null) {
                            $('#pprice').text('');
                            $('#pdprice').text('');
                            $('#pprice').text(data.product.sale_price);
                            console.log('no');
                        }else{
                            $('#pprice').text(data.product.discount_price);
                            $('#pdprice').text('TK '+data.product.sale_price);
                            console.log('yes');
                        }

                         // Product color
                        $('#cartModalColor').empty();
                        $.each(data.product_color, function (key, value) {
                            $('#cartModalColor').append('<option value="'+value+'">'+value+'</option>')
                        });

                        $('#cartModalSize').empty();
                        $.each(data.product_size, function (key, value) {
                            $('#cartModalSize').append('<option value="'+value+'">'+value+'</option>')
                            if (data.product_size == "") {
                                $('#cartModalSizeArea').hide();
                            }else{
                                $('#cartModalSizeArea').show();
                            }
                        });

                        $('#add_cart_modal').modal('show');
                    }
                });
            })

            // Add To Cart

            $(document).on('click', '#addTocartBtn', function (e) {
                e.preventDefault();
                var id = $('#addToCartProductId').val();
                var color = $('#cartModalColor option:selected').text();
                var size = $('#cartModalSize option:selected').text();
                var qty = $('#qty').val();
                var name = $('#pname').text();

                addToCart(id, color, size, qty, name);

            })

            function addToCart(id, color, size, qty, name){ 
                $.ajax({
                    type: "POST",
                    url: "{{ route('product.add.to.cart') }}",
                    data: {
                        id: id,
                        color: color,
                        size : size,
                        qty  : qty,
                        name : name,
                        _token: _token,
                    },
                    dataType: "json",
                    success: function (response) {
                        $('#add_cart_modal').modal('hide');
                        notification('success', 'Product added to cart')
                        console.log(response);
                        miniCartShow();
                    },
                    error: function (error) {
                        $('#add_cart_modal').modal('hide');
                        notification('error', 'Product added to cart faild!')
                    }
                });
            }
        });

        function miniCartShow(){
            $.ajax({
                type: "POST",
                url: "{{ route('product.mini.cart.show') }}",
                data: {
                    _token: _token,
                },
                dataType: "JSON",
                success: function (data) {
                    $('#subTotal').text(data.total);
                    $('#total-price').text(data.total);
                    $('#totalQty').text(data.count);
                    var html = '';
                    $.each(data.carts, function (key, value) { 
                        html += '<div class="row">'+
                                    '<div class="col-xs-4">'+
                                    '<div class="image"> <a href="detail.html"><img src="{{ asset("/") }}'+value.options.image+'" alt=""></a> </div>'+
                                    '</div>'+
                                    '<div class="col-xs-7">'+
                                    '<h3 class="name"><a href="index.php?page-detail">'+value.name.slice(0,30)+'</a></h3>'+
                                    '<div class="price">'+value.price+ " * " +value.qty+'</div>'+
                                    '</div>'+
                                    '<div class="col-xs-1 action"> <a id="'+value.rowId+'" onclick="miniCartRemove(this.id)" href="javascript:void(0)"><i class="fa fa-trash"></i></a> </div>'+
                                '</div>'
                    });
                    $('#miniCartShow').html(html);
                }
            });
        }

        miniCartShow();

        // Mini cart remove

        function miniCartRemove(rowId){
            $.ajax({
                type: "POST",
                url: "{{ route('product.mini.cart.remove') }}",
                data: {
                    _token: _token,
                    rowId: rowId,
                },
                dataType: "JSON",
                success: function (data) {
                    miniCartShow();
                    notification('success', 'A product remove from cart')
                },
                error: function (error) {
                    notification('error', 'Something went wrong!')
                }
            });
        }

        // Add To wish list

        function addToWishList(id){
            $.ajax({
                type: "POST",
                url: "{{ route('product.wishlist.store') }}",
                data: {
                    _token: _token,
                    id: id,
                },
                dataType: "JSON",
                success: function (data) {
                    if($.isEmptyObject(data.error)){
                        notification('success', data.success);
                    }else{
                        notification('error', data.error);
                    }
                }
            });
        }
    </script>
    @stack('script')
</body>

</html>