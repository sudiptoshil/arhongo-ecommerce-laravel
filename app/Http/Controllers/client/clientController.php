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
        $categoryroot    = productcategory::where('home_page',1)->orderBy('id','desc')->take(3)->get();
    	$product         = product::all()->take(20);      
    	return view('Client.Home.home',[
    		'slider'          => $slider,
    		'productcategory' => $productcategory,
            'product'         => $product,
            'categoryroot'    => $categoryroot
    		
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
            'products'  => $products,
            

        ]);
    }

    public function productdetails($id)
    {   $product = product::find($id);
        return view('Client.product_details.product_details',[
            'product' => $product
        ]);
    }

    


}
