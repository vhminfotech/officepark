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
      
        $objCalls = new Calls();
        $objCalls->event = (isset($postData['event']))?$postData['event']:'';
        $objCalls->uuid = (isset($postData['uuid']))?$postData['uuid']:'';
        $objCalls->kid = (isset($postData['kid']))?$postData['kid']:'';
        $objCalls->cdr_id = (isset($postData['cdr_id']))?$postData['cdr_id']:'';
        $objCalls->routing_id = (isset($postData['routing_id']))?$postData['routing_id']:'';
        $objCalls->service = (isset($postData['service']))?$postData['service']:'';
        $objCalls->ddi = (isset($postData['ddi']))?$postData['ddi']:'';
        $objCalls->caller = (isset($postData['caller']))?$postData['caller']:'';
        $objCalls->destination_number = (isset($postData['destination_number']))?$postData['destination_number']:'';
        $objCalls->duration_in = (isset($postData['duration_in']))?$postData['duration_in']:'';
        $objCalls->duration_out = (isset($postData['duration_out']))?$postData['duration_out']:'';
        $objCalls->successfully = (isset($postData['successfully']))?$postData['successfully']:'';
        $objCalls->date_time = (isset($postData['date_time']))?date('Y-m-d H:i:s', strtotime($postData['date_time'])):'';
        $objCalls->timestamp = (isset($postData['timestamp']))?date('Y-m-d H:i:s', strtotime($postData['timestamp'])):'';
        $objCalls->created_at = date('Y-m-d H:i:s');
        $objCalls->updated_at = date('Y-m-d H:i:s');
        $objCalls->save();
        return $objCalls->id;
        
    }

    public function getCallListing() {
//$sql = Calls::leftjoin('users', function($join) {
//                            $join->on('users.inopla_username', '=', 'calls.destination_number');
//                            $join->on('users.system_genrate_no', '=', 'calls.service');
//                        });        
        $sql = Calls::leftjoin('users as u1', 'u1.inopla_username', '=', 'calls.destination_number')
               ->leftjoin('users as u2', 'u2.system_genrate_no', '=', 'calls.service');
        $result = $sql->get(['calls.*',
            'u1.name as agentName',
            'u2.name as customerName',
            'u1.inopla_username'
        ]);
        return $result;
    }
    public function getCallListingV2($customerNo) {
        $sql = Calls::leftjoin('users', 'users.inopla_username', '=', 'calls.destination_number');
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