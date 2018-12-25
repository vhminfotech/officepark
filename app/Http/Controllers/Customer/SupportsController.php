<?php

namespace App\Http\Controllers\Customer;

use App\User;
use App\Http\Controllers\Controller;
use Auth;
use Route;
use Illuminate\Http\Request;
use App\Model\Employee;
use App\Model\EmployeeDetails;
use App\Model\OrderInfo;
use App\Model\Users;
use App\Model\Support;
use Config;


class SupportsController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->middleware('customer');
    }

    public function supportsList(Request $request) {
        $data['detail'] = $this->loginUser;
        $userName=$data['customer_id']=$data['detail']['id'];
        $data['support_message'] = Config::get('constants.support_message');
        $objSupport = new Support();
        $data['supportArr'] = $objSupport->supportlist($userName);
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('customer/supports.js', 'ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('Supports.list_init()');
        $data['css'] = array('');
  
        return view('customer.support.support-list', $data);
    }
    
    public function addSupport(Request $request) {
        $data['detail'] = $this->loginUser;
        $userName = $data['customer_id']=$data['detail']['id'];
        $data['support_message'] = Config::get('constants.support_message');
        if ($request->isMethod('post')) {
            $objSupport = new Support();
            $employeeId = $objSupport->saveSupport($request,$userName); 

            if ($employeeId == true) {
                $return['status'] = 'success';
                $return['message'] = 'Support add successfully.';
                $return['redirect'] = route('customer-support');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Email already exists.';
            }
            echo json_encode($return);
            exit;
        }
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('customer/supports.js', 'ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('Supports.list_init()');
        $data['css'] = array('');
        return view('customer.support.support-add', $data);
    }
    
    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        switch ($action) {
             case 'getPopupData': 
                $id = $request->input('data')['id'];
                $objSupport = new Support();
                $data['supportArray'] = $objSupport->getSupport($id); 
                $data['support_message'] = Config::get('constants.support_message');
                $resultTable = view('customer.support.support-popup', $data)->render();
                echo $resultTable;
                exit;
                break;
        }
    }

}
