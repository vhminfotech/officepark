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
       try {
        $pathToFile = $mailData['attachment'];
        Mail::send($mailData['template'], ['data' => $mailData['data']], function ($m) use ($mailData,$pathToFile) {
            $m->from('kartikdesai123@gmail.com', 'Office Park');

            $m->to($mailData['mailto'], "Office Park")->subject($mailData['subject']);
            if($pathToFile != ""){
                $m->attach($pathToFile);
            }
            
           //  $m->cc($mailData['bcc']);
        });
      }

      //catch exception
      catch(\Exception $e) {
        return true;
      }
       
        
     
   }
    

}