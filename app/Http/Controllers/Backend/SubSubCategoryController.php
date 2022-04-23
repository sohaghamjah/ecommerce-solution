<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubSubCategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('backend.sub-sub-category.index', compact('categories'));
    }

    public function getSubSubCategoryData(Request $request){
        $subsubcategories = SubSubCategory::with('category','subcategory')->get();
        if($request->ajax()){
            return DataTables::of($subsubcategories)
                    ->addIndexColumn()
                    ->addColumn('categories', function ($subsubcategory) {
                        return $subsubcategory->category->name_en;
                    })            
                    ->addColumn('subcategories', function ($subsubcategory) {
                        return $subsubcategory->subcategory->name_en;
                    })            
                    ->addColumn('action', function ($subsubcategories) {
                        $action = '<a href="'.route('sub.sub.category.edit', $subsubcategories->id).'" style="cursor: pointer" class="dropdown-item"><i class="fas fa-edit text-primary"></i> Edit</a>';
                        $action .= '<a data-id="'.$subsubcategories->id.'" style="cursor: pointer" class="dropdown-item delete-data"><i class="fas fa-trash text-primary"></i> Delete</a>';

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

    public function addSubCategoryAjax(Request $request){
        $id = $request -> id;
        $subcategory = SubCategory::where('category_id', $id)->get();
        return response()->json($subcategory);
    }

    public function store(Request $request){
        $request->validate([
            'name_en' => 'required',
            'subcategory_id' => 'required',
            'category_id' => 'required',
            'name_bn' => 'required',
        ],[
            'name_en.required' => 'Sub sub category name english field is required',
            'name_bn.required' => 'Sub sub category name bangle field is required',
        ]);

        SubSubCategory::create([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'slug_en' => strtolower(str_replace(' ', '-', $request->name_en)),
            'slug_bn' => str_replace(' ', '-', $request->name_bn),
        ]);

        return redirect()->back()->with('success', 'Sub Sub category inserted successfully');

    }

    public function edit($id){
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $subsubcategory = SubSubCategory::with('category','subcategory')->where('id', $id)->first();
        return view('backend.sub-sub-category.edit', compact('subsubcategory','categories','subcategories'));
    }

    public function update(Request $request){
        $id = $request->id;
        $request->validate([
            'name_en' => 'required',
            'subcategory_id' => 'required',
            'category_id' => 'required',
            'name_bn' => 'required',
        ],[
            'name_en.required' => 'Sub sub category name english field is required',
            'name_bn.required' => 'Sub sub category name bangle field is required',
        ]);

        SubSubCategory::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'slug_en' => strtolower(str_replace(' ', '-', $request->name_en)),
            'slug_bn' => str_replace(' ', '-', $request->name_bn),
        ]);

        return redirect()->route('sub.sub.category')->with('success', 'Sub sub category updated successfully');

    }

    public function delete(Request $request){
        $id = $request->id;
        $subcategory = SubSubCategory::findOrFail($id);
        $subcategory->delete();
        return response()->json('success');
    }
}
