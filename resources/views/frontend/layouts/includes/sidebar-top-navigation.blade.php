@php
    $categories = DB::table('categories')->orderBy('name_en', 'ASC')->get();
@endphp
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            @foreach ($categories as $category)
            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle"
                    data-toggle="dropdown"><i class="icon {{ $category->icon }}"
                        aria-hidden="true"></i>@if (session()->get('language') == 'bangla')
                    {{ $category->name_bn }} @else {{ $category->name_en }} @endif</a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <div class="row">

                            {{-- Get category from database --}}
                            @php
                            $subcategories =
                            DB::table('sub_categories')->where('category_id',$category->id)->orderBy('name_en','ASC')->get();
                            @endphp

                            @foreach ($subcategories as $subcategory)
                            <div class="col-sm-12 col-md-3">
                                <a style="padding: 0" href="{{ url('product/subcategory/'.$subcategory->id.'/'.$subcategory->slug_en) }}">
                                    <h2 class="title">@if (session()->get('language') == 'bangla')
                                        {{ $subcategory->name_bn }} @else {{ $subcategory->name_en }} @endif
                                    </h2>
                                </a>
                                <ul class="links list-unstyled">
                                    @php
                                    $subsubcategories =
                                    DB::table('sub_sub_categories')->where('subcategory_id',$subcategory->id)->orderBy('name_en','ASC')->get();
                                    @endphp
                                    @foreach ($subsubcategories as $subsubcategory)
                                    <li><a href="{{ url('product/subsubcategory/'.$subsubcategory->id.'/'.$subsubcategory->slug_en) }}">@if (session()->get('language') == 'bangla')
                                            {{ $subsubcategory->name_bn }} @else
                                            {{ $subsubcategory->name_en }} @endif</a></li>
                                    @endforeach
                                    <li><a href="#">Dresses</a></li>
                                </ul>
                            </div>
                            @endforeach
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </li>
                    <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu -->
            </li>
            @endforeach
            <!-- /.menu-item -->

            <!-- /.menu-item -->

        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>