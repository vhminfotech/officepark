<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\UserHasPermission;
use App\Model\Sendmail;
use App\Model\InvoiceDetail;
use App\Model\Service;
use PDF;

class Invoice extends Model {

    protected $table = 'invoice';

    public function invoiceList($year, $month, $method) {
        $sql = Invoice::select('service.packages_name','invoice.id', 'invoice.created_at', 'invoice.invoice_no', 'users.customer_number', 'order_info.company_name', 'invoice.total', 'order_info.accept', 'invoice.mail_send', 'invoice.is_paid')
                ->leftjoin('users', 'users.id', '=', 'invoice.customer_id')
                ->leftjoin('order_info', 'users.id', '=', 'order_info.user_id')
                ->leftjoin('service', 'service.id', '=', 'invoice.service_id');
        if (!empty($year) && empty($month)) {
            $sql->orWhere(function($sql) use($year) {
                        $sql->orWhere(function($sql) use($year) {
                                    $sql->whereBetween('invoice.start_date', [date($year . '-01-01'), date($year . '-12-31')]);
                                });
                        $sql->orWhere(function($sql) use($year) {
                                    $sql->whereBetween('invoice.end_date', [date($year . '-01-01'), date($year . '-12-31')]);
                                });
                    });
        } if (!empty($year) && !empty($month)) {
            $sql->orWhere(function($sql) use($year, $month) {
                        $sql->orWhere(function($sql) use($year, $month) {
                                    $sql->whereBetween('invoice.start_date', [date($year . '-' . $month . '-01'), date($year . '-' . $month . '-31')]);
                                });
                        $sql->orWhere(function($sql) use($year, $month) {
                                    $sql->whereBetween('invoice.end_date', [date($year . '-' . $month . '-01'), date($year . '-' . $month . '-31')]);
                                });
                    });
        } if (!empty($method)) {
            $sql->where('order_info.accept', '=', $method);
        } $result = $sql->get();
        return $result;
    }  
    public function invoiceListByCustomer($method,$customerid,$year, $month) {
       
        $sql = Invoice::select('service.packages_name','invoice.id', 'invoice.created_at', 'invoice.invoice_no', 'users.customer_number', 'order_info.company_name', 'invoice.total', 'order_info.accept', 'invoice.mail_send', 'invoice.is_paid')
                ->leftjoin('users', 'users.id', '=', 'invoice.customer_id')
                ->leftjoin('order_info', 'users.id', '=', 'order_info.user_id')
                ->leftjoin('service', 'service.id', '=', 'invoice.service_id');
        if (!empty($year) && empty($month)) {
            $sql->orWhere(function($sql) use($year) {
                        $sql->orWhere(function($sql) use($year) {
                                    $sql->whereBetween('invoice.start_date', [date($year . '-01-01'), date($year . '-12-31')]);
                                });
                        $sql->orWhere(function($sql) use($year) {
                                    $sql->whereBetween('invoice.end_date', [date($year . '-01-01'), date($year . '-12-31')]);
                                });
                    });
        } if (!empty($year) && !empty($month)) {
            $sql->orWhere(function($sql) use($year, $month) {
                        $sql->orWhere(function($sql) use($year, $month) {
                                    $sql->whereBetween('invoice.start_date', [date($year . '-' . $month . '-01'), date($year . '-' . $month . '-31')]);
                                });
                        $sql->orWhere(function($sql) use($year, $month) {
                                    $sql->whereBetween('invoice.end_date', [date($year . '-' . $month . '-01'), date($year . '-' . $month . '-31')]);
                                });
                    });
        } if (!empty($method)) {
            $sql->where('order_info.accept', '=', $method);
        } $result = $sql->get();
        $sql->where('invoice.customer_id', '=', $customerid);
        $result = $sql->get();
        return $result;
    }

    public function invoiceListV2($customer_id ) {
        $sql = Invoice::select('invoice.id', 'invoice.created_at', 'invoice.invoice_no', 'users.customer_number', 'order_info.company_name', 'invoice.total', 'order_info.accept', 'invoice.mail_send', 'invoice.is_paid')->leftjoin('users', 'users.id', '=', 'invoice.customer_id')->leftjoin('order_info', 'users.id', '=', 'order_info.user_id');
        if (!empty($customer_id)) {
            $sql->where('invoice.customer_id', '=', $customer_id);
        } $result = $sql->get();
        return $result;
    }

