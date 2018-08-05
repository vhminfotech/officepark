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

Route::get('/', function() { return Redirect::to('login'); });

Route::match(['get', 'post'], 'login', ['as' => 'login', 'uses' => 'LoginController@auth']);
Route::match(['get', 'post'], 'logout', ['as' => 'logout', 'uses' => 'LoginController@getLogout']);
Route::match(['get', 'post'], 'register', ['as' => 'register', 'uses' => 'LoginController@auth']);


$userPrefix = "";
Route::group(['prefix' => $userPrefix, 'middleware' => ['auth']], function() {
    Route::match(['get', 'post'], 'user-dashboard', ['as' => 'user-dashboard', 'uses' => 'UserController@dashboard']);
});

$customerPrefix = "";
Route::group(['prefix' => $customerPrefix, 'middleware' => ['customer']], function() {
    Route::match(['get', 'post'], 'customer-dashboard', ['as' => 'customer-dashboard', 'uses' => 'CustomerController@dashboard']);
});
$ageentPrefix = "";
Route::group(['prefix' => $ageentPrefix, 'middleware' => ['agent']], function() {
    Route::match(['get', 'post'], 'agent-dashboard', ['as' => 'agent-dashboard', 'uses' => 'AgentController@dashboard']);
});

$adminPrefix = "";
Route::group(['prefix' => $adminPrefix, 'middleware' => ['admin']], function() {
    Route::match(['get', 'post'], 'admin-dashboard', ['as' => 'admin-dashboard', 'uses' => 'AdminController@dashboard']);
    Route::match(['get', 'post'], 'user-list', ['as' => 'user-list', 'uses' => 'AdminController@getUserData']);
    Route::match(['get', 'post'], 'add-user', ['as' => 'add-user', 'uses' => 'AdminController@addUser']);
    Route::match(['get', 'post'], 'edit-user/{id}', ['as' => 'edit-user', 'uses' => 'AdminController@editUser']);
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
