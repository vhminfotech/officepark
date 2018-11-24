@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
<div class="container">
    <div class="row">
        <div class="col-lg-12" style="margin-bottom: 20px;">
            <a class="c-btn c-btn--info" style="width:100%;" href="#">When you confirm the order next. The next customer number is OP-211-{{ $customerNo[0]->last_number }} and system number {{ $systemGenerateNo[0]->generated_no }}.</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="c-card c-card--responsive u-mb-medium">
                <div class="c-card__header c-card__header--transparent o-line">
                    <h5 class="c-card__title"><i class="fa fa-dribbble"></i>{{ trans('customer.order_details')}}</h5>
                    <!--<div class="c-card__meta">-->
                        <a href="#">{{ trans('customer.edit') }}</a>
                    <!--</div>-->
                </div>

                <table class="col-lg-12">
                    <tbody>
                        <tr class="c-table__row u-border-top-zero">
                            <td class="c-table__cell">{{ trans('customer.order')}} :</td>
                            <td class="c-table__cell u-text-left">
                                <span class="u-text-bold">{{ $arrOrder[0]->id }}</span>
                            </td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">{{ trans('customer.order_date')}} :</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">{{ date('d.m.Y',strtotime($arrOrder[0]->created_at)) }}</span>
                            </td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">{{ trans('customer.order_package')}} :</td>
                            <td class="c-table__cell ">
                                <span class="c-badge c-badge--small c-badge--success">{{ ($arrOrder[0]->packages_name == '' ? 'N/A' : $arrOrder[0]->packages_name) }}</span>
                                <!--<span class="c-badge c-badge--small c-badge--success">Business Standard</span>-->
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="col-lg-12">
            <div class="c-card c-card--responsive u-mb-medium">
                <div class="c-card__header c-card__header--transparent o-line">
                    <h5 class="c-card__title">{{ trans('customer.cus_info')}}</h5>
                    <a class="editCustomer" href="javascript:;">{{ trans('customer.edit')}}</a>
                </div>
                <form class="customerInfo" name="customerInfo" method="post" action="{{ route('view-order',array('id' => $arrOrder[0]->id )) }}" id="customerInfo">
                    <table class=" u-border-zero col-lg-12">
                        <tbody>
                            <tr class="c-table__row u-border-top-zero">
                                <td class="c-table__cell">{{ trans('customer.cus_name')}}</td>
                                <td class="c-table__cell ">
                                    <span class="u-text-bold html1 ">{{ $arrOrder[0]->fullname }}</span>
                                    <span class="u-text-bold data1" style="display: none;"><input class="c-input customer_name" value="{{ $arrOrder[0]->fullname }}" id="customer_name" name='customer_name'></span>
                                </td>
                            </tr>

                            <tr class="c-table__row">
                                <td class="c-table__cell">{{ trans('customer.date_of_birth')}}</td>
                                <td class="c-table__cell ">
                                    <span class="u-text-bold html1 ">{{ date('d-m-Y',strtotime($arrOrder[0]->date_of_birth)) }}</span>
                                    <span class="u-text-bold data1" style="display: none;">
                                        <div class="c-field has-addon-left">
                                            <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
                                            <label class="c-field__label u-hidden-visually" for="input9">Disabled Input</label>
                                            <input class="c-input date_of_birth" data-toggle="datepicker" id="date_of_birth" name="date_of_birth" value="{{ date('d-m-Y',strtotime($arrOrder[0]->date_of_birth)) }}" type="text" placeholder="Date of birth" required>
                                        </div>
                                    </span>
                                </td>
                            </tr>

                            <tr class="c-table__row">
                                <td class="c-table__cell">{{ trans('customer.sex')}}</td>
                                <td class="c-table__cell ">
                                    <span class="u-text-bold html1 ">{{ ($arrOrder[0]->gender == 'M' ? 'Sir' : 'Mrs') }}</span>
                                    <span class="u-text-bold data1" style="display: none;">
                                        <select name="gender" required="required" id="gender" class="c-input gender">
                                            @foreach ($gender as $indexkey=>$val)
                                            <option value="{{$indexkey}}">{{$val}}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                </td>
                            </tr>

                            <tr class="c-table__row">
                                <td class="c-table__cell">{{ trans('customer.mrs')}}</td>
                                <td class="c-table__cell ">
                                    <span class="u-text-bold html1 ">{{ $arrOrder[0]->email }}</span>
                                    <span class="u-text-bold data1" style="display: none;"><input class="c-input email" value="{{ $arrOrder[0]->email }}" id="email" name='email'></span>
                                </td>
                            </tr>
                            <tr class="c-table__row">
                                <td class="c-table__cell">{{ trans('customer.address')}}</td>
                                <td class="c-table__cell ">
                                    <span class="u-text-bold html1">{{ $arrOrder[0]->address }}</span>
                                    <span class="u-text-bold data1" style="display: none;"><input class="c-input address" value="{{ $arrOrder[0]->address }}" id="address" name='address'></span>
                                </td>
                            </tr>
                            <tr class="c-table__row">
                                <td class="c-table__cell">{{ trans('customer.postcode')}}</td>
                                <td class="c-table__cell">
                                    <span class="u-text-bold html1">{{ $arrOrder[0]->postal_code }}</span>
                                    <span class="u-text-bold data1"  style="display: none;"><input class="c-input postal_code" value="{{ $arrOrder[0]->postal_code }}" id="postal_code" name='postal_code'></span>
                                </td>
                            </tr>
                            <tr class="c-table__row">
                                <td class="c-table__cell">{{ trans('customer.telephone')}}</td>
                                <td class="c-table__cell">
                                    <span class="u-text-bold html1">{{ $arrOrder[0]->phone }}</span>
                                    <span class="u-text-bold data1"  style="display: none;"><input class="c-input phone" value="{{ $arrOrder[0]->phone }}" id="phone" name='phone'></span>
                                </td>
                            </tr>
                            <tr class="c-table__row data1" style="display: none;">
                                <td class="c-table__cell">
                                    <div class="col u-mb-medium">
                                        <input type="submit" class="c-btn c-btn--info c-btn--fullwidth submit1" value="{{ trans('customer.edit')}}">
                                    </div>
                                </td>
                                <td class="c-table__cell">
                                    <div class="col u-mb-medium">
                                        <input type="submit" class="c-btn c-btn--info c-btn--fullwidth cancel1 canceltn" data-id="1" value="{{ trans('customer.cancel')}}">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div><!-- // .row -->
    <input class="c-input orderId" value="{{ $arrOrder[0]->id }}" id="orderId" type="hidden" name='orderId'>
    <input class="c-input _token" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <div class="row">
        <div class="col-lg-12">
            <div class="c-card c-card--responsive u-mb-medium">
                <div class="c-card__header c-card__header--transparent o-line">
                    <h5 class="c-card__title">{{ trans('customer.payment_info')}}</h5>
                    <a class="edit3" data-id="3" href="javascript:;">{{ trans('customer.edit')}}</a>
                </div>
                <form class="paymentInfo" name="paymentInfo" action="{{ route('view-order',array('id' => $arrOrder[0]->id )) }}" id="paymentInfo">
                    <table class="u-border-zero col-lg-12">
                        <tbody>
                            <tr class="c-table__row u-border-top-zero">
                                <td class="c-table__cell">{{ trans('customer.account_owner')}} :</td>
                                <td class="c-table__cell ">
                                    <span class="u-text-bold html3">{{ $arrOrder[0]->account_name }}</span>
                                    <span class="u-text-bold data3"  style="display: none;"><input class="c-input account_name" value="{{ $arrOrder[0]->account_name }}" id="account_name" name='account_name'></span>
                                </td>
                            </tr>

                            <tr class="c-table__row">
                                <td class="c-table__cell">IBAN:</td>
                                <td class="c-table__cell">
                                    <span class="u-text-bold html3">{{ $arrOrder[0]->account_iban }}</span>
                                    <input style="display: none;" class="c-input data3 account_iban" value="{{ $arrOrder[0]->account_iban }}" id="account_iban" name='account_iban'>
                                </td>
                            </tr>

                            <tr class="c-table__row">
                                <td class="c-table__cell">BIC:</td>
                                <td class="c-table__cell ">
                                    <span class="u-text-bold html3">{{ $arrOrder[0]->account_bic }}</span>
                                    <input  style="display: none;" class="c-input data3 account_bic" value="{{ $arrOrder[0]->account_bic }}" id="account_bic" name='account_bic'>
                                </td>
                            </tr>
                            <tr class="c-table__row">
                                <td class="c-table__cell">SEPA:</td>
                                <td class="c-table__cell ">
                                    <span class="u-text-bold html3">{{ ($arrOrder[0]->accept == 'uber' ? 'Transfer' : 'Sepa')   }}</span>
                                    <input  style="display: none;" class="c-input data3 sepa" value="{{ $arrOrder[0]->accept }}" id="sepa" name='sepa'>
                                </td>
                            </tr>
                            <tr class="c-table__row data3" style="display: none;">
                                <td class="c-table__cell">
                                    <div class="col u-mb-medium">
                                        <input type="submit" class="c-btn c-btn--info c-btn--fullwidth submit3" value="Edit">
                                    </div>
                                </td>
                                <td class="c-table__cell">
                                    <div class="col u-mb-medium">
                                        <input type="button" class="c-btn c-btn--info c-btn--fullwidth cancel3 canceltn" data-id="3" value="Cancel">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            
            <div class="c-card c-card--responsive u-mb-medium">
                <div class="c-card__header c-card__header--transparent o-line">
                    <h5 class="c-card__title">{{ trans('customer.company_info')}}</h5>
                    <a class="edit2" href="javascript:;">{{ trans('customer.edit')}}</a>
                </div>  
                <form class="companyInfo" name="companyInfo" action="{{ route('view-order',array('id' => $arrOrder[0]->id )) }}" id="companyInfo">
                    <table class=" u-border-zero col-lg-12">
                        <tbody>
                            <tr class="c-table__row u-border-top-zero">
                                <td class="c-table__cell">{{ trans('customer.company_name')}} :</td>
                                <td class="c-table__cell ">
                                    <span class="u-text-bold html2">{{ $arrOrder[0]->company_name }}</span>
                                    <span class="u-text-bold data2"  style="display: none;"><input class="c-input company_name" value="{{ $arrOrder[0]->company_name }}" id="company_name" name='company_name'></span>
                                </td>
                            </tr>
                            <tr class="c-table__row">
                                <td class="c-table__cell">{{ trans('customer.company_title')}} :</td>
                                <td class="c-table__cell ">
                                    <span class="u-text-bold html2">{{ $arrOrder[0]->company_type }}</span>
                                    <span class="u-text-bold data2"  style="display: none;"><input class="c-input company_type" value="{{ $arrOrder[0]->company_type }}" id="company_type" name='company_type'></span>
                                </td>
                            </tr>

                            <tr class="c-table__row">
                                <td class="c-table__cell">{{ trans('customer.company_info')}} :</td>
                                <td class="c-table__cell ">
                                    <span class="u-text-bold html2">{{ $arrOrder[0]->company_info }}</span>
                                    <span class="u-text-bold data2"  style="display: none;"><input class="c-input company_info" value="{{ $arrOrder[0]->company_info }}" id="company_info" name='company_info'></span>
                                </td>
                            </tr>
                            <tr class="c-table__row data2" style="display: none;">
                                <td class="c-table__cell">
                                    <div class="col u-mb-medium">
                                        <input type="submit" class="c-btn c-btn--info c-btn--fullwidth submit2" value="{{ trans('customer.edit')}}">
                                    </div>
                                </td>
                                <td class="c-table__cell">
                                    <div class="col u-mb-medium">
                                        <input type="button" class="c-btn c-btn--info c-btn--fullwidth cancel2 canceltn" data-id="2" value="{{ trans('customer.canceel')}}">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="c-card c-card--responsive u-mb-medium">
                <div class="c-card__header c-card__header--transparent o-line">
                    <h5 class="c-card__title">{{ trans('customer.secretary_info')}}</h5>
                    <a class="edit4" href="javascript:;">{{ trans('customer.edit')}}</a>
                </div>
                <form class="secInfo" name="secInfo" action="{{ route('view-order',array('id' => $arrOrder[0]->id )) }}" id="secInfo">
                    <table class=" u-border-zero col-lg-12">
                        <tbody>
                            <tr class="c-table__row u-border-top-zero">
                                <td class="c-table__cell">{{ trans('customer.phone_to_redirect')}}</td>
                                <td class="c-table__cell ">
                                    <span class="u-text-bold html4">{{ $arrOrder[0]->phone_to_reroute }}</span>
                                    <input  style="display: none;" class="c-input data4 phone_to_reroute" value="{{ $arrOrder[0]->phone_to_reroute }}" id="phone_to_reroute" name='phone_to_reroute'>
                                </td>
                            </tr>

                            <tr class="c-table__row">
                                <td class="c-table__cell">{{ trans('customer.welcome_msg')}}</td>
                                <td class="c-table__cell ">
                                    <span class="u-text-bold html4">{{ $welcome_note[$arrOrder[0]->welcome_note] }}</span>
                                    <!--<input  style="display: none;" class="c-input data4 welcome_note" value="{{ $arrOrder[0]->welcome_note }}" id="welcome_note" name='welcome_note'>-->
                                    <select name="welcome_note" style="display: none;" required="required" class="c-input data4 welcome_note">
                                        @foreach ($welcome_note as $indexkey=>$val)
                                        <option value="{{$indexkey}}" {{ ($welcome_note[$arrOrder[0]->welcome_note] == $val ? 'selected="selected"' : '') }}>{{$val}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>

                            <tr class="c-table__row">
                                <td class="c-table__cell">{{ trans('customer.unavailable_msg')}}</td>
                                <td class="c-table__cell ">
                                    <span class="u-text-bold html4">{{ $unreach_note[$arrOrder[0]->unreach_note] }}</span>
                                    <select name="unreach_note" style="display: none;" required="required" class="c-input data4 unreach_note">
                                        @foreach ($unreach_note as $indexkey=>$val)
                                        <option value="{{$indexkey}}" {{ ($unreach_note[$arrOrder[0]->unreach_note] == $val ? 'selected="selected"' : '') }}>{{$val}}</option>
                                        @endforeach
                                    </select>
        <!--<input style="display: none;" class="c-input data4 unreach_note" value="{{ $arrOrder[0]->unreach_note }}" id="unreach_note" name='unreach_note'>-->
                                </td>
                            </tr>
                            
                            <tr class="c-table__row">
                                <td class="c-table__cell">{{ trans('customer.route_confirm')}}</td>
                                <td class="c-table__cell ">
                                    <span class="u-text-bold html4">{{ $reroute_confirm[$arrOrder[0]->reroute_confirm] }}</span>
                                    <select name="reroute_confirm" style="display: none;" required="required" class="c-input data4 reroute_confirm">
                                        @foreach ($reroute_confirm as $indexkey=>$val)
                                        <option value="{{$indexkey}}" {{ ($reroute_confirm[$arrOrder[0]->reroute_confirm] == $val ? 'selected="selected"' : '') }}>{{$val}}</option>
                                        @endforeach
                                    </select>
        <!--<input style="display: none;" class="c-input data4 unreach_note" value="{{ $arrOrder[0]->unreach_note }}" id="unreach_note" name='unreach_note'>-->
                                </td>
                            </tr>
                            <tr class="c-table__row">
                                <td class="c-table__cell">{{ trans('customer.info_type')}}</td>
                                <td class="c-table__cell ">
                                    @php
                                    $text = '';
                                    @endphp
                                    
                                    @if($arrOrder[0]->info_type == '1')
                                       @php $text = 'only via email'; @endphp
                                    @elseif($arrOrder[0]->info_type == '2')
                                        @php $text = 'only by SMS'; @endphp
                                    @elseif($arrOrder[0]->info_type == '3')
                                       @php $text = 'via e-mail and SMS'; @endphp
                                    @endif
                                    
                                    <span class="u-text-bold html4">{{ $text }}</span>
                                    <select name="info_type" style="display: none;" required="required" class="c-input data4 info_type">
                                        <option value="1" {{ ($arrOrder[0]->info_type == 1 ? 'selected="selected"' : '') }}>only via email</option>
                                        <option value="2" {{ ($arrOrder[0]->info_type == 2 ? 'selected="selected"' : '') }}>only by SMS</option>
                                        <option value="3" {{ ($arrOrder[0]->info_type == 3 ? 'selected="selected"' : '') }}>via e-mail and SMS</option>
                                        
                                    </select>
        <!--<input style="display: none;" class="c-input data4 unreach_note" value="{{ $arrOrder[0]->unreach_note }}" id="unreach_note" name='unreach_note'>-->
                                </td>
                            </tr>
                            <tr class="c-table__row">
                                <td class="c-table__cell">{{ trans('customer.center_to_cus_route')}}</td>
                                <td class="c-table__cell ">
                                    <span class="u-text-bold html4">{{ $arrOrder[0]->center_to_customer_route }}</span>
                                    <input  style="display: none;" class="c-input data4 center_to_customer_route" value="{{ $arrOrder[0]->center_to_customer_route }}" id="center_to_customer_route" name='center_to_customer_route'>
                                </td>
                            </tr>
                            <tr class="c-table__row">
                                <td class="c-table__cell">{{ trans('customer.forward_msg')}}</td>
                                <td class="c-table__cell ">
                                    <span class="u-text-bold html4">{{ (!array_key_exists($arrOrder[0]->unreach_note, $unreach_note) ? '' : $unreach_note[$arrOrder[0]->unreach_note]) }}</span>
                                    <input  style="display: none;" class="" value="{{ $arrOrder[0]->unreach_note }}" id="forward_message-" name='forward_message-'>
                                    <select id="forward_message" name='forward_message' style="display: none;" required="required" class="c-input data4 forward_message">
                                        @foreach ($unreach_note as $indexkeys=>$vals)
                                        <option value="{{$indexkeys}}" {{ ($unreach_note[$arrOrder[0]->unreach_note] == $vals ? 'selected="selected"' : '') }}>{{$vals}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr class="c-table__row data4" style="display: none;">
                                <td class="c-table__cell">
                                    <div class="col u-mb-medium">
                                        <input type="submit" class="c-btn c-btn--info c-btn--fullwidth submit4" value="{{ trans('customer.edit')}}">
                                    </div>
                                </td>
                                <td class="c-table__cell">
                                    <div class="col u-mb-medium">
                                        <input type="button" class="c-btn c-btn--info c-btn--fullwidth cancel4 canceltn" data-id="4" value="{{ trans('customer.cancel')}}">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
 
    
    @if($arrOrder[0]->user_id == "")
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-5 ">
            <div class="c-card c-card--responsive u-mb-medium">
                <div class="col">
                    <input type="button" data-id="{{ $arrOrder[0]->id }}" class="c-btn c-btn--info c-btn--fullwidth confirm" value="Confirm">
                </div>
            </div>
        </div>
    </div>
    @endif
</div><!-- // .container -->
<style>
    .error {
        border-color: red !important;
    }
</style>
@endsection
