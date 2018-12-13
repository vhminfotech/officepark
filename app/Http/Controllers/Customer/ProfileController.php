<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Model\Addressbook;
use App\Model\Customer;
use App\Model\Users;
use App\Model\Invoice;
use App\Model\Calls;
use App\Model\Customer_info;
use App\Model\Customer_details;
use App\Model\OrderInfo;
use Auth;
use Route;
use Illuminate\Http\Request;
use Config;

class ProfileController extends Controller {
    
    public function __construct() {
        parent::__construct();
        $this->middleware('customer');
    }

    public function editprofile(Request $request){
        $data['detail'] = $this->loginUser;
        $customerId = $data['detail']['id'];
        if ($request->isMethod('post')) {
            $objCustomer = new Users();
            $customerResult = $objCustomer->updateCustomerInfo($request);
            
            if($customerResult == true){
            $objCustomerInfo= new Customer_info();
            $customerInfo=$objCustomerInfo->updateCustomerInfo($request);            
            }
            
            if($customerInfo == true){
            $objCustomerDetails= new Customer_details();
            $customerDetails=$objCustomerDetails->updateDetails($request);            
            }
            
            if ($customerDetails == true) {   
                $return['status'] = 'success';
                $return['message'] = 'Customer Edit successfully.';
                $return['redirect'] = route('customer-edit-profile');
            } else {

                $return['status'] = 'error';
                $return['message'] = 'Email already exists.';
            }
            echo json_encode($return);
            exit;
        }
       

        /* Start For BillInfo */
        $objOrder = new OrderInfo();
        $data['arrOrder'] = $objOrder->getInfoV2($customerId);

        $data['arrOrderInfoStatus'] = $objOrder->getCustomerData($customerId);
        $data['arrTime'] = Config::get('constants.arrTime');
      

        $objUser = new Users();
        $data['arrCustomer'] = $objUser->getCustomerInfo($customerId);
        $data['getCustomer'] = $objUser->getCustomer(null);
         
        $objinvoice = new Invoice();
        $data['getServiceName'] = $objinvoice->getServiceName();
        $objcustomerInfo = new Customer_info();
        $data['customer_info'] = $objcustomerInfo->getcustomerInfo($customerId);
     
        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/customer.js','customer/profile.js','ajaxfileupload.js',
            'jquery.form.min.js');
        $data['funinit'] = array('Customer.editInit()','Profile.init()');
        return view('customer.profile.profile-edit', $data);
    }

    public function changepassword(Request $request)
    {
        $data['detail'] = $this->loginUser;
        if ($request->isMethod('post')) {
            $loginUserpassword = Auth()->guard('customer')->user()->password;
            $id = Auth()->guard('customer')->user()->id;
            $currentpassword = $request['currentpassword'];
            $newpassword = $request['newpassword'];
            $hashedpaasword = Hash::make($currentpassword);
            if (!Hash::check($currentpassword,$loginUserpassword)) {
                $return['status'] = 'error';
                $return['message'] = 'Old password Does Not Match !!.';
                 $return['redirect'] = route('customer-change-password');
            } else {
                $objuserpasswordedit = new Users();
                $updatepassword = $objuserpasswordedit->saveEditUserPassword($id, $newpassword);
                $return['status'] = 'success';
                $return['message'] = 'User Password successfully Changed.';
                $return['redirect'] = route('customer-change-password');
            }
            echo json_encode($return);
            exit;

        }
        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js',
            );
        $data['js'] = array('admin/updateprofile.js','ajaxfileupload.js',
            'jquery.form.min.js');
        $data['css_plugin'] = array(
          'bootstrap-fileinput/bootstrap-fileinput.css',  
        );
        $data['funinit'] = array('Updateprofile.edit_init()');

        return view('customer.profile.user-edit', $data);
    }
}