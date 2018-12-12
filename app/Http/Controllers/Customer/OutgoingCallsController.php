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
use App\Model\OutgoingCalls;
use App\Model\OrderInfo;
use Auth;
use Route;
use Illuminate\Http\Request;
use Config;

class OutgoingCallsController extends Controller {
    
    public function __construct() {
        parent::__construct();
        $this->middleware('customer');
    }
  
    
    public function outgoingcalls(Request $request){
        
        $data['detail'] = $this->loginUser;
        $data['customer_id'] = $data['detail']['id'];
        $data['gender'] = Config::get('constants.gender');
        $data['arrTime'] = Config::get('constants.arrTime');
        $objCalls = new OutgoingCalls();
        $data['outgoingCall'] = $objCalls->getOutgoingList($data['customer_id']);
     
        $data['css'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('customer/outgoingcalls.js');
        $data['funinit'] = array('Outgoingcalls.init()');
        
        return view('customer.outgoingcalls.outgoingcalls', $data);
    }
    
    public function addoutgoingcalls(Request $request){
        $data['detail'] = $this->loginUser;
        $data['customer_id'] = $data['detail']['id'];
        $data['gender'] = Config::get('constants.gender');
        $data['arrTime'] = Config::get('constants.arrTime');
        $objCalls = new OutgoingCalls();
        

        if ($request->isMethod('post')) {
            
            $result = $objCalls->addOutgoingCalls($request->input());
            if ($result == true) {
                $return['status'] = 'success';
                $return['message'] = 'Outgoing calls Add successfully.';
                $return['redirect'] = route('customer-outgoing-call');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Email already exists.';
            }
            echo json_encode($return);
            exit;
        }
        
        $data['css'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('customer/outgoingcalls.js');
        $data['funinit'] = array('Outgoingcalls.init()');
        
        return view('customer.outgoingcalls.addoutgoingcalls', $data);
    }
    
    public function editoutgoingcalls(Request $request,$id){

        $data['callList'] = OutgoingCalls::find($id);
        $data['detail'] = $this->loginUser;
        $data['customer_id'] = $data['detail']['id'];
        $data['gender'] = Config::get('constants.gender');
        $data['arrTime'] = Config::get('constants.arrTime');
        $objCalls = new OutgoingCalls();
        

        if ($request->isMethod('post')) {
            
            $result = $objCalls->editOutgoingCalls($request->input());
            if ($result == true) {
                $return['status'] = 'success';
                $return['message'] = 'Outgoing calls Edit successfully.';
                $return['redirect'] = route('customer-outgoing-call');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Email already exists.';
            }
            echo json_encode($return);
            exit;
        }
        $data['css'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('customer/outgoingcalls.js');
        $data['funinit'] = array('Outgoingcalls.init()');
        
        return view('customer.outgoingcalls.addoutgoingcalls', $data);
    }
    
    public function ajaxAction(Request $request) {
        $action = $request->input('action');

        switch ($action) {
            case 'deleteOutgoingcalls':
            $objCalls = new OutgoingCalls();
            $result = $objCalls->outgoingDelete($request->input('data'));
            break;
        }
    }
}