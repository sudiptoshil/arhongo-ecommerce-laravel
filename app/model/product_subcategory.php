<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class product_subcategory extends Model
{
    protected $table = 'product_subcategory';
    protected $fillable=['category_id','subcategory_name','sub_cat_image'];


    // databse relationship---------

    public function category()
    {
        return $this->belongsTo('App\model\productcategory');
    }
    
     // public function product()
     //  {
     //    return $this->hasmany('App\model\product','id');
     //  }
    // save sub category related--------------
    
    public static function save_sub_category_info($request)
    {
        $image     =$request->file('sub_cat_image');
        $imageName =$image->getClientOriginalName();
        $directory ='sub_category_image/';
        $image->move($directory,$imageName);
        $subcategory = new product_subcategory();
        $subcategory->category_id         = $request->category_id;
        $subcategory->subcategory_name    = $request->subcategory_name;
        $subcategory->sub_cat_image       = $directory.$imageName;
        $subcategory->save();
    }

    // update sub category related-------
    public static function update_sub_categoryinfo($request) 
    {
        $sub_cat_image = $request->file('sub_cat_image');
        if ($sub_cat_image) 
        {
            $subcategory = product_subcategory::find($request->id);
            unlink($subcategory->sub_cat_image);
            $imageName = $sub_cat_image->getClientOriginalName();
            $directory ='sub_cat_image/';
            $sub_cat_image->move($directory,$imageName);
            $subcategory->sub_cat_image        = $directory.$imageName;
            $subcategory->category_id          = $request->category_id;
            $subcategory->subcategory_name     = $request->subcategory_name;
            $subcategory->save();
           
        }
        
        else
        {    
            $subcategory = product_subcategory::find($request->id);
            $subcategory->category_id        = $request->category_id;
            $subcategory->subcategory_name   = $request->subcategory_name;
            $subcategory->save();
        }
    }


}
