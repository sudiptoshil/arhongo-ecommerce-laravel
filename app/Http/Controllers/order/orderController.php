<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\model\product;
use App\model\order;
use App\model\invoice;
use App\model\vendor;

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
        $cartproduct   = Cart::content();
        foreach($cartproduct as $v_cartpro){
            $pInfo=product::find($v_cartpro->id);

            $invoice =  new invoice();
            $invoice->vendor_id=$pInfo->vendor->id;
            $invoice->order_id = $order->id;
            $invoice->product_id = $v_cartpro->id;
            $invoice->product_unite_price = $v_cartpro->price;
            $invoice->product_quantity = $v_cartpro->qty;
            $invoice->save();   
        }
        Cart::destroy();
        return view('Client.placeorder.confirm_order');
    }
    
}
