<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\State;
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


    public function disctrictStore(Request $request){
        $request->validate([
            'name' => 'required',
            'division_id' => 'required',
        ]);

        District::create([
            'name' => $request->name,
            'division_id' => $request->division_id,
        ]);

        return redirect()->back()->with('success', 'District created successfully');
    }


    public function getDistrictData(Request $request){
        $data = District::with('division')->orderBy('id', 'DESC');
        if($request->ajax()){
            return DataTables::eloquent($data)
                    ->addIndexColumn()              
                    ->rawColumns(['action','divisin_id'])
                    ->addColumn('division', function($data){
                        return $data->division->name;
                    })

                    ->addColumn('action', function ($data) {
                        $action = '<a href="'.route('district.edit', $data->id).'" style="cursor: pointer" class="dropdown-item"><i class="fas fa-edit text-primary"></i> Edit</a>';
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

    public function disctrictEdit($id){
        $district = District::findOrFail($id);
        $divisions = Division::all();
        return view('backend.district.edit', compact('district','divisions'));
    }

    public function districtUpdate(Request $request){
        $id = $request->sid;

        $request->validate([
            'name' => 'required',
            'division_id' => 'required',
        ]);

        District::findOrFail($id)->update([
            'name' => $request->name,
            'division_id' => $request->division_id,
        ]);

        return redirect()->route('district')->with('success', 'District updated successfully');
    }

    public function districtDelete(Request $request){
        $id = $request->id;
        District::findOrFail($id)->delete();
        return response()->json('success');
    }

    
    /**
     * State Section
     */

    public function getDistrict(Request $request){
        $data = District::where('division_id',$request->id)->get();
        $html = '';
        foreach ($data as $value) {
            $html .= '<option value="'.$value->id.'">'.$value->name.'</option>';
        }

        return response()->json($html);

    }

    public function stateIndex(){
        $divisions = Division::orderBy('id', 'DESC')->get();
        return view('backend.state.index', compact('divisions'));
    }

    public function getStateData(Request $request){
        $data = State::with('division','district')->orderBy('id', 'DESC');
        if($request->ajax()){
            return DataTables::eloquent($data)
                    ->addIndexColumn()              
                    ->rawColumns(['action','division','district'])
                    ->addColumn('division', function($data){
                        return $data->division->name;
                    })
                    ->addColumn('district', function($data){
                        return $data->district->name;
                    })

                    ->addColumn('action', function ($data) {
                        $action = '<a href="'.route('state.edit', $data->id).'" style="cursor: pointer" class="dropdown-item"><i class="fas fa-edit text-primary"></i> Edit</a>';
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

    public function stateStore(Request $request){
        $request->validate([
            'name' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
        ]);

        State::create([
            'name' => $request->name,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
        ]);

        return redirect()->back()->with('success', 'State created successfully');
    }

    public function stateEdit($id){
        $state = State::findOrFail($id);
        $divisions = Division::all();
        return view('backend.state.edit', compact('state','divisions'));
    }

    public function stateUpdate(Request $request){
        $id = $request->id;

        $request->validate([
            'name' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
        ]);

        State::findOrFail($id)->update([
            'name' => $request->name,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
        ]);

        return redirect()->route('state')->with('success', 'State updated successfully');
    }

    public function stateDelete(Request $request){
        $id = $request->id;
        State::findOrFail($id)->delete();
        return response()->json('success');
    }


    
}
