<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
Use Config;
Use App\Model\Users;
use App\Model\Invoice;
use App\Model\Calls;
use App\Model\Employee;
use App\Model\Template;
use Illuminate\Http\Request;

class AgentController extends Controller {
    
    public function __construct() {
        parent::__construct();
        $this->middleware('agent');
    }

    public function dashboard(Request $request) {
        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('agent/dashboard.js');
        $data['funinit'] = array('Dashboard.listInit()');
        $data['detail'] = $this->loginUser; 
         $session = $request->session()->all();
        $objTemplate = new Template();
        $data['template'] = $objTemplate->getTemplate($session['logindata'][0]['id']);
        $data['gender'] = Config::get('constants.gender');
        $employeDetails=new Employee();
        $data['employeinffo']=$employeDetails->employeinfo($request);
        
        return view('agent.dashboard', $data);
    }
    
}