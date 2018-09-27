<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Model\Customer;
use App\Model\Users;
use App\Model\Invoice;
use App\Model\Calls;
use App\Model\OrderInfo;
use App\Http\Controllers\Controller;
use Auth;
use Route;
use Illuminate\Http\Request;

//use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Illuminate\Http\Request;

class CustomerController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->middleware('admin');
    }

    public function getCustomerData() {
        $objCustomer = new Users();
        $customerList = $objCustomer->getCustomerList('CUSTOMER');

        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/customer.js');
        $data['funinit'] = array('Customer.listInit()');

        $data['arrCustomer'] = $customerList;
        $data['detail'] = $this->loginUser;
        return view('admin.customer.customer-list', $data);
    }

//    public function addCustomer(Request $request) {
//        $data['detail'] = $this->loginUser;
//        if ($request->isMethod('post')) {
////            print_r($request->input());exit;
//            $objCustomer = new Customer();
//            $customerResult = $objCustomer->saveCustomerInfo($request);
//            if ($customerResult == true) {
//                $return['status'] = 'success';
//                $return['message'] = 'Customer created successfully.';
//                $return['redirect'] = route('customer-list');
//            } else {
////                $return['status'] = 'error';
////                $return['message'] = 'something will be wrong.';
//                $return['status'] = 'error';
//                $return['message'] = 'Email already exists.';
//            }
//            echo json_encode($return);
//            exit;
//        }
//
//        $data['css'] = array();
//        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
//        $data['js'] = array('admin/customer.js');
//        $data['funinit'] = array('Customer.addInit()');
//        return view('admin.customer.customer-add', $data);
//    }

    public function editCustomer($customerId, Request $request) {
        $data['detail'] = $this->loginUser;
        if ($request->isMethod('post')) {
//            print_r($request->input());exit;
            $objCustomer = new Users();
            $customerResult = $objCustomer->updateCustomerInfo($request);
            if ($customerResult == true) {
                $return['status'] = 'success';
                $return['message'] = 'Customer Edit successfully.';
                $return['redirect'] = route('customer-list');
            } else {

                $return['status'] = 'error';
                $return['message'] = 'Email already exists.';
            }
            echo json_encode($return);
            exit;
        }
        /* Start For Calls */
        $objCall = new Calls();
        $data['getCall'] = $objCall->getCallListing();
        /* end For Calls */
        
        /* Start For BillInfo */
        $objOrder = new OrderInfo();
        $data['arrOrder'] = $objOrder->getInfo();
        /* end For BillInfo */
        
        
        $objUser = new Users();
        $data['arrCustomer'] = $objUser->getCustomerInfo($customerId);
        $data['getCustomer'] = $objUser->getCustomer(null);

        $year = (empty($request->get('year'))) ? '' : $request->get('year');
        $month = (empty($request->get('month'))) ? '' : $request->get('month');
        $method = (empty($request->get('payment_method'))) ? '' : $request->get('payment_method');
        $objinvoice = new Invoice();
        $data['getInvoice'] = $objinvoice->invoiceList($year, $month, $method);

        $data['year'] = $year;
        $data['month'] = $month;
        $data['method'] = $method;
        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/customer.js');
        $data['funinit'] = array('Customer.editInit()');
//        return view('admin.customer.customer-edit', $data);
        return view('admin.customer.customer-edit1', $data);
    }

    public function customerDelete($postData) {

        $result = Users::find($postData['id'])->delete();
        if ($result) {
            $return['status'] = 'success';
            $return['message'] = 'Customer Delete successfully.';
            $return['redirect'] = route('customer-list');
        } else {
            $return['status'] = 'error';
            $return['message'] = 'something will be wrong.';
        }
        echo json_encode($return);
        exit;
    }

    public function ajaxAction(Request $request) {
        $action = $request->input('action');

        switch ($action) {
            case 'deleteCustomer':

                $result = $this->customerDelete($request->input('data'));
                break;
        }
    }

}