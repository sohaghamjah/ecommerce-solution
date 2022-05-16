@extends('frontend.layouts.app')
@section('title', 'Index')
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

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class='active'>
                    @if (session()->get('language') == 'bangla')
                        {{ $subsubcategory->name_bn }}
                    @else
                        {{ $subsubcategory->name_en }}
                    @endif
                </li>
            </ul>

        </div>
        <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row'>
            <div class='col-md-3 sidebar'>
                <!-- ================================== TOP NAVIGATION ================================== -->
                @include('frontend.layouts.includes.sidebar-top-navigation')
                <!-- /.side-menu -->
                <!-- ================================== TOP NAVIGATION : END ================================== -->
                <div class="sidebar-module-container">
                    <div class="sidebar-filter">
                        <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                        @include('frontend.layouts.includes.category')
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

                        <!-- ============================================== PRICE SILDER============================================== -->
                        <div class="sidebar-widget wow fadeInUp">
                            <div class="widget-header">
                                <h4 class="widget-title">Price Slider</h4>
                            </div>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="price-range-holder"> <span class="min-max"> <span
                                            class="pull-left">$200.00</span> <span class="pull-right">$800.00</span>
                                    </span>
                                    <input type="text" id="amount"
                                        style="border:0; color:#666666; font-weight:bold;text-align:center;">
                                    <input type="text" class="price-slider" value="">
                                </div>
                                <!-- /.price-range-holder -->
                                <a href="#" class="lnk btn btn-primary">Show Now</a>
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== PRICE SILDER : END ============================================== -->
                        <!-- ============================================== MANUFACTURES============================================== -->
                        @include('frontend.layouts.includes.brands')
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== MANUFACTURES: END ============================================== -->
                        <!-- ============================================== COLOR============================================== -->
                        @include('frontend.layouts.includes.color')
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== COLOR: END ============================================== -->
                        <!-- ============================================== COMPARE============================================== -->
                        <div class="sidebar-widget wow fadeInUp outer-top-vs">
                            <h3 class="section-title">Compare products</h3>
                            <div class="sidebar-widget-body">
                                <div class="compare-report">
                                    <p>You have no <span>item(s)</span> to compare</p>
                                </div>
                                <!-- /.compare-report -->
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== COMPARE: END ============================================== -->
                        <!-- ============================================== PRODUCT TAGS ============================================== -->
                        @include('frontend.layouts.includes.tags')
                        <!-- /.sidebar-widget -->
                        <!----------- Testimonials------------->
                        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                            <div id="advertisement" class="advertisement">
                                <div class="item">
                                    <div class="avatar"><img src="{{ asset('frontend/') }}/assets/images/testimonials/member1.png" alt="Image">
                                    </div>
                                    <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                        mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                    <div class="clients_author">John Doe <span>Abc Company</span> </div>
                                    <!-- /.container-fluid -->
                                </div>
                                <!-- /.item -->

                                <div class="item">
                                    <div class="avatar"><img src="{{ asset('frontend/') }}/assets/images/testimonials/member3.png" alt="Image">
                                    </div>
                                    <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port
                                        mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                    <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                                </div>
                                <!-- /.item -->

                                <div class="item">
                                    <div class="avatar"><img src="{{ asset('frontend/') }}/assets/images/testimonials/member2.png" alt="Image">
                                    </div>
                                    <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                        mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                    <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                                    <!-- /.container-fluid -->
                                </div>
                                <!-- /.item -->

                            </div>
                            <!-- /.owl-carousel -->
                        </div>

                        <!-- ============================================== Testimonials: END ============================================== -->

                        <div class="home-banner"> <img src="{{ asset('frontend/') }}/assets/images/banners/LHS-banner.jpg" alt="Image"> </div>
                    </div>
                    <!-- /.sidebar-filter -->
                </div>
                <!-- /.sidebar-module-container -->
            </div>
            <!-- /.sidebar -->
            <div class='col-md-9'>
                <!-- ========================================== SECTION – HERO ========================================= -->

                <div id="category" class="category-carousel hidden-xs">
                    <div class="item">
                        <div class="image"> <img src="{{ asset('frontend/') }}/assets/images/banners/cat-banner-1.jpg" alt=""
                                class="img-responsive"> </div>
                        <div class="container-fluid">
                            <div class="caption vertical-top text-left">
                                <div class="big-text"> Big Sale </div>
                                <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                                <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit </div>
                            </div>
                            <!-- /.caption -->
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                </div>


                <div class="clearfix filters-container m-t-10">
                    <div class="row">
                        <div class="col col-sm-6 col-md-2">
                            <div class="filter-tabs">
                                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                    <li class="active"> <a data-toggle="tab" href="#grid-container"><i
                                                class="icon fa fa-th-large"></i>Grid</a> </li>
                                    <li><a data-toggle="tab" href="#list-container"><i
                                                class="icon fa fa-th-list"></i>List</a></li>
                                </ul>
                            </div>
                            <!-- /.filter-tabs -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-12 col-md-6">
                            <div class="col col-sm-3 col-md-6 no-padding">
                                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                                    <div class="fld inline">
                                        <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                            <button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
                                                Position <span class="caret"></span> </button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li role="presentation"><a href="#">position</a></li>
                                                <li role="presentation"><a href="#">Price:Lowest first</a></li>
                                                <li role="presentation"><a href="#">Price:HIghest first</a></li>
                                                <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /.fld -->
                                </div>
                                <!-- /.lbl-cnt -->
                            </div>
                            <!-- /.col -->
                            <div class="col col-sm-3 col-md-6 no-padding">
                                <div class="lbl-cnt"> <span class="lbl">Show</span>
                                    <div class="fld inline">
                                        <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                            <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1
                                                <span class="caret"></span> </button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li role="presentation"><a href="#">1</a></li>
                                                <li role="presentation"><a href="#">2</a></li>
                                                <li role="presentation"><a href="#">3</a></li>
                                                <li role="presentation"><a href="#">4</a></li>
                                                <li role="presentation"><a href="#">5</a></li>
                                                <li role="presentation"><a href="#">6</a></li>
                                                <li role="presentation"><a href="#">7</a></li>
                                                <li role="presentation"><a href="#">8</a></li>
                                                <li role="presentation"><a href="#">9</a></li>
                                                <li role="presentation"><a href="#">10</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /.fld -->
                                </div>
                                <!-- /.lbl-cnt -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-6 col-md-4 text-right">
                           {{ $products->links() }}
                            <!-- /.pagination-container -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <div class="search-result-container ">
                    <div id="myTabContent" class="tab-content category-list">
                        <div class="tab-pane active " id="grid-container">
                            <div class="category-product">
                                <div class="row">
                                    @foreach ($products as $product)
                                        <div class="col-sm-6 col-md-4 wow fadeInUp">
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
                                                                <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_bn) }}">
                                                                    {{ Str::limit($product->name_bn, 30, ' ...') }}
                                                                </a>
                                                            @else
                                                                <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_en) }}">
                                                                    {{ Str::limit($product->name_en, 30, ' ...') }} 
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
                                <!-- /.row -->
                            </div>
                            <!-- /.category-product -->

                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane " id="list-container">
                            <div class="category-product">
                                @foreach ($products as $product)
                                    <div class="category-product-inner wow fadeInUp">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <div class="image"> <img src="{{ asset('/'. $product->thumbnail) }}"
                                                                    alt=""> </div>
                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name">
                                                                @if (session()->get('language') == 'bangla')
                                                                    <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_bn) }}">
                                                                        {{ Str::limit($product->name_bn, 50, ' ...') }}
                                                                    </a>
                                                                @else
                                                                    <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_en) }}">
                                                                        {{ Str::limit($product->name_en, 50, ' ...') }} 
                                                                    </a>
                                                                @endif
                                                            </h3>
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
                                                            <div class="description m-t-10"> 
                                                                @if (session()->get('language') == 'bangla')
                                                                    {{ $product->short_desc_bn }}
                                                                @else 
                                                                    {{ $product->short_desc_en }}
                                                                @endif
                                                            </div>
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">
                                                                    <ul class="list-unstyled">
                                                                        <li class="add-cart-button btn-group">
                                                                            <button class="btn btn-primary icon"
                                                                                data-toggle="dropdown" type="button"> <i
                                                                                    class="fa fa-shopping-cart"></i>
                                                                            </button>
                                                                            <button class="btn btn-primary cart-btn"
                                                                                type="button">Add to cart</button>
                                                                        </li>
                                                                        <li class="lnk wishlist"> <a data-toggle="tooltip"
                                                                            id="{{ $product->id }}" onclick="addToWishList(this.id)" href="javascript:void(0);"
                                                                            title="Wishlist"> <i class="icon fa fa-heart"></i>
                                                                        </a> </li>
                                                                        <li class="lnk"> <a class="add-to-cart"
                                                                                href="detail.html" title="Compare"> <i
                                                                                    class="fa fa-signal"></i> </a> </li>
                                                                    </ul>
                                                                </div>
                                                                <!-- /.action -->
                                                            </div>
                                                            <!-- /.cart -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-list-row -->
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
                                            <!-- /.product-list -->
                                        </div>
                                        <!-- /.products -->
                                    </div>
                                @endforeach
                                <!-- /.category-product-inner -->
                            </div>
                            <!-- /.category-product -->
                        </div>
                        <!-- /.tab-pane #list-container -->
                    </div>
                    <!-- /.tab-content -->
                    <div class="clearfix filters-container">
                        <div class="text-right">
                            {{ $products->links() }}
                            <!-- /.pagination-container -->
                        </div>
                        <!-- /.text-right -->

                    </div>
                    <!-- /.filters-container -->

                </div>
                <!-- /.search-result-container -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.layouts.includes.brand')
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->

</div>
<!-- /.body-content -->

@endsection
@push('script')

@endpush