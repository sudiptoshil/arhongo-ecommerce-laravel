<?php

namespace App\Http\Controllers\product_image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\product_image;

class product_imageController extends Controller
{
    
    public function addmoreimage(Request $request)
    {    
         $request->validate([

        'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
         $image =$request->file('image_url');
         $imageName =$image->getClientOriginalName();
         $directory ='product_image/';
         $image->move($directory,$imageName);
         $product_image = new product_image();
         $product_image->image_url        = $directory.$imageName;
         $product_image->product_id       = $request->product_id;
         $product_image->featured_image   = $request->featured_image;
         $product_image->save();

         return redirect('manage-product')->with('message','image saved successfully!!');
    	// return $request->all();
    }

    


}
