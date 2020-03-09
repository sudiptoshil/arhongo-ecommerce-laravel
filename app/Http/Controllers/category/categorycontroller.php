<?php

namespace App\Http\Controllers\category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\productcategory;
class categorycontroller extends Controller
{   

  public function manage_category(Request $req)
  {  
      $productcategory = productcategory::where('root_id',0)->get();
      return view('Admin.category.manage_category',[
        'productcategory' => $productcategory
      ]);
  }

  public function add_category()
  {
      return view('Admin.category.add_category');
  }

  public function save_category(Request $request)
  {
        productcategory::savecategoryinfo($request);
        return redirect('add-category')->with('message','category saved successfully!!');

  }

  public function manage_category_wise_category($id)
  {
        $category   = productcategory::find($id);
        $categories = productcategory::where('root_id',$id)->get();
        return view('Admin.category.manage_categorywise_category',[
            'category'  => $category,
            'categories'=> $categories
        ]);
  }

  public function add_categorywise_category($id)
  {     
        $category = productcategory::find($id);
        return view('Admin.category.add_category_wise_category',[
            'category' => $category
        ]);
  }


  public function save_categorywise_category(Request $request)
  {
       productcategory::savecategory_wise_categoryinfo($request);
        return redirect('manage-category')->with('message','category saved successfully!!');
  }



}
