<?php

namespace App\Http\Controllers\Purchase;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Brand;
use App\Group;
use Auth;
use DB;
use App\Searceresult;
use Cart;
use DNS1D;
use Illuminate\View\View;

class PurchaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    // Local_purchaselist Function

    public function Local_purchaselist()
    {
        $categorys = Category::where('status', 1)
            ->orderBy('category_name', 'ASC')
            ->get();
        $brands = Brand::where('status', 1)
            ->orderBy('brand_name', 'ASC')
            ->get();
        $groups = Group::where('status', 1)
            ->orderBy('group_name', 'ASC')
            ->get();

        $suppliers = DB::table('supplier')->orderBy('supplier_name')->get();

        $purchaseno = DB::table('local_purchase')->count();
        $purchaseno = $purchaseno + 1;
        return view('admin.purchases.local.local_purchaselist', ['categorys' => $categorys, 'suppliers' => $suppliers, 'purchaseno' => $purchaseno, 'brands' => $brands, 'groups' => $groups]);
    }


    // Save Cart Local Purchase Function

    public function Store_cartlocalpurchase(Request $request)
    {
        $data = array();
        $data = array(
            'purchase_date' => $request->purchase_date,
            'supplier_id' => $request->supplier_id,
            'purchase_no' => $request->purchase_no,
            'supplier_invoiceno' => $request->supplier_invoiceno,
            'unit_type' => $request->unit_type,
            'stock_id' => $request->stock_id,
            'supplier_code' => $request->supplier_code,
            'pgroup' => $request->pgroup,
            'brand' => $request->brand,
            'category' => $request->category,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'cost' => $request->cost,
            'margin' => $request->margin,
            'sale_price' => $request->sale_price,
            'temp_localp_userid' => Auth::id(),
        );

        $insert = DB::table('temp_local_purchase')->insert($data);
        return response()->json($insert);

    }


    // Temp_localpurcheslist Function

    public function Temp_localpurcheslist()
    {
        $templocals = DB::table('temp_local_purchase')
            ->orderBy('temp_localp_id', 'DESC')
            ->get();
        $totalqty = DB::table('temp_local_purchase')->sum('quantity');
        $tolcost = DB::table('temp_local_purchase')->sum('cost');

        return view('admin.purchases.local.temp_locallist', compact('templocals', 'totalqty', 'tolcost'));
    }


    // Update_templocal Function

    public function Update_templocal(Request $request, $id)
    {
        $data = array();
        $data['quantity'] = $request->quantity;
        $update = DB::table('temp_local_purchase')->where('temp_localp_id', $id)->update($data);
        return Redirect()->route('local-purchase');
    }

    // Temp Locala Function

    public function Delete_templocal($id)
    {
        $del = DB::table('temp_local_purchase')->where('temp_localp_id', $id)->delete();

        return Redirect()->route('local-purchase');
    }


    // Save Confirm Local Purchase Function

    public function Confirm_localpurchase()
    {

        // Temp Local purchase read data With Database
        $mdata = array();
        $data = array();
        $templocal = DB::table('temp_local_purchase')
            ->orderBy('temp_localp_id', 'DESC')
            ->get();


        foreach ($templocal as $tempvalue) {

            $mdata = array(
                'purchase_date' => $tempvalue->purchase_date,
                'supplier_id' => $tempvalue->supplier_id,
                'purchase_no' => $tempvalue->purchase_no,
                'supplier_invoiceno' => $tempvalue->supplier_invoiceno,
                'unit_type' => $tempvalue->unit_type,
                'stock_id' => $tempvalue->stock_id,
                'supplier_code' => $tempvalue->supplier_code,
                'pgroup' => $tempvalue->pgroup,
                'brand' => $tempvalue->brand,
                'category' => $tempvalue->category,
                'description' => $tempvalue->description,
                'quantity' => $tempvalue->quantity,
                'cost' => $tempvalue->cost,
                'margin' => $tempvalue->margin,
                'sale_price' => $tempvalue->sale_price,
                'localp_userid' => Auth::id(),
            );

            // Insert Database Confirm Table

            $insert = DB::table('local_purchase')->insert($mdata);
        }


        foreach ($templocal as $value) {
            $data = array();
            $data = array(
                'stockreport_date' => $value->purchase_date,
                'report_supplier_id' => $value->supplier_id,
                'report_purchaseno' => $value->purchase_no,
                'report_stock_id' => $value->stock_id,
                'report_group' => $value->unit_type,
                'report_brand' => $value->brand,
                'report_category' => $value->category,
                'report_description' => $value->description,
                'report_quantity' => $value->quantity,
                'report_cost' => $value->cost,
                'report_margin' => $value->margin,
                'report_sales_price' => $value->sale_price,
                'report_userid' => Auth::id(),
            );
            $insert = DB::table('stock_report')->insert($data);
        }


        // Temp Locl purchase Delete

        $del = DB::table('temp_local_purchase')->delete();
        return Redirect()->route('local-purchase');

    }


    /************************** Lc_purchaselist **************************/

    public function Lc_purchaselist()
    {
        $categorys = Category::where('status', 1)
            ->orderBy('category_name', 'ASC')
            ->get();
        $brands = Brand::where('status', 1)
            ->orderBy('brand_name', 'ASC')
            ->get();
        $groups = Group::where('status', 1)
            ->orderBy('group_name', 'ASC')
            ->get();

        $suppliers = DB::table('supplier')->orderBy('supplier_name')->get();
        $candfs = DB::table('candf')->orderBy('cf_name')->get();

        $purchaseno = DB::table('local_purchase')->count();
        $purchaseno = $purchaseno + 1;

        return view('admin.purchases.lc.lc_purchaselist', compact('suppliers', 'candfs', 'categorys', 'brands', 'groups'));
    }


    // Save Lc Purchase Temp Data With Database

    public function Store_templcpurchase(Request $request)
    {
        $data = array();
        $data = array(
            'lc_purdate' => $request->lc_purdate,
            'lc_number' => $request->lc_number,
            'supplier_id' => $request->supplier_id,
            'lc_purchaseno' => $request->lc_purchaseno,
            'lc_supplierno' => $request->lc_supplierno,
            'lc_unitetype' => $request->lc_unitetype,
            'lc_stockid' => $request->lc_stockid,
            'lc_suppliercode' => $request->lc_suppliercode,
            'lc_conrate' => $request->lc_conrate,
            'lc_candfbdt' => $request->lc_candfbdt,
            'candfid' => $request->candfid,
            'lc_group' => $request->lc_group,
            'lc_brand' => $request->lc_brand,
            'lc_category' => $request->lc_category,
            'lc_designno' => $request->lc_designno,
            'lc_description' => $request->lc_description,
            'lc_pquantity' => $request->lc_pquantity,
            'lc_revquantity' => $request->lc_revquantity,
            'lc_purrate' => $request->lc_purrate,
            'lc_carryingtk' => $request->lc_carryingtk,
            'lc_costbtb' => $request->lc_costbtb,
            'lc_wmargin' => $request->lc_wmargin,
            'lc_wprice' => $request->lc_wprice,
            'lc_rmargin' => $request->lc_rmargin,
            'lc_retailprice' => $request->lc_retailprice,
            'lcp_userid' => Auth::id(),
        );

        // echo "<pre>";
        // print_r($data);

        $insert = DB::table('temp_lc_purchase')->insert($data);
        return response()->json($insert);


    }


    // Lc Temp Data Function

    public function Temp_lcpurchaselist()
    {
        $templcs = DB::table('temp_lc_purchase')->orderBy('temp_lcpur_id')->get();
        $lcqty = DB::table('temp_lc_purchase')->sum('lc_revquantity');
        $lcbdt = DB::table('temp_lc_purchase')->sum('lc_costbtb');
        return view('admin.purchases.lc.temp_lcpurchaselist', compact('templcs', 'lcqty', 'lcbdt'));
    }

    // Update_lcquentity Function

    public function Update_lcquentity(Request $request, $id)
    {
        $data['lc_revquantity'] = $request->lc_revquantity;

        DB::table('temp_lc_purchase')->where('temp_lcpur_id', $id)->update($data);
        return Redirect()->route('lc-purchase');
    }


    // Delete templcpurchase Function

    public function Delete_templcpurchase($id)
    {
        DB::table('temp_lc_purchase')->where('temp_lcpur_id', $id)->delete();
        return Redirect()->route('lc-purchase');
    }


    // Save With Confirm Lc Purchase

    public function Confirm_lcpurchase()
    {
        // Temp Data Read With Database ...temp_lc_purchase
        $mdata = array();
        $templcpur = DB::table('temp_lc_purchase')->get();

        foreach ($templcpur as $templcvalue) {
            $mdata = array(
                'lc_purdate' => $templcvalue->lc_purdate,
                'lc_number' => $templcvalue->lc_number,
                'supplier_id' => $templcvalue->supplier_id,
                'lc_purchaseno' => $templcvalue->lc_purchaseno,
                'lc_supplierno' => $templcvalue->lc_supplierno,
                'lc_unitetype' => $templcvalue->lc_unitetype,
                'lc_stockid' => $templcvalue->lc_stockid,
                'lc_suppliercode' => $templcvalue->lc_suppliercode,
                'lc_conrate' => $templcvalue->lc_conrate,
                'lc_candfbdt' => $templcvalue->lc_candfbdt,
                'candfid' => $templcvalue->candfid,
                'lc_group' => $templcvalue->lc_group,
                'lc_brand' => $templcvalue->lc_brand,
                'lc_category' => $templcvalue->lc_category,
                'lc_designno' => $templcvalue->lc_designno,
                'lc_description' => $templcvalue->lc_description,
                'lc_pquantity' => $templcvalue->lc_pquantity,
                'lc_revquantity' => $templcvalue->lc_revquantity,
                'lc_purrate' => $templcvalue->lc_purrate,
                'lc_carryingtk' => $templcvalue->lc_carryingtk,
                'lc_costbtb' => $templcvalue->lc_costbtb,
                'lc_wmargin' => $templcvalue->lc_wmargin,
                'lc_wprice' => $templcvalue->lc_wprice,
                'lc_rmargin' => $templcvalue->lc_rmargin,
                'lc_retailprice' => $templcvalue->lc_retailprice,
                'lcp_userid' => Auth::id(),
            );

            // echo "<pre>";
            // print_r($mdata);

            $insert = DB::table('lc_purchase')->insert($mdata);
        }

        foreach ($templcpur as $value) {
            $data = array();
            $data = array(
                'stockreport_date' => $value->lc_purdate,
                'report_supplier_id' => $value->supplier_id,
                'report_purchaseno' => $value->lc_purchaseno,
                'report_stock_id' => $value->lc_stockid,
                'report_group' => $value->lc_unitetype,
                'report_brand' => $value->lc_brand,
                'report_category' => $value->lc_category,
                'report_description' => $value->lc_description,
                'report_quantity' => $value->lc_revquantity,
                'report_cost' => $value->lc_costbtb,
                'report_margin' => $value->lc_rmargin,
                'report_sales_price' => $value->lc_retailprice,
                'report_userid' => Auth::id(),
            );
            $insert = DB::table('stock_report')->insert($data);
        }


        // Temp lc Purchace Delete

        $del = DB::table('temp_lc_purchase')->delete();

        return Redirect()->route('lc-purchase');
    }


    /***************************** Return purchaselist List Function **************************************/

    public function Return_purchaselist()
    {

        $suppliers = DB::table('supplier')->orderBy('supplier_name')->get();
        view()->share('suppliers',$suppliers);
        return view('admin.purchases.return.return_purchaselist');
    }


    // Purchase_returnsearch Function

    public function customerInvoice(Request $request)
    {
        $id = $request->id;
        $results = DB::table("stock_report")
            ->where("report_supplier_id",$id)
            ->pluck("report_purchaseno");
        return response()->json($results);


    }

