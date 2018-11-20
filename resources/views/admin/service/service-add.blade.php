@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <article class="c-stage">
                <br>
                <div class="col-md-12">
                    {{ Form::open( array('method' => 'post', 'class' => '', 'id' => 'addServiceForm' )) }}
                    <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
                    <div class="row">
                        <div class="col-md-4">
                            <label><h3>{{ trans('op_services.service_package')}}</h3></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="packagename">{{ trans('op_services.package_name')}}</label> 
                                <input class="c-input" name="packagename" id="packagename" placeholder="" type="text">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">  
                            <label class="c-field__label" for="category">{{ trans('op_services.category')}}</label> 

                            <select class="c-select" id="category" name="category">
                                <option>{{ trans('op_services.select_category')}}</option>
                                @foreach($allCategory as $val)
                                <option value="{{$val['id']}}">{{$val['categoryname']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <label data-toggle="modal" data-target="#modal4" class="c-field__label getCategory">{{ trans('op_services.new_category')}}</label> 
                        </div> 
                    </div> 
                    <br>
                    <br>
                    <div class="row">
                        <table class="c-table">
                            <thead class="c-table__head c-table__head--slim">
                                <tr class="c-table__row">
                                    <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">{{ trans('op_services.title')}}</th>
                                    <th class="c-table__cell c-table__cell--head">{{ trans('op_services.qty')}}</th>
                                    <th class="c-table__cell c-table__cell--head">{{ trans('op_services.price')}}</th>
                                    <th colspan="2" class="c-table__cell c-table__cell--head"><a href="javascript:;" class="add_new_row" style="margin-left: 20px;"><i class="fa fa-plus"></i></a></th>
                                </tr>
                            </thead>
                            <tbody class="dataAppend">    
                                <tr class="c-table__row">
                                    <td class="c-table__cell"><input type="text" class="c-input" name="title[]"/></td>
                                    <td class="c-table__cell"><input type="text" class="qty c-input notnumber" name="qty[]"/></td>
                                    <td class="c-table__cell"><input type="text" class="price c-input notnumber" name="price[]"/></td>
                                    <td class="c-table__cell">
                                        <div class="c-choice c-choice--checkbox">
                                            <input class="c-choice__input invoice_checkbox" id="checkboxs" name="in_invoice[]" type="checkbox">
                                            <label class="c-choice__label" for="checkboxs">{{ trans('op_services.invoice')}}</label>
                                        </div>
                                    </td>
                                    <td class="c-table__cell"><span class="total"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br/>
                    <input style="margin-bottom: 20px;" class="c-btn c-btn--success" type="submit" value="{{ trans('op_services.enater_service')}}">
                    <br/>
                    {{ Form::close() }}
                </div>


                <!-- Modal -->
                <div class="c-modal c-modal--xsmall modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="modal4" data-backdrop="static">
                    <div class="c-modal__dialog modal-dialog" role="document">
                        <form action="{{route('category-add')}}" method="post" name="addCategory" id="addService">
                            <div class="c-modal__content">
                                <div class="c-modal__header">
                                    <h3 class="c-modal__title">{{ trans('op_services.new_category')}}</h3>
                                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                                        <i class="fa fa-close"></i>
                                    </span>
                                </div>
                                <div class="c-modal__body">
                                    <div class="c-field u-mb-xsmall">
                                        <label class="c-field__label" for="select12">{{ trans('op_services.category')}}:</label>
                                        <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
                                        <input class="c-input" name="category" id="category" placeholder="Enter Category Name:" type="text">
                                    </div>
                                    <input class="c-btn c-btn--info c-btn--fullwidth createpackage" value="{{ trans('op_services.new_category')}}" type="submit">
                                </div>
                                 <div class="c-modal__footer appendCategory"></div>
                            </div><!-- // .c-modal__content -->
                        </form>
                    </div><!-- // .c-modal__dialog -->
                </div><!-- // .c-modal -->


            </article>
        </div>
    </div>
</div>
<style>
    input.has-error {
        border-color: red;
    }


</style>

@endsection