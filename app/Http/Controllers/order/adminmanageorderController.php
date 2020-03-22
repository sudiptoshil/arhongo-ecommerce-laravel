<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;

class adminmanageorderController extends Controller
{
    

    public function admin_manage_order()
    {   
        
        $orders = DB::table('invoice') 
                ->join('orders', 'invoice.order_id', '=', 'orders.id')
                ->join('user_registers', 'orders.customer_id', '=', 'user_registers.id')
                ->join('product', 'invoice.product_id', '=', 'product.id')
                ->join('vendor', 'invoice.vendor_id', '=', 'vendor.id')
                ->select('invoice.*', 'orders.id', 'user_registers.full_name','product.product_name','orders.payment_method','orders.delivery_location','vendor.username','orders.status')
                // ->where('invoice.vendor_id',"=",$vid)
                ->get();
        // $vid = Session::get('vendorid');
        // $vendor_orders = invoice::where('vendor_id',"=",$vid)->get();

       
        return view('Admin.order.manage_order',[
            'orders'=> $orders
        ]);
    }


    public function admin_manage_order_details($id)
    {   
        //  $vid = Session::get('vendorid');
        //  $cid = Session::get('client_id');
        $orders = DB::table('invoice') 
                ->join('orders', 'invoice.order_id', '=', 'orders.id')
                ->join('user_registers', 'orders.customer_id', '=', 'user_registers.id')
                ->join('product', 'invoice.product_id', '=', 'product.id')
                ->join('vendor', 'invoice.vendor_id', '=', 'vendor.id')
                ->select('invoice.*', 'orders.id', 'user_registers.full_name','product.product_name','orders.payment_method','orders.delivery_location','vendor.username','orders.status')
                ->where('invoice.order_id',$id)
                ->get();

        // echo "</pre>";
        // print_r($orders);
        // exit();

        return view('Admin.order.manage_order_details',[
            'orders' => $orders
        ]);
        // return $id;
    }


    public function admin_accept_order($id)
    {
        DB::table('orders')
        ->where('id', $id)
        ->update(['status'=> 4]);
         return back();
        // return $id;
        
    }

    public function admin_cancel_order($id)
    {
        DB::table('orders')
        ->where('id', $id)
        ->update(['status' => 3]);
         return back();
    }
}
