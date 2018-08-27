<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Validator;
use App\Model\OrderInfo;
use App\Model\Users;
use Auth;
use Config;
use PDF;
use Session;
use DB;

class OrderController extends Controller {

    public function __construct() {
        
    }

    public function index(Request $request) {

        $objOrder = new OrderInfo();
        $data['arrOrder'] = $objOrder->getInfo();
//        print_r($arrOrder);exit;
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('');
        $data['js'] = array('admin/order.js');
        $data['funinit'] = array('Order.Init()');

        return view('admin.order.order-list', $data);
    }

    public function viewOrder(Request $request, $id) {

        $objOrder = new OrderInfo();
        $orderstatus = $objOrder->updateStatus($id);
        $resultArr = $objOrder->newOrderCount('new');
        if ($orderstatus) {
            Session::put('ordercount', $resultArr);
        }

        $data['customerNo'] = DB::table('customer_no')->where('id', 1)->get();
        $data['systemGenerateNo'] = DB::table('system_genrate_no')->where('id', 1)->orderBy('id', 'desc')->take(1)->get();

        $data['arrOrder'] = $objOrder->getOrderInfo($id);
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('');
        $data['js'] = array('admin/order.js');
        $data['funinit'] = array('Order.Init()');
        $data['gender'] = Config::get('constants.gender');
        $data['welcome_note'] = Config::get('constants.welcome_note');
        $data['reroute_confirm'] = Config::get('constants.reroute_confirm');
        $data['unreach_note'] = Config::get('constants.unreach_note');

        return view('admin.order.view-order', $data);
    }

    public function ajaxAction(Request $request) {
        if ($request->isMethod('post')) {
            $objOrder = new OrderInfo();
            $editResult = $objOrder->editCompanyInfo($request);
            if ($editResult) {
                $return['status'] = 'success';
                $return['message'] = 'Company Info edit successfully.';
                $return['redirect'] = route('view-order', array('id' => $request->input('orderId')));
                echo json_encode($return);
                exit;
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Something went wrong.';
                echo json_encode($return);
                exit;
            }
        }
    }

    public function paymentEditInfo(Request $request) {
        if ($request->isMethod('post')) {
            $objOrder = new OrderInfo();
            $editResult = $objOrder->paymentEditInfo($request);
            if ($editResult) {
                $return['status'] = 'success';
                $return['message'] = 'Paymeent Info edit Successfully.';
                $return['redirect'] = route('view-order', array('id' => $request->input('orderId')));
                echo json_encode($return);
                exit;
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Something went wrong.';
                echo json_encode($return);
                exit;
            }
        }
    }

    public function secEditInfo(Request $request) {
        if ($request->isMethod('post')) {
            $objOrder = new OrderInfo();
            $editResult = $objOrder->secretaryEditInfo($request);
            if ($editResult) {
                $return['status'] = 'success';
                $return['message'] = 'Secretary Information edit Successfully.';
                $return['redirect'] = route('view-order', array('id' => $request->input('orderId')));
                echo json_encode($return);
                exit;
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Something went wrong.';
                echo json_encode($return);
                exit;
            }
        }
    }

    public function customerEditInfo(Request $request) {
        if ($request->isMethod('post')) {
            $objOrder = new OrderInfo();
            $editResult = $objOrder->customerEditInfo($request);
            if ($editResult) {
                $return['status'] = 'success';
                $return['message'] = 'Customer Information edit Successfully.';
                $return['redirect'] = route('view-order', array('id' => $request->input('orderId')));
                echo json_encode($return);
                exit;
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Something went wrong.';
                echo json_encode($return);
                exit;
            }
        }
    }

    public function createUser(Request $request) {
        if ($request->isMethod('post')) {

            $objCustomer = OrderInfo::find($request->input('orderId'));
            $objUser = new Users();
            $result = $objUser->createCustomer($objCustomer);
            if ($result == true) {
                $return['status'] = 'success';
                $return['message'] = 'customere created Successfully.<br/>Customer no : ' . $result['cus_no'] . ' <br/> System no : ' . $result['system_no'] . '';
                $return['redirect'] = route('view-order', array('id' => $request->input('orderId')));
                echo json_encode($return);
                exit;
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Email already Exists';
                echo json_encode($return);
                exit;
            }
        }
    }

    public function createPDF($id) {
        $data['id'] = $id;
        $objOrder = new OrderInfo();
        $data['arrOrder'] = $objOrder->getPdfData($id);
//        echo '<pre/>';
//        print_r($data['arrOrder']);
//        exit;
        $pdf = PDF::loadView('admin.order.invoice-pdf1', $data);
        return $pdf->stream();
      //  return $pdf->download('invoice.pdf');
    }

    public function contractList() {
        $objOrder = new OrderInfo();
        $data['arrayContract'] = $objOrder->getContractInfo();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('');
        $data['js'] = array('admin/contract.js');
        $data['funinit'] = array('Contract.Init()');

        return view('admin.contract.contract-list', $data);
    }

}
