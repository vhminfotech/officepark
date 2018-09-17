<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class ServiceDetail extends Model {

    protected $table = 'service_detail';

    public function getServiceDetail($data){
          return ServiceDetail::select('*')->where('service_id',$data['packegeId'])
                 ->where('is_invoice','Yes')->get()->toArray();
    }

}

?>