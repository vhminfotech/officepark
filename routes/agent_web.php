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
$ageentPrefix = "agent";
Route::group(['prefix' => $ageentPrefix, 'middleware' => ['agent']], function() {
    Route::match(['get', 'post'], 'agent-dashboard', ['as' => 'agent-dashboard', 'uses' => 'Agent\AgentController@dashboard']);
});
