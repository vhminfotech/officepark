<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Auth;
use Route;
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

        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('');
        return view('admin.invoice.invoice-list');
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

}
