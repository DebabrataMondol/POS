<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Group;

class groupcontroller extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    

    public function index(){
    	$allgroups=Group::orderBy('id', 'DESC')->get();
    	return view('admin.group.addgroup',['allgroups'=>$allgroups]);
    }

    public function addgroup(Request $request){
        $this->validate($request,[
            'group_name'=>'required|unique:groups,group_name'
        ]);
    	$group=new Group();
    	$group->group_name 	= $request->group_name;
    	$group->status 		= $request->status;
    	$group->user_id		= Auth::id();
    	$group->save();
    	return redirect('/group-setup')->with('message','Group New Add Successfully');

    }

    public function status($id){
        $status=Group::find($id);
        if ($status->status==1) {
           $status->status=0;
            $status->save();
            return redirect('/group-setup')->with('message','Group Status Inactive Successfully');
        }elseif($status->status==0)
        {
            $status->status=1;
            $status->save();
            return redirect('/group-setup')->with('message','Group Status Active Successfully');
        }
    }

    public function groupeditform($id){

        $editgroup=Group::find($id);
        return view('admin.group.editgroup',['editgroup'=>$editgroup]);
    }

    public function updategroupthis(Request $request){
        $this->validate($request,[
            'group_name'=>'required|unique:groups,group_name'
        ]);

        $updategroup=Group::find($request->updategroupId);
        $updategroup->group_name = $request->group_name;
        $updategroup->status = $request->status;
        $updategroup->save();
        return redirect('/group-setup')->with('message','Group Update Successfully');

    }

    public function deletegroup($id){
        $deletegroup=Group::find($id);
        $deletegroup->delete();
        return redirect('/group-setup')->with('message','Group Deleted Successfully');
    }

    
}
