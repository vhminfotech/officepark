@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')

<input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <div c-table-responsive>
                <table class="c-table table-responsive" id="datatable">
                        <caption class="c-table__title" >
                            <div class="row">
                                
                                <div class="col-6">
                                        <a href="{{route('add-plan-customer')}}" class="c-btn c-btn--info" >Add New Plan</a>
                                </div>
                            </div>
                        </caption>

                        <thead class="c-table__head c-table__head--slim" style="">
                            <tr class="c-table__row">
                                <th class="c-table__cell c-table__cell--head" style="">Date - Time &nbsp;&nbsp;&nbsp;</th>
                                <th class="c-table__cell c-table__cell--head">Message &nbsp;&nbsp;</th>
                                <th class="c-table__cell c-table__cell--head">Status &nbsp;&nbsp;</th>
                                <th class="c-table__cell c-table__cell--head">Phone No &nbsp;&nbsp;</th>
                                <th class="c-table__cell c-table__cell--head">Information &nbsp;&nbsp;</th>
                                <th class="c-table__cell c-table__cell--head no-sort">{{ trans('employee.action') }}</th>
                            </tr>
                        </thead>
                    <tbody>
                      @for($i=0;$i<count($planlist);$i++)
                      <tr class="c-table__row">
                          <th class="c-table__cell">{{ $planlist[$i]['datetime']  }}</th>
                          <th class="c-table__cell">{{ $plan_message[$planlist[$i]['message']] }}</th>
                          <th class="c-table__cell">{{ $plan_status[$planlist[$i]['status']] }}</th>
                          <th class="c-table__cell">{{ $plan_mo_no[$planlist[$i]['phoneno']] }}</th>
                          <th class="c-table__cell">{{ $plan_info[$planlist[$i]['information']]}}</th>
                          <td class="c-table__cell">
                                <a href=" {{ route('customer-edit-plan',$planlist[$i]['id'])}} "><span class="c-tooltip c-tooltip--top"  aria-label="{{ trans('employee.edit') }}">
                                        <i class="fa fa-edit" ></i></span>
                                </a>
                                <a href="javascript:;" class="delete"  data-token="{{ csrf_token() }}" data-id="{{ $planlist[$i]['id'] }}"><span class="c-tooltip c-tooltip--top" data-toggle="modal" data-target="#deleteModel" aria-label="{{ trans('employee.delete') }}">
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
</div>
<style>
    /*    a.c-board__btn.c-tooltip.c-tooltip--top {
            position: absolute;
            margin-left: 743px;
            margin-bottom: 41px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2
        }
    */    .left {
        float: right;
    }
</style>
@endsection
