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


class EmployeeController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->middleware('customer');
    }

    public function getEmployerData(Request $request) {
        $data['detail'] = $this->loginUser;
        $userName=$data['detail']['id'];
        
        $objEmployee = new Employee();
        $data['employeeList'] = $objEmployee->employeeList($userName);
        $data['employeeCusList'] = $objEmployee->getemployeeCusList();
        $data['responsibility'] = Config::get('constants.responsibility');
        $data['job_title'] = Config::get('constants.job_title');
        $data['js'] = array('admin/employee.js');
        $data['funinit'] = array('Employee.list_init()');
        $data['userName'] = $userName;
        return view('admin.employee.employee-list', $data);
    }

}
