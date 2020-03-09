<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class type extends Model
{
     protected $table = 'product_type';
     protected $fillable=['type_name'];

     // database relationship--------

      public function product()
      {
        return $this->hasmany('App\model\product','id');
      }


     // end database relationship-------

     // save type related---------------

     public static function savetypeinfo($request)
     {
     	$type = new type();
    	$type->type_name = $request->type_name;
    	$type->save();
     }

     // update type related-------------

     public static function updatetypeinfo($request)
     {  
     	$type = type::find($request->id);
    	$type->type_name = $request->type_name;
    	$type->save();
     }
}
