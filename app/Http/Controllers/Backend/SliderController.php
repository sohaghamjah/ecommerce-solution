<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function index(){
        return view('backend.slider.index');
    }

    public function getSliderData(Request $request){
        $slider = Slider::latest()->get();
        if($request->ajax()){
            return Datatables::of($slider)
                    ->addIndexColumn()
                    ->editColumn('image', function ($slider) {
                        if ($slider->image != null) {
                            $html = '<img src="' . asset($slider->image) . '" height="45px" width="60px">';
                        } else {
                            $html = '<img src="' . asset('upload/admin/no_image.jpg') . '" height="45px" width="60px">';
                        }
                        return $html;
                    })    
                    ->editColumn('status', function ($data) {
                        if ($data->status == 1) {
                            return '<span class="badge badge badge-success">Active</span>';
                        } else {
                            return '<span class="badge badge badge-danger">Inactive</span>';
                        }
                    })             
                    ->rawColumns(['image', 'action', 'status'])
                    ->addColumn('action', function ($slider) {
                        $action = '<a href="'.route('slider.edit', $slider->id).'" style="cursor: pointer" class="dropdown-item"><i class="fas fa-edit text-primary"></i> Edit</a>';
                        if($slider->status == 1){
                            $action .= '<a href="'.route('slider.inactive', $slider->id).'" style="cursor: pointer" class="dropdown-item"><i class="fas fa-chevron-down text-primary"></i> Inactive</a>';
                        }else{
                            $action .= '<a href="'.route('slider.active', $slider->id).'" style="cursor: pointer" class="dropdown-item"><i class="fas fa-chevron-up text-primary"></i> Active</a>';
                        }
                        $action .= '<a data-id="'.$slider->id.'" style="cursor: pointer" class="dropdown-item delete-data"><i class="fas fa-trash text-primary"></i> Delete</a>';

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
            'image' => 'required',
        ]);

        $file = $request->file('image');
        $image_name = md5(time().rand()).'.'.$file->getClientOriginalExtension();
        Image::make($file)->resize(870,370)->save('upload/admin/slider/'.$image_name);
        $image_url = 'upload/admin/slider/'.$image_name;

        Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image_url,
        ]);

        return redirect()->back()->with('success', 'Slider inserted successfully');

    }

    public function edit($id){
        $slider = Slider::findOrFail($id);
        return view('backend.slider.edit', compact('slider'));
    }

    public function update(Request $request){

        $id = $request->id;

        if($request->file('image')){

            $file = $request->file('image');
            $image_name = md5(time().rand()).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(870,370)->save('upload/admin/slider/'.$image_name);
            $image_url = 'upload/admin/slider/'.$image_name;
            unlink($request->slider_old_image);

            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $image_url,
            ]);
    
            return redirect()->route('slider')->with('success', 'Slider updated successfully');
        }else{

            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
    
            return redirect()->route('slider')->with('success', 'Slider updated successfully');
        }

    }

    public function inactive($id){
        Slider::findOrFail($id)->update([
            'status' => 0,
        ]);
        return redirect()->back()->with('success','Slider inactivate successfull');
    }

    public function active($id){
        Slider::findOrFail($id)->update([
            'status' => 1,
        ]);
        return redirect()->back()->with('success','Slider activate successfull');
    }

    public function delete(Request $request){
        $id = $request->id;
        $slider = Slider::findOrFail($id);
        $img = $slider->image;
        unlink($img);  
        $slider->delete();
        return response()->json('success');
    }
}
