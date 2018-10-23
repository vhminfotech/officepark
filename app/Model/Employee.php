<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use Config;

class Employee extends Model {

    protected $table = 'employee';

    public function saveEmployeeInfo($request) {
//        print_r($request->input());
//        print_r($request->file('file'));
//        exit;

        $result = Employee::where('email', $request->input('email'))->get()->count();
        $return = '';
        if ($result == 0) {
            $destinationPath = Config::get('constants.EmployeePath');
//            print_r($destinationPath);exit;
            if ($request->file('file')) {
                $logo_name = str_replace(" ", "_", $request->file('file')->getClientOriginalName());
                $filename = 'employee' . '-' . $logo_name;
                $request->file('file')->move($destinationPath, $filename);
            } else {
                $filename = '';
            }

            $objUser = new Employee();
            $objUser->first_name = $request->input('firstName');
            $objUser->customer_id = $request->input('customer_id');
            $objUser->last_name = $request->input('lastName');
            $objUser->employee_image = $filename;
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
            $objUser->lunch_start_time = (empty($request->input('launch_time'))) ? '' : $request->input('global_start_time');
            $objUser->lunch_end_time = (empty($request->input('launch_time'))) ? '' : $request->input('global_end_time');
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

    public function editEmployeeInfo($request) {
//        print_r($request->input());
//        exit;
        $result = Employee::where('email', '=', $request->input('email'))
                        ->where('id', '!=', $request->input('empId'))
                        ->get()->count();
        $return = '';
        if ($result == 0) {
            $destinationPath = Config::get('constants.EmployeePath');
            if ($request->file('file')) {
                $logo_name = str_replace(" ", "_", $request->file('file')->getClientOriginalName());
                $filename = 'employee' . '-' . $logo_name;
                $request->file('file')->move($destinationPath, $filename);
            } else {
                $filename = $request->input('employee_image');
            }

            $objEmpEdit = Employee::find($request->input('empId'));
            $objEmpEdit->first_name = $request->input('firstName');
            $objEmpEdit->customer_id = $request->input('customer_id');

            $objEmpEdit->last_name = $request->input('lastName');
            $objEmpEdit->employee_image = $filename;
            $objEmpEdit->job_title = $request->input('jobtitle');
            $objEmpEdit->responsibility = $request->input('responsibility');

            $objEmpEdit->p_away_msg = $request->input('p_away_msg');
            $objEmpEdit->call_bac_msg = $request->input('call_back_msg');
            $objEmpEdit->telephone = $request->input('telephone');
            $objEmpEdit->mobile_phone = $request->input('mobile');
            $objEmpEdit->email = $request->input('email');
            $objEmpEdit->any_other_info = $request->input('anyotherinformation');
            $objEmpEdit->my_profile = $request->input('my_profile');
            $objEmpEdit->call_transfer_telephone = (empty($request->input('call_transfer_telephone')) ? 0 : 1);
            $objEmpEdit->call_transfer_mobile_phone = (empty($request->input('call_transfer_mobile_phone')) ? 0 : 1);
            $objEmpEdit->transfer_notification_to_call = (empty($request->input('transfer_notification_to_call')) ? 0 : 1);
            $objEmpEdit->transfer_notification_to_mobile_phone = empty($request->input('transfer_notification_to_mobile_phone')) ? 0 : 1;
            $objEmpEdit->is_lunch_time = $request->input('launch_time');
            $objEmpEdit->lunch_start_time = (empty($request->input('launch_time'))) ? '' : $request->input('global_start_time');
            $objEmpEdit->lunch_end_time = (empty($request->input('launch_time'))) ? '' : $request->input('global_end_time');
            $objEmpEdit->no_business_hour_adjust = (empty($request->input('no_business_hour_adjust')) ? 0 : 1);
            $objEmpEdit->holiday_global_from = date('Y-m-d', strtotime($request->input('holidayfrom_holiday')));
            $objEmpEdit->holiday_global_to = date('Y-m-d', strtotime($request->input('holiday_global_to')));
            $objEmpEdit->created_at = date('Y-m-d H:i:s');
            $objEmpEdit->updated_at = date('Y-m-d H:i:s');
            $objEmpEdit->save();
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }

    public function employeeList($request=null) {
        if(!empty($request)){
           return DB::table('employee')
                ->join('users', 'users.id', '=', 'employee.customer_id')
                ->join('employee_details', 'employee_details.employee_id', '=', 'employee.id')
                ->groupBy('employee.id')
                ->where('users.customer_number','=',$request)
                ->get(['employee.*',
                            'employee_details.day_name',
                            'employee_details.day_start_time',
                            'employee_details.day_end_time',
                    'users.customer_number']);
        }else{
        return DB::table('employee')
                ->join('users', 'users.id', '=', 'employee.customer_id')
                ->join('employee_details', 'employee_details.employee_id', '=', 'employee.id')
                ->groupBy('employee.id')
                ->get(['employee.*',
                            'employee_details.day_name',
                            'employee_details.day_start_time',
                            'employee_details.day_end_time','users.customer_number']);
        }
              
    }
    public function getemployeeCusList($request=null) {
       
        return DB::table('employee')
                ->join('users', 'users.id', '=', 'employee.customer_id')
                ->join('employee_details', 'employee_details.employee_id', '=', 'employee.id')
                ->groupBy('users.customer_number')
                ->get(['employee.*',
                            'employee_details.day_name',
                            'employee_details.day_start_time',
                            'employee_details.day_end_time',
                            'users.customer_number']);
        
              
    }

    public function geteEmployeeEdit($id) {
        
        return Employee::leftjoin('employee_details', 'employee_details.employee_id', '=', 'employee.id')
                        ->where('employee.id', $id)
                        ->get(['employee.*',
                            'employee_details.day_name',
                            'employee_details.day_start_time',
                            'employee_details.day_end_time']);
    }

    public function deleteEmployee($empId) {
        Employee::where('id', $empId)->delete();
        return true;
    }

}
