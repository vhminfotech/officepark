<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\User;
use App\Model\Addressbook;
use App\Model\Customer;
use App\Model\Users;
use App\Model\Invoice;
use App\Model\Calls;
use App\Model\Customer_plan;
use App\Model\Customer_info;
use App\Model\Customer_details;
use App\Model\OrderInfo;
use Auth;
use Route;
use Illuminate\Http\Request;
use Config;
use App\Model\Employee;

class PlanController extends Controller {
    
    public function __construct() {
        parent::__construct();
        $this->middleware('customer');
    }
  
    
    public function planlist(Request $request){
        $data['detail'] = $this->loginUser;
        $data['customer_id'] = $data['detail']['id'];
        $objcustomeplan = new Customer_plan;
        $data['planlist']=$objcustomeplan->planlist($data['customer_id']);
        
        $data['arrTime'] = Config::get('constants.arrTimeV2');
        $data['plan_status'] = Config::get('constants.plan_status');
        $data['msg'] = Config::get('constants.msg');
        $data['responsibility'] = Config::get('constants.responsibility');
        $data['call_back_msg'] = Config::get('constants.call_back_msg');
        $objEmployee=new Employee;
        $data['employessList']=$objEmployee->getemployeeList($data['customer_id']);
        
        $data['plan_message'] = Config::get('constants.plan_message');
        $data['plan_status'] = Config::get('constants.plan_status');
        $data['plan_mo_no'] = Config::get('constants.plan_mo_no');
        $data['plan_info'] = Config::get('constants.plan_info');
        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('customer/plan.js');
        $data['funinit'] = array('Plan.init()');
        return view('customer.plan.planlist', $data);
    }
    
    public function addplanlist(Request $request){
        $data['detail'] = $this->loginUser;
        $data['customer_id'] = $data['detail']['id'];
        $data['arrTime'] = Config::get('constants.arrTimeV2');
        $data['plan_status'] = Config::get('constants.plan_status');
        $data['msg'] = Config::get('constants.msg');
        $data['responsibility'] = Config::get('constants.responsibility');
        $data['call_back_msg'] = Config::get('constants.call_back_msg');
        $objEmployee=new Employee;
        $data['employessList']=$objEmployee->getemployeeList($data['customer_id']);
        
            if ($request->isMethod('post')) {
                $objcustomeplan = new Customer_plan;
                $addplan=$objcustomeplan->addplanlist($request); 

                if ($addplan) {
                    $return['status'] = 'success';
                    $return['message'] = 'Plan created successfully.';
                    $return['redirect'] = route('customer-plan');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'something will be wrong.';
                }
                echo json_encode($return);
                exit;
            }
        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('customer/plan.js');
        $data['funinit'] = array('Plan.init()');
        return view('customer.plan.addplanlist', $data);
    }
    
    
    public function editplan($id,Request $request){
        $data['detail'] = $this->loginUser;
        $data['customer_id'] = $data['detail']['id'];
        
        $data['arrTime'] = Config::get('constants.arrTimeV2');
        $data['plan_status'] = Config::get('constants.plan_status');
        $data['msg'] = Config::get('constants.msg');
        $data['responsibility'] = Config::get('constants.responsibility');
        $data['call_back_msg'] = Config::get('constants.call_back_msg');
        
        $objEmployee=new Employee;
        $data['employessList']=$objEmployee->getemployeeList($data['customer_id']);
        $objcustomeplan = new Customer_plan;
        $data['editplan']=$objcustomeplan->editplanlist($id); 
        
        if ($request->isMethod('post')) {
                $objcustomeplan = new Customer_plan;
                $editplan=$objcustomeplan->editsaveplanlist($request); 
                if ($editplan) {
                    $return['status'] = 'success';
                    $return['message'] = 'Plan edit successfully.';
                    $return['redirect'] = route('customer-plan');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'something will be wrong.';
                }
                echo json_encode($return);
                exit;
            }
        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('customer/plan.js');
        $data['funinit'] = array('Plan.edit()');
        return view('customer.plan.editplanlist', $data);
    }
    
    
    public function ajaxAction(Request $request) {
       if ($request->isMethod('post')){
           $deleteId=$request->input('id');
           $objcustomeplan = new Customer_plan;
           
            $delete=$objcustomeplan->deleteplan($deleteId);
            
            if ($delete == true) {
                    $return['status'] = 'success';
                    $return['message'] = 'Plan Delete successfully.';
                    $return['redirect'] = route('customer-plan');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'Something goes to wrong.';
                }
                echo json_encode($return);
                exit;
            }
          
        }

}