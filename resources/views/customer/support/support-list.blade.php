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
                             <label>Supports List</label>
                             <div class=" col-lg-offset-7 col-lg-7">
                                 <div class="c-field u-mb-small"></div>
                             </div>
                            <div class="right">
                                    <a href="{{route('customer-add-support')}}" class="c-btn c-btn--info">Support Module Message Add</a>
                            </div>
                        </div>
                    </caption>
                    

                    <thead class="c-table__head c-table__head--slim" style="">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head" style="">Ticket ID &nbsp;&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Reasion &nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head" style="width: 50px; !important">Message &nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Status &nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('employee.action') }}</th>
                        </tr>
                    </thead>
                    <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                    <tbody>
                        @foreach($supportArr as $row => $val)
                        @php
                        $MessageW = wordwrap($val['note'], 100, "\n", true);
                        $MessageW = htmlentities($MessageW);
                        $MessageW = nl2br($MessageW);
                        @endphp
                        <tr class="c-table__row">
                            <td class="c-table__cell">{{ $val['id'] }}</td>
                            <td class="c-table__cell">{{ $support_message[$val['support_id']] }}</td>
                            <td class="c-table__cell" style="width: 50px;">{!!  $MessageW !!}</td>
                            <td class="c-table__cell"><span class="c-badge c-badge--small c-badge--success">Responded</span> </td>
                            <td class="c-table__cell"> <a href="javascript:;"> 
                                <span class="c-badge c-badge--secondary btnPopup"> Responds</span> </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- // .col-12 -->
        </div>
    </div>
</div>

<div class="c-modal c-modal--huge modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content modal-content">
                <a class="c-modal__close c-modal__close--absolute u-text-mute u-opacity-medium" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </a>
                <div class="c-modal__body" >
                    <div class="o-page">
                        @include('customer.support.support-popup')
                    </div>
                </div>
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

    .c-table__title .c-tooltip{
        position: absolute;
    }

</style>
@endsection
