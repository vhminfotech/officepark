<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Auth;
use Route;
use Illuminate\Http\Request;
use App\Model\Employee;
use App\Model\EmployeeDetails;
use Config;

class EmployeeController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->middleware('admin');
    }

    public function getEmployerData() {
        $objEmployee = new Employee();
        $data['employeeList'] = $objEmployee->employeeList();
        $data['responsibility'] = Config::get('constants.responsibility');
        $data['job_title'] = Config::get('constants.job_title');
        return view('admin.employee.employee-list', $data);
    }

    public function addEmployee(Request $request) {
        $data['call_back_msg'] = Config::get('constants.call_back_msg');
        $data['p_away_msg'] = Config::get('constants.p_away_msg');
        $data['responsibility'] = Config::get('constants.responsibility');
        $data['job_title'] = Config::get('constants.job_title');
        $data['arrTime'] = Config::get('constants.arrTime');
        $data['arrDayName'] = Config::get('constants.arrDayName');

        if ($request->isMethod('post')) {
            
            $objEmployee = new Employee();
            $employeeId = $objEmployee->saveEmployeeInfo($request);
            if ($employeeId == true) {
                $objEmployeeDetails = new EmployeeDetails();
                $arrEmployeeDetails = $objEmployeeDetails->saveEmployeeDetail($request, $employeeId);
                if ($arrEmployeeDetails == true) {
                    $return['status'] = 'success';
                    $return['message'] = 'Employee add successfully.';
                    $return['redirect'] = route('employee');
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
        return view('admin.employee.employee-add', $data);
    }

    public function editEmployee(Request $request) {
        
        $data['call_back_msg'] = Config::get('constants.call_back_msg');
        $data['p_away_msg'] = Config::get('constants.p_away_msg');
        $data['responsibility'] = Config::get('constants.responsibility');
        $data['job_title'] = Config::get('constants.job_title');
        $data['arrTime'] = Config::get('constants.arrTime');
        $data['arrDayName'] = Config::get('constants.arrDayName');
        
        $objEmployee = new Employee();
        $data['arrEditEmp'] = $objEmployee->geteEmployeeEdit($request->id);
//        echo '<pre/>';
//        print_r($data['arrEditEmp']);exit;
        if ($request->isMethod('post')) {

            $objEmployee = new Employee();
            $arrEmployee = $objEmployee->editEmployeeInfo($request);
            $objEmployeeDetails = new EmployeeDetails();
            $arrEmployeeDetails = $objEmployeeDetails->saveEmployeeDetail($request, $request->input('empId'));
            
            if ($arrEmployeeDetails == true) {
                $return['status'] = 'success';
                $return['message'] = 'Employee Edit successfully.';
                $return['redirect'] = route('employee');
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
        return view('admin.employee.employee-edit', $data);
    }

}
