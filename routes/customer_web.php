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
});
