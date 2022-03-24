<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubCategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('backend.sub-category.index', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'name_en' => 'required',
            'category_id' => 'required',
            'name_bn' => 'required',
        ],[
            'name_en.required' => 'Sub category name english field is required',
            'name_bn.required' => 'Sub category name bangle field is required',
        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'slug_en' => strtolower(str_replace(' ', '-', $request->name_en)),
            'slug_bn' => str_replace(' ', '-', $request->name_bn),
        ]);

        return redirect()->back()->with('success', 'Sub category inserted successfully');

    }

    public function getSubCategoryData(Request $request){
        $subcategories = SubCategory::with('category')->get();
        if($request->ajax()){
            return DataTables::of($subcategories)
                    ->addIndexColumn()
                    ->addColumn('categories', function ($subcategory) {
                        return $subcategory->category->name_en;
                    })            
                    ->addColumn('action', function ($subcategories) {
                        $action = '<a href="'.route('sub.category.edit', $subcategories->id).'" style="cursor: pointer" class="dropdown-item"><i class="fas fa-edit text-primary"></i> Edit</a>';
                        $action .= '<a data-id="'.$subcategories->id.'" style="cursor: pointer" class="dropdown-item delete-data"><i class="fas fa-trash text-primary"></i> Delete</a>';

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

    public function edit($id){
        $categories = Category::all();
        $subcategory = SubCategory::with('category')->where('id', $id)->first();
        return view('backend.sub-category.edit', compact('subcategory','categories'));
    }

    public function update(Request $request){
        $id = $request->id;
        $request->validate([
            'name_en' => 'required',
            'category_id' => 'required',
            'name_bn' => 'required',
        ],[
            'name_en.required' => 'Sub category name english field is required',
            'name_bn.required' => 'Sub category name bangle field is required',
        ]);

        SubCategory::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'slug_en' => strtolower(str_replace(' ', '-', $request->name_en)),
            'slug_bn' => str_replace(' ', '-', $request->name_bn),
        ]);

        return redirect()->route('sub.category')->with('success', 'Sub category updated successfully');

    }

    public function delete(Request $request){
        $id = $request->id;
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();

        return response()->json('success');
    }
}
