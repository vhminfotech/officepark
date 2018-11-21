<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\ServiceDetail;

class Template extends Model {

    protected $table = 'template';

    public function addTemplate($postData,$userId) {
        $objCalls = new Template();
        $objCalls->message = $postData['message'];
        $objCalls->user_id = $userId;
        $objCalls->created_at = date('Y-m-d H:i:s');
        $objCalls->updated_at = date('Y-m-d H:i:s');
        $objCalls->save();
        return $objCalls->id;
    }

    public function getTemplate($userId) {
        $result =  Template::select('template.*')
                ->where('user_id',$userId)->get()->toArray();
        return $result;
    }

}

?>