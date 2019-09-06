<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Auth;
class categorycontroller extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$categorys=Category::orderBy('id','DESC')->get();
    	return view('admin.category.addcategory',['categorys'=>$categorys]);
    }

    public function postcategory(Request $request){
    	$this->validate($request,[
    			'category_name'=>'required|unique:categories,category_name'
    	]);
    		$category = new Category();
    		$category->category_name = $request->category_name;
    		$category->status = $request->status;
    		$category->user_id = Auth::id();
    		$category->save();
    		return redirect('/category-setup')->with('message','Category Add Successfully');
    }

    public function statusupdate($id){
    	$categorystatus=Category::find($id);
    	if ($categorystatus->status==1) {
    		$categorystatus->status=0;
    		$categorystatus->save();
    		return redirect('/category-setup')->with('message','Category Status Incative Successfully');
    	}elseif($categorystatus->status==0){
    		$categorystatus->status=1;
    		$categorystatus->save();
    		return redirect('/category-setup')->with('message','Category Status Active Successfully');
    	}
    }

    public function categoryupdateform($id){
    	$updatecategory=Category::find($id);
    	return view('admin.category.editcategory',['updatecategory'=>$updatecategory]);
    }

    public function updatecategory(Request $request){
    	$this->validate($request,[
    			'category_name'=>'required|unique:categories,category_name'
    	]);
    	$category=Category::find($request->categoryid);
    	$category->category_name = $request->category_name;
    	$category->status = $request->status;
    	$category->save();
    	return redirect('/category-setup')->with('message','Category Update Successfully');
    }

    public function deletecategory($id){
    	$category=Category::find($id);
    	$category->delete();
    	return redirect('/category-setup')->with('message','Category Deleted Successfully');
    }
}
