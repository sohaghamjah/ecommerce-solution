<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function index(){
        $admin = Admin::find(1);
        return view('admin.profile.index', compact('admin'));
    }

    public function edit(){
        $admin = Admin::find(1);
        return view('admin.profile.edit', compact('admin'));
    }

    public function update(Request $request){
        $admin = Admin::find(1);

        $admin->name = $request->name;
        $admin->email = $request->email;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            $filename = md5(time().rand()).".".$file->getClientOriginalExtension();
            $file->move(public_path('upload/admin/profile/'), $filename);
            $admin['profile_photo_path'] = $filename;
            unlink("upload/admin/profile/". $request->old_admin_photo);
        }
        $admin -> save();
        return redirect()->route('admin.profile.index')->with("success", "Admin profile updated successfull");
    }

    public function password(){
        return view('admin.profile.password');
    }

    public function passwordUpdate(Request $request){
        $validated = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashPassword = Admin::find(1)->password;
        if(Hash::check($request->oldpassword, $hashPassword)){
            Admin::find(1)->update([
                'password' => Hash::make($request->password),
            ]);
            Auth::logout();
            return redirect()->route('admin.logout');
        }else{
            return redirect()->back();
        }
    }
}
