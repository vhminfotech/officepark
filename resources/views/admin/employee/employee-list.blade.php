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
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-3">
                                    Employee
                                    </div>
                                    
                                    <div class="col-lg-6 ">
                                        <select class="c-select" name='fillter' id='fillter'>
                                            <option value=""><b>Select Customer</b></option>
                                            @for($i = 0; $i < count($employeeCusList);$i++)
                                            <option @if($userName == $employeeCusList[$i]->customer_number) {{ 'selected="selected"'}} @endif value="{{$employeeCusList[$i]->customer_number}}"><b>{{$employeeCusList[$i]->customer_number}}</b></option>
                                            @endfor
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-lg-6">

                                <div class="left">
                                    <a href="{{route('employee-add')}}" class="c-btn c-btn--info" >Add New Employee</a>

                                </div>


                            </div>
                        </div>
                    </caption>
                    

                    <thead class="c-table__head c-table__head--slim" style="">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head" style="">Customer Number&nbsp;&nbsp;&nbsp;</th>
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
                            <td class="c-table__cell">{{ $employeeList[$i]->customer_number }}</td>
                            <td class="c-table__cell">{{ $employeeList[$i]->first_name }}</td>
                            <td class="c-table__cell">{{ $employeeList[$i]->last_name }}</td>
                            <td class="c-table__cell">{{ $job_title[$employeeList[$i]->job_title] }}</td>
                            <td class="c-table__cell">{{ $responsibility[$employeeList[$i]->responsibility] }}</td>
                            <td class="c-table__cell">{{ $employeeList[$i]->email }}</td>
                            <td class="c-table__cell">
                                <a href=" {{ route('employee-edit',$employeeList[$i]->id)}} "><span class="c-tooltip c-tooltip--top"  aria-label="Edit">
                                        <i class="fa fa-edit" ></i></span>
                                </a>
                                <a href="javascript:;" class="delete"  data-id="{{ $employeeList[$i]->id }}"><span class="c-tooltip c-tooltip--top" data-toggle="modal" data-target="#deleteModel" aria-label="Delete">
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
