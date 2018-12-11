<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class Customer_plan extends Model {

    protected $table = 'customer_plan';
    
    public function planlist($id){
        $result= Customer_plan :: select('*')
                ->where('customer_id',$id)
                ->get()->toarray();
        return $result;
    }
    
    public function addplanlist($request){
            $objUser = new Customer_plan();
            $objUser->customer_id = $request->input('customer_id');            
            $objUser->start_date =date('Y-m-d',  strtotime($request->input('startdate'))); 
            $objUser->end_date = date('Y-m-d',  strtotime($request->input('enddate')));
            $objUser->start_time = $request->input('starttime');
            $objUser->end_time = $request->input('endtime');
            $objUser->message = $request->input('message');
            $objUser->status = $request->input('status');
            $objUser->transfer_call_no = $request->input('transfercall');
            $objUser->phoneno = $request->input('number');
            $objUser->information = $request->input('information');
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
        $objEditUser->phoneno = $request->input('number');
        $objEditUser->information = $request->input('information');
        $objEditUser->Note = $request->input('note');
        $objEditUser->updated_at = date('Y-m-d H:i:s');
        
       return ($objEditUser->save());
    }
    
   
    function deleteplan($request) {
        return Customer_plan::where('id', $request)->delete();
    }
    
    
}
