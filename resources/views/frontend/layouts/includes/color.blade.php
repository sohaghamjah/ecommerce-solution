@php
    $color_en = DB::table('products')->groupBy('color_en')->select('color_en')->get();
    $color_bn = DB::table('products')->groupBy('color_bn')->select('color_bn')->get();
@endphp
<div class="sidebar-widget wow fadeInUp">
    <div class="widget-header">
        <h4 class="widget-title">Colors</h4>
    </div>
    <div class="sidebar-widget-body">
        <ul class="list">
            @if (session()->get('language') == 'bangla')
                @foreach ($color_bn as $color)
                    <li><a href="#">{{ str_replace(',', ' ', $color -> color_bn) }}</a></li>
                @endforeach
            @else
                @foreach ($color_en as $color)
                    <li><a href="#">{{ str_replace(',', ' ', $color -> color_en) }}</a></li>
                @endforeach
            @endif
        </ul>
    </div>
    <!-- /.sidebar-widget-body -->
</div>