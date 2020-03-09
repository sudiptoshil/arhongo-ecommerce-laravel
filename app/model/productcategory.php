<?php

namespace App\model;
use Illuminate\Database\Eloquent\Model;
class productcategory extends Model
{   

    public function subcategory()
    {
        return $this->hasmany('App\model\product_subcategory','id');
    }

     public function product()
    {
        return $this->hasmany('App\model\product','id');
    }


    // save category info -------------->
    public static function savecategoryinfo($request)
    {
        $image =$request->file('category_image');
        $imageName =$image->getClientOriginalName();
        $directory ='category_image/';
        $image->move($directory,$imageName);
        $category = new productcategory();
        $category->root_id         = $request->root_id;
        $category->category_name   =$request->category_name;
        $category->category_image  = $directory.$imageName;
        $category->home_page       =$request->home_page;
        $category->save();

    }
    
   //  save category wise category info ---------------->
    public static function savecategory_wise_categoryinfo($request)
    {
        $image =$request->file('category_image');
        $imageName =$image->getClientOriginalName();
        $directory ='category_image/';
        $image->move($directory,$imageName);
        $category = new productcategory();
        $category->root_id         = $request->root_id;
        $category->category_name   = $request->category_name;
        $category->category_image  = $directory.$imageName;
        $category->home_page       = $request->home_page;
        $category->save();

    }
}
