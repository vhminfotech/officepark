@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <article class="c-stage">
                <br>
                <div class="col-md-12">
                    {{ Form::open( array('method' => 'post', 'class' => '','files' => true, 'id' => 'addServiceForm' )) }}
                    <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
                    <div class="row">
                        <div class="col-md-4">
                            <label><h3>Add Panel Setting</h3></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="packagename">Web Site Panel Name</label> 
                                <input class="c-input" name="website_name" id="website_name" placeholder="website name" type="text">

                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="firstName">Logo</label> 
                                {{ Form::file('website_logo', null, array('class' => 'c-input')) }}
                            </div>
                        </div>
                        
                        <div class="col-lg-3">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="firstName">Sidebar Menu Color</label> 
                                <input class="c-input jscolor" name="sidebar_menu_color" id="sidebar_menu_color" placeholder="Sidebar Menu Color" type="text">
                            </div>
                        </div>
                        
                        <div class="col-lg-3">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="color">Color</label> 
                                <input class="c-input jscolor" name="color" id="packagename" placeholder="Color" type="text">
                            </div>
                        </div>
                        
                        <div class="col-lg-3">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="hovercolor">Color a:hover </label> 
                                <input class="c-input jscolor" name="hovercolor" id="packagename" placeholder="Hover Color" type="text">
                            </div>
                        </div>
                    </div>
                    
                    <br>
                    
                    <input style="margin-bottom: 20px;" class="c-btn c-btn--success" type="submit" value="Add Panel Setting">
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
