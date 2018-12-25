@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')

<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <article class="c-stage">
                <div class="c-stage__header o-media u-justify-start">
                    <div class="c-stage__icon o-media__img">
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="c-stage__header-title o-media__body">
                        <h6 class="u-mb-zero">Add Support module message</h6>
                    </div>
                </div>
                <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                {{ Form::open( array('method' => 'post', 'class' => 'addSupports','id' => 'addSupports' )) }}
               
                    <div class="c-stage__panel u-p-medium">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="information">Support message add</label> 
                                     {{ Form::select('support_message',  $support_message,null , array('class' => 'c-select', 'id' => 'support_message')) }}
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="note"></label> 
                                    <textarea rows="2"  class="c-input" cols="50" name="note" required>{{ (isset($callList) ? $callList['note'] : '') }}</textarea>
                                     
                                </div>
                            </div>
                        </div>
                        
                        <div class="c-field u-mb-small left">
                            <div class="col-mg-3">
                                <input class="c-btn c-btn--info " value="Send" type="submit">&nbsp;&nbsp;
                                <input class="c-btn c-btn--secondary " value="{{ trans('employee.cancel') }}" type="reset">
                            </div> 
                        </div>
                    </div>
               {{ Form::close() }}
            </article>
        </div>
    </div>
</div>
<style>
    input.has-error {
        border-color: red;
    }
    .has-error .select2,.has-error .select2-selection{
        color: red !important;
        border-color: red !important;
    }

</style>
@endsection