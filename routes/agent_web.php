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
    Route::match(['get', 'post'], 'incoming-call', ['as' => 'incoming-call', 'uses' => 'Agent\IncomingCallController@index']);
    Route::match(['get', 'post'], 'incomingcalls-ajaxAction', ['as' => 'IncomingcallsAjaxAction', 'uses' => 'Agent\IncomingCallController@ajaxcall']);
    Route::match(['get', 'post'], 'agent-send-email', ['as' => 'agent-send-email', 'uses' => 'Agent\IncomingCallController@sendMail']);
    Route::match(['get', 'post'], 'agent-add-template', ['as' => 'agent-add-template', 'uses' => 'Agent\IncomingCallController@addTempate']);
});
