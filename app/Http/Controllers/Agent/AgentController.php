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
        $employeDetails= new Employee();
        $data['employeinffo']= $employeDetails->employeinfoAccounting($request);
        $objRtoEmployer = new Calls();
        $checkNewCall = $objRtoEmployer->checkNewCalls($session['logindata'][0]['inopla_username']);   
        $data['checkNewCall'] = (!empty($checkNewCall) && count($checkNewCall) > 0 ) ? $checkNewCall['id'] : '0';
        $data['inopla_username'] = $session['logindata'][0]['inopla_username'];

        return view('agent.dashboard', $data);
    }
    
}