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
                            <th class="c-table__cell c-table__cell--head">Message &nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Status &nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('employee.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 0 ;$i < count($employeeList);$i++)
                        <tr class="c-table__row">
                            <td class="c-table__cell">4521236</td>
                            <td class="c-table__cell">General </td>
                            <td class="c-table__cell">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  </td>
                            <td class="c-table__cell"><span class="c-badge c-badge--small c-badge--success">Responded</span> </td>
                            <td class="c-table__cell"> <a href="javasctript:;"> 
                                <span class="c-badge c-badge--secondary"> Responds</span> </a>
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

    .c-table__title .c-tooltip{
        position: absolute;
    }

</style>
@endsection
