<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class Customer_plan extends Model {

    protected $table = 'customer_plan';
    
    public function planlist($id){
        
        $result= Customer_plan::join('employee', 'employee.id', '=', 'customer_plan.employee')
               ->where('customer_plan.customer_id',$id)
               ->get(['customer_plan.*','employee.first_name','employee.last_name'])->toarray();

        return $result;
    }

    public function getStatus($id) {
        $result = Customer_plan::where('customer_id',$id)->pluck('status', 'id')->toArray();
        return $result;
    }

    public function getMessage($id) {
        $result = Customer_plan::where('customer_id',$id)->pluck('message', 'id')->toArray();
        return $result;
    }  

    public function getNumber($id) {
        $result = Customer_plan::where('customer_id',$id)->pluck('transfer_call_no', 'id')->toArray();
        return $result;
    }

    public function getInformation($id) {
        $result = Customer_plan::where('customer_id',$id)->pluck('responsibilty', 'id')->toArray();
        return $result;
    }
    
    public function addplanlist($request){
            $objUser = new Customer_plan();
            $objUser->customer_id = $request->input('customer_id');            
            $objUser->start_date =date('Y-m-d',  strtotime($request->input('startdate'))); 
            $objUser->end_date = date('Y-m-d',  strtotime($request->input('enddate')));
            $objUser->start_time = $request->input('starttime');
            $objUser->end_time = $request->input('endtime');
            
            $objUser->status = $request->input('status');
            $objUser->message = $request->input('message');
            $objUser->transfer_call_no = $request->input('transfercall');
            $objUser->responsibilty = $request->input('responsibility');
            $objUser->employee = $request->input('employee');
            $objUser->Note = $request->input('note');
            $objUser->created_at = date('Y-m-d H:i:s');
            $objUser->updated_at = date('Y-m-d H:i:s');
            return ($objUser->save());
    }
    
    
    public function editplanlist($id){
       $result= Customer_plan :: select('*')
                ->where('id',$id)
                ->get()->toarray();
        return $result;
    }
    

    public function editsaveplanlist($request){
      
        $id=$request->input('id');
        $objEditUser = Customer_plan::find($id);
        
        $objEditUser->start_date = date('Y-m-d',  strtotime($request->input('startdate'))); 
        $objEditUser->end_date = date('Y-m-d',  strtotime($request->input('enddate'))); 
        $objEditUser->start_time = $request->input('starttime');
        $objEditUser->end_time = $request->input('endtime');
        $objEditUser->message = $request->input('message');
        $objEditUser->status = $request->input('status');
        $objEditUser->transfer_call_no = $request->input('transfercall');
        $objEditUser->responsibilty = $request->input('responsibility');
        $objEditUser->employee = $request->input('employee');
        $objEditUser->Note = $request->input('note');
        $objEditUser->updated_at = date('Y-m-d H:i:s');
        
       return ($objEditUser->save());
    }
    
   
    function deleteplan($request) {
        return Customer_plan::where('id', $request)->delete();
    }
    
    
}
