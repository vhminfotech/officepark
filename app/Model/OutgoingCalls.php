<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\ServiceDetail;
use Config;
use Session;

class OutgoingCalls extends Model {

    protected $table = 'outgoing_call';

    public function addOutgoingCalls($postData) {
        // print_r($postData);exit;
        $objCalls = new OutgoingCalls();
        $objCalls->customer_id = (isset($postData['customer_id'])) ? $postData['customer_id'] : '';
        $objCalls->company_name = (isset($postData['company'])) ? $postData['company'] : '';
        $objCalls->first_name = (isset($postData['firstname'])) ? $postData['firstname'] : '';
        $objCalls->last_name = (isset($postData['lastname'])) ? $postData['lastname'] : '';
        $objCalls->gender = (isset($postData['gender'])) ? $postData['gender'] : '';
        $objCalls->email = (isset($postData['email'])) ? $postData['email'] : '';
        $objCalls->telephone1 = (isset($postData['telephone1'])) ? $postData['telephone1'] : '';
        $objCalls->telephone2 = (isset($postData['telephone2'])) ? $postData['telephone2'] : '';
        $objCalls->make_call = (isset($postData['calltime'])) ? $postData['calltime'] : '';
        $objCalls->date = (isset($postData['date'])) ? date('Y-m-d',strtotime($postData['date'])) : '';
        $objCalls->time = (isset($postData['starttime'])) ? $postData['starttime'] : '';
        $objCalls->information = (isset($postData['information'])) ? $postData['information'] : '';
        $objCalls->note = (isset($postData['note'])) ? $postData['note'] : '';
        $objCalls->hereby_ask_officepark = (isset($postData['hereby'])) ? $postData['hereby'] : '';
        $objCalls->created_at = date('Y-m-d H:i:s');
        $objCalls->save();
        return $objCalls->id;
    }

    public function editOutgoingCalls($postData) {
            // print_r($postData);exit;
            $objCalls = OutgoingCalls::find($postData['call_id']);
            $objCalls->customer_id = (isset($postData['customer_id'])) ? $postData['customer_id'] : '';
            $objCalls->company_name = (isset($postData['company'])) ? $postData['company'] : '';
            $objCalls->first_name = (isset($postData['firstname'])) ? $postData['firstname'] : '';
            $objCalls->last_name = (isset($postData['lastname'])) ? $postData['lastname'] : '';
            $objCalls->gender = (isset($postData['gender'])) ? $postData['gender'] : '';
            $objCalls->email = (isset($postData['email'])) ? $postData['email'] : '';
            $objCalls->telephone1 = (isset($postData['telephone1'])) ? $postData['telephone1'] : '';
            $objCalls->telephone2 = (isset($postData['telephone2'])) ? $postData['telephone2'] : '';
            $objCalls->make_call = (isset($postData['calltime'])) ? $postData['calltime'] : '';
            $objCalls->date = (isset($postData['date'])) ? date('Y-m-d',strtotime($postData['date'])) : '';
            $objCalls->time = (isset($postData['starttime'])) ? $postData['starttime'] : '';
            $objCalls->information = (isset($postData['information'])) ? $postData['information'] : '';
            $objCalls->note = (isset($postData['note'])) ? $postData['note'] : '';
            $objCalls->hereby_ask_officepark = (isset($postData['hereby'])) ? $postData['hereby'] : '';
            $objCalls->created_at = date('Y-m-d H:i:s');
            $objCalls->save();
            return $objCalls->id;
        }
      public function getOutgoingList($customerNo) {
        $sql = OutgoingCalls::leftjoin('users', 'users.id', '=', 'outgoing_call.customer_id');
        $sql->where('users.id', $customerNo);
        $sql->where('users.type', 'CUSTOMER');
        $result = $sql->get(['outgoing_call.*',
            'users.name as agentName'
        ]);
        return $result;
    }

 public function outgoingDelete($postData) {
       
        $result = OutgoingCalls::find($postData['id'])->delete();
        if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'Outgoing delete successfully.';
                $return['jscode'] = "setTimeout(function(){
                        $('#deleteModel').modal('hide');
                        location.reload();
                    },1000)";
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
        echo json_encode($return);
        exit;
    }
    
}

?>