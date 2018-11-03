<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use App;
use App\Model\OrderInfo;
use Session;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public $loginUser;

    public function __construct() {

        if (isset($_COOKIE["language"])) {
            $lang = $_COOKIE["language"];
        } else {
            $lang = 'en';
            $_COOKIE["language"] = $lang;
        }


        if (!empty($lang)) {
            App::setLocale($lang);
        } else {
            App::setLocale('en');
        }  
        
        $this->middleware(function ($request, $next) {

            $objOrderInfo = new OrderInfo();
            $totalOrder = $objOrderInfo->newOrdergetNotification();
            Session::put('totalOrder', $totalOrder);
        
            $resultArr = $objOrderInfo->newOrderCount('new');
        
            Session::put('ordercount', $resultArr);
        
            if (!empty(Auth()->guard('admin')->user())) {
                $this->loginUser = Auth()->guard('admin')->user();
            }
            if (!empty(Auth()->guard('customer')->user())) {
                $this->loginUser = Auth()->guard('customer')->user();
            }
            if (!empty(Auth()->guard('agent')->user())) {
                $this->loginUser = Auth()->guard('agent')->user();
            }
            if (!empty(Auth::user())) {
                $this->loginUser = Auth::user();
            }

            return $next($request);
        });
        
        
    }

}
