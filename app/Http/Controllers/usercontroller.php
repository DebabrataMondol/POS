<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\companyuser;
use Hash;
class usercontroller extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$branchs=DB::table('branch')
    				->get();
		$userinfos=DB::table('companyusers')
					->leftJoin('branch','companyusers.branch_id','=','branch.branch_id')
					->leftJoin('users','companyusers.user_role','=','users.id')
					->select('companyusers.*','branch.branch_name','users.name')
					->orderBy('branch_name')
					->get();
    	return view('admin.user.adduser',['branchs'=>$branchs,'userinfos'=>$userinfos]);
    }

    public function userinfo(Request $request){
    		$this->validate($request,[
    				'first_name'		=>'required',
    				'user_email'		=>'required',	
    				'user_mobile'		=>'required',	
    				'user_password'		=>'required',	
    				'conform_password'	=>'required',	
    				'user_role'			=>'required',	
    				'branch_id'			=>'required'	
    		]);
    		$userinfo =new companyuser();

    		if ($userinfo->user_password==$userinfo->conform_password) {

	    		$userinfo->first_name 		= $request->first_name;
	    		$userinfo->last_name 		= $request->last_name;
	    		$userinfo->user_email 		= $request->user_email;
	    		$userinfo->user_mobile 		= $request->user_mobile;
	    		$userinfo->user_password 	= Hash::make($request->user_password);
	    		$userinfo->user_role 		= $request->user_role;
	    		$userinfo->branch_id 		= $request->branch_id;
	    		$userinfo->status 			= $request->status;
	    		$userinfo->save();
	    		return redirect('/user-date')->with('message','User Informatioan Save Successfully');
    		}
    }

    public function userstatus($id){
    	$status=companyuser::find($id);
    	if ($status->status==1) {
    		$status->status=0;
    		$status->save();
    		return redirect('/user-date')->with('message','User Status Unactive Save Successfully');
    	}else if($status->status==0){
    		$status->status=1;
    		$status->save();
    		return redirect('/user-date')->with('message','User Status Active Save Successfully');
    	}
    }

    public function deleteuser($id){
    	$userdelete=companyuser::find($id);
    	$userdelete->delete();
    	return redirect('/user-date')->with('message','User Status Delete Successfully');
    }

    public function user_profile()
    {
        return view('admin.user.user_profile');
    }

}
