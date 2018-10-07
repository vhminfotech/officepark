<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Calls;

class SystemMail extends Controller {

    public function __construct() {
        parent::__construct();
        $this->middleware('admin');
    }

    public function index() {
        
        $objCall = new Calls();
        $data['todayCalls'] = $objCall->getSystemMailCalls('today');
        $data['weekCalls'] = $objCall->getSystemMailCalls('week');
        $data['monthCalls'] = $objCall->getSystemMailCalls('month');
        $data['yearCalls'] = $objCall->getSystemMailCalls('year');
        
        $data['todayCallSentMail'] = $objCall->getSystemSentMail('today');
        $data['weekCallSentMail'] = $objCall->getSystemSentMail('week');
        $data['monthCallSentMail'] = $objCall->getSystemSentMail('month');
        $data['yearCallSentMail'] = $objCall->getSystemSentMail('year');
        
        $data['todayCallNotSentMail'] = $objCall->getSystemNotSentMail('today');
        $data['weekCallNotSentMail'] = $objCall->getSystemNotSentMail('week');
        $data['monthCallNotSentMail'] = $objCall->getSystemNotSentMail('month');
        $data['yearCallNotSentMail'] = $objCall->getSystemNotSentMail('year');
        
        $data['todayCallStatics'] = $objCall->getAgentStatics('today');
        $data['weekCallStatics'] = $objCall->getAgentStatics('week');
        $data['monthCallStatics'] = $objCall->getAgentStatics('month');
        $data['yearCallStatics'] = $objCall->getAgentStatics('year');
        
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('admin/invoice.js');
        $data['funinit'] = array('Invoice.list_init()');
        $data['css'] = array('');
    
        return view('admin.systemmail.system-mail',$data);
        
    }

}
