<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function productAddToCart(Request $request){
        $id = $request -> id;
        $product = Product::findOrFail($id);

        if($product -> discount_price == NULL){
    		Cart::add([
    			'id' => $id, 
    			'name' => $request->name, 
    			'qty' => $request->qty, 
    			'price' => $product->sale_price,
    			'weight' => 1, 
    			'options' => [
    				'image' => $product->thumbnail,
    				'color' => $request->color,
    				'size' => $request->size,
    			], 
    		]);

            return response() -> json('success');
        }else{
    		Cart::add([
    			'id' => $id, 
    			'name' => $request->name, 
    			'qty' => $request->qty, 
    			'price' => $product->discount_price,
    			'weight' => 1, 
    			'options' => [
    				'image' => $product->thumbnail,
    				'color' => $request->color,
    				'size' => $request->size,
    			], 
    		]);

            return response() -> json('success');
        }
    }

    // Mini Cart show

    public function productMiniCartShow(){
        $total = Cart::total(0);
        $carts = Cart::content();
        $count = Cart::count();

        return response()->json([
            'carts' => $carts,
            'total' => $total,
            'count' => $count,
        ]);
    }

    // Mini cart remove

    public function miniCartRemove(Request $request){
        $rowId = $request->rowId;
        Cart::remove($rowId);

        return response()->json('success');
    }
}
