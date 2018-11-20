@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<div class="container-">
    <div class="row u-mb-large">
        <div class="col-12">
            <div class="c-tabs">

                <ul class="c-tabs__list c-tabs__list--splitted nav nav-tabs" id="myTab" role="tablist">
                    <li class="c-tabs__item"><a class="c-tabs__link active show" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">{{ trans('customer.company_profile')}}</a></li>
                    <li class="c-tabs__item"><a class="c-tabs__link" id="nav-billinfo-tab" data-toggle="tab" href="#nav-billinfo" role="tab" aria-controls="nav-billinfo" aria-selected="false">{{ trans('customer.billinfo')}}</a></li>
                    <li class="c-tabs__item"><a class="c-tabs__link" id="nav-invoice-tab" data-toggle="tab" href="#nav-invoice" role="tab" aria-controls="nav-invoice" aria-selected="false">{{ trans('customer.invoice')}}</a></li>
                    <li class="c-tabs__item"><a class="c-tabs__link" id="nav-calls-tab" data-toggle="tab" href="#nav-calls" role="tab" aria-controls="nav-calls" aria-selected="false">{{ trans('customer.calls')}}</a></li>
                    <li class="c-tabs__item"><a class="c-tabs__link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">EOC</a></li>
                    <li class="c-tabs__item"><a class="c-tabs__link" id="nav-status-tab" data-toggle="tab" href="#nav-status" role="tab" aria-controls="nav-status" aria-selected="false">{{ trans('customer.status')}}</a></li>
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
                                    <a class="u-block u-color-primary" href="#">{{ trans('customer.edit_avtar')}}</a>
                                </div>
                                <div class="col-lg-5">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label" for="firstName">{{ trans('customer.customer_number')}}</label> 
                                        <input class="c-input" id="firstName" readonly="readonly" name="customer_number" value="{{ $arrCustomer['customer_number'] }}" placeholder="CA021" type="text"> 
                                    </div>
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label" for="lastName">{{ trans('customer.name')}}</label> 
                                        <input class="c-input" id="first_name" name="first_name" value="{{ $arrCustomer['fullname'] }}" placeholder="Clark" type="text"> 
                                        <input class="c-input" name="custId" value="{{ $arrCustomer['customer_id'] }}" type="hidden"> 
                                    </div>

                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label"  for="select1">{{ trans('customer.package')}}</label>
                                        <select class="c-select" id="select1" name="pacet">
                                            <option {{ ($arrCustomer['is_package'] == 1 ? 'selected="selected"' : '') }} value="1">BUSINESS PACKAGE STANDARD</option>
                                        </select>
                                    </div>
                                    
                                    
                                </div>

                                <div class="col-lg-5">
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label" for="companyName">{{ trans('customer.company_name')}}</label>
                                        <input class="c-input" id="companyName" name="company_name" value="{{ $arrCustomer['company_name'] }}" placeholder="Dashboard Ltd." type="text">
                                    </div>
                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label" for="email">{{ trans('customer.email')}}</label>
                                        <input class="c-input" id="email" readonly="readonly" name="email" value="{{ $arrCustomer['email'] }}" placeholder="jason@clark.com" type="email">
                                    </div>

                                    <div class="c-field u-mb-small">
                                        <label class="c-field__label" for="website">{{ trans('customer.telephone')}}</label>
                                        <input class="c-input" id="telephone" name="telephone" value="{{ $arrCustomer['phone'] }}" placeholder="zawiastudio.com" type="text">
                                    </div>  
                                </div>
                            </div>
                            
                            <div class="">
                                <label class="c-field__label col-lg-offset-4" for=""></label>
                                <div class="col-lg-2 ">
                                    <div class="col u-mb-medium">
                                        <input type="submit" class="c-btn c-btn--info c-btn--fullwidth" value="{{ trans('customer.edit')}}">
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="row">
                                <div class="col-lg-2 u-text-center">
                                </div>
                            <div class="col-lg-5">
                                <div class="row">
                                  <div class="col-lg-12">
                                      <div class="c-field u-mb-small">
                                          <label class="c-field__label" for="callbacksms">{{ trans('customer.call_transfer')}}</label> 
                                          <div class="c-choice c-choice--checkbox">
                                              <input class="c-choice__input" id="call_transfer_telephone" name="call_transfer_telephone" value="1" type="checkbox" >
                                              <label class="c-choice__label" for="call_transfer_telephone">{{ trans('customer.incoming_telephone')}}</label>
                                          </div>
                                      </div>
                                      <div class="c-field u-mb-small">
                                          <div class="c-choice c-choice--checkbox">
                                              <input class="c-choice__input" id="call_transfer_mobile_phone" name="call_transfer_mobile_phone" value="1" type="checkbox" >
                                              <label class="c-choice__label" for="call_transfer_mobile_phone">{{ trans('customer.incoming_mobile')}}</label>
                                          </div>
                                      </div>
                                  </div>
                                </div> 
                                    
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="c-field u-mb-small">
                                            <label class="c-field__label" for="callbacksms">{{ trans('customer.call_notification')}}</label> 
                                            <div class="c-choice c-choice--checkbox">
                                                <input class="c-choice__input" id="transfer_notification_to_call" name="transfer_notification_to_call" value="1" type="checkbox">
                                                <label class="c-choice__label" for="transfer_notification_to_call">{{ trans('customer.incoming_telephone')}}</label>
                                            </div>
                                        </div>
                                        <div class="c-field u-mb-small">
                                            <div class="c-choice c-choice--checkbox">
                                                <input class="c-choice__input" id="transfer_notification_to_mobile_phone" name="transfer_notification_to_mobile_phone" value="1" type="checkbox" >
                                                <label class="c-choice__label" for="transfer_notification_to_mobile_phone">{{ trans('customer.incoming_mobile')}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                                
                            <div class="col-lg-5">
                                    <div class="">
                                        <div class="col-md-12">
                                            <a class="c-stage__header u-flex u-justify-between collapsed" data-toggle="collapse" href="#stage-panel" aria-expanded="false" aria-controls="stage-panel">
                                                <h6 class="u-text-mute u-text-uppercase u-text-small u-mb-zero">{{ trans('customer.bussiness_hours')}}</h6>
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </a>

                                            <div class="c-stage__panel c-stage__panel--mute collapse" id="stage-panel" style="">
                                                @php
                                                $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
                                                @endphp 
                                                @for($m = 0;$m < count($days);$m++)
                                                @if($m == 0)
                                                <div class="row u-mb-xlarge" style="margin-bottom: -0.75rem!important;margin-top: 10px;">
                                                    @else
                                                    <div class="row u-mb-xlarge" style=" margin-bottom: -0.75rem!important;">
                                                        @endif
                                                        @php
                                                        $dayName = $days[$m];
                                                        @endphp
                                                        <div class="col-md-4 u-mb-medium">
                                                            <div class="c-choice c-choice--checkbox">
                                                                {{ Form::checkbox('day['.$days[$m].']',  $days[$m] , true,array('class' => 'c-choice__input', 'id' => $days[$m].$m)) }}
                                                                <label class="c-choice__label" for="{{ $days[$m].$m }}">{{ $days[$m] }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 u-mb-medium">
                                                            {{ Form::select('start['.$days[$m].']',$arrTime , null, array('class' => 'c-select', 'id' => 'start['.$days[$m].']')) }}
                                                        </div>
                                                        <div class="col-md-4 u-mb-medium">
                                                            {{ Form::select('end['.$days[$m].']',$arrTime , null, array('class' => 'c-select', 'id' => 'end['.$days[$m].']')) }}
                                                        </div>
                                                    </div>
                                                    @endfor
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <a class="c-stage__header u-flex u-justify-between collapsed" data-toggle="collapse" href="#stage-pane2" aria-expanded="false" aria-controls="stage-pane2">
                                                    <h6 class="u-text-mute u-text-uppercase u-text-small u-mb-zero">{{ trans('customer.lanch_time')}}</h6>
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </a>

                                                <div class="c-stage__panel c-stage__panel--mute collapse" id="stage-pane2" style="">
                                                    <div class="row u-mb-xlarge" style="margin-top: 10px!important;    margin-bottom: 0px !important;">
                                                        <div class="col-md-4 u-mb-medium">
                                                            <div class="c-choice c-choice--checkbox">
                                                                <input class="c-choice__input" id="launch_time" name="launch_time" value="1" type="checkbox">
                                                                <label class="c-choice__label" for="launch_time">&nbsp;</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 u-mb-medium">
                                                            {{ Form::select('global_start_time',$arrTime , null, array('class' => 'c-select col-md-2', 'id' => 'global_start_time')) }}
                                                        </div>
                                                        <div class="col-md-4 u-mb-medium">
                                                            {{ Form::select('global_end_time',$arrTime , null, array('class' => 'c-select col-md-2', 'id' => 'global_end_time')) }}
                                                        </div>
                                                    </div>   
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="c-choice c-choice--checkbox">
                                                    <input class="c-choice__input" id="no_business_hour_adjust" value="1" name="no_business_hour_adjust" type="checkbox">
                                                    <label class="c-choice__label" for="no_business_hour_adjust">{{ trans('customer.no_business_hours')}}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a class="c-stage__header u-flex u-justify-between collapsed" data-toggle="collapse" href="#stage-pane3" aria-expanded="true" aria-controls="stage-pane3">
                                                    <h6 class="u-text-mute u-text-uppercase u-text-small u-mb-zero">{{ trans('customer.g_holidays')}}</h6>
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </a>
                                                <div class="c-stage__panel c-stage__panel--mute collapse show" id="stage-pane3" style="">
                                                    <div class="u-p-medium">
                                                        <div class="form-group">
                                                            <div class="c-field has-addon-left">
                                                                <label class="c-field__label" for="holidayfrom">{{ trans('customer.holiday_from')}}</label> 
                                                                <input class="c-input form-control" data-toggle="datepicker" id="holidayfrom" name="holidayfrom" type="text" >
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="c-field has-addon-left">
                                                                <label class="c-field__label" for="holidayto">{{ trans('customer.holiday_to')}}</label> 
                                                                <input class="c-input form-control" data-toggle="datepicker" id="holidayto" name="holidayto" type="text" >
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                       
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
                                        <th class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.id')}}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.date')}}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.invoice')}}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.cus_number')}}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.cu_name')}}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.packet')}}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.price')}}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.payment_methode')}}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.paid_status')}}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.mail_send')}}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.action')}}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.paid')}}</th>
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
                                        <th class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.id')}}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.date_time')}}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.agent')}}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.customer')}}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.notification')}}</th>
                                        <th colspan="" class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.mail_notification')}}</th>
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
                                                    <i class="fa fa-envelope-o u-mr-xsmall"></i>{{ trans('customer.send_mail_again')}}</a>
                                            </div>
                                            @else
                                            <div class="col u-mb-medium">
                                                <a class="c-btn c-btn--info" href="#!">
                                                    <i class="fa fa-envelope-o u-mr-xsmall"></i>
                                                    {{ trans('customer.send_mail')}}
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
                                        <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">{{ trans('customer.id')}}&nbsp;&nbsp;&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head">{{ trans('customer.company_name')}}&nbsp;&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head">{{ trans('customer.company_type')}}&nbsp;&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head">{{ trans('customer.company_info')}}&nbsp;&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head">{{ trans('customer.full_name')}}&nbsp;&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head">{{ trans('customer.dob')}}&nbsp;&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head">{{ trans('customer.address')}}&nbsp;&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head">{{ trans('customer.status')}}&nbsp;&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.action')}}</th>
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
                                            <a href="{{ route('view-order',[$arrOrder[$i]['id']])}} "><span class="c-tooltip c-tooltip--top"  aria-label="{{ trans('customer.view_details_order')}}">
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
                                        <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;width: 5% !important;max-width: 5% !important;">{{ trans('customer.id')}}&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;width: 5% !important;max-width: 5% !important;">{{ trans('customer.company_no')}}&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head">{{ trans('customer.welcome_msg')}}&nbsp;&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head">{{ trans('customer.unavailable_msg')}} Message&nbsp;&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head">{{ trans('customer.reroute_confirm')}}&nbsp;&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head">{{ trans('customer.forward_msg')}}&nbsp;</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.action')}}</th>
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
                                            <a href="{{ route('edit-order',array('id' => $arrOrderInfoStatus[$i]['id'],'userId' => $arrOrderInfoStatus[$i]['user_id'] )) }}"><span class="c-tooltip c-tooltip--top"  aria-label="{{ trans('customer.view_oder_details')}}">
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
