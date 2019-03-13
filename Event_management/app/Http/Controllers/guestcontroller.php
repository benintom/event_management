<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\event;
use DB;
use illuminate\support\Facades\Auth;

class guestcontroller extends Controller
{
    //
  public function eventviews()
    {
     //$user=Auth::user();
     $view = DB::table('events')->get();
       return view('Guest.guest',compact('view'));
    } 
}
