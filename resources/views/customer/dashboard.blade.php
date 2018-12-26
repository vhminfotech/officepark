@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<div class="container">
    <div class="row u-mb-large">
        <div class="col-md-3">
                        <div class="c-card c-card--responsive u-mb-medium">
                            <table class="c-table u-border-zero">
                                <tbody>
                                    <tr class="c-table__row u-border-top-zero u-border-buttom-zero" >
                                        <td class="c-table__cell u-text-center" colspan="2"><h1>Calls</h1></td>
                                    </tr>
                                   
                                     <tr class="c-table__row u-border-top-zero" >
                                        <td class="c-table__cell">Today</td>
                                        <td class="c-table__cell u-text-right" style="color:green">
                                            <h4 class="c-graph-card__number">{{ isset($todayCalls) && !empty($todayCalls) ? $todayCalls[0]['TotalCount'] : 0  }}</h4>
                                        </td>
                                    </tr>

                                    <tr class="c-table__row u-border-top-zero" >
                                        <td class="c-table__cell">Week</td>
                                        <td class="c-table__cell u-text-right " style="color:green">
                                            <h4 class="c-graph-card__number">{{ isset($weekCalls) && !empty($weekCalls) ? $weekCalls[0]['TotalCount'] : 0  }}</h4>
                                        </td>
                                    </tr>
                                    <tr class="c-table__row u-border-top-zero" >
                                        <td class="c-table__cell">Month</td>
                                        <td class="c-table__cell u-text-right " style="color:green">
                                            <h4 class="c-graph-card__number">{{ isset($monthCalls) && !empty($monthCalls) ? $monthCalls[0]['TotalCount'] : 0  }}</h4>
                                        </td>
                                    </tr>
                                    <tr class="c-table__row u-border-top-zero" >
                                        <td class="c-table__cell">Year</td>
                                        <td class="c-table__cell u-text-right " style="color:green">
                                            <h4 class="c-graph-card__number">{{ isset($yearCalls) && !empty($yearCalls) ? $yearCalls[0]['TotalCount'] : 0  }}</h4>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
        <div class="col-9">
            {{ Form::open( array('method' => 'post', 'class' => '', 'id' => 'addStatus' )) }}
            <article class="c-stage">
                <div class="c-stage__panel u-p-medium">
                    <div class="row">
                        <div class="col-12">
                            <h1 class=" u-text-center"> Status</h1>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="statuss">Status</label> 
                                <select name="status" id="status" class="status c-select">
                                    @foreach($status as $row => $val)
                                    <option value="{{ $row }}"> {{ $plan_status[$val] }}</option>
                                    @endforeach
                                </select>
                                 <!-- {{ Form::select('status',  $plan_status,$status , array('class' => 'c-select', 'id' => 'status')) }} -->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="message">Message</label> 
                                 <!-- {{ Form::select('message', $message , null, array('class' => 'c-select', 'id' => 'message')) }} -->
                                  <select name="message" id="message" class="message c-select">
                                    @foreach($message as $row3 => $val3)
                                    <option value="{{ $row3 }}"> {{ $plan_message[$val3] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="customer_id" value="{{ $customer_id }}">
                   <div class="row">
                        <div class="col-lg-6">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="number">Number</label> 
                                {{ Form::select('number', $number , null, array('class' => 'c-select', 'id' => 'number')) }}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="starttime">Information</label> 
                                  <select name="information" id="information" class="information c-select">
                                    @if(count($information) == 0)
                                        <option value=""> No Record Found</option>
                                    @else
                                    @foreach($information as $row1 => $val1)
                                    <option value="{{ $row1 }}"> {{ $responsibility[$val1] }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <!-- {{ Form::select('information', $information , null, array('class' => 'c-select', 'id' => 'information')) }} -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="note"></label> 
                                <textarea rows="2"  class="c-input" cols="50" name="note"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 c-field u-mb-small left">
                        <div class="pull-right" >
                            <input class="c-btn c-btn--info " value="Add Status" type="submit">
                        </div> 
                    </div>
                    {{ Form::close() }}
            </article>
            {{ Form::close() }}
        </div>
    </div>
        
    <div class="row u-mb-large">
        <div class="col-12">
            <div c-table-responsive>
                <table class="c-table table-responsive" id="datatable">
                    <caption class="c-table__title">
                        <div class="c-stage__panel u-p-low">
                            <div class="row">
                                <label>Anruf</label>
                                <div class="col-lg-offset-6 col-lg-6 "></div>
                                <div class="col-lg-offset-2 col-lg-2">
                                    <div class="c-field u-mb-small">
                                        <select class="c-select filter month" name="month" id="month">
                                            <option value=''>{{ trans('invoice.select-month') }}</option>
                                            <option value='01' {{ ($month == '01' ? 'selected="selected"' : '') }}>{{ trans('invoice.january') }}</option>
                                            <option value='02' {{ ($month == '02' ? 'selected="selected"' : '') }}>{{ trans('invoice.february') }}</option>
                                            <option value='03' {{ ($month == '03' ? 'selected="selected"' : '') }}>{{ trans('invoice.march') }}</option>
                                            <option value='04' {{ ($month == '04' ? 'selected="selected"' : '') }}>{{ trans('invoice.april') }}</option>
                                            <option value='05' {{ ($month == '05' ? 'selected="selected"' : '') }}>{{ trans('invoice.may') }}</option>
                                            <option value='06' {{ ($month == '06' ? 'selected="selected"' : '') }}>{{ trans('invoice.june') }}</option>
                                            <option value='07' {{ ($month == '07' ? 'selected="selected"' : '') }}>{{ trans('invoice.july') }}</option>
                                            <option value='08' {{ ($month == '08' ? 'selected="selected"' : '') }}>{{ trans('invoice.august') }}</option>
                                            <option value='09' {{ ($month == '09' ? 'selected="selected"' : '') }}>{{ trans('invoice.september') }}</option>
                                            <option value='10' {{ ($month == '10' ? 'selected="selected"' : '') }}>{{ trans('invoice.october') }}</option>
                                            <option value='11' {{ ($month == '11' ? 'selected="selected"' : '') }}>{{ trans('invoice.november') }}</option>
                                            <option value='12' {{ ($month == '12' ? 'selected="selected"' : '') }}>{{ trans('invoice.december') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-offset-2 col-lg-2 ">
                                    <div class="c-field u-mb-small">
                                        <select class="c-select filter year" id="year" name="year">
                                            <option value="">{{ trans('invoice.year') }}</option>
                                            @for($i=date('Y'); $i<=2050; $i++)
                                                <option {{ ($year == $i ? 'selected="selected"' : '') }}>{{ $i }}</option>
                                             @endfor
                                        </select>
                                    </div>
                                </div>
                                
                            </div>

                        </div>

                    </caption>
                        <thead class="c-table__head c-table__head--slim" style="">
                            <tr class="c-table__row">
                                <th class="c-table__cell c-table__cell--head" style="">Date-Time &nbsp;&nbsp;&nbsp;</th>
                                <th class="c-table__cell c-table__cell--head">Message &nbsp;&nbsp;</th>
                                <th class="c-table__cell c-table__cell--head">Status &nbsp;&nbsp;</th>
                                <th class="c-table__cell c-table__cell--head">Phone No &nbsp;&nbsp;</th>
                                <th class="c-table__cell c-table__cell--head">Information &nbsp;&nbsp;</th>
                                <th class="c-table__cell c-table__cell--head">Action &nbsp;&nbsp;</th>
                            </tr>
                        </thead>
                       @foreach($statusArr as $row => $val)
                     
                        <tr class="c-table__row">
                            <th class="c-table__cell">{{ date('d.m.Y',strtotime($val['created_at'])) }}</th>
                            <th class="c-table__cell">{{ $plan_message[$val['message_id']] }}</th>
                            <th class="c-table__cell">{{ $plan_status[$status[$val['status_id']]] }} </th>
                            <th class="c-table__cell">{{ $number[$val['number']] }}</th>
                            <!-- <th class="c-table__cell">{{ $responsibility[$information[$val['information']]] }}</th> -->
                            <th class="c-table__cell">
                                <span class="c-badge c-badge--small c-badge--success">Status</span>
                            </th>   
                            <th class="c-table__cell">
                                <a href="javascript:;" class="delete"  >
                                    <span class="c-tooltip c-tooltip--top" data-toggle="modal" data-target="#popupModel" aria-label="Information">
                                        <i class="fa fa-info-circle"></i></span>
                                </a>
                            </th> 
                        </tr>
                        @endforeach
                    <tbody>
                    
                    </tbody>
                </table>
            </div><!-- // .col-12 -->
        </div>
    </div>
        
        
        
</div>
    <div class=" u-mb-medium">

    <div class="c-modal c-modal--huge modal fade" id="popupModel" tabindex="-1" role="dialog" aria-labelledby="myModal2">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content modal-content">
                <a class="c-modal__close c-modal__close--absolute u-text-mute u-opacity-medium" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </a>
                <div class="c-modal__body" >
                    <div class="o-page">
                        @include('customer.popup')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    input.has-error {
        border-color: red;
    }
    .has-error .select2,.has-error .select2-selection{
        color: red !important;
        border-color: red !important;
    }
    
  

</style>

@endsection
