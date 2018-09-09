<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class Category extends Model {

    protected $table = 'category';

    public function getCategory($id = NULL) {

        if ($id) {
            $result = Category::select('category.*')->where('category.id', '=', $id)->get();
        } else {
            $result = Category::get();
        }
        return $result;
    }

    public function addCategory($request) {
//        print_r($request->input());exit;
        $result = Category::where('category.categoryname', '=', $request->input('category'))->count();
        
        if($result == 0){
            $objadd = new Service();
            $objadd->categoryname = $request->input('category');
            $resultSave = $objadd->save();

            if ($resultSave) {
                return TRUE;
            } else {
                return FALSE;
            }
        }else{
            return FALSE;
        }
        
    }

}

?>