    public function addInvoice($request) {
//        print_r($request->input());exit;
        $startDate = explode('/', $request->input('start_date'));
        $endDate = explode('/', $request->input('end_date'));
        $invoiceResult = Invoice::orderBy('created_at', 'desc')->first();
        
        if(!empty($invoiceResult)){
            $invoiceId = $invoiceResult->id + 1;
        }else{
             $invoiceId =  1;
        }
        
        $finalStartDate = $startDate[2] . '-' . $startDate[0] . '-' . $startDate[1];
        $finalEndDate = $endDate[2] . '-' . $endDate[0] . '-' . $endDate[1];
        $length = 8;
//        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
//        $invoice_no = substr(str_shuffle($chars), 0, $length);
        if (strlen($invoiceId) < 4) {
            $invoice_no = str_pad($invoiceId, 3, "0", STR_PAD_LEFT);
            $invoice_no .= '-' . date('y');
        } else {
            $invoice_no = $invoiceId . '-' . date('y');
        }

        $objInvoice = new Invoice();

        $objInvoice->customer_id = $request->input('customer_id');
        $objInvoice->start_date = date('Y-m-d', strtotime($finalStartDate));
        $objInvoice->end_date = date('Y-m-d', strtotime($finalEndDate));
        $objInvoice->service_id = $request->input('service_id');
        $objInvoice->invoice_no = $invoice_no;
        $objInvoice->created_at = date('Y-m-d H:i:s');
        $objInvoice->updated_at = date('Y-m-d H:i:s');
//        $objInvoice->save();
        if ($objInvoice->save()) {
            $sum = 0;
            $lastId = $objInvoice->id;
            $bezeichnung = $request->input('bezeichnung');
            $menge = $request->input('menge');
            $einzelpreis = $request->input('price');
            $total = $request->input('total');

            for ($i = 0; $i < count($bezeichnung); $i++) {
                $objInvoiceDetail = new InvoiceDetail();
//                $sum += $total[$i];
                $sum += $menge[$i] * $einzelpreis[$i];
                if ($bezeichnung[$i] != '') {
                    $objInvoiceDetail->invoice_id = $lastId;
                    $objInvoiceDetail->bezeichnung = $bezeichnung[$i];
                    $objInvoiceDetail->menge = $menge[$i];
                    $objInvoiceDetail->einzelpreis = $einzelpreis[$i];
                    $objInvoiceDetail->total = $menge[$i] * $einzelpreis[$i];
//                    $objInvoiceDetail->total = $total[$i];
                    $objInvoiceDetail->created_at = date('Y-m-d H:i:s');
                    $objInvoiceDetail->updated_at = date('Y-m-d H:i:s');
                    $result = $objInvoiceDetail->save();
                }
                $objInvoiceDetail = '';
            }
            if ($result) {
                $objInvoice1 = Invoice::find($lastId);
                $objInvoice1->total = $sum;
                if ($objInvoice1->save()) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
        }
    }

    public function getInvoiceDetail($invoiceId) {

        return Invoice::select(
                                'invoice.id', 'invoice.created_at', 'invoice.customer_id', 'invoice.start_date', 'invoice.end_date', 'invoice.service_id', 'invoice.total as invoiceTotal', 'invoice.invoice_no', 'users.customer_number', 'users.name', 'users.email', 'users.system_genrate_no', 'service.packages_name', 'order_info.company_name', 'order_info.account_name', 'order_info.account_iban', 'order_info.account_bic', 'order_info.company_info', 'order_info.accept', 'order_info.gender', 'order_info.fullname', 'invoice.mail_send', 'invoice_detail.bezeichnung', 'invoice_detail.menge', 'invoice_detail.einzelpreis', 'invoice_detail.total'
                        )
                        ->leftjoin('users', 'users.id', '=', 'invoice.customer_id')
                        ->leftjoin('invoice_detail', 'invoice_detail.invoice_id', '=', 'invoice.id')
                        ->leftjoin('service', 'invoice.service_id', '=', 'service.id')
                        ->leftjoin('order_info', 'users.id', '=', 'order_info.user_id')
                        ->where('invoice.id', $invoiceId)
                        ->get();
    }
    public function getInvoiceData($invoiceId) {

       $invoiceData = rtrim($invoiceId,',');
      $arrId = explode(',', $invoiceData);
     
        return Invoice::select(
                                'invoice.id',
                                'invoice.created_at', 
                                'invoice.customer_id', 
                                'invoice.start_date', 
                                'invoice.end_date', 
                                'invoice.service_id', 
                                'invoice.total as invoiceTotal', 
                                'invoice.invoice_no', 
                                'users.customer_number', 
                                'users.name', 
                                'users.email', 
                                'users.system_genrate_no', 
                                'service.packages_name', 
                                'order_info.company_name', 
                                'order_info.account_name', 
                                'order_info.account_iban', 
                                'order_info.account_bic', 
                                'order_info.company_info', 
                                'order_info.accept', 
                                'order_info.gender', 
                                'order_info.fullname', 
                                'invoice.mail_send'
                        )
                        ->leftjoin('users', 'users.id', '=', 'invoice.customer_id')
//                        ->leftjoin('invoice_detail', 'invoice_detail.invoice_id', '=', 'invoice.id')
                        ->leftjoin('service', 'invoice.service_id', '=', 'service.id')
                        ->leftjoin('order_info', 'users.id', '=', 'order_info.user_id')
                        ->whereIn('invoice.id', $arrId)
                        ->get();
    }

    public function getMailStatusUpdate($invoiceId) {
        $objInfo = Invoice::find($invoiceId);
        $objInfo->mail_send = 'YES';
        if ($objInfo->save()) {
            return TRUE;
        }
    }

    public function getServiceName() {
        return Service::select('id', 'packages_name')->get();
    }

    public function deleteInvoice($invoiceId) {
        Invoice::where('id', $invoiceId)->delete();
        return true;
    }

    public function changePaidStatus($invoiceArray) {
        $objInfo = Invoice::find($invoiceArray['id']);
        $objInfo->is_paid = ($invoiceArray['status'] == 'No') ? 'YES' : 'No';
        if ($objInfo->save()) {
            return TRUE;
        }
    }

}
