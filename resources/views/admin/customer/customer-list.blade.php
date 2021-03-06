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
                        {{ trans('customer.customer_list')}}
<!--                        <a class="c-table__title-action c-tooltip c-tooltip--top" href="{{ route('customer-add') }}" aria-label="Add Customer">
                            <i class="fa fa-plus"></i>
                        </a>-->
                    </caption>
                    <thead class="c-table__head c-table__head--slim">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">{{ trans('customer.id')}}</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('customer.customer_number')}}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('customer.company_name')}}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('customer.name')}}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('customer.email')}}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('customer.telephone')}}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('customer.packge')}}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count = 1;
                        @endphp
                        @for($i = 0 ;$i < count($arrCustomer);$i++,$count++)
                        <tr class="c-table__row">
                            <td class="c-table__cell">{{ $count }}</td>
                            <td class="c-table__cell">{{  $arrCustomer[$i]->customer_number  }}</td>
                            <td class="c-table__cell">{{ $arrCustomer[$i]->company_name }}</td>
                            <td class="c-table__cell">{{ $arrCustomer[$i]->fullname }}</td>
                            <td class="c-table__cell">{{ $arrCustomer[$i]->email }}</td>
                            <td class="c-table__cell">{{ $arrCustomer[$i]->phone }}</td>
                            <td class="c-table__cell">{{ $arrCustomer[$i]->is_package }}</td>
                            <td class="c-table__cell">
                                <a href=" {{ route('customer-edit',[$arrCustomer[$i]->customer_id])}} "><span class="c-tooltip c-tooltip--top"  aria-label="{{ trans('customer.edit')}}">
                                        <i class="fa fa-edit" ></i></span>
                                </a>
                                <a href="javascript:;" class="delete"  data-id="{{ $arrCustomer[$i]->customer_id }}"><span class="c-tooltip c-tooltip--top" data-toggle="modal" data-target="#deleteModel" aria-label="{{ trans('customer.delete')}}">
                                        <i class="fa fa-trash-o"></i></span>
                                </a>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>

            </div><!-- // .col-12 -->
        </div>
    </div>

</div><!-- // .container -->
<style>
    /*    a.c-board__btn.c-tooltip.c-tooltip--top {
            position: absolute;
            margin-left: 743px;
            margin-bottom: 41px;
        }*/
    .c-table__title .c-tooltip{
        position: absolute;
    }
</style>

@endsection
