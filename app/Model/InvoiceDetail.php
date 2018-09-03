<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\UserHasPermission;
use App\Model\Sendmail;
use App\Model\OrderInfo;
use PDF;

class InvoiceDetail extends Model {

    protected $table = 'invoice_detail';

    
}
