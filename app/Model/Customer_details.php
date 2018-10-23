<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class Customer_details extends Model {

    protected $table = 'customer_details';
    
    public function updateDetails($request){
        
         $userId = $request->input('custId');
          customer_details::where('user_id',$userId)->delete();
        $dayArray = $request->input('day');
        $startTimeArray = $request->input('start');
        $endTimeArray = $request->input('end');
        foreach ($dayArray as $key => $value) {
            $objEmpDetails = new Customer_details();
            $objEmpDetails->user_id = $userId;
            $objEmpDetails->day_name = $value;
            $objEmpDetails->day_start_time = $startTimeArray[$key];
            $objEmpDetails->day_end_time = $endTimeArray[$key];
            $objEmpDetails->created_at = date('Y-m-d H:i:s');
            $objEmpDetails->updated_at = date('Y-m-d H:i:s');
            $objEmpDetails->save();
//            $objEmpDetails = '';
        }
       $return = true;
       return $return;
    }
    
   
}
