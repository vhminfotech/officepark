@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <div c-table-responsive>
                <table class="c-table" id="datatable">
                    <caption class="c-table__title">Website Panel List
                        <a class="c-table__title-action c-tooltip c-tooltip--top" href="{{ route('panel-setting-add') }}" aria-label="Add Panel Setting">
                            <i class="fa fa-plus"></i>
                        </a>
                    </caption>
                    <thead class="c-table__head c-table__head--slim">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head">Web Site &nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Logo &nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Sidebar Menu Color &nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Colors &nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Hover Colors &nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.action')}}</th>
                        </tr>
                    </thead>
                     <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
                    <tbody>
                        @foreach($panelList as $row => $val)
                        <tr class="c-table__row">
                           <td class="c-table__cell">{{ $val['website_name'] }}</td>
                           <td class="c-table__cell"><img class="c-avatar__img" src="{{ url('uploads/panel_logo/'. $val['website_logo']) }}" width="50px;" alt="Panel Logo"></td>
                            <td class="c-table__cell">{{ $val['sidebar_menu_color'] }}</td>
                            <td class="c-table__cell">{{ $val['color'] }}</td>
                            <td class="c-table__cell">{{ $val['hovercolor'] }}</td>
                            <td class="c-table__cell">
                            <a href="{{ route('panel-setting-edit', [$val['id']] ) }}"><span class="c-tooltip c-tooltip--top"  aria-label="{{ trans('customer.edit')}}">
                                <i class="fa fa-edit" ></i></span>
                            </a>
                            <a href="javascript:;" class="deletePanel" data-id="{{ $val['id'] }}"><span class="c-tooltip c-tooltip--top" data-toggle="modal" data-target="#deleteModel" aria-label="Delete">
                                        <i class="fa fa-trash-o"></i></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>    
    </div>
</div>
</div><!-- // .container -->
<style>
    /*    a.c-board__btn.c-tooltip.c-tooltip--top {
            position: absolute;
            margin-left: 743px;
            margin-bottom: 41px;
            }*/
            .c-table__title .c-tooltip{
                position: absolute;
            }
        </style>

        @endsection


