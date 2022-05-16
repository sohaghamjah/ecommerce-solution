@extends('frontend.layouts.app')
@section('title', 'Home')
@push('style')

@endpush
@section('frontend')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Wishlist</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="my-wishlist-page">
            <div class="row">
                <div class="col-md-12 my-wishlist">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="4" class="heading-title">My Wishlist</th>
                                </tr>
                            </thead>
                            <tbody id="wishlistData">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.layouts.includes.brand')
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.container -->
</div><!-- /.body-content -->

@endsection
@push('script')
    <script>
        function wishlist(){
            $.ajax({
                type: "POST",
                url: "{{ route('wishlist.data.get') }}",
                data: {
                    _token: _token
                },
                dataType: "JSON",
                success: function (data) {
                    var html = '';
                    $.each(data, function (key,value) { 
                         html += `<tr>
                                    <td class="col-md-2"><img src="{{ asset('/') }}${value.product.thumbnail}" alt="imga"></td>
                                    <td class="col-md-7">
                                        <div class="product-name"><a href="#">${value.product.name_en}</a></div>

                                        <div class="price">
                                            ${value.product.discount_price == null ?
                                                `${value.product.sale_price}` :
                                                `${value.product.discount_price} <span>${value.product.sale_price}</span>`
                                            }
                                        </div>
                                    </td>
                                    <td class="col-md-2">
                                        <a href="#" id="add_to_cart_btn" data-id="${value.product.id}" class="btn-upper btn btn-primary">Add to cart</a>
                                    </td>
                                    <td class="col-md-1 close-btn">
                                        <a href="javascript:void(0)" id="${value.id}" onclick="wishlistRemove(this.id)" class=""><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>`
                    });

                    $('#wishlistData').html(html);


                }
            });
        }
        wishlist();

        function wishlistRemove(id){
            $.ajax({
                type: "POST",
                url: "{{ route('product.wishlist.remove') }}",
                data: {
                    _token: _token,
                    id: id,
                },
                dataType: "JSON",
                success: function (data) {
                    wishlist();
                    notification('success', 'Wishlist product remove from cart')
                },
                error: function (error) {
                    notification('error', 'Something went wrong!')
                }
            });
        }
    </script>
@endpush