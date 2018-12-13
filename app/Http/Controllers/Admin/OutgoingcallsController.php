<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Auth;
use Route;
use Illuminate\Http\Request;
use App\Model\Employee;
use App\Model\EmployeeDetails;
use App\Model\OrderInfo;
use App\Model\Users;
use Config;
use App\Model\OutgoingCalls;

//use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Illuminate\Http\Request;

class OutgoingcallsController extends Controller {
    
    public function __construct() {
        parent::__construct();

        $this->middleware('admin');
    }
    
    public function outgoingcall(Request $request){
        $data['detail'] = $this->loginUser;
        $data['customer_id'] = $data['detail']['id'];
        $data['gender'] = Config::get('constants.gender');
        $data['arrTime'] = Config::get('constants.arrTime');
        $objCalls = new OutgoingCalls();
        $data['outgoingCall'] = $objCalls->OutgoingList();
        $data['css'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('admin/outgoingcalls.js');
        $data['funinit'] = array('Outgoingcalls.init()');
        
        return view('admin.outgoingcalls.outgoingcalls', $data);
    }
    
    public function newoutgoingcall(Request $request){
        $data['detail'] = $this->loginUser;
        $data['customer_id'] = $data['detail']['id'];
        $data['gender'] = Config::get('constants.gender');
        $data['arrTime'] = Config::get('constants.arrTime');
        
        $objUser=new Users;
        $data['users']=$objUser->gtCustomerlist();
        
        if ($request->isMethod('post')) {
            $objCalls=new OutgoingCalls;
            $result = $objCalls->addOutgoingCalls($request->input());
            if ($result == true) {
                $return['status'] = 'success';
                $return['message'] = 'Outgoing calls Add successfully.';
                $return['redirect'] = route('outgoing-call');
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
        
        return view('admin.outgoingcalls.addoutgoingcalls', $data);
    }
    
    
    public function editoutgoingcalls(Request $request,$id){

        $data['callList'] = OutgoingCalls::find($id);
        $data['detail'] = $this->loginUser;
        $data['customer_id'] = $data['detail']['id'];
        $data['gender'] = Config::get('constants.gender');
        $data['arrTime'] = Config::get('constants.arrTime');
        $objCalls = new OutgoingCalls();
        
        $objUser=new Users;
        $data['users']=$objUser->gtCustomerlist();

        if ($request->isMethod('post')) {
            
            $result = $objCalls->editOutgoingCalls($request->input());
            if ($result == true) {
                $return['status'] = 'success';
                $return['message'] = 'Outgoing calls Edit successfully.';
                $return['redirect'] = route('outgoing-call');
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
        
        return view('admin.outgoingcalls.addoutgoingcalls', $data);
    }
    
    public function ajaxAction(Request $request) {
        $action = $request->input('action');

        switch ($action) {
            case 'deleteOutgoingcalls':
            $objCalls = new OutgoingCalls();
            $result = $objCalls->outgoingDelete($request->input('data'));
            break;
        
            case 'completeOutgoingcalls':
            $objCalls = new OutgoingCalls();
            $result = $objCalls->outgoingComplete($request->input('data'));
            break;
        }
    }
}