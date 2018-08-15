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

Route::get('/', function() { return Redirect::to('home'); });
//Route::get('/', function() { return Redirect::to('login'); });

Route::match(['get', 'post'], 'home', ['as' => 'home', 'uses' => 'Front\HomeController@index']);
Route::match(['get', 'post'], 'order', ['as' => 'order', 'uses' => 'Front\OrderController@index']);

Route::match(['get', 'post'], 'login', ['as' => 'login', 'uses' => 'LoginController@auth']);
Route::match(['get', 'post'], 'logout', ['as' => 'logout', 'uses' => 'LoginController@getLogout']);
Route::match(['get', 'post'], 'register', ['as' => 'register', 'uses' => 'LoginController@auth']);


$userPrefix = "";
Route::group(['prefix' => $userPrefix, 'middleware' => ['auth']], function() {
    Route::match(['get', 'post'], 'user-dashboard', ['as' => 'user-dashboard', 'uses' => 'UserController@dashboard']);
});




$adminPrefix = "admin";
Route::group(['prefix' => $adminPrefix, 'middleware' => ['admin']], function() {
    Route::match(['get', 'post'], 'admin-dashboard', ['as' => 'admin-dashboard', 'uses' => 'Admin\AdminController@dashboard']);
    Route::match(['get', 'post'], 'user-list', ['as' => 'user-list', 'uses' => 'Admin\AdminController@getUserData']);
    Route::match(['get', 'post'], 'add-user', ['as' => 'add-user', 'uses' => 'Admin\AdminController@addUser']);
    Route::match(['get', 'post'], 'edit-user/{id}', ['as' => 'edit-user', 'uses' => 'Admin\AdminController@editUser']);
    Route::match(['get', 'post'], 'user/ajaxAction', ['as' => 'ajaxAction', 'uses' => 'Admin\AdminController@ajaxAction']);

    
    Route::match(['get', 'post'], 'create-pdf/{id}', ['as' => 'create-pdf', 'uses' => 'Admin\SystemuserController@createPDF']);
    
    Route::match(['get', 'post'], 'system-user-list', ['as' => 'system-user-list', 'uses' => 'Admin\SystemuserController@getUserData']);
    Route::match(['get', 'post'], 'system-add-user', ['as' => 'system-add-user', 'uses' => 'Admin\SystemuserController@addUser']);
    Route::match(['get', 'post'], 'system-edit-user/{id}', ['as' => 'system-edit-user', 'uses' => 'Admin\SystemuserController@editUser']);
    Route::match(['get','post'], 'system-user-delete', ['as' => 'system-user-delete', 'uses' => 'Admin\SystemuserController@deleteUser']);
    
    Route::match(['get', 'post'], 'customer-list', ['as' => 'customer-list', 'uses' => 'Admin\CustomerController@getCustomerData']);
    Route::match(['get', 'post'], 'customer-add', ['as' => 'customer-add', 'uses' => 'Admin\CustomerController@addCustomer']);
    Route::match(['get', 'post'], 'customer-edit/{id}', ['as' => 'customer-edit', 'uses' => 'Admin\CustomerController@editCustomer']);

    Route::match(['get', 'post'], 'delete-customer', ['as' => 'delete-customer', 'uses' => 'Admin\CustomerController@customerDelete']);
    Route::match(['get', 'post'], 'customer-ajaxAction', ['as' => 'ajaxAction', 'uses' => 'Admin\CustomerController@ajaxAction']);

    
    Route::match(['get', 'post'], 'address-book-list', ['as' => 'address-book-list', 'uses' => 'Admin\AddressbookController@getAddressbookData']);
    Route::match(['get', 'post'], 'address-book-add', ['as' => 'address-book-add', 'uses' => 'Admin\AddressbookController@addAddressbook']);
    Route::match(['get', 'post'], 'address-book-edit/{id}', ['as' => 'address-book-edit', 'uses' => 'Admin\AddressbookController@editAddressbook']);
    Route::match(['get', 'post'], 'address-book-delete', ['as' => 'address-book-delete', 'uses' => 'Admin\AddressbookController@deleteAddressbook']);
    
    
    Route::match(['get', 'post'], 'order-list', ['as' => 'order-list', 'uses' => 'Admin\OrderController@index']);
    Route::match(['get', 'post'], 'view-order/{id}', ['as' => 'view-order', 'uses' => 'Admin\OrderController@viewOrder']);

});



/*
Route::group(['middleware' => ['web']], function () {
    Route::match(['get', 'post'], 'user-dashboard', ['as' => 'user-dashboard', 'uses' => 'UserController@dashboard']);
});

Route::group(['middleware' => ['customer']], function () {
    Route::match(['get', 'post'], 'customer-dashboard', ['as' => 'customer-dashboard', 'uses' => 'CustomerController@dashboard']);
});

Route::group(['middleware' => ['admin']], function () {
    Route::match(['get', 'post'], 'admin-dashboard', ['as' => 'admin-dashboard', 'uses' => 'AdminController@dashboard']);
});
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
