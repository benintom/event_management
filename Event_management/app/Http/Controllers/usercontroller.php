<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\support\Facades\Auth;
use DB;
use App\event;
use App\tickettype;
use Carbon\Carbon;

class usercontroller extends Controller
{
    //
     public function index()
    {
        $user=Auth::user();
        return view('user.phome',compact('user'));
    }
    //eventlist
    public function eventviews()
    {
     //$user=Auth::user();
    	 $user=Auth::user();
     $view = DB::table('events')->get();
       return view('user.listevents',compact('view','user'));
    } 

    //single event view
    public function singleviews($id)
    {
     //$user=Auth::user();
      $user=Auth::user();
      $now = Carbon::now()->toDateString();

    	  // don't display tickets which are not available
        $match = [
            ['eventid', '=', $id],
            ['ticketstart', '<=', $now],
            ['ticketend', '>=', $now]
        ];

        // used collect method to be able to sortBy
       $tickets = tickettype::where($match)->orderBy('rate')->get();
        //$tickets = tickettype::findorfail($id);
      $view = event::findorfail($id); 
       return view('user.view',compact('view','user','tickets'));
    } 

    public function tickets($id)

    {

    	$user=Auth::user();
    	        print_r($match) ;die();
    	  // don't display tickets which are not available
        $match = [
            ['eventid', '=', $id],
            ['ticketstart', '<=', $now],
            ['ticketend', '>=', $now]
        ];
       

        // used collect method to be able to sortBy
        $tickets = tickettype::findorfail($id);
      $view = event::findorfail($id); 
       return view('user.buy',compact('view','user','tickets'));

    }
}
