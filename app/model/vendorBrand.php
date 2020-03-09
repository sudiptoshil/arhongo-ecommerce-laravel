<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class vendorBrand extends Model
{
	protected $table = "brand_name";

    // public function vendor()
    // {
    // 	return $this->belongsTo('App\model\vendor','vendor_id');
    // }
     public function product()
    {
    	return $this->hasmany('App\model\vendorProduct','id');
    }
}
