<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\call_chat;
use Config;
use Session;

class Call_chat extends Model {

    protected $table = 'call_chat';
    
    public function chatlist($id = null){
        $sql = Call_chat::leftjoin('users', 'users.id', '=', 'call_chat.customer_id');
        if(!empty($id)){
            $sql->where('call_chat.call_mail_id',$id);      
        }
        $result = $sql->get(['call_chat.*','users.type'])->toarray();
        return $result;
    }
    
    public function addchat($request,$userid,$id,$usertype){
         $objEditCall=Call_mail::find($id);
        if($usertype == 'admin'){
            $objEditCall->admin_response_status ='1';
            $objEditCall->customer_response_status ='0';
        }else{
            $objEditCall->customer_response_status ='1';
             $objEditCall->admin_response_status ='0';
            
        }
        $objEditCall->updated_at = date('Y-m-d H:i:s');;
            if($objEditCall->save()){
                $objchatadd = new Call_chat();
                $objchatadd->call_id =$request->input('call_id');            
                $objchatadd->call_mail_id =$request->input('mail_id');            
                $objchatadd->customer_id = $userid;
                $objchatadd->comment = $request->input('chatmsg');
                $objchatadd->created_at = date('Y-m-d H:i:s');
            return ($objchatadd->save());
        }
    }

}

?>