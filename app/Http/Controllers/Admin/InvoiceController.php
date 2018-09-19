<?php

namespace App\Http\Controllers\Admin;

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

//use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Illuminate\Http\Request;

class InvoiceController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->middleware('admin');
    }

    public function index(Request $request) {

        $objUser = new Users();
        $data['getCustomer'] = $objUser->getCustomer();

        $year = (empty($request->get('year'))) ? '' : $request->get('year');
        $month = (empty($request->get('month'))) ? '' : $request->get('month');
        $method = (empty($request->get('payment_method'))) ? '' : $request->get('payment_method');
        $objinvoice = new Invoice();
        $data['getInvoice'] = $objinvoice->invoiceList($year,$month,$method);

        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['js'] = array('admin/invoice.js');
        $data['funinit'] = array('Invoice.list_init()');
        $data['css'] = array('');
        $data['year'] = $year;
        $data['month'] = $month;
        $data['method'] = $method;

        return view('admin.invoice.invoice-list', $data);
    }

    public function createPDF(Request $request) {

        // print_r($request->input());exit;
        $invoiceId = $request->input('orderId');
        $objinvoice = new Invoice();
        $data['getInvoice'] = $objinvoice->getInvoiceDetail($invoiceId);
        $objinvoice->getMailStatusUpdate($invoiceId);
        $data['bezeichnung'] = Config::get('constants.bezeichnung');
        $objUser = new Users();
        $data['getCustomerInfo'] = $objUser->getCustomer($data['getInvoice'][0]['customer_number']);
        $target_path = 'pdf/invoice-' . $data['getInvoice'][0]['customer_number'] . '.pdf';
        $pdf = PDF::loadView('admin.invoice.invoice-pdf', $data);

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


        $invoiceId = 7;
        $objinvoice = new Invoice();
        $data['getInvoice'] = $objinvoice->getInvoiceDetail($invoiceId);
        $objinvoice->getMailStatusUpdate($invoiceId);
        $data['bezeichnung'] = Config::get('constants.bezeichnung');
        $objUser = new Users();
        $data['getCustomerInfo'] = $objUser->getCustomer($data['getInvoice'][0]['customer_number']);
        $target_path = 'pdf/invoice-' . $data['getInvoice'][0]['customer_number'] . '.pdf';
        $pdf = PDF::loadView('admin.invoice.invoice-pdf', $data);
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
        $data['js'] = array('admin/invoice.js');
        $data['funinit'] = array('Invoice.add_init()');
        $data['bezeichnung'] = Config::get('constants.bezeichnung');
        $data['getServiceName'] = $objinvoice->getServiceName();
        $data['getCustomerInfo'] = $objUser->getCustomer($customerId);
        return view('admin.invoice.invoice-add', $data);
    }

    public function invoicePackegeDetail(Request $request) {
        $requestdata = $request->input();

        $objinvoice = new ServiceDetail();
        $data['getServiceDetails'] = $objinvoice->getServiceDetail($requestdata);

//        $options = view("home.ajax",compact('data','type'))->render();
        return view('admin.invoice.service-list', $data)->render();
    }

        public function deleteInvoice(Request $request) {
        if ($request->isMethod('post')) {
            $objinvoice = new Invoice();
            $resultCategory = $objinvoice->deleteInvoice($request->input('id'));
            $ids = $request->input('id');
            if ($resultCategory) {
                $return['status'] = 'success';
                $return['message'] = 'Invoice delete successfully.';
                $return['jscode'] = 'setTimeout(function(){ $("#deleteModel").modal("hide");$(".hide'.$ids.'").hide();},1000)';
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Something went wrong.';
            }
            echo json_encode($return);
            exit;
        }
    }
}
