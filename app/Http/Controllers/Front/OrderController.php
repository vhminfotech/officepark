<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Validator;
use App\Model\OrderInfo;
use Auth;
use Config;
use Session;



class OrderController extends Controller {
    
    public function __construct(){
        
    }
    
    public function index(Request $request){
        
         $data['welcome_note']= Config::get('constants.welcome_note');
         $data['reroute_confirm']= Config::get('constants.reroute_confirm');
         $data['unreach_note']= Config::get('constants.unreach_note');
         $data['gender']= Config::get('constants.gender');
        
        if ($request->isMethod('post')) {
            
            $dataArr = $request->input();
//            echo "<hr>";print_r($dataArr);exit;
            
            $validator = Validator::make($request->all(), [
                        //'is_package'                   => 'required',
                        'phone_to_reroute'          => 'required',
                        'welcome_note'              => 'required',
                        'reroute_confirm'           => 'required',
                        'center_to_customer_route'  => 'required',
                        'unreach_note'              => 'required',
                        'info_type'                 => 'required',
                        'company_name'              => 'required',
                        'company_type'              => 'required',
//                        'company_info'              => 'required',
                        'gender'                    => 'required',
                        'fullname'                  => 'required',
                        'date_of_birth'             => 'required',
                        'address'                   => 'required',
                        'postal_code'               => 'required',
                        'phone'                     => 'required',
                        'email'                     => 'required|email',
                        'account_name'              => 'required',
                        'account_iban'              => 'required',
                        'account_bic'               => 'required',
                        'accept'                    => 'required',
                        'aggrement'                 => 'required'
            ]);

            if ($validator->fails()) {
                return redirect(route('order'))->withErrors($validator)->withInput();
            }

            $objOrderInfo = new OrderInfo();
            $resultArr = $objOrderInfo->saveOrderInfo($dataArr);
            
            if($resultArr){
//                $request->session()->flash('session_success', 'Add successfully.');
                Session::flash('message', 'Order Add successfully.!'); 
                Session::flash('class', 'alert-info'); 
                return redirect(route('home'));
            }else{
//                $request->session()->flash('session_error', 'Something will be wrong. Please try again.');
                Session::flash('message', 'Something will be wrong. Please try again.!'); 
                Session::flash('class', 'alert-danger');
                return redirect(route('order'));
            }
            
        }
        
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('');
        $data['js'] = array('order.js');
        $data['funinit'] = array('Order.Init');
       

        
        return view('front.order', $data);
    }
}
