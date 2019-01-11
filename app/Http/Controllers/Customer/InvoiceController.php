<?php

namespace App\Http\Controllers\Customer;

use App\User;
use App\Model\Users;
use App\Model\Invoice;
use App\Model\ServiceDetail;
use App\Http\Controllers\Controller;
use Auth;
use Route;
use Config;
use App;
use PDF;
use Illuminate\Http\Request;
use App\Model\Sendmail;
use AbcAeffchen\Sephpa\SephpaCreditTransfer;
use AbcAeffchen\Sephpa\SephpaDirectDebit;
use AbcAeffchen\SepaUtilities\SepaUtilities;

//use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Illuminate\Http\Request;

class InvoiceController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->middleware('customer');
    }

    public function index(Request $request) {
        $customerDetails = $this->loginUser;
        $objUser = new Users();
        $data['getCustomer'] = $objUser->getCustomer($customerDetails['customer_number']);
        $year = (empty($request->get('year'))) ? '' : $request->get('year');
        $month = (empty($request->get('month'))) ? '' : $request->get('month');
        $objinvoice = new Invoice();
        $data['getInvoice'] = $objinvoice->invoiceListByCustomer($customerDetails['id'],$year, $month);
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('customer/invoice.js');
        $data['funinit'] = array('Invoice.list_init()');
        $data['css'] = array('');
        $data['year'] = $year;
        $data['month'] = $month;
        return view('customer.invoice.invoice-list', $data);
    }

    public function index2() {

        $debitInfo = array('pmtInfId' => 'PaymentID-1235', // ID of the payment collection
            'lclInstrm' => SepaUtilities::LOCAL_INSTRUMENT_CORE_DIRECT_DEBIT,
            'seqTp' => SepaUtilities::SEQUENCE_TYPE_RECURRING,
            'cdtr' => 'Name of Creditor', // (max 70 characters)
            'iban' => 'DE87200500001234567890', // IBAN of the Creditor
            'bic' => 'BELADEBEXXX', // BIC of the Creditor
            'ci' => 'DE98ZZZ09999999999', // Creditor-Identifier
        );

        $directDebitFile = new SephpaDirectDebit('Initiator Name', 'MessageID-1235', SephpaDirectDebit::SEPA_PAIN_008_002_02, $debitInfo);

//        $directDebitCollection = $directDebitFile->addCollection([
//// required information about the creditor
//            'pmtInfId' => 'PaymentID-1235', // ID of the payment collection
//            'lclInstrm' => SepaUtilities::LOCAL_INSTRUMENT_CORE_DIRECT_DEBIT,
//            'seqTp' => SepaUtilities::SEQUENCE_TYPE_RECURRING,
//            'cdtr' => 'Name of Creditor', // (max 70 characters)
//            'iban' => 'DE87200500001234567890', // IBAN of the Creditor
//            'bic' => 'BELADEBEXXX', // BIC of the Creditor
//            'ci' => 'DE98ZZZ09999999999', // Creditor-Identifier
//// optional
//            'ccy' => 'EUR', // Currency. Default is 'EUR'
//            'btchBookg' => 'true', // BatchBooking, only 'true' or 'false'
//            //'ctgyPurp'      => ,                      // Do not use this if you not know how. For further information read the SEPA documentation
//            'ultmtCdtr' => 'Ultimate Creditor Name', // just an information, this do not affect the payment (max 70 characters)
//            'reqdColltnDt' => '2013-11-25'             // Requested Collection Date: YYYY-MM-DD
//        ]);

        $directDebitFile->addPayment([
// required information about the debtor
            'pmtId' => 'TransferID-1235-1', // ID of the payment (EndToEndId)
            'instdAmt' => 2.34, // amount
            'mndtId' => 'Mandate-Id', // Mandate ID
            'dtOfSgntr' => '2010-04-12', // Date of signature
            'bic' => 'BELADEBEXXX', // BIC of the Debtor
            'dbtr' => 'Name of Debtor', // (max 70 characters)
            'iban' => 'DE87200500001234567890', // IBAN of the Debtor
// optional
            'amdmntInd' => 'false', // Did the mandate change
            'elctrncSgntr' => 'test', // do not use this if there is a paper-based mandate
            'ultmtDbtr' => 'Ultimate Debtor Name', // just an information, this do not affect the payment (max 70 characters)
            //'purp'        => ,                        // Do not use this if you not know how. For further information read the SEPA documentation
            'rmtInf' => 'Remittance Information', // unstructured information about the remittance (max 140 characters)
            // only use this if 'amdmntInd' is 'true'. at least one must be used
            'orgnlMndtId' => 'Original-Mandat-ID',
            'orgnlCdtrSchmeId_nm' => 'Creditor-Identifier Name',
            'orgnlCdtrSchmeId_id' => 'DE98AAA09999999999',
            'orgnlDbtrAcct_iban' => 'DE87200500001234567890', // Original Debtor Account
            'orgnlDbtrAgt' => 'SMNDA'          // only 'SMNDA' allowed if used
        ]);

        $directDebitFile->addPayment([
// required information about the debtor
            'pmtId' => 'TransferID-1235-2', // ID of the payment (EndToEndId)
            'instdAmt' => 2.34, // amount
            'mndtId' => 'Mandate-Id', // Mandate ID
            'dtOfSgntr' => '2010-04-15', // Date of signature
            'bic' => 'BELADEBEXXX', // BIC of the Debtor
            'dbtr' => 'Name of 3', // (max 70 characters)
            'iban' => 'DE87200500001234567890', // IBAN of the Debtor
// optional
            'amdmntInd' => 'false', // Did the mandate change
            'elctrncSgntr' => 'test', // do not use this if there is a paper-based mandate
            'ultmtDbtr' => 'Ultimate Debtor Name', // just an information, this do not affect the payment (max 70 characters)
            //'purp'        => ,                        // Do not use this if you not know how. For further information read the SEPA documentation
            'rmtInf' => 'Remittance Information', // unstructured information about the remittance (max 140 characters)
            // only use this if 'amdmntInd' is 'true'. at least one must be used
            'orgnlMndtId' => 'Original-Mandat-ID',
            'orgnlCdtrSchmeId_nm' => 'Creditor-Identifier Name',
            'orgnlCdtrSchmeId_id' => 'DE98AAA09999999999',
            'orgnlDbtrAcct_iban' => 'DE87200500001234567890', // Original Debtor Account
            'orgnlDbtrAgt' => 'SMNDA'          // only 'SMNDA' allowed if used
        ]);

        $directDebitFile->download();
    }

    public function createPDF(Request $request,$invoiceId) {
        
        // print_r($request->input());exit;
        // $invoiceId = $request->input('orderId');
        $invoiceId = $invoiceId;
        $objinvoice = new Invoice();
        $data['getInvoice'] = $objinvoice->getInvoiceDetail($invoiceId);
        $objinvoice->getMailStatusUpdate($invoiceId);
        $data['bezeichnung'] = Config::get('constants.bezeichnung');
        $objUser = new Users();
        $data['getCustomerInfo'] = $objUser->getCustomer($data['getInvoice'][0]['customer_number']);
       
        $target_path = 'pdf/invoice-' . $data['getInvoice'][0]['customer_number'] . '.pdf';
        $pdf = PDF::loadView('customer.invoice.invoice-pdf', $data);
        return $pdf->download('invoice-' . $data['getInvoice'][0]['customer_number'] . '.pdf');
        // return $pdf->download('invoice.pdf');

    }

    public function createPDF_1(Request $request) {

        // print_r($request->input());exit;
        $invoiceId = $request->input('orderId');
        $objinvoice = new Invoice();
        $data['getInvoice'] = $objinvoice->getInvoiceDetail($invoiceId);
        $objinvoice->getMailStatusUpdate($invoiceId);
        $data['bezeichnung'] = Config::get('constants.bezeichnung');
        $objUser = new Users();
        $data['getCustomerInfo'] = $objUser->getCustomer($data['getInvoice'][0]['customer_number']);
        $target_path = 'pdf/invoice-' . $data['getInvoice'][0]['customer_number'] . '.pdf';
        $pdf = PDF::loadView('customer.invoice.invoice-pdf', $data);

        $pdf->save(public_path($target_path));

        $mailData['subject'] = 'Invoice-' . $data['getInvoice'][0]['customer_number'];
        $mailData['template'] = 'emails.invoice-email-template';
        
        $mailData['attachment'] = array(
            public_path($target_path));

        $mailData['mailto'] = [$data['getInvoice'][0]['email']];
        $sendMail = new Sendmail;
        if ($data['getInvoice'][0]['gender'] = 'M') {
            $name = 'geehrter ' . $data['getInvoice'][0]['fullname'];
        } else {
            $name = 'geehrte ' . $data['getInvoice'][0]['fullname'];
        }
        $mailData['data']['interUser'] = $name;
        $mailData['data']['month'] = date('m', strtotime($data['getInvoice'][0]['start_date']));
        $mailData['data']['year'] = date('Y', strtotime($data['getInvoice'][0]['start_date']));
        $mail = $sendMail->sendSMTPMail($mailData);
        if (file_exists('public/' . $target_path)) {
            unlink('public/' . $target_path);
        }
        if ($mail == '') {
            $return['status'] = 'success';
            $return['message'] = 'Invoice sent successfully.';
            $return['redirect'] = route('invoice-list');
        } else {
            $return['status'] = 'error';
            $return['message'] = 'something will be wrong.';
        }
        echo json_encode($return);
        exit;
        // return redirect('admin/invoice-list');
        // return $pdf->stream();
        // exit;
        // return $pdf->download('invoice.pdf');
    }

    public function createPDFV2() {

        $invoiceId = 3;
        $objinvoice = new Invoice();
        $data['getInvoice'] = $objinvoice->getInvoiceDetail($invoiceId);
        $objinvoice->getMailStatusUpdate($invoiceId);
        $data['bezeichnung'] = Config::get('constants.bezeichnung');
        $objUser = new Users();
        $data['getCustomerInfo'] = $objUser->getCustomer($data['getInvoice'][0]['customer_number']);
        $target_path = 'pdf/invoice-' . $data['getInvoice'][0]['customer_number'] . '.pdf';
        $pdf = PDF::loadView('customer.invoice.invoice-pdf', $data);
        //  $pdf = PDF::loadView('admin.invoice.invoice-pdfV2');
        return $pdf->stream();
        exit;
        return $pdf->download('invoice.pdfV2');
    }

    public function createInvoice(Request $request, $customerId) {
        $objinvoice = new Invoice();
        $objUser = new Users();
        $data['detail'] = $this->loginUser;
        $data['customerNumber'] = $customerId;
        

         $invoiceResult = Invoice::orderBy('created_at', 'desc')->first();
        if(!empty($invoiceResult)){
            $invoiceId = $invoiceResult->id + 1;
        }else{
             $invoiceId =  1;
        }
        if (strlen($invoiceId) < 4) {
            $invoice_no = str_pad($invoiceId, 3, "0", STR_PAD_LEFT);
            $invoice_no .= '-' . date('y');
        } else {
            $invoice_no = $invoiceId . '/' . date('y');
        }


        if ($request->isMethod('post')) {
            $invoiceAdd = $objinvoice->addInvoice($request);
            if ($invoiceAdd) {
                $return['status'] = 'success';
                $return['message'] = 'Invoice created successfully.';
                $return['redirect'] = route('invoice-list');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }

        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('customer/invoice.js');
        $data['funinit'] = array('Invoice.add_init()');
        $data['bezeichnung'] = Config::get('constants.bezeichnung');
        $data['getServiceName'] = $objinvoice->getServiceName();
        $data['getCustomerInfo'] = $objUser->getCustomer($customerId);
        $data['invoiceNo'] = $invoice_no;
        return view('customer.invoice.invoice-add', $data);
    }

    public function invoicePackegeDetail(Request $request) {
        $requestdata = $request->input();

        $objinvoice = new ServiceDetail();
        $data['getServiceDetails'] = $objinvoice->getServiceDetail($requestdata);

//        $options = view("home.ajax",compact('data','type'))->render();
        return view('customer.invoice.service-list', $data)->render();
    }

    public function deleteInvoice(Request $request) {
        if ($request->isMethod('post')) {
            $objinvoice = new Invoice();
            $resultCategory = $objinvoice->deleteInvoice($request->input('id'));
            $ids = $request->input('id');
            if ($resultCategory) {
                $return['status'] = 'success';
                $return['message'] = 'Invoice delete successfully.';
                $return['jscode'] = 'setTimeout(function(){ $("#deleteModel").modal("hide");$(".hide' . $ids . '").hide();},1000)';
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Something went wrong.';
            }
            echo json_encode($return);
            exit;
        }
    }

    public function createPDFV3() {
        $pdf = PDF::loadView('admin.invoice.invoice-pdfV3');
        //  $pdf = PDF::loadView('admin.invoice.invoice-pdfV2');
        return $pdf->stream();
        exit;
    }

    public function changeStatus(Request $request) {
        if ($request->isMethod('post')) {
            $objinvoice = new Invoice();
            $resultCategory = $objinvoice->changePaidStatus($request->input());
            $ids = $request->input('id');
            if ($resultCategory) {
                $return['status'] = 'success';
                $return['message'] = 'Paid Status Change successfully.';
                $return['jscode'] = 'setTimeout(function(){ location.reload();},1000)';
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Something went wrong.';
            }
            echo json_encode($return);
            exit;
        }
    }

}
