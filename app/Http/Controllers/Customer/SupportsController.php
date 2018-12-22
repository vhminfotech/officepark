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
use Config;


class SupportsController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->middleware('customer');
    }

    public function supportsList(Request $request) {
        $data['detail'] = $this->loginUser;
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('customer/supports.js', 'ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('Supports.list_init()');
        $data['css'] = array('');
        $userName=$data['customer_id']=$data['detail']['id'];
        return view('customer.support.support-list', $data);
    }
    
    public function addSupport(Request $request) {
        $data['detail'] = $this->loginUser;
        $userName=$data['customer_id']=$data['detail']['id'];
        if ($request->isMethod('post')) {
            // $objEmployee = new Employee();
            // $employeeId = $objEmployee->saveEmployeeInfo($request);
            // if ($employeeId == true) {
            //     $objEmployeeDetails = new EmployeeDetails();
            //     $arrEmployeeDetails = $objEmployeeDetails->saveEmployeeDetail($request, $employeeId);
            //     if ($arrEmployeeDetails == true) {
            //         $return['status'] = 'success';
            //         $return['message'] = 'Employee add successfully.';
            //         $return['redirect'] = route('employee-customer');
            //     }
            // } else {
            //     $return['status'] = 'error';
            //     $return['message'] = 'Email already exists.';
            // }
            // echo json_encode($return);
            // exit;
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
            case 'getPopupData':echo 'fsd';exit;
                $deleteId = $request->input('data')['id'];
                echo json_encode($return);
                exit;
                break;
        }
    }

}
