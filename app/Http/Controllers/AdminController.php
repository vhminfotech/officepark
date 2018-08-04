<?php

namespace App\Http\Controllers;

use App\User;
use App\Model\Users;
use App\Http\Controllers\Controller;
use Auth;
use Route;
use Illuminate\Http\Request;

//use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Illuminate\Http\Request;

class AdminController extends Controller {

    public function __construct() {
        parent::__construct();

        $this->middleware('admin');
        //$this->middleware('guest:admin', ['except' => ['subDashboard']]);
        //$this->middleware('guest:subadmin', ['except' => ['mainDashboard', 'subDashboard']]);
    }

    public function dashboard() {

        $data['detail'] = $this->loginUser;
        return view('admin.dashboard', $data);
    }

    public function getUserData() {
        
        
        $objUser = new Users(); 
        $userList =  $objUser->gtUsrLlist();
//        print_r($userList );exit;
        $data['detail'] = $this->loginUser;
        return view('admin.user-list', $data);
    }

    public function addUser(Request $request) {
        $data['detail'] = $this->loginUser;
        if ($request->isMethod('post')) {
            print_r($request->input());exit;

        }
        
        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/customer.js');
        $data['funinit'] = array('Customer.addInit()');


        return view('admin.add-user', $data);
    }

}