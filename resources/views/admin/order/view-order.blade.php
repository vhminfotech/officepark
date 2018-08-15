@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="c-card c-card--responsive u-mb-medium">
                <div class="c-card__header c-card__header--transparent o-line">
                    <h5 class="c-card__title"><i class="fa fa-dribbble"></i> Order Details</h5>
                    <div class="c-card__meta">
                        <a href="#">Edit</a>
                    </div>
                </div>

                <table class="">
                    <tbody>
                        <tr class="c-table__row u-border-top-zero">
                            <td class="c-table__cell">Order #:</td>
                            <td class="c-table__cell u-text-left">
                                <span class="u-text-bold">{{ $arrOrder[0]->id }}</span>
                            </td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">Order Date & Time</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">{{ date('d.m.Y H:i:s',strtotime($arrOrder[0]->created_at)) }}</span>
                            </td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">Order Package</td>
                            <td class="c-table__cell ">
                                <span class="c-badge c-badge--small c-badge--success">Business Standard</span>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="col-lg-6">
            <div class="c-card c-card--responsive u-mb-medium">
                <div class="c-card__header c-card__header--transparent o-line">
                    <h5 class="c-card__title">Customer Information</h5>
                    <a class="editCustomer" href="javascript:;">Edit</a>
                </div>

                <table class=" u-border-zero">
                    <tbody>
                        <tr class="c-table__row u-border-top-zero">
                            <td class="c-table__cell">Customer Name</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold html1 ">{{ $arrOrder[0]->fullname }}</span>
                                <span class="u-text-bold data1" style="display: none;"><input class="form-control customer_name" value="{{ $arrOrder[0]->fullname }}" id="customer_name" name='customer_name'></span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">Dogum Tarihi</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold html1 ">{{ date('d-m-Y',strtotime($arrOrder[0]->date_of_birth)) }}</span>

                                <span class="u-text-bold data1" style="display: none;">
                                    <!--<input class="form-control dob"  id="dob" name='dob'>-->
                                    <div class="c-field has-addon-left">
                                        <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
                                        <label class="c-field__label u-hidden-visually" for="input9">Disabled Input</label>
                                        <input class="c-input" data-toggle="datepicker" id="input9" name="date_of_birth" value="{{ date('d-m-Y',strtotime($arrOrder[0]->date_of_birth)) }}" type="text" placeholder="Date of birth" required>
                                    </div>
                                </span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">Cinsiyet:</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold html1 ">{{ ($arrOrder[0]->gender == 'M' ? 'Sir' : 'Mrs') }}</span>
                                <span class="u-text-bold data1" style="display: none;">
                                    <select name="gender" required="required" class="form-control">
                                        @foreach ($gender as $indexkey=>$val)
                                        <option value="{{$indexkey}}">{{$val}}</option>
                                        @endforeach
                                    </select>
                                </span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">Email</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold html1 ">{{ $arrOrder[0]->email }}</span>
                                <span class="u-text-bold data1" style="display: none;"><input class="form-control email" value="{{ $arrOrder[0]->email }}" id="email" name='email'></span>
                            </td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">Address</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold html1">{{ $arrOrder[0]->address }}</span>
                                <span class="u-text-bold data1" style="display: none;"><input class="form-control address" value="{{ $arrOrder[0]->address }}" id="address" name='address'></span>
                            </td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">PostCode</td>
                            <td class="c-table__cell">
                                <span class="u-text-bold html1">{{ $arrOrder[0]->postal_code }}</span>
                                <span class="u-text-bold data1"  style="display: none;"><input class="form-control postal_code" value="{{ $arrOrder[0]->postal_code }}" id="postal_code" name='postal_code'></span>
                            </td>
                        </tr>
                        <tr class="c-table__row data1" style="display: none;">
                            <td class="c-table__cell">
                                <div class="col u-mb-medium">
                                    <input type="submit" class="c-btn c-btn--info c-btn--fullwidth submit1" value="Edit">
                                </div>
                            </td>
                            <td class="c-table__cell">
                                <div class="col u-mb-medium">
                                    <input type="submit" class="c-btn c-btn--info c-btn--fullwidth cancel1 canceltn" data-id="1" value="Cancel">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- // .row -->

    <div class="row">
        <div class="col-lg-4">
            <div class="c-card c-card--responsive u-mb-medium">
                <div class="c-card__header c-card__header--transparent o-line">
                    <h5 class="c-card__title">Company Info</h5>
                    <a class="c-card__meta text-danger red edit2" href="javascript:;">Edit</a>
                </div>

                <table class=" u-border-zero">
                    <tbody>
                        <tr class="c-table__row u-border-top-zero">
                            <td class="c-table__cell">Company Name:</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold html2">{{ $arrOrder[0]->company_name }}</span>
                                <span class="u-text-bold data2"  style="display: none;"><input class="form-control company_name" value="{{ $arrOrder[0]->company_name }}" id="company_name" name='company_name'></span>
                            </td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">Company Title:</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold html2">{{ $arrOrder[0]->company_type }}</span>
                                <span class="u-text-bold data2"  style="display: none;"><input class="form-control company_type" value="{{ $arrOrder[0]->company_type }}" id="company_type" name='company_type'></span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">Company Info:</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold html2">{{ $arrOrder[0]->company_info }}</span>
                                <span class="u-text-bold data2"  style="display: none;"><input class="form-control company_info" value="{{ $arrOrder[0]->company_info }}" id="company_info" name='company_info'></span>
                            </td>
                        </tr>
                        <tr class="c-table__row data2" style="display: none;">
                            <td class="c-table__cell">
                                <div class="col u-mb-medium">
                                    <input type="submit" class="c-btn c-btn--info c-btn--fullwidth submit2" value="Edit">
                                </div>
                            </td>
                            <td class="c-table__cell">
                                <div class="col u-mb-medium">
                                    <input type="submit" class="c-btn c-btn--info c-btn--fullwidth cancel2 canceltn" data-id="2" value="Cancel">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="c-card c-card--responsive u-mb-medium">
                <div class="c-card__header c-card__header--transparent o-line">
                    <h5 class="c-card__title">Payment information</h5>
                    <a class="c-card__meta text-danger red edit3" data-id="3" href="javascript:;">Edit</a>
                </div>

                <table class="u-border-zero">
                    <tbody>
                        <tr class="c-table__row u-border-top-zero">
                            <td class="c-table__cell">Account Owner:</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold html3">{{ $arrOrder[0]->account_name }}</span>
                                <span class="u-text-bold data3"  style="display: none;"><input class="form-control company_info" value="{{ $arrOrder[0]->company_info }}" id="company_info" name='company_info'></span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">IBAN:</td>
                            <td class="c-table__cell">
                                <span class="u-text-bold html3">{{ $arrOrder[0]->account_iban }}</span>
                                <input style="display: none;" class="form-control data3 account_iban" value="{{ $arrOrder[0]->account_iban }}" id="account_iban" name='account_iban'>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">BIC:</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold html3">{{ $arrOrder[0]->account_bic }}</span>
                                <input  style="display: none;" class="form-control data3 account_bic" value="{{ $arrOrder[0]->account_bic }}" id="account_bic" name='account_bic'>
                            </td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">SEPA:</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold html3">{{ $arrOrder[0]->accept }}</span>
                                <input  style="display: none;" class="form-control data3 sepa" value="{{ $arrOrder[0]->accept }}" id="sepa" name='sepa'>
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
                                    <input type="submit" class="c-btn c-btn--info c-btn--fullwidth cancel3 canceltn" data-id="3" value="Cancel">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="c-card c-card--responsive u-mb-medium">
                <div class="c-card__header c-card__header--transparent o-line">
                    <h5 class="c-card__title">Sekreter Information</h5>
                    <a class="c-card__meta text-danger red edit4" href="javascript:;">Edit</a>
                </div>

                <table class=" u-border-zero">
                    <tbody>
                        <tr class="c-table__row u-border-top-zero">
                            <td class="c-table__cell">Phone to Redirect</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold html4">{{ $arrOrder[0]->phone_to_reroute }}</span>
                                <input  style="display: none;" class="form-control data4 phone_to_reroute" value="{{ $arrOrder[0]->phone_to_reroute }}" id="phone_to_reroute" name='phone_to_reroute'>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">Welcome Message</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold html4">{{ $arrOrder[0]->welcome_note }}</span>
                                <input  style="display: none;" class="form-control data4 welcome_note" value="{{ $arrOrder[0]->welcome_note }}" id="welcome_note" name='welcome_note'>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">Unavailable Message</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold html4">{{ $arrOrder[0]->unreach_note }}</span>
                                <input  style="display: none;" class="form-control data4 unreach_note" value="{{ $arrOrder[0]->unreach_note }}" id="unreach_note" name='unreach_note'>
                            </td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">Forward Message</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold html4">{{ $arrOrder[0]->unreach_note }}</span>
                                <input  style="display: none;" class="form-control data4 forward_message" value="{{ $arrOrder[0]->unreach_note }}" id="forward_message" name='forward_message'>
                            </td>
                        </tr>
                        <tr class="c-table__row data4" style="display: none;">
                            <td class="c-table__cell">
                                <div class="col u-mb-medium">
                                    <input type="submit" class="c-btn c-btn--info c-btn--fullwidth submit4" value="Edit">
                                </div>
                            </td>
                            <td class="c-table__cell">
                                <div class="col u-mb-medium">
                                    <input type="submit" class="c-btn c-btn--info c-btn--fullwidth cancel4 canceltn" data-id="4" value="Cancel">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><!-- // .container -->
@endsection
