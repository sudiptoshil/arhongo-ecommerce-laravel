<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;

class orderController extends Controller
{
    public function place_order()
    {   $cart = Cart::content();
        return view('Client.placeorder.placeorder',[
            'cart' => $cart
        ]);
    }
}
