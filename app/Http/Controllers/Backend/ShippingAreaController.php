<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ShippingAreaController extends Controller
{
    public function index(){
        return view('backend.division.index');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
        ]);

        Division::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Division created successfully');
    }

    public function getDivisionData(Request $request){
        $data = Division::orderBy('id', 'DESC')->get();
        if($request->ajax()){
            return DataTables::of($data)
                    ->addIndexColumn()              
                    ->rawColumns(['action'])
                    ->addColumn('action', function ($data) {
                        $action = '<a href="'.route('division.edit', $data->id).'" style="cursor: pointer" class="dropdown-item"><i class="fas fa-edit text-primary"></i> Edit</a>';
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

    public function edit($id){
        $division = Division::findOrFail($id);
        return view('backend.division.edit', compact('division'));
    }

    public function update(Request $request){
        $id = $request->id;

        $request->validate([
            'name' => 'required',
        ]);

        Division::findOrFail($id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('division')->with('success', 'Division updated successfully');
    }

    public function delete(Request $request){
        $id = $request->id;
        Division::findOrFail($id)->delete();
        return response()->json('success');
    }


    /**
     * District section
     */

    public function districtIndex(){
        $divisions = Division::orderBy('id', 'DESC')->get();
        return view('backend.district.index', compact('divisions'));
    }
}
