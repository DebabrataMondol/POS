<?php

namespace App\Http\Controllers;

use App\Carts;
use App\SaleInvoice;
use App\SaleItem;
use App\SalesMan;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Session;
use Response;
use function Sodium\add;
use Cart;


class productsale extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sealsmans = DB::table('sales_men')->where('salesMan_status', 1)->get();
        view()->share('sealsmans', $sealsmans);

        $vats = DB::table('company')->select('company_vat')->get();
        view()->share('vats', $vats);

        if (!Session::has('carts')) {
        }
        $oldCart = Session::get('carts');
        $carts = new Carts($oldCart);
        $customers = DB::table('customer')->orderBy('customer_name', 'ASC')->get();
        return view('admin.productsales.productsalesindex', ['customers' => $customers, 'products' => $carts->items, 'totalPrice' => $carts->totalPrice]);
    }

    public function fetch(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB:: table('stock_report')
                ->where('report_description', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu " style=" display:block;padding: 5px; margin-left: 20px; position: absolute;">';
            foreach ($data as $row) {
                $output .= '<li style=" padding: 0px; margin: 0px; border: none;" class=""><a style="margin: 0px;padding: 0px;" href="#"> ' . $row->report_description . '</a></li> </br>';
            }
            $output .= '</ul>';
            echo $output;

        }
    }


//----------get customer mobile and previous due----------------------------------
    public function findCustomer(Request $request)
    {
        $name = $request->get('name');
        $fills = DB::table('customer')->where('customer_name', $name)->get();
        return response($fills);
    }
    //----------get customer mobile and previous due----------------------------------


//-----------search by description and add to cart----------------------------------------------------
    public function searchProducts(Request $request)
    {
        $description = $request->description;
        $productByDesc = DB::table('stock_report')->where('report_description', $description)->first();
        if ($productByDesc->report_quantity != 0) {
            $oldCart = Session::has('carts') ? Session::get('carts') : null;
            $carts = new Carts($oldCart);
            $carts->add($productByDesc, $productByDesc->report_description);
//               dd($carts);
            $request->session()->put('carts', $carts);
            return redirect('/product-sale/');
        } else {
            Session::flash('message', "!! This product is not available in stock !!");
            return Redirect::back();
        }

    }
    //-----------End search by description and add to cart----------------------------------------------------


//---------------------------Delete Item from sell cart-------------------------------
    public function getRemoveItem($description)
    {
        $oldCart = Session::has('carts') ? Session::get('carts') : null;
        $carts = new Carts($oldCart);
        $carts->removeItem($description);

        Session::put('carts', $carts);
        return redirect('/product-sale/');
    }
    //---------------------------End Delete Item from sell cart-------------------------------


//---------------------For clean the sell cart-----------------------------------------
    public function cleanCart()
    {
        $distroy = Session::has('carts') ? Session::forget('carts') : null;
        return response($distroy);
    }


