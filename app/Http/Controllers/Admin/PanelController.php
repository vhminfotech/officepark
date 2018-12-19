<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\PanelSettings;
use App\Model\Users;
use Auth;
use Route;
use Illuminate\Http\Request;
use Config;

class PanelController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->middleware('admin');
    }

    public function index() {

        $data['panelList'] = PanelSettings::get();
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('admin/panelsettng.js');
        $data['funinit'] = array('Panelsettng.Init()');
        $data['css'] = array('');
        return view('admin.panelsettng.index',$data);
    }
    
    public function addpanelsetting(Request $request){
        

        $data['websites'] = Config::get('constants.websites');
         if ($request->isMethod('post')) {
            // print_r($request->input());
            // print_r($request->file());exit;
            $objCustomer = new PanelSettings();
            $customerDetails = $objCustomer->savePanelSetting($request);
            if ($customerDetails == true) {   
                $return['status'] = 'success';
                $return['message'] = 'Panel Setting Saved successfully.';
                $return['redirect'] = route('panelsetting');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Panel Setting already exists.';
            }
            echo json_encode($return);
            exit;
        }
        $data['plugincss'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/panelsettng.js','admin/jscolor.js','ajaxfileupload.js',
            'jquery.form.min.js');
        $data['funinit'] = array('Panelsettng.Add()');
        $data['css'] = array('');
        return view('admin.panelsettng.add-panel-setting',$data);
    }
    
    public function editpanelsetting(Request $request){
        $data['websites'] = Config::get('constants.websites');
        $objCustomer = new PanelSettings();
        $panelArray = $objCustomer->getPanellist($request->id);
        $data['panelArray'] = $panelArray[0];
        // print_r($panelArray);exit;
        if ($request->isMethod('post')) {
            // print_r($request->input());
            // print_r($request->file());exit;
            $objCustomer = new PanelSettings();
            $customerDetails = $objCustomer->updatePanelSetting($request);
            if ($customerDetails == true) {   
                $return['status'] = 'success';
                $return['message'] = 'Panel Setting updated successfully.';
                $return['redirect'] = route('panelsetting');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Panel Setting already exists.';
            }
            echo json_encode($return);
            exit;
        }
        $data['plugincss'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/panelsettng.js','admin/jscolor.js','ajaxfileupload.js',
            'jquery.form.min.js');
        $data['funinit'] = array('Panelsettng.Edit()');
        $data['css'] = array('');
        return view('admin.panelsettng.edit-panel-setting',$data);
    }

      public function ajaxAction(Request $request) {
       if ($request->isMethod('post')){
           $deleteId=$request->input('id');
           $objcustomeplan = new PanelSettings;
            $delete = $objcustomeplan->deletePanel($deleteId);
            if ($delete == true) {
                    $return['status'] = 'success';
                    $return['message'] = 'Panel Setting successfully.';
                    $return['redirect'] = route('panelsetting');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'Something goes to wrong.';
                }
                echo json_encode($return);
                exit;
            }
          
        }

}
