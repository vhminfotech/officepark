<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Auth;
use Config;
use Illuminate\Support\Facades\DB;
use Mail;

class Sendmail extends Model {

 
   public function sendSMTPMail($mailData)
   {
//       try {
//        $pathToFile = $mailData['attachment'];
//        Mail::send($mailData['template'], ['data' => $mailData['data']], function ($m) use ($mailData,$pathToFile) {
//            $m->from('kartikdesai123@gmail.com', 'Office Park');
//
//            $m->to($mailData['mailto'], "Office Park")->subject($mailData['subject']);
//            if($pathToFile != ""){
//                $m->attach($pathToFile);
//            }
//            
//           //  $m->cc($mailData['bcc']);
//        });
//      }
//
//      //catch exception
//      catch(\Exception $e) {
//        return true;
//      }
      // $pathToFile = $mailData['attachment'];
       // the message
        $msg = "First line of text\nSecond line of text";

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);

        // send email
        mail("kartikdesai123@gmail.com","My subject",$msg);
       $mailsend = Mail::send($mailData['template'], ['data' => $mailData['data']], function ($m) use ($mailData) {
            $m->from('kartikdesai123@gmail.com', 'Office Park');

            $m->to($mailData['mailto'], "Office Park")->subject($mailData['subject']);
//            if($pathToFile != ""){
//                $m->attach($pathToFile);
//            }
            
           //  $m->cc($mailData['bcc']);
        });
        if($mailsend){
            return true;
        }else{
            return false;
        }
     
   }
    

}