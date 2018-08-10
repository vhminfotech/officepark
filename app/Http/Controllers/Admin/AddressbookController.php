<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Model\Addressbook;
use App\Http\Controllers\Controller;
use Auth;
use Route;
use Illuminate\Http\Request;

class AddressbookController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->middleware('admin');
    }

    public function getAddressbookData() {
        $objUser = new Addressbook();
        $AddressList = $objUser->getAddBookLlist();

        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/addressbook.js');
        $data['funinit'] = array('Addressbook.init()');
        $data['detail'] = $this->loginUser;
        $data['arrAddbook'] = $AddressList;

        return view('admin.addressbook.addressbook-list', $data);
    }

    public function addAddressbook(Request $request) {

        $data['detail'] = $this->loginUser;
        $objUser = new Addressbook();
        if ($request->isMethod('post')) {
           
            $addressList = $objUser->addAddresBook($request);
            if ($addressList) {
                $return['status'] = 'success';
                $return['message'] = 'Addressbook created successfully.';
                $return['redirect'] =  route('address-book-list');

            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return); exit;
        }

        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/addressbook.js');
        $data['funinit'] = array('Addressbook.add_init()');

        return view('admin.addressbook.addressbook-add', $data);
    }

    public function editAddressbook($userId, Request $request) {
        $data['detail'] = $this->loginUser;
        if ($request->isMethod('post')) {

        $objaddbook= new Addressbook();
        $addbkList = $objaddbook->editaddbookInfo($request);
        if ($addbkList) {
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


        return view('admin.addressbook.addressbook-edit', $data);
    }

}