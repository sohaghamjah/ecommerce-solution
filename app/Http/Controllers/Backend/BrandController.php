<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Image;

class BrandController extends Controller
{
    public function index(){
        return view('backend.brand.index');
    }

    public function getBrandData(Request $request){
        $brand = Brand::all();
        if($request->ajax()){
            return Datatables::of($brand)
                    ->addIndexColumn()
                    ->editColumn('image', function ($brand) {
                        if ($brand->image != null) {
                            $html = '<img src="' . asset($brand->image) . '" height="30px" width="60px">';
                        } else {
                            $html = '<img src="' . asset('upload/admin/no_image.jpg') . '" height="30px" width="60px">';
                        }
                        return $html;
                    })                
                    ->rawColumns(['image', 'action'])
                    ->addColumn('action', function ($brand) {
                        $action = '<a href="'.route('brand.edit', $brand->id).'" style="cursor: pointer" class="dropdown-item"><i class="fas fa-edit text-primary"></i> Edit</a>';
                        $action .= '<a data-id="'.$brand->id.'" style="cursor: pointer" class="dropdown-item delete-data"><i class="fas fa-trash text-primary"></i> Delete</a>';

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

    public function store(Request $request){
        $request->validate([
            'name_en' => 'required',
            'name_bn' => 'required',
            'image' => 'required',
        ],[
            'name_en.required' => 'Brand name english field is required',
            'name_bn.required' => 'Brand name bangle field is required',
        ]);

        $file = $request->file('image');
        $image_name = md5(time().rand()).'.'.$file->getClientOriginalExtension();
        Image::make($file)->resize(300,300)->save('upload/admin/brand/'.$image_name);
        $image_url = 'upload/admin/brand/'.$image_name;

        Brand::insert([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'slug_en' => strtolower(str_replace(' ', '-', $request->name_en)),
            'slug_bn' => str_replace(' ', '-', $request->name_bn),
            'image' => $image_url,
        ]);

        return redirect()->back()->with('success', 'Brand inserted successfully');

    }

    public function edit($id){
        $brand = Brand::find($id);

        return view('backend.brand.edit', compact('brand'));
    }

    public function update(Request $request){

        $id = $request->id;

        $request->validate([
            'name_en' => 'required',
            'name_bn' => 'required',
            'image' => 'required',
        ],[
            'name_en.required' => 'Brand name english field is required',
            'name_bn.required' => 'Brand name bangle field is required',
        ]);

        if($request->file('image')){

            $file = $request->file('image');
            $image_name = md5(time().rand()).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(300,300)->save('upload/admin/brand/'.$image_name);
            $image_url = 'upload/admin/brand/'.$image_name;
            unlink($request->brand_old_image);

            Brand::find($id)->update([
                'name_en' => $request->name_en,
                'name_bn' => $request->name_bn,
                'slug_en' => strtolower(str_replace(' ', '-', $request->name_en)),
                'slug_bn' => str_replace(' ', '-', $request->name_bn),
                'image' => $image_url,
            ]);
    
            return redirect()->route('brand')->with('success', 'Brand updated successfully');
        }else{

            Brand::find($id)->update([
                'name_en' => $request->name_en,
                'name_bn' => $request->name_bn,
                'slug_en' => strtolower(str_replace(' ', '-', $request->name_en)),
                'slug_bn' => str_replace(' ', '-', $request->name_bn),
            ]);
    
            return redirect()->route('brand')->with('success', 'Brand updated successfully');
        }

    }

    public function delete(Request $request){
        $id = $request->id;
        $brand = Brand::findOrFail($id);
        $img = $brand->image;
        unlink($img);  
        $brand->delete();

        return response()->json('success');
    }
}
