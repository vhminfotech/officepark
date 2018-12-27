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
                        <div class="c-stage__panel u-p-low">
                            <div class="row">
                                <label>{{ trans('addressbook.op_addresbook_list')}}</label>
                                
                                <div class=" col-lg-offset-4 col-lg-4">
                                    <div class="c-field u-mb-small">
                                        <select name="customer_id" id="customer_id" class = 'c-select filter selectCustomer customer_id' >
                                            
                                            @if(!in_array("No Customer Found", $arrOrderInfo))
                                            <option value="">Select Contact Name</option>
                                            @for($i = 0 ;$i < count($arrOrderInfo);$i++)      
                                            <option value="{{ $arrOrderInfo[$i]['id']}}" {{ ($arrOrderInfo[$i]['id'] == $order_id ? 'selected="selected"' : '') }}>{{ $arrOrderInfo[$i]['firstname']}} {{ $arrOrderInfo[$i]['surname']}}</option>
                                            @endfor
                                            @else
                                            <option value="">No Record found</option>
                                            @endif
                                        </select>
                                        <!--{{ Form::select('customer_id', $arrOrderInfo , (empty($addbkDetail[0]->customer_id) ? null : $addbkDetail[0]->customer_id), array('class' => 'c-select filter selectCustomer customer_id', 'id' => 'customer_id')) }}-->
                                    </div>
                                </div>
                                
                                <div class="right">
                                    <a class="c-table__title-action c-tooltip c-tooltip--top" href="{{ route('address-book-add-customer') }}" aria-label="Add Addressbook">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>

                        </div>

                    </caption>
                    <thead class="c-table__head c-table__head--slim">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">{{ trans('addressbook.id')}}</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('addressbook.firstname')}}&nbsp;&nbsp;</th>                            
                            <th class="c-table__cell c-table__cell--head">{{ trans('addressbook.company')}}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('addressbook.position')}}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('addressbook.email')}} &nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('addressbook.telephone_number')}}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('addressbook.telefax')}}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('addressbook.note')}}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('addressbook.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>    
                        @php
                        $count = 1;
                        @endphp
                        @for($i = 0 ;$i < count($arrAddbook);$i++,$count++)                
                        <tr class="c-table__row">
                            
                            <td class="c-table__cell">{{ $count }}</td>
                            <td class="c-table__cell">{{ $arrAddbook[$i]->firstname }} {{ $arrAddbook[$i]->surname }}</td>
                            
                            <td class="c-table__cell">{{ $arrAddbook[$i]->company }}</td>
                            <td class="c-table__cell">{{ $arrAddbook[$i]->position }}</td>
                            <th class="c-table__cell ">{{ $arrAddbook[$i]->email }}</th>
                            <th class="c-table__cell ">{{ $arrAddbook[$i]->telephone_number }}</th>
                            <th class="c-table__cell ">{{ $arrAddbook[$i]->telefax }}</th>
                            <th class="c-table__cell ">{{ $arrAddbook[$i]->note }}</th>
                            <td class="c-table__cell">
                                <a href=" {{ route('address-book-edit-customer',[$arrAddbook[$i]->id])}} "><span class="c-tooltip c-tooltip--top"  aria-label="{{ trans('addressbook.edit')}}">
                                        <i class="fa fa-edit" ></i></span>
                                </a>
                                
                                <a href="javascript:;" class="delete" data-token="{{ csrf_token() }}" data-id="{{ $arrAddbook[$i]->id }}"><span class="c-tooltip c-tooltip--top" data-toggle="modal" data-target="#deleteModel" aria-label="{{ trans('addressbook.delete')}}">
                                        <i class="fa fa-trash-o" ></i></span>
                                </a>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<style>
    .c-table__title .c-tooltip{
        position: absolute;
    }
</style>
@endsection