//---------------------End For clean the sell cart-----------------------------------------
    public function addSaleInvoice(Request $request)
    {

//................................For saving sale invoice Info----------------------------------------------
        $saleInvoice = new SaleInvoice();

        $saleInvoice->saleInvoice_customerName = $request->input('saleInvoice_customerName');
        $saleInvoice->saleInvoice_customerMobile = $request->input('saleInvoice_customerMobile');
        $saleInvoice->saleInvoice_previousDue = $request->input('saleInvoice_previousDue');
        $saleInvoice->saleInvoice_date = $request->input('saleInvoice_date');
        $saleInvoice->saleInvoice_subTotal = $request->input('saleInvoice_subTotal');
        $saleInvoice->saleInvoice_discountType = $request->input('saleInvoice_discountType');
        $saleInvoice->saleInvoice_discountAmount = $request->input('saleInvoice_discountAmount');
        $saleInvoice->saleInvoice_vatAmount = $request->input('saleInvoice_vatAmount');
        $saleInvoice->saleInvoice_totalPayable = $request->input('saleInvoice_totalPayable');
        $saleInvoice->saleInvoice_paidAmount = $request->input('saleInvoice_paidAmount');
        $saleInvoice->saleInvoice_returnAmount = $request->input('saleInvoice_returnAmount');
        $saleInvoice->saleInvoice_dueAmount = $request->input('saleInvoice_dueAmount');
        $saleInvoice->saleInvoice_transactionStatus = $request->input('saleInvoice_transactionStatus');
        $saleInvoice->saleInvoice_collectionType = $request->input('saleInvoice_collectionType');
        $saleInvoice->saleInvoice_salesMan = $request->input('saleInvoice_salesMan');
        $saleInvoice->saleInvoice_no = $request->input('saleInvoice_no');
        $saleInvoice->save();
//................................End For saving invoice Info----------------------------------------------


//------------------------For saving sell cart items-----------------------------------------
        $oldCart = Session::has('carts') ? Session::get('carts') : null;
        $carts = new Carts($oldCart);
        $products = $carts->items;

        foreach ($products as $product) {
        $mdata = array(
            'saleItem_description' => $product['item']->report_description,
            'saleItem_quantity' => $product['qty'],
            'saleItem_unite_price' => $product['item']->report_sales_price,
            'saleItem_total' => $product['price'],
            'saleInvoice_no' => $request->input('saleInvoice_no')
        );

        $insert = DB::table('sale_items')->insert($mdata);
    }
//------------------------End For sell saving cart items-----------------------------------------


//------------------------For forget sell cart -----------------------------------------
        Session::has('carts') ? Session::forget('carts') : null;
        Session::flash('message', "!! All the sale info is added successfully !!");
        //------------------------End For forget sell  cart-----------------------------------------


//--------------------For sell Invoice Print-----------------------------------------------------
        $commanyinfos = DB::table('company')->get();
        view()->share('commanyinfos', $commanyinfos);

        $items = DB::table('sale_items')->where('saleInvoice_no', $request->input('saleInvoice_no'))->get();
        view()->share('items', $items);

        $invoices = DB::table('sale_invoices')->where('saleInvoice_no', $request->input('saleInvoice_no'))->get();
        view()->share('invoices', $invoices);
//--------------------End For sell Invoice Print-----------------------------------------------------


        return view('admin.productsales.invoice_print');//redirect to sell invoice print ......
    }


    public function dateWiseReport(Request $request)
    {
        $fromdate = $request->fromDate;
        view()->share('fromdate',$fromdate);

        $todate = $request->toDate;
        view()->share('todate',$todate);

        $invoiceByDates = DB::table('sale_invoices')
            ->whereBetween('saleInvoice_date', [$fromdate, $todate])
            ->select('sale_invoices.*')
            ->orderBy('saleInvoice_date', 'ASC')
            ->get();
        view()->share('invoiceByDates', $invoiceByDates);

        $subtotalSum = $invoiceByDates->sum('saleInvoice_subTotal');
        view()->share('subtotalSum', $subtotalSum);

        $discountSum = $invoiceByDates->sum('saleInvoice_discountAmount');
        view()->share('discountSum', $discountSum);

        $totalPayableSum = $invoiceByDates->sum('saleInvoice_subTotal');
        view()->share('totalPayableSum', $totalPayableSum);


        return view('admin.report.saleReports.saleReportByDate');
    }

    public  function invoiceInfo($invoice){
        $invoiceInfos = DB::table('sale_invoices')
            ->where('saleInvoice_no',$invoice)
            ->get();
        $invoiceItems =  DB::table('sale_items')
            ->where('saleInvoice_no',$invoice)
            ->get();

        $customers = DB::table('customer')
            ->where('saleInvoice_no',$invoice)
            ->join('sale_invoices','customer.customer_name','=','sale_invoices.saleInvoice_customerName')
            ->select('customer.*')
            ->get();
        view()->share('customers',$customers);

        $companys = DB::table('company')->get();
        view()->share('companys',$companys);

        return view('admin.report.saleReports.invoiceInformation')
            ->with('invoiceInfos',$invoiceInfos)
            ->with('invoiceItems',$invoiceItems);
    }
    public function dateWiseReports(Request $request)
    {
        $fromdate = $request->fDate;
        view()->share('fromdate',$fromdate);

        $todate = $request->tDate;
        view()->share('todate',$todate);

        $companys = DB::table('company')->get();
        view()->share('companys',$companys);

        $invoiceByDates = DB::table('sale_invoices')
            ->whereBetween('saleInvoice_date', [$fromdate, $todate])
            ->select('sale_invoices.*')
            ->orderBy('saleInvoice_date', 'ASC')
            ->get();
        view()->share('invoiceByDates', $invoiceByDates);

        $subtotalSum = $invoiceByDates->sum('saleInvoice_subTotal');
        view()->share('subtotalSum', $subtotalSum);

        $discountSum = $invoiceByDates->sum('saleInvoice_discountAmount');
        view()->share('discountSum', $discountSum);

        $totalPayableSum = $invoiceByDates->sum('saleInvoice_subTotal');
        view()->share('totalPayableSum', $totalPayableSum);

        return view('admin.report.saleReports.date_wise_reports');
    }

    public function productSaleReturn(Request $request){
        $cartItems = Cart::content();
        view()->share('cartItems',$cartItems);

        $invoice = $request->input('returnInvoiceNumber');
        view()->share('invoice',$invoice);

        $invoiceInfos =  DB::table('sale_invoices')->where('saleInvoice_no',$invoice)->get();
        view()->share('invoiceInfos',$invoiceInfos);

        $invoiceItems = DB::table('sale_items')->where('saleInvoice_no',$invoice)->get();
        view()->share('invoiceItems',$invoiceItems);

        $customers = DB::table('customer')->get();
        view()->share('customers',$customers);

       return view('admin.productsales.returnProduct_sales');
    }

    public function FilterCustomerInvoice(Request $request){
        $name = $request->name;
        $results = DB::table("sale_invoices")
            ->where("saleInvoice_customerName",$name)
            ->pluck('saleInvoice_no','saleInvoice_no');
        return json_encode($results);
    }

