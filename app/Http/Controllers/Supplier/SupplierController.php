<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use DB;
use App\Supplier;
use App\Candf;
class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Supplier_list Function

    public function Supplier_list()
    {	
    	$suppliers = DB::table('supplier')->orderBy('supplier_name')->get();
    	return view('admin.supplier.supplier_list', compact('suppliers'));
    }


    // Save Supplier Function

    public function Store_supplier(Request $request)
    {
    	$data = array();
    	$data = array(
    				'supplier_name' => $request->supplier_name,
    				'supplier_mobile' => $request->supplier_mobile,
    				'supplier_email' => $request->supplier_email,
    				'supplier_address' => $request->supplier_address,
    				'sopaning_balance' => $request->sopaning_balance,
    				'supplier_date' => Carbon::now(),
    				'supplier_userid' => Auth::id(),
    				);

    	$insert = DB::table('supplier')->insert($data);
    	if ($insert) {
	                 $notification = array(
	                         'message' => 'Supplier Added Successfully!', 
	                         'alert-type' => 'success'
	                     );

	             return Redirect()->route('supplier-list')->with($notification);    
	             }else{
	                    return back();
	              }
    }



    // Candf_list Function

    public function Candf_list()
    {
    	$candfs = DB::table('candf')->orderBy('cf_name')->get();
    	return view('admin.supplier.cf_list', compact('candfs'));
    }


    // Save CNF Function

    public function Store_candf(Request $request)
    {
    	$data = array();
    	$data = array(
    			'cf_name'=>$request->cf_name,
    			'cf_mobile'=>$request->cf_mobile,
    			'cf_email'=>$request->cf_email,
    			'cf_address'=>$request->cf_address,
    			'cfopaning_blance'=>$request->cfopaning_blance,
    			'cf_date' => Carbon::now(),
    			'cf_userid' => Auth::id(),
    			);
      $insert = DB::table('candf')->insert($data);
      if ($insert) {
	                 $notification = array(
	                         'message' => 'C & F Added Successfully!', 
	                         'alert-type' => 'success'
	                     );

	             return Redirect()->route('candf-list')->with($notification);    
	             }else{
	                    return back();
	              }
    }
    public function deletesupplier($id){
        $deletesupplier=Supplier::find($id);
        $deletesupplier->delete();
        return redirect('/suppliers')->with('message','Supplier Deleted Successfully');
    }
    public function editeCanf_page($id)
    {
        $editecandf = Candf::find($id);
        return view('admin.supplier.edite_candf',['editecandf'=>$editecandf]);

    }

    public function updatecandf(Request $request)
    {
        $this->validate($request, [
            'cf_name' => 'required|unique:candf,cf_name'
        ]);

        $updatecandf = Candf::find($request->updatecandfId);
        $updatecandf->cf_name = $request->cf_name;
        $updatecandf->cf_mobile = $request->cf_mobile;
        $updatecandf->cf_email = $request->cf_email;
        $updatecandf->cf_address = $request->cf_address;
        $updatecandf->cfopaning_blance = $request->cfopaning_blance;
        $updatecandf->cf_userid = Auth::id();
        $updatecandf->save();
        return redirect('/C-AND-F')->with('message', 'C and F Update Successfully');
    }
    public function delete_c_f($id){
        $delete_c_f=Candf::find($id);
        $delete_c_f->delete();
        return redirect('/C-AND-F')->with('message','C and F Deleted Successfully');
    }

    public function editesupplier($id)
    {
        $editesupplier = Supplier::find($id);
        return view('admin.supplier.edite_supplier_form',['editesupplier'=>$editesupplier]);

    }

    public function updatesupplier(Request $request)
    {
        $this->validate($request, [
            'supplier_name' => 'required|unique:supplier,supplier_name'
        ]);

        $updatecandf = Supplier::find($request->updatecandfId);
        $updatecandf->supplier_name = $request->supplier_name;
        $updatecandf->supplier_mobile = $request->supplier_mobile;
        $updatecandf->supplier_email = $request->supplier_email;
        $updatecandf->supplier_address = $request->supplier_address;
        $updatecandf->sopaning_balance = $request->sopaning_balance;
        $updatecandf->supplier_userid = Auth::id();
        $updatecandf->save();
        return redirect('/suppliers')->with('message', '1 Supplier Update Successfully');
    }


}
