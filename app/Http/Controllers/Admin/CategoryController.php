<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index(){
        return view('backend.category.index');
    }

    public function getCategoryData(Request $request){
        $category = Category::all();
        if($request->ajax()){
            return DataTables::of($category)
                    ->addIndexColumn()
                    ->editColumn('icon', function ($category) {
                        return '<span class="btn btn-success btn-sm"><i class="'.$category->icon.'"></i></span>';
                    })                
                    ->rawColumns(['icon', 'action'])
                    ->addColumn('action', function ($category) {
                        $action = '<a href="'.route('category.edit', $category->id).'" style="cursor: pointer" class="dropdown-item"><i class="fas fa-edit text-primary"></i> Edit</a>';
                        $action .= '<a data-id="'.$category->id.'" style="cursor: pointer" class="dropdown-item delete-data"><i class="fas fa-trash text-primary"></i> Delete</a>';

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
            'icon' => 'required',
        ],[
            'name_en.required' => 'Category name english field is required',
            'name_bn.required' => 'Category name bangle field is required',
        ]);

        Category::insert([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'slug_en' => strtolower(str_replace(' ', '-', $request->name_en)),
            'slug_bn' => str_replace(' ', '-', $request->name_bn),
            'icon' => $request->icon,
        ]);

        return redirect()->back()->with('success', 'Category inserted successfully');

    }

    public function edit($id){
        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));
    }

    
    public function update(Request $request){

        $id = $request->id;
        $request->validate([
            'name_en' => 'required',
            'name_bn' => 'required',
            'icon' => 'required',
        ],[
            'name_en.required' => 'Category name english field is required',
            'name_bn.required' => 'Category name bangle field is required',
        ]);

        Category::findOrFail($id)->update([
            'name_en' => $request->name_en,
            'name_bn' => $request->name_bn,
            'slug_en' => strtolower(str_replace(' ', '-', $request->name_en)),
            'slug_bn' => str_replace(' ', '-', $request->name_bn),
            'icon' => $request->icon,
        ]);

        return redirect()->route('category')->with('success', 'Category Updated successfully');

    }

    public function delete(Request $request){
        $id = $request->id;
        $brand = Category::findOrFail($id);
        $brand->delete();

        return response()->json('success');
    }
}
