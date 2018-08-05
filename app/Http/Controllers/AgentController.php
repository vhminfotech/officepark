<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AgentController extends Controller {
    
    public function __construct() {
        parent::__construct();
        $this->middleware('agent');
    }

    public function dashboard() {
        
        $data['detail'] = $this->loginUser; 
        return view('agent.dashboard', $data);
    }
    
}