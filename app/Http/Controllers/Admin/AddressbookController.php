<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Model\Users;
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
        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/addressbook.js');
        $data['funinit'] = array('Addressbook.init()');
        $data['detail'] = $this->loginUser;

        return view('admin.addressbook.addressbook-list', $data);
    }

    public function addAddressbook(Request $request) {
        $data['detail'] = $this->loginUser;

        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/addressbook.js');
        $data['funinit'] = array('Addressbook.add_init()');

        return view('admin.addressbook.addressbook-add', $data);
    }

    public function editAddressbook($userId, Request $request) {

        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/addressbook.js');
        $data['funinit'] = array('Addressbook.edit_init()');


        return view('admin.addressbook.addressbook-edit', $data);
    }

}