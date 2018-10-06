@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <div c-table-responsive>
                <div class="c-table table-responsive">
                    <table class="" id="ManageEmployerList">
                        <thead class="c-table__head c-table__head--slim">
                            <tr class="c-table__row">
                                <th><input class="checkAll" type="checkbox"></th>
                                <th class="c-table__cell c-table__cell--head">Id &nbsp;&nbsp;</th>
                                <th class="c-table__cell c-table__cell--head">Date/Time</th>
                                <th class="c-table__cell c-table__cell--head">Agent</th>
                                <th class="c-table__cell c-table__cell--head">Customer</th>
                                <th class="c-table__cell c-table__cell--head">Notiz</th>
                                <th class="c-table__cell c-table__cell--head">Mail Notification</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>

<!--                <table class="c-table table-responsive" id="datatable">
    <caption class="c-table__title">
        Call List <br/>
        <div class="c-stage__panel u-p-medium">
            <div class="row">
                <label>Filter</label>
                <div class="col-lg-2">
                    <div class="c-field u-mb-small">
                        <select class="c-select form-control filter selectCustomer" id="select2">
                            <option value=''>Select Customer</option>
                            @for($i = 0; $i < count($getCustomer);$i++)
                            <option value="{{ $getCustomer[$i]->customer_number }}">{{ $getCustomer[$i]->name }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="c-field u-mb-small">
                        <select class="c-select form-control filter selectAgent" id="selectAgent">
                            <option value=''>Select Agent</option>
                            @for($i = 0; $i < count($getCustomer);$i++)
                            <option value="{{ $getCustomer[$i]->customer_number }}">{{ $getCustomer[$i]->name }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="c-field u-mb-small">
                        <select class="c-select filter month" name="month" id="month">
                            <option value=''>Select Month</option>
                            <option value='01' {{ ($month == '01' ? 'selected="selected"' : '') }}>January</option>
                            <option value='02' {{ ($month == '02' ? 'selected="selected"' : '') }}>February</option>
                            <option value='03' {{ ($month == '03' ? 'selected="selected"' : '') }}>March</option>
                            <option value='04' {{ ($month == '04' ? 'selected="selected"' : '') }}>April</option>
                            <option value='05' {{ ($month == '05' ? 'selected="selected"' : '') }}>May</option>
                            <option value='06' {{ ($month == '06' ? 'selected="selected"' : '') }}>June</option>
                            <option value='07' {{ ($month == '07' ? 'selected="selected"' : '') }}>July</option>
                            <option value='08' {{ ($month == '08' ? 'selected="selected"' : '') }}>August</option>
                            <option value='09' {{ ($month == '09' ? 'selected="selected"' : '') }}>September</option>
                            <option value='10' {{ ($month == '10' ? 'selected="selected"' : '') }}>October</option>
                            <option value='11' {{ ($month == '11' ? 'selected="selected"' : '') }}>November</option>
                            <option value='12' {{ ($month == '12' ? 'selected="selected"' : '') }}>December</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="c-field u-mb-small">
                        <select class="c-select filter year" id="year" name="year">
                            @for($i=date('Y'); $i<=2050; $i++)
                            <option {{ ($year == $i ? 'selected="selected"' : '') }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="c-field u-mb-small">
                        {{ Form::text('searchString', null, array('class' => 'c-input filter searchString' ,'id'=>'searchString','placeholder' => 'Enter value' ,'required')) }}
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </caption>

    <thead class="c-table__head c-table__head--slim">
        <tr class="c-table__row">
            <th class="c-table__cell c-table__cell--head no-sort"><input class="checkAll" type="checkbox"></th>
            <th class="c-table__cell c-table__cell--head no-sort">Id</th>
            <th class="c-table__cell c-table__cell--head no-sort">Date/Time</th>
            <th class="c-table__cell c-table__cell--head no-sort">Agent</th>
            <th class="c-table__cell c-table__cell--head no-sort">Customer</th>
            <th class="c-table__cell c-table__cell--head no-sort">Notiz</th>
            <th colspan="" class="c-table__cell c-table__cell--head no-sort">Mail Notification</th>
            <th colspan="" class="c-table__cell c-table__cell--head no-sort"></th>
        </tr>
    </thead>
    <tbody>
        @php
        $count = 1;
        @endphp
        @for($i = 0 ;$i < count($getCall);$i++)
        <tr class="c-table__row hide{{ $getCall[$i]->id }}">
            <td class="c-table__cell"><input class="changeStatus" type="checkbox"></td>
            <td class="c-table__cell">{{ $getCall[$i]->id }}</td>
            <td class="c-table__cell">{{ date('d-m-Y h:i:s',strtotime($getCall[$i]->date_time)) }}</td>
            <td class="c-table__cell">{{ empty($getCall[$i]->agentName) ? 'N/A' : $getCall[$i]->agentName }}</td>
            <td class="c-table__cell">{{ empty($getCall[$i]->customerName) ? 'N/A' : $getCall[$i]->customerName }}</td>
            <td class="c-table__cell"></td>
            <td class="c-table__cell">
                @if($getCall[$i]->sent_mail == 1)
                Sent
                @else
                Not Sent
                @endif
            </td>
            <td class="c-table__cell">
                @if($getCall[$i]->sent_mail == 1)
                <div class="col u-mb-medium">
                    <a  data-toggle="modal" data-target="#modal8" data-name='{{ $getCall[$i]->first_and_last_name }}' data-id='{{ $getCall[$i]->id }}' class="c-btn c-btn--secondary sentEmailBtn" href="javascript:;">
                        <i class="fa fa-envelope-o u-mr-xsmall"></i>Sent mail again</a>
                </div>
                @else
                <div class="col u-mb-medium">
                    <a data-toggle="modal" data-target="#modal8" data-name='{{ $getCall[$i]->first_and_last_name }}' data-id='{{ $getCall[$i]->id }}'  class="c-btn c-btn--info sentEmailBtn" href="javascript:;">
                        <i class="fa fa-envelope-o u-mr-xsmall"></i>Sent mail
                    </a>
                </div>
                @endif
            </td>
        </tr>
        @endfor
    </tbody>
</table>-->
            </div><!-- // .col-12 -->


        </div>
    </div>
    <!-- Modal -->
    <div class="c-modal c-modal--small modal fade" id="modal8" tabindex="-1" role="dialog" aria-labelledby="modal8" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">

                <div class="c-modal__header">
                    <h3 class="c-modal__title">Sent mail</h3>
                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>
                <div class="c-modal__subheader">
                    <p>Customer First and Last Name : <span class="first_last_name"></span></p>
                </div>
                <div class="c-modal__body">
                    <form action="{{ route('send-email') }}" method="post" class=" u-mb-small send_email" id="send_email" style="">
                        <div class="c-field u-mb-xsmall">
                            <label class="c-field__label" for="input-project">Gender</label>
                            <select class="c-select" name="gender" id="gender">
                                @foreach ($gender as $indexkey=>$val)
                                <option value="{{$indexkey}}">{{$val}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
                        <input type="hidden" name="editId" id="editId" class="editId" value=""> 
                        <div class="c-field u-mb-xsmall">
                            <label class="c-field__label" for="input-project">First And Last Name</label>
                            <input type="text" name="first_last_name" class="c-input first_last_name" id="first_last_name" placeholder="First And Last Name">
                        </div>
                        <div class="c-field u-mb-xsmall">
                            <label class="c-field__label" for="input-project">Caller Email</label>
                            <input type="email" name="caller_email" class="c-input caller_email" id="caller_email" placeholder="caller Email">
                        </div>
                        <div class="c-field u-mb-xsmall">
                            <label class="c-field__label" for="input-project">telephone number</label>
                            <input type="text" name="telephone_number" class="c-input telephone_number" id="telephone_number" placeholder="telephone number">
                        </div>
                        <div class="c-field u-mb-xsmall">
                            <label class="c-field__label" for="input-project">Caller Notes</label>
                            <textarea name="caller_note" class="c-input" id="caller_note" placeholder="Caller Notes"></textarea>
                        </div>
                        <div class="c-modal__footer u-justify-center">
                            <input type="submit" name="submit" class="c-btn c-btn--success" value="Send E-mail">
                        </div>
                    </form>
                </div>



            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->
</div>

<style>
    a.c-board__btn.c-tooltip.c-tooltip--top {
        position: absolute;
        margin-left: 743px;
        margin-bottom: 41px;
    }
    thead {
        height: 22px !important;       /* Just for the demo          */
        overflow-y: auto !important;    /* Trigger vertical scroll    */
        overflow-x: hidden !important;  /* Hide the horizontal scroll */
    }
</style>

@endsection
