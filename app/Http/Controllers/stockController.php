<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class stockController extends Controller
{
  public function index(){
		$branchs=DB::table('branch')
					->where('branch_userid',1)
          ->select('branch.*')
					->get();

		$companyinfos=DB::table('company')
					->where('comy_userid',1)
          ->select('company.*')
					->get();
    	$stockreports=DB::table('stock_report')
				    	->where('report_userid', 1)
              ->Select('stock_report.*')
				    	->orderBy('stockreport_id','DESC')
				    	->get();
    	return view('admin.inventory.inventoryshow',['stockreports'=>$stockreports,'branchs'=>$branchs,'companyinfos'=>$companyinfos]);
    }
}
