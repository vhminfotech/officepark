<?php

namespace App\Http\Controllers\Customer;


use App\User;
use App\Model\Addressbook;
use App\Model\OrderInfo;
use App\Http\Controllers\Controller;
use Auth;
use Route;
use Illuminate\Http\Request;
use Config;

class CustomerController extends Controller {
    
    public function __construct() {
        parent::__construct();
        $this->middleware('customer');
    }

    public function dashboard(Request $request){
        $data['detail'] = $this->loginUser;
        $data['customer_id'] = $data['detail']['id'];
        $year = (empty($request->get('year'))) ? '' : $request->get('year');
        $month = (empty($request->get('month'))) ? '' : $request->get('month');
        $method = (empty($request->get('payment_method'))) ? '' : $request->get('payment_method');
        
        $data['year'] = $year;
        $data['month'] = $month;
        $data['method'] = $method;
        
        $data['plan_message'] = Config::get('constants.plan_message');
        $data['plan_status'] = Config::get('constants.plan_status');
        $data['plan_mo_no'] = Config::get('constants.plan_mo_no');
        $data['plan_info'] = Config::get('constants.plan_info');
        return view('customer.dashboard', $data);
    }
    

    
}