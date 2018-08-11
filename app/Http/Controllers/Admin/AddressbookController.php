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
        $objaddressbook = new Addressbook();
        if ($request->isMethod('post')) {
           
            $addressList = $objaddressbook->addAddresBook($request);
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

    public function editAddressbook($bookId, Request $request) {
        
        $data['detail'] = $this->loginUser;
        if ($request->isMethod('post')) {
        $objeditbook= new Addressbook();
        $editbklist = $objeditbook->editaddbookInfo($request);
        if ($editbklist) {
                $return['status'] = 'success';
                $return['message'] = 'Address Book Edit successfully.';
                $return['redirect'] = route('address-book-list');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return); exit;
        }
        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/addressbook.js');
        $data['funinit'] = array('Addressbook.edit_init()');

        $objeditaddbook = new Addressbook();
        $addbkDetail = $objeditaddbook->getAddBookLlist($bookId);
        $data['addbkDetail'] = $addbkDetail;
        
        return view('admin.addressbook.addressbook-edit', $data);
    }
    
    public function deleteAddressbook(Request $request){
        if ($request->isMethod('post')) {
           
            $objUsers = new Addressbook;
            $userDelete = $objUsers->AddressBookDelete($request);
            
            if($userDelete)
            {
                $return['status'] = 'success';
                $return['message'] = 'Address Book delete successfully.';
                $return['redirect'] =  route('address-book-list');
                echo json_encode($return);
                exit;
            }else{
                $return['status'] = 'error';
                $return['message'] = 'Something went wrong.';
                echo json_encode($return);
                exit;
            }
        }
    }

}