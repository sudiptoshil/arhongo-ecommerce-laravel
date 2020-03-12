<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\model\product;
use App\model\order;
use Session;

class orderController extends Controller
{
    public function place_order()
    {   
        $cart = Cart::content();
        return view('Client.placeorder.placeorder',[
            'cart' => $cart,
        ]);
    }

    public function confirm_order(Request $request)
    {  
        $order = new order();
        $order->payment_method    = $request->payment_method;
        $order->customer_id       = Session::get('client_id');
        $order->total_cost        = Session::get('orderTotal');
        $order->delivery_location = $request->shipping_address;
        $order->coupon            = $request->coupon;
        $order->transaction_id    = $request->transaction_id;
        $order->status            = $request->status;
        $order->save();
        // $cartproduct   = Cart::content();
        Cart::destroy();
        return view('Client.placeorder.confirm_order');
    }
}
