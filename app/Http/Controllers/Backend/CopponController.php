<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coppon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class CopponController extends Controller
{
    public function index(){
        return view('backend.coupon.index');
    }

    public function getCouponData(Request $request){
        $data = Coppon::all();
        if($request->ajax()){
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('discount', function ($data) {
                        return $data->discount."%";
                    })      
                    ->editColumn('validity', function ($data) {
                        return date('F d, Y', strtotime($data->validity));
                    })      
                    ->editColumn('status', function ($data) {
                        if ($data->validity >= Carbon::now()->format('Y-m-d') && $data->status == 1) {
                            return '<span class="badge badge badge-success">Active</span>';
                        } else {
                            return '<span class="badge badge badge-danger">Inactive</span>';
                        }
                    })          
                    ->rawColumns(['validity', 'action', 'status', 'discount'])
                    ->addColumn('action', function ($data) {
                        $action = '<a href="'.route('coupon.edit', $data->id).'" style="cursor: pointer" class="dropdown-item"><i class="fas fa-edit text-primary"></i> Edit</a>';
                        $action = '<a href="'.route('coupon.edit', $data->id).'" style="cursor: pointer" class="dropdown-item"><i class="fas fa-edit text-primary"></i> Edit</a>';
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

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'discount' => 'required',
            'validity' => 'required',
        ]);

        Coppon::create([
            'name' => $request->name,
            'discount' => $request->discount,
            'validity' => $request->validity,
        ]);

        return redirect()->back()->with('success', 'Coupon inserted successfully');
    }

    public function edit($id){
        $coupon = Coppon::findOrFail($id);
        return view('backend.coupon.edit', compact('coupon'));
    }


    public function update(Request $request){
        $id = $request->id;
        $request->validate([
            'name' => 'required',
            'discount' => 'required',
            'validity' => 'required',
        ]);

        Coppon::findOrFail($id)->update([
            'name' => $request->name,
            'discount' => $request->discount,
            'validity' => $request->validity,
            'status' => $request->status == 1 ? $request->status : 0,
        ]);

        return redirect()->route('coupon')->with('success', 'Coupon updated successfully');
    }

    public function delete(Request $request){
        $id = $request->id;
        Coppon::findOrFail($id)->delete();
        return response()->json('success');
    }
}
