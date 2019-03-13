<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\orgprofile;
use App\user;
use App\event;

use DB;


class eventcontroller extends Controller
{
	// displaying  eventtype category
    public function index()
    {
        $user=Auth::user();
        $type = DB::table('eventtypes')->pluck("evenettypename","eventtyid");
        $cat = DB::table('eventcategories')->pluck("name","id");
        $org=DB::table('orgprofiles')->pluck("name","id");

        //$types = DB::table('scheduletype')->pluck("type","id")
        //return view('eventcreate',compact('cat'));
        return view('events.eventcreate',compact('type','cat','user' ,'org'));
    }
    //Adding event
     public function store(Request $request)
    {
        
        $cevent=new event();
        //$puser->user_id={{$user->id}};
        //$cevent->orgid=$puser;
        $user=Auth::user()->id;
        $cevent->eventname=$request->input('eventname');
         if(Input::hasFile('image'))
        {
            //$file is a varible stores the image file and by using it ....we can get size and type of file
            $file=Input::file('image'); 
            $file->move(public_path().'/',$file->getClientOriginalName());
            $cevent->image=$file->getClientOriginalName();
           
        }
              
        $cevent->orgid=$request->input('orgname'); 
        $cevent->description=$request->input('Description');
        $cevent->event_venue=$request->input('Venue');
        $cevent->seats=$request->input('Seats');
        $cevent->eventtypeid=$request->input('Type');
         $cevent->eventcatid=$request->input('Category');
        $cevent->eventtopic=$request->input('topic');
        $cevent->startdate=$request->input('startdate');
         $cevent->enddate=$request->input('enddate');
         $cevent->starttime=$request->input('starttime');
         $cevent->endtime=$request->input('endtime');

        $cevent->instructions=$request->input('Instructions');
        $cevent->terms_and_condition=$request->input('Conditions');


        $cevent->save();
        return redirect('/events');
}

//listing events
public function levents()
    {
       $user=Auth::user();
     $list = DB::table('events')->get();
       return view('events.eventlist',compact('list','user'));
    }  

 //Edit Events
   public function editevent($eventid)
    {
       $user=Auth::user();
     $eve =event::findorfail($eventid); 
      $type = DB::table('eventtypes')->pluck("evenettypename","eventtyid");
        $cat = DB::table('eventcategories')->pluck("name","id");
        $org=DB::table('orgprofiles')->pluck("name","id");
       return view('events.editevent',compact('eve','user','type','cat','org'));
    }
    //event update
    public function eventupdate($id,Request $request)
    {
        $cevent=event::find($id);          
        //print_r($brands);
        $user=Auth::user()->id;
        $cevent->eventname=$request->input('eventname');
         if(Input::hasFile('image'))
        {
            //$file is a varible stores the image file and by using it ....we can get size and type of file
            $file=Input::file('image'); 
            $file->move(public_path().'/',$file->getClientOriginalName());
            $cevent->image=$file->getClientOriginalName();
           
        }
              
          $cevent->orgid=$request->input('orgname'); 
        $cevent->description=$request->input('Description');
        $cevent->event_venue=$request->input('Venue');
        $cevent->seats=$request->input('Seats');
        $cevent->eventtypeid=$request->input('Type');
         $cevent->eventcatid=$request->input('Category');
        $cevent->eventtopic=$request->input('topic');
        $cevent->startdate=$request->input('startdate');
         $cevent->enddate=$request->input('enddate');
         $cevent->starttime=$request->input('starttime');
         $cevent->endtime=$request->input('endtime');

        $cevent->instructions=$request->input('Instructions');
        $cevent->terms_and_condition=$request->input('Conditions');


        $cevent->save();
        return redirect('/events');
    
        //return redirect()->route('Lcat',['user'=>Auth::user()]);
    }
    //event delete
    public function catdelete($id)
    {
        $cat=event::find($id);  
        $cat->delete();
       // return view('User.ListUser',array('user'=>Auth::user(),'users'=>$users));
         return redirect('/list');
         //->route('events.eventlist',['user'=>Auth::user()]);
    }   

}