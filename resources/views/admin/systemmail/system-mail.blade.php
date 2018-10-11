@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<div class="container-">
    <div class="row u-mb-large">
        <div class="col-12">
            <div class="c-tabs">

                <ul class="c-tabs__list c-tabs__list--splitted nav nav-tabs" id="myTab" role="tablist">
                    <li class="c-tabs__item"><a class="c-tabs__link active show" id="nav-today-tab" data-toggle="tab" href="#nav-today" role="tab" aria-controls="nav-today" aria-selected="true">Today</a></li>
                    <li class="c-tabs__item"><a class="c-tabs__link" id="nav-week-tab" data-toggle="tab" href="#nav-week" role="tab" aria-controls="nav-week" aria-selected="false">Week</a></li>
                    <li class="c-tabs__item"><a class="c-tabs__link" id="nav-month-tab" data-toggle="tab" href="#nav-month" role="tab" aria-controls="nav-month" aria-selected="false">Month</a></li>
                    <li class="c-tabs__item"><a class="c-tabs__link" id="nav-years-tab" data-toggle="tab" href="#nav-years" role="tab" aria-controls="nav-years" aria-selected="false">Years</a></li>
                </ul>

                <div class="c-tabs__content tab-content" id="nav-tabContent">
                    <div class="c-tabs__pane active show" id="nav-today" role="tabpanel" aria-labelledby="nav-today-tab">
                        <div c-table-responsive>
                            <table class="c-table table-responsive" id="datatable">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th class="c-table__cell c-table__cell--head no-sort">Calls {{ $todayCalls['finalTotal'] }}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">Sent Mail {{ $todayCallSentMail['finalTotal'] }}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">Not Sent Mail {{ $todayCallNotSentMail['finalTotal'] }}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">Agent Statistics {{ $todayCallStatics['finalTotal'] }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell c-table__cell--head no-sort">
                                            <table class="" id="">
                                                @foreach($todayCalls as $row => $val)
                                                @if($val['name'] != '')
                                                <tr>
                                                    <td >{{ $val['inopla_username'] }} </td>
                                                    <td >{{ $val['TotalCount'] }}</td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </table>
                                        </td>
                                        <td class="c-table__cell c-table__cell--head no-sort">
                                            <table class="" id="">
                                                @if(count($todayCallSentMail) == 1)
                                                <td colspan="2" class="">No record Found</td>
                                                @endif
                                                @foreach($todayCallSentMail as $row => $val)
                                                @if($val['name'] != '')
                                                <tr>
                                                    <td class="">{{ $val['inopla_username'] }} </td>
                                                    <td class="">{{ $val['TotalCount'] }}</td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </table>
                                        </td>
                                        <td class="c-table__cell c-table__cell--head no-sort">
                                            <table class="" id="">
                                                @if(count($todayCallNotSentMail) == 1)
                                                <td colspan="2" class="no-record">No record Found</td>
                                                @endif
                                                @foreach($todayCallNotSentMail as $row => $val)
                                                @if($val['name'] != '')
                                                <tr class="">
                                                    <td class="">{{ $val['name'] . $val['company_name'] }} </td>
                                                    <td class="">{{ $val['TotalCount'] }}</td>
                                                </tr>
                                                @endif
                                                @endforeach 
                                            </table>
                                        </td>
                                        <td class="c-table__cell c-table__cell--head no-sort">
                                            <table class="" id="">
                                                @if(count($todayCallStatics) == 1)
                                                <td colspan="2" class="c-table__cell no-record">No record Found</td>
                                                @endif
                                                @foreach($todayCallStatics as $row => $val)
                                                @if($val['name'] != '')
                                                <tr class="">
                                                    <td>{{ $val['name'] }} </td>
                                                    <td>{{ $val['TotalCount'] }}</td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- // .col-12 -->
                    </div>
                    <div class="c-tabs__pane" id="nav-week" role="tabpanel" aria-labelledby="nav-week-tab">
                        <div c-table-responsive>
                            <table class="c-table" id="datatable">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th class="c-table__cell c-table__cell--head no-sort">Calls {{ $weekCalls['finalTotal'] }}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">Sent Mail {{ $weekCallSentMail['finalTotal'] }}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">Not Sent Mail {{ $weekCallNotSentMail['finalTotal'] }}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">Agent Statistics {{ $weekCallStatics['finalTotal'] }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell c-table__cell--head no-sort">
                                            <table class="" id="">
                                                @foreach($weekCalls as $row => $val)
                                                @if($val['name'] != '')
                                                <tr>
                                                    <td >{{ $val['inopla_username'] }} </td>
                                                    <td >{{ $val['TotalCount'] }}</td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </table>
                                        </td>
                                        <td class="c-table__cell c-table__cell--head no-sort">
                                            <table class="" id="">
                                                @if(count($weekCallSentMail) == 1)
                                                <td colspan="3" class="">No record Found</td>
                                                @endif
                                                @foreach($weekCallSentMail as $row => $val)
                                                @if($val['name'] != '')
                                                <tr>
                                                    <td >{{ $val['name'] . $val['company_name'] }} </td>
                                                    <td >{{ $val['TotalCount'] }}</td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </table>
                                        </td>
                                        <td class="c-table__cell c-table__cell--head no-sort">
                                            <table class="" id="">
                                                @if(count($weekCallNotSentMail) == 1)
                                                <td colspan="2" class="no-record">No record Found</td>
                                                @endif
                                                @foreach($weekCallNotSentMail as $row => $val)
                                                @if($val['name'] != '')
                                                <tr>
                                                    <td  class="">{{ $val['name'] . $val['company_name'] }} </td>
                                                    <td class="">{{ $val['TotalCount'] }}</td>
                                                </tr>
                                                @endif
                                                @endforeach 
                                            </table>
                                        </td>
                                        <td class="c-table__cell c-table__cell--head no-sort">
                                            <table class="" id="">
                                                @if(count($weekCallStatics) == 1)
                                                <td colspan="2" class="">No record Found</td>
                                                @endif
                                                @foreach($weekCallStatics as $row => $val)
                                                @if($val['name'] != '')
                                                <tr class="">
                                                    <td >{{ $val['name'] }} </td>
                                                    <td >{{ $val['TotalCount'] }}</td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- // .col-12 -->
                    </div>
                    <div class="c-tabs__pane" id="nav-month" role="tabpanel" aria-labelledby="nav-month-tab">
                        <div c-table-responsive>
                            <table class="c-table table-responsive" id="datatable">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th class="c-table__cell c-table__cell--head no-sort">Calls  {{ $monthCalls['finalTotal'] }}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">Sent Mail  {{ $monthCallSentMail['finalTotal'] }}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">Not Sent Mail  {{ $monthCallNotSentMail['finalTotal'] }}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">Agent Statistics  {{ $monthCallStatics['finalTotal'] }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell c-table__cell--head no-sort">
                                            <table class="" id="">
                                                @foreach($monthCalls as $row => $val)
                                                @if($val['name'] != '')
                                                <tr>
                                                    <td >{{ $val['inopla_username'] }} </td>
                                                    <td >{{ $val['TotalCount'] }}</td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </table>
                                        </td>

                                        <td class="c-table__cell c-table__cell--head no-sort">
                                            <table class="" id="">
                                                @if(count($monthCallSentMail) == 1)
                                                <td colspan="2">No record Found</td>
                                                @endif
                                                @foreach($monthCallSentMail as $row => $val)
                                                @if($val['name'] != '')
                                                <tr>
                                                    <td>{{ $val['name'] . $val['company_name'] }} </td>
                                                    <td>{{ $val['TotalCount'] }}</td>
                                                </tr>
                                                @endif
                                                @endforeach 
                                            </table>
                                        </td>
                                        <td class="c-table__cell c-table__cell--head no-sort">
                                            <table class="" id="">
                                                @if(count($monthCallNotSentMail) == 1)
                                                <td colspan="2" class="c-table__cell no-record">No record Found</td>
                                                @endif
                                                @foreach($monthCallNotSentMail as $row => $val)
                                                @if($val['name'] != '')
                                                <tr>
                                                    <td >{{ $val['name'] . $val['company_name'] }} </td>
                                                    <td >{{ $val['TotalCount'] }}</td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </table>
                                        </td>
                                        <td class="c-table__cell c-table__cell--head no-sort">
                                            <table class="" id="">
                                                @if(count($monthCallStatics) == 1)
                                                <td colspan="" class=" no-record">No record Found</td>
                                                @endif
                                                @foreach($monthCallStatics as $row => $val)
                                                @if($val['name'] != '')
                                                <tr class="">
                                                    <td >{{ $val['name'] }} </td>
                                                    <td >{{ $val['TotalCount'] }}</td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- // .col-12 -->
                    </div>
                    <div class="c-tabs__pane" id="nav-years" role="tabpanel" aria-labelledby="nav-years-tab">
                        <div c-table-responsive>
                            <table class="c-table table-responsive" id="datatable">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th class="c-table__cell c-table__cell--head no-sort">Calls {{ $yearCalls['finalTotal'] }}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">Sent Mail {{ $yearCallSentMail['finalTotal'] }}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">Not Sent Mail {{ $yearCallNotSentMail['finalTotal'] }}</th>
                                        <th class="c-table__cell c-table__cell--head no-sort">Agent Statistics {{ $yearCallStatics['finalTotal'] }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell c-table__cell--head no-sort">
                                            <table class="" id="">
                                                @foreach($yearCalls as $row => $val)
                                                @if($val['name'] != '')
                                                <tr>
                                                    <td >{{ $val['inopla_username'] }} </td>
                                                    <td >{{ $val['TotalCount'] }}</td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </table>
                                        </td>
                                        <td class="c-table__cell c-table__cell--head no-sort">
                                            <table class="" id="">
                                                @if(count($yearCallSentMail) == 1)
                                                <td colspan="3" >No record Found</td>
                                                @endif
                                                @foreach($yearCallSentMail as $row => $val)
                                                @if($val['name'] != '')
                                                <tr>
                                                    <td colspan="2" >{{ $val['name'] . $val['company_name'] }} </td>
                                                    <td >{{ $val['TotalCount'] }}</td>
                                                <tr>
                                                    @endif
                                                    @endforeach
                                            </table>
                                        </td>
                                        <td class="c-table__cell c-table__cell--head no-sort">
                                            <table class="" id="">
                                                @if(count($yearCallNotSentMail) == 1)
                                                <td colspan="2" class="c-table__cell no-record">No record Found</td>
                                                @endif
                                                @foreach($yearCallNotSentMail as $row => $val)
                                                @if($val['name'] != '')
                                                <tr>
                                                    <td >{{ $val['name'] . $val['company_name'] }} </td>
                                                    <td >{{ $val['TotalCount'] }}</td>
                                                </tr>
                                                @endif
                                                @endforeach 
                                            </table>
                                        </td>
                                        <td class="c-table__cell c-table__cell--head no-sort">
                                            <table class="" id="">
                                                @foreach($yearCallStatics as $row => $val)
                                                @if($val['name'] != '')
                                                <tr class="">
                                                    <td >{{ $val['name'] }} </td>
                                                    <td >{{ $val['TotalCount'] }}</td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- // .col-12 -->
                    </div>


                </div>
            </div>

        </div><!-- // .col-12 -->
    </div>
</div><!-- // .container -->
<style>
    input.has-error {
        border-color: red;
    }
</style>
@endsection
