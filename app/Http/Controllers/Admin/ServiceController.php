<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Auth;
use Route;
use Illuminate\Http\Request;
use Config;

class ServiceController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->middleware('admin');
    }

    public function getServiceData() {

        return view('admin.service.service-list');
    }

    public function addService() {
        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/service.js');
        $data['funinit'] = array('Service.list_init()');
        return view('admin.service.service-add',$data);
    }

}
