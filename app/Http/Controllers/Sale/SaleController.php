<?php

namespace App\Http\Controllers\Sale;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SaleController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }


    // Sales list Function 


    public function Sales_list()
    {

      return view('admin.sales.sales_list');
    }
}
