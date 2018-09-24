<?php

namespace App\Http\Controllers\Admin;

use App\Model\Users;
use App\Model\Invoice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CallController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->middleware('admin');
    }

    public function index(Request $request) {

        $objUser = new Users();
        $data['getCustomer'] = $objUser->getCustomer(null);

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

        return view('admin.call.call-list', $data);
    }

  
}
