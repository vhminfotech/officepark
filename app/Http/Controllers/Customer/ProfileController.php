<?php

namespace App\Http\Controllers\Customer;


use App\User;
use App\Model\Addressbook;
use App\Model\Users;
use App\Model\OrderInfo;
use App\Http\Controllers\Controller;
use Auth;
use Route;
use Illuminate\Http\Request;
use Config;

class ProfileController extends Controller {
    
    public function __construct() {
        parent::__construct();
        $this->middleware('customer');
    }

    public function editprofile(){
        $data['detail'] = $this->loginUser;
        
        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('customer/profile.js');
        $data['funinit'] = array('Profile.init()');
       
        return view('customer.profile.profile-edit', $data);
    }
}