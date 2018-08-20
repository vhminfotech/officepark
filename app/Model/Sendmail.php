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
       $pathToFile = $mailData['attachment'];
        Mail::send($mailData['template'], ['data' => $mailData['data']], function ($m) use ($mailData,$pathToFile) {
            $m->from('smtp@prasadexpo.co.in', 'Office Park');

            $m->to($mailData['mailto'], "Office Park")->subject($mailData['subject']);
//            print_r($pathToFile);
            if(!empty($pathToFile)){
                for($i=0;$i<count($pathToFile);$i++){
                    $m->attach($pathToFile[$i]);
                }
                
            }
            
           //  $m->cc($mailData['bcc']);
        });
        
//       try {
//        $pathToFile = $mailData['attachment'];
//        Mail::send($mailData['template'], ['data' => $mailData['data']], function ($m) use ($mailData,$pathToFile) {
//            $m->from('kartikdesai123@gmail.com', 'Office Park');
//
//            $m->to($mailData['mailto'], "Office Park")->subject($mailData['subject']);
////            print_r($pathToFile);
//            if(!empty($pathToFile)){
//                for($i=0;$i<count($pathToFile);$i++){
//                    $m->attach($pathToFile[$i]);
//                }
//                
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
//       $pathToFile = $mailData['attachment'];
//      
//       $mailsend = Mail::send($mailData['template'], ['data' => $mailData['data']], function ($m) use ($mailData,$pathToFile) {
//            $m->from('kartikdesai123@gmail.com', 'Office Park');
//
//            $m->to($mailData['mailto'], "Office Park")->subject($mailData['subject']);
//            if($pathToFile != ""){
//                $m->attach($pathToFile);
//            }
//            
//           //  $m->cc($mailData['bcc']);
//        });
//        if($mailsend){
//            return true;
//        }else{
//            return false;
//        }
     
   }
    

}