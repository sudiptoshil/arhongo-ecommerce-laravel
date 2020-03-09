<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class color_size extends Model
{
    protected $table   = 'size_color';
    //protected $fillable=['product_id','size','color','qt'];

    // databse relationship------------
    public function product()
    {
    	return $this->hasmany('App\model\product','id');
    }

    // save size color related--------------
   public static function save_color_size_info($request)
   {
   	    $size_color = new color_size();
    	$size_color->product_id = $request->product_id;
    	$size_color->size       = $request->size;
    	$size_color->color      = $request->color;
    	$size_color->qt         = $request->qt;
    	$size_color->save();
   }


}
