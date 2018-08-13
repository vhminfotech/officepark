@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <div c-table-responsive>
                <table class="c-table" id="datatable">
                    <caption class="c-table__title">
                        Order List  
<!--                        <a href="{{ route('add-user') }}" class="c-board__btn c-tooltip c-tooltip--top" aria-label="Add Customer/Client">
                            <i class="fa fa-plus"></i>
                        </a>-->
                    </caption>
                    <thead class="c-table__head c-table__head--slim">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">ID&nbsp;&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Company name&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Company type&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Company info&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Fullname&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">DOB&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Address&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count = 1;
                        @endphp
                        @for($i = 0 ;$i < count($arrOrder);$i++,$count++)
                        <tr class="c-table__row">
                            <td class="c-table__cell">{{ $count }}</td>
                            <td class="c-table__cell">{{ $arrOrder[$i]->company_name }}</td>
                            <td class="c-table__cell">{{ $arrOrder[$i]->company_type }}</td>
                            <td class="c-table__cell">{{ $arrOrder[$i]->company_info }}</td>
                            <td class="c-table__cell">{{ $arrOrder[$i]->fullname }}</td>
                            <td class="c-table__cell">{{ date('d-m-Y',strtotime($arrOrder[$i]->date_of_birth)) }}</td>
                            <td class="c-table__cell">{{ $arrOrder[$i]->address }}</td>
                            <td class="c-table__cell">
                                <a href="{{ route('view-order',[$arrOrder[$i]->id])}} "><span class="c-tooltip c-tooltip--top"  aria-label="Edit">
                                        <i class="fa fa-eye" ></i></span>
                                </a>
<!--                                <a href="javascript:;" class="delete"  data-id="{{ $arrOrder[$i]->id }}"><span class="c-tooltip c-tooltip--top" data-toggle="modal" data-target="#deleteModel" aria-label="Delete">
                                        <i class="fa fa-trash-o" ></i></span>
                                </a>-->
                            </td>
                        </tr>
                        @endfor
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
</style>

@endsection
