@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <div c-table-responsive>
                <table class="c-table table-responsive" id="datatable">

                    <caption class="c-table__title">
                        Invoice List
                        <br/>

                        <div class="c-stage__panel u-p-medium">
                        <div class="row">
                            <label>Filter</label>
                            <div class="col-lg-3">
                                <div class="c-field u-mb-small">
                                    <select id="payment_method" class="c-select form-control filter paymnt_method" >
                                        <option value="">Select Payment method</option>
                                        <option value="sepa">Sepa</option>
                                        <option value="uber">transfer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="c-field u-mb-small">
                                    <select class="c-select filter month" name="month" id="month">
                                        <option value=''>Select Month</option>
                                        <option value='01'>January</option>
                                        <option value='02'>February</option>
                                        <option value='03'>March</option>
                                        <option value='04'>April</option>
                                        <option value='05'>May</option>
                                        <option value='06'>June</option>
                                        <option value='07'>July</option>
                                        <option value='08'>August</option>
                                        <option value='09'>September</option>
                                        <option value='10'>October</option>
                                        <option value='11'>November</option>
                                        <option value='12'>December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="c-field u-mb-small">
                                    <select class="c-select filter year" id="year" name="year">
                                        @for($i=date('Y'); $i<=2050; $i++)
                                            <option>{{ $i }}</option>
                                         @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="c-field u-mb-small">
                                    <select class="c-select form-control selectCustomer" id="select2">
                                        <option value=''>Select Customer</option>
                                        @for($i = 0; $i < count($getCustomer);$i++)
                                            <option value="{{ $getCustomer[$i]->customer_number }}">{{ $getCustomer[$i]->name }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                                <div class="col-lg-2">
                                <div class="c-field u-mb-small">
                                    <input class="c-btn c-btn--info c-btn--fullwidth createBill" value="Create New Bill" type="button">
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                
                            </div>
                    </div>
                    </caption>

                    <thead class="c-table__head c-table__head--slim">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head no-sort">Id</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Date</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Invoice</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Customer Number</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Company Name</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Packet</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Price</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Payment Method</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Mail Send</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Action</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Paid</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 0 ;$i < count($getInvoice);$i++)
                        <tr class="c-table__row">
                            <td class="c-table__cell">{{ $getInvoice[$i]->id }}</td>
                            <td class="c-table__cell">{{ date('Y-m-d',strtotime($getInvoice[$i]->created_at)) }}</td>
                            <td class="c-table__cell">{{ $getInvoice[$i]->invoice_no }}</td>
                            <td class="c-table__cell">{{ $getInvoice[$i]->customer_number }}</td>
                            <td class="c-table__cell">{{ $getInvoice[$i]->company_name }}</td>
                            <td class="c-table__cell">Business Packet Stander</td>
                            <td class="c-table__cell">{{ $getInvoice[$i]->total }}</td>
                            <td class="c-table__cell">{{ $getInvoice[$i]->accept }}</td>
                            <td class="c-table__cell">{{ $getInvoice[$i]->mail_send }}</td>
                            

                            <td class="c-table__cell">
                                <a href="javascript:;" class="sendInvoice" data-id="{{ $getInvoice[$i]->id }}"><span class="c-tooltip c-tooltip--top " aria-label="PDF">
                                        <i class="fa fa-file-pdf-o" ></i></span>
                                </a>&nbsp;  
                                <!--  <a href="{{ route('invoice-pdf',array('id'=> $getInvoice[$i]->id )) }}"><span class="c-tooltip c-tooltip--top"  aria-label="PDF">
                                        <i class="fa fa-file-pdf-o" ></i></span>
                                </a>&nbsp; -->
                              <!--   <a title="" href="{{ route('invoice-pdfV2')}}"><span class="c-tooltip c-tooltip--top"  aria-label="OfficePark-Allgemeine-Geschäftsbedingungen">
                                        <i class="fa fa-file-pdf-o" ></i></span>
                                </a> -->
                            </td>
                            <td class="c-table__cell"><input type="checkbox"></td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div><!-- // .col-12 -->
        </div>
    </div>


</div>
</div><!-- // .container -->
<style>
    a.c-board__btn.c-tooltip.c-tooltip--top {
        position: absolute;
        margin-left: 743px;
        margin-bottom: 41px;
    }
    thead {
        height: 22px !important;       /* Just for the demo          */
        overflow-y: auto !important;    /* Trigger vertical scroll    */
        overflow-x: hidden !important;  /* Hide the horizontal scroll */
    }
</style>

@endsection
