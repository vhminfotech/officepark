@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<div class="container-">
    <div class="row u-mb-large">
        <div class="col-12">
            <div class="c-tabs">

                <ul class="c-tabs__list c-tabs__list--splitted nav nav-tabs" id="myTab" role="tablist">
                    <li class="c-tabs__item"><a class="c-tabs__link active show" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Company Profile</a></li>
                    <li class="c-tabs__item"><a class="c-tabs__link" id="nav-billinfo-tab" data-toggle="tab" href="#nav-billinfo" role="tab" aria-controls="nav-billinfo" aria-selected="false">BillInfo</a></li>
                    <li class="c-tabs__item"><a class="c-tabs__link" id="nav-invoice-tab" data-toggle="tab" href="#nav-invoice" role="tab" aria-controls="nav-invoice" aria-selected="false">Invoice</a></li>
                    <li class="c-tabs__item"><a class="c-tabs__link" id="nav-calls-tab" data-toggle="tab" href="#nav-calls" role="tab" aria-controls="nav-calls" aria-selected="false">Calls</a></li>
                    <li class="c-tabs__item"><a class="c-tabs__link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">EOC</a></li>
                    <li class="c-tabs__item"><a class="c-tabs__link" id="nav-status-tab" data-toggle="tab" href="#nav-status" role="tab" aria-controls="nav-status" aria-selected="false">Status</a></li>
                    <li class="c-tabs__item"><a class="c-tabs__link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Ticket</a></li>
                </ul>

                <div class="c-tabs__content tab-content" id="nav-tabContent">
                    <div class="c-tabs__pane active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <form name="editCustomer" id="editCustomer" action="{{ route('customer-edit',array('id'=>$arrCustomer['customer_id'])) }}" method="post">
                            <div class="row">
                                <div class="col-lg-2 u-text-center">
                                    <div class="c-avatar c-avatar--xlarge u-inline-block">
                                        <img class="c-avatar__img" src="{{ url('img/avatar-200.jpg') }}" alt="Avatar">
                                    </div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <a class="u-block u-color-primary" href="#">Edit Avatar</a>
                                </div>
                                <div class="col-lg-5">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label" for="firstName">Customer number</label> 
                                        <input class="c-input" id="firstName" readonly="readonly" name="customer_number" value="{{ $arrCustomer['customer_number'] }}" placeholder="CA021" type="text"> 
                                    </div>
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label" for="lastName">Name</label> 
                                        <input class="c-input" id="first_name" name="first_name" value="{{ $arrCustomer['fullname'] }}" placeholder="Clark" type="text"> 
                                        <input class="c-input" name="custId" value="{{ $arrCustomer['customer_id'] }}" type="hidden"> 
                                    </div>

                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label"  for="select1">Packet</label>
                                        <select class="c-select" id="select1" name="pacet">
                                            <option {{ ($arrCustomer['is_package'] == 1 ? 'selected="selected"' : '') }} value="1">BUSINESS PACKAGE STANDARD</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-5">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label" for="companyName">Company Name</label>
                                        <input class="c-input" id="companyName" name="company_name" value="{{ $arrCustomer['company_name'] }}" placeholder="Dashboard Ltd." type="text">
                                    </div>
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label" for="email">E-mail Address</label>
                                        <input class="c-input" id="email" readonly="readonly" name="email" value="{{ $arrCustomer['email'] }}" placeholder="jason@clark.com" type="email">
                                    </div>

                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label" for="website">Telefon</label>
                                        <input class="c-input" id="telephone" name="telephone" value="{{ $arrCustomer['phone'] }}" placeholder="zawiastudio.com" type="text">
                                    </div>  
                                </div>
                            </div>
                            <div class="">
                                <label class="c-field__label col-lg-offset-4" for=""></label>
                                <div class="col-lg-2 ">
                                    <div class="col u-mb-medium">
                                        <input type="submit" class="c-btn c-btn--info c-btn--fullwidth" value="Edit">
                                    </div>
                                </div>
                            </div> 
                        </form>
                    </div>
                    <div class="c-tabs__pane" id="nav-invoice" role="tabpanel" aria-labelledby="nav-invoice-tab">
                        <div c-table-responsive>
                            <table class="c-table table-responsive" id="datatable">
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
                                        <th class="c-table__cell c-table__cell--head no-sort">Paid Status</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">Mail Send</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">Action</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">Paid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i = 0 ;$i < count($getInvoice);$i++)
                                    <tr class="c-table__row hide{{ $getInvoice[$i]->id }}">
                                        <td class="c-table__cell">{{ $getInvoice[$i]->id }}</td>
                                        <td class="c-table__cell">{{ date('Y-m-d',strtotime($getInvoice[$i]->created_at)) }}</td>
                                        <td class="c-table__cell">{{ $getInvoice[$i]->invoice_no }}</td>
                                        <td class="c-table__cell">{{ $getInvoice[$i]->customer_number }}</td>
                                        <td class="c-table__cell">{{ $getInvoice[$i]->company_name }}</td>
                                        <td class="c-table__cell">Business Packet Stander</td>
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
                                        </td>
                                        <td class="c-table__cell"><input data-id="{{ $getInvoice[$i]->id }}" data-status="{{ $getInvoice[$i]->is_paid }}" {{ ($getInvoice[$i]->is_paid == 'Yes' ? 'checked="checked"' : '') }} class="changeStatus" type="checkbox"></td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div><!-- // .col-12 -->
                    </div>
                    <div class="c-tabs__pane" id="nav-calls" role="tabpanel" aria-labelledby="nav-calls-tab">
                        <div c-table-responsive>
                            <table class="c-table table-responsive" id="datatable">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th class="c-table__cell c-table__cell--head no-sort"><input class="checkAll" type="checkbox"></th>
                                        <th class="c-table__cell c-table__cell--head no-sort">Id</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">Date/Time</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">Agent</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">Customer</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">Notiz</th>
                                        <th colspan="" class="c-table__cell c-table__cell--head no-sort">Mail Notification</th>
                                        <th colspan="" class="c-table__cell c-table__cell--head no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @for($i = 0 ;$i < count($getCall);$i++)
                                    <tr class="c-table__row hide{{ $getCall[$i]->id }}">
                                        <td class="c-table__cell"><input class="changeStatus" type="checkbox"></td>
                                        <td class="c-table__cell">{{ $getCall[$i]->id }}</td>
                                        <td class="c-table__cell">{{ date('d-m-Y h:i:s',strtotime($getCall[$i]->date_time)) }}</td>
                                        <td class="c-table__cell">{{ empty($getCall[$i]->agentName) ? 'N/A' : $getCall[$i]->agentName }}</td>
                                        <td class="c-table__cell"></td>
                                        <td class="c-table__cell"></td>
                                        <td class="c-table__cell">
                                            @if($i %2 == 0)
                                            Sent
                                            @else
                                            Not Sent
                                            @endif
                                        </td>
                                        <td class="c-table__cell">
                                            @if($i %2 == 0)
                                            <div class="col u-mb-medium">
                                                <a class="c-btn c-btn--secondary" href="#">
                                                    <i class="fa fa-envelope-o u-mr-xsmall"></i>Sent mail again</a>
                                            </div>
                                            @else
                                            <div class="col u-mb-medium">
                                                <a class="c-btn c-btn--info" href="#!">
                                                    <i class="fa fa-envelope-o u-mr-xsmall"></i>Sent mail
                                                </a>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div><!-- // .col-12 -->
                    </div>
                    <div class="c-tabs__pane" id="nav-billinfo" role="tabpanel" aria-labelledby="nav-billinfo-tab">
                        <div c-table-responsive>
                            <table class="c-table" id="datatable">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">ID&nbsp;&nbsp;&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head">Company name&nbsp;&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head">Company type&nbsp;&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head">Company info&nbsp;&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head">Fullname&nbsp;&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head">DOB&nbsp;&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head">Address&nbsp;&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head">Status&nbsp;&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @for($i = 0 ;$i < count($arrOrder);$i++,$count++)
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">{{ $count }}</td>
                                        <td class="c-table__cell">{{ $arrOrder[$i]['company_name'] }}</td>
                                        <td class="c-table__cell">{{ $arrOrder[$i]['company_type'] }}</td>
                                        <td class="c-table__cell">{{ substr($arrOrder[$i]['company_info'], 0, 25) }}</td>
                                        <td class="c-table__cell">{{ $arrOrder[$i]['fullname'] }}</td>
                                        <td class="c-table__cell">{{ date('d-m-Y',strtotime($arrOrder[$i]['date_of_birth'])) }}</td>
                                        <td class="c-table__cell">{{ $arrOrder[$i]['address'] }}</td>
                                        <td class="c-table__cell"><span class="c-badge {{ ($arrOrder[$i]['user_id'])?'c-badge--success':'c-badge--danger' }} c-badge--xsmall u-ml-xsmall">{{ ($arrOrder[$i]['user_id'])?'Confirm':'Not Confirm' }}</span></td>
                                        <td class="c-table__cell">
                                            <a href="{{ route('view-order',[$arrOrder[$i]['id']])}} "><span class="c-tooltip c-tooltip--top"  aria-label="View Order Details">
                                                    <i class="fa fa-eye" ></i></span>
                                            </a>
                                        </td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div><!-- // .col-12 -->
                    </div>
                    <div class="c-tabs__pane" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">
                            <div class="col-lg-5">
                                N/A
                            </div>
                            <div class="col-lg-5">
                                N/A
                            </div>
                        </div>
                    </div>
                    <div class="c-tabs__pane" id="nav-status" role="tabpanel" aria-labelledby="nav-status-tab">
                        <div c-table-responsive>
                            <table class="c-table" id="datatable">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;width: 5% !important;max-width: 5% !important;">ID&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;width: 5% !important;max-width: 5% !important;">Company Number&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head">Welcome Message&nbsp;&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head">Unavailable Message&nbsp;&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head">Reroute Confirm&nbsp;&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head">Forward Message&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @for($i = 0 ;$i < count($arrOrderInfoStatus);$i++,$count++)
                              
                                    <tr class="c-table__row">
                                        <td class="c-table__cell" style="margin-left: 5px;width: 5% !important;max-width: 5% !important;">{{ $count }}</td>
                                        <td class="c-table__cell" style="margin-left: 5px;width: 5% !important;max-width: 5% !important;">{{ $arrOrderInfoStatus[$i]['customer_number'] }}</td>
                                        <td class="c-table__cell">{!! (!array_key_exists($arrOrderInfoStatus[$i]['welcome_note'], $welcome_note) ? '' : wordwrap($welcome_note[$arrOrderInfoStatus[$i]['welcome_note']],18,"<br>\n",TRUE) ) !!}</td>
                                        <!--<td class="c-table__cell">{{ $arrOrderInfoStatus[$i]['unreach_note'] }}</td>-->
                                        <td class="c-table__cell">{!! (!array_key_exists($arrOrderInfoStatus[$i]['unreach_note'], $unreach_note) ? '' : wordwrap($unreach_note[$arrOrderInfoStatus[$i]['unreach_note']],18,"<br>\n",TRUE)) !!}</td>
                                        <td class="c-table__cell">{!! (!array_key_exists($arrOrderInfoStatus[$i]['reroute_confirm'], $reroute_confirm) ? '' : wordwrap($reroute_confirm[$arrOrderInfoStatus[$i]['reroute_confirm']],18,"<br>\n",TRUE)) !!}</td>
                                        <td class="c-table__cell">{!! (!array_key_exists($arrOrderInfoStatus[$i]['unreach_note'], $unreach_note) ? '' : wordwrap($unreach_note[$arrOrderInfoStatus[$i]['unreach_note']],18,"<br>\n",TRUE)) !!}</td>
                                        <td class="c-table__cell">
                                            <a href="{{ route('edit-order',array('id' => $arrOrderInfoStatus[$i]['id'],'userId' => $arrOrderInfoStatus[$i]['user_id'] )) }}"><span class="c-tooltip c-tooltip--top"  aria-label="View Order Details">
                                                    <i class="fa fa-eye" ></i></span>
                                            </a>
                                        </td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div><!-- // .col-12 -->
                    </div>
                </div>
            </div>

        </div><!-- // .col-12 -->
    </div>
</div><!-- // .container -->
<style>
    input.has-error {
        border-color: red;
    }
</style>
@endsection
