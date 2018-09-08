<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Auth;
use Route;
use Illuminate\Http\Request;
use Config;

class EmployeeController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->middleware('admin');
    }

    public function getEmployerData() {

        return view('admin.employee.employee-list');
    }
    public function addEmployee() {
        $data['call_back_msg'] = Config::get('constants.call_back_msg');
        $data['p_away_msg'] = Config::get('constants.p_away_msg');
        $data['responsibility'] = Config::get('constants.responsibility');
        $data['job_title'] = Config::get('constants.job_title');

        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('admin/employee.js');
        $data['funinit'] = array('Employee.list_init()');
        $data['css'] = array('');

        return view('admin.employee.employee-add',$data);
    }

}
