<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Image;

class product extends Model
{
    protected $table    = 'product';
    protected $fillable = ['type_id','category_id','subcategory_id','brand_id','vendor_id','product_name','product_description','display_price','sell_unit','product_quantity','discount','sc','currency','sell_status','status','img'];

    // database relationship-----------
    public function vendor()
    {
    	return $this->belongsTo('App\model\vendor');
    }

    public function category()
    {
    	return $this->belongsTo('App\model\productcategory');
    }
    public function subcategory()
    {
        return $this->belongsTo('App\model\product_subcategory');
    }

    public function brand()
    {
    	return $this->belongsTo('App\model\brand');
    }
    public function type()
    {
        return $this->belongsTo('App\model\type');
    }

    public function color_size()
    {
        return $this->hasMany('App\model\color_size',"product_id");
    }

     public function productimage()
     {
        return $this->hasMany('App\model\product_image',"product_id");
     }
     

    // end databse relationship-----------

    // product save related-----------------

    public static function addproductinfo($request)
    {      
             $request->validate([

            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
             $image     =$request->file('product_image');
             $imageName =$image->getClientOriginalName();
             $directory ='product_image/';
             // $image->move($directory,$imageName);
             $img = Image::make($image)->save($directory.$imageName)->resize(50, 50);
             $product   = new product();
             $product->type_id                = $request->type_id;
             $product->category_id            = $request->category_id;
             $product->img                    = $directory.$imageName;
             if ($request->cat_level_three) {
                $product->subcategory_id      = $request->cat_level_three;
             }
             elseif ($request->cat_level_two) {
                $product->subcategory_id      = $request->cat_level_two;
             }
             else {
                $product->subcategory_id      = $request->cat_level_one;
             }

             $product->brand_id               = $request->brand_id;
             $product->type_id                = $request->type_id;
             $product->vendor_id              = $request->vendor_id;
             $product->product_name           = $request->product_name;
             $product->product_description    = $request->product_description;
             $product->display_price          = $request->display_price;
             $product->sell_unit              = $request->sell_unit;
             $product->product_quantity       = $request->product_quantity;
             $product->discount               = $request->discount;
             $product->currency               = $request->currency;
             $product->sell_status            = $request->sell_status;
             $product->status                 = $request->status;
             $product->save();
    }


    // product update related--------------------
    public static function update_product_info($request)
    {
         $product = product::find($request->id);
             $product->type_id                = $request->type_id;
             $product->category_id            = $request->category_id;
             if ($request->cat_level_one) {
                $product->subcategory_id      = $request->cat_level_one;
             }
             elseif ($request->cat_level_two) {
                $product->subcategory_id      = $request->cat_level_two;
             }
             else {
                $product->subcategory_id      = $request->cat_level_three;
             }

             $product->brand_id               = $request->brand_id;
             $product->type_id                = $request->type_id;
             $product->vendor_id              = $request->vendor_id;
             $product->product_name           = $request->product_name;
             $product->product_description    = $request->product_description;
             $product->display_price          = $request->display_price;
             $product->sell_unit              = $request->sell_unit;
             $product->product_quantity       = $request->product_quantity;
             $product->discount               = $request->discount;
             $product->currency               = $request->currency;
             $product->sell_status            = $request->sell_status;
             $product->status                 = $request->status;
             $product->save();
    }





}
