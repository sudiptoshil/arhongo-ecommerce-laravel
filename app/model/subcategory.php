<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;


class subcategory extends Model
{
    public function category()
    {
        return $this->belongsTo('App\model\category');
    }


    // save subcategory related---------
    public static function save_sub_category($request)
    {
        $image =$request->file('sub_category_image');
        $imageName =$image->getClientOriginalName();
        $directory ='sub_category_image/';
        $image->move($directory,$imageName);
        $subcategory = new subcategory();
        $subcategory->category_id        = $request->category_id;
        $subcategory->sub_category_name  = $request->sub_category_name;
        $subcategory->publication_status = $request->publication_status;
        $subcategory->sub_category_image  = $directory.$imageName;
        $subcategory->save();
    }

    
}
