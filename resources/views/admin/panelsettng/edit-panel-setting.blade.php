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
                            <label><h3>Edit Panel Setting</h3></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="packagename">Web Site Panel Name</label> 
                                <input class="c-input" name="packagename" id="packagename" placeholder="" type="text">

                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="firstName">Logo</label> 
                                {{ Form::file('file', null, array('class' => 'c-input')) }}
                            </div>
                        </div>
                        
                        <div class="col-lg-3">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="firstName">Sidebar Menu Color</label> 
                                <input class="c-input jscolor" name="menucolor" id="packagename" placeholder="Sidebar Menu Color" type="text">
                            </div>
                        </div>
                        
                        <div class="col-lg-3">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="firstName">Color</label> 
                                <input class="c-input jscolor" name="color" id="packagename" placeholder="Color" type="text">
                            </div>
                        </div>
                        
                        <div class="col-lg-3">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="firstName">Color a:hover </label> 
                                <input class="c-input jscolor" name="hovercolor" id="packagename" placeholder="Hover Color" type="text">
                            </div>
                        </div>
                    </div>
                    
                    <br>
                    
                    <input style="margin-bottom: 20px;" class="c-btn c-btn--success" type="submit" value="Edit Panel Setting">
                    <br/>
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
