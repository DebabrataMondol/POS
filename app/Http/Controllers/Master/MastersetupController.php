<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use DB;
class MastersetupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    // company_list function

    public function company_list()
    {
    	$companys = DB::table('company')->get();
    	return view('admin.master.company_list', compact('companys'));
    }


    // Save Company Function 

    public function Store_company(Request $request)
    {
    	$data = array();
    	$data = array(
    			'company_name' => $request->company_name,
    			'company_mobile' => $request->company_mobile,
    			'company_email' => $request->company_email,
    			'company_website' => $request->company_website,
    			'company_address' => $request->company_address,
    			'country' => $request->country,
    			'currency_code' => $request->currency_code,
    			'company_vat' => $request->company_vat,
    			'company_date' => Carbon::now(),
    			'comy_userid' => Auth::id(),
    			);
    	 /**************** Company Image Upload *****************/

         if ($request->hasFile('company_image')) {
         $files = $request->file('company_image');

          $extension = $files->getClientOriginalExtension();
          $fileName = str_random(5)."-".date('his')."-".str_random(3).".".$extension;
          $folderpath = 'public/Company/'.date('Y').'/';
          $image_url = $folderpath.$fileName;
          $files->move($folderpath , $fileName);
          $data['company_image'] = $image_url; 

         }

         
        $insert = DB::table('company')->insert($data);
	  if ($insert) {
	                 $notification = array(
	                         'message' => 'Company Data Added Successfully!', 
	                         'alert-type' => 'success'
	                     );

	             return Redirect()->route('company-list')->with($notification);    
	             }else{
	                    return back();
	              }


    }

    // Branch_list Function

    public function Branch_list()
    {	
    	$branchs = DB::table('branch')->orderBy('branch_name')->get();
    	return view('admin.master.branch_list', compact('branchs'));
    }

    // Branch Save Function

    public function Store_branch(Request $request)
    {
    	$data = array();
    	$data = array(
    			'branch_name' => $request->branch_name,
    			'branch_mobile' => $request->branch_mobile,
    			'branch_email' => $request->branch_email,
    			'branch_address' => $request->branch_address,
    			'opening_date' => $request->opening_date,
    			'opening_balance' => $request->opening_balance,
    			'branch_userid' => Auth::id(),
    				);
   		$insert = DB::table('branch')->insert($data);
   		 if ($insert) {
			                 $notification = array(
			                         'message' => 'Branch Added Successfully!', 
			                         'alert-type' => 'success'
			                     );

			             return Redirect()->route('branch-list')->with($notification);    
			             }else{
			                    return back();
			              }
    }



}
