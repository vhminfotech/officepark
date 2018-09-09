<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class Service extends Model {

    protected $table = 'service';

    public function getCategory($id = NULL) {

        if ($id) {
            $result = Service::select('category.*')->where('category.id', '=', $id)->get();
        } else {
            $result = Service::get();
        }
        return $result;
    }

    public function saveService($request) {
            $objadd = new Service();
            $objadd->packages_name = $request->input('category');
            $objadd->category_id = $request->input('category');
            $objadd->website_id = $request->input('category');
            $resultSave = $objadd->save();
        
    }

}

?>