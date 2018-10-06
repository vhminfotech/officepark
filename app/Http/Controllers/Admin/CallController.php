<?php

namespace App\Http\Controllers\Admin;

use App\Model\Users;
use App\Model\Invoice;
use App\Model\Calls;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;

class CallController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->middleware('admin');
    }

    public function index(Request $request) {

        $objUser = new Users();
        $data['getCustomer'] = $objUser->getCustomer(null);
        $objCall = new Calls();
        $data['getCall'] = $objCall->getCallListing();
//        echo '<pre/>';
//        print_r($data['getCall']);
//        exit;
        $year = (empty($request->get('year'))) ? '' : $request->get('year');
        $month = (empty($request->get('month'))) ? '' : $request->get('month');
        $method = (empty($request->get('payment_method'))) ? '' : $request->get('payment_method');
        $data['gender'] = Config::get('constants.gender');
        $data['plugincss'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/calls.js');
        $data['funinit'] = array('Calls.list_init()');
        $data['css'] = array('');
        $data['year'] = $year;
        $data['datatableJsCss'] = true;
        $data['month'] = $month;
        $data['method'] = $method;

        return view('admin.call.call-list', $data);
    }

    public function sendMail(Request $request) {
        if ($request->isMethod('post')) {
//            print_r($request->input());
//            exit;
            $objUser = new Calls();
            $userList = $objUser->updateCalles($request);
            if ($userList) {
                $return['status'] = 'success';
                $return['message'] = 'Email Sent successfully.';
//                $return['redirect'] = route('calls');
//                $return['jscode'] = 'setTimeout(function(){location.reload();},1000)';
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
    }

    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        switch ($action) {
            case 'getSentEmailData':
                $id = $request->input('data')['id'];
                $result = Calls::find($id);
                echo json_encode($result);
                exit;
                break;
            case 'getdatatable':
                $objRtoEmployer = new Calls();
                $employerLists = $objRtoEmployer->getDatatable($request);
                echo json_encode($employerLists);
                break;
        }
    }

}
