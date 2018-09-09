<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class EmployeeDetails extends Model {

    protected $table = 'employee_details';

      public function saveEmployeeDetail($request,$lastId) {
        EmployeeDetails::where('employee_id',$lastId)->delete();
        $dayArray = $request->input('day');
        $startTimeArray = $request->input('start');
        $endTimeArray = $request->input('end');
        foreach ($startTimeArray as $key => $value) {
            $objEmpDetails = new EmployeeDetails();
            $objEmpDetails->employee_id = $lastId;
            $objEmpDetails->day_name = $key;
            $objEmpDetails->day_start_time = (array_key_exists($key,$dayArray) ? $value : '');
            $objEmpDetails->day_end_time = (array_key_exists($key,$dayArray) ? $endTimeArray[$key] : '');
//            $objEmpDetails->day_start_time = (empty($value) || $dayArray[$key]=='' ? '' : $value);
//            $objEmpDetails->day_end_time = (empty($endTimeArray[$key]) || $dayArray[$key]=='' ? '' :$endTimeArray[$key]);
            $objEmpDetails->created_at = date('Y-m-d H:i:s');
            $objEmpDetails->updated_at = date('Y-m-d H:i:s');
            $objEmpDetails->save();
        }
        return true;
    }
    
    public function saveEmployeeDetail1($request,$lastId) {
//        print_r($request->input());
//        exit;
        EmployeeDetails::where('employee_id',$lastId)->delete();
        $dayArray = $request->input('day');
        $startTimeArray = $request->input('start');
        $endTimeArray = $request->input('end');
        foreach ($dayArray as $key => $value) {
            $objEmpDetails = new EmployeeDetails();
            $objEmpDetails->employee_id = $lastId;
            $objEmpDetails->day_name = $value;
            $objEmpDetails->day_start_time = $startTimeArray[$key];
            $objEmpDetails->day_end_time = $endTimeArray[$key];
            $objEmpDetails->created_at = date('Y-m-d H:i:s');
            $objEmpDetails->updated_at = date('Y-m-d H:i:s');
            $objEmpDetails->save();
//            $objEmpDetails = '';
        }
        return true;
    }
    
    public function deleteEmpDetails($empId){
         EmployeeDetails::where('employee_id',$empId)->delete();
         return true;
    }

}
