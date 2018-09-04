<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\UserHasPermission;
use App\Model\Sendmail;
use App\Model\InvoiceDetail;
use PDF;

class Invoice extends Model {

    protected $table = 'invoice';

    public function invoiceList() {
        return Invoice::select(
                'invoice.id',
                'invoice.created_at',
                'invoice.invoice_no',
                'users.customer_number',
                'order_info.company_name',
                'invoice.total',
                'order_info.accept',
                'invoice.mail_send'
                )
                ->leftjoin('users','users.id','=','invoice.customer_id')
                ->leftjoin('order_info','users.id','=','order_info.user_id')
                ->get();
    }
    
    public function addInvoice($request){
        $startDate = explode('/',$request->input('start_date'));
        $endDate = explode('/',$request->input('start_date'));
        
        $finalStartDate = $startDate[2].'-'.$startDate[0].'-'.$startDate[1];
        $finalEndDate = $endDate[2].'-'.$endDate[0].'-'.$endDate[1];
        $length = 8;
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $invoice_no =  substr(str_shuffle($chars),0,$length);
    
        $objInvoice = new Invoice();
        
        $objInvoice->customer_id = $request->input('customer_id');
        $objInvoice->start_date = date('Y-m-d',  strtotime($finalStartDate));
        $objInvoice->end_date = date('Y-m-d',  strtotime($finalEndDate));
        $objInvoice->telephone_service = $request->input('telefone_service');
        $objInvoice->invoice_no = $invoice_no;
        $objInvoice->created_at = date('Y-m-d H:i:s');
        $objInvoice->updated_at = date('Y-m-d H:i:s');
        $objInvoice->save();
        
        if ($objInvoice->save()) {
            
            $sum = 0;
            
            $lastId = $objInvoice->id;
            $bezeichnung = $request->input('bezeichnung');
            $menge = $request->input('menge');
            $einzelpreis = $request->input('price');
            $total = $request->input('total');
            
            for($i=0; $i<count($bezeichnung); $i++){
                $objInvoiceDetail = new InvoiceDetail();
                $sum += $total[$i];
                if($bezeichnung[$i] !=''){
                    $objInvoiceDetail->invoice_id = $lastId;
                    $objInvoiceDetail->bezeichnung = $bezeichnung[$i];
                    $objInvoiceDetail->menge = $menge[$i];
                    $objInvoiceDetail->einzelpreis = $einzelpreis[$i];
                    $objInvoiceDetail->total = $total[$i];
                    $objInvoiceDetail->created_at = date('Y-m-d H:i:s');
                    $objInvoiceDetail->updated_at = date('Y-m-d H:i:s');
                    $result = $objInvoiceDetail->save();
                }   
                $objInvoiceDetail = ''; 
            }
            
            if($result){
                 $objInvoice1 = Invoice::find($lastId);
                 $objInvoice1->total = $sum;
                 if($objInvoice1->save()){
                     return TRUE;
                 }else{
                     return FALSE;
                 }
            }
        }
    }

    public function getInvoiceDetail($invoiceId) {

        return Invoice::select(
                'invoice.id',
                'invoice.created_at',
                'invoice.customer_id',
                'invoice.start_date',
                'invoice.end_date',
                'invoice.telephone_service',
                'invoice.total as invoiceTotal',
                'invoice.invoice_no',
                'users.customer_number',
                'users.system_genrate_no',
                'order_info.company_name',
                'order_info.account_name',
                'order_info.account_iban',
                'order_info.account_bic',
                'order_info.company_info',
                'order_info.accept',
                'invoice.mail_send',
                'invoice_detail.bezeichnung',
                'invoice_detail.menge',
                'invoice_detail.einzelpreis',
                'invoice_detail.total'
                )
                ->leftjoin('users','users.id','=','invoice.customer_id')
                ->leftjoin('invoice_detail','invoice_detail.invoice_id','=','invoice.id')
                ->leftjoin('order_info','users.id','=','order_info.user_id')
                ->where('invoice.id',$invoiceId)
                ->get();
    }

}
