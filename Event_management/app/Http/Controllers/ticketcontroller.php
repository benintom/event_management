<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\user;
use App\event;
use App\tickettype;

use DB;

class ticketcontroller extends Controller
{
    //

    public function index()
    {
        $user=Auth::user();
        
        $event = DB::table('events')->pluck("eventname","id");
        return view('Ticket.ticketcreate',compact('type','cat','user' ,'event'));
    }
//add ticket
    public function store(Request $request)
    {
        
        $cevent=new tickettype();
        //$puser->user_id={{$user->id}};
        //$cevent->orgid=$puser;
        $user=Auth::user()->id;
        $cevent->eventid=$request->input('eventname');
         
              
          $cevent->tickettype=$request->input('tickettype');
          $cevent->Ticketname=$request->input('ticketname'); 

        $cevent->quantity=$request->input('quantity');
        $cevent->rate=$request->input('rate');
        $cevent->servicecharge=$request->input('charge');
        
        $cevent->ticketstart=$request->input('startdate');
         $cevent->ticketend=$request->input('enddate');
         

        $cevent->save();
        return redirect('/ticket');
}
//ticket list
    public function levents()
    {
       $user=Auth::user();
     $list = DB::table('tickettypes')->get();
       return view('Ticket.ticketlist',compact('list','user'));
    }  
//edit ticket
    public function editticket($ticketid)
    {
       $user=Auth::user();
     $ticket =tickettype::findorfail($ticketid); 
      
        $event = DB::table('events')->pluck("eventname","id");
       return view('Ticket.ticketedit',compact('event','user','ticket'));
    }

    //ticket update
    public function ticketupdate($id,Request $request)
    {
        $cevent=tickettype::find($id); 
        //print_r($cevent);die();         

        $cevent->eventid=$request->input('eventname');   
        $cevent->tickettype=$request->input('tickettype');
        $cevent->Ticketname=$request->input('ticketname'); 
        $cevent->quantity=$request->input('quantity');
        $cevent->rate=$request->input('rate');
        $cevent->servicecharge=$request->input('charge');        
        $cevent->ticketstart=$request->input('startdate');
        $cevent->ticketend=$request->input('enddate');
         

        $cevent->save();
        
        return redirect('/listticket');
    
        //return redirect()->route('Lcat',['user'=>Auth::user()]);
    }

     public function ticketdelete($id)
    {
        $cat=tickettype::find($id);  
        $cat->delete();
       // return view('User.ListUser',array('user'=>Auth::user(),'users'=>$users));
         return redirect('/listticket');
         //->route('events.eventlist',['user'=>Auth::user()]);
    }   

}
