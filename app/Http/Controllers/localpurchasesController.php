<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class localpurchasesController extends Controller
{
    public function index(){
    	$suppers=DB::table('supplier')->get();
    	return view('admin.report.localpurchasesreport.localpurchasesreport',['suppers'=>$suppers]);
    }
    public function localpurchase(Request $request){

    		$findreport =$request->supplierid;
    		if (($findreport==null)) {
    			return redirect()->back()->with('message','No Data Found');
    		}else{



    			$filterdates = DB::table('local_purchase')
		                    ->where('supplier_id', 'LIKE', '%'.$findreport.'%')
		                    ->select('local_purchase.*')
		                    ->orderBy('supplier_id','DESC')
		                    ->get();

		         $supplayers=DB::table('supplier')
		         			->where('supplier_id',$findreport)
		         			->get();

		         return view('admin.report.localpurchasesreport.showpurchasereport',['filterdates'=>$filterdates,'supplayers'=>$supplayers]);
    		}
    }


    public function datesearce(Request $request){
	    	$todate=$request->todate;
	    	$formdate=$request->formdate;
	    	if (empty($todate) && empty($formdate)) {
	    		return redirect()->back()->with('message','Please insert a valid value');
	    	}else{
	    		$datesearces=DB::table('local_purchase')
				    			->whereBetween('purchase_date',[$formdate,$todate])
				    			->select('local_purchase.*')
				    			->orderBy('purchase_date','ASC')
				    			->get();

				$supplayers=DB::table('supplier')
							->join('local_purchase','local_purchase.supplier_id','=','supplier.supplier_id')
							->select('supplier.*')
							->get();

    			return view('admin.report.localpurchasesreport.datefilterreport',['datesearces'=>$datesearces,'supplayers'=>$supplayers]);

	    	}

    }

    public function invoice($id,$sid){

	$supplairinfos=DB::table('local_purchase')->where('local_purchase_id', $id)->get();
	$userinfos = Auth::user()->get();
	$supplayers=DB::table('supplier')->where('supplier_id',$sid)->get();
	 //$totalsaleprice = DB::table("local_purchase")->sum('sale_price',$id)->get();
    	return view('admin.report.localpurchasesreport.invoice',['supplairinfos'=>$supplairinfos,'userinfos'=>$userinfos,'supplayers'=>$supplayers]);
    }
}
