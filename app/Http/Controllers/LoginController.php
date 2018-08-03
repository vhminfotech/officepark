<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;

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
                
        if (auth()->guard('admin')->user()) 
        {
            return redirect()->route('admin-dashboard');
        }
        else if (auth()->guard('customer')->user()) 
        {
            return redirect()->route('customer-dashboard');
        }
        else if(auth()) 
        {
            return redirect()->route('user-dashboard');
        }
        else
        {
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

            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'type' => '0'])) 
            {
                $loginData = array(
                    'name'  => Auth::guard('web')->user()->name,
                    'email' => Auth::guard('web')->user()->email,
                    'type'  => Auth::guard('web')->user()->type,
                    'id'    => Auth::guard('web')->user()->id
                );
                Session::push('logindata', $loginData);
                
                return redirect()->route('user-dashboard');
            }
            else if (Auth::guard('customer')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'type' => '1'])) 
            {
                $loginData = array(
                    'name'  => Auth::guard('customer')->user()->name,
                    'email' => Auth::guard('customer')->user()->email,
                    'type'  => Auth::guard('customer')->user()->type,
                    'id'    => Auth::guard('customer')->user()->id
                );
                Session::push('logindata', $loginData);
                
                return redirect()->route('customer-dashboard');
            }
            else if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'type' => '2'])) 
            {
                $loginData = array(
                    'name'  => Auth::guard('admin')->user()->name,
                    'email' => Auth::guard('admin')->user()->email,
                    'type'  => Auth::guard('admin')->user()->type,
                    'id'    => Auth::guard('admin')->user()->id
                );
                Session::push('logindata', $loginData);
                
                return redirect()->route('admin-dashboard');
            } 
            else 
            {
                $data['error'] = 'Your username and password are wrong. Please login with correct credential...!!';
                return view('auth.login', $data);
                dd('your username and password are wrong.');
            }
        }
        
        return view('auth.login');
    }
    
    public function getLogout(){
        $this->resetGuard();
        //return Redirect::to('login'); 
        return redirect()->route('login');
    }
    
    public function resetGuard(){
        Auth::logout(); 
        Auth::guard('admin')->logout();
        Auth::guard('customer')->logout();
        Session::forget('logindata');
    }
}