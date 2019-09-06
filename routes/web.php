<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


// Master Setup Route Here

Route::get('/company', 'Master\MastersetupController@company_list')->name('company-list');
Route::post('/insert-company', 'Master\MastersetupController@Store_company');
// branch
Route::get('/branch', 'Master\MastersetupController@Branch_list')->name('branch-list');
Route::post('/insert-branch', 'Master\MastersetupController@Store_branch');


// Customer Route Here

Route::get('/customers', 'Customer\CustomerController@Customer_list')->name('customer-list');
Route::post('/insert-customer', 'Customer\CustomerController@Store_customer');
Route::get('/deletecustomer/{id}',['uses'=>'Customer\CustomerController@deletecustomer','as'=>'deletecustomer']);
Route::get('/Edite-customer/{id}',['uses'=>'Customer\CustomerController@editecustomer','as'=>'editecustomer']);
Route::post('/Edite-customer-update-main',['uses'=>'Customer\CustomerController@updatecustomer','as'=>'updatecustomer']);
//Route::get('/customer-status/{id}/status',['uses'=>'Customer\CustomerController@status','as'=>'customerstatus']);


// Supplier Route Here

Route::get('/suppliers', 'Supplier\SupplierController@Supplier_list')->name('supplier-list');
Route::post('/insert-supplier', 'Supplier\SupplierController@Store_supplier');
Route::get('/deletesupplier/{id}',['uses'=>'Supplier\SupplierController@deletesupplier','as'=>'deletesupplier']);
Route::get('/Edite-supplier/{id}',['uses'=>'Supplier\SupplierController@editesupplier','as'=>'editesupplier']);
Route::post('/Edite-supplier-update-main',['uses'=>'Supplier\SupplierController@updatesupplier','as'=>'updatesupplier']);

// C AND F Route Here

Route::get('/C-AND-F', 'Supplier\SupplierController@Candf_list')->name('candf-list');
Route::post('/insert-candf', 'Supplier\SupplierController@Store_candf');
Route::get('/delete_c_f/{id}',['uses'=>'Supplier\SupplierController@delete_c_f','as'=>'delete_c_f']);
Route::get('/Edite-C-and-F/{id}',['uses'=>'Supplier\SupplierController@editeCanf_page','as'=>'editecandf']);
Route::post('/Edite-C-and-F-update-main',['uses'=>'Supplier\SupplierController@updatecandf','as'=>'updatecandf']);



// Purchase Route Here

// Local Purchase
Route::get('/local-purchase', 'Purchase\PurchaseController@Local_purchaselist')->name('local-purchase');
Route::post('/insert-cartlocalpurchase', 'Purchase\PurchaseController@Store_cartlocalpurchase');
Route::get('/Temp_localperches', 'Purchase\PurchaseController@Temp_localpurcheslist')->name('Temp_localperches');
Route::post('/update-temp-local/{id}', 'Purchase\PurchaseController@Update_templocal');
Route::get('/delete/{id}/templocal', 'Purchase\PurchaseController@Delete_templocal');
Route::post('/confirm-localpurchase', 'Purchase\PurchaseController@Confirm_localpurchase');
Route::get('/bardode-gererate', 'Purchase\PurchaseController@bardode_gererate')->name('bardode-gererate');
Route::get('/bercode-generate/filter','Purchase\PurchaseController@searchbercode')->name('filterbercode');



//Route::post('selectbatch','Purchase\PurchaseController@addrow')->name('selectbatch');
// Lc Purchase


 Route::get('/lc-purchase', 'Purchase\PurchaseController@Lc_purchaselist')->name('lc-purchase');
 Route::post('/insert-cartlcpurchase', 'Purchase\PurchaseController@Store_templcpurchase');
 Route::get('/Temp_lcpurchase', 'Purchase\PurchaseController@Temp_lcpurchaselist')->name('Temp_lcpurchase');
 Route::post('/update-temp-lcquantity/{id}', 'Purchase\PurchaseController@Update_lcquentity');
 Route::get('/delete/{id}/templcpur', 'Purchase\PurchaseController@Delete_templcpurchase');
 Route::post('/confirm-lcpurchase', 'Purchase\PurchaseController@Confirm_lcpurchase');




// Purchase Return Route Here
 Route::get('/return-purchases', 'Purchase\PurchaseController@Return_purchaselist')->name('return-purchases');
 Route::get('/purchace-customerInvoice-search', 'Purchase\PurchaseController@customerInvoice')->name('customerInvoice');
// Purchase Route End

// Stock Report
 Route::get('/stock-report',['uses'=>'stockController@index','as'=>'headofficestock']);



// // Sales Route Here

 Route::get('/product-sale/',['uses'=>'productsale@index','as'=>'productsale']);
Route::post('/product-sale/fetch',['uses'=>'productsale@fetch','as'=>'autocomplete.fetch']);
Route::get('/product-sale/info', 'productsale@findCustomer')->name('findCustomer');
Route::post('/Search/Products/','productsale@searchProducts')->name('searchingdata');
Route::get('/Cart/Delete/{description}','productsale@getRemoveItem')->name('product.delete');
Route::get('/Cart/Clean','productsale@cleanCart')->name('sessions');
Route::post('/Sales/InvoiceAdd','productsale@addSaleInvoice')->name('addSaleInvoice');
//---------------------return sales--------------------------------------------------------------------
Route::get('/Product/SaleReturn','productsale@productSaleReturn')->name('productsaleReturn');
Route::get('/Product/SaleReturn/Filter/Customer/Invoice','productsale@FilterCustomerInvoice')->name('FilterCustomerInvoice');
Route::get('/Product/SaleReturn/EditData','productsale@getEditData')->name('getEditData');
Route::post('/Product/UpdateReturn','productsale@updateReturn')->name('updateReturn');
Route::post('/Product/Confirm/SalesReturn','productsale@confirmSalesReturn')->name('confirmSalesReturn');

