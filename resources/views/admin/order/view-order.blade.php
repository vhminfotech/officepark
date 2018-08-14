@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="c-card c-card--responsive u-mb-medium">
                <div class="c-card__header c-card__header--transparent o-line">
                    <h5 class="c-card__title"><i class="fa fa-dribbble"></i> Order Detail</h5>
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
                    <a class="" href="#">Edit</a>
                </div>

                <table class=" u-border-zero">
                    <tbody>
                        <tr class="c-table__row u-border-top-zero">
                            <td class="c-table__cell">Customer Name</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">{{ $arrOrder[0]->fullname }}</span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">Dogum Tarihi</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">{{ date('d-m-Y h:i:s',strtotime($arrOrder[0]->date_of_birth)) }}</span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">Cinsiyet:</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">{{ ($arrOrder[0]->gender == 'M' ? 'Sir' : 'Mrs') }}</span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">Email</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">{{ $arrOrder[0]->email }}</span>
                            </td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">Address</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">{{ $arrOrder[0]->address }}</span>
                            </td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">PostCode</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">{{ $arrOrder[0]->postal_code }}</span>
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
                    <h5 class="c-card__title">Firma Bilgilery</h5>
                    <a class="c-card__meta text-danger red" href="#">Edit</a>
                </div>

                <table class=" u-border-zero">
                    <tbody>
                        <tr class="c-table__row u-border-top-zero">
                            <td class="c-table__cell">Firma isim</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">{{ $arrOrder[0]->company_name }}</span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">Firma Title</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">{{ $arrOrder[0]->company_type }}</span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">Firma Info</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">{{ $arrOrder[0]->company_info }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="c-card c-card--responsive u-mb-medium">
                <div class="c-card__header c-card__header--transparent o-line">
                    <h5 class="c-card__title">Odeme Bilgileri</h5>
                    <a class="c-card__meta text-danger red" href="#">Edit</a>
                </div>

                <table class="u-border-zero">
                    <tbody>
                        <tr class="c-table__row u-border-top-zero">
                            <td class="c-table__cell">Account Owner:</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">{{ $arrOrder[0]->account_name }}</span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">IBAN:</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">{{ $arrOrder[0]->account_iban }}</span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">BIC:</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">{{ $arrOrder[0]->account_bic }}</span>
                            </td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">SEPA/UBERWELSUNG:</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">{{ $arrOrder[0]->accept }}</span>
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
                    <a class="c-card__meta text-danger red" href="#">Edit</a>
                </div>

                <table class=" u-border-zero">
                    <tbody>
                        <tr class="c-table__row u-border-top-zero">
                            <td class="c-table__cell">Phone to Redirect</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">{{ $arrOrder[0]->phone_to_reroute }}</span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">Welcome Message</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">{{ $arrOrder[0]->welcome_note }}</span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">Unavailable Message</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">{{ $arrOrder[0]->unreach_note }}</span>
                            </td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">Forward Message</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">{{ $arrOrder[0]->unreach_note }}</span>
                            </td>
                        </tr>
                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><!-- // .container -->
@endsection
