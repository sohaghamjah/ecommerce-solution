@php
    $brands = DB::table('brands')->latest()->get();
@endphp
<div id="brands-carousel" class="logo-slider wow fadeInUp">
    <div class="logo-slider-inner">
      <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
        @foreach ($brands as $brand)
          <div class="item m-t-15"> <a href="#" class="image"> <img style="width: 150px; height: 100px" data-echo="{{ asset($brand->image) }}" src="{{ asset($brand->image) }}" alt=""> </a> </div>
        @endforeach
        <!--/.item-->
        <!--/.item--> 
      </div>
      <!-- /.owl-carousel #logo-slider --> 
    </div>
    <!-- /.logo-slider-inner --> 
    
  </div>