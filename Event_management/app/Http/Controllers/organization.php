<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\orgprofile;
use App\user;
use DB;

class organization extends Controller
{ //home page
    public function index()
    {
        $user=Auth::user();
        return view('Organization.orghome',compact('user'));
    }
// organization profile displaying state
    public function state()
    {
    	$user=Auth::user();
    	$states = DB::table('state')->pluck("name","id");
    	return view('Organization.orgprofile',compact('states','user'));
    }
// organization profile  displaying district
    public function getDist($id)
    {
        $dist = DB::table("district")->where("state_id",$id)->pluck("name","id");
        return json_encode($dist);
    }
  // storing organization data to table 
     public function store(Request $request)
    {
    	
       
        $user=Auth::user()->id;
        $username=Auth::user()->name;
        $userp=Auth::user();
        $puser=new orgprofile();
        $puser->userid=$user;
        $puser->name=$request->input('fname');
        $puser->mobile=$request->input('number');
        
         if(Input::hasFile('image'))
        {
            //$file is a varible stores the image file and by using it ....we can get size and type of file
            $file=Input::file('image'); 
            $file->move(public_path().'/',$file->getClientOriginalName());
            $puser->logo=$file->getClientOriginalName();
           
        }
        $puser->address=$request->input('address');
        $puser->stateid=$request->input('district');
        $puser->website=$request->input('website');         
        $puser->save();
         return redirect('/orgprofileview');
    } 
//
    public function orgview()
    {
    	$user=Auth::user();
    	
    	return view('Organization.orgview',compact('user'));
    }
    //displaying organization profile
 public function orgprofiles()
    {
    	$user=Auth::user();
    	$org= new orgprofile;
        
    	$sorg = orgprofile::findorfail($org);
    	
    	return view('Organization.orgprofileview',compact('user','sorg'));
    }






}
