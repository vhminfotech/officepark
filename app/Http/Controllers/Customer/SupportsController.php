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
        $userName=$data['customer_id']=$data['detail']['id'];
        
        $objEmployee = new Employee();
        $data['employeeList'] = $objEmployee->employeeListCustomer($userName);
        $data['employeeCusList'] = $objEmployee->getemployeeCusList();
        $data['responsibility'] = Config::get('constants.responsibility');
        $data['job_title'] = Config::get('constants.job_title');
        $data['js'] = array('customer/employee.js');
        $data['funinit'] = array('Employee.list_init()');
        $data['userName'] = $userName;
        return view('customer.support.support-list', $data);
    }
    
      
    public function addSupport(Request $request) {
        $data['detail'] = $this->loginUser;
        $userName=$data['customer_id']=$data['detail']['id'];
        $data['call_back_msg'] = Config::get('constants.call_back_msg');
        $data['p_away_msg'] = Config::get('constants.p_away_msg');
        $data['responsibility'] = Config::get('constants.responsibility');
        $data['job_title'] = Config::get('constants.job_title');
        $data['arrTime'] = Config::get('constants.arrTime');
        $data['arrDayName'] = Config::get('constants.arrDayName');
        $objOrderInfo = new OrderInfo();
        $arrOrderInfo = $objOrderInfo->getCustomerDetails();
        $data['arrOrderInfo'] = $arrOrderInfo;
       
        if ($request->isMethod('post')) {
           
            $objEmployee = new Employee();
            $employeeId = $objEmployee->saveEmployeeInfo($request);
            if ($employeeId == true) {
                $objEmployeeDetails = new EmployeeDetails();
                $arrEmployeeDetails = $objEmployeeDetails->saveEmployeeDetail($request, $employeeId);
                if ($arrEmployeeDetails == true) {
                    $return['status'] = 'success';
                    $return['message'] = 'Employee add successfully.';
                    $return['redirect'] = route('employee-customer');
                }
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Email already exists.';
            }
            echo json_encode($return);
            exit;
        }
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('admin/employee.js', 'ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('Employee.list_init()');
        $data['css'] = array('');
        return view('customer.support.support-add', $data);
    }
    
    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        switch ($action) {
            case 'deleteEmployee':
                // $deleteId = $request->input('data')['id'];
                // $objEmployee = new Employee();
                // $arrEmployee = $objEmployee->deleteEmployee($deleteId);
                // $objEmployeeDetails = new EmployeeDetails();
                // $employeeDelete = $objEmployeeDetails->deleteEmpDetails($deleteId);
                // if ($employeeDelete == true) {
                //     $return['status'] = 'success';
                //     $return['message'] = 'Employee Delete successfully.';
                //     $return['redirect'] = route('employee-customer');
                // } else {
                //     $return['status'] = 'error';
                //     $return['message'] = 'Something goes to wrong.';
                // }
                // echo json_encode($return);
                // exit;
                // break;
        }
    }

}
