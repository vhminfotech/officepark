<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class Support extends Model {

    protected $table = 'support';
    
    public function supportlist($id = null){
        $sql = Support::join('users', 'users.id', '=', 'support.user_id');
        if(!empty($id)){
            $sql->where('support.user_id',$id);  
        }
        $result = $sql->get(['support.*','users.name','users.customer_number','users.type'])->toarray();
        return $result;
    }
   
    public function saveSupport($request,$user_id = null){
            $objSupport = new Support();
            $objSupport->user_id = (isset($user_id) && !empty($user_id)) ? $user_id : '';            
            $objSupport->support_id = $request->input('support_message');
            $objSupport->Note = $request->input('note');
            $objSupport->created_at = date('Y-m-d H:i:s');
            return ($objSupport->save());
    }
   
    public function getSupport($id = null){
        $sql = Support::join('users', 'users.id', '=', 'support.user_id');
            $sql->where('support.id',$id);  
        $result = $sql->get(['support.*','users.name','users.customer_number','users.type'])->toarray();
        return $result;
    }
    
    // function supportdelete($request) {
    //     return Support::where('id', $request)->delete();
    // }
    
    
    public function supportlistDetails($id){
        $sql = Support::where('id',$id);
        $result = $sql->get(['support_id','note','id'])->toarray();
        return $result;
    }
    
    public function countsupport($usertype,$id=null){
        if($usertype == 'admin'){
            $sql = Support::where('admin_response_status','0')->count();
            return $sql;
        }else{
           
            $sql = Support::where('customer_response_status','0')
                      ->where('user_id',$id)->count();
            return $sql; 
        }
         
    }
    
}
