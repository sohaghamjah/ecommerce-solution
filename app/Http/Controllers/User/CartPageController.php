<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartPageController extends Controller
{
    public function index(){
        $total = Cart::total(0);
        $count = Cart::count();
        return view('frontend.cartpage.index', compact('total', 'count'));
    }

    public function getCartPagetData(){
        $carts = Cart::content();
        $total = Cart::total();
        $count = Cart::count();

        return response()->json([
            'carts' => $carts,
            'total' => $total,
            'count' => $count,
        ]);
    }

    public function cartPageRemove(Request $request){
        $rowId = $request->id;
        Cart::remove($rowId);
        return response()->json('success');
    }

    public function cartPageIncrement(Request $request){
        $id = $request->id;
        $row = Cart::get($id);
        Cart::update($id, $row->qty + 1);

        return response()->json('success');
    }

    public function cartPageDecrement(Request $request){
        $id = $request->id;
        $row = Cart::get($id);
        Cart::update($id, $row->qty - 1);

        return response()->json('success');
    }
}
