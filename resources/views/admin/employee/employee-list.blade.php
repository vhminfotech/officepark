@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <div c-table-responsive>
                <table class="c-table table-responsive" id="datatable">
                    <div class="col-lg-3"><h2>Employee</h2></div>
                    <div class="col-lg-3 left">
                        <a href="{{route('employee-add')}}" class="c-btn c-btn--info" style="margin-top: -75px;" >Add New Employee</a>
                    </div>
                    <br>
                    <caption class="c-table__title">
                        <div class="c-stage__panel u-p-small">
                            <div class="row">
                                <label><h5>Show</h5></label>
                                <div class="col-lg-2">
                                    <div class="c-field u-mb-small">
                                        <select class="c-select">
                                            <option value=''>Select</option>
                                            <option value='10'>10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2"><h5>Entryies</h5></div>
                                <div class="col-lg-3"></div>
                                <label><h5>Search</h5></label>
                                <div class="col-lg-3">
                                    <div class="c-field u-mb-small">
                                        <input class="c-input" name="search" id="search" placeholder="search" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </caption>

                    <thead class="c-table__head c-table__head--slim" style="">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head" style="">First Name&nbsp;&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Last name&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Job Title&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Responsibility&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Email&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 0 ;$i < count($employeeList);$i++)
                        <tr class="c-table__row">
                            <td class="c-table__cell">{{ $employeeList[$i]['first_name'] }}</td>
                            <td class="c-table__cell">{{ $employeeList[$i]['last_name'] }}</td>
                            <td class="c-table__cell">{{ $job_title[$employeeList[$i]['job_title']] }}</td>
                            <td class="c-table__cell">{{ $responsibility[$employeeList[$i]['responsibility']] }}</td>
                            <td class="c-table__cell">{{ $employeeList[$i]['email'] }}</td>
                             <td class="c-table__cell">
                                <a href=" {{ route('employee-edit',$employeeList[$i]['id'])}} "><span class="c-tooltip c-tooltip--top"  aria-label="Edit">
                                        <i class="fa fa-edit" ></i></span>
                                </a>
                                <a href="javascript:;" class="delete"  data-id="{{ $employeeList[$i]['id'] }}"><span class="c-tooltip c-tooltip--top" data-toggle="modal" data-target="#deleteModel" aria-label="Delete">
                                        <i class="fa fa-trash-o"></i></span>
                                </a>
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
</style>
@endsection
