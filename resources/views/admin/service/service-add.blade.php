@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <article class="c-stage">
                <br>
                <div class="col-md-12">
                    {{ Form::open( array('method' => 'post', 'class' => '', 'id' => 'addEmpForm' )) }}
                    <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 

                    <div class="row">
                        <div class="col-md-4">
                            <label><h3>Service Packages</h3></label>
                        </div>
                        <div class="col-md-4">
                        </div>

                        <div class="col-md-2">
                            <input class="c-btn c-btn--info c-btn--fullwidth" value="Create Package" type="submit">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="packagename">Package name</label> 
                                <input class="c-input" name="packagename" id="packagename" placeholder="" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">  
                            <label class="c-field__label" for="select1">Category</label> 

                            <select class="c-select" id="select1">
                                <option>Select category</option>
                                <option>First</option>
                                <option>Second</option>
                                <option>Third</option>
                            </select>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="c-field__label">Create new category</label> 
                        </div> 
                    </div> 
                    <br>


                    <br>
                    <div class="row">
                        <table class="c-table">

                            <thead class="c-table__head c-table__head--slim">
                                <tr class="c-table__row">
                                    <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">Name</th>
                                    <th class="c-table__cell c-table__cell--head"></th>
                                    <th class="c-table__cell c-table__cell--head"></th>
                                    <th colspan="2" class="c-table__cell c-table__cell--head"><a href="javascript:;" class="add_new_row" style="margin-left: 20px;"><i class="fa fa-plus"></i></a></th>
                                </tr>
                            </thead>
                            <tbody class="dataAppend">    

                                <tr class="c-table__row">
                                    <td class="c-table__cell"><input type="text" class="qty c-input" name="first[]"/></td>
                                    <td class="c-table__cell"><input type="text" class="qty c-input" name="second[]"/></td>
                                    <td class="c-table__cell"><input type="text" class="price c-input" name="third[]"/></td>
                                    <td class="c-table__cell"><div class="c-choice c-choice--checkbox"><input class="c-choice__input" id="checkboxs" name="checkboxes" type="checkbox"><label class="c-choice__label" for="checkboxs">Invoice</label></td>
                                    <td class="c-table__cell"><input type="hidden" name="total[] "class="Rowtotal"><span class="total"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>



                    {{ Form::close() }}
                </div>
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