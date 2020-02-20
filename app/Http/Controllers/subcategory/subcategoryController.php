<?php

namespace App\Http\Controllers\subcategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\category;
use App\model\subcategory;

class subcategoryController extends Controller
{   

    public function add_sub_category()
    {   
        $category = category::where('publication_status',1)->get();
        return view('Admin.subcategory.add_sub_category',[
           
            'category' => $category
        ]);
    }

    public function save_sub_category(Request $request)
    {
        subcategory::save_sub_category($request);
        return redirect('add-sub-category')->with('messsage','sub category saved successfully!!');
        

    }

    public function manage_sub_category()
    {  $subcategory = subcategory::with('category')->get();
        return view('Admin.subcategory.manage_sub_category',[
            "subcategory" => $subcategory
        ]);
    }

    



  


}
