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

        $objService = new Service();
        $data['css'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('admin/service.js');
        $data['funinit'] = array('Service.list_init()');
        $data['getServiceData'] = $objService->getServiceData();

        return view('admin.service.service-list', $data);
    }

    public function addService($websiteId, Request $request) {
        $objCategory = new Category();
        $objService = new Service();

        $data['allCategory'] = $objCategory->getCategory();

        if ($request->isMethod('post')) {
            $data = $request->input();
            $service = $objService->saveService($data, $websiteId);
            if ($service) {
                $return['status'] = 'success';
                $return['message'] = 'Service added success fully';
                $return['redirect'] = route('service');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/service.js');
        $data['funinit'] = array('Service.add_init()');


        return view('admin.service.service-add', $data);
    }

    public function editService($serviceId, Request $request) {
        $objCategory = new Category();
        $objService = new Service();

        $data['allCategory'] = $objCategory->getCategory();
        $data['getService'] = $objService->getServices($serviceId);
        $data['websites'] = Config::get('constants.websites');

        if ($request->isMethod('post')) {
            $data = $request->input();
            $service = $objService->saveEditService($data, $serviceId);
            if ($service) {
                $return['status'] = 'success';
                $return['message'] = 'Service edit success fully';
                $return['redirect'] = route('service');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/service.js');
        $data['funinit'] = array('Service.add_init()');


        return view('admin.service.service-edit', $data);
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

    public function deleteService(Request $request) {
        if ($request->isMethod('post')) {

            $objService = new Service();
            $userDelete = $objService->ServiceDelete($request);

            if ($userDelete) {
                $return['status'] = 'success';
                $return['message'] = 'Service delete successfully.';
                $return['redirect'] = route('service');
                echo json_encode($return);
                exit;
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Something went wrong.';
                echo json_encode($return);
                exit;
            }
        }
    }

    public function getCategoryList(Request $request) {
        if ($request->isMethod('post')) {
//            print_r($request->input());
//            exit;
            $data['arrCategory'] = Category::get()->toArray();
            $resultTable = view('admin.service.get-category', $data)->render();
            echo $resultTable;
            exit;
        }
    }

    public function deleteCategory(Request $request) {
        if ($request->isMethod('post')) {

            $objCategory = new Category();
            $resultCategory = $objCategory->deleteCategory($request->input('id'));
            if ($resultCategory) {
                $return['status'] = 'success';
                $return['message'] = 'Category delete successfully.';
                $return['jscode'] = 'setTimeout(function(){$(".addCategory").trigger("click");},1000)';
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Something went wrong.';
            }
            echo json_encode($return);
            exit;
        }
    }

}
