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
                            <div class="col-6">
                                    <a href="{{route('customer-new-outgoing-call')}}" class="c-btn c-btn--info" >New Outgoing Calls</a>
                            </div>
                           
                        </div>
                    </caption>
                    

                    <thead class="c-table__head c-table__head--slim" style="">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head" style="">{{ trans('employee.first-name') }}&nbsp;&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('employee.last-name') }}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('employee.job-title') }}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('employee.responsibility') }}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('employee.email') }}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('employee.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>

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
