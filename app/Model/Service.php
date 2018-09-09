<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class Service extends Model {

    protected $table = 'category';

    public function getCategory($id = NULL) {

        if ($id) {
            $result = Service::select('category.*')->where('category.id', '=', $id)->get();
        } else {
            $result = Service::get();
        }
        return $result;
    }

    public function addCategory($request) {
//        print_r($request->input());exit;
        $objadd = new Service();
        $objadd->categoryname = $request->input('category');

        $result = $objadd->save();

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>