//------------------Bercode Start-------------------------------------------
    public function barcode(Request $request)
    {
        $cartItems = Cart::content();
        view()->share('cartItems',$cartItems);


        $fromdate = $request->input('fromdate');
        $todate = $request->input('todate');

            $filterdates = DB::table('stock_report')
                ->whereBetween('stockreport_date', [$fromdate, $todate])
                ->select('stock_report.*')
                ->orderBy('stockreport_id', 'DESC')
                ->get();
            view()->share('filterdates',$filterdates);

        return view('admin.bercode.generate_bercode');
    }

    public  function addbercodeqty(Request $request){
        $id = $request->id;
        $showdata = DB::table('stock_report')->where('stockreport_id',$id)->get();
    return response()->json($showdata);
    }

    public function addBercodeLists(Request $request){
        Cart::add(['id' => $request->input('berCodes') ,
            'name' => $request->input('Pdesc') ,
            'qty' => $request->input('p_qty'),
            'price' => $request->input('price'),
            'options' => ['printqty' => $request->input('Pqty')]
            ]);
    }

    public function printBercode()
    {
        $companys = DB::table('company')->get();
        view()->share('companys',$companys);

        $cartItems = Cart::content();
        return view('admin.bercode.print_bercode')->with('cartItems',$cartItems);
    }

    public function distroyCart(){
        $success = Cart::destroy();
        return Response($success);
    }

