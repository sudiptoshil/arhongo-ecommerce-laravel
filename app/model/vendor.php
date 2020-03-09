<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    protected $table    = 'vendor';
    protected $fillable = ['username','password','email','phone','location','email_verification','nid','active'];
   // database relationship----------

     public function product()
     {
        return $this->hasmany('App\model\product','id');
     }

      
      public function brand()
      {
      	return $this->hasmany('App\model\vendorBrand','id');
      }
    
   // end databse relationship-----------

     
}
