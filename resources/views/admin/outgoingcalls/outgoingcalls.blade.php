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
                        <div class="row">
                             <label>Outgoing Calls List</label>
                             <div class=" col-lg-offset-7 col-lg-7">
                                 <div class="c-field u-mb-small"></div>
                             </div>
                            <div class="right">
                                    <a href="{{route('new-outgoing-call')}}" class="c-btn c-btn--info" >New Outgoing Calls</a>
                            </div>
                        </div>
                    </caption>
                    

                    <thead class="c-table__head c-table__head--slim" style="">
                        <tr class="c-table__row">
                            
                            <th class="c-table__cell c-table__cell--head" style="">{{ trans('employee.first-name') }}&nbsp;&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('employee.last-name') }}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('employee.job-title') }}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('employee.telephone') }} 1&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('employee.telephone') }} 2&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('employee.email') }}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('customer.status') }}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('employee.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($outgoingCall as $row => $val)
                        <tr class="c-table__row">
                            
                            <td class="c-table__cell">{{ $val['first_name'] }}</td>
                            <td class="c-table__cell">{{ $val['last_name'] }}</td>
                            <td class="c-table__cell">{{ $val['company_name'] }}</td>
                            <td class="c-table__cell">{{ $val['telephone1'] }}</td>
                            <td class="c-table__cell">{{ $val['telephone2'] }}</td>
                            <td class="c-table__cell">{{ $val['email'] }}</td>
                            <td class="c-table__cell">@if($val['status']  == '0')
                                            <span class="c-badge c-badge--warning">Pending</span>
                                            <a href="#" ><span data-id="{{ $val['id'] }}" class=" complete-call c-tooltip c-tooltip--top"  aria-label="Complete Calls">
                                                    <i class="fa fa-check-square fa-1x " style="color:#fd9a18"></i></span>
                                            </a>
                                        @else
                                            <span class="c-badge c-badge--success">Done</span>
                                        @endif
                            </td>
                            
                            <td class="c-table__cell">
                                <a href=" {{ route('edit-outgoing-call',$val['id'])}} "><span class="c-tooltip c-tooltip--top"  aria-label="{{ trans('employee.edit') }}">
                                        <i class="fa fa-edit" ></i></span>
                                </a>
                                <a href="#deleteModel" class="delete" data-href=""   data-id="{{ $val['id'] }}"><span class="c-tooltip c-tooltip--top" data-toggle="modal" data-target="#deleteModel" aria-label="{{ trans('employee.delete') }}">
                                        <i class="fa fa-trash-o"></i></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
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
