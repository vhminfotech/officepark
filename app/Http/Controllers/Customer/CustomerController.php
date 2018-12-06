<?php

namespace App\Http\Controllers\Customer;


use App\User;
use App\Model\Addressbook;
use App\Model\OrderInfo;
use App\Http\Controllers\Controller;
use Auth;
use Route;
use Illuminate\Http\Request;
use Config;

class CustomerController extends Controller {
    
    public function __construct() {
        parent::__construct();
        $this->middleware('customer');
    }

    public function dashboard(){
        $data['detail'] = $this->loginUser; 
        return view('customer.dashboard', $data);
    }
    

    
}