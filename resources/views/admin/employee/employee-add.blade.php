@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<div class="container">
    <div class="row u-mb-large">
        <div class="col-6">
            <article class="c-stage">
                <div class="c-stage__header o-media u-justify-start">
                    <div class="c-stage__icon o-media__img">
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="c-stage__header-title o-media__body">
                        <h6 class="u-mb-zero">Add New Employeer</h6>
                    </div>
                </div>
                {{ Form::open( array('method' => 'post', 'class' => '', 'id' => 'addEmpForm' )) }}
                    <div class="c-stage__panel u-p-medium">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="firstName">First Name</label> 
                                    <input class="c-input" name="firstName" id="firstName" placeholder="Firstname" type="text">
                                    <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="lastName">Last Name</label> 
                                    <input class="c-input" name="lastName" id="lastName" placeholder="lastName" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="jobtitle">job Title</label> 
                                    {{ Form::select('jobtitle', $job_title , null, array('class' => 'c-select', 'id' => 'jobtitle')) }}
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="responsibility">Responsibility</label> 
                                    {{ Form::select('responsibility', $responsibility , null, array('class' => 'c-select', 'id' => 'responsibility')) }}
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="langauge">P away msg</label> 
                                    {{ Form::select('p_away_msg', $p_away_msg , null, array('class' => 'c-select', 'id' => 'p_away_msg')) }}
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="callbacksms1"> Call Back msg</label> 
                                    {{ Form::select('call_back_msg', $call_back_msg , null, array('class' => 'c-select', 'id' => 'call_back_msg')) }}
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="telephone">Telephone</label> 
                                    <input class="c-input" name="telephone" id="telephone" placeholder="telephone" type="text">
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="lastName">Mobile Phone</label> 
                                    <input class="c-input" name="mobile" id="mobile" placeholder="mobile" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="lastName">E-mail</label> 
                                    <input class="c-input" name="email" id="email" placeholder="email" type="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="anyotherinformation">Any Other information</label> 
                                    <textarea rows="4" class="c-input" cols="50" name="anyotherinformation">
                                        
                                    </textarea>
                                </div>
                            </div>
                        </div>

                    </div>

            </article>
        </div>
        <div class="col-6">
            <article class="c-stage">
                <div class="c-stage__panel u-p-medium">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="callbacksms">My Profile</label> 
                                <select class="c-select" id="callbacksms" name="standard">
                                    <option value="Standard">Standard</option>
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="callbacksms"> Call Transfer</label> 
                                <div class="c-choice c-choice--checkbox">
                                    <input class="c-choice__input" id="checkbox1" name="checkboxes" type="checkbox">
                                    <label class="c-choice__label" for="checkbox1">Transfer Incoming call To Telephone</label>
                                </div>
                            </div>
                            <div class="c-field u-mb-small">
                                <div class="c-choice c-choice--checkbox">
                                    <input class="c-choice__input" id="checkbox2" name="checkboxes" type="checkbox">
                                    <label class="c-choice__label" for="checkbox2">Transfer Incoming call To Mobile Phone</label>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="callbacksms"> Call Notification</label> 
                                <div class="c-choice c-choice--checkbox">
                                    <input class="c-choice__input" id="checkbox3" name="checkboxes" type="checkbox">
                                    <label class="c-choice__label" for="checkbox3">Transfer Incoming call To Telephone</label>
                                </div>
                            </div>
                            <div class="c-field u-mb-small">
                                <div class="c-choice c-choice--checkbox">
                                    <input class="c-choice__input" id="checkbox4" name="checkboxes" type="checkbox">
                                    <label class="c-choice__label" for="checkbox4">Transfer Incoming call To Mobile Phone</label>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <a class="c-stage__header u-flex u-justify-between collapsed" data-toggle="collapse" href="#stage-panel" aria-expanded="false" aria-controls="stage-panel">
                                <h6 class="u-text-mute u-text-uppercase u-text-small u-mb-zero"> Bussines Hours/Global</h6>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>

                            <div class="c-stage__panel c-stage__panel--mute collapse" id="stage-panel" style="">
                              @php
                              $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
                              @endphp 
                              @for($m = 0;$m < count($days);$m++)
                              @if($m == 0)
                                <div class="row u-mb-xlarge" style="margin-bottom: -0.75rem!important;margin-top: 10px;">
                                @else
                                <div class="row u-mb-xlarge" style=" margin-bottom: -0.75rem!important;">
                                @endif
                                    <div class="col-md-4 u-mb-medium">
                                        <div class="c-choice c-choice--checkbox">
                                        <input class="c-choice__input" id="{{ $days[$m].$m }}" name="monday" type="checkbox">
                                    <label class="c-choice__label" for="{{ $days[$m].$m }}">{{ $days[$m] }}</label>
                                    </div>
                                    </div>
                                   <div class="col-md-4 u-mb-medium">
                                        <select class="c-select col-md-2" id="start{{ $days[$m] }}" name="callbacksms10">
                                            @for($i = 5;$i < 10;$i++)
                                              <option value="{{ $i }}">{{ $i.':00' }}</option>    
                                            @endfor
                                    </select>
                                    </div>
                                    <div class="col-md-4 u-mb-medium">
                                        <select class="c-select col-md-2" id="end{{ $days[$m] }}" name="callbacksms1">
                                        @for($k = 5;$k < 12;$k++)
                                            <option value="{{ $k }}">{{ number_format($k,2) }}</option>   
                                        @endfor
                                        </select>
                                    </div>
                                </div>
                                @endfor
                                
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <a class="c-stage__header u-flex u-justify-between collapsed" data-toggle="collapse" href="#stage-pane2" aria-expanded="false" aria-controls="stage-pane2">
                                <h6 class="u-text-mute u-text-uppercase u-text-small u-mb-zero">Launch Time /Global</h6>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>

                            <div class="c-stage__panel c-stage__panel--mute collapse" id="stage-pane2" style="">
                                <div class="row u-mb-xlarge" style="margin-top: 10px!important;    margin-bottom: 0px !important;">
                                    <div class="col-md-4 u-mb-medium">
                                    <div class="c-choice c-choice--checkbox">
                                    <input class="c-choice__input" id="mondaddy" name="monddday" type="checkbox">
                                    <label class="c-choice__label" for="mondaddy">&nbsp;</label>
                                    </div>
                                    </div>
                                   <div class="col-md-4 u-mb-medium">
                                        <select class="c-select col-md-2" id="start" name="callbacksms10">
                                            @for($i = 5;$i < 10;$i++)
                                              <option value="{{ $i }}">{{ $i.':00' }}</option>    
                                            @endfor
                                    </select>
                                    </div>
                                    <div class="col-md-4 u-mb-medium">
                                        <select class="c-select col-md-2" id="end" name="callbacksms1">
                                        @for($k = 5;$k < 12;$k++)
                                            <option value="{{ $k }}">{{ number_format($k,2) }}</option>   
                                        @endfor
                                        </select>
                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="c-choice c-choice--checkbox">
                                <input class="c-choice__input" id="checkboxs5" name="checkboxes" type="checkbox">
                                <label class="c-choice__label" for="checkboxs5">No Bussiness Hours Adjust</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a class="c-stage__header u-flex u-justify-between collapsed" data-toggle="collapse" href="#stage-pane3" aria-expanded="true" aria-controls="stage-pane3">
                                <h6 class="u-text-mute u-text-uppercase u-text-small u-mb-zero">Global Holidays</h6>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                            <div class="c-stage__panel c-stage__panel--mute collapse show" id="stage-pane3" style="">
                                <div class="u-p-medium">
                                    <div class="form-group">
                                        <div class="c-field has-addon-left">
                                            <label class="c-field__label" for="holidayfrom">Holiday Global From</label> 
                                            <input class="c-input form-control" data-toggle="datepicker" id="holidayfrom" name="holidayfrom" type="text" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="c-field has-addon-left">
                                            <label class="c-field__label" for="holidayto">Holiday Global To</label> 
                                            <input class="c-input form-control" data-toggle="datepicker" id="holidayto" name="holidayto" type="text" required>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="c-field u-mb-small left">
                        <div class="col-mg-3">
                            <input class="c-btn c-btn--info " value="Add Employee" type="submit">&nbsp;&nbsp;
                            <input class="c-btn c-btn--secondary " value="cancel" type="submit">
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


</style>

@endsection