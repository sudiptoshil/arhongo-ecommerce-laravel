<?php

namespace App\Http\Controllers\vendor\product_image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\product_image;
use Session;

class product_imageController extends Controller
{    


    // for security 
  public function authcheck()
  {
    $admin = Session::get('vendorid');
    if ($admin == NULL) {
      return redirect('vendor-login')->send();
    }
  }
     public function vendor_addmoreimage(Request $request)
    {    
         $this->authcheck();
         $image =$request->file('image_url');
         $imageName =$image->getClientOriginalName();
         $directory ='product_image/';
         $image->move($directory,$imageName);
         $product_image = new product_image();
         $product_image->image_url        = $directory.$imageName;
         $product_image->product_id       = $request->product_id;
         $product_image->featured_image   = $request->featured_image;
         $product_image->save();

         return redirect('vendor-manage-product')->with('message','image saved successfully!!');
    	// return $request->all();
    }


}
