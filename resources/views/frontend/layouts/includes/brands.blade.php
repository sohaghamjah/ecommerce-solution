@php
    $brands = DB::table('brands')->get();
@endphp
<div class="sidebar-widget wow fadeInUp">
    <div class="widget-header">
        <h4 class="widget-title">Manufactures</h4>
    </div>
    <div class="sidebar-widget-body">
        <ul class="list">
            @foreach ($brands as $brand)
                <li>
                    @if (session()->get('language') == 'bangla')
                        <a href="#">{{ $brand->name_bn }}</a>
                    @else
                        <a href="#">{{ $brand->name_en }}</a>
                    @endif
                </li>
            @endforeach
           
        </ul>
        <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
    </div>
    <!-- /.sidebar-widget-body -->
</div>