@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<style>
    .c-table {
        display: table !important;
        width: 100% !important;
        max-width: 100% !important;
        word-wrap: break-word !important;
        border: 1px solid #f5f8fa;
        margin-top: 10px;
    }
    .c-table__cell {
        padding: 15px 0 15px 15px;
        color: #354052;
        font-size: .875rem;
        font-weight: 500;
        text-align: left;
        vertical-align: middle;
        white-space: unset !important;
    }
    .c-table-full-width {
        width: 100% !important;
    }
    .c-table__head--slim .c-table__cell {
        padding: 10px 0 10px 15px;
    }
    .c-table__cell:last-child {
        padding-right: 0.75rem;
        width: 20%;
    }

</style>
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <div class="c-stage__header o-media u-justify-start">
                <h2 class="u-mb-zero">System Mails </h2>  
            </div>

            <div c-table-responsive> 
                <div class="c-card1 u-p-medium u-mb-small">
                    <div class="row">
                        <div class="col-md-3">
                            <h3>Today</h3>
                            <table class="c-table" id="">
                                <thead class="c-table__head--slim">
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell " style="">Calls</td>
                                        <td class="c-table__cell" style="">{{ $todayCalls['finalTotal'] }}</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($todayCalls) == 1)
                                    <tr class="c-table__row">
                                        <td colspan="3" class="c-table__cell no-record">No record Found</td>
                                    </tr>
                                    @endif
                                    @foreach($todayCalls as $row => $val)
                                    @if($val['name'] != '')
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell ">{{ $val['inopla_username'] }} </td>
                                        <td class="c-table__cell">{{ $val['TotalCount'] }}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                        <div class="col-md-3">
                            <h3>Week</h3>
                            <table class="c-table" id="">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th colspan="2" class="c-table__cell " style="">Calls</th>
                                        <th class="c-table__cell" style="">{{ $weekCalls['finalTotal'] }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($weekCalls) == 1)
                                    <tr class="c-table__row">
                                        <td colspan="3" class="c-table__cell no-record">No record Found</td>
                                    </tr>
                                    @endif
                                    @foreach($weekCalls as $row => $val)
                                    @if($val['name'] != '')
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell ">{{ $val['inopla_username'] }} </td>
                                        <td class="c-table__cell">{{ $val['TotalCount'] }}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="col-md-3">
                            <h3>Months</h3>
                            <table class="c-table" id="">

                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th colspan="2" class="c-table__cell " style="">Calls</th>
                                        <th class="c-table__cell" style="">{{ $monthCalls['finalTotal'] }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($monthCalls) == 1)
                                    <tr class="c-table__row">
                                        <td colspan="3" class="c-table__cell no-record">No record Found</td>
                                    </tr>
                                    @endif
                                    @foreach($monthCalls as $row => $val)
                                    @if($val['name'] != '')
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell ">{{ $val['inopla_username'] }} </td>
                                        <td class="c-table__cell">{{ $val['TotalCount'] }}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>

                            </table>


                        </div>
                        <div class="col-md-3">
                            <h3>Years</h3>
                            <table class="c-table" id="">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th colspan="2" class="c-table__cell " style="">Calls</th>
                                        <th class="c-table__cell" style="">{{ $yearCalls['finalTotal'] }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($yearCalls) == 1)
                                    <tr class="c-table__row">
                                        <td colspan="3" class="c-table__cell no-record">No record Found</td>
                                    </tr>
                                    @endif
                                    @foreach($yearCalls as $row => $val)
                                    @if($val['name'] != '')
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell ">{{ $val['inopla_username'] }} </td>
                                        <td class="c-table__cell">{{ $val['TotalCount'] }}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <table class="c-table" id="">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th colspan="2" class="c-table__cell " style="">Sent Mail</th>
                                        <th class="c-table__cell" style="">{{ $todayCallSentMail['finalTotal'] }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($todayCallSentMail) == 1)
                                    <tr class="c-table__row">
                                        <td colspan="3" class="c-table__cell no-record">No record Found</td>
                                    </tr>
                                    @endif
                                    @foreach($todayCallSentMail as $row => $val)
                                    @if($val['name'] != '')
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell ">{{ $val['inopla_username'] }} </td>
                                        <td class="c-table__cell">{{ $val['TotalCount'] }}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="c-table" id="">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th colspan="2" class="c-table__cell " style="">Sent Mail</th>
                                        <th class="c-table__cell" style="">{{ $weekCallSentMail['finalTotal'] }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($weekCallSentMail) == 1)
                                    <tr class="c-table__row">
                                        <td colspan="3" class="c-table__cell no-record">No record Found</td>
                                    </tr>
                                    @endif
                                    @foreach($weekCallSentMail as $row => $val)
                                    @if($val['name'] != '')
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell ">{{ $val['name'] . $val['company_name'] }} </td>
                                        <td class="c-table__cell">{{ $val['TotalCount'] }}</td>
                                    </tr>
                                    @endif
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="c-table" id="">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th colspan="2" class="c-table__cell " style="">Sent Mail</th>
                                        <th class="c-table__cell" style="">{{ $monthCallSentMail['finalTotal'] }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($monthCallSentMail) == 1)
                                    <tr class="c-table__row">
                                        <td colspan="3" class="c-table__cell no-record">No record Found</td>
                                    </tr>
                                    @endif
                                    @foreach($monthCallSentMail as $row => $val)
                                    @if($val['name'] != '')
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell ">{{ $val['name'] . $val['company_name'] }} </td>
                                        <td class="c-table__cell">{{ $val['TotalCount'] }}</td>
                                    </tr>
                                    @endif
                                    @endforeach   
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="c-table" id="">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th colspan="2" class="c-table__cell " style="">Sent Mail</th>
                                        <th class="c-table__cell" style="">{{ $yearCallSentMail['finalTotal'] }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($yearCallSentMail) == 1)
                                    <tr class="c-table__row">
                                        <td colspan="3" class="c-table__cell no-record">No record Found</td>
                                    </tr>
                                    @endif
                                    @foreach($yearCallSentMail as $row => $val)
                                    @if($val['name'] != '')
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell ">{{ $val['name'] . $val['company_name'] }} </td>
                                        <td class="c-table__cell">{{ $val['TotalCount'] }}</td>
                                    </tr>
                                    @endif
                                    @endforeach    
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <table class="c-table" id="">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th colspan="2" class="c-table__cell " style="">Not Sent Mails</th>
                                        <th class="c-table__cell" style="">{{ $todayCallNotSentMail['finalTotal'] }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($todayCallNotSentMail) == 1)
                                    <tr class="c-table__row">
                                        <td colspan="3" class="c-table__cell no-record">No record Found</td>
                                    </tr>
                                    @endif
                                    @foreach($todayCallNotSentMail as $row => $val)
                                    @if($val['name'] != '')
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell ">{{ $val['name'] . $val['company_name'] }} </td>
                                        <td class="c-table__cell">{{ $val['TotalCount'] }}</td>
                                    </tr>
                                    @endif
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="c-table" id="">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th colspan="2" class="c-table__cell " style="">Not Sent Mails</th>
                                        <th class="c-table__cell" style="">{{ $weekCallNotSentMail['finalTotal'] }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($weekCallNotSentMail) == 1)
                                    <tr class="c-table__row">
                                        <td colspan="3" class="c-table__cell no-record">No record Found</td>
                                    </tr>
                                    @endif
                                    @foreach($weekCallNotSentMail as $row => $val)
                                    @if($val['name'] != '')
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell ">{{ $val['name'] . $val['company_name'] }} </td>
                                        <td class="c-table__cell">{{ $val['TotalCount'] }}</td>
                                    </tr>
                                    @endif
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="c-table" id="">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th colspan="2" class="c-table__cell " style="">Not Sent Mails</th>
                                        <th class="c-table__cell" style="">{{ $monthCallNotSentMail['finalTotal'] }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($monthCallNotSentMail) == 1)
                                    <tr class="c-table__row">
                                        <td colspan="3" class="c-table__cell no-record">No record Found</td>
                                    </tr>
                                    @endif
                                    @foreach($monthCallNotSentMail as $row => $val)
                                    @if($val['name'] != '')
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell ">{{ $val['name'] . $val['company_name'] }} </td>
                                        <td class="c-table__cell">{{ $val['TotalCount'] }}</td>
                                    </tr>
                                    @endif
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="c-table" id="">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th colspan="2" class="c-table__cell " style="">Not Sent Mails</th>

                                        <th class="c-table__cell" style="">{{ $yearCallNotSentMail['finalTotal'] }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($yearCallNotSentMail) == 1)
                                    <tr class="c-table__row">
                                        <td colspan="3" class="c-table__cell no-record">No record Found</td>
                                    </tr>
                                    @endif
                                    @foreach($yearCallNotSentMail as $row => $val)
                                    @if($val['name'] != '')
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell ">{{ $val['name'] . $val['company_name'] }} </td>
                                        <td class="c-table__cell">{{ $val['TotalCount'] }}</td>
                                    </tr>
                                    @endif
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <table class="c-table" id="">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th colspan="2" class="c-table__cell " style="">Agent Statistics</th>
                                        <th class="c-table__cell" style="">{{ $todayCallStatics['finalTotal'] }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($todayCallStatics) == 1)
                                    <tr class="c-table__row">
                                        <td colspan="3" class="c-table__cell no-record">No record Found</td>
                                    </tr>
                                    @endif
                                    @foreach($todayCallStatics as $row => $val)
                                    @if($val['name'] != '')
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell ">{{ $val['name'] }} </td>
                                        <td class="c-table__cell">{{ $val['TotalCount'] }}</td>
                                    </tr>
                                    @endif
                                    @endforeach 
                                </tbody>
                            </table>


                        </div>
                        <div class="col-md-3">
                            <table class="c-table" id="">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th colspan="2" class="c-table__cell " style="">Agent Statistics</th>
                                        <th class="c-table__cell" style="">{{ $weekCallStatics['finalTotal'] }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($weekCallStatics) == 1)
                                    <tr class="c-table__row">
                                        <td colspan="3" class="c-table__cell no-record">No record Found</td>
                                    </tr>
                                    @endif
                                    @foreach($weekCallStatics as $row => $val)
                                    @if($val['name'] != '')
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell ">{{ $val['name'] }} </td>
                                        <td class="c-table__cell">{{ $val['TotalCount'] }}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="col-md-3">
                            <table class="c-table" id="">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th colspan="2" class="c-table__cell " style="">Agent Statistics</th>
                                        <th class="c-table__cell" style="">{{ $monthCallStatics['finalTotal'] }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($monthCallStatics) == 1)
                                    <tr class="c-table__row">
                                        <td colspan="3" class="c-table__cell no-record">No record Found</td>
                                    </tr>
                                    @endif
                                    @foreach($monthCallStatics as $row => $val)
                                    @if($val['name'] != '')
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell ">{{ $val['name'] }} </td>
                                        <td class="c-table__cell">{{ $val['TotalCount'] }}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                        <div class="col-md-3">
                            <table class="c-table" id="">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th colspan="2" class="c-table__cell " style="">Agent Statistics</th>
                                        <th class="c-table__cell" style="">{{ $yearCallStatics['finalTotal'] }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($yearCallStatics as $row => $val)
                                    @if($val['name'] != '')
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell ">{{ $val['name'] }} </td>
                                        <td class="c-table__cell">{{ $val['TotalCount'] }}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <div c-table-responsive>                
                <table class="c-table c-table-full-width" id="datatable" style="width: 100% !important;max-width: 100% !important;">
                    <caption class="c-table__title">
                        <div class="c-stage__panel ">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="c-field u-mb-small">
                                        <select class="c-select form-control" id="select1">
                                            <option>Date & Time</option>
                                            <option>5:20 20:20:20</option>
                                            <option>8:50 10:20:20</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="c-field u-mb-small">
                                        <select class="c-select">
                                            <option value=''>Customer</option>
                                            <option value=''>aheemad</option>
                                            <option value=''>jecllin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="c-field u-mb-small">
                                        <select class="c-select">
                                            <option>Agent</option>
                                            <option>mustafir</option>
                                            <option>shehjad</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </caption>

                    <thead class="c-table__head c-table__head--slim">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">Date / Time</th>
                            <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">Caller</th>
                            <th class="c-table__cell c-table__cell--head">Agent</th>
                            <th class="c-table__cell c-table__cell--head">Customer</th>
                            <th class="c-table__cell c-table__cell--head">Information</th>
                            <th class="c-table__cell c-table__cell--head">Mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getSystemMailList as $row => $val)
                        <tr>
                            <td class="c-table__cell">{{ date('d.m.Y h:i:s',strtotime($val['date_time'])) }}</td>
                            <td class="c-table__cell">{{ $val['caller'] }}</td>
                            <td class="c-table__cell">{{ $val['agentName'] }}</td>
                            <td class="c-table__cell">{{ $val['customerName'] }}</td>
                            <td class="c-table__cell" style="max-width: 20% !important;width: 20% !important;">{{ $val['caller_note'] }}</td>
                            <td class="c-table__cell"><div class="c-choice c-choice--checkbox">
                                    <input class="c-choice__input" id="checkbox1" name="checkboxes" type="checkbox">
                                    <label class="c-choice__label" for="checkbox1">Save</label>
                                </div>
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
    input.has-error {
        border-color: red;
    }
</style>

@endsection