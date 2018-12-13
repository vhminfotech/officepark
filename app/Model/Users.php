<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\UserHasPermission;
use App\Model\Sendmail;
use App\Model\OrderInfo;
use App\Model\Category;
use App\Model\Service;
use App\Model\Users;
use PDF;
use Config;

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
            $result = Users::whereIn('type', ['AGENT'])->get();
        }
       
        return $result;
    }
    
    public function gtCustomerlist(){
        $result = Users::select('*')->where('type','CUSTOMER')->get();
        return $result;
    }

    public function gtPermission($userId) {
        $result = UserHasPermission::select('user_has_permission.*')->where('user_has_permission.user_id', '=', $userId)->get();
        return $result;
    }

    public function getPermissionV2($userId) {
        $result = UserHasPermission::join('permission_master', 'permission_master.id', '=', 'user_has_permission.permission_id')
                ->select('permission_master.name', 'user_has_permission.id')
                ->where('user_has_permission.user_id', '=', $userId)
                ->pluck('permission_master.name', 'user_has_permission.id')
                ->toArray();
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

    public function getCustomerList($type) {
        return Users::select(
                                'users.id as customer_id', 'users.customer_number  as customer_number', 'order_info.company_name', 'order_info.fullname', 'users.email', 'order_info.phone', 'order_info.is_package'
                        )
                        ->leftjoin('order_info', 'users.id', '=', 'order_info.user_id')
                        ->where('users.type', '=', $type)->get();
    }

    public function addUserInfo($request) {

        $checkUserExist = Users::select('users.*')->where('users.email', '=', $request->input('email'))->get()->toArray();

        if (!empty($checkUserExist)) {
            return FALSE;
        }
        $newpassword = ($request->input('password') != '') ? $request->input('password') : null;
        $newpass = Hash::make($newpassword);
        $objUser = new Users();
        $objUser->name = $request->input('firstName') . ' ' . $request->input('lastName');
        $objUser->email = $request->input('email');
        $objUser->inopla_username = $request->input('inoplaName');
        $objUser->extension_number = $request->input('exNumber');
        $objUser->var_language = $request->input('langauge');
        $objUser->type = 'AGENT';
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
                $permisson = $request->input('checkboxes');
                if ($delete || count($permisson) > 0) {
                    for ($i = 0; $i < count($permisson); $i++) {
                        $systemUser = new UserHasPermission();
                        $systemUser->permission_id = $permisson[$i];
                        $systemUser->user_id = $userId;
                        $systemUser->updated_at = date('Y-m-d H:i:s');
                        $systemUser->created_at = date('Y-m-d H:i:s');
                        $result = $systemUser->save();
                        $systemUser = '';
                    }
                    if ($result) {
                        return TRUE;
                    } else {
                        return FALSE;
                    }
                }
            } else {
                return TRUE;
            }
        }
    }

    function userDelete($request) {

        UserHasPermission::where('user_id', $request->input('id'))->delete();
        return Users::where('id', $request->input('id'))->delete();
    }

    public function createCustomer($postData) {
        $count = Users::where('email', $postData['email'])->count();
        if ($count == 0) {
            $newpassword = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzASLKJHGDMNBVCXZPOIUYTREWQ", 6)), 0, 6);;
            $result = DB::table('customer_no')->where('id', 1)->get();
            $systemGenrateNo = DB::table('system_genrate_no')->where('id', 1)->orderBy('id', 'desc')->take(1)->get();

            $newpass = Hash::make($newpassword);
            $objUser = new Users();
            $objUser->name = $postData['fullname'];
            $objUser->inopla_username = $postData['fullname'];
            $objUser->email = $postData['email'];
            $objUser->extension_number = $postData['phone'];
            $objUser->var_language = 'English';
            $objUser->type = 'CUSTOMER';
            $objUser->password = $newpass;
            $objUser->customer_number = 'OP-211-' . $result[0]->last_number;
            $objUser->system_genrate_no = $systemGenrateNo[0]->generated_no;
            $objUser->created_at = date('Y-m-d H:i:s');
            $objUser->updated_at = date('Y-m-d H:i:s');
            $userId = $objUser->save();
//            $userId = 61;
            $explodeArr = explode('-', $systemGenrateNo[0]->generated_no);
            $systemNo = $explodeArr[0] . '-' . $explodeArr[1] . '-' . ($explodeArr[2] + 1);
            DB::table('system_genrate_no')
                    ->where('id', 1)
                    ->update(['generated_no' => $systemNo]);
//                    ->update(['generated_no' => $systemGenrateNo[0]->generated_no + 1]);

            DB::table('customer_no')
                    ->where('id', 1)
                    ->update(['last_number' => $result[0]->last_number + 1]);

            $objOrderInfo = OrderInfo::find($postData->id);
            $objOrderInfo->user_id = $objUser->id;
            $objOrderInfo->save();

            $objOrder = new OrderInfo();
            $data['arrOrder'] = $objOrder->getPdfData($postData->id);

            $objCategory = new Category();
            $objService = new Service();
            $serviceId = $data['arrOrder'][0]['is_package'];
            $data['allCategory'] = $objCategory->getCategory();
            $data['getService'] = $objService->getServices($serviceId);

            $webname = $data['getService']['service'][0]['website_id'];

            $websites = Config::get('constants.websites');
            $websitespdf = Config::get('constants.websitespdf');
            $data['websites'] = $websites[$webname];

            chmod(public_path('pdf/Officepark_- Welcome letter_ATA_Finanz.pdf'), 0777);
            $data['id'] = $postData['fullname'];
            $data['password'] = $newpassword;
            $pdf = PDF::loadView('admin.order.order-pdf-1', $data);
            $pdf->save(public_path('pdf/OfficePark-Rufumleitung-OP-211-' . $result[0]->last_number . '.pdf'));
            $pdf = PDF::loadView('admin.order.order-pdf-2', $data);

            $pdf->save(public_path('pdf/OfficePark-Begrüßungsschreiben-OP-211-' . $result[0]->last_number . '.pdf'));

//            $pdf = PDF::loadView('admin.order.order-pdf-3', $data);
//            $pdf->save(public_path('pdf/OfficePark-Allgemeine-Geschaftsbedingungen.pdf'));

            $mailData['subject'] = 'Order Confirm';
            $mailData['template'] = 'emails.confirm-order';
            $mailData['attachment'] = array(
                public_path('pdf/OfficePark-Begrüßungsschreiben-OP-211-' . $result[0]->last_number . '.pdf'),
                public_path('pdf/OfficePark-Rufumleitung-OP-211-' . $result[0]->last_number . '.pdf'),
                public_path('pdf/website/'.$websitespdf[$webname])
            );

//            $mailData['mailto'] = 'shaileshvanaliya91@gmail.com';
            $mailData['mailto'] = $postData['email'];
            $sendMail = new Sendmail;
            $mailData['data']['interUser'] = $postData['fullname'];
            $sendMail->sendSMTPMail($mailData);

            $data_array = array(
                'system_no' => $systemGenrateNo[0]->generated_no,
                'cus_no' => 'OP-211-' . $result[0]->last_number,
            );
            return $data_array;
        } else {
            return false;
        }
    }

    public function saveEditUserInfo($request) {
        
        $name = '';
        if($request->file()){
            $image = $request->file('profile_pic');
            $name = 'admin'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/employee/');
            $image->move($destinationPath, $name);    
        }
        
        $userId = $request->input('id');
        $objUser = Users::find($userId);
        $objUser->name = $request->input('name');
        $objUser->user_image = $name;
        $objUser->inopla_username = $request->input('inopla_username');
        $objUser->email = $request->input('email');
        $objUser->extension_number = $request->input('extension_number');
        //$objUser->type = $request->input('type');
        $objUser->extension_number = $request->input('extension_number');

        if ($objUser->save()) {
            return TRUE;
        } else {

            return FALSE;
        }
    }

    public function saveEditUserPassword($id, $password) {
        return Users::where('id', '=', $id)->update(['password' => Hash::make($password)]);
    }

    public function getUserByEmail($email) {
        return Users::select('users.*')->where('users.email', '=', $email)->get()->toArray();
    }

    public function updateCustomerInfo($request) {
        $userId = $request->input('custId');
//        print_r($request->input());exit;
        $result = Users::where('id', '!=', $userId)->where('email', $request->input('email'))->get()->count();
        $return = '';

          $name = '';
        if($request->file()){
            $image = $request->file('profile_pic');
            $name = 'customer'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/employee/');
            $image->move($destinationPath, $name);    
        }        
        if ($result == 0) {
            $objEditUser = Users::find($userId);
            $objEditUser->name = $request->input('first_name');
            $objEditUser->user_image = $name;
            $objEditUser->save();
            OrderInfo::where('user_id', $userId)
                    ->update([
                        'company_name' => $request->input('company_name'),
                        'fullname' => $request->input('first_name'),
                        'phone' => $request->input('telephone'),
                        'is_package' => $request->input('pacet')
            ]);

            $return = TRUE;
        } else {
            $return = false;
        }
        return $return;
    }

    public function getCustomerInfo($id) {
        return Users::select('users.id as customer_id', 'users.customer_number  as customer_number', 'order_info.company_name', 'order_info.fullname', 'users.email', 'order_info.phone', 'order_info.is_package')
                        ->leftjoin('order_info', 'users.id', '=', 'order_info.user_id')
                        ->where('users.id', '=', $id)->first()->toArray();
    }

    public function getCustomer($cutomerNum = NULL) {
        if ($cutomerNum) {
            return Users::select('users.id as customer_id', 'order_info.company_name', 'order_info.address','users.customer_number','users.name','order_info.is_package')
                            ->leftjoin('order_info', 'users.id', '=', 'order_info.user_id')
                            ->where('users.customer_number', '=', $cutomerNum)->first()->toArray();
        } else {
            return Users::where('type', 'CUSTOMER')->get();
        }
    }

    public function getAgent() {
        return Users::where('type', 'AGENT')->get();
    }


    public function passwordReset($email) {
        $result =  Users::select('users.*')->where('users.email', '=', $email)->get()->toArray();
        if($result){
           $newpassword = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzASLKJHGDMNBVCXZPOIUYTREWQ", 6)), 0, 6);;
        
        $objUser = Users::find($result[0]['id']);
        $objUser->password = Hash::make($newpassword);
        $objUser->created_at = date('Y-m-d H:i:s');
        $objUser->save();

        $mailData['subject'] = 'Forgot password';
        $mailData['attachment'] = array();
        // $mailData['mailto'] = 'shaileshvanaliya91@gmail.com';
        $mailData['mailto'] =  $result[0]['email'];
        $sendMail = new Sendmail;
        $mailData['data']['caller_email'] = $result[0]['email'];
        $mailData['data']['name'] = $result[0]['name'];
        $mailData['data']['password'] = $newpassword;
        $mailData['template'] = 'emails.forgot-email';
        $res = $sendMail->sendSMTPMail($mailData);
        return true;
        }
        return false;
    }
}
