<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Auth;
use Route;
use Illuminate\Http\Request;

class EmployeeController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->middleware('admin');
    }

    public function getEmployerData() {

        return view('admin.employee.employee-list');
    }
    public function addEmployee() {

        return view('admin.employee.employee-add');
    }

}
