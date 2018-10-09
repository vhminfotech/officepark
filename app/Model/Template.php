<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\ServiceDetail;

class Template extends Model {

    protected $table = 'template';

    public function addTemplate($postData) {
        $objCalls = new Template();
        $objCalls->message = $postData['message'];
        $objCalls->created_at = date('Y-m-d H:i:s');
        $objCalls->updated_at = date('Y-m-d H:i:s');
        $objCalls->save();
        return $objCalls->id;
    }

    public function getTemplate() {
        return Template::select('template.*')->get()->toArray();
    }

}

?>