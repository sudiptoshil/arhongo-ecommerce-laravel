<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class contactController extends Controller
{
    public function contact_us()
    {
    	return view('Client.Contact.contact');
    }
}
