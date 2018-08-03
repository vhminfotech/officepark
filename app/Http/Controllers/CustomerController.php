<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class CustomerController extends Controller {
    
    public function __construct() {
        parent::__construct();
        $this->middleware('customer');
    }

    public function dashboard() {
        
        $data['detail'] = $this->loginUser; 
        return view('customer.dashboard', $data);
    }
    
}