//    public function getInvoiceInfo(Request $request){
//        $invoice = $request->invoiceNo;
//
//        $items = DB::table('sale_items')
//            ->where('saleInvoice_no',$invoice)
//            ->get();
//
//
//        $invoiceInfos = DB::table('sale_invoices')
//            ->where('saleInvoice_no',$invoice)
//            ->get();
//        $invoiceItems='';
//        $i=1;
//        foreach ($items as $item) {
//            $invoiceItems .= '<tr>
//                          <td>'. $i++ .'</td>
//                          <td>' . $item->saleItem_description . '</td>
//                          <td>' . $item->saleItem_quantity . '</td>
//                          <td>' . $item->saleItem_total . '</td>
//                          <td><button  data-toggle="modal" data-target="#exampleModal" class=" editItem btn btn-info"><i class="fa fa-plus-circle "></i> </button></td>
//                          </tr>';
//        }
//
//        return response()->json(['invoice'=>$invoiceInfos,'item'=>$invoiceItems]);
//    }

    public function getEditData(Request $request)
    {
        $id = $request->id;
        $geteditdata = DB::table('sale_items')
            ->where('saleItem_id',$id)
            ->get();
        return response()->json($geteditdata);

    }

    public function updateReturn(Request $request){
        $quantitys = $request->input('quantity');
         Cart::add(['id' => $request->input('id'),
            'name' => $request->input('description'),
            'qty' =>  $quantitys,
            'price' => $request->input('price'),
            'options' => ['invoice' => $request->input('invoice')]

            ]);

    }

    public function confirmSalesReturn(){
        foreach(Cart::content() as $row) {
            $mdata = array(
                'saleInvoice_no' => $row->options->invoice,
                'salesReturn_description' => $row->name,
                'salesReturn_quantity' => $row->qty,
                'salesReturn_price' => $row->price
            );

            $insert = DB::table('sales_returns')->insert($mdata);

        }
        Cart::destroy();
       return redirect('/Product/SaleReturn');
    }
}