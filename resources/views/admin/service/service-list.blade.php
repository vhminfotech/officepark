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
                        <div class="row">
                        <div class="col-lg-2">
                             {{ trans('op_services.op_service')}}
                        </div>
                       
                        <div class="col-lg-9">
                            
                                <div class="left">
                                    <input class="c-btn c-btn--info c-btn--fullwidth createpackage" value="{{ trans('op_services.create_packgae')}}" type="button">
                                    <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 

                                </div>
                                <div class="col-lg-3 left">
                                    <div class="left c-field">  
                                        <select class="c-select websiteList" id="websites" name="websites">
                                            <option value="">{{ trans('op_services.select_website')}}</option>
                                           @foreach($websites as $index=>$val)
                                           <option value="{{$index}}">{{$val}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                           
                        </div>
                        </div>
                    </caption>

                    <thead class="c-table__head c-table__head--slim">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">No</th>
                            <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">{{ trans('op_services.website')}}&nbsp;&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('op_services.packgename')}}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">{{ trans('op_services.category')}}&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('op_services.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count = 1;
                         @endphp
<!--                        function getWebsite($website_id){
                            foreach($websites as $index=>$val){
                                if($index == $website_id){
                                    return $val;
                                    break;
                                }
                            }
                        }-->
                        
                        
                       
                        @for($i = 0 ;$i < count($getServiceData);$i++,$count++)
                        <tr class="c-table__row">
                            <td class="c-table__cell">{{ $count }}</td>
                            <td class="c-table__cell">{{ $websites[$getServiceData[$i]->website_id] }}</td>
                            <td class="c-table__cell">{{ $getServiceData[$i]->packages_name }}</td>
                            <td class="c-table__cell">{{ $getServiceData[$i]->categoryname }}</td>
                            <td class="c-table__cell">
                                <a href=" {{ route('service-edit',[$getServiceData[$i]->id])}} "><span class="c-tooltip c-tooltip--top"  aria-label="{{ trans('op_services.edit')}}">
                                        <i class="fa fa-edit" ></i></span>
                                </a>
                                <a href="javascript:;" class="delete" data-token="{{ csrf_token() }}"  data-id="{{ $getServiceData[$i]->id }}"><span class="c-tooltip c-tooltip--top" data-toggle="modal" data-target="#deleteModel" aria-label="{{ trans('op_services.delete')}}">
                                        <i class="fa fa-trash-o"></i></span>
                                </a>
                            </td>
                        </tr>
                        @endfor
<!--                        <tr>
                            <td class="c-table__cell">1</td>
                            <td class="c-table__cell">www.uzaktansekreter.de</td>
                            <td class="c-table__cell">Business</td>
                            <td class="c-table__cell">Phone Service</td>
                            <td class="c-table__cell">
                                <a href=""><span class="c-tooltip c-tooltip--top"  aria-label="Edit">
                                        <i class="fa fa-edit" ></i></span>
                                </a>
                                <a href="javascript:;" class="delete" data-token="{{ csrf_token() }}" data-id=""><span class="c-tooltip c-tooltip--top" data-toggle="modal" data-target="#deleteModel" aria-label="Delete">
                                        <i class="fa fa-trash-o" ></i></span>
                                </a>
                            </td>
                        </tr>-->
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
