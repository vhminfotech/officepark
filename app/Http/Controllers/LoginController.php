<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use App\Model\Calls;
use App\Model\Users;
use App\Model\OrderInfo;

class LoginController extends Controller {

    use AuthenticatesUsers;

    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('guest', ['except' => 'logout']);
    }

    public function checkAuth(Request $request) {
        if (auth()->guard('admin')->user()) {
            return redirect()->route('admin-dashboard');
        } else if (auth()->guard('customer')->user()) {
            return redirect()->route('customer-dashboard');
        } else if (auth()) {
            return redirect()->route('user-dashboard');
        } else {
            return view('auth.login');
        }
    }

    public function auth(Request $request) {

        $this->resetGuard();

//        if(Auth::guard('admin')){
//            return redirect(route('admin-dashboard'));
//        }else if(Auth::guard('customer')){
//            return redirect(route('customer-dashboard'));
//        }else if(Auth::guard('web')){
//            return redirect(route('user-dashboard'));
//        }else{
//            return view('auth.login');
//        }

        if ($request->isMethod('post')) {

            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'type' => 'USER'])) {
                $loginData = array(
                    'name' => Auth::guard('web')->user()->name,
                    'email' => Auth::guard('web')->user()->email,
                    'type' => Auth::guard('web')->user()->type,
                    'user_image' => Auth::guard('web')->user()->user_image,
                    'id' => Auth::guard('web')->user()->id
                );
                Session::push('logindata', $loginData);
                $request->session()->flash('session_success', 'User Login successfully.');
                return redirect()->route('user-dashboard');
            } else if (Auth::guard('customer')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'type' => 'CUSTOMER'])) {
                $loginData = array(
                    'name' => Auth::guard('customer')->user()->name,
                    'email' => Auth::guard('customer')->user()->email,
                    'type' => Auth::guard('customer')->user()->type,
                    'id' => Auth::guard('customer')->user()->id,
                    'user_image' => Auth::guard('customer')->user()->user_image
                );
                Session::push('logindata', $loginData);
                $request->session()->flash('session_success', 'Customer Login successfully.');
                return redirect()->route('customer-dashboard');
            } else if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'type' => 'ADMIN'])) {
                $objOrderInfo = new OrderInfo();
                $totalOrder = $objOrderInfo->newOrdergetNotification();
                $resultArr = $objOrderInfo->newOrderCount('new');
                $this->getUserRoleList(Auth::guard('admin')->user()->id,$request);
                $role = $request->session()->get('userRole');
//                $role = $request->session()->get('currentRole');
//              $roles =  Session::get('currentRole');
                $roles =  Session::get('userRole');
        
                $loginData = array(
                    'name' => Auth::guard('admin')->user()->name,
                    'email' => Auth::guard('admin')->user()->email,
                    'type' => Auth::guard('admin')->user()->type,
                    'user_image' => Auth::guard('admin')->user()->user_image,
                    'id' => Auth::guard('admin')->user()->id,
                );
                Session::push('logindata', $loginData);

                Session::put('ordercount', $resultArr);
                Session::put('totalOrder', $totalOrder);
                $request->session()->flash('session_success', 'Admin Login successfully.');
                return redirect()->route('admin-dashboard');
            } else if (Auth::guard('agent')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'type' => 'AGENT'])) {

                $loginData = array(
                    'name' => Auth::guard('agent')->user()->name,
                    'email' => Auth::guard('agent')->user()->email,
                    'type' => Auth::guard('agent')->user()->type,
                    'user_image' => Auth::guard('agent')->user()->user_image,
                    'inopla_username' => Auth::guard('agent')->user()->inopla_username,
                    'id' => Auth::guard('agent')->user()->id
                );
                $this->getUserRoleList(Auth::guard('agent')->user()->id,$request);
                Session::push('logindata', $loginData);
                $request->session()->flash('session_success', 'Agent Login successfully.');
                return redirect()->route('agent-dashboard');
            } else {
                $request->session()->flash('session_error', 'Your username and password are wrong. Please login with correct credential...!!');
                return redirect()->route('login');
            }
        }

        return view('auth.login');
    }

    public function getUserRoleList($userId, $request) {
        $objUser = new Users();
        $userPermission = $objUser->getPermissionV2($userId);
        $request->session()->put('userRole', $userPermission);
//        Session::push('logindata', $loginData);
        return TRUE;
    }

    public function getLogout() {
        $this->resetGuard();
        //return Redirect::to('login'); 
        return redirect()->route('login');
    }

    public function resetGuard() {
        Auth::logout();
        Auth::guard('admin')->logout();
        Auth::guard('customer')->logout();
        Auth::guard('agent')->logout();
        Session::forget('logindata');
        Session::forget('userRole');
    }

    public function newcall1() {
        $date = date('YmdHis');
        $handle = fopen($date . "pcall.txt", "a");
        foreach ($_REQUEST as $variable => $value) {
            fwrite($handle, $variable);
            fwrite($handle, "=");
            fwrite($handle, $value);
            fwrite($handle, "\r\n");
        }
        fwrite($handle, "\r\n");
        fclose($handle);
    }

    public function newcall(Request $request) {

        //echo 'dd';exit;
        $dd = $_REQUEST;
        $objCall = new Calls();
        $result = $objCall->addCalls($dd);
        $return['status'] = 'success';
        $return['message'] = 'Call added successfully.';
        if($result){
            // echo json_encode($return);
            // exit;  
        }
    }  
    public function getNewOrder(Request $request) {

        $objOrderInfo = new OrderInfo();
        $resultArr = $objOrderInfo->newOrderCount('new');
        
        Session::put('ordercount', $resultArr);
        $return['status'] = 'success';
        $return['message'] = 'New Order arrival.';
        $return['redirect'] = '';
        $return['orderCount'] = $resultArr;
        echo json_encode($return);
            exit;

    }
    public function getNotification(Request $request) {

        $objOrderInfo = new OrderInfo();
        $totalOrder = $objOrderInfo->newOrdergetNotification();
        
        $resultArr = $objOrderInfo->newOrderCount('new');
        
        Session::put('ordercount', $resultArr);
        Session::put('totalOrder', $totalOrder);
        
        $return['status'] = 'success';
        $return['message'] = 'New Order arrival.';
        $return['redirect'] = '';
        $return['jscode'] = ' setTimeout(function(){ location.reload(); }, 3000);';
        $return['orderCount'] = $resultArr;
        $return['totalOrder'] = $totalOrder;
        echo json_encode($return);
        exit;

    }

     public function forgotpassword(Request $request) {

        if ($request->isMethod('post')) {
            // print_r($request->input());exit;
            $objUser = new Users();
            $getCustomer = $objUser->passwordReset($request->input('email'));
            if ($getCustomer) {
                $return['status'] = 'success';
                $return['message'] = 'Password sent to your e-mail check and login with it';
                $return['redirect'] = route('login');
            } else {
                $return['status'] = 'error';
                $return['message'] = "E-mail does't exists!";
            }
            echo json_encode($return);
            exit;
        }

        $data['plugincss'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/user.js');
        $data['funinit'] = array('Customer.forgotInit()');
        $data['css'] = array('');
        return view('auth.passwords.forgot-password', $data);
    }

}