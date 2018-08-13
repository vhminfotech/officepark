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
                                <span class="u-text-bold">5</span>
                            </td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">Order Date & Time</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">19.12-2018 12:12:10</span>
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
                                <span class="u-text-bold">test1</span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">Dogum Tarihi</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">12.12.2010</span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">Cinsiyet:</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">Gender</span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">Email</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold"></span>
                            </td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">Address</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">teset</span>
                            </td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">PostCode</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">124040</span>
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
                                <span class="u-text-bold">test1</span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">Firma Title</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">Hindutring</span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">Firma Info</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">Hindutring</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="c-card c-card--responsive u-mb-medium">
                <div class="c-card__header c-card__header--transparent o-line">
                    <h5 class="c-card__title">Odema Bilgileri</h5>
                    <a class="c-card__meta text-danger red" href="#">Edit</a>
                </div>

                <table class="u-border-zero">
                    <tbody>
                        <tr class="c-table__row u-border-top-zero">
                            <td class="c-table__cell">Account Owner:</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">test1</span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">IBAN:</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">DEEA120540454</span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">BIC:</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">DUSSEDAXXXS</span>
                            </td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">SEPA/UBERWELSUNG:</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">Sepa</span>
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
                                <span class="u-text-bold">01234548454</span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">Welcome Message</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold"></span>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">Unavailable Message</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold"></span>
                            </td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">Forward Message</td>
                            <td class="c-table__cell ">
                                <span class="u-text-bold">Email</span>
                            </td>
                        </tr>
                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><!-- // .container -->
@endsection