// Route::get('/sales', 'Sale\SaleController@Sales_list')->name('sales');
// ======================SalesMan route ===================================
Route::get('SalesMan/Info','SalesManController@index')->name('salesman');
Route::post('SalesMan/store','SalesManController@store')->name('add_salesMans');
Route::get('SalesMans/status/{id}','SalesManController@salesMans_status')->name('salesMans_status');


// ======================Groutp route ===================================
Route::get('/group-setup',['uses'=>'groupcontroller@index','as'=>'groupsetup']);
Route::post('/group-add',['uses'=>'groupcontroller@addgroup','as'=>'groupadd']);
Route::get('/group-status/{id}/status',['uses'=>'groupcontroller@status','as'=>'gstatus']);
Route::get('/group-update/{id}/edit',['uses'=>'groupcontroller@groupeditform','as'=>'editegroup']);
Route::post('/group-update-main',['uses'=>'groupcontroller@updategroupthis','as'=>'updategroupas']);
Route::get('/gropu-delete/{id}',['uses'=>'groupcontroller@deletegroup','as'=>'deletegroup']);

// ======================Brand route ===================================

Route::get('/barnd-setup',['uses'=>'brandcontroller@index','as'=>'brandsetup']);
Route::post('/brand-add',['uses'=>'brandcontroller@addbrand','as'=>'addbrand']);
Route::get('/brand-status/{id}/active-inactin',['uses'=>'brandcontroller@updatestatus','as'=>'status']);
Route::get('/brand-edit-form/{id}/brand-edit',['uses'=>'brandcontroller@editbrand','as'=>'brandedit']);
Route::post('/band-update/',['uses'=>'brandcontroller@updatebrand','as'=>'updatebrand']);
Route::get('/brand-delete/{id}/delete',['uses'=>'brandcontroller@deletebrand','as'=>'deletebrand']);

// ==================================Category route=========================================

Route::get('/category-setup',['uses'=>'categorycontroller@index','as'=>'categorystup']);
Route::post('/category-add',['uses'=>'categorycontroller@postcategory','as'=>'addcategroy']);
Route::get('/category-status/{id}/status',['uses'=>'categorycontroller@statusupdate','as'=>'categorystatus']);
Route::get('/category-update/{id}/category',['uses'=>'categorycontroller@categoryupdateform','as'=>'categoryedit']);
Route::post('/category-update/action',['uses'=>'categorycontroller@updatecategory','as'=>'updatecategory']);
Route::get('/category-delete/{id}',['uses'=>'categorycontroller@deletecategory','as'=>'categorydelete']);


// ==============================User Route=================================================

Route::get('/user-date',['uses'=>'usercontroller@index','as'=>'user']);
Route::post('/user-info',['uses'=>'usercontroller@userinfo','as'=>'userinfo']);
Route::get('/user-status/{id}/status',['uses'=>'usercontroller@userstatus','as'=>'userstatus']);
Route::get('/user-rodel-delete/{id}',['uses'=>'usercontroller@deleteuser','as'=>'statusdeletemy']);
Route::get('/profile',['uses'=>'usercontroller@user_profile','as'=> 'user_profile']);


// ================================local purchase report =================================

Route::get('/local-purchases/report',['uses'=>'localpurchasesController@index','as'=>'localpuchasesreport']);
Route::get('/local-purchase/searce',['uses'=>'localpurchasesController@localpurchase','as'=>'findsupperid']);
Route::get('/local-purchase/searce/find',['uses'=>'localpurchasesController@datesearce','as'=>'localpurses-date-searce']);
Route::get('/invoice/report/{id}{sid}',['uses'=>'localpurchasesController@invoice','as'=>'implemtentinvoice']);

//=================================L C purchase report ====================================================================
Route::get('/lc-purchases-report-search',['uses'=>'Purchase\PurchaseController@lc_report_generat_page','as'=>'lc_report_generate_page']);
Route::get('/lc-purchases-searchby-supplier',['uses'=>'Purchase\PurchaseController@search_by_supplier','as'=>'search_by_supplier']);
Route::get('/lc-purchases-searchby-supplier/lc-invoice/{id}',['uses'=>'Purchase\PurchaseController@show_lc_invoice','as'=>'show_lc_invoice']);
Route::get('/lc-purchases-searchby-date',['uses'=>'Purchase\PurchaseController@search_by_date','as'=>'search_by_date']);

//========================Bercode Add To Cart===========================

Route::get('/bercode','Purchase\PurchaseController@barcode')->name('Bardode');
Route::get('/filter/editforAdd','Purchase\PurchaseController@addbercodeqty')->name('addbercodeqty');
Route::post('/filter/addBercode/Lists','Purchase\PurchaseController@addBercodeLists')->name('addBercodeLists');
Route::get('/filter/print/Bercode','Purchase\PurchaseController@printBercode')->name('printBercode');
Route::get('/bercode/distroyCart','Purchase\PurchaseController@distroyCart')->name('distroyCart');

//================================Sales Reports========================================================================
Route::get('/Sales/dateWiseReport','productsale@dateWiseReport')->name('dateWiseReport');
Route::get('/Sales/Invoice/Info/{invoice}','productsale@invoiceInfo')->name('invoiceInfo');
Route::get('/Sales/dateWiseReports','productsale@dateWiseReports')->name('dateWiseReports');

