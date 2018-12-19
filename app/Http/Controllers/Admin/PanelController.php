<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Calls;
use App\Model\Users;

class PanelController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->middleware('admin');
    }

    public function index() {
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('admin/panelsettng.js');
        $data['funinit'] = array('Panelsettng.Init()');
        $data['css'] = array('');
        return view('admin.panelsettng.index',$data);
    }
    
    public function addpanelsetting(){
         $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('admin/panelsettng.js','admin/jscolor.js');
        $data['funinit'] = array('Panelsettng.Add()');
        $data['css'] = array('');
        return view('admin.panelsettng.add-panel-setting',$data);
    }
    
    public function editpanelsetting(){
         $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('admin/panelsettng.js','admin/jscolor.js');
        $data['funinit'] = array('Panelsettng.Edit()');
        $data['css'] = array('');
        return view('admin.panelsettng.edit-panel-setting',$data);
    }

}
