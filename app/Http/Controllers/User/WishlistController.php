<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class WishlistController extends Controller
{

    public function index(){
        return view('frontend.wishlist.index');
    }

    public function getWishListData(Request $request){
        if(Auth::check()){
            $data = Wishlist::with('product')->where('user_id', Auth::user()->id)->latest()->get();
            return response()->json($data);
        }
    }

    public function store(Request $request){
        $product_id = $request->id;
        if(Auth::check()){
            $exists = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $product_id)->first();
            if(!$exists){
                Wishlist::create([
                    'product_id' => $product_id,
                    'user_id' => Auth::user()->id,
                ]);
                return response()->json(['success' => 'Product added to wishlist succesfully']);
            }else{
                return response()->json(['error' => 'Product already exists on wishlist']);
            }
        }else{
            return response()->json(['error' => 'First login your account']);
        }
    }

    public function remove(Request $request){
        if(Auth::check()){
            Wishlist::where('user_id', Auth::user()->id)->where('id', $request->id)->delete();
            return response()->json('success');
        }
    }
}
