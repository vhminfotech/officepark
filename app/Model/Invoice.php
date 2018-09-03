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
        return Invoice::select('invoice.*')->get();
    }
    
    public function addInvoice($request){
        $startDate = explode('/',$request->input('start_date'));
        $endDate = explode('/',$request->input('start_date'));
        
        $finalStartDate = $startDate[2].'-'.$startDate[0].'-'.$startDate[1];
        $finalEndDate = $endDate[2].'-'.$endDate[0].'-'.$endDate[1];
        
        
        $objInvoice = new Invoice();
        
        $objInvoice->customer_id = $request->input('customer_id');
        $objInvoice->start_date = date('Y-m-d',  strtotime($finalStartDate));
        $objInvoice->end_date = date('Y-m-d',  strtotime($finalEndDate));
        $objInvoice->telephone_service = $request->input('telefone_service');
        $objInvoice->invoice_no = 'sfsf123';
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

}
