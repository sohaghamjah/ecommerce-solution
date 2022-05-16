<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">
        @if (session()->get('language') == 'bangla')
            হট ডিলস
        @else
            Hot Deals
        @endif
    </h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
        @foreach ($hot_deals as $product)
        <div class="item">
            <div class="products">
                <div class="hot-deal-wrapper">
                    <div class="image"> <img
                            src="{{ asset('/'. $product->thumbnail) }}" alt="">
                    </div>
                    @php
                        $amount = $product->sale_price - $product->discount_price;
                        $percent = ($amount/$product->sale_price)*100;
                        $discount = round($percent);
                    @endphp
                
                    @if (!empty($product -> discount_price))  
                        @if (session()->get('language') == 'bangla')
                            <div class="sale-offer-tag"><span>{{ bn_price($discount) }}%<br>
                            off</span></div>
                        @else 
                             <div class="sale-offer-tag"><span>{{ $discount }}%<br>
                            off</span></div>
                        @endif   
                    @endif
                    <div class="timing-wrapper">
                        <div class="box-wrapper">
                            <div class="date box"> <span class="key">120</span> <span
                                    class="value">DAYS</span> </div>
                        </div>
                        <div class="box-wrapper">
                            <div class="hour box"> <span class="key">20</span> <span
                                    class="value">HRS</span> </div>
                        </div>
                        <div class="box-wrapper">
                            <div class="minutes box"> <span class="key">36</span> <span
                                    class="value">MINS</span> </div>
                        </div>
                        <div class="box-wrapper hidden-md">
                            <div class="seconds box"> <span class="key">60</span> <span
                                    class="value">SEC</span> </div>
                        </div>
                    </div>
                </div>
                <!-- /.hot-deal-wrapper -->

                <div class="product-info text-left m-t-20">
                    @if (session()->get('language') == 'bangla')
                        <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_bn) }}">
                            {{ Str::limit($product->name_bn, 30, ' ...') }}
                        </a>
                    @else
                        <a href="{{ url('product/single/'.$product->id.'/'.$product->slug_en) }}">
                            {{ Str::limit($product->name_en, 30, ' ...') }} 
                        </a>
                    @endif
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
                <!-- /.product-info -->

                <div class="cart clearfix animate-effect">
                    <div class="action">
                        <div class="add-cart-button btn-group">
                            <button id="add_to_cart_btn" data-id="{{ $product -> id }}" class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                <i class="fa fa-shopping-cart"></i> </button>
                            <button class="btn btn-primary cart-btn" id="add_to_cart_btn" data-id="{{ $product -> id }}" type="button">Add to cart</button>
                        </div>
                    </div>
                    <!-- /.action -->
                </div>
                <!-- /.cart -->
            </div>
        </div>
        @endforeach
    </div>
    <!-- /.sidebar-widget -->
</div>