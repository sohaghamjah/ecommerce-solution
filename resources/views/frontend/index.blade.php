@extends('frontend.layouts.app')
@section('title', 'Home')
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
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                <!-- ================================== TOP NAVIGATION ================================== -->
                @include('frontend.layouts.includes.sidebar-top-navigation')
                <!-- /.side-menu -->
                <!-- ================================== TOP NAVIGATION : END ================================== -->

                <!-- ============================================== HOT DEALS ============================================== -->
                @include('frontend.layouts.includes.hot_deals')
                <!-- ============================================== HOT DEALS: END ============================================== -->

                <!-- ============================================== SPECIAL OFFER ============================================== -->

                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">
                        @if (session()->get('language') == 'bangla')
                        স্পেশাল অফার
                        @else
                        Special Offer
                        @endif
                    </h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                @foreach ($special_offer as $product)
                                <div class="products special-product">
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img
                                                                    src="{{ asset($product->thumbnail) }}" alt=""> </a>
                                                        </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name">
                                                            @if (session()->get('language') == 'bangla')
                                                            <a
                                                                href="{{ url('product/single/'.$product->id.'/'.$product->slug_bn) }}">
                                                                {{ Str::limit($product->name_bn, 30, ' ...') }}
                                                            </a>
                                                            @else
                                                            <a
                                                                href="{{ url('product/single/'.$product->id.'/'.$product->slug_en) }}">
                                                                {{ Str::limit($product->name_en, 30, ' ...') }}
                                                            </a>
                                                            @endif
                                                        </h3>
                                                        <div class="rating rateit-small"></div>
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
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL OFFER : END ============================================== -->
                <!-- ============================================== PRODUCT TAGS ============================================== -->
                @include('frontend.layouts.includes.tags')
                <!-- /.sidebar-widget -->
                <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                <!-- ============================================== SPECIAL DEALS ============================================== -->

                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">
                        @if (session()->get('language') == 'bangla')
                        স্পেশাল ডিলস
                        @else
                        Special Deals
                        @endif
                    </h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                @foreach ($special_deals as $product)
                                <div class="products special-product">
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img
                                                                    src="{{ asset($product->thumbnail) }}" alt=""> </a>
                                                        </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name">
                                                            @if (session()->get('language') == 'bangla')
                                                            <a
                                                                href="{{ url('product/single/'.$product->id.'/'.$product->slug_bn) }}">
                                                                {{ Str::limit($product->name_bn, 35, ' ...') }}
                                                            </a>
                                                            @else
                                                            <a
                                                                href="{{ url('product/single/'.$product->id.'/'.$product->slug_en) }}">
                                                                {{ Str::limit($product->name_en, 35, ' ...') }}
                                                            </a>
                                                            @endif
                                                        </h3>
                                                        <div class="rating rateit-small"></div>
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
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL DEALS : END ============================================== -->
                <!-- ============================================== NEWSLETTER ============================================== -->
                <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
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
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== NEWSLETTER: END ============================================== -->

                <!-- ============================================== Testimonials============================================== -->
                <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                    <div id="advertisement" class="advertisement">
                        <div class="item">
                            <div class="avatar"><img
                                    src="{{ asset('frontend/') }}/assets/images/testimonials/member1.png" alt="Image">
                            </div>
                            <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis.
                                Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                            <div class="clients_author">John Doe <span>Abc Company</span> </div>
                            <!-- /.container-fluid -->
                        </div>
                        <!-- /.item -->

                        <div class="item">
                            <div class="avatar"><img
                                    src="{{ asset('frontend/') }}/assets/images/testimonials/member3.png" alt="Image">
                            </div>
                            <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis.
                                Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                            <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                        </div>
                        <!-- /.item -->

                        <div class="item">
                            <div class="avatar"><img
                                    src="{{ asset('frontend/') }}/assets/images/testimonials/member2.png" alt="Image">
                            </div>
                            <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis.
                                Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                            <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                            <!-- /.container-fluid -->
                        </div>
                        <!-- /.item -->

                    </div>
                    <!-- /.owl-carousel -->
                </div>

                <!-- ============================================== Testimonials: END ============================================== -->

                <div class="home-banner"> <img src="{{ asset('frontend/') }}/assets/images/banners/LHS-banner.jpg"
                        alt="Image"> </div>
            </div>
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->

                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

                        @foreach ($sliders as $slider)
                        <div class="item" style="background-image: url({{ $slider->image }});">
                            <div
                                style="background: rgba(0, 0, 0, 0.249); display: block; position: absolute; width: 100%; height: 100%">
                                <div class="container-fluid">
                                    <div class="caption bg-color vertical-center text-left">
                                        {{-- <div class="slider-header fadeInDown-1">Top Brands</div> --}}
                                        <div class="big-text fadeInDown-1"> {{ $slider->title }} </div>
                                        <div class="excerpt fadeInDown-2 hidden-xs">
                                            <span>{{ $slider->description }}</span> </div>
                                        {{-- <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div> --}}
                                    </div>
                                    <!-- /.caption -->
                                </div>
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                        <!-- /.item -->
                        @endforeach

                    </div>
                    <!-- /.owl-carousel -->
                </div>

                <!-- ========================================= SECTION – HERO : END ========================================= -->

                <!-- ============================================== INFO BOXES ============================================== -->
                <div class="info-boxes wow fadeInUp">
                    <div class="info-boxes-inner">
                        <div class="row">
                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">money back</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">30 Days Money Back Guarantee</h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="hidden-md col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">free shipping</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Shipping on orders over $99</h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">Special Sale</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Extra $5 off on all items </h6>
                                </div>
                            </div>
                            <!-- .col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.info-boxes-inner -->

                </div>
                <!-- /.info-boxes -->
                <!-- ============================================== INFO BOXES : END ============================================== -->
                <!-- ============================================== SCROLL TABS ============================================== -->
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">
                            @if (session()->get('language') == 'bangla')
                            নতুন প্রডাক্ট
                            @else
                            New Product
                            @endif
                        </h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">
                                    @if (session()->get('language') == 'bangla')
                                    সব
                                    @else
                                    All
                                    @endif
                                </a>
                            </li>
                            @foreach ($categories2 as $category)
                            <li><a data-transition-type="backSlide" href="#newproduct-{{ $category->id }}"
                                    data-toggle="tab">@if (session()->get('language') == 'bangla')
                                    {{ $category->name_bn }} @else {{ $category->name_en }} @endif</a>
                            </li>
                            @endforeach
                        </ul>
                        <!-- /.nav-tabs -->
                    </div>
                    <div class="tab-content outer-top-xs">
                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                    @foreach ($allproducts as $product)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        @if (session()->get('language') == 'bangla')
                                                        <a
                                                            href="{{ url('product/single/'.$product->id.'/'.$product->slug_bn) }}"><img
                                                                src="{{ asset('/'. $product->thumbnail) }}" alt=""></a>
                                                        @else
                                                        <a
                                                            href="{{ url('product/single/'.$product->id.'/'.$product->slug_en) }}"><img
                                                                src="{{ asset('/'. $product->thumbnail) }}" alt=""></a>
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
                                                        <a
                                                            href="{{ url('product/single/'.$product->id.'/'.$product->slug_bn) }}">
                                                            {{ Str::limit($product->name_bn, 35, ' ...') }}
                                                        </a>
                                                        @else
                                                        <a
                                                            href="{{ url('product/single/'.$product->id.'/'.$product->slug_en) }}">
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
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    @endforeach
                                    <!-- /.item -->
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->
                        @foreach ($categories2 as $category)
                        <div class="tab-pane" id="newproduct-{{ $category->id }}">
                            @php
                            $products = DB::table('products')->where('status',1)->where('category_id', $category ->
                            id)->orderBy('id', 'DESC') -> get();
                            @endphp
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                    @forelse ($products as $product)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        @if (session()->get('language') == 'bangla')
                                                        <a
                                                            href="{{ url('product/single/'.$product->id.'/'.$product->slug_bn) }}"><img
                                                                src="{{ asset('/'. $product->thumbnail) }}" alt=""></a>
                                                        @else
                                                        <a
                                                            href="{{ url('product/single/'.$product->id.'/'.$product->slug_en) }}"><img
                                                                src="{{ asset('/'. $product->thumbnail) }}" alt=""></a>
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
                                                        <a
                                                            href="{{ url('product/single/'.$product->id.'/'.$product->slug_bn) }}">
                                                            {{ Str::limit($product->name_bn, 35, ' ...') }}
                                                        </a>
                                                        @else
                                                        <a
                                                            href="{{ url('product/single/'.$product->id.'/'.$product->slug_en) }}">
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
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    @empty
                                    <h3 class="text-danger">No product found</h3>
                                    @endforelse
                                    <!-- /.item -->
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        @endforeach

                        <!-- /.tab-pane -->

                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.scroll-tabs -->
                <!-- ============================================== SCROLL TABS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="{{ asset('frontend/') }}/assets/images/banners/home-banner1.jpg" alt="">
                                </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-5 col-sm-5">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="{{ asset('frontend/') }}/assets/images/banners/home-banner2.jpg" alt="">
                                </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->

                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        @if (session()->get('language') == 'bangla')
                        ফিচার্ড প্রডাক্ট
                        @else
                        Freatured Product
                        @endif
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                        @foreach ($featured as $product)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            @if (session()->get('language') == 'bangla')
                                            <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_bn) }}"><img
                                                    src="{{ asset('/'. $product->thumbnail) }}" alt=""></a>
                                            @else
                                            <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_en) }}"><img
                                                    src="{{ asset('/'. $product->thumbnail) }}" alt=""></a>
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
                                            <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_bn) }}">
                                                {{ Str::limit($product->name_bn, 35, ' ...') }}
                                            </a>
                                            @else
                                            <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_en) }}">
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
                                                    data-id="{{ $product->id }}" data-toggle="tooltip" class="btn btn-primary icon"
                                                        type="button" title="Add Cart"> <i
                                                            class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart</button>
                                                </li>
                                                <li class="lnk wishlist"> <a data-toggle="tooltip"
                                                    id="{{ $product->id }}" onclick="addToWishList(this.id)" href="javascript:void(0);"
                                                    title="Wishlist"> <i class="icon fa fa-heart"></i>
                                                </a> </li>
                                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                                        href="detail.html" title="Compare"> <i class="fa fa-signal"
                                                            aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        @endforeach
                        <!-- /.item -->

                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->

                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== SKIP PRODUCTS 0 ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        @if (session()->get('language') == 'bangla')
                        {{ $skip_category_0 -> name_bn }}
                        @else
                        {{ $skip_category_0 -> name_en }}
                        @endif
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                        @foreach ($skip_product_0 as $product)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            @if (session()->get('language') == 'bangla')
                                            <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_bn) }}"><img
                                                    src="{{ asset('/'. $product->thumbnail) }}" alt=""></a>
                                            @else
                                            <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_en) }}"><img
                                                    src="{{ asset('/'. $product->thumbnail) }}" alt=""></a>
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
                                            <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_bn) }}">
                                                {{ Str::limit($product->name_bn, 35, ' ...') }}
                                            </a>
                                            @else
                                            <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_en) }}">
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
                                                    data-id="{{ $product->id }}" data-toggle="tooltip" class="btn btn-primary icon"
                                                        type="button" title="Add Cart"> <i
                                                            class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart</button>
                                                </li>
                                                <li class="lnk wishlist"> <a data-toggle="tooltip"
                                                    id="{{ $product->id }}" onclick="addToWishList(this.id)" href="javascript:void(0);"
                                                    title="Wishlist"> <i class="icon fa fa-heart"></i>
                                                </a> </li>
                                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                                        href="detail.html" title="Compare"> <i class="fa fa-signal"
                                                            aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        @endforeach
                        <!-- /.item -->

                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== SKIP PRODUCTS 0: END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->

                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== SKIP PRODUCTS 1 ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        @if (session()->get('language') == 'bangla')
                        {{ $skip_category_1 -> name_bn }}
                        @else
                        {{ $skip_category_1 -> name_en }}
                        @endif
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                        @foreach ($skip_product_1 as $product)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            @if (session()->get('language') == 'bangla')
                                            <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_bn) }}"><img
                                                    src="{{ asset('/'. $product->thumbnail) }}" alt=""></a>
                                            @else
                                            <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_en) }}"><img
                                                    src="{{ asset('/'. $product->thumbnail) }}" alt=""></a>
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
                                            <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_bn) }}">
                                                {{ Str::limit($product->name_bn, 35, ' ...') }}
                                            </a>
                                            @else
                                            <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_en) }}">
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
                                                    data-id="{{ $product->id }}" data-toggle="tooltip" class="btn btn-primary icon"
                                                        type="button" title="Add Cart"> <i
                                                            class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart</button>
                                                </li>
                                                <li class="lnk wishlist"> <a data-toggle="tooltip"
                                                    id="{{ $product->id }}" onclick="addToWishList(this.id)" href="javascript:void(0);"
                                                    title="Wishlist"> <i class="icon fa fa-heart"></i>
                                                </a> </li>
                                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                                        href="detail.html" title="Compare"> <i class="fa fa-signal"
                                                            aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        @endforeach
                        <!-- /.item -->

                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== SKIP PRODUCTS 1: END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->


                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== SKIP BANNER PRODUCTS 0 ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        @if (session()->get('language') == 'bangla')
                        {{ $skip_brand_0 -> name_bn }}
                        @else
                        {{ $skip_brand_0 -> name_en }}
                        @endif
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                        @foreach ($skip_brand_product_0 as $product)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            @if (session()->get('language') == 'bangla')
                                            <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_bn) }}"><img
                                                    src="{{ asset('/'. $product->thumbnail) }}" alt=""></a>
                                            @else
                                            <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_en) }}"><img
                                                    src="{{ asset('/'. $product->thumbnail) }}" alt=""></a>
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
                                            <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_bn) }}">
                                                {{ Str::limit($product->name_bn, 35, ' ...') }}
                                            </a>
                                            @else
                                            <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_en) }}">
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
                                                    data-id="{{ $product->id }}" data-toggle="tooltip" class="btn btn-primary icon"
                                                        type="button" title="Add Cart"> <i
                                                            class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart</button>
                                                </li>
                                                <li class="lnk wishlist"> <a data-toggle="tooltip"
                                                    id="{{ $product->id }}" onclick="addToWishList(this.id)" href="javascript:void(0);"
                                                    title="Wishlist"> <i class="icon fa fa-heart"></i>
                                                </a> </li>
                                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                                        href="detail.html" title="Compare"> <i class="fa fa-signal"
                                                            aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        @endforeach
                        <!-- /.item -->

                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== SKIP BANNER PRODUCTS 1: END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->

                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="{{ asset('frontend/') }}/assets/images/banners/home-banner.jpg" alt="">
                                </div>
                                <div class="strip strip-text">
                                    <div class="strip-inner">
                                        <h2 class="text-right">New Mens Fashion<br>
                                            <span class="shopping-needs">Save up to 40% off</span></h2>
                                    </div>
                                </div>
                                <div class="new-label">
                                    <div class="text">NEW</div>
                                </div>
                                <!-- /.new-label -->
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->
                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== BEST SELLER ============================================== -->

                <div class="best-deal wow fadeInUp outer-bottom-xs">
                    <h3 class="section-title">Best seller</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                <div class="products best-product">
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img
                                                                    src="{{ asset('frontend/') }}/assets/images/products/p20.jpg"
                                                                    alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99 </span>
                                                        </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img
                                                                    src="{{ asset('frontend/') }}/assets/images/products/p21.jpg"
                                                                    alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99 </span>
                                                        </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="products best-product">
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img
                                                                    src="{{ asset('frontend/') }}/assets/images/products/p22.jpg"
                                                                    alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99 </span>
                                                        </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img
                                                                    src="{{ asset('frontend/') }}/assets/images/products/p23.jpg"
                                                                    alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99 </span>
                                                        </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="products best-product">
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img
                                                                    src="{{ asset('frontend/') }}/assets/images/products/p24.jpg"
                                                                    alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99 </span>
                                                        </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img
                                                                    src="{{ asset('frontend/') }}/assets/images/products/p25.jpg"
                                                                    alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99 </span>
                                                        </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="products best-product">
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img
                                                                    src="{{ asset('frontend/') }}/assets/images/products/p26.jpg"
                                                                    alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99 </span>
                                                        </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="#"> <img
                                                                    src="{{ asset('frontend/') }}/assets/images/products/p27.jpg"
                                                                    alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> $450.99 </span>
                                                        </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== BEST SELLER : END ============================================== -->

                <!-- ============================================== BLOG SLIDER ============================================== -->
                <section class="section latest-blog outer-bottom-vs wow fadeInUp">
                    <h3 class="section-title">latest form blog</h3>
                    <div class="blog-slider-container outer-top-xs">
                        <div class="owl-carousel blog-slider custom-carousel">
                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"> <a href="blog.html"><img
                                                    src="{{ asset('frontend/') }}/assets/images/blog-post/post1.jpg"
                                                    alt=""></a> </div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Voluptatem accusantium doloremque laudantium</a>
                                        </h3>
                                        <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et
                                            dolore magnam aliquam quaerat voluptatem.</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a>
                                    </div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->

                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"> <a href="blog.html"><img
                                                    src="{{ asset('frontend/') }}/assets/images/blog-post/post2.jpg"
                                                    alt=""></a> </div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a>
                                        </h3>
                                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et
                                            dolore magnam aliquam quaerat voluptatem.</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a>
                                    </div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->

                            <!-- /.item -->

                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"> <a href="blog.html"><img
                                                    src="{{ asset('frontend/') }}/assets/images/blog-post/post1.jpg"
                                                    alt=""></a> </div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a>
                                        </h3>
                                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                            accusantium</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a>
                                    </div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->

                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"> <a href="blog.html"><img
                                                    src="{{ asset('frontend/') }}/assets/images/blog-post/post2.jpg"
                                                    alt=""></a> </div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a>
                                        </h3>
                                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                            accusantium</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a>
                                    </div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->

                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"> <a href="blog.html"><img
                                                    src="{{ asset('frontend/') }}/assets/images/blog-post/post1.jpg"
                                                    alt=""></a> </div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a>
                                        </h3>
                                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                            accusantium</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a>
                                    </div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->

                        </div>
                        <!-- /.owl-carousel -->
                    </div>
                    <!-- /.blog-slider-container -->
                </section>
                <!-- /.section -->
                <!-- ============================================== BLOG SLIDER : END ============================================== -->

                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                <section class="section wow fadeInUp new-arriavls">
                    <h3 class="section-title">New Arrivals</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="detail.html"><img
                                                    src="{{ asset('frontend/') }}/assets/images/products/p19.jpg"
                                                    alt=""></a> </div>
                                        <!-- /.image -->

                                        <div class="tag new"><span>new</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span> <span
                                                class="price-before-discount">$ 800</span> </div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown"
                                                        type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart</button>
                                                </li>
                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                        title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                        title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i>
                                                    </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->

                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="detail.html"><img
                                                    src="{{ asset('frontend/') }}/assets/images/products/p28.jpg"
                                                    alt=""></a> </div>
                                        <!-- /.image -->

                                        <div class="tag new"><span>new</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span> <span
                                                class="price-before-discount">$ 800</span> </div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown"
                                                        type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart</button>
                                                </li>
                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                        title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                        title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i>
                                                    </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->

                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="detail.html"><img
                                                    src="{{ asset('frontend/') }}/assets/images/products/p30.jpg"
                                                    alt=""></a> </div>
                                        <!-- /.image -->

                                        <div class="tag hot"><span>hot</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span> <span
                                                class="price-before-discount">$ 800</span> </div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown"
                                                        type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart</button>
                                                </li>
                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                        title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                        title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i>
                                                    </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->

                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="detail.html"><img
                                                    src="{{ asset('frontend/') }}/assets/images/products/p1.jpg"
                                                    alt=""></a> </div>
                                        <!-- /.image -->

                                        <div class="tag hot"><span>hot</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span> <span
                                                class="price-before-discount">$ 800</span> </div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown"
                                                        type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart</button>
                                                </li>
                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                        title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                        title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i>
                                                    </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->

                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="detail.html"><img
                                                    src="{{ asset('frontend/') }}/assets/images/products/p2.jpg"
                                                    alt=""></a> </div>
                                        <!-- /.image -->

                                        <div class="tag sale"><span>sale</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span> <span
                                                class="price-before-discount">$ 800</span> </div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown"
                                                        type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart</button>
                                                </li>
                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                        title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                        title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i>
                                                    </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->

                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="detail.html"><img
                                                    src="{{ asset('frontend/') }}/assets/images/products/p3.jpg"
                                                    alt=""></a> </div>
                                        <!-- /.image -->

                                        <div class="tag sale"><span>sale</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"> <span class="price"> $450.99 </span> <span
                                                class="price-before-discount">$ 800</span> </div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown"
                                                        type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart</button>
                                                </li>
                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                        title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                        title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i>
                                                    </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

            </div>
            <!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.layouts.includes.brand')
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
</div>
@endsection
@push('script')

@endpush