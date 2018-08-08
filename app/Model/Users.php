<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\UserHasPermission;

class Users extends Model {

    protected $table = 'users';
    
    public function getMasterPermisson(){
        $result =  DB::table('permission_master')->get();
        return $result;
    }

    public function gtUsrLlist($id = NULL) {
        if ($id) {
            $result = Users::select('users.*')
                    ->where('users.id', '=', $id)
                    ->get();
        } else {
            $result = Users::get();
        }

        return $result;
    }

    public function saveUserInfo($request) {

        $newpassword = ($request->input('password') != '') ? $request->input('password') : null;
        $newpass = Hash::make($newpassword);
        $objUser = new Users();
        $objUser->name = $request->input('first_name');
        $objUser->email = $request->input('email');
        $objUser->type = '0';
//        $objUser->role_type = $request->input('role_type');
        $objUser->password = $newpass;
        $objUser->created_at = date('Y-m-d H:i:s');
        $objUser->updated_at = date('Y-m-d H:i:s');
        $objUser->save();
        return TRUE;
    }

    public function updateUserInfo($request) {
        //print_r($request->input('user_id'));
        $userId = $request->input('user_id');
        $objUser = Users::find($userId);
        $objUser->name = $request->input('first_name');
        $objUser->type = '0';
        $objUser->updated_at = date('Y-m-d H:i:s');
        $objUser->save();
        return TRUE;
    }
    
    public function addUserInfo($request){
        
        
        $newpassword = ($request->input('password') != '') ? $request->input('password') : null;
        $newpass = Hash::make($newpassword);
        $objUser = new Users();
        $objUser->name = $request->input('firstName').' '.$request->input('lastName');
        $objUser->email = $request->input('email');
        $objUser->inopla_username = $request->input('inoplaName');
        $objUser->extension_number = $request->input('exNumber');
        $objUser->var_language = $request->input('langauge');
        $objUser->type = '2';
        $objUser->password = $newpass;
        $objUser->created_at = date('Y-m-d H:i:s');
        $objUser->updated_at = date('Y-m-d H:i:s');
        
        if($objUser->save()){
            $lastId = $objUser->id;
            $systemUser = new UserHasPermission();
            if(!empty($request->input('checkboxes'))){
                $permisson = $request->input('checkboxes');
                for($i=0; $i<count($permisson); $i++){
                    
                    $systemUser->permission_id = $permisson[$i];
                    $systemUser->user_id = $lastId;
                    $systemUser->updated_at = date('Y-m-d H:i:s');
                    $systemUser->created_at = date('Y-m-d H:i:s');
                    
                    $result = $systemUser->save();
                }
            }
            if($result){
                return TRUE;
            }else{
                return FALSE;
            }
        }
    }

}
