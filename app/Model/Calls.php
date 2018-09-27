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

}

?>