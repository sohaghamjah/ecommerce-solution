@php
    $tags_en = DB::table('products')->groupBy('tag_en')->select('tag_en')->get();
    $tags_bn = DB::table('products')->groupBy('tag_bn')->select('tag_bn')->get();
@endphp

<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list"> 
            @if (session()->get('language') == 'bangla')
                @foreach ($tags_bn as $tag)
                    <a class="item {{ Request::is('product/tag/'.$tag -> tag_bn) == 'product/tag/'.$tag -> tag_bn  ? 'active' : ''}}" title="{{ $tag -> tag_bn }}" href="{{ url('product/tag/'.$tag -> tag_bn) }}">{{ $tag -> tag_bn }}</a> 
                @endforeach
            @else
                @foreach ($tags_en as $tag)
                    <a class="item {{ Request::is('product/tag/'.$tag -> tag_en) == 'product/tag/'.$tag -> tag_en  ? 'active' : ''}}" title="{{ $tag -> tag_en }}" href="{{ url('product/tag/'.$tag -> tag_en) }}">{{ $tag -> tag_en }}</a> 
                @endforeach
            @endif
            
        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>