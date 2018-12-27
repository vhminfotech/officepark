<?php

namespace App\Http\Controllers\Customer;


use App\User;
use App\Model\Addressbook;
use App\Model\PanelSettings;
use App\Model\OrderInfo;
use App\Model\Calls;
use App\Model\Customer_plan;
use App\Model\Status;
use App\Http\Controllers\Controller;
use Auth;
use Route;
use Illuminate\Http\Request;
use Config;
use Session;
class CustomerController extends Controller {
    
    public function __construct() {
        parent::__construct();
        $this->middleware('customer');
    }

    public function dashboard(Request $request){
        $data['detail'] = $this->loginUser;
        $data['customer_id'] = $data['detail']['id'];
        $objStatus = new Status();
        $data['statusArr'] = $objStatus->statuslist($data['customer_id'],10);
        // print_r($res);exit;
        if ($request->isMethod('post')) {
            $objStatus = new Status();
            $employeeId = $objStatus->addStatus($request->input());  
            if ($employeeId == true) {
                $return['status'] = 'success';
                $return['message'] = 'Status add successfully.';
                $return['redirect'] = route('customer-dashboard');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Email already exists.';
            }
            echo json_encode($return);
            exit;
        }

        $objCall = new Calls();
        $data['todayCalls'] = $objCall->getCustomerDashbard('today',$data['customer_id']);
        $data['weekCalls'] =  $objCall->getCustomerDashbard('week',$data['customer_id']);
        $data['monthCalls'] = $objCall->getCustomerDashbard('month',$data['customer_id']);
        $data['yearCalls'] =  $objCall->getCustomerDashbard('year',$data['customer_id']);

        $objCustomerPlan=new Customer_plan;
        $data['status'] = $objCustomerPlan->getStatus($data['customer_id']);
        $data['message'] = $objCustomerPlan->getMessage($data['customer_id']);
        $data['number'] = $objCustomerPlan->getNumber($data['customer_id']);
        $data['information'] = $objCustomerPlan->getInformation($data['customer_id']);
        $objpanelsetting=new PanelSettings;
        $panelsettingdata= $objpanelsetting->getlastPanellist();
        session(['key' => $panelsettingdata]);
        
        $year = (empty($request->get('year'))) ? '' : $request->get('year');
        $month = (empty($request->get('month'))) ? '' : $request->get('month');
        $method = (empty($request->get('payment_method'))) ? '' : $request->get('payment_method');
        
        $data['year'] = $year;
        $data['month'] = $month;
        $data['method'] = $method;
        
        $data['plan_status'] = Config::get('constants.plan_status');
        $data['plan_message'] = Config::get('constants.msg');

        $data['responsibility'] = Config::get('constants.responsibility');
        $data['call_back_msg'] = Config::get('constants.call_back_msg');
        $data['gender'] = Config::get('constants.gender');     
        $data['plugincss'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('customer/dashboard.js','customer/calls.js');
        $data['funinit'] = array('Dashboard.Init()','Calls.list_init()');
        $data['css'] = array('');
        return view('customer.dashboard', $data);
    }
    
}