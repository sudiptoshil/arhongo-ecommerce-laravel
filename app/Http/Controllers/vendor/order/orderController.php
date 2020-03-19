<?php

namespace App\Http\Controllers\vendor\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\model\invoice;
use App\model\order;

class orderController extends Controller
{
    public function manage_order()
    {   
        $vid = Session::get('vendorid');
        $orders = DB::table('invoice') 
                ->join('orders', 'invoice.order_id', '=', 'orders.id')
                ->join('user_registers', 'orders.customer_id', '=', 'user_registers.id')
                ->join('product', 'invoice.product_id', '=', 'product.id')
                ->join('vendor', 'invoice.vendor_id', '=', 'vendor.id')
                ->select('invoice.*', 'orders.id', 'user_registers.full_name','product.product_name','orders.payment_method','orders.delivery_location','vendor.id')
                ->where('invoice.vendor_id',"=",$vid)
                ->get();
        // $vid = Session::get('vendorid');
        // $vendor_orders = invoice::where('vendor_id',"=",$vid)->get();

        return view('vendor.order.manage_order',[
             'orders' => $orders,
            //  'vendor_orders' => $vendor_orders
        ]);
    }

    public function acceptedorder()
    {
        
    }
}
