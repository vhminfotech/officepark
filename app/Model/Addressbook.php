<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\UserHasPermission;

class Addressbook extends Model {

    protected $table = 'addressbook';
    
    public function getMasterPermisson(){
        $result =  DB::table('permission_master')->get();
        return $result;
    }

    public function getAddBookLlist($id = NULL) {

        if($id){
            $result = addressbook::select('addressbook.*')->where('addressbook.adddress_book_id', '=', $id)->get();
        }else{
            $result = addressbook::get();
        }
        return $result;
    }
    
    public function gtPermission($userId){
        $result = UserHasPermission::select('user_has_permission.*')->where('user_has_permission.user_id', '=', $userId)->get();
        return $result;
    }

    public function saveUserInfo($request) {

        $newpassword = ($request->input('password') != '') ? $request->input('password') : null;
        $newpass = Hash::make($newpassword);
        $objUser = new addressbook();
        $objUser->name = $request->input('first_name');
        $objUser->email = $request->input('email');
        $objUser->type = 'USER';
//        $objUser->role_type = $request->input('role_type');
        $objUser->password = $newpass;
        $objUser->created_at = date('Y-m-d H:i:s');
        $objUser->updated_at = date('Y-m-d H:i:s');
        $objUser->save();
        return TRUE;
    }

    
    
    public function addAddresBook($request){
        
        $objadd = new Addressbook();
        $objadd->firstname = $request->input('firstname');
        $objadd->surname = $request->input('surname');
        $objadd->company = $request->input('company');
        $objadd->position = $request->input('position');
        $objadd->telephone_number = $request->input('telephone_number');
        $objadd->email = $request->input('email');
        $result =$objadd->save();
           
                   
            
            if($result){
                return TRUE;
            }else{
                return FALSE;
            }
        
    }
    
    

}
