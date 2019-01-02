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
    
    public function addchat($request,$userid,$id,$usertype){
        
        $objEditSupport =Support::find($id);
        if($usertype == 'admin'){
            $objEditSupport->admin_response_status ='1';
            $objEditSupport->customer_response_status ='0';
        }else{
            $objEditSupport->customer_response_status ='1';
             $objEditSupport->admin_response_status ='0';
            
        }
        $objEditSupport->updated_at = date('Y-m-d H:i:s');
        if($objEditSupport->save()){
            $objchatadd = new Support_chat();
            $objchatadd->support_id = $id;            
            $objchatadd->userid = $userid;
            $objchatadd->user_msg = $request->input('chatmsg');
            $objchatadd->created_at = date('Y-m-d H:i:s');
            return ($objchatadd->save());
        }
    }

}

?>