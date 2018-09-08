<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class EmployeeDetails extends Model {

    protected $table = 'employee_details';

    public function saveEmployeeDetail($request,$lastId) {
//        print_r($request->input());
//        exit;
        $dayArray = $request->input('day');
        $startTimeArray = $request->input('start');
        $endTimeArray = $request->input('end');
        foreach ($dayArray as $key => $value) {
            $objEmpDetails = new EmployeeDetails();
            $objEmpDetails->employee_id = $lastId;
            $objEmpDetails->day_name = $value;
            $objEmpDetails->day_start_time = date("H:i:s", $startTimeArray[$key]);
            $objEmpDetails->day_end_time = date("H:i:s", $endTimeArray[$key]);
            $objEmpDetails->created_at = date('Y-m-d H:i:s');
            $objEmpDetails->updated_at = date('Y-m-d H:i:s');
            $objEmpDetails->save();
//            $objEmpDetails = '';
        }
        return true;
    }

}
