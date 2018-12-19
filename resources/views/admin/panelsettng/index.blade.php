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
                            <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">#</th>
                            <th class="c-table__cell c-table__cell--head">Web Site &nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Logo &nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Colors &nbsp;&nbsp;</th>                            
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('customer.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                 <tr class="c-table__row">
                     <td class="c-table__cell"><input type="checkbox" class="checkbox" value=""></td>
                            <td class="c-table__cell">www.yahoo.com</td>
                            
                            <td class="c-table__cell"><img class="c-avatar__img" src="{{ asset('img/avatar-72.jpg') }}" alt="User's Profile Picture"></td>
                            <td class="c-table__cell">Yahoo</td>
                            <td class="c-table__cell">
                                
                                <a href="{{ route("panel-setting-edit")}}"><span class="c-tooltip c-tooltip--top"  aria-label="{{ trans('customer.edit')}}">
                                        <i class="fa fa-edit" ></i></span>
                                </a>
                            </td>
                </tr>
                
                <tr class="c-table__row">
                    <td class="c-table__cell"><input type="checkbox" class="checkbox" value=""></td>
                    <td class="c-table__cell">www.facebook.com</td>
                    <td class="c-table__cell"><img class="c-avatar__img" src="{{ asset('img/avatar-72.jpg') }}" alt="User's Profile Picture"></td>
                    <td class="c-table__cell">Facebook</td>
                    <td class="c-table__cell">
                        <a href="{{ route("panel-setting-edit")}}"><span class="c-tooltip c-tooltip--top"  aria-label="{{ trans('customer.edit')}}">
                                <i class="fa fa-edit" ></i></span>
                        </a>
                    </td>
                </tr>
                
                <tr class="c-table__row">
                    <td class="c-table__cell"><input type="checkbox" class="checkbox" value=""></td>
                    <td class="c-table__cell">www.google.com</td> 
                    <td class="c-table__cell"><img class="c-avatar__img" src="{{ asset('img/avatar-72.jpg') }}" alt="User's Profile Picture"></td>
                    <td class="c-table__cell">Google</td>
                    <td class="c-table__cell">
                        <a href="{{ route("panel-setting-edit")}}"><span class="c-tooltip c-tooltip--top"  aria-label="{{ trans('customer.edit')}}">
                                <i class="fa fa-edit" ></i></span>
                        </a>
                    </td>
                </tr>
                     
                    </tbody>
                </table>
            </div>    
        </div>
         <div class="col-12">
            <a href="javascript:;" class="c-badge delete c-badge--info u-mr-small ">Delete</a>
            <a href="javascript:;" class="c-badge delete-all c-badge--info u-mr-small">Delete All</a>
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


