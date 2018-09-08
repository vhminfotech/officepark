<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class Employee extends Model {

    protected $table = 'employee';

    public function saveEmployeeInfo($request) {
//        print_r($request->input());
//        exit;

        $result = Employee::where('email', $request->input('email'))->get()->count();
        $return = '';
        if ($result == 0) {
            $objUser = new Employee();
            $objUser->first_name = $request->input('firstName');

            $objUser->last_name = $request->input('lastName');
            $objUser->employee_image = $request->input('email');
            $objUser->job_title = $request->input('jobtitle');
            $objUser->responsibility = $request->input('responsibility');

            $objUser->p_away_msg = $request->input('p_away_msg');
            $objUser->call_bac_msg = $request->input('call_back_msg');
            $objUser->telephone = $request->input('telephone');
            $objUser->mobile_phone = $request->input('mobile');
            $objUser->email = $request->input('email');
            $objUser->any_other_info = $request->input('anyotherinformation');
            $objUser->my_profile = $request->input('my_profile');
            $objUser->call_transfer_telephone = (empty($request->input('call_transfer_telephone')) ? 0 : 1);
            $objUser->call_transfer_mobile_phone = (empty($request->input('call_transfer_mobile_phone')) ? 0 : 1);
            $objUser->transfer_notification_to_call = (empty($request->input('transfer_notification_to_call')) ? 0 : 1);
            $objUser->transfer_notification_to_mobile_phone = empty($request->input('transfer_notification_to_mobile_phone')) ? 0 : 1;
            $objUser->is_lunch_time = $request->input('launch_time');
            $objUser->lunch_start_time = $request->input('global_start_time');
            $objUser->lunch_end_time = $request->input('global_end_time');
            $objUser->no_business_hour_adjust = (empty($request->input('no_business_hour_adjust')) ? 0 : 1);
            $objUser->holiday_global_from = date('Y-m-d', strtotime($request->input('holidayfrom')));
            $objUser->holiday_global_to = date('Y-m-d', strtotime($request->input('holidayto')));
            $objUser->created_at = date('Y-m-d H:i:s');
            $objUser->updated_at = date('Y-m-d H:i:s');
            $objUser->save();
            $lastId = $objUser->id;
            $return = $lastId;
        } else {
            $return = false;
        }
        return $return;
    }

    public function employeeList() {
        return Employee::
        leftjoin('employee_details', 'employee_details.employee_id', '=', 'employee.id')
        ->groupBy('employee.id')
        ->get(['employee.*',
        'employee_details.day_name',
        'employee_details.day_start_time',
        'employee_details.day_end_time']);
    }

}
