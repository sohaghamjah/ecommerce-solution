@extends('frontend.layouts.app')
@section('title', 'Home')
@push('style')

@endpush
@section('frontend')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Shopping Cart</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
    <div class="container">
        <div class="row ">
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th class="cart-description item">Image</th>
                                <th class="cart-product-name item">Product Name</th>
                                <th class="cart-edit item">Color</th>
                                <th class="cart-qty item">Size</th>
                                <th class="cart-sub-total item">Qty</th>
                                <th class="cart-total last-item">Subtotal</th>
                                <th class="cart-romove item">Remove</th>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="shopping-cart-btn">
                                            <span class="">
                                                <a href="#" class="btn btn-upper btn-primary outer-left-xs">Continue
                                                    Shopping</a>
                                                <a href="#"
                                                    class="btn btn-upper btn-primary pull-right outer-right-xs">Update
                                                    shopping cart</a>
                                            </span>
                                        </div><!-- /.shopping-cart-btn -->
                                    </td>
                                </tr>
                            </tfoot>
                            <tbody id="cartPageData">

                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div>
                </div><!-- /.shopping-cart-table -->
                <div class="col-md-4 col-sm-12 estimate-ship-tax">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <span class="estimate-title">Estimate shipping and tax</span>
                                    <p>Enter your destination to get shipping and tax.</p>
                                </th>
                            </tr>
                        </thead><!-- /thead -->
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label class="info-title control-label">Country <span>*</span></label>
                                        <select class="form-control unicase-form-control selectpicker">
                                            <option>--Select options--</option>
                                            <option>India</option>
                                            <option>SriLanka</option>
                                            <option>united kingdom</option>
                                            <option>saudi arabia</option>
                                            <option>united arab emirates</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title control-label">State/Province <span>*</span></label>
                                        <select class="form-control unicase-form-control selectpicker">
                                            <option>--Select options--</option>
                                            <option>TamilNadu</option>
                                            <option>Kerala</option>
                                            <option>Andhra Pradesh</option>
                                            <option>Karnataka</option>
                                            <option>Madhya Pradesh</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title control-label">Zip/Postal Code</label>
                                        <input type="text" class="form-control unicase-form-control text-input"
                                            placeholder="">
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn-upper btn btn-primary">GET A QOUTE</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div><!-- /.estimate-ship-tax -->

                <div class="col-md-4 col-sm-12 estimate-ship-tax">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <span class="estimate-title">Discount Code</span>
                                    <p>Enter your coupon code if you have one..</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control unicase-form-control text-input"
                                            placeholder="You Coupon..">
                                    </div>
                                    <div class="clearfix pull-right">
                                        <button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div><!-- /.estimate-ship-tax -->

                <div class="col-md-4 col-sm-12 cart-shopping-total">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <div class="cart-sub-total">
                                        Subtotal<span class="inner-left-md">${{ $total }}</span>
                                    </div>
                                    <div class="cart-grand-total">
                                        Grand Total<span class="inner-left-md">$600.00</span>
                                    </div>
                                </th>
                            </tr>
                        </thead><!-- /thead -->
                        <tbody>
                            <tr>
                                <td>
                                    <div class="cart-checkout-btn pull-right">
                                        <button type="submit" class="btn btn-primary checkout-btn">PROCCED TO
                                            CHEKOUT</button>
                                        <span class="">Checkout with multiples address!</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div><!-- /.cart-shopping-total -->






            </div><!-- /.shopping-cart -->
        </div> <!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.layouts.includes.brand')
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.container -->
</div><!-- /.body-content -->

@endsection
@push('script')
<script>
    function cartPage() {
        $.ajax({
            type: "POST",
            url: "{{ route('cartpage.data.get') }}",
            data: {
                _token: _token
            },
            dataType: "JSON",
            success: function (data) {
                var html = '';
                $.each(data.carts, function (key, value) {
                    html += `<tr>
                                <td class="col-md-2"><img style="width: 100%" src="{{ asset('/') }}${value.options.image}" alt="imga"></td>
                                <td class="col-md-3">
                                    <div class="product-name"><a href="#">${value.name}</a></div>

                                    <div class="price">
                                        Tk ${value.price}
                                    </div>
                                </td>
                                <td class="col-md-1">
                                     <div class="cart-product-info">
                                        <span class="product-color"><span>${value.options.color}</span></span>
                                    </div>
                                </td>
                                <td class="col-md-1">
                                     <div class="cart-product-info">
                                        <span class="product-color"><span>
                                            ${value.options.size ? 
                                            `${value.options.size}` :
                                            `<span>-</span>`
                                            }
                                        </span></span>
                                    </div>
                                </td>
                                <td class="cart-product-quantity col-md-2">
                                    <div class="quant-input">
                                        <div class="arrows">
                                            <div id="${value.rowId}" onclick="qtyIncrement(this.id)" class="arrow plus gradient"><span class="ir"><i
                                                    class="icon fa fa-sort-asc"></i></span></div>
                                            <div id="${value.rowId}" onclick="qtyDecrement(this.id)" class="arrow minus gradient"><span class="ir"><i
                                                    class="icon fa fa-sort-desc"></i></span></div>
                                        </div>
                                        <input readonly type="text" value="${value.qty}">
                                    </div>
                                </td>
                                <td class="cart-product-sub-total"><span class="cart-sub-total-price col-md-2">Tk ${parseInt(value.subtotal)} </span>
                                </td>
                                <td class="col-md-1 close-btn">
                                    <a href="javascript:void(0)" id="${value.rowId}" onclick="cartPageRemove(this.id)" class=""><i class="fa fa-times"></i></a>
                                </td>
                            </tr>`
                });

                $('#cartPageData').html(html);


            }
        });
    }
    cartPage();

    function cartPageRemove(id) {
        $.ajax({
            type: "POST",
            url: "{{ route('cartpage.remove') }}",
            data: {
                _token: _token,
                id: id,
            },
            dataType: "JSON",
            success: function (data) {
                cartPage();
                miniCartShow();
                notification('success', 'Cart product remove from cart')
            },
            error: function (error) {
                notification('error', 'Something went wrong!')
            }
        });
    }
    
    // Cart Qty Increment
    function qtyIncrement(id){
        $.ajax({
            type: "POST",
            url: "{{ route('cartpage.increment') }}",
            data:{ 
                id: id,
                _token: _token, 
            },
            dataType: "JSON",
            success: function (data) {
                cartPage();
                miniCartShow();
                notification('success', 'Cart quantity increment successfull')
            },
            error: function (error){
                notification('error', 'Something went wrong!')
            }
        });
    }

    // Cart Qty Increment
    function qtyDecrement(id){
        $.ajax({
            type: "POST",
            url: "{{ route('cartpage.decrement') }}",
            data:{ 
                id: id,
                _token: _token, 
            },
            dataType: "JSON",
            success: function (data) {
                cartPage();
                miniCartShow();
                notification('success', 'Cart quantity decrement successfull')
            },
            error: function (error){
                notification('error', 'Something went wrong!')
            }
        });
    }
</script>
@endpush