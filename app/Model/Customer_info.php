<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class Customer_info extends Model {

    protected $table = 'customer_info';
    
    public function updateCustomerInfo($request){
         $userId = $request->input('custId');
         $result = customer_info::where('user_id',$userId)->get()->count();
       
          if ($result == 0) {
              
                        $objUser = new Customer_info();
                        $objUser->user_id =$userId;
                        $objUser->call_transfer_telephone = $request->input('call_transfer_telephone');
                        $objUser->call_transfer_mobile_phone = $request->input('call_transfer_mobile_phone');
                        $objUser->transfer_notification_to_call = $request->input('transfer_notification_to_call');
                        $objUser->transfer_notification_to_mobile_phone = $request->input('transfer_notification_to_mobile_phone');
                        $objUser->lunch_start_time = $request->input('global_start_time');
                        $objUser->lunch_end_time = $request->input('global_end_time');
                        $objUser->is_lunch_time = $request->input('is_lunch_time');
                        $objUser->no_business_hour_adjust=$request->input('no_business_hour_adjust');
                        $objUser->holiday_global_from = $request->input('holidayfrom');
                        $objUser->holiday_global_to = $request->input('holidayto');
                        $objUser->save();
          }else{
                    Customer_info::where('user_id', $userId)
                    ->update([
                        'call_transfer_telephone' => $request->input('call_transfer_telephone'),
                        'call_transfer_mobile_phone' => $request->input('call_transfer_mobile_phone'),
                        'transfer_notification_to_call' => $request->input('transfer_notification_to_call'),
                        'transfer_notification_to_mobile_phone' => $request->input('transfer_notification_to_mobile_phone'),
                        'lunch_start_time' => $request->input('global_start_time'),
                        'lunch_end_time' => $request->input('global_end_time'),
                        'is_lunch_time' => $request->input('is_lunch_time'),
                        'no_business_hour_adjust'=>$request->input('no_business_hour_adjust'),
                        'holiday_global_from' => $request->input('holidayfrom'),
                        'holiday_global_to' => $request->input('holidayto')
                             ]);
          }
            $return = true;
           return $return;
    }
    
    public function getcustomerInfo($request){
        return customer_info::select('*')
                ->where('user_id', '=', $request)
                ->get()->toarray();
        
    }
}
