@extends('frontend.layouts.app')
@section('title')
@if (session()->get('language') == 'bangla')
{{ $product->name_bn }} 
@else 
{{ $product->name_en }} 
@endif
@endsection
@push('style')

@endpush
@php
function bn_price($str){
$en = array(0,1,2,3,4,5,6,7,8,9);
$bn = array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
$str = str_replace($en, $bn, $str);
return $str;
}
@endphp
@section('frontend')
<!-- ===== ======== HEADER : END ============================================== -->
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li><a href="#">Clothing</a></li>
                <li class='active'>
                    @if (session()->get('language') == 'bangla')
                        {{ $product->name_bn }} 
                    @else 
                        {{ $product->name_en }} 
                    @endif
                </li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row single-product'>
            <div class='col-md-3 sidebar'>
                <div class="sidebar-module-container">
                    <div class="home-banner outer-top-n" style="margin-bottom: 30px">
                        <img src="{{ asset('frontend/') }}/assets/images/banners/LHS-banner.jpg" alt="Image">
                    </div>
                    <!-- ============================================== HOT DEALS ============================================== -->
                    @include('frontend.layouts.includes.hot_deals')
                    <!-- ============================================== HOT DEALS: END ============================================== -->

                    <!-- ============================================== NEWSLETTER ============================================== -->
                    <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
                        <h3 class="section-title">Newsletters</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <p>Sign Up for Our Newsletter!</p>
                            <form>
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Subscribe to our newsletter">
                                </div>
                                <button class="btn btn-primary">Subscribe</button>
                            </form>
                        </div><!-- /.sidebar-widget-body -->
                    </div><!-- /.sidebar-widget -->
                    <!-- ============================================== NEWSLETTER: END ============================================== -->

                    <!-- ============================================== Testimonials============================================== -->
                    <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                        <div id="advertisement" class="advertisement">
                            <div class="item">
                                <div class="avatar"><img src="{{ asset('frontend/') }}/assets/images/testimonials/member1.png" alt="Image"></div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">John Doe <span>Abc Company</span> </div>
                                <!-- /.container-fluid -->
                            </div><!-- /.item -->

                            <div class="item">
                                <div class="avatar"><img src="{{ asset('frontend/') }}/assets/images/testimonials/member3.png" alt="Image"></div>
                                <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                            </div><!-- /.item -->

                            <div class="item">
                                <div class="avatar"><img src="{{ asset('frontend/') }}/assets/images/testimonials/member2.png" alt="Image"></div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                                <!-- /.container-fluid -->
                            </div><!-- /.item -->

                        </div><!-- /.owl-carousel -->
                    </div>

                    <!-- ============================================== Testimonials: END ============================================== -->



                </div>
            </div><!-- /.sidebar -->
            <div class='col-md-9'>
                <div class="detail-block">
                    <div class="row  wow fadeInUp">

                        <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">

                                <div id="owl-single-product">
                                    @foreach ($images as $image)
                                        <div class="single-product-gallery-item" id="slide-{{ $image->id }}">
                                            <a data-lightbox="image-1}" data-title="Gallery"
                                                href="{{ asset($image->image) }}">
                                                <img class="img-responsive" alt="" src="{{ asset($image->image) }}"
                                                    data-echo="{{ asset($image->image) }}" />
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->
                                    @endforeach

                                </div><!-- /.single-product-slider -->


                                <div class="single-product-gallery-thumbs gallery-thumbs">
                                    <div id="owl-single-product-thumbnails">
                                        @foreach ($images as $image)
                                            <div class="item">
                                                <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                    data-slide="1" href="#slide-{{ $image->id }}">
                                                    <img class="img-responsive" width="85" alt=""
                                                        src="{{ asset($image->image) }}"
                                                        data-echo="{{ asset($image->image) }}" />
                                                </a>
                                            </div>
                                        @endforeach
                                    </div><!-- /#owl-single-product-thumbnails -->
                                </div><!-- /.gallery-thumbs -->

                            </div><!-- /.single-product-gallery -->
                        </div><!-- /.gallery-holder -->
                        <div class='col-sm-6 col-md-7 product-info-block'>
                            <div class="product-info">
                                <h1 class="name">
                                    @if (session()->get('language') == 'bangla')
                                        {{ $product->name_bn }} 
                                    @else 
                                        {{ $product->name_en }} 
                                    @endif
                                </h1>

                                <div class="rating-reviews m-t-20">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="rating rateit-small"></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="reviews">
                                                <a href="#" class="lnk">(13 Reviews)</a>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.rating-reviews -->

                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="stock-box">
                                                <span class="label">Availability :</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="stock-box">
                                                @if ($product->qty > 0)           
                                                    <span class="value">@if (session()->get('language') == 'bangla')স্টকে আছে @else In Stock @endif </span>
                                                @else            
                                                <span class="value">@if (session()->get('language') == 'bangla')
                                                    স্টকে নেই @else Out Of Stock @endif </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.stock-container -->

                                <div class="description-container m-t-20">
                                    @if (session()->get('language') == 'bangla')
                                        {{ $product->short_desc_bn }}
                                    @else 
                                        {{ $product->short_desc_en }}
                                    @endif
                                </div><!-- /.description-container -->

                                <div class="price-container info-container m-t-20">
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="price-box">
                                                <span class="price">
                                                    @if (!empty($product -> discount_price))
                                                    <span class="price"> 
                                                        @if (session()->get('language') == 'bangla')
                                                            ৳ {{ bn_price($product->discount_price) }} 
                                                        @else 
                                                            TK {{ $product->discount_price }} 
                                                        @endif 
                                                    </span>
                                                    <span class="price-strike"> 
                                                        @if (session()->get('language') == 'bangla')
                                                            ৳ {{ bn_price($product->sale_price) }}
                                                        @else 
                                                            TK {{ $product->sale_price }} 
                                                        @endif
                                                    </span>
                                                @else
                                                    <span class="price"> 
                                                        @if (session()->get('language') == 'bangla')
                                                            ৳ {{ bn_price($product->sale_price) }} 
                                                        @else 
                                                            TK {{ $product->sale_price }} 
                                                        @endif 
                                                    </span>
                                                @endif 
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="favorite-button m-t-10">
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                                    title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)" href="javascript:void(0);">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                                    title="Add to Compare" href="#">
                                                    <i class="fa fa-signal"></i>
                                                </a>
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                                    title="E-mail" href="#">
                                                    <i class="fa fa-envelope"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </div><!-- /.row -->

                                    <div class="row" style="margin-top: 20px">
                                        @if ($product->size_en == null)
                                           
                                        @else
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select id="cartModalSize" class="form-control unicase-form-control selectpicker">
                                                    <option>--Select Size--</option>
                                                    @if (session()->get('language') == 'bangla')
                                                        @foreach ($size_bn as $size)
                                                            <option value="{{ $size }}">{{ ucwords($size) }}</option>
                                                        @endforeach
                                                    @else 
                                                        @foreach ($size_en as $size)
                                                            <option value="{{ $size }}">{{ ucwords($size) }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select id="cartModalColor" class="form-control unicase-form-control selectpicker">
                                                    <option>--Select Color--</option>
                                                    @if (session()->get('language') == 'bangla')
                                                        @foreach ($color_bn as $color)
                                                            <option value="{{ $color }}">{{ ucwords($color) }}</option>
                                                        @endforeach
                                                    @else 
                                                        @foreach ($color_en as $color)
                                                            <option value="{{ $color }}">{{ ucwords($color) }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.price-container -->

                                <div class="quantity-container info-container">
                                    <div class="row">

                                        <div class="col-sm-2">
                                            <span class="label">Qty :</span>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="cart-quantity">
                                                <div class="quant-input">
                                                    <div class="arrows">
                                                        <div class="arrow plus gradient"><span class="ir"><i
                                                                    class="icon fa fa-sort-asc"></i></span></div>
                                                        <div class="arrow minus gradient"><span class="ir"><i
                                                                    class="icon fa fa-sort-desc"></i></span></div>
                                                    </div>
                                                    <input id="qty" type="text" value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="addToCartProductId" value="{{ $product->id }}">
                                        <div class="col-sm-7">
                                            <a href="#" class="btn btn-primary" id="addTocartBtn" ><i
                                                    class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                        </div>


                                    </div><!-- /.row -->
                                </div><!-- /.quantity-container -->






                            </div><!-- /.product-info -->
                        </div><!-- /.col-sm-7 -->
                    </div><!-- /.row -->
                </div>

                <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                    <div class="row">
                        <div class="col-sm-3">
                            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                            </ul><!-- /.nav-tabs #product-tabs -->
                        </div>
                        <div class="col-sm-9">

                            <div class="tab-content">

                                <div id="description" class="tab-pane in active">
                                    <div class="product-tab">
                                        <p class="text">
                                            @if (session()->get('language') == 'bangla')
                                                {!! $product->long_desc_bn !!}
                                            @else 
                                                {!! $product->long_desc_en !!}
                                            @endif
                                        </p>
                                    </div>
                                </div><!-- /.tab-pane -->

                                <div id="review" class="tab-pane">
                                    <div class="product-tab">

                                        <div class="product-reviews">
                                            <h4 class="title">Customer Reviews</h4>

                                            <div class="reviews">
                                                <div class="review">
                                                    <div class="review-title"><span class="summary">We love this
                                                            product</span><span class="date"><i
                                                                class="fa fa-calendar"></i><span>1 days
                                                                ago</span></span></div>
                                                    <div class="text">"Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit.Aliquam suscipit."</div>
                                                </div>

                                            </div><!-- /.reviews -->
                                        </div><!-- /.product-reviews -->



                                        <div class="product-add-review">
                                            <h4 class="title">Write your own review</h4>
                                            <div class="review-table">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="cell-label">&nbsp;</th>
                                                                <th>1 star</th>
                                                                <th>2 stars</th>
                                                                <th>3 stars</th>
                                                                <th>4 stars</th>
                                                                <th>5 stars</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="cell-label">Quality</td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                        value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                        value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                        value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                        value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                        value="5"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="cell-label">Price</td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                        value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                        value="2"></td>
                                                                <td><input type="radio" name="quality" ="radio"
                                                                        value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                        value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                        value="5"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="cell-label">Value</td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                        value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                        value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                        value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                        value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio"
                                                                        value="5"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table><!-- /.table .table-bordered -->
                                                </div><!-- /.table-responsive -->
                                            </div><!-- /.review-table -->

                                            <div class="review-form">
                                                <div class="form-container">
                                                    <form role="form" class="cnt-form">

                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputName">Your Name <span
                                                                            class="astk">*</span></label>
                                                                    <input type="text" class="form-control txt"
                                                                        id="exampleInputName" placeholder="">
                                                                </div><!-- /.form-group -->
                                                                <div class="form-group">
                                                                    <label for="exampleInputSummary">Summary <span
                                                                            class="astk">*</span></label>
                                                                    <input type="text" class="form-control txt"
                                                                        id="exampleInputSummary" placeholder="">
                                                                </div><!-- /.form-group -->
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputReview">Review <span
                                                                            class="astk">*</span></label>
                                                                    <textarea class="form-control txt txt-review"
                                                                        id="exampleInputReview" rows="4"
                                                                        placeholder=""></textarea>
                                                                </div><!-- /.form-group -->
                                                            </div>
                                                        </div><!-- /.row -->

                                                        <div class="action text-right">
                                                            <button class="btn btn-primary btn-upper">SUBMIT
                                                                REVIEW</button>
                                                        </div><!-- /.action -->

                                                    </form><!-- /.cnt-form -->
                                                </div><!-- /.form-container -->
                                            </div><!-- /.review-form -->

                                        </div><!-- /.product-add-review -->

                                    </div><!-- /.product-tab -->
                                </div><!-- /.tab-pane -->

                                <div id="tags" class="tab-pane">
                                    <div class="product-tag">

                                        <h4 class="title">Product Tags</h4>
                                        <form role="form" class="form-inline form-cnt">
                                            <div class="form-container">

                                                <div class="form-group">
                                                    <label for="exampleInputTag">Add Your Tags: </label>
                                                    <input type="email" id="exampleInputTag" class="form-control txt">


                                                </div>

                                                <button class="btn btn-upper btn-primary" type="submit">ADD
                                                    TAGS</button>
                                            </div><!-- /.form-container -->
                                        </form><!-- /.form-cnt -->

                                        <form role="form" class="form-inline form-cnt">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <span class="text col-md-offset-3">Use spaces to separate tags. Use
                                                    single quotes (') for phrases.</span>
                                            </div>
                                        </form><!-- /.form-cnt -->

                                    </div><!-- /.product-tab -->
                                </div><!-- /.tab-pane -->

                            </div><!-- /.tab-content -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.product-tabs -->

                <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">upsell products</h3>
                    <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                        @foreach ($upsel_products as $product)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            @if (session()->get('language') == 'bangla')
                                              <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_bn) }}"><img
                                                src="{{ asset('/'. $product->thumbnail) }}"
                                                alt=""></a> 
                                            @else
                                                <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_en) }}"><img
                                                src="{{ asset('/'. $product->thumbnail) }}"
                                                alt=""></a> 
                                            @endif 
                                        </div>
                                        <!-- /.image -->

                                        @php
                                            $amount = $product->sale_price - $product->discount_price;
                                            $percent = ($amount/$product->sale_price)*100;
                                            $discount = round($percent);
                                        @endphp
                                       
                                        @if (!empty($product -> discount_price))
                                            <div class="tag sale"><span> 
                                                @if (session()->get('language') == 'bangla')
                                                {{ bn_price($discount) }}% 
                                                @else 
                                                {{ $discount }}%
                                                @endif
                                            </span></div>
                                        @elseif ($product->hot_deals = 1)
                                            <div class="tag hot"><span> 
                                                @if (session()->get('language') == 'bangla')
                                                হট 
                                                @else 
                                                Hot
                                                @endif
                                            </span></div>
                                        @else
                                            <div class="tag new"><span> 
                                                @if (session()->get('language') == 'bangla')
                                                নতুন 
                                                @else 
                                                New
                                                @endif
                                            </span></div>
                                        @endif
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name">
                                            @if (session()->get('language') == 'bangla')
                                                <a id="pname" href="{{ url('product/single/'.$product->id.'/'.$product->slug_bn) }}">
                                                    {{ Str::limit($product->name_bn, 35, ' ...') }}
                                                </a>
                                            @else
                                                <a id="pname" href="{{ url('product/single/'.$product->id.'/'.$product->slug_en) }}">
                                                    {{ Str::limit($product->name_en, 35, ' ...') }} 
                                                </a>
                                            @endif
                                        </h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"> 
                                            @if (!empty($product -> discount_price))
                                                <span class="price"> 
                                                    @if (session()->get('language') == 'bangla')
                                                        ৳ {{ bn_price($product->discount_price) }} 
                                                    @else 
                                                        TK {{ $product->discount_price }} 
                                                    @endif 
                                                </span>
                                                <span class="price-before-discount"> 
                                                    @if (session()->get('language') == 'bangla')
                                                        ৳ {{ bn_price($product->sale_price) }}
                                                    @else 
                                                        TK {{ $product->sale_price }} 
                                                    @endif
                                                </span>
                                            @else
                                                <span class="price"> 
                                                    @if (session()->get('language') == 'bangla')
                                                        ৳ {{ bn_price($product->sale_price) }} 
                                                    @else 
                                                        TK {{ $product->sale_price }} 
                                                    @endif 
                                                </span>
                                            @endif
                                        </div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button id="add_to_cart_btn"
                                                    data-id="{{ $product->id }}" data-toggle="tooltip"
                                                        class="btn btn-primary icon" type="button"
                                                        title="Add Cart"> <i
                                                            class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn"
                                                        type="button">Add to cart</button>
                                                </li>
                                                <li class="lnk wishlist"> <a data-toggle="tooltip"
                                                    id="{{ $product->id }}" onclick="addToWishList(this.id)" href="javascript:void(0);"
                                                    title="Wishlist"> <i class="icon fa fa-heart"></i>
                                                </a> </li>
                                                <li class="lnk"> <a data-toggle="tooltip"
                                                        class="add-to-cart" href="detail.html"
                                                        title="Compare"> <i class="fa fa-signal"
                                                            aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                            </div><!-- /.products -->
                        </div><!-- /.item -->
                        @endforeach
                    </div><!-- /.home-owl-carousel -->
                </section><!-- /.section -->
                <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

            </div><!-- /.col -->
            <div class="clearfix"></div>
        </div><!-- /.row -->
    </div>
</div>
@include('frontend.layouts.includes.brand')
@endsection
@push('script')
<script type="text/javascript" src="{{ asset('frontend/') }}/assets/js/lightbox.min.js"></script>
@endpush