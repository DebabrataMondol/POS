<?php

namespace App\Http\Controllers;

use App\SalesMan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesManController extends Controller
{
    public  function index(){
        $salesMans = SalesMan::all();
        return view('admin.master.salesMan')->with('salesMans',$salesMans);
    }
    public  function store(Request $request){
            $salesMan = new SalesMan();

        $salesMan->salesMan_name = $request->input('salesMan_name');
        $salesMan->salesMan_mobile = $request->input('salesMan_mobile');
        $salesMan->salesMan_address = $request->input('salesMan_address');
        $salesMan->salesMan_status = $request->input('salesMan_status');
        $salesMan->save();
        }

    public function salesMans_status($id){
        $status=SalesMan::find($id);
        if ($status->salesMan_status==1) {
            $status->salesMan_status=0;
            $status->save();
            return redirect('SalesMan/Info')->with('message','User Status Unactive Save Successfully');
        }
        else if($status->salesMan_status==0){
            $status->salesMan_status=1;
            $status->save();
            return redirect('SalesMan/Info')->with('message','User Status Active Save Successfully');
        }
    }
}
