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
        //$objInfo->date_of_birth             = $dataArr['date_of_birth'];
        $objInfo->date_of_birth = '1992-12-27';
        $objInfo->address = $dataArr['address'];
        $objInfo->postal_code = $dataArr['postal_code'];
        $objInfo->phone = $dataArr['phone'];
        $objInfo->email = $dataArr['email'];

        $objInfo->account_name = $dataArr['account_name'];
        $objInfo->account_iban = $dataArr['account_iban'];
        $objInfo->account_bic = $dataArr['account_bic'];
        $objInfo->accept = $dataArr['accept'];
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
        $objInfo->company_info = $dataArr['company_info'];
        $objInfo->gender = $dataArr['gender'];
        $objInfo->fullname = $dataArr['fullname'];
        $objInfo->date_of_birth = $dataArr['date_of_birth'];
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

    public function getInfo() {
        return DB::table('order_info')->get()->toArray();
    }

}
