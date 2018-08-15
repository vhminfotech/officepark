<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Validator;
use App\Model\OrderInfo;
use Auth;
use Config;


class OrderController extends Controller {
    
    public function __construct(){
        
    }
    
    public function index(Request $request){
        
        $objOrder = new OrderInfo();
        $data['arrOrder'] = $objOrder->getInfo();
//        print_r($arrOrder);exit;
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('');
        $data['js'] = array('admin/order.js');
        $data['funinit'] = array('Order.Init()');
        
        return view('admin.order.order-list', $data);
    }
    
    public function viewOrder(Request $request,$id){
        
        $objOrder = new OrderInfo();
        $data['arrOrder'] = $objOrder->getOrderInfo($id);
//        print_r($data['arrOrder']);exit;
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('');
        $data['js'] = array('admin/order.js');
        $data['funinit'] = array('Order.Init()');
        
        return view('admin.order.view-order', $data);
    }
}
