@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')

<script>
    var totalCount = '<?php count($getService['service_detail']); ?>';
</script>
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <article class="c-stage">
                <br>
                <div class="col-md-12">
                    {{ Form::open( array('method' => 'post', 'class' => '', 'id' => 'editServiceForm' )) }}
                    <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
                    <div class="row">
                        <div class="col-md-4">
                            <label><h3>Service Packages</h3></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="packagename">Package name</label> 
                                <input class="c-input" name="packagename" id="packagename" value="{{ $getService['service'][0]->packages_name }}" placeholder="" type="text">

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 left">
                                    <div class="left c-field u-mb-medium">  
                                        
                                    </div>
                                </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="website">Websites</label> 
                                <select class="c-select websiteList" id="websites" name="websites">
                                            <option value="">Select Website</option>
                                           @foreach($websites as $index=>$val)
                                           <option value="{{$index}}" {{ ($getService['service'][0]->website_id == $index ? 'selected="selected"' : '') }}>{{$val}}</option>
                                           @endforeach
                                        </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">  
                            <label class="c-field__label" for="category">Category</label> 

                            <select class="c-select" id="category" name="category">
                                <option>Select category</option>
                                @foreach($allCategory as $val)
                                <option value="{{$val['id']}}" {{ ($getService['service'][0]->category_id == $val['id'] ? 'selected="selected"' : '') }} >{{$val['categoryname']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <label data-toggle="modal" data-target="#modal4" class="c-field__label">Create new category</label> 
                        </div> 
                    </div> 
                    <br>
                    <br>
                    <div class="row">
                        <table class="c-table">
                            <thead class="c-table__head c-table__head--slim">
                                <tr class="c-table__row">
                                    <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">Title</th>
                                    <th class="c-table__cell c-table__cell--head">Qty</th>
                                    <th class="c-table__cell c-table__cell--head">Price</th>
                                    <th colspan="2" class="c-table__cell c-table__cell--head"><a href="javascript:;" class="add_new_row" style="margin-left: 20px;"><i class="fa fa-plus"></i></a></th>
                                </tr>
                            </thead>
                            <tbody class="dataAppend">    
                                @for($i=0; $i< count($getService['service_detail']); $i++)
                                <tr class="c-table__row">
                                    <td class="c-table__cell"><input type="text" class="c-input"  value="{{ $getService['service_detail'][$i]->title }}" name="title[]"/></td>
                                    <td class="c-table__cell"><input type="text" class="qty c-input" value="{{ $getService['service_detail'][$i]->qty }}" name="qty[]"/></td>
                                    <td class="c-table__cell"><input type="text" class="price c-input" value="{{ $getService['service_detail'][$i]->price }}" name="price[]"/></td>
                                    <td class="c-table__cell">
                                        <div class="c-choice c-choice--checkbox">
                                            <input class="c-choice__input" id="checkboxs{{ $i }}" name="in_invoice[{{$i}}]" type="checkbox" {{ ($getService['service_detail'][$i]->is_invoice == "Yes" ? 'checked="checked"' : '')}} >
                                            <label class="c-choice__label" for="checkboxs{{ $i }}">Invoice</label>
                                        </div>
                                    </td>
                                    <!--<td class="c-table__cell"><span class="total">{{ $getService['service_detail'][$i]->total }} €</span></td>-->
                                    <!--<td class="c-table__cell"><span class="total">&nbsp; </span></td>-->
                                    <td class="c-table__cell"><a href="javascript:;" class="removetData"><i class="fa fa-close"></i></a></td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    <br/>
                    <input style="margin-bottom: 20px;" class="c-btn c-btn--success" type="submit" value="Enter Servicer">
                    <br/>
                    {{ Form::close() }}
                </div>


                <!-- Modal -->
                <div class="c-modal c-modal--xsmall modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="modal4" data-backdrop="static">
                    <div class="c-modal__dialog modal-dialog" role="document">
                        <form action="{{route('category-add')}}" method="post" name="addCategory" id="addService">
                            <div class="c-modal__content">
                                <div class="c-modal__header">
                                    <h3 class="c-modal__title">Add New Category</h3>
                                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                                        <i class="fa fa-close"></i>
                                    </span>
                                </div>
                                <div class="c-modal__body">
                                    <div class="c-field u-mb-xsmall">
                                        <label class="c-field__label" for="select12">Category Name:</label>
                                        <!-- Select2 jquery plugin is used -->
                                        <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
                                        <input class="c-input" name="category" id="category" placeholder="Enter Category Name:" type="text">
                                    </div>
                                    <input class="c-btn c-btn--info c-btn--fullwidth createpackage" value="Add New Category" type="submit">
                                </div>
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