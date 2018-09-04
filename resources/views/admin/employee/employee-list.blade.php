@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <div c-table-responsive>

                <div class="col-lg-12">Employee
                    <form action="{{route('employee-add')}}" method="post" name="addEmployee" id="addEmployee">
                        <div class="left">
                            <input class="c-btn c-btn--info c-btn--fullwidth" value="Add New Employee" type="submit">
                            <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 

                        </div>
                    </form>
                </div>
                <br>
                <br>
                <table class="c-table" id="datatable">
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

                    <thead class="c-table__head c-table__head--slim" style="background: black; color: white; font-weight: bold;">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">First Name&nbsp;&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Last name&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Job Title&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Responsibility&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Email&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Julian</td>
                            <td>Thomas</td>
                            <td>Gesstet</td>
                            <td>Neukender</td>
                            <td>dd</td>
                            <td>Action</td>


                        </tr>
                        <tr>
                            <td>Julian</td>
                            <td>Thomas</td>
                            <td>Gesstet</td>
                            <td>Neukender</td>
                            <td>dd</td>
                            <td>Action</td>

                        </tr>
                    </tbody>
                </table>
            </div><!-- // .col-12 -->
        </div>
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
    tr:nth-child(even) {
        background-color: #f2f2f2
    }
    .left {
        float: right;
    }
</style>

@endsection
