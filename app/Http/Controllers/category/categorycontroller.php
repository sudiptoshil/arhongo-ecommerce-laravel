<?php

namespace App\Http\Controllers\category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\category;
use App\model\subcategory;

class categorycontroller extends Controller
{   

    public function add_category()
    {
        return view('Admin.category.add_category');
    }



    public function save_category(Request $request)
    {
        //  return $request->all();
        category::save_category_info($request);
         return redirect('add-category')->with('message','category saved successfully!!');
     }
   


    public function manage_category()
    {   
        $categories = category::all();
        return view('Admin.category.manage_category',[
            'categories' => $categories
        ]);
    }

    public function details_category($id)
    {
        return view('Admin.category.category_details',[
             'category'      => category::find($id),
            //  'category'      => category::where('publication_status',1);
             'subcategories' => subcategory::where('category_id',$id)->get()
        ]);
    }

    public function edit_category($id)
    {   $category  = category::find($id);
        return view('Admin.category.edit_category',[

            'category' => $category
        ]);
    }

    public function update_category(Request $request)
    {   
        category::update_categoryinfo($request);
        return redirect('manage-category')->with('message','category updated successfully!!');

    }

    // public function category_wise_subcategory($id)
    // {
    //     return view('Admin.category.category_wise_subcategory');
    // }
}
