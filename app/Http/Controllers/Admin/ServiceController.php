<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use App\Model\Service;
use App\Model\Category;
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
        $data['websites'] = Config::get('constants.websites');

        $data['css'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('admin/service.js');
        $data['funinit'] = array('Service.list_init()');
        
        return view('admin.service.service-list', $data);
    }

    public function addService($websiteId,Request $request) {
        $objCategory = new Category();
        $objService = new Service();
        
        $data['allCategory'] = $objCategory->getCategory();
        if ($request->isMethod('post')) {
            $data = $request->input();
            $objService->saveService($data,$websiteId);
            print_r($request->input());exit;
        }
        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/service.js');
        $data['funinit'] = array('Service.add_init()');
        

        return view('admin.service.service-add', $data);
    }

    public function addCategory(Request $request) {

        $objCategory = new Category();
        if ($request->isMethod('post')) {

            $category = $objCategory->addCategory($request);
            if ($category) {
                $return['status'] = 'success';
                $return['message'] = 'Category created successfully.';
                $return['jscode'] = 'setTimeout(function(){$(".c-modal__close").trigger("click");},2000)';
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
    }

}
