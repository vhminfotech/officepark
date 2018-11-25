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
                            <div class="col-lg-2">
                                <div class="c-field u-mb-small">
                                    <select class="c-select filter month" name="month" id="month">
                                        <option value=''>{{ trans('invoice.select-month') }}</option>
                                        <option value='01' {{ ($month == '01' ? 'selected="selected"' : '') }}>{{ trans('invoice.january') }}</option>
                                        <option value='02' {{ ($month == '02' ? 'selected="selected"' : '') }}>{{ trans('invoice.february') }}</option>
                                        <option value='03' {{ ($month == '03' ? 'selected="selected"' : '') }}>{{ trans('invoice.march') }}</option>
                                        <option value='04' {{ ($month == '04' ? 'selected="selected"' : '') }}>{{ trans('invoice.april') }}</option>
                                        <option value='05' {{ ($month == '05' ? 'selected="selected"' : '') }}>{{ trans('invoice.may') }}</option>
                                        <option value='06' {{ ($month == '06' ? 'selected="selected"' : '') }}>{{ trans('invoice.june') }}</option>
                                        <option value='07' {{ ($month == '07' ? 'selected="selected"' : '') }}>{{ trans('invoice.july') }}</option>
                                        <option value='08' {{ ($month == '08' ? 'selected="selected"' : '') }}>{{ trans('invoice.august') }}</option>
                                        <option value='09' {{ ($month == '09' ? 'selected="selected"' : '') }}>{{ trans('invoice.september') }}</option>
                                        <option value='10' {{ ($month == '10' ? 'selected="selected"' : '') }}>{{ trans('invoice.october') }}</option>
                                        <option value='11' {{ ($month == '11' ? 'selected="selected"' : '') }}>{{ trans('invoice.november') }}</option>
                                        <option value='12' {{ ($month == '12' ? 'selected="selected"' : '') }}>{{ trans('invoice.december') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="c-field u-mb-small">
                                    <select class="c-select filter year" id="year" name="year">
                                        <option value="">{{ trans('invoice.year') }}</option>
                                        @for($i=date('Y'); $i<=2050; $i++)
                                            <option {{ ($year == $i ? 'selected="selected"' : '') }}>{{ $i }}</option>
                                         @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="c-field u-mb-small">
                                    <select class="c-select form-control selectCustomer" id="select2">
                                        <option value=''>{{ trans('invoice.select-customer') }}</option>
                                        @for($i = 0; $i < count($getCustomer);$i++)
                                            <option value="{{ $getCustomer[$i]->customer_number }}">{{ $getCustomer[$i]->name }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                                <div class="col-lg-2">
                                <div class="c-field u-mb-small">
                                    <input class="c-btn c-btn--info c-btn--fullwidth createBill" value="{{ trans('invoice.create-new-bill') }}" type="button">
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                
                            </div>
                    </div>
                    </caption>

                    <thead class="c-table__head c-table__head--slim">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head no-sort">#</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.id') }}</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.date') }}</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.invoice') }}</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.customer-number') }}</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.company-name') }}</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.package') }}</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.price') }}</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.payment-method') }}</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.paid-status') }}</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.mail-send') }}</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.action') }}</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('invoice.paid') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 0 ;$i < count($getInvoice);$i++)
                        <tr class="c-table__row hide{{ $getInvoice[$i]->id }}">
                            <td class="c-table__cell"><input type="checkbox" name="invoice_{{ $getInvoice[$i]->id }}" value="{{ $getInvoice[$i]->id }}" class="invoicechk"></td>
                            <td class="c-table__cell">{{ $getInvoice[$i]->id }}</td>
                            <td class="c-table__cell">{{ date('Y-m-d',strtotime($getInvoice[$i]->created_at)) }}</td>
                            <td class="c-table__cell">{{ $getInvoice[$i]->invoice_no }}</td>
                            <td class="c-table__cell">{{ $getInvoice[$i]->customer_number }}</td>
                            <td class="c-table__cell">{{ $getInvoice[$i]->company_name }}</td>
                            <td class="c-table__cell">{{ $getInvoice[$i]->packages_name }}</td>
                            <td class="c-table__cell">{{ $getInvoice[$i]->total }}</td>
                            <td class="c-table__cell">{{ $getInvoice[$i]->accept }}</td>
                            <td class="c-table__cell">{{ $getInvoice[$i]->is_paid }}</td>
                            <td class="c-table__cell">{{ $getInvoice[$i]->mail_send }}</td>
                            

                            <td class="c-table__cell">
                                <a href="javascript:;" class="sendInvoice" data-id="{{ $getInvoice[$i]->id }}"><span class="c-tooltip c-tooltip--top " aria-label="PDF">
                                        <i class="fa fa-file-pdf-o" ></i></span>
                                </a>&nbsp;  
                                 <a href="javascript:;" class="deleteInvoice" data-token="{{ csrf_token() }}"  data-id="{{ $getInvoice[$i]->id }}"><span class="c-tooltip c-tooltip--top" data-toggle="modal" data-target="#deleteModel" aria-label="Delete">
                                        <i class="fa fa-trash-o"></i></span>
                                </a>
                                <!--  <a href="{{ route('invoice-pdf',array('id'=> $getInvoice[$i]->id )) }}"><span class="c-tooltip c-tooltip--top"  aria-label="PDF">
                                        <i class="fa fa-file-pdf-o" ></i></span>
                                </a>&nbsp; -->
                              <!--   <a title="" href="{{ route('invoice-pdfV2')}}"><span class="c-tooltip c-tooltip--top"  aria-label="OfficePark-Allgemeine-Geschäftsbedingungen">
                                        <i class="fa fa-file-pdf-o" ></i></span>
                                </a> -->
                            </td>
                            <td class="c-table__cell"><input data-id="{{ $getInvoice[$i]->id }}" data-status="{{ $getInvoice[$i]->is_paid }}" {{ ($getInvoice[$i]->is_paid == 'Yes' ? 'checked="checked"' : '') }} class="changeStatus" type="checkbox"></td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div><!-- // .col-12 -->
            
        </div>
        <!--<div class="row">-->
            <div class="col-lg-2">
                <form method="post" action="{{ route('invoice-list') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="invoiceId" id="checkInvNo" value="">
                    <input class="c-btn c-btn--info c-btn--fullwidth" value="{{ trans('invoice.generate-sepa') }}" type="submit">
                </form>
            <!--</div>-->
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
