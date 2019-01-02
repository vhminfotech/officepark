<?php

namespace App\Http\Controllers\Customer;

use App\User;
use App\Http\Controllers\Controller;
use Auth;
use Route;
use Illuminate\Http\Request;
use App\Model\Employee;
use App\Model\EmployeeDetails;
use App\Model\OrderInfo;
use App\Model\Users;
use App\Model\Support;
use App\Model\Support_chat;
use Config;
use Session;


class SupportsController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->middleware('customer');
    }

    public function supportsList(Request $request) {
        $data['detail'] = $this->loginUser;
        $objsupport=new Support();
        $callsupport=$objsupport->countsupport('customer',$data['detail']['id']);
         Session::put('callsupport', $callsupport);
        $data['detail'] = $this->loginUser;
        $userName=$data['customer_id']=$data['detail']['id'];
        $data['support_message'] = Config::get('constants.support_message');
        $objSupport = new Support();
        $data['supportArr'] = $objSupport->supportlist($userName);
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('customer/supports.js', 'ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('Supports.list_init()');
        $data['css'] = array('');
  
        return view('customer.support.support-list', $data);
    }
    
    public function addSupport(Request $request) {
        $data['detail'] = $this->loginUser;
        $userName = $data['customer_id']=$data['detail']['id'];
        $data['support_message'] = Config::get('constants.support_message');
        if ($request->isMethod('post')) {
            $objSupport = new Support();
            $employeeId = $objSupport->saveSupport($request,$userName); 

            if ($employeeId == true) {
                $return['status'] = 'success';
                $return['message'] = 'Support add successfully.';
                $return['redirect'] = route('customer-support');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Email already exists.';
            }
            echo json_encode($return);
            exit;
        }
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('customer/supports.js', 'ajaxfileupload.js', 'jquery.form.min.js');
        $data['funinit'] = array('Supports.list_init()');
        $data['css'] = array('');
        return view('customer.support.support-add', $data);
    }
    
    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        switch ($action) {
             case 'getPopupData': 
                $id = $request->input('data')['id'];
                $objSupport = new Support();
                $data['supportArray'] = $objSupport->getSupport($id); 
                $data['support_message'] = Config::get('constants.support_message');
                $resultTable = view('customer.support.support-popup', $data)->render();
                echo $resultTable;
                exit;
                break;
        }
    }
    
    public function supportchat(Request $request, $id=null) {
        $data['detail'] = $this->loginUser;
        $objsupport=new Support();
        $callsupport=$objsupport->countsupport('customer',$data['detail']['id']);
         Session::put('callsupport', $callsupport);
         if ($request->isMethod('post')) {
            $objsupportchat = new Support_chat();
            $chatlist=$objsupportchat->addchat($request,$data['detail']['id'],$id,'customer');
              if ($chatlist == true) {
                $return['status'] = 'success';
                $return['message'] = 'Message send successfully.';
                $return['redirect'] = route('support-chat',$id);
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Email already exists.';
            }
            echo json_encode($return);
            exit;
         }
        $objsupportchat = new Support_chat();
        $data['chatlist']=$objsupportchat->chatlist($id);
        $objSupportDetail = new Support();
        $data['supportArr'] = $objSupportDetail->supportlistDetails($id);
        $data['support_message'] = Config::get('constants.support_message');
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('customer/supports.js','jquery.form.min.js');
        $data['funinit'] = array('Supports.chatadd()');
        $data['css'] = array('');
        return view('customer.support.supportchat', $data);
    }
    
    public function closechat(Request $request){
        if ($request->isMethod('post')) {
          $objsupport=new Support();
            $closechat=$objsupport->closechat($request);
              if ($closechat == true) {
                $return['status'] = 'success';
                $return['message'] = 'Chat closed successfully.';
                $return['redirect'] = route('customer-support');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Email already exists.';
            }
            echo json_encode($return);
            exit;
        }
    }

}
