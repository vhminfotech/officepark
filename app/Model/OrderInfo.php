<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class OrderInfo extends Model {

    protected $table = 'order_info';

    public function saveOrderInfo($dataArr) {

        $objInfo = new OrderInfo();

        $objInfo->is_package = $dataArr['is_package'];
        $objInfo->phone_to_reroute = $dataArr['phone_to_reroute'];
        $objInfo->welcome_note = $dataArr['welcome_note'];
        $objInfo->reroute_confirm = $dataArr['reroute_confirm'];
        $objInfo->center_to_customer_route = $dataArr['center_to_customer_route'];
        $objInfo->unreach_note = $dataArr['unreach_note'];
        $objInfo->info_type = $dataArr['info_type'];

        $objInfo->company_name = $dataArr['company_name'];
        $objInfo->company_type = $dataArr['company_type'];
        $objInfo->company_info = $dataArr['company_info'];
        $objInfo->gender = $dataArr['gender'];
        $objInfo->fullname = $dataArr['fullname'];
        $objInfo->date_of_birth = date('Y-m-d', strtotime($dataArr['date_of_birth']));
        //$objInfo->date_of_birth = '1992-12-27';
        $objInfo->address = $dataArr['address'];
        $objInfo->postal_code = $dataArr['postal_code'];
        $objInfo->phone = $dataArr['phone'];
        $objInfo->email = $dataArr['email'];

        $objInfo->account_name = ($dataArr['accept'] != 'uber') ? $dataArr['account_name'] : '';
        $objInfo->account_iban = ($dataArr['accept'] != 'uber') ? $dataArr['account_iban'] : '';
        $objInfo->account_bic = ($dataArr['accept'] != 'uber') ? $dataArr['account_bic'] : '';
        $objInfo->accept = $dataArr['accept'];
        $objInfo->status = 'new';
        $objInfo->aggrement = $dataArr['aggrement'];

        if ($objInfo->save()) {
            return TRUE;
        }
    }

    public function editOrderInfo($orderId, $dataArr) {

        $objInfo = OrderInfo::find($orderId);

        $objInfo->is_package = $dataArr['is_package'];
        $objInfo->phone_to_reroute = $dataArr['phone_to_reroute'];
        $objInfo->welcome_note = $dataArr['welcome_note'];
        $objInfo->reroute_confirm = $dataArr['reroute_confirm'];
        $objInfo->center_to_customer_route = $dataArr['center_to_customer_route'];
        $objInfo->unreach_note = $dataArr['unreach_note'];
        $objInfo->info_type = $dataArr['info_type'];

        $objInfo->company_name = $dataArr['company_name'];
        $objInfo->company_type = $dataArr['company_type'];
        $objInfo->company_info = $dataArr['order_info'];
        $objInfo->gender = $dataArr['gender'];
        $objInfo->fullname = $dataArr['fullname'];
        $objInfo->date_of_birth = date('Y-m-d', strtotime($dataArr['date_of_birth']));
        $objInfo->address = $dataArr['address'];
        $objInfo->postal_code = $dataArr['postal_code'];
        $objInfo->phone = $dataArr['phone'];
        $objInfo->email = $dataArr['email'];

        $objInfo->account_name = $dataArr['account_name'];
        $objInfo->account_iban = $dataArr['account_iban'];
        $objInfo->account_bic = $dataArr['account_bic'];
        $objInfo->accept = $dataArr['accept'];

        if ($objInfo->save()) {
            return TRUE;
        }
    }

    public function deleteInfo($orderId) {
        return DB::table('order_info')->Where('id', $orderId)->delete();
    }

    public function newRecordCount() {
        return OrderInfo::where('status', 'new')->get()->count();
    }

    public function getInfo() {
        return DB::table('order_info')->get()->toArray();
    }

    public function getInfoV2($customerId) {
        return OrderInfo::leftjoin('users', 'users.id', '=', 'order_info.user_id')
                        ->where('order_info.user_id', $customerId)
                        ->where('users.type', 'CUSTOMER')
                        ->get(['order_info.*', 'users.name as username', 'users.email as userEmail'
                                , 'users.inopla_username', 'users.extension_number', 'users.system_genrate_no', 'users.customer_number'])->toArray();
    }

    public function getOrderInfo($orderId) {
//        return DB::table('order_info')->Where('id', $orderId)->get()->toArray();
        return DB::table('order_info')
                        ->leftjoin('users', 'users.id', '=', 'order_info.user_id')
                        ->leftjoin('service', 'service.id', '=', 'order_info.is_package')
                        ->select('order_info.*', 'users.name as username', 'users.email as userEmail'
                                , 'users.inopla_username', 'users.extension_number', 'service.packages_name', 'users.customer_number')
                        ->Where('order_info.id', $orderId)->get()->toArray();
    }

    public function editCompanyInfo($request) {
//        echo 'hii';exit;
//        print_r($request->input('orderId'));exit;
//        exit;
        $objInfoEdit = OrderInfo::find($request->input('orderId'));
        $objInfoEdit->company_name = $request->input('company_name');
        $objInfoEdit->company_type = $request->input('company_type');
        $objInfoEdit->company_info = $request->input('company_info');
        if ($objInfoEdit->save()) {
            return TRUE;
        }
    }

    public function paymentEditInfo($request) {
        $objPaymntEdit = OrderInfo::find($request->input('orderId'));
        $objPaymntEdit->account_name = ($request->input('accept') != 'uber') ? $request->input('account_name') : '';
        $objPaymntEdit->account_iban = ($request->input('accept') != 'uber') ? $request->input('account_iban') : '';
        $objPaymntEdit->account_bic = ($request->input('accept') != 'uber') ? $request->input('account_bic') : '';
        $objPaymntEdit->accept = $request->input('sepa');
        if ($objPaymntEdit->save()) {
            return TRUE;
        }
    }

    public function secretaryEditInfo($request) {

        $objSecEdit = OrderInfo::find($request->input('orderId'));
        $objSecEdit->phone_to_reroute = $request->input('phone_to_reroute');
        $objSecEdit->welcome_note = $request->input('welcome_note');
        $objSecEdit->unreach_note = $request->input('unreach_note');
        $objSecEdit->reroute_confirm = $request->input('reroute_confirm');
        $objSecEdit->info_type = $request->input('info_type');
        $objSecEdit->center_to_customer_route = $request->input('center_to_customer_route');
//        $objSecEdit->info_type = $request->input('info_type');
        if ($objSecEdit->save()) {
            return TRUE;
        }
    }

    public function customerEditInfo($request) {
        $objCusEdit = OrderInfo::find($request->input('orderId'));
        $objCusEdit->gender = $request->input('gender');
        $objCusEdit->fullname = $request->input('customer_name');
        $objCusEdit->date_of_birth = date('Y-m-d', strtotime($request->input('date_of_birth')));
        $objCusEdit->address = $request->input('address');
        $objCusEdit->postal_code = $request->input('postal_code');
        $objCusEdit->phone = $request->input('phone');
        $objCusEdit->email = $request->input('email');
        if ($objCusEdit->save()) {
            return TRUE;
        }
    }

    public function newOrderCount($statusValue) {
        return OrderInfo::Where('status', $statusValue)->count();
    }

    public function updateStatus($id) {
        $objCusEdit = OrderInfo::find($id);
        $objCusEdit->status = 'viewed';

        if ($objCusEdit->save()) {
            return TRUE;
        }
    }

    public function getPdfData($id) {
        return OrderInfo::leftjoin('users', 'users.id', '=', 'order_info.user_id')
                        ->select('order_info.*', 'users.name as username', 'users.email as userEmail'
                                , 'users.inopla_username', 'users.extension_number', 'users.system_genrate_no', 'users.customer_number')
                        ->where('order_info.id', $id)->get()->toArray();

//        echo "<pre/>"; print_r($abc); exit();
    }

    public function getContractInfo() {
        return OrderInfo::leftjoin('users', 'users.id', '=', 'order_info.user_id')
                        ->select('order_info.*', 'users.name as username', 'users.email as userEmail'
                                , 'users.inopla_username', 'users.extension_number', 'users.system_genrate_no', 'users.customer_number')
                        ->whereNotNull('order_info.user_id')->get()->toArray();
    }

    public function getCustomerDetails() {
        $result = OrderInfo::join('users', 'users.id', '=', 'order_info.user_id')
                ->select(DB::raw('CONCAT_WS(" - ",users.customer_number, order_info.company_name) AS cust_name_num'), 'order_info.user_id')
                ->pluck('cust_name_num', 'order_info.user_id')
                ->toArray();
        if (empty($result)) {
            $result = array('' => 'No Customer Found');
        }
        return $result;
    }

}
