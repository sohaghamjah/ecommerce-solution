<div class="sidebar-widget wow fadeInUp">
    <h3 class="section-title">shop by</h3>
    <div class="widget-header">
        <h4 class="widget-title">Category</h4>
    </div>
    <div class="sidebar-widget-body">
        <div class="accordion">
            @foreach ($categories as $category)
                <div class="accordion-group">
                    <div class="accordion-heading"> 
                        <a href="#collapseOne-{{ $category->id }}" data-toggle="collapse"
                            class="accordion-toggle collapsed"> 
                            @if (session()->get('language') == 'bangla')
                                {{ $category->name_bn }}
                            @else
                                {{ $category->name_en }}
                            @endif
                        </a> </div>
                    <!-- /.accordion-heading -->
                    <div class="accordion-body collapse" id="collapseOne-{{ $category->id }}" style="height: 0px;">
                        <div class="accordion-inner">
                            <ul>
                                @php
                                    $subcategories = DB::table('sub_categories')->where('category_id', $category->id)->get();
                                @endphp

                                @foreach ($subcategories as $subcategory)
                                    @if (session()->get('language') == 'bangla')
                                        <li><a href="{{ url('product/subcategory/'.$subcategory->id.'/'.$subcategory->slug_en) }}">{{ $subcategory -> name_bn }}</a></li>
                                    @else
                                        <li><a href="{{ url('product/subcategory/'.$subcategory->id.'/'.$subcategory->slug_en) }}">{{ $subcategory -> name_en }}</a></li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                        <!-- /.accordion-inner -->
                    </div>
                    <!-- /.accordion-body -->
                </div>
            @endforeach
            <!-- /.accordion-group -->

        </div>
        <!-- /.accordion -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>