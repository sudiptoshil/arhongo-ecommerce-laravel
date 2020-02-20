<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
   protected $fillable=['category_name','publication_status','category_image'];

// eloquent relationship--------------
   public function subcategory()
   {
    return $this->hasmany("App\model\subcategory",'id');
   }

   
//    save category related------------
    public static function save_category_info($request)
    {
        $image =$request->file('category_image');
         $imageName =$image->getClientOriginalName();
         $directory ='category_image/';
         $image->move($directory,$imageName);
         $category = new category();
         $category->category_name =$request->category_name;
         $category->category_image = $directory.$imageName;
         $category->publication_status =$request->publication_status;
         $category->save();
    }


   //  update category related---------
   public static function update_categoryinfo($request)
   {
      $catgory_image =$request->file('catgory_image');
        if ($catgory_image) 
        {
            $category = category::find($request->id);
            unlink($category->catgory_image);
            $imageName =$catgory_image->getClientOriginalName();
            $directory ='category_image/';
            $catgory_image->move($directory,$imageName);
            $category->category_image      = $directory.$imageName;
            $category->publication_status  = $request->publication_status;
            $category->save();
           
        } else
        {    
            $category = category::find($request->id);
            $category->category_name       = $request->category_name;
            $category->publication_status  = $request->publication_status;
            $category->save();

           
        }
   }

}
