<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Auth;

class brandcontroller extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$allbrand = Brand::orderBy('id', 'DESC')->get();
    	return view('admin.brand.addbrand',['allbrand'=>$allbrand]);
    }

    public function addbrand(Request $request){
    		$this->validate($request,[
    			'brand_name' => 'required'
    		]);

    		$addbrand = new Brand();
    		$addbrand->brand_name 	= $request->brand_name;
    		$addbrand->status 		= $request->status;
    		$addbrand->user_id 		= Auth::id();
    		$addbrand->save();
    		return redirect('/barnd-setup')->with('message','Brand Add Successfully');
    }

    public function updatestatus($id){
    	$brandstatus =Brand::find($id);

    	if ($brandstatus->status==1) {
    		$brandstatus->status=0;
    		$brandstatus->save();
    		return redirect('/barnd-setup')->with('message','Brand Status Inactive Successfully');
    	}elseif($brandstatus->status==0){
    		$brandstatus->status=1;
    		$brandstatus->save();
    		return redirect('/barnd-setup')->with('message','Brand Status Active Successfully');
    	}
    }

    public function editbrand($id){
    	$brand=Brand::find($id);
    	return view('admin.brand.editbrand',['brand'=>$brand]);
    }

    public function updatebrand(Request $request){
    	$this->validate($request,[
    		'brand_name' =>'required|unique:brands,brand_name'
    	]);
    	$brand = Brand::find($request->brandid);
    	$brand->brand_name=$request->brand_name;
    	$brand->status=$request->status;
    	$brand->save();
    	return redirect('/barnd-setup')->with('message','Brand Update Successfully');

    }

    public function deletebrand($id){
    	$deletebrand=Brand::find($id);
    	$deletebrand->delete();
    	return redirect('/barnd-setup')->with('message','Brand Deleted Successfully');
    }


}
