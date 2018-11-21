<?php

namespace App\Http\Controllers\Admin;

use App\Model\Users;
use App\Model\Invoice;
use App\Model\Calls;
use App\Model\Employee;
use App\Model\Template;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;

class CallController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->middleware('admin');
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
        
        $employeDetails=new Employee();
        $data['employeinffo']=$employeDetails->employeinfo($request);
        
        
        $session = $request->session()->all();
        $objTemplate = new Template();
        $data['template'] = $objTemplate->getTemplate($session['logindata'][0]['id']);
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

    public function addTempate(Request $request) {
        if ($request->isMethod('post')) {
            $objUser = new Template();
            $session = $request->session()->all();

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
                
                $response=['company_details'=>$getdatatableIncomingCall,'bussiness_hours'=>$getdatatablebuesnesshours,'customer_info'=>$customer_info,'orderinfo'=>$orderinfo,'employeinfo'=>$employeinfo,
                    'employeinfoadvisor'=>$employeinfoadvisor,'employeinfoTechnical'=>$employeinfoTechnical];               
                
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

}
