<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
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
        //echo "hi";exit;
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
                'password' => 'required',
            ]);

            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'type' => 'USER'])) {
                $loginData = array(
                    'name' => Auth::guard('web')->user()->name,
                    'email' => Auth::guard('web')->user()->email,
                    'type' => Auth::guard('web')->user()->type,
                    'id' => Auth::guard('web')->user()->id
                );
                Session::push('logindata', $loginData);
                // $return['status'] = 'success';
                // $return['message'] = 'User Login successfully.';
                // $return['redirect'] = route('user-dashboard');
                // print_r($return);exit;
               return redirect()->route('user-dashboard');
            } else if (Auth::guard('customer')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'type' => 'CUSTOMER'])) {
                $loginData = array(
                    'name' => Auth::guard('customer')->user()->name,
                    'email' => Auth::guard('customer')->user()->email,
                    'type' => Auth::guard('customer')->user()->type,
                    'id' => Auth::guard('customer')->user()->id
                );
                Session::push('logindata', $loginData);
                // $return['status'] = 'success';
                // $return['message'] = 'Customer Login successfully.';
                // $return['redirect'] = route('customer-dashboard');
                return redirect()->route('customer-dashboard');
            } else if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'type' => 'ADMIN'])) {
                $objOrderInfo = new OrderInfo();
                $resultArr = $objOrderInfo->newOrderCount('new');
                
                $loginData = array(
                    'name' => Auth::guard('admin')->user()->name,
                    'email' => Auth::guard('admin')->user()->email,
                    'type' => Auth::guard('admin')->user()->type,
                    'id' => Auth::guard('admin')->user()->id,
                    'ordercount'=> $resultArr
                );
                Session::push('logindata', $loginData);
                // $return['status'] = 'success';
                // $return['message'] = 'Admin Login successfully.';
                // $return['redirect'] =   route('admin-dashboard');
               return redirect()->route('admin-dashboard');
            } else if (Auth::guard('agent')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'type' => 'AGENT'])) {

                $loginData = array(
                    'name' => Auth::guard('agent')->user()->name,
                    'email' => Auth::guard('agent')->user()->email,
                    'type' => Auth::guard('agent')->user()->type,
                    'id' => Auth::guard('agent')->user()->id
                );
                Session::push('logindata', $loginData);
                // $return['status'] = 'success';
                // $return['message'] = 'Agent Login successfully.';
                // $return['redirect'] = route('agent-dashboard');
                return redirect()->route('agent-dashboard');
            } else {
                // $return['status'] = 'error';
                // $return['message'] = 'your username and password are wrong';
               $data['error'] = 'Your username and password are wrong. Please login with correct credential...!!';
               return view('auth.login', $data);
               dd('your username and password are wrong.');
            }
            // echo json_encode($return);
            // exit;
        }
        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('login.js');
        $data['funinit'] = array('Login.loginInit()');
        return view('auth.login', $data);
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
        Session::forget('logindata');
    }

}