//---------------------------------End Bercode---------------------------------------------
    public function lc_report_generat_page()
    {
        $suppers = DB::table('supplier')->get();
        return view('admin.report.lcpurchasesreport.lc_report_searching_page', ['suppers' => $suppers]);
    }

    public function search_by_supplier(Request $request)
    {

        $findreport = $request->supplierid;
        if (($findreport == null)) {
            return redirect()->back()->with('message', 'No Data Found');
        } else {


            $filterdates = DB::table('lc_purchase')
                ->where('supplier_id', 'LIKE', '%' . $findreport . '%')
                ->select('lc_purchase.*')
                ->orderBy('supplier_id', 'DESC')
                ->get();

            $supplayers = DB::table('supplier')
                ->where('supplier_id', $findreport)
                ->get();

            return view('admin.report.lcpurchasesreport.show_searchBy_supplier_report', ['filterdates' => $filterdates, 'supplayers' => $supplayers]);
        }
    }

    public function show_lc_invoice($id)
    {

        $supplairinfos = DB::table('lc_purchase')->where('lc_purchase_id', $id)->get();
        $userinfos = Auth::user()->get();
        $supplayers = DB::table('supplier')
            ->join('lc_purchase', 'supplier.supplier_id', '=', 'lc_purchase.supplier_id')
            ->select('supplier.*', 'lc_purchase.*')
            ->get();
        //$totalsaleprice = DB::table("local_purchase")->sum('sale_price',$id)->get();
        return view('admin.report.lcpurchasesreport.lcinvoice', ['supplairinfos' => $supplairinfos, 'userinfos' => $userinfos, 'supplayers' => $supplayers]);
    }

    public function search_by_date(Request $request)
    {
        $formdate = $request->formdate;
        $todate = $request->todate;

        if (empty($todate) && empty($formdate)) {
            return redirect()->back()->with('message', 'Please insert a valid value');
        } else {
            $datesearces = DB::table('lc_purchase')
                ->whereBetween('lc_purdate', [$formdate, $todate])
                ->select('lc_purchase.*')
                ->orderBy('lc_purdate', 'ASC')
                ->get();

            $supplayers = DB::table('supplier')
                ->join('lc_purchase', 'supplier.supplier_id', '=', 'lc_purchase.supplier_id')
                ->select('supplier.*')
                ->get();

            return view('admin.report.lcpurchasesreport.show_searchBy_date_report', ['datesearces' => $datesearces, 'supplayers' => $supplayers]);

        }

    }

    //.........................Bercode add to cart............................................

    public  function addTempdata(Request $request){


        $data = array();
        $data = array(
            'description' => $request->inputDescription,
            'bercode' => $request->inputBercode,
            'quantity' => $request->inputStockQuantity,
            'cost' => $request->inputCost,
            'sell_price' => $request->inputSalePrice,
            'print_qnty'=>$request->inputPrintQnty,
            'temp_ber_userID'=>Auth::id(),


        );
        $insert = DB::table('temp_barcode')->insert($data);
        if ($insert) {
            $notification = array(
                'message' => 'Customer Data Added Successfully!',
                'alert-type' => 'success'
            );

        }
            return back();
    }

}
