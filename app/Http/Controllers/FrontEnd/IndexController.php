<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
        $categories = Category::orderBy('name_en', 'ASC')->get();
        $categories2 = Category::orderBy('name_en', 'ASC')->limit(6)->get();
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $allproducts = Product::where('status', 1)->orderBy('id', 'DESC')->limit(10)->get();
        $featured = Product::where(['status' => 1, 'featured' => 1])->orderBy('id', 'DESC')->limit(10)->get();
        $hot_deals = Product::where(['status' => 1, 'hot_deals' => 1])->where('discount_price','!=', NULL)->orderBy('id', 'DESC')->limit(10)->get();
        $special_offer = Product::where(['status' => 1, 'special_offer' => 1])->orderBy('id', 'DESC')->limit(5)->get();
        $special_deals = Product::where(['status' => 1, 'special_deals' => 1])->orderBy('id', 'DESC')->limit(5)->get();
        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where(['status' => 1, 'category_id' => $skip_category_0->id])->orderBy('id', 'DESC')->limit(10)->get();
        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where(['status' => 1, 'category_id' => $skip_category_1->id])->orderBy('id', 'DESC')->limit(10)->get();
        $skip_brand_0 = Brand::skip(0)->first();
        $skip_brand_product_0 = Product::where(['status' => 1, 'brand_id' => $skip_brand_0->id])->orderBy('id', 'DESC')->limit(10)->get();
        return view('frontend.index', compact('categories','sliders','categories2','allproducts','featured','hot_deals','special_offer','special_deals','skip_product_0','skip_category_0','skip_category_1','skip_product_1','skip_brand_0','skip_brand_product_0'));
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

    // Single Page

    public function productSinglePage($id, $slug){
        $product = Product::findOrFail($id);
        $images = ProductImage::where('product_id', $id)->get();
        return view('frontend.single', compact('product','images'));
    }

    // Tag wise product show

    public function tagWiseProductShow($tag){
        $products = Product::where('status', 1)->where('tag_en', $tag)->orWhere('tag_bn', $tag)->orderBy('id', 'DESC')->get();
        $categories = Category::orderBy('name_en', 'ASC')->get();
        return view('frontend.tags.index', compact('products','tag','categories'));
    }
}
