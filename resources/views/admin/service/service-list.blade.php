@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <div c-table-responsive>

                <div class="col-lg-12">
                    <form action="{{route('service-add')}}" method="post" name="addService" id="addService">
                        <div class="left">
                            <input class="c-btn c-btn--info c-btn--fullwidth" value="Create Package" type="submit">
                            <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 

                        </div>
                        <div class="col-lg-3 left">
                            <div class="left c-field u-mb-medium">  
                                <select class="c-select" id="select1">
                                    <option>Website Select</option>
                                    <option>First</option>
                                    <option>Second</option>
                                    <option>Third</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <br>
                <br>
                <table class="c-table" id="datatable">
                    <caption class="c-table__title">
                        <div class="c-stage__panel u-p-small">
                            <div class="row">
                                <label><h5>Service</h5></label>
                            </div>
                        </div>
                    </caption>

                    <thead class="c-table__head c-table__head--slim">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">ID</th>
                            <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">Website&nbsp;&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Packagname&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Category&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>www.uzaktansekreter.de</td>
                            <td>Business</td>
                            <td>Phone Service</td>
                            <td class="c-table__cell">
                                <a href=""><span class="c-tooltip c-tooltip--top"  aria-label="Edit">
                                    <i class="fa fa-edit" ></i></span>
                                </a>
                                 <a href="javascript:;" class="delete" data-token="{{ csrf_token() }}" data-id=""><span class="c-tooltip c-tooltip--top" data-toggle="modal" data-target="#deleteModel" aria-label="Delete">
                                    <i class="fa fa-trash-o" ></i></span>
                                </a>
                            </td>
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
