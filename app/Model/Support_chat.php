<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\Support_chat;
use Config;
use Session;

class Support_chat extends Model {

    protected $table = 'support_chat';
    
    public function chatlist($id){
        
         $sql = Support_chat::join('users', 'users.id', '=', 'support_chat.userid');
                $sql->where('support_chat.support_id',$id);  
        $result = $sql->get(['support_chat.*','users.type'])->toarray();
       return $result;
    }
    
    public function addchat($request,$userid,$id){
            $objchatadd = new Support_chat();
            $objchatadd->support_id = $id;            
            $objchatadd->userid = $userid;
            $objchatadd->user_msg = $request->input('chatmsg');
            $objchatadd->created_at = date('Y-m-d H:i:s');
            return ($objchatadd->save());
    }

}

?>