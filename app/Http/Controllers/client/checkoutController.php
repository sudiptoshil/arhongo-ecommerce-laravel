<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\user_register;
use Session;
use Redirect;

class checkoutController extends Controller
{
   
   public function client_signup(Request $request)
   {
   	   user_register::client_signupinfo($request);
   	   return Redirect::to('/');

   }

   public function logout()
   {  
   	  Session::forget('client_id');
      Session::forget('client_name');
   	  return redirect('/');
   } 

   public function client_login(Request $request)
   {
   	 $user_register = user_register::where('email',$request->email)->first();
   	 if ($user_register) {
   	 	if (password_verify($request->password, $user_register->password)) {
		    Session::put('client_id',$user_register->id);
		    Session::put('client_name',$user_register->full_name);
		    return redirect('/');
		} else {
		    return redirect('/')->with('message','password invalid!!');
		}
   	 }
   	 else {
       return redirect('/')->with('message','invalid email!!');
   	 }

   }
}
