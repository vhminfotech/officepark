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
                        {{ trans('invoice.invoice-list') }}
                        <br/>

                        <div class="c-stage__panel u-p-medium">
                        <div class="row">
                            <label> {{ trans('invoice.filter') }}</label>
                            <div class="col-lg-2">
                                <div class="c-field u-mb-small">
                                    <select id="payment_method" class="c-select form-control filter paymnt_method" >
                                        <option value="">{{ trans('invoice.select-payment-method') }}</option>
                                        <option value="sepa" {{ ($method == 'sepa' ? 'selected="selected"' : '') }}>{{ trans('invoice.sepa') }}</option>
                                        <option value="uber" {{ ($method == 'uber' ? 'selected="selected"' : '') }}>{{ trans('invoice.transfer') }}</option>
                                    </select>
                                </div>
                            </div>
                         
                        </div>
                    </div>
                    </caption>

                    <thead class="c-table__head c-table__head--slim">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head no-sort">#</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.id') }}</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.date') }}</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.invoice-') }}</th>
                            <!-- <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.customer-number') }}</th> -->
                            <!-- <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.company-name') }}</th> -->
                            <!-- <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.package') }}</th> -->
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.price') }}</th>
                            <!-- <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.payment-method') }}</th> -->
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.paid-status') }}</th>
                            <!-- <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.mail-send') }}</th> -->
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.action') }}</th>
                            <!-- <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.paid') }}</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 0 ;$i < count($getInvoice);$i++)
                      
                        <tr class="c-table__row hide{{ $getInvoice[$i]->id }}">
                            <td class="c-table__cell"><input type="checkbox" name="invoice_{{ $getInvoice[$i]->id }}" value="{{ $getInvoice[$i]->id }}" class="invoicechk"></td>
                            <td class="c-table__cell">{{ $getInvoice[$i]->id }}</td>
                            <td class="c-table__cell">{{ date('Y-m-d',strtotime($getInvoice[$i]->created_at)) }}</td>
                            <td class="c-table__cell">{{ $getInvoice[$i]->invoice_no }}</td>
                            <!-- <td class="c-table__cell">{{ $getInvoice[$i]->customer_number }}</td> -->
                            <!-- <td class="c-table__cell">{{ $getInvoice[$i]->company_name }}</td> -->
                            <!-- <td class="c-table__cell">{{ $getInvoice[$i]->packages_name }}</td> -->
                            <td class="c-table__cell">{{ $getInvoice[$i]->total }}</td>
                            <!-- <td class="c-table__cell">{{ $getInvoice[$i]->accept }}</td> -->
                            <td class="c-table__cell">{{ $getInvoice[$i]->is_paid }}</td>
                            <!-- <td class="c-table__cell">{{ $getInvoice[$i]->mail_send }}</td> -->
                            

                            <td class="c-table__cell">
                                <!-- <a href="javascript:;" class="sendInvoice" data-id="{{ $getInvoice[$i]->id }}"><span class="c-tooltip c-tooltip--top " aria-label="PDF">  <i class="fa fa-file-pdf-o" ></i></span> </a>&nbsp;   -->
                                <a href="{{ route('customer-invoice-pdf',[$getInvoice[$i]->id]) }}" class="sendInvoice" data-id="{{ $getInvoice[$i]->id }}"><span class="c-tooltip c-tooltip--top " aria-label="PDF">
                                        <i class="fa fa-file-pdf-o" ></i></span>
                                </a>&nbsp;  
                            </td>
                            <!-- <td class="c-table__cell"><input data-id="{{ $getInvoice[$i]->id }}" data-status="{{ $getInvoice[$i]->is_paid }}" {{ ($getInvoice[$i]->is_paid == 'Yes' ? 'checked="checked"' : '') }} class="changeStatus" type="checkbox"></td> -->
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
