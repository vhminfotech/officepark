<?php

namespace App\Http\Controllers\Customer;

use App\Model\Users;
use App\Model\Invoice;
use App\Model\Calls;
use App\Model\Employee;
use App\Model\Template;
use App\Model\Call_mail;
use App\Model\Call_chat;
use App\Model\Support;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use Session;
class CallController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->middleware('customer');
    }

    public function index(Request $request) {
        if ($request->isMethod('post')) {
            $objcalls = new Calls();
            $sendmail=  $objcalls->sendmail($request);
        }
        $objUser = new Users();
        $data['getCustomer'] = $objUser->getCustomer(null);
        $objCall = new Calls();
        $data['getCall'] = $objCall->getCallListing();
       
        $session = $request->session()->all();
        $objTemplate = new Template();
        $data['template'] = $objTemplate->getTemplate($session['logindata'][0]['id']);
        $year = (empty($request->get('year'))) ? '' : $request->get('year');
        $month = (empty($request->get('month'))) ? '' : $request->get('month');
        $method = (empty($request->get('payment_method'))) ? '' : $request->get('payment_method');
         $data['responsibility'] = Config::get('constants.responsibility');
         $data['gender'] = Config::get('constants.gender');
        $data['plugincss'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('customer/calls.js');
        $data['funinit'] = array('Calls.list_init()');
        $data['css'] = array('');
        $data['year'] = $year;
        $data['datatableJsCss'] = true;
        $data['month'] = $month;
        $data['method'] = $method;
        
        return view('customer.call.call-list', $data);
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
                $return['redirect'] = route('calls');
//                $return['jscode'] = 'setTimeout(function(){location.reload();},1000)';
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
    }
    public function sendMailbigPopup(Request $request) {
        $session = $request->session()->all();
        
        if ($request->isMethod('post')) {
            $objCallMail = new Call_mail();
            $userList = $objCallMail->addcallmail($request,$session['logindata'][0]['id']);
            if ($userList) {
                $return['status'] = 'success';
                $return['message'] = 'Email Sent successfully.';
               $return['jscode'] = 'setTimeout(function(){location.reload();},1000)';
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
    }

    public function addTempate(Request $request) {
        if ($request->isMethod('post')) {
            $objUser = new Template();
            $session = $request->session()->all();
            $userList = $objUser->addTemplate($request, $session['logindata'][0]['id']);
            if ($userList) {
                $return['status'] = 'success';
                $return['message'] = 'Template added successfully.';
//                $return['redirect'] = route('calls');
                $return['jscode'] = "setTimeout(function(){
                        $('#templateModel').modal('hide');
                        $('#modal8').modal('show');
                        $('#template').trigger('click');
                    },1000)";
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
    }

    public function deleteTemplate($postData) {
        if ($postData) {
            $result = Template::where('id', $postData['id'])->delete();

            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'Template delete successfully.';
//                $return['redirect'] = route('calls');
                $return['jscode'] = "setTimeout(function(){
                        $('#deleteModel').modal('hide');
                        $('#templateModel').modal('show');
                        $('#template').trigger('click');
                    },1000)";
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
        $customerDetails = $this->loginUser;

        switch ($action) {
            case 'getSentEmailData':
                $id = $request->input('data')['id'];
                $result = Calls::find($id);
                echo json_encode($result);
                exit;
                break;
            case 'getdatatable':
                $session = $request->session()->all();
                $objRtoEmployer = new Calls();
                $employerLists = $objRtoEmployer->getDatatableV2($request, $customerDetails['system_genrate_no']);
                echo json_encode($employerLists);
                break;
            
            case 'getdatatableIncomingCall':
                $objRtoEmployer = new Calls();
                $getdatatableIncomingCall = $objRtoEmployer->getdatatableIncomingCall($request);
                echo json_encode($getdatatableIncomingCall);
                break;
            
            case 'customerpopupdetail':
                $objRtoEmployer = new Calls();
                $employeDetails=new Employee();
                $getdatatableIncomingCall = $objRtoEmployer->customerpopupdetail($request);               
                $getdatatablebuesnesshours = $objRtoEmployer->customerpopupdetailbussinesshours($request);               
                $customer_info=$objRtoEmployer->customer_info($request); 
                $orderinfo=$objRtoEmployer->orderinfo($request);
                $employeinfo=$employeDetails->employeinfoAccounting($request);
                $employeinfoadvisor=$employeDetails->employeinfoCustomer($request);
                $employeinfoTechnical=$employeDetails->employeinfoTechnical($request);              
                
                $employeinffo=$objRtoEmployer->employeinfo($request);
        
                $response=['company_details'=>$getdatatableIncomingCall,'bussiness_hours'=>$getdatatablebuesnesshours,'customer_info'=>$customer_info,'orderinfo'=>$orderinfo,'employeinfo'=>$employeinfo,
                    'employeinfoadvisor'=>$employeinfoadvisor,'employeinfoTechnical'=>$employeinfoTechnical,'employeinffo'=>$employeinffo];               
                
                echo json_encode($response);
                break;
            
            case 'getTemplateList':
                $session = $request->session()->all();
                $objRtoEmployer = new Template();
                $data['templateList'] = $objRtoEmployer->getTemplate($session['logindata'][0]['id']);
                $result = view('admin.call.template-list', $data)->render();
                echo $result;
                exit;
                break;
            case 'deleteTemplate':
                $result = $this->deleteTemplate($request->input('data'));
                break;
            case 'gettemplate':
                $session = $request->session()->all();
                $objTemplate = new Template();
                $template = $objTemplate->getTemplate($session['logindata'][0]['id']);
//                print_r($template);exit;
                echo json_encode($template);
                break;
        }
    }

     public function callchatlist(Request $request, $id=null) {
        $data['detail'] = $this->loginUser;
        
        $objcallsupport=new Call_mail();
        $callsupport=$objcallsupport->countsupport('customer',$data['detail']['id']);
        Session::put('call_support', $callsupport);
       
        $objsupportchat = new Call_chat();
        $data['chatlist'] = $objsupportchat->chatlist($id);
        $objSupportDetail = new Call_mail();
        $data['supportArr'] = $objSupportDetail->calllist($data['detail']['id']);
        $data['responsibility'] = Config::get('constants.responsibility');
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('customer/supports.js','jquery.form.min.js');
        $data['funinit'] = array('Supports.chat_init()');
        $data['css'] = array('');
        return view('customer.call.callchatlist', $data);
    }   

    public function callchat(Request $request, $id=null) {
        $data['detail'] = $this->loginUser;
       $objcallsupport=new Call_mail();
        $callsupport=$objcallsupport->countsupport('customer',$data['detail']['id']);
        Session::put('call_support', $callsupport);
       
         if ($request->isMethod('post')) {
            $objsupportchat = new Call_chat();
            $chatlist=$objsupportchat->addchat($request,$data['detail']['id'],$id,'customer');
            if ($chatlist == true) {
                $return['status'] = 'success';
                $return['message'] = 'Message send successfully.';
                $return['redirect'] = route('customer-callchat',$id);
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Email already exists.';
            }
            echo json_encode($return);
            exit;
        }
         $data['responsibility'] = Config::get('constants.responsibility');
        $objsupportchat = new Call_chat();
        $data['chatlist'] = $objsupportchat->chatlist($id);
        $objSupportDetail = new Call_mail();
        $data['supportArr'] = $objSupportDetail->callDetail($id);
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('customer/supports.js','customer/calls.js');
        $data['funinit'] = array('Calls.chat_init()');
        $data['css'] = array('');
        return view('customer.call.callchat', $data);
    }
    
    public function closechat(Request $request){
       if ($request->isMethod('post')) {
           $objclosechat = new Call_mail();
            $closechat=$objclosechat->closechat($request);
              if ($closechat == true) {
                $return['status'] = 'success';
                $return['message'] = 'Chat closed successfully.';
                $return['redirect'] = route('customer-callchatlist');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Email already exists.';
            }
            echo json_encode($return);
            exit;
        }
    }

}
