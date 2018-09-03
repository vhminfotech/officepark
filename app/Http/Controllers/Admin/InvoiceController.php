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
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('admin/invoice.js');
        $data['funinit'] = array('Invoice.list_init()');
        $data['css'] = array('');
    
        return view('admin.invoice.invoice-list',$data);
        
    }

    public function createPDF() {


        $pdf = PDF::loadView('admin.invoice.invoice-pdf');
        return $pdf->stream();
        exit;
        return $pdf->download('invoice.pdf');
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
