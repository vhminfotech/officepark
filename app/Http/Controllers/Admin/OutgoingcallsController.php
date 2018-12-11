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
        $data['css'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array();
        $data['funinit'] = array();
        
        return view('admin.outgoingcalls.outgoingcalls', $data);
    }
    
    public function newoutgoingcall(Request $request){
        $data['detail'] = $this->loginUser;
        $data['customer_id'] = $data['detail']['id'];
        $data['gender'] = Config::get('constants.gender');
        $data['arrTime'] = Config::get('constants.arrTime');
        if ($request->isMethod('post')) {
            
        }
        $data['css'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('customer/outgoingcalls.js');
        $data['funinit'] = array('Outgoingcalls.init()');
        
        return view('admin.outgoingcalls.addoutgoingcalls', $data);
    }
}