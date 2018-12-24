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

    public function addStatus($postData) {
        // print_r($postData);exit;
        $objStatus = new Status();
        $objStatus->customer_id = (isset($postData['customer_id'])) ? $postData['customer_id'] : '';
        $objStatus->status_id = (isset($postData['status'])) ? $postData['status'] : '';
        $objStatus->message_id = (isset($postData['message'])) ? $postData['message'] : '';
        $objStatus->number = (isset($postData['number'])) ? $postData['number'] : '';
        $objStatus->information = (isset($postData['information'])) ? $postData['information'] : '';
        $objStatus->note = (isset($postData['note'])) ? $postData['note'] : '';
       
        $objStatus->created_at = date('Y-m-d H:i:s');
        $objStatus->updated_at = date('Y-m-d H:i:s');
        $objStatus->save();
        return $objStatus->id;
    }

}

?>