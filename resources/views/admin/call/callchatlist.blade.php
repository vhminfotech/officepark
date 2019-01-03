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
                        Support Calls
                        <br/>
                    </caption>

                    <thead class="c-table__head c-table__head--slim">
                       <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head no-sort">information</th>
                            <th class="c-table__cell c-table__cell--head no-sort">customer number</th>
                            <th class="c-table__cell c-table__cell--head no-sort">notes</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Response</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($supportArr as $row => $val)
                        <tr class="c-table__row hide">
                            <td class="c-table__cell">{{ $responsibility[$val['information']] }}</td>
                            <td class="c-table__cell">{{ $val['customer_number'] }}</td>
                            <td class="c-table__cell">{{ $val['notes'] }}</td>
                            <td class="c-table__cell">
                               @if($val['close_chat'] == '1')
                                     <span class="c-badge c-badge--primary">Closed </span> 
                                @else
                                    @if( $val['admin_response_status'] =='0')
                                        <span class="c-badge c-badge--small c-badge--danger">Pending </span> 
                                    @else
                                        <span class="c-badge c-badge--small c-badge--success">Responded</span>
                                    @endif
                                @endif
                               </td> 
                            <td class="c-table__cell">
                                <a href="javascript:;"  class=" btnPopup c-tooltip c-tooltip--top"  aria-label="View" data-id="{{ $val['id'] }}">
                                        <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('callchat',$val['id'])}}"  class=" c-tooltip c-tooltip--top"  aria-label="View Chat" data-id="{{ $val['id'] }}">
                                    <i class="fa fa-weixin" ></i> 
                                </a> 
                                @if($val['close_chat'] == '0')
                                <a href="javascript:;"  class="   c-tooltip c-tooltip--top"  aria-label="close chat" >
                                    <span data-token="{{ csrf_token() }}" class="closechat c-tooltip c-tooltip--top" data-id="{{ $val['id'] }}" data-toggle="modal" data-target="#closechat" aria-label="Close Chat">
                                    <i class="fa fa-times" ></i></span>
                                </a>  @else
                                <a href="javascript:;"  class="   c-tooltip c-tooltip--top"  aria-label="closed chat" >
                                    <i class="fa fa-check" ></i>
                                </a>
                                @endif
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- // .col-12 -->
        </div>
    </div>

</div>
</div><!-- // .container -->
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
<div class="c-modal c-modal--huge modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content modal-content">
                <a class="c-modal__close c-modal__close--absolute u-text-mute u-opacity-medium" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </a>
                <div class="c-modal__body" >
                    <div class="o-page putHtml">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="c-modal modal fade" id="closechat" tabindex="-1" role="dialog" aria-labelledby="standard-modal" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">
                <div class="c-modal__header">
                    <h3 class="c-modal__title">Are you sure to close chat ?</h3>
                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>
                <div class="c-modal__body">
                    <p>Are you sure to close chat ?</p>
                </div>
                <div class="c-modal__footer">
                    <button class="c-btn c-btn--info pull-right" data-dismiss="modal">{{ trans('op_system_user.cancel')}}</button>
                    <button class="c-btn c-btn--danger yes-sure-close-chat"><i class="fa fa-trash-o u-mr-xsmall "></i> Close Chat</button>
                </div>
            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div>
@endsection
