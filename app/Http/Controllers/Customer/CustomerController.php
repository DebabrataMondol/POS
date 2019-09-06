<?php

namespace App\Http\Controllers\Customer;

use App\Candf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
use DB;
use App\Customer;
class CustomerController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }
    

    // Customer_list Function

    public function Customer_list()
    {
    	$customers = DB::table('customer')->orderBy('customer_name')->get();
    	return view('admin.customer.customer_list', compact('customers'));
    }

    // Save Customer Function

    public function Store_customer(Request $request)
    {
    	$data = array();
    	$data = array(
    				'customer_cat' => $request->customer_cat,
    				'customer_name' => $request->customer_name,
    				'customer_mobile' => $request->customer_mobile,
    				'customer_email' => $request->customer_email,
    				'customer_address' => $request->customer_address,
    				'copaning_balance' => $request->copaning_balance,
    				'custmr_date' => Carbon::now(),
    				'custmr_userid' => Auth::id(),
    			);
    	$insert = DB::table('customer')->insert($data);
    	if ($insert) {
	                 $notification = array(
	                         'message' => 'Customer Data Added Successfully!', 
	                         'alert-type' => 'success'
	                     );

	             return Redirect()->route('customer-list')->with($notification);    
	             }else{
	                    return back();
	              }
    }

    public function deletecustomer($id){
        $deletecustomer=Customer::find($id);
        $deletecustomer->delete();
        return redirect('/customers')->with('message','Customer Deleted Successfully');
    }

    public function editecustomer($id)
    {
        $editecustomer = Customer::find($id);
        return view('admin.customer.edite_customer_form',['editecustomer'=>$editecustomer]);

    }

    public function updatecustomer(Request $request)
    {
        $this->validate($request, [
            'customer_name' => 'required|unique:customer,customer_name'
        ]);

        $updatecustomer = Customer::find($request->updatecustomerId);
        $updatecustomer->customer_cat = $request->customer_cat;
        $updatecustomer->customer_name = $request->customer_name;
        $updatecustomer->customer_mobile = $request->customer_mobile;
        $updatecustomer->customer_email = $request->customer_email;
        $updatecustomer->customer_address = $request->customer_address;
        $updatecustomer->copaning_balance = $request->copaning_balance;
        $updatecustomer->custmr_userid = Auth::id();
        $updatecustomer->save();
        return redirect('/customers')->with('message', '1 Customer Update Successfully');
    }

    public function status($id){
        $status=Customer::find($id);
        if ($status->status==1) {
            $status->status=0;
            $status->save();
            return redirect('/customers')->with('message','Customer Status Inactive Successfully');
        }elseif($status->status==0)
        {
            $status->status=1;
            $status->save();
            return redirect('/customers')->with('message','Customer Status Active Successfully');
        }
    }


}
