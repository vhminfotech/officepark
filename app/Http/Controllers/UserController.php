<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller {
    
    public function __construct() {
        parent::__construct();
        //$this->middleware('web');
    }

    public function dashboard() {
        
        $data['detail'] = $this->loginUser; 
        return view('user.dashboard', $data);
    }
    
}