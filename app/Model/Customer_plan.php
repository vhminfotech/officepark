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
            $objUser->datetime = date('Y-m-d',  strtotime($request->input('date')));
            $objUser->start_date =date('Y-m-d',  strtotime($request->input('startdate'))); 
            $objUser->end_date = date('Y-m-d',  strtotime($request->input('enddate')));
            $objUser->message = $request->input('message');
            $objUser->status = $request->input('status');
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
        $objEditUser->datetime = $request->input('date');
        $objEditUser->start_date = $request->input('startdate');
        $objEditUser->end_date = $request->input('enddate');
        $objEditUser->message = $request->input('message');
        $objEditUser->status = $request->input('status');
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
