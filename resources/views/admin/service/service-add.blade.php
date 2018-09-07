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
                            <select class="c-select" id="select1">
                                <option>Select category</option>
                                <option>First</option>
                                <option>Second</option>
                                <option>Third</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="input_fields_wrap">
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <button class="c-btn c-btn--info c-btn--fullwidth add_field_button">Create New Input</button>
                        </div>
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