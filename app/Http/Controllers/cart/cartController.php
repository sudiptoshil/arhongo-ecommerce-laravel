<?php

namespace App\Http\Controllers\cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\product;
use Cart;

class cartController extends Controller
{
    public function add_to_cart(Request $request)
    {
    	$product = product::find($request->product_id);
    	$cart = Cart::add(['id' => $product->id, 'name' => $product->product_name, 'qty' => 1, 'price' => $product->display_price, 'weight' => 550]);
    	
    	return Cart::content();
    	// return $cart;
    // return $request->all();
     }

     public function delete_cart()
     {  
        $id  = $_GET["id"];
        //$list=Cart::content();
        //print_r($list);
        $deleteCart = Cart::remove($id);
        $list=Cart::content();
        return $list;
    }

    public function update_cart(Request $request)
    {  
        Cart::update($request->rowId , $request->qty);
    }
}
