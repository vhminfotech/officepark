<?php

namespace App\Http\Controllers;

//use App\User;
use App\Http\Controllers\Controller;
use Auth;
use Route;
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
        
//        echo "<pre>";print_r($this->loginUser);exit;
        
//        if (Auth::guard('admin')->user()) {
//            $loginData = Auth::guard('admin')->user();
//            $data['detail'] = $loginData;
//        } 
        
        $data['detail'] = $this->loginUser; 
        return view('admin.dashboard', $data);
    }
    
}