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
                        {{ trans('contect.contract-list') }}  

                    </caption>
                    <thead class="c-table__head c-table__head--slim">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">{{ trans('contect.id') }}&nbsp;&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('contect.company-name') }}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('contect.company-type') }}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('contect.full-name') }}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('contect.address') }}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('contect.date-of-birth') }}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('contect.customer-number') }}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head" style="">{{ trans('contect.system-generate-number') }}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('contect.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count = 1;
                        @endphp
                        @for($i = 0 ;$i < count($arrayContract);$i++,$count++)
                        <tr class="c-table__row">
                            <td class="c-table__cell">{{ $count }}</td>
                            <td class="c-table__cell">{{ $arrayContract[$i]['company_name']  }}</td>
                            <td class="c-table__cell">{{ $arrayContract[$i]['company_type']  }}</td>
                            <td class="c-table__cell">{{ $arrayContract[$i]['fullname']  }}</td>
                            <td class="c-table__cell">{{ $arrayContract[$i]['address']  }}</td>
                            <td class="c-table__cell">{{ date('d-m-Y',strtotime($arrayContract[$i]['date_of_birth']))  }}</td>
                            <td class="c-table__cell">{{ $arrayContract[$i]['customer_number']  }}</td>
                            <td class="c-table__cell">{{ $arrayContract[$i]['system_genrate_no']  }}</td>
                            <td class="c-table__cell">
                                <a href="{{ route('download-pdf', array('orderId' => $arrayContract[$i]['id'],'pdfNo'=>1)) }}"><span class="c-tooltip c-tooltip--top" aria-label="{{ trans('contect.pdf-1-(call-forwarding)') }}">
                                        <i class="fa fa-file-pdf-o" ></i></span>
                                </a>&nbsp;
                                <a href="{{ route('download-pdf', array('orderId' => $arrayContract[$i]['id'],'pdfNo'=>2)) }}"><span class="c-tooltip c-tooltip--top" aria-label="{{ trans('contect.pdf-2-(welcome-letter)') }}">
                                        <i class="fa fa-file-pdf-o" ></i></span>
                                </a>
                                &nbsp;
                                <a href="{{ route('download-pdf', array('orderId' => $arrayContract[$i]['id'],'pdfNo'=>3)) }}"><span class="c-tooltip c-tooltip--top"  aria-label="{{ trans('contect.pdf-3-(general-terms-and-conditions)') }}">
                                        <i class="fa fa-file-pdf-o" ></i></span>
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
</div><!-- // .container -->
<style>
    a.c-board__btn.c-tooltip.c-tooltip--top {
        position: absolute;
        margin-left: 743px;
        margin-bottom: 41px;
    }
</style>

@endsection
