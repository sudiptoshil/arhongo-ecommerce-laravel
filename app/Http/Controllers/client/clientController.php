<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Slider;
use App\model\productcategory;
use App\model\product;

class clientController extends Controller
{
    public function index()
    {   

    	$slider          = Slider::where('status',1)->get();
    	$productcategory = productcategory::all();
    	$product         = product::all()->take(10);      
    	return view('Client.Home.home',[
    		'slider'          => $slider,
    		'productcategory' => $productcategory,
    		'product'         => $product
    		
    	]);
    }


    public function category_product($id)
    {   
        $products  = product::where('category_id',$id)->get();
        return view('Client.categoryProduct.categoryproduct',[
           'products'  => $products

        ]);
    }

    public function sab_category_product($id)
    {   
        $products  = product::where('subcategory_id',$id)->get();
        return view('Client.categoryProduct.categoryproduct',[
            'products'  => $products

        ]);
    }

    


}
