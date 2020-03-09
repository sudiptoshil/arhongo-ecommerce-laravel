<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $table = 'brand_name';

    // database relationship-------------
    public function product()
    {
    	return $this->hasmany('App\model\product','id');
    }
    // end databse relationship-----------
}
