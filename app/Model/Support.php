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
        $result = $sql->get(['support.*','users.name'])->toarray();
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
   
    // function supportdelete($request) {
    //     return Support::where('id', $request)->delete();
    // }
    
    
}
