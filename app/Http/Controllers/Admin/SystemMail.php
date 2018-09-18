<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class SystemMail extends Controller {

    public function __construct() {
        parent::__construct();
        $this->middleware('admin');
    }

    public function index() {
        
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('admin/invoice.js');
        $data['funinit'] = array('Invoice.list_init()');
        $data['css'] = array('');
    
        return view('admin.systemmail.system-mail',$data);
        
    }

}
