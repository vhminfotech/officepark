<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class Support extends Model {

    protected $table = 'support';
    
    public function supportlist($id){
        $result= Support::join('users', 'users.id', '=', 'support.user_id')
               ->where('support.user_id',$id)
               ->get(['support.*','users.name'])->toarray();
        return $result;
    }

   
    public function saveSupport($request,$user_id){
            $objSupport = new Support();
            $objSupport->user_id = $user_id;            
            $objSupport->support_id = $request->input('support_message');
            $objSupport->Note = $request->input('note');
            $objSupport->created_at = date('Y-m-d H:i:s');
            return ($objSupport->save());
    }
    
    
   
    function supportplan($request) {
        return Support::where('id', $request)->delete();
    }
    
    
}
