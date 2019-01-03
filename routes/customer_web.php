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
$customerPrefix = "customer";
Route::group(['prefix' => $customerPrefix, 'middleware' => ['customer']], function() {
    Route::match(['get', 'post'], 'customer-dashboard', ['as' => 'customer-dashboard', 'uses' => 'Customer\CustomerController@dashboard']);
    Route::match(['get', 'post'], 'address-book-list-customer', ['as' => 'address-book-list-customer', 'uses' => 'Customer\AddressbookController@getAddressbookData']);
    Route::match(['get', 'post'], 'address-book-add-customer', ['as' => 'address-book-add-customer', 'uses' => 'Customer\AddressbookController@addAddressbook']);
    Route::match(['get', 'post'], 'address-book-edit-customer/{id}', ['as' => 'address-book-edit-customer', 'uses' => 'Customer\AddressbookController@editAddressbook']);
     Route::match(['get', 'post'], 'address-book-delete-customer', ['as' => 'address-book-delete-customer', 'uses' => 'Customer\AddressbookController@deleteAddressbook']);
    
    
    
    Route::match(['get', 'post'], 'employee-customer', ['as' => 'employee-customer', 'uses' => 'Customer\EmployeeController@getEmployerData']);
    Route::match(['get', 'post'], 'employee-editcustomer/{id}', ['as' => 'employee-editcustomer', 'uses' => 'Customer\EmployeeController@editEmployerData']);
    Route::match(['get', 'post'], 'employee-add-customer', ['as' => 'employee-add-customer', 'uses' => 'Customer\EmployeeController@addEmployee']);
    Route::match(['get', 'post'], 'employee-customer-ajaxAction', ['as' => 'ajaxAction', 'uses' => 'Customer\EmployeeController@ajaxAction']);

     Route::match(['get', 'post'], 'customer-invoice-list', ['as' => 'customer-invoice-list', 'uses' => 'Customer\InvoiceController@index']);
    Route::match(['get', 'post'], 'customer-invoice-pdf/{id}', ['as' => 'customer-invoice-pdf', 'uses' => 'Customer\InvoiceController@createPDF']);
    // Route::match(['get', 'post'], 'customer-invoice-pdf', ['as' => 'customer-invoice-pdf', 'uses' => 'Customer\InvoiceController@createPDF']);
    Route::match(['get', 'post'], 'customer-invoice-pdfV2', ['as' => 'customer-invoice-pdfV2', 'uses' => 'Customer\InvoiceController@createPDFV2']);
    Route::match(['get', 'post'], 'customer-invoice-pdfV3', ['as' => 'customer-invoice-pdfV3', 'uses' => 'Customer\InvoiceController@createPDFV3']);
    Route::match(['get', 'post'], 'customer-add-invoice/{id}', ['as' => 'customer-add-invoice', 'uses' => 'Customer\InvoiceController@createInvoice']);
    Route::match(['get', 'post'], 'customer-delete-invoice', ['as' => 'customer-delete-invoice', 'uses' => 'Customer\InvoiceController@deleteInvoice']);
    Route::match(['get', 'post'], 'customer-invoice-packege-detail', ['as' => 'customer-invoice-packege-detail', 'uses' => 'Customer\InvoiceController@invoicePackegeDetail']);
    Route::match(['get', 'post'], 'customer-change-status', ['as' => 'customer-change-status', 'uses' => 'Customer\InvoiceController@changeStatus']);


    Route::match(['get', 'post'], 'customer-calls', ['as' => 'customer-calls', 'uses' => 'Customer\CallController@index']);
    Route::match(['get', 'post'], 'customer-send-email', ['as' => 'customer-send-email', 'uses' => 'Customer\CallController@sendMail']);
    Route::match(['get', 'post'], 'customer-send-email-bigpopup', ['as' => 'customer-send-email-bigpopup', 'uses' => 'Customer\CallController@sendMailbigPopup']);
    Route::match(['get', 'post'], 'customer-add-template', ['as' => 'customer-add-template', 'uses' => 'Customer\CallController@addTempate']);
    Route::match(['get', 'post'], 'customer-callchat/{id}', ['as' => 'customer-callchat', 'uses' => 'Customer\CallController@callchat']);
    Route::match(['get', 'post'], 'customer-callchatlist', ['as' => 'customer-callchatlist', 'uses' => 'Customer\CallController@callchatlist']);
    Route::match(['get', 'post'], 'customer-calls-ajaxAction', ['as' => 'customer-ajaxAction', 'uses' => 'Customer\CallController@ajaxAction']); 
    Route::match(['get', 'post'], 'customer-callsupport-closechat', ['as' => 'customer-callsupport-closechat', 'uses' => 'Customer\CallController@closechat']);
    
    Route::match(['get', 'post'], 'customer-edit-profile', ['as' => 'customer-edit-profile', 'uses' => 'Customer\ProfileController@editprofile']);
    
    Route::match(['get', 'post'], 'customer-plan', ['as' => 'customer-plan', 'uses' => 'Customer\PlanController@planlist']);
    Route::match(['get', 'post'], 'customer-edit-plan/{id}', ['as' => 'customer-edit-plan', 'uses' => 'Customer\PlanController@editplan']);
    Route::match(['get', 'post'], 'add-plan-customer', ['as' => 'add-plan-customer', 'uses' => 'Customer\PlanController@addplanlist']);
    Route::match(['get', 'post'], 'plan-delete', ['as' => 'plan-delete', 'uses' => 'Customer\PlanController@ajaxAction']);
    
    
    Route::match(['get', 'post'], 'customer-outgoing-call', ['as' => 'customer-outgoing-call', 'uses' => 'Customer\OutgoingCallsController@outgoingcalls']);
    Route::match(['get', 'post'], 'customer-new-outgoing-call', ['as' => 'customer-new-outgoing-call', 'uses' => 'Customer\OutgoingCallsController@addoutgoingcalls']);
    Route::match(['get', 'post'], 'customer-edit-outgoing-call/{id}', ['as' => 'customer-edit-outgoing-call', 'uses' => 'Customer\OutgoingCallsController@editoutgoingcalls']);
    Route::match(['get', 'post'], 'outgoingcalls-ajaxAction', ['as' => 'outgoingcalls-ajaxAction', 'uses' => 'Customer\OutgoingCallsController@ajaxAction']);

    Route::match(['get', 'post'], 'customer-change-password', ['as' => 'customer-change-password', 'uses' => 'Customer\ProfileController@changepassword']);

    Route::match(['get', 'post'], 'customer-support', ['as' => 'customer-support', 'uses' => 'Customer\SupportsController@supportsList']);
    Route::match(['get', 'post'], 'support-chat/{id}', ['as' => 'support-chat', 'uses' => 'Customer\SupportsController@supportchat']);
    Route::match(['get', 'post'], 'customer-edit-support/{id}', ['as' => 'customer-edit-support', 'uses' => 'Customer\SupportsController@editcustomer']);
    Route::match(['get', 'post'], 'customer-add-support', ['as' => 'customer-add-support', 'uses' => 'Customer\SupportsController@addSupport']);
     Route::match(['get', 'post'], 'support-ajaxAction', ['as' => 'support-ajaxAction', 'uses' => 'Customer\SupportsController@ajaxAction']);
   Route::match(['get', 'post'], 'customer-closechat', ['as' => 'customer-closechat', 'uses' => 'Customer\SupportsController@closechat']);
});
