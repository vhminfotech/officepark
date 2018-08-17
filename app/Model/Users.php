<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\UserHasPermission;
use App\Model\Sendmail;
use PDF;

class Users extends Model {

    protected $table = 'users';

    public function getMasterPermisson() {
        $result = DB::table('permission_master')->get();
        return $result;
    }

    public function gtUsrLlist($id = NULL) {

        if ($id) {
            $result = Users::select('users.*')->where('users.id', '=', $id)->get();
        } else {
            $result = Users::get();
        }
        return $result;
    }

    public function gtPermission($userId) {
        $result = UserHasPermission::select('user_has_permission.*')->where('user_has_permission.user_id', '=', $userId)->get();
        return $result;
    }

    public function saveUserInfo($request) {

        $newpassword = ($request->input('password') != '') ? $request->input('password') : null;
        $newpass = Hash::make($newpassword);
        $objUser = new Users();
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

    public function updateUserInfo($request) {
        //print_r($request->input('user_id'));
        $userId = $request->input('user_id');
        $objUser = Users::find($userId);
        $objUser->name = $request->input('first_name');
//        $objUser->type = '0';
        $objUser->updated_at = date('Y-m-d H:i:s');
        $objUser->save();
        return TRUE;
    }

    public function addUserInfo($request) {

        $newpassword = ($request->input('password') != '') ? $request->input('password') : null;
        $newpass = Hash::make($newpassword);
        $objUser = new Users();
        $objUser->name = $request->input('firstName') . ' ' . $request->input('lastName');
        $objUser->email = $request->input('email');
        $objUser->inopla_username = $request->input('inoplaName');
        $objUser->extension_number = $request->input('exNumber');
        $objUser->var_language = $request->input('langauge');
        $objUser->type = '2';
        $objUser->password = $newpass;
        $objUser->created_at = date('Y-m-d H:i:s');
        $objUser->updated_at = date('Y-m-d H:i:s');

        if ($objUser->save()) {
            $lastId = $objUser->id;
            if (!empty($request->input('checkboxes'))) {
                $permisson = $request->input('checkboxes');
                for ($i = 0; $i < count($permisson); $i++) {
                    $systemUser = new UserHasPermission();
                    $systemUser->permission_id = $permisson[$i];
                    $systemUser->user_id = $lastId;
                    $systemUser->updated_at = date('Y-m-d H:i:s');
                    $systemUser->created_at = date('Y-m-d H:i:s');
                    $result = $systemUser->save();
                }
            }
            if ($result) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    function editUserInfo($request) {
        $userId = $request->input('user_id');
        $objUser = Users::find($userId);
        $objUser->name = $request->input('firstName') . ' ' . $request->input('lastName');
        $objUser->inopla_username = $request->input('inoplaName');
        $objUser->extension_number = $request->input('exNumber');
        $objUser->var_language = $request->input('langauge');
        $objUser->updated_at = date('Y-m-d H:i:s');

        if ($objUser->save()) {
            if (!empty($request->input('checkboxes'))) {
                $delete = UserHasPermission::where('user_id', $userId)->delete();

                if ($delete) {
                    $permisson = $request->input('checkboxes');
                    for ($i = 0; $i < count($permisson); $i++) {
                        $systemUser = new UserHasPermission();
                        $systemUser->permission_id = $permisson[$i];
                        $systemUser->user_id = $userId;
                        $systemUser->updated_at = date('Y-m-d H:i:s');
                        $systemUser->created_at = date('Y-m-d H:i:s');
                        $result = $systemUser->save();
                    }
                }
            }
            if ($result) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    function userDelete($request) {
        $delete = UserHasPermission::where('user_id', $request->input('id'))->delete();
        if ($delete) {
            return Users::where('id', $request->input('id'))->delete();
        }
    }

    public function createCustomer($postData) {
        $count = Users::where('email', $postData['email'])->count();
        if ($count == 0) {
            $newpassword = 123;
            $newpass = Hash::make($newpassword);
            $objUser = new Users();
            $objUser->name = $postData['fullname'];
            $objUser->inopla_username = $postData['fullname'];
            $objUser->email = $postData['email'];
            $objUser->extension_number = $postData['phone'];
            $objUser->var_language = 'English';
            $objUser->type = 'CUSTOMER';
            $objUser->password = $newpass;
            $objUser->created_at = date('Y-m-d H:i:s');
            $objUser->updated_at = date('Y-m-d H:i:s');
            $objUser->save();
            
            
            $data['id'] = $postData['fullname'];
            $pdf = PDF::loadView('admin.invoice-pdf', $data);
            $pdf->save(public_path('pdf/some-filename.pdf'));
        
            $mailData['subject'] = 'Interest in wanted listing';
            $mailData['template'] = 'emails.confirm-order';
            $mailData['attachment'] = public_path('pdf/some-filename.pdf');
         
            $mailData['mailto'] = $postData['email'];

            $sendMail = new Sendmail;
            
            
            $mailData['data']['interUser'] = 'fff';
            
            $sendMail->sendSMTPMail($mailData);
            
            return TRUE;
            
        } else {
            
            return false;
        }
    }

}
