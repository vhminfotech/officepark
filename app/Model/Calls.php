<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\ServiceDetail;

class Calls extends Model {

    protected $table = 'calls';

    public function addCalls($postData) {
//        print_r($postData);
//        exit;
        $date = date('YmdHis');
        $handle = fopen($date . "pcall.txt", "a");
        foreach ($postData as $variable => $value) {
            fwrite($handle, $variable);
            fwrite($handle, "=");
            fwrite($handle, $value);
            fwrite($handle, "\r\n");
        }
        fwrite($handle, "\r\n");
        
         fwrite($handle, $postData);
        fclose($handle);
        
        $objCalls = new Calls();
        $objCalls->event = $postData['event'];
        $objCalls->uuid = $postData['uuid'];
        $objCalls->kid = $postData['kid'];
        $objCalls->cdr_id = $postData['cdr_id'];
        $objCalls->routing_id = $postData['routing_id'];
        $objCalls->service = $postData['service'];
        $objCalls->ddi = $postData['ddi'];
        $objCalls->caller = $postData['caller'];
        $objCalls->destination_number = $postData['destination_number'];
        $objCalls->duration_in = $postData['duration_in'];
        $objCalls->duration_out = $postData['duration_out'];
        $objCalls->successfully = $postData['successfully'];
        $objCalls->date_time = date('Y-m-d H:i:s', strtotime($postData['date_time']));
        $objCalls->timestamp = date('Y-m-d H:i:s', strtotime($postData['timestamp']));
        $objCalls->created_at = date('Y-m-d H:i:s');
        $objCalls->updated_at = date('Y-m-d H:i:s');
        $objCalls->save();
        return $objCalls->id;
    }

    public function getCallListing() {
        $sql = Calls::leftjoin('users', 'users.inopla_username', '=', 'calls.id');
        $result = $sql->get(['calls.*',
            'users.name as agentName',
            'users.inopla_username'
        ]);
        return $result;
    }
    public function getCallListingV2($customerNo) {
        $sql = Calls::leftjoin('users', 'users.inopla_username', '=', 'calls.id');
        $sql->where('users.id',$customerNo);
        $sql->where('users.type','CUSTOMER');
        $result = $sql->get(['calls.*',
            'users.name as agentName',
            'users.inopla_username'
        ]);
        return $result;
    }

}

?>