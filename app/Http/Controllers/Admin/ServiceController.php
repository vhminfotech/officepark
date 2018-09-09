<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use App\Model\Service;
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

        return view('admin.service.service-list', $data);
    }

    public function addService() {
        $objCategory = new Service();
        $data['websites'] = Config::get('constants.websites');
        $data['allCategory'] = $objCategory->getCategory();
        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/service.js');
        $data['funinit'] = array('Service.list_init()');
        

        return view('admin.service.service-add', $data);
    }

    public function addCategory(Request $request) {

        $objCategory = new Service();
        if ($request->isMethod('post')) {

            $category = $objCategory->addCategory($request);
            if ($category) {
                $return['status'] = 'success';
                $return['message'] = 'Category created successfully.';
                $return['redirect'] = route('service');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
    }

}
