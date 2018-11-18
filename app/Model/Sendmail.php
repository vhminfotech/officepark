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
//       print_r($mailData);
//       $pathToFile = $mailData['attachment'];
//        $dd = Mail::send($mailData['template'], ['data' => $mailData['data']], function ($m) use ($mailData,$pathToFile) {
//            $m->from('kartikdesai123@gmail.com', 'Office Park');
//
//            $m->to('kartikdesai123@gmail.com', "Office Park")->subject($mailData['subject']);
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
//        
//        print_r($dd);
//        exit;
       try {
        $pathToFile = $mailData['attachment'];
        Mail::send($mailData['template'], ['data' => $mailData['data']], function ($m) use ($mailData,$pathToFile) {
            $m->from('kartikdesai123@gmail.com', 'Office Park');

//            $m->to('abhishekdesai39@gmail.com', "Office Park")->subject($mailData['subject']);
            $m->to($mailData['mailto'], "Office Park")->subject($mailData['subject']);
            $m->bcc('info@officepark.group');
//            print_r($pathToFile);
            if(!empty($pathToFile)){
                for($i=0;$i<count($pathToFile);$i++){
                    $m->attach($pathToFile[$i]);
                }
                
            }
            
           //  $m->cc($mailData['bcc']);
        });
        
        return true;
      }

      //catch exception
      catch(\Exception $e) {
        return true;
      }
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