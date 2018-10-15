<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Model\Addressbook;
use App\Model\OrderInfo;
use App\Http\Controllers\Controller;
use Auth;
use Route;
use Illuminate\Http\Request;
use Config;

class AddressbookController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->middleware('admin');
    }

    public function getAddressbookData(Request $request) {
        $customer_id = (empty($request->get('customer_id'))) ? '' : $request->get('customer_id');
        $objUser = new Addressbook();
        $AddressList = $objUser->getAddBookLlistV2($customer_id);
       
        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/addressbook.js');
        $data['funinit'] = array('Addressbook.init()');
        $data['detail'] = $this->loginUser;
        $data['arrAddbook'] = $AddressList;
        $objOrderInfo = new OrderInfo();
        $arrOrderInfo = $objOrderInfo->getCustomerDetails();
        $arrOrderInfo1[''] = 'Select Customer';
        $data['arrOrderInfo'] = $arrOrderInfo1 + $arrOrderInfo;
       
        return view('admin.addressbook.addressbook-list', $data);
    }

    public function addAddressbook(Request $request,$phoneNumber = null) {

        $data['detail'] = $this->loginUser;
        $objaddressbook = new Addressbook();
        $objOrderInfo = new OrderInfo();
        $data['arrOrderInfo'] = $objOrderInfo->getCustomerDetails();
        if ($request->isMethod('post')) {

            $addressList = $objaddressbook->addAddresBook($request);
            if ($addressList) {
                $return['status'] = 'success';
                $return['message'] = 'Addressbook created successfully.';
                $return['redirect'] = route('address-book-list');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $data['phoneNumber'] = $phoneNumber;
        $data['gender'] = Config::get('constants.gender');
        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/addressbook.js');
        $data['funinit'] = array('Addressbook.add_init()');

        return view('admin.addressbook.addressbook-add', $data);
    }

    public function editAddressbook($bookId, Request $request) {
        $data['gender'] = Config::get('constants.gender');
        $data['detail'] = $this->loginUser;
        if ($request->isMethod('post')) {
            $objeditbook = new Addressbook();
            $editbklist = $objeditbook->editaddbookInfo($request);
            if ($editbklist) {
                $return['status'] = 'success';
                $return['message'] = 'Address Book Edit successfully.';
                $return['redirect'] = route('address-book-list');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/addressbook.js');
        $data['funinit'] = array('Addressbook.edit_init()');
        $objOrderInfo = new OrderInfo();
        $data['arrOrderInfo'] = $objOrderInfo->getCustomerDetails();
        $objeditaddbook = new Addressbook();
        $addbkDetail = $objeditaddbook->getAddBookLlist($bookId);
        $data['addbkDetail'] = $addbkDetail;

        return view('admin.addressbook.addressbook-edit', $data);
    }

    public function deleteAddressbook(Request $request) {
        if ($request->isMethod('post')) {

            $objUsers = new Addressbook;
            $userDelete = $objUsers->AddressBookDelete($request);

            if ($userDelete) {
                $return['status'] = 'success';
                $return['message'] = 'Address Book delete successfully.';
                $return['redirect'] = route('address-book-list');
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

}