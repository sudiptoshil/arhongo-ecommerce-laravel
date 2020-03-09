<?php

namespace App\Http\Controllers\type;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\type;

class typeController extends Controller
{
    

    public function manage_type()
    {   $type = type::all();
    	return view('Admin.types.manage_type',[
    	'type' => $type 
    	]);
    }

    public function add_type()
    {
    	return view('Admin.types.add_type');
    }

    public function save_type(Request $request)
    {
    	type::savetypeinfo($request);
    	return redirect('add-type')->with('message','type saved successfully!!');
    }

    public function type_details($id)
    {   $type = type::find($id);
    	return view('Admin.types.type_details',[
    		'type' => $type
    	]);
    }

    public function edit_type($id)
    {   
    	$type = type::find($id);
    	return view('Admin.types.type_edit',[
    		'type'=> $type
    	]);
    }

    public function update_type(Request $request)
    {
    	type::updatetypeinfo($request);
    	return redirect('manage-type')->with('message','type updated successfully!!');
    }
}
