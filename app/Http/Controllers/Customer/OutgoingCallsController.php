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

class OutgoingCallsController extends Controller {
    
    public function __construct() {
        parent::__construct();
        $this->middleware('customer');
    }
  
    
    public function outgoingcalls(Request $request){
        
        $data['detail'] = $this->loginUser;
        $data['customer_id'] = $data['detail']['id'];
        $data['css'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array();
        $data['funinit'] = array();
        
        return view('customer.outgoingcalls.outgoingcalls', $data);
    }
    
    public function addoutgoingcalls(Request $request){
        $data['detail'] = $this->loginUser;
        $data['customer_id'] = $data['detail']['id'];
         $data['gender'] = Config::get('constants.gender');
        if ($request->isMethod('post')) {
            
        }
        $data['css'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('customer/outgoingcalls.js');
        $data['funinit'] = array('Outgoingcalls.init()');
        
        return view('customer.outgoingcalls.addoutgoingcalls', $data);
    }
    
    
    public function editoutgoingcalls($id=NULL,Request $request){
        $data['detail'] = $this->loginUser;
        $data['customer_id'] = $data['detail']['id'];
         $data['gender'] = Config::get('constants.gender');
        if ($request->isMethod('post')) {
            
        }
        $data['css'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('customer/outgoingcalls.js');
        $data['funinit'] = array('Outgoingcalls.edit()');
        
        return view('customer.outgoingcalls.editoutgoingcalls', $data);
    }
    
   
}