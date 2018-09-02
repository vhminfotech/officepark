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
                        <div class="col-sm-12">
                            Invoice List
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            <label style="display: inline-block"> <h5>Filter</h5></label>
                            <div class="col-lg-3" style="display: inline-block">
                                <div class="c-field u-mb-small">
                                    <select class="c-select" id="select1">
                                        <option>Select Payment method</option>
                                    </select>
                                </div>                      
                            </div>
                            <div class="col-lg-3" style="display: inline-block">
                                <div class="c-field u-mb-small">
                                    <select class="c-select">
                                        <option>August</option>s
                                    </select>
                                </div>                      
                            </div>
                            <div class="col-lg-3" style="display: inline-block">
                                <div class="c-field u-mb-small">
                                    <select class="c-select">
                                        <option>2018</option>s
                                    </select>
                                </div>                      
                            </div>
                            <div class="col-lg-3" style="display: inline-block">
                            </div>
                            <div class="col-lg-3" style="display: inline-block; margin-left: -59px;">
                                <div class="c-field u-mb-small">
                                    <select class="c-select">
                                        <option>2018</option>s
                                    </select>
                                </div> 
                            </div>

                            <div class="col-lg-3" style="display: inline-block" >
                                <a href=" {{ route('order-pdf',[$arrOrder[$i]->id])}} "><span class="c-btn c-btn--info c-btn--fullwidth"  aria-label="PDF">
                                        <i class="fa fa-file-pdf-o" ></i></span>
                                </a>
                                <input class="c-btn c-btn--info c-btn--fullwidth" value="Create New Bill" type="submit">
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
                            <th class="c-table__cell c-table__cell--head no-sort">Mall</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Price</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Status</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Action</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Paid</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="c-table__row">
                            <td class="c-table__cell">col-1</td>
                            <td class="c-table__cell">col-2</td>
                            <td class="c-table__cell">col-3</td>
                            <td class="c-table__cell">col-4</td>
                            <td class="c-table__cell">col-5</td>
                            <td class="c-table__cell">col-6</td>
                            <td class="c-table__cell">col-7</td>
                            <td class="c-table__cell">col-8</td>
                            <td class="c-table__cell">col-9</td>

                            <td class="c-table__cell">
                                <a href="{{ route('invoice-pdf')}}"><span class="c-tooltip c-tooltip--top"  aria-label="PDF">
                                        <i class="fa fa-file-pdf-o" ></i></span>
                                </a>&nbsp;
                                <a title="" href="{{ route('invoice-pdfV2')}}"><span class="c-tooltip c-tooltip--top"  aria-label="OfficePark-Allgemeine-Geschäftsbedingungen">
                                        <i class="fa fa-file-pdf-o" ></i></span>
                                </a>
                            </td>
                            <td class="c-table__cell">col-10</td>
                        </tr>
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
