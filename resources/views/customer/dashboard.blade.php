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
                                            <h4 class="c-graph-card__number">5</h4>
                                        </td>
                                    </tr>
                                    <tr class="c-table__row u-border-top-zero" >
                                        <td class="c-table__cell">Week</td>
                                        <td class="c-table__cell u-text-right " style="color:green">
                                            <h4 class="c-graph-card__number">251</h4>
                                        </td>
                                    </tr>
                                    <tr class="c-table__row u-border-top-zero" >
                                        <td class="c-table__cell">Month</td>
                                        <td class="c-table__cell u-text-right " style="color:green">
                                            <h4 class="c-graph-card__number">2445</h4>
                                        </td>
                                    </tr>
                                    <tr class="c-table__row u-border-top-zero" >
                                        <td class="c-table__cell">Year</td>
                                        <td class="c-table__cell u-text-right " style="color:green">
                                            <h4 class="c-graph-card__number">2,580</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
        <div class="col-9">
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
                                <label class="c-field__label" for="status">Status</label> 
                                <select name="starttime" class="c-select" id="status">
                                  <option>status1</option>
                                  <option>status2</option>
                                  <option>status3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="message">Message</label> 
                                <select name="starttime" class="c-select" id="message">
                                  <option>msg1</option>
                                  <option>msg2</option>
                                  <option>msg3</option>
                                  <option>msg4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                   <div class="row">
                        <div class="col-lg-6">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="number">Number</label> 
                                <select name="starttime" class="c-select" id="number">
                                  <option>num1</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="starttime">Information</label> 
                                <select name="starttime" class="c-select" id="starttime">
                                  <option>info1</option>
                                </select>
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
                    <br/>

                    {{ Form::close() }}
            </article>
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
                                <th class="c-table__cell c-table__cell--head" style="">Date - Time &nbsp;&nbsp;&nbsp;</th>
                                <th class="c-table__cell c-table__cell--head">Message &nbsp;&nbsp;</th>
                                <th class="c-table__cell c-table__cell--head">Status &nbsp;&nbsp;</th>
                                <th class="c-table__cell c-table__cell--head">Phone No &nbsp;&nbsp;</th>
                                <th class="c-table__cell c-table__cell--head">Information &nbsp;&nbsp;</th>
                            </tr>
                        </thead>
                       @for($i=0;$i < 4 ;$i++)
                        <tr class="c-table__row">
                            <th class="c-table__cell">20.10.2018</th>
                            <th class="c-table__cell">ABCDEF</th>
                            <th class="c-table__cell">Good Morning</th>
                            <th class="c-table__cell">Hello</th>
                            <th class="c-table__cell">
                                <span class="c-badge c-badge--small c-badge--success">Status</span>
                            </th>                          
                        </tr>
                        @endfor
                    <tbody>
                    
                    </tbody>
                </table>
            </div><!-- // .col-12 -->
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
