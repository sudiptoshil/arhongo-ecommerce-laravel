<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class product_image extends Model
{
    protected $table    = 'product_image';
    protected $fillable = ['product_id','image_url','featured_image'];

    // detabse relationship--------
    
      public function product()
       {
        return $this->hasmany('App\model\product','id');
       }

        public function vendorproduct()
       {
        return $this->hasmany('App\model\vendorProduct','id');
       }

     
}
