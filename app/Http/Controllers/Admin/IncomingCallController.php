<?php


namespace App\Http\Controllers\Admin;

use App\Model\Users;
use App\Model\Invoice;
use App\Model\Calls;
use App\Model\Template;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;


class IncomingCallController extends Controller {
    
    public function __construct() {
        parent::__construct();
        $this->middleware('admin');
    }
    public function index(Request $request) {
        $objUser = new Users();
        $data['getCustomer'] = $objUser->getCustomer(null);
        $objCall = new Calls();
        $data['getCall'] = $objCall->getCallListing();
        $year = (empty($request->get('year'))) ? '' : $request->get('year');
        $month = (empty($request->get('month'))) ? '' : $request->get('month');
        $method = (empty($request->get('payment_method'))) ? '' : $request->get('payment_method');        
        $data['gender'] = Config::get('constants.gender');
        $data['js'] = array('admin/incomingCall.js');
        $data['funinit'] = array('IncomingCall.list_init()');
        $data['css'] = array('');
        $data['year'] = $year;
        $data['datatableJsCss'] = true;
        $data['month'] = $month;
        $data['method'] = $method;
        return view('admin.incomingCall.incomingCallList', $data);
    }
    
    public function ajaxcall(Request $request){
        print_r("Hello");
        die();
        $action = $request->input('action');
        
        switch ($action) {
            
           case 'getdatatableIncomingCall':
                $objRtoEmployer = new Calls();
                $employerLists = $objRtoEmployer->getdatatableIncomingCall($request);
                echo json_encode($employerLists);
                break;
            
          }   
    }

}
