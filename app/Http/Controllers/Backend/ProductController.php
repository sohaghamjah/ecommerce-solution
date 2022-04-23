<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{

    public function index(){
        return view('backend.product.index');
    }

    public function create(){
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.product.create', compact('brands','categories'));
    }

    public function getProductData(Request $request){
        $data = Product::latest()->get();
        if($request->ajax()){
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('discount_price', function ($data) {
                        if ($data->discount_price != null) {
                            $amount = $data->sale_price - $data->discount_price;
                            $discount = ($amount/$data->sale_price)*100;
                            return '<span class="badge badge badge-primary">'.round($discount).'%</span>';
                        } else {
                           return "No Discount";
                        }
                    }) 
                    ->editColumn('status', function ($data) {
                        if ($data->status == 1) {
                            return '<span class="badge badge badge-success">Active</span>';
                        } else {
                            return '<span class="badge badge badge-danger">Inactive</span>';
                        }
                    }) 
                    ->editColumn('image', function ($data) {
                        if ($data->thumbnail != null) {
                            $html = '<img src="' . asset($data->thumbnail) . '" height="45px" width="60px">';
                        } else {
                            $html = '<img src="' . asset('upload/admin/no_image.jpg') . '" height="45px" width="60px">';
                        }
                        return $html;
                    })                
                    ->rawColumns(['image', 'action', 'status','discount_price'])
                    ->addColumn('action', function ($data) {
                        $action = '<a href="'.route('product.edit', $data->id).'" style="cursor: pointer" class="dropdown-item"><i class="fas fa-edit text-primary"></i> Edit</a>';
                        if($data->status == 1){
                            $action .= '<a href="'.route('product.inactive', $data->id).'" style="cursor: pointer" class="dropdown-item"><i class="fas fa-chevron-down text-primary"></i> Inactive</a>';
                        }else{
                            $action .= '<a href="'.route('product.active', $data->id).'" style="cursor: pointer" class="dropdown-item"><i class="fas fa-chevron-up text-primary"></i> Active</a>';
                        }
                        $action .= '<a data-id="'.$data->id.'" style="cursor: pointer" class="dropdown-item delete-data"><i class="fas fa-trash text-primary"></i> Delete</a>';

                        return '<div class="dropdown">
                                    <button title="Action" class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-th-list"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        '.$action.'
                                    </div>
                                </div>';
                    })
                    ->make(true);
        }
    }

    public function getSubSubCategoryAjax(Request $request){
        $id = $request -> id;
        $subsubcategory = SubSubCategory::where('subcategory_id', $id)->get();
        return response()->json($subsubcategory);
    }

    public function store(Request $request){


        $request->validate([
            'brand' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
            'name_en' => 'required',
            'name_bn' => 'required',
            'code' => 'required',
            'qty' => 'required',
            'tag_en' => 'required',
            'tag_bn' => 'required',
            'color_en' => 'required',
            'color_bn' => 'required',
            'sale_price' => 'required',
            'short_desc_en' => 'required|max:255',
            'short_desc_bn' => 'required|max:255',
            'long_desc_en' => 'required',
            'long_desc_en' => 'required',
            'thumbnail' => 'required',
            'multi_img' => 'required',
        ],[
            'name_en.required' => 'Product name english field is required',
            'name_bn.required' => 'Product name bangle field is required',
        ]);

        $file = $request->file('thumbnail');
        $image_name = md5(time().rand()).'.'.$file->getClientOriginalExtension();
        Image::make($file)->resize(917,1000)->save('upload/admin/products/thumbnail/'.$image_name);
        $image_url = 'upload/admin/products/thumbnail/'.$image_name;

        $id = Product::insertGetId([
            'brand_id' => $request->brand,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'slug_en' => strtolower(str_replace(' ', '-', $request->name_en)),
            'slug_bn' => str_replace(' ', '-', $request->name_bn),
            'code' => $request->code,
            'qty' => $request->qty,
            'tag_en' => $request->tag_en,
            'tag_bn' => $request->tag_bn,
            'size_en' => $request->size_en,
            'size_bn' => $request->size_bn,
            'color_en' => $request->color_en,
            'color_bn' => $request->color_bn,
            'sale_price' => $request->sale_price,
            'discount_price' => $request->discount_price,
            'short_desc_en' => $request->short_desc_en,
            'short_desc_bn' => $request->short_desc_bn,
            'long_desc_en' => $request->long_desc_en,
            'long_desc_bn' => $request->long_desc_bn,
            'thumbnail' => $image_url,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $images = $request->file('multi_img');
        foreach($images as $image){
            $image_name = md5(time().rand()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('upload/admin/products/multi-image/'.$image_name);
            $image_url = 'upload/admin/products/multi-image/'.$image_name;

            ProductImage::create([
                'product_id' => $id,
                'image' => $image_url,
            ]);
        }

        return redirect()->route('product')->with('success','Product added successfull');
    }

    public function edit($id){
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $product = Product::findOrFail($id);
        $multimages = ProductImage::where('product_id', $id)->get();
        return view('backend.product.edit', compact('product','brands','categories','subcategories','subsubcategories','multimages'));
    }

    public function update(Request $request){
        $id = $request->id;

        $request->validate([
            'brand' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
            'name_en' => 'required',
            'name_bn' => 'required',
            'code' => 'required',
            'qty' => 'required',
            'tag_en' => 'required',
            'tag_bn' => 'required',
            'color_en' => 'required',
            'color_bn' => 'required',
            'sale_price' => 'required',
            'short_desc_en' => 'required|max:255',
            'short_desc_bn' => 'required|max:255',
            'long_desc_en' => 'required',
            'long_desc_en' => 'required',
        ],[
            'name_en.required' => 'Product name english field is required',
            'name_bn.required' => 'Product name bangle field is required',
        ]);

        Product::findOrFail($id)->update([
            'brand_id' => $request->brand,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'slug_en' => strtolower(str_replace(' ', '-', $request->name_en)),
            'slug_bn' => str_replace(' ', '-', $request->name_bn),
            'code' => $request->code,
            'qty' => $request->qty,
            'tag_en' => $request->tag_en,
            'tag_bn' => $request->tag_bn,
            'size_en' => $request->size_en,
            'size_bn' => $request->size_bn,
            'color_en' => $request->color_en,
            'color_bn' => $request->color_bn,
            'sale_price' => $request->sale_price,
            'discount_price' => $request->discount_price,
            'short_desc_en' => $request->short_desc_en,
            'short_desc_bn' => $request->short_desc_bn,
            'long_desc_en' => $request->long_desc_en,
            'long_desc_bn' => $request->long_desc_bn,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
        ]);

        return redirect()->route('product')->with('success','Product updated successfull');
    }

    public function thumbnailUpdate(Request $request){
        $id = $request->id;
        $old_img = $request->old_img;
        unlink($old_img);

        if($request->file('thumbnail')){
            $img = $request->file('thumbnail');
            $image_name = md5(time().rand()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/admin/products/thumbnail/'.$image_name);
            $image_url = 'upload/admin/products/thumbnail/'.$image_name;

            Product::findOrFail($id)->update([
                'thumbnail' => $image_url,
            ]);

        }

        return redirect()->back()->with('success', 'Product Thumbnail updated successfull');
    }

    public function multImageAdd(Request $request){
        return $request->all();
    }

    public function multImageUpdate(Request $request){
        $imgs = $request->multi_img;
        $product_id = $request->id;
        if($imgs){
            foreach ($imgs as $id => $img) {
                $old_img = ProductImage::findOrFail($id);
                unlink($old_img->image);
    
                $image_name = md5(time().rand()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(917,1000)->save('upload/admin/products/multi-image/'.$image_name);
                $image_url = 'upload/admin/products/multi-image/'.$image_name;
    
                ProductImage::where('id', $id)->update([
                    'image' => $image_url,
                ]);
    
            }
        }

        if($request->file('image')){
            $img = $request->file('image');
            $image_name = md5(time().rand()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/admin/products/multi-image/'.$image_name);
            $image_url = 'upload/admin/products/multi-image/'.$image_name;

            ProductImage::create([
                'product_id' => $product_id,
                'image' => $image_url,
            ]);
        }

        return redirect()->back()->with('success','Product updated successfull');
    }

    public function multImageDelete(Request $request){
        $id = $request -> id;
        $old_img = ProductImage::findOrFail($id)->image;
        unlink($old_img);

        ProductImage::findOrFail($id)->delete();

        return response()->json('success');
    }

    public function inactive($id){
        Product::findOrFail($id)->update([
            'status' => 0,
        ]);
        return redirect()->back()->with('success','Product inactivate successfull');
    }

    public function active($id){
        Product::findOrFail($id)->update([
            'status' => 1,
        ]);
        return redirect()->back()->with('success','Product activate successfull');
    }

    public function delete(Request $request){
        $id = $request->id;
        $product = Product::findOrFail($id);
        unlink($product->thumbnail);
        Product::findOrFail($id)->delete();

        $images = ProductImage::where('product_id', $id)->get();
        foreach ($images as $img) {
            unlink($img->image);
            ProductImage::where('product_id', $id)->delete();
        }

        return response()->json('success');
    }

}
