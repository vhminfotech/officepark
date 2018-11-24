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
                       {{ trans('order.order-list')}}
                    </caption>
                    <thead class="c-table__head c-table__head--slim">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;"> {{ trans('order.id')}}&nbsp;&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('order.company-name')}}</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('order.company-type')}}</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('order.company-info')}}</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('order.full-name')}}</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('order.dob')}}</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('order.address')}}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('order.status')}}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('order.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count = 1;
                        @endphp
                        @for($i = 0 ;$i < count($arrOrder);$i++,$count++)
                        <tr class="c-table__row">
                            <td class="c-table__cell">{{ $count }}</td>
                            <td class="c-table__cell">{{ $arrOrder[$i]->company_name }}</td>
                            <td class="c-table__cell">{{ $arrOrder[$i]->company_type }}</td>
                            <td class="c-table__cell">{{ substr($arrOrder[$i]->company_info, 0, 25) }}</td>
                            <td class="c-table__cell">{{ $arrOrder[$i]->fullname }}</td>
                            <td class="c-table__cell">{{ date('d-m-Y',strtotime($arrOrder[$i]->date_of_birth)) }}</td>
                            <td class="c-table__cell">{{ $arrOrder[$i]->address }}</td>
                            <td class="c-table__cell"><span class="c-badge {{ ($arrOrder[$i]->user_id)?'c-badge--success':'c-badge--danger' }} c-badge--xsmall u-ml-xsmall">{{ ($arrOrder[$i]->user_id)?'Confirm':'Not Confirm' }}</span></td>
                            <td class="c-table__cell">
                                <a href="{{ route('view-order',[$arrOrder[$i]->id])}} "><span class="c-tooltip c-tooltip--top"  aria-label="View Order Details">
                                        <i class="fa fa-eye" ></i></span>
                                </a>
<!--                                <a href=" {{ route('order-pdf',[$arrOrder[$i]->id])}} "><span class="c-tooltip c-tooltip--top"  aria-label="PDF">
                                        <i class="fa fa-file-pdf-o" ></i></span>
                                </a>-->
                                
                                <a href="javascript:;" class="delete"  data-id="{{ $arrOrder[$i]->id }}"><span class="c-tooltip c-tooltip--top" data-toggle="modal" data-target="#deleteModel" aria-label="Delete">
                                        <i class="fa fa-trash-o" ></i></span>
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
