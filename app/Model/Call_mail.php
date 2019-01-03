<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use Config;

class Call_mail extends Model {

    protected $table = 'call_mail';
    
    public function calllist($id){
        $result= Call_mail::where('call_mail.customer_id',$id)
               ->get(['call_mail.*'])->toarray();
        return $result;
    }   
    public function calllistV2(){
        $result= Call_mail::get(['call_mail.*'])->toarray();
        return $result;
    } 
    public function callDetail($id){
        $result= Call_mail::where('call_mail.id',$id)
               ->get(['call_mail.*'])->toarray();
        return $result;
    }

    
    public function addcallmail($request,$customer_id = null){

            $responsibility = Config::get('constants.responsibility');
            $objCallMail = new Call_mail();
            $objCallMail->customer_id = $customer_id;            
            $objCallMail->call_id = $request->input('callsId');
            $objCallMail->information = $request->input('information');
            $objCallMail->customer_number = $request->input('telephone_number');
            $objCallMail->notes = $request->input('caller_note');
            $objCallMail->created_at = date('Y-m-d H:i:s');
            $sendemail = (!empty($request->input('agentEmail'))) ? $request->input('agentEmail') : $request->input('email');
            $mailData['subject'] = 'Calls - Sent Email';
            $mailData['attachment'] = array();
            // $mailData['mailto'] = 'shaileshvanaliya91@gmail.com';
            $mailData['mailto'] = $sendemail;
            $sendMail = new Sendmail;
            $mailData['data']['caller_note'] = $request->input('caller_note');
            $mailData['data']['information'] = $responsibility[$request->input('information')];
            $mailData['data']['caller_email'] = $request->input('agentEmail');
            $mailData['data']['telephone_number'] = $request->input('telephone_number');
            $mailData['template'] = 'emails.call-email';
            $res = $sendMail->sendSMTPMail($mailData);
            return ($objCallMail->save());
    }
    
    public function closechat($request){
            $objEditSupport =Call_mail::find($request->input('id'));
           $objEditSupport->close_chat ='1';
           $objEditSupport->customer_response_status ='1';
           $objEditSupport->admin_response_status ='1';
           $objEditSupport->updated_at = date('Y-m-d H:i:s');
           return $objEditSupport->save();
    }
    
    public function countsupport($usertype,$id=null){
        if($usertype == 'admin'){
            $sql = Call_mail::where('admin_response_status','0')->count();
            return $sql;
        }else{
           
            $sql = Call_mail::where('customer_response_status','0')
                      ->where('customer_id',$id)->count();
            return $sql; 
        }
         
    }
}
