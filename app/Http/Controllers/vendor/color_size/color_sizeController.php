<?php

namespace App\Http\Controllers\vendor\color_size;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\color_size;

class color_sizeController extends Controller
{


     public function vendor_save_sizecolor(Request $request)
     {
         color_size::save_color_size_info($request);
         return redirect('vendor-manage-product')->with('message','color & size added succesfully!!');
     }
}
