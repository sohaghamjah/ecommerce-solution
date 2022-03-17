<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
        return view('frontend.index');
    }
    public function userDashboard(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.dashboard',compact('user'));
    }
    public function userLogout(){
        Auth::logout();
        return redirect()->route('login')->with('success','You are logging out');
    }

    public function userProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.profile-update', compact('user'));
    }

    public function userProfileStore(Request $request){
        $id = Auth::user()->id;

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $user = User::find($id);

        $user -> name = $request->name;
        $user -> email = $request->email;
        $user -> phone = $request->phone;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            $filename = md5(time().rand()).".".$file->getClientOriginalExtension();
            $file->move(public_path('upload/user/profile/'), $filename);
            $user['profile_photo_path'] = $filename;
            if($request->old_photo){
                unlink("upload/user/profile/". $request->old_photo); 
            }
        }

        $user->save();

        return redirect()->route('dashboard')->with('success','Profile updated successfull');

    }

    public function userPassword(){
        $user = User::find(Auth::user()->id);
        return view('frontend.profile.password', compact('user'));
    }

    public function userPasswordUpdate(Request $request){
        $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hash_password = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hash_password)){
            User::find(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);
            Auth::logout();
            return redirect()->route('login')->with('success','Your password updated successfull');
        }else{
            return redirect()->back();
        }
    }
}
