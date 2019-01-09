@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<div class="container">
        @include('customer.call.popUp.popUpModelDash')
    <style>
        #ManageEmployerList td {
            text-align: center;
            }
            table.dataTable thead th, table.dataTable thead td {
                /*padding: 0px 26px;*/
                border-bottom: 1px solid #111111;
            }
            .c-table__cell_head{
                color: #7f8fa4;
                font-size: .875rem;
                font-weight: 500;
            }
         /*   table.dataTable thead .sorting,table.dataTable thead .sorting_desc,table.dataTable thead .sorting_asc{
                background: none;
            }
            .dataTables_scrollBody th{
                display: none;
            }*/
    </style>
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
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="statuss">Welcome Notes</label> 
                                <select name="welcome_note" id="welcome_note" class="status c-select">
                                    @foreach ($welcome_note as $indexkey=>$val)
                                        <option value="{{$indexkey}}" {{ ($indexkey== $statusDetails[0]['welcome_note'] ? 'selected="selected"' : '') }}>{{$val}}</option>
                                    @endforeach
                                </select>
                                
                                
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="message">Your Status</label> 
                                 
                                  <select name="status" id="status" class="message c-select">
                                  @foreach ($unreach_note as $indexkey=>$val)
                                        <option value="{{$indexkey}}" {{ ($indexkey== $statusDetails[0]['unreach_note'] ? 'selected="selected"' : '') }}>{{$val}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="customer_id" value="{{ $customer_id }}">
                   <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="starttime">Call Transfer</label>
                                    <select name="call_transfer" id="call_transfer" class="information c-select">
                                    
                                    @foreach ($reroute_confirm as $indexkey=>$val)
                                        <option value="{{$indexkey}}" {{ ($indexkey== $statusDetails[0]['reroute_confirm'] ? 'selected="selected"' : '') }}>{{$val}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="note">Information</label> 
                                <textarea rows="2"  class="c-input" cols="50" name="information">{{ $statusDetails[0]['note']}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 c-field u-mb-small">
                            <div class="pull-left" >
                                <input class="c-btn c-btn--info left" value="Update Status" type="submit">
                            </div> 
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
                <div class=" table-responsive">
                    <table class="c-table" id="ManageEmployerList" >
                        <thead class="c-table__head c-table__head--slim">
                            <tr class="c-table__row">
                                <!--<th><input class="checkAll" type="checkbox"></th>-->
                                <th class="c-table__cell_head">{{ trans('calls.id')}} </th>
                                <th class="c-table__cell_head">{{ trans('calls.datetime')}}</th>
                                <th class="c-table__cell_head">{{ trans('calls.caller')}}</th>
                                <th class="c-table__cell_head">{{ trans('calls.agent')}}</th>
                                <th class="c-table__cell_head">{{ trans('calls.customer')}}</th>
                                <th class="c-table__cell_head">{{ trans('calls.note')}}</th>
                                <th class="c-table__cell_head">{{ trans('calls.e-mail-notification')}}</th>
                               
                                <!--<th class="c-table__cell_head">Call View</th>-->
                            </tr>
                        </thead>
                    </table>
                </div>
            </div><!-- // .col-12 -->
        </div>
    </div>

       <!-- Modal -->
    <div class="c-modal c-modal--small modal fade" id="modal8" tabindex="-1" role="dialog" aria-labelledby="modal8" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">

                <div class="c-modal__header">
                    <h3 class="c-modal__title">{{ trans('calls.sent-mail')}}</h3>
                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>
                <div class="c-modal__subheader">
                    <p>{{ trans('calls.customer-first-and-last-name') }}: <span class="first_last_name"></span></p>
                </div>
                <div class="c-modal__body">
                    <form action="{{ route('send-email') }}" method="post" class=" u-mb-small send_email" id="send_email" style="">
                        <div class="c-field u-mb-xsmall">
                            <label class="c-field__label" for="input-project">{{ trans('calls.gender')}}</label>
                            <select class="c-select" name="gender" id="gender">
                                @foreach ($gender as $indexkey=>$val)
                                <option value="{{$indexkey}}">{{$val}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
                        <input type="hidden" name="editId" id="editId" class="editId" value=""> 
                        <div class="c-field u-mb-xsmall">
                            <label class="c-field__label" for="input-project">{{ trans('calls.customer-first-and-last-name')}}</label>
                            <input type="text" name="first_last_name" class="c-input first_last_name" id="first_last_name" placeholder="First And Last Name">
                        </div>
                        <div class="c-field u-mb-xsmall">
                            <label class="c-field__label" for="input-project">Caller Email</label>
                            <input type="email" name="caller_email" class="c-input caller_email" id="caller_email" placeholder="caller Email">
                        </div>
                        <div class="c-field u-mb-xsmall">
                            <label class="c-field__label" for="input-project">{{ trans('calls.telephone-number') }}</label>
                            <input type="text" name="telephone_number" class="c-input telephone_number" id="telephone_number" placeholder="telephone number">
                        </div>
                        <div class="c-field u-mb-xsmall">
                            <label class="c-field__label" for="input-project">{{ trans('calls.caller-notes-template') }} <span style="float: right;"><a href="javascript:;" class="addTemplate">+ {{ trans('calls.add-new-template') }}</a></span></label>
                            <select class="c-select" name="template" id="template">
                            </select>
                        </div>
                        <div class="c-field u-mb-xsmall">
                            <label class="c-field__label" for="input-project">{{ trans('calls.caller-notes') }}</label>
                            <textarea name="caller_note" class="c-input" id="caller_note" placeholder="Caller Notes" value=""></textarea>
                        </div>
                        <div class="c-modal__footer u-justify-center">
                            <input type="submit" name="submit" class="c-btn c-btn--success" value="Send E-mail">
                        </div>
                    </form>
                </div>
            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->

    <!-- Modal -->
    <div class="c-modal c-modal--small modal fade" id="templateModel" tabindex="-1" role="dialog" aria-labelledby="modal8" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">

                <div class="c-modal__header">
                    <h3 class="c-modal__title">{{ trans('calls.add-new-template') }}</h3>
                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>

                <div class="c-modal__body">
                    <form action="{{ route('add-template') }}" method="post" class=" u-mb-small addTemlate" id="addTemlate" style="">
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 

                        <div class="c-field u-mb-xsmall">
                            <label class="c-field__label" for="input-project">Enter Message</label>
                            <textarea name="message" class="c-input" id="message" placeholder="Enter Message" value=""></textarea>
                        </div>
                        <div class="c-modal__footer u-justify-center">
                            <input type="submit" name="submit" class="c-btn c-btn--success" value="Add Template">
                        </div>
                    </form>
                </div>
                <div class="c-modal__footer templateList">
                    
                </div>
            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->   
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
    input.has-error {border-color: red;}
    .has-error .select2,.has-error .select2-selection{color: red !important;border-color: red!important;
    }
    .dataTables_info,.paging_simple_numbers{display: none;}
</style>

@endsection
