<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\product;
use App\model\productcategory;
use App\model\vendor;
use App\model\brand;
use App\model\type;
use App\model\color_size;
use App\model\product_image;

class productController extends Controller
{
    

    public function manage_product()
    {    
    	$product = product::all();
    	 return view('Admin.product.manage_product',[
    	 	'product' => $product
    	 ]);

    }

    public function add_product()
    {   
    	$productCategory = productcategory::where('root_id',0)->get();
    	$brands          = brand::all();
    	$vendors         = vendor::all();
        $types           = type::all();

    	return view('Admin.product.add_product',[
    		'productCategory' => $productCategory,
    		'brands'          => $brands,
    		'vendors'         => $vendors,
            'types'            => $types
    	]);
    }

    public function save_product(Request $request)
    {
             // return $request->all();
             product::addproductinfo($request);
         return redirect('add-product')->with('message','product saved successfully!!');

    }

    public function product_details($id)
    {   
        $products  = product::find($id);
        $size      = $products->color_size;
        $pro_image = $products->productimage;

        return view('Admin.product.product_details')
            ->with("products",$products)
            ->with("size_list",$size)
            ->with("pro_img",$pro_image);
    }

    public function edit_product($id)
    {
        $product = product::find($id);
        $productCategory = productcategory::where('root_id',0)->get();
        $brands          = brand::all();
        $vendors         = vendor::all();
        $types           = type::all();
        return view('Admin.product.edit_product',[
            'product'         => $product,
            'productCategory' => $productCategory,
            'brands'          => $brands,
            'vendors'         => $vendors,
            'types'           => $types
        ]);
    }


    public function update_product(Request $request)
    {
        product::update_product_info($request);
        return redirect('manage-product')->with('message','product updated successfully!!');
    }


    //   public function product_image()
    // {
    //    $pro   = product::with('productimage')->get();
    //    return $pro;
    // }

}
