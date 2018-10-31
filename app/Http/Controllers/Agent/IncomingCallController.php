<?php


namespace App\Http\Controllers\Agent;

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
        $this->middleware('agent');
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
        return view('agent.incomingCall.incomingCallList', $data);
    }
    
    public function ajaxcall(Request $request){
        // print_r("Hello");
        // die();
        $action = $request->input('action');
        
        switch ($action) {
            
           case 'getdatatableIncomingCall':
                $objRtoEmployer = new Calls();
                $employerLists = $objRtoEmployer->getdatatableIncomingCall($request);
                echo json_encode($employerLists);
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


}
