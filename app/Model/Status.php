<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\ServiceDetail;
use Config;
use Session;

class Status extends Model {

    protected $table = 'status';

    public function statuslist($id = null,$limit = null){
        $sql = Status::join('users', 'users.id', '=', 'status.customer_id');
        if(!empty($id)){
            $sql->where('status.customer_id',$id);  
        }
        if(!empty($limit)){
            $sql->limit($limit);  
        }
        $result = $sql->get(['status.*','users.name','users.customer_number','users.type'])->toarray();
        return $result;
    }

    public function addStatus($postData) {
//         print_r($postData);exit;
        $objStatus = new Status();
        $objStatus->customer_id = (isset($postData['customer_id'])) ? $postData['customer_id'] : '';
        $objStatus->welcome_note = (isset($postData['welcome_note'])) ? $postData['welcome_note'] : '';
        $objStatus->status = (isset($postData['status'])) ? $postData['status'] : '';
        $objStatus->call_transfer = (isset($postData['call_transfer'])) ? $postData['call_transfer'] : '';
        $objStatus->information = (isset($postData['information'])) ? $postData['information'] : '';
        $objStatus->created_at = date('Y-m-d H:i:s');
        $objStatus->updated_at = date('Y-m-d H:i:s');
        $objStatus->save();
        return $objStatus->id;
    }

}

?>