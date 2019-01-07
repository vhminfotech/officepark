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
                                    <a href="{{route('customer-new-outgoing-call')}}" class="c-btn c-btn--info" >New Outgoing Calls</a>
                            </div>
                        </div>
                    </caption>
                    
                    

                    <thead class="c-table__head c-table__head--slim" style="">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head" style="">{{ trans('calls.datetime') }}&nbsp;&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head" style="">{{ trans('employee.first-name') }}&nbsp;&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('employee.last-name') }}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('contect.company-name') }}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('order.telephone') }}1&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('employee.email') }}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('customer.status') }}&nbsp;&nbsp;</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                      @for($i=0;$i < count($outgoingCall);$i++)
                      <tr class="c-table__row">
                          <th class="c-table__cell">{{ date('d.m.Y', strtotime($outgoingCall[$i]['date'])) }} / {{ $outgoingCall[$i]['time'] }}</th>
                          <th class="c-table__cell">{{ $outgoingCall[$i]['first_name'] }}</th>
                          <th class="c-table__cell">{{ $outgoingCall[$i]['last_name'] }}</th>
                          <th class="c-table__cell">{{ $outgoingCall[$i]['company_name'] }}</th>
                          <th class="c-table__cell">{{ $outgoingCall[$i]['telephone1'] }}</th>
                          <th class="c-table__cell">{{ $outgoingCall[$i]['email'] }}</th>
                            <td class="c-table__cell">@if( $outgoingCall[$i]['status']  == '0')
                                            <span class="c-badge c-badge--warning">Pending</span>
                                               
                                           
                                        @else
                                            <span class="c-badge c-badge--success">Done</span>
                                        @endif
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
