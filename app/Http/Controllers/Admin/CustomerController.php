<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Model\Customer;
use App\Model\Users;
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

    public function addCustomer(Request $request) {
        $data['detail'] = $this->loginUser;
        if ($request->isMethod('post')) {
//            print_r($request->input());exit;
            $objCustomer = new Customer();
            $customerResult = $objCustomer->saveCustomerInfo($request);
            if ($customerResult == true) {
                $return['status'] = 'success';
                $return['message'] = 'Customer created successfully.';
                $return['redirect'] = route('customer-list');
            } else {
//                $return['status'] = 'error';
//                $return['message'] = 'something will be wrong.';
                $return['status'] = 'error';
                $return['message'] = 'Email already exists.';
            }
            echo json_encode($return);
            exit;
        }

        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/customer.js');
        $data['funinit'] = array('Customer.addInit()');
        return view('admin.customer.customer-add', $data);
    }

    public function editCustomer($customerId, Request $request) {
        $data['detail'] = $this->loginUser;
        if ($request->isMethod('post')) {
//            print_r($request->input());exit;
            $objCustomer = new Customer();
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
        $data['arrCustomer'] = Customer::find($customerId);

        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/customer.js');
        $data['funinit'] = array('Customer.editInit()');
        return view('admin.customer.customer-edit', $data);
    }

    public function customerDelete(Request $request) {
        echo 'dfsfds';
        exit;
        $result = Customer::find($postData['id'])->delete();
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
        echo $action;
        exit;
        switch ($action) {
            case 'deleteCustomer':
                echo 'fsd';
                exit;
                $result = $this->customerDelete($request->input('data'));
                break;
        }
    }

}