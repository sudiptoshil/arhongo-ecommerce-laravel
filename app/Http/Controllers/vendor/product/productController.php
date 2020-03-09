<?php

namespace App\Http\Controllers\Vendor\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\vendorBrand;
use App\model\type;
use App\model\productcategory;
use App\model\product_image;
use App\model\vendorProduct;
use App\model\product;
use Session;


class productController extends Controller
{
    

      // for security 
      public function authcheck()
      {
        $admin = Session::get('vendorid');
        if ($admin == NULL) {
          return redirect('vendor-login')->send();
        }
      }

  //----------------------------------------------------------------------- 
    public function vendor_manage_product()
    {   
        $this->authcheck();

        $vid            = Session::get('vendorid');
        $vendor_product = vendorProduct::where('vendor_id',"=",$vid)->get();
    	return view('Vendor.Product.vendor_manage_product',[
            'vendor_product' => $vendor_product

        ]);
    }

    public function vendor_add_product()
    {   
        $this->authcheck();
        $productCategory = productcategory::where('root_id',0)->get();
        $vid             = Session::get('vendorid');
        $vendor_brand    = vendorBrand::where('vendor_id',"=",$vid)->get();
        $types           = type::all();
    	return view('Vendor.Product.vendor_add_product',[
    	     'productCategory' => $productCategory,
    	     'vendor_brand'	   => $vendor_brand,
    	     'types'           => $types
    	]);
    }

    public function vendor_save_product(Request $request)
    {       
        $this->authcheck();
         vendorProduct::vendor_save_product_info($request);
         return redirect('vendor-add-product')->with('message','vendor product saved successfully!!');
    }

    public function vendor_details_product($id)
    {   
        $this->authcheck();
        $product       = vendorProduct::find($id);
        $size          = $product->color_size;
        $productimg    = $product->productimage;

        // echo "<pre>";
        // print_r($productimg);
        // exit();
        
        return view('Vendor.Product.vendor_details_product')
            ->with("product",$product)
            ->with("size_list",$size)
            ->with("pro_image",$productimg);
            
    }


    public function product_image()
    {
       $pro   = vendorProduct::with('productimage')->get();
       return $pro;
    }

    

    public function vendor_edit_product($id)
    {   
        $this->authcheck();
        $product         = vendorProduct::find($id);
        $productCategory = productcategory::where('root_id',0)->get();
        $vid             = Session::get('vendorid');
        $vendor_brand    = vendorBrand::where('vendor_id',"=",$vid)->get();
        $types           = type::all();
        return view('Vendor.Product.vendor_edit_product',[
            'product'         => $product,
            'productCategory' => $productCategory,
            'vendor_brand'    => $vendor_brand,
            'types'           => $types
        ]);
    }

    public function vendor_update_product(Request $request)
    {   
        $this->authcheck();
        vendorProduct::vendor_update_product_info($request);
        return redirect('vendor-manage-product')->with('message','product updated successfully!!');
    }

    
}
