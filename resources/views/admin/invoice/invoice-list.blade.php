@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <div c-table-responsive>
                <table class="c-table" id="datatable">
                    <caption class="c-table__title">
                        Invoice List  

                    </caption>
                    <thead class="c-table__head c-table__head--slim">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head no-sort">Col-1</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Col-2</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Col-3</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Col-4</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Col-5</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="c-table__row">
                            <td class="c-table__cell">col-1</td>
                            <td class="c-table__cell">col-2</td>
                            <td class="c-table__cell">col-3</td>
                            <td class="c-table__cell">col-4</td>
                            <td class="c-table__cell">col-5</td>
                            <td class="c-table__cell">
                                <a href="{{ route('invoice-pdf')}}"><span class="c-tooltip c-tooltip--top"  aria-label="PDF">
                                        <i class="fa fa-file-pdf-o" ></i></span>
                                </a>&nbsp;
                                <a title="" href="{{ route('invoice-pdfV2')}}"><span class="c-tooltip c-tooltip--top"  aria-label="OfficePark-Allgemeine-Geschäftsbedingungen">
                                        <i class="fa fa-file-pdf-o" ></i></span>
                                </a>
                            </td>
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
</style>

@endsection
