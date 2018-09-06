<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Model\Users;
use App\Model\Invoice;
use App\Http\Controllers\Controller;
use Auth;
use Route;
use Config;
use App;
use PDF;
use Illuminate\Http\Request;
use App\Model\Sendmail;
 
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Illuminate\Http\Request;

class InvoiceController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->middleware('admin');
    }

    public function index() {
        
        $objUser = new Users();
        $data['getCustomer'] = $objUser->getCustomer();
        
        $objinvoice = new Invoice();
        $data['getInvoice'] = $objinvoice->invoiceList();
        
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('admin/invoice.js');
        $data['funinit'] = array('Invoice.list_init()');
        $data['css'] = array('');
    
        return view('admin.invoice.invoice-list',$data);
        
    }

    public function createPDF(Request $request) {

        // print_r($request->input());exit;
        $invoiceId = $request->input('orderId');
        $objinvoice = new Invoice();
        $data['getInvoice'] = $objinvoice->getInvoiceDetail($invoiceId);
        $data['bezeichnung'] = Config::get('constants.bezeichnung');
        $objUser = new Users();
        $data['getCustomerInfo'] = $objUser->getCustomer($data['getInvoice'][0]['customer_number']);
        $target_path = 'pdf/invoice-'.$data['getInvoice'][0]['customer_number'].'.pdf';
        $pdf = PDF::loadView('admin.invoice.invoice-pdf',$data);
        $pdf->save(public_path($target_path));
     

        $mailData['subject'] = 'Invoice-'.$data['getInvoice'][0]['customer_number'];
        $mailData['template'] = 'emails.invoice';
        $mailData['attachment'] = array(
            public_path($target_path));
         $mailData['mailto'] = ['shaileshvanaliya91@gmail.com',$data['getInvoice'][0]['email']];
        $sendMail = new Sendmail;
        $mailData['data']['interUser'] = $data['getInvoice'][0]['name'];
        $mail =  $sendMail->sendSMTPMail($mailData);
        if(file_exists('public/'.$target_path)){
            unlink('public/'.$target_path);         
        }
        if ($mail =='') {
            $return['status'] = 'success';
            $return['message'] = 'Invoice sent successfully.';
            $return['redirect'] =  route('invoice-list');
        } else {
            $return['status'] = 'error';
            $return['message'] = 'something will be wrong.';
        }
            echo json_encode($return); exit;
        // return redirect('admin/invoice-list');
        // return $pdf->stream();
        // exit;
        // return $pdf->download('invoice.pdf');
    }

    public function createPDFV2() {


        $pdf = PDF::loadView('admin.invoice.invoice-pdfV2');
        return $pdf->stream();
        exit;
        return $pdf->download('invoice.pdfV2');
    }

    public function createInvoice(Request $request,$customerId) {
        $objinvoice = new Invoice();
        $objUser = new Users();
        $data['detail'] = $this->loginUser;
        $data['customerNumber'] = $customerId;
       
        if ($request->isMethod('post')) {   
            $invoiceAdd = $objinvoice->addInvoice($request);
            if ($invoiceAdd) {
                $return['status'] = 'success';
                $return['message'] = 'Invoice created successfully.';
                $return['redirect'] =  route('invoice-list');

            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return); exit;
        }

        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/invoice.js');
        $data['funinit'] = array('Invoice.add_init()');
        $data['bezeichnung'] = Config::get('constants.bezeichnung');
       
        $data['getCustomerInfo'] = $objUser->getCustomer($customerId);
        return view('admin.invoice.invoice-add', $data);
    }

}
