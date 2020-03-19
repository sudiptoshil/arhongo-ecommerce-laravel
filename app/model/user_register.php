<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Session;
use Mail;


class user_register extends Model
{
    protected $fillable =['user_name','password','full_name','email','contact_no','national_id','present_address','permanent_address'];
    protected $table = 'user_registers';

    public static function client_signupinfo($request)
    {
    	$user_register = new user_register();
    	$user_register->user_name         = $request->user_name;
    	$user_register->password          = bcrypt($request->password);
    	$user_register->full_name         = $request->full_name;
    	$user_register->email             = $request->email;
    	$user_register->contact_no        = $request->contact_no;
    	$user_register->national_id       = $request->national_id;
    	$user_register->present_address   = $request->present_address;
    	$user_register->permanent_address = $request->permanent_address;
    	$user_register->save();
    	session::put('client_id',$user_register->id);
		session::put('client_name',$user_register->full_name);

		// $data = $user_register->toArray();
        // Mail::send('Client.mail.congratulation_mail',$data,function($message) use($data){
		// 	$message->to($data['email']);
		// 	$message->subject('congratulation mail!!');
        // });
    }


   }
