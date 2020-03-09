<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\vendor;
use Session;
use DB;
class vendorController extends Controller
{  

    // for security 
  public function authcheck()
  {
    $admin = Session::get('vendorid');
    if ($admin == NULL) {
      return redirect('vendor-login')->send();
    }
  }
   
  public function vendor_login()
  {
  	return view('Vendor.Vendor_Auth.vendor_login');
  }

  public function vendor_signup()
  {
  	return view('Vendor.Vendor_Auth.vendor_signup');
  }

  public function vendor_new_signup(Request $request)
  {
  	$vendor  = new vendor();
  	$vendor->username = $request->username;
  	$vendor->password = bcrypt($request->password);
  	$vendor->phone    = $request->phone;
  	$vendor->email    = $request->email;
  	$vendor->location = $request->location;
  	$vendor->active   = $request->active;
  	$vendor->nid      = $request->nid;
  	$vendor->save();

  	Session::put('vendorid',$vendor->id);
  	Session::put('username',$vendor->username);

  	return redirect('vendor-dashboard')->with('message','vendor account created successfully!!');

  }

  public function vendor_new_login(Request $request)
  {
    $vendor = vendor::where('email', $request->email)->first(); 
    if ($vendor) {

    if (password_verify($request->password, $vendor->password)) {
        Session::put("vendorid",$vendor->id);
        Session::put("username",$vendor->username);

     return redirect("vendor-dashboard");
      
    }

   else {
   return redirect("/vendor-login")->with("message","password not valid!!");
       } 
    }
   else{
       return redirect("/vendor-login")->with("message","email not valid!!");
     }

  }


  public function vendor_dashboard()
  { 
    $this->authcheck();
  	return view('Vendor.home.vendor_home');
  }




  public function vendor_logout()
  {
  	Session::forget('username');
  	Session::forget('vendorid');
  	return redirect('vendor-login')->with('message','you are successfully logout!!');
  }

}
