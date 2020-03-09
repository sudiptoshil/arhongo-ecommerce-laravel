<?php

namespace App\Http\Controllers\subcategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\productcategory;
use App\model\product_subcategory;

class subcategoryController extends Controller
{   

    public function add_sub_category()
    {   
        $category = productcategory::all();
        return view('Admin.subcategory.add_sub_category',[
           
            'category' => $category
        ]);
    }

    public function save_sub_category(Request $request)
    {
        product_subcategory::save_sub_category_info($request);
        return redirect('add-sub-category')->with('messsage','sub category saved successfully!!');
        

    }

    public function manage_sub_category()
    {  $subcategory = product_subcategory::with('category')->get();
        return view('Admin.subcategory.manage_sub_category',[
            "subcategory" => $subcategory
        ]);
    }

    public function details_sub_category($id)
    {   
        $subcategory = product_subcategory::find($id);
        return view('Admin.subcategory.subcategory_details',[
            'subcategory' => $subcategory
        ]);
    }

    public function edit_sub_category($id)
    {   
        $category    = productcategory::all();
        $subcategory = product_subcategory::find($id);
        return view('Admin.subcategory.subcategory_edit',[
             'category'    => $category,
             'subcategory' => $subcategory
        ]);
    }

    public function update_sub_category(Request $request)
    {   
        product_subcategory::update_sub_categoryinfo($request);
        return redirect('manage-sub-category')->with('messsage','sub category updated successfully!!');
    }

    



  


}
