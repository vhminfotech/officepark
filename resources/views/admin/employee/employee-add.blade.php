@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
@php
 $time = array_keys($arrTime);
@endphp


<div class="container">
    <div class="row u-mb-large">
        <div class="col-6">
            <article class="c-stage">
                <div class="c-stage__header o-media u-justify-start">
                    <div class="c-stage__icon o-media__img">
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="c-stage__header-title o-media__body">
                        <h6 class="u-mb-zero">{{ trans('employee.add-new-employee') }}</h6>
                    </div>
                </div>
                {{ Form::open( array('method' => 'post', 'class' => '','files' => true, 'id' => 'addEmpForm' )) }}
                <div class="c-stage__panel u-p-medium">
                     <div class="col-lg-4 u-text-center">
                        <div class="c-avatar c-avatar--xlarge u-inline-block">
                            <img class="c-avatar__img" src="{{ url('uploads/no-image.png') }}" alt="Avatar">
                        </div>
                        <p> <label class="c-field__label" for="fileSelect">{{ trans('employee.add-avatar') }}</label></p>
                        <p>800px * 800px</p>
                        {{ Form::file('file', ['class' => 'c-input', 'id'=>'fileSelect', 'style' => 'visibility:hidden;']) }}
                    </div>
                    <!-- <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="firstName">{{ trans('employee.select-image') }}</label> 
                                {{ Form::file('file', null, array('class' => 'c-input')) }}
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                
                                <label class="c-field__label" for="customer_id">{{ trans('employee.customer-number') }}</label> 
                                {{ Form::select('customer_id', $arrOrderInfo , null, array('class' => 'c-select', 'id' => 'is_package')) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="firstName">{{ trans('employee.first-name') }}</label> 
                                {{ Form::text('firstName', null, array('class' => 'c-input firstName' ,'required')) }}
                                <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="lastName">{{ trans('employee.last-name') }}</label> 
                                <input class="c-input" name="lastName" id="last_name" placeholder="lastName" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="jobtitle">{{ trans('employee.job-title') }}</label> 
                                {{ Form::select('jobtitle', $job_title , null, array('class' => 'c-select', 'id' => 'jobtitle')) }}
                            </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="responsibility">{{ trans('employee.responsibility') }}</label> 
                                {{ Form::select('responsibility', $responsibility , null, array('class' => 'c-select', 'id' => 'responsibility')) }}
                            </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="langauge">{{ trans('employee.p-away-msg') }}</label> 
                                {{ Form::select('p_away_msg', $p_away_msg , null, array('class' => 'c-select', 'id' => 'p_away_msg')) }}
                            </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="callbacksms1">{{ trans('employee.call-back-msg') }}</label> 
                                {{ Form::select('call_back_msg', $call_back_msg , null, array('class' => 'c-select', 'id' => 'call_back_msg')) }}
                            </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="telephone">{{ trans('employee.telephone') }}</label> 
                                <input class="c-input" required name="telephone" id="telephone" placeholder="telephone" type="number">
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="lastName">{{ trans('employee.mobile-phone') }}</label> 
                                <input class="c-input" required name="mobile" id="mobile" placeholder="mobile" type="number">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="email">{{ trans('employee.e-mail') }}</label> 
                                <input class="c-input" required name="email" id="email" placeholder="email" type="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="anyotherinformation">{{ trans('employee.any-other-information') }}</label> 
                                <textarea rows="4" required class="c-input" cols="50" name="anyotherinformation">
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
                                <label class="c-field__label" for="callbacksms">{{ trans('employee.my-profile') }}</label> 
                                <select class="c-select" required id="callbacksms" name="my_profile">
                                    <option value="0">{{ trans('employee.standard') }}</option>
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="callbacksms">{{ trans('employee.call-transfer') }}</label> 
                                <div class="c-choice c-choice--checkbox">
                                    <input class="c-choice__input" id="call_transfer_telephone" name="call_transfer_telephone" value="1" type="checkbox" required>
                                    <label class="c-choice__label" for="call_transfer_telephone">{{ trans('employee.transfer-incoming-call-to-telephone') }}</label>
                                </div>
                            </div>
                            <div class="c-field u-mb-small">
                                <div class="c-choice c-choice--checkbox">
                                    <input class="c-choice__input" id="call_transfer_mobile_phone" name="call_transfer_mobile_phone" value="1" type="checkbox" required>
                                    <label class="c-choice__label" for="call_transfer_mobile_phone">{{ trans('employee.transfer-incoming-call-to-mobile-phone') }}</label>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="callbacksms"> {{ trans('employee.call-notification') }}</label> 
                                <div class="c-choice c-choice--checkbox">
                                    <input class="c-choice__input" id="transfer_notification_to_call" name="transfer_notification_to_call" value="1" type="checkbox">
                                    <label class="c-choice__label" for="transfer_notification_to_call">{{ trans('employee.transfer-incoming-call-to-telephone') }}</label>
                                </div>
                            </div>
                            <div class="c-field u-mb-small">
                                <div class="c-choice c-choice--checkbox">
                                    <input class="c-choice__input" id="transfer_notification_to_mobile_phone" name="transfer_notification_to_mobile_phone" value="1" type="checkbox" >
                                    <label class="c-choice__label" for="transfer_notification_to_mobile_phone">{{ trans('employee.transfer-incoming-call-to-mobile-phone') }}</label>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <a class="c-stage__header u-flex u-justify-between collapsed" data-toggle="collapse" href="#stage-panel" aria-expanded="false" aria-controls="stage-panel">
                                <h6 class="u-text-mute u-text-uppercase u-text-small u-mb-zero"> {{ trans('employee.business-hoursglobal') }}</h6>
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
                                        @php
                                        $dayName = $days[$m];
                                        @endphp
                                        <div class="col-md-4 u-mb-medium">
                                            <div class="c-choice c-choice--checkbox">
                                                {{ Form::checkbox('day['.$days[$m].']',  $days[$m] , true,array('class' => 'c-choice__input', 'id' => $days[$m].$m)) }}
                                                <label class="c-choice__label" for="{{ $days[$m].$m }}">{{ $days[$m] }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 u-mb-medium">
                                            <select name="{{ 'start['.$days[$m].']' }}" class="c-select" id="{{ 'start['.$days[$m].']' }}">
                                                @php
                                                for($i=0; $i < count($arrTime); $i++ )
                                                {@endphp
                                                <option value="{{ $time[$i] }}"  {{ ($time[$i] == '09:00' ? 'selected="selected"' : '') }} >{{ $time[$i] }}</option>
                                                @php}
                                                @endphp
                                            </select>
<!--                                            {{ Form::select('start['.$days[$m].']',$arrTime , null, array('class' => 'c-select', 'id' => 'start['.$days[$m].']')) }}-->
                                        </div>
                                        <div class="col-md-4 u-mb-medium">
                                            <select name="{{ 'end['.$days[$m].']' }}" class="c-select" id="{{ 'end['.$days[$m].']' }}">
                                                 @php
                                                for($i=0; $i < count($arrTime); $i++ )
                                                {@endphp
                                                <option value="{{ $time[$i] }}" {{ ($time[$i] == '18:00' ? 'selected="selected"' : '') }} >{{ $time[$i] }}</option>
                                                @php}
                                                @endphp
                                            </select>
<!--                                            {{ Form::select('end['.$days[$m].']',$arrTime , null, array('class' => 'c-select', 'id' => 'end['.$days[$m].']')) }}-->
                                        </div>
                                    </div>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a class="c-stage__header u-flex u-justify-between collapsed" data-toggle="collapse" href="#stage-pane2" aria-expanded="false" aria-controls="stage-pane2">
                                    <h6 class="u-text-mute u-text-uppercase u-text-small u-mb-zero"> {{ trans('employee.launch-timeglobal') }}</h6>
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </a>

                                <div class="c-stage__panel c-stage__panel--mute collapse" id="stage-pane2" style="">
                                    <div class="row u-mb-xlarge" style="margin-top: 10px!important;    margin-bottom: 0px !important;">
                                        <div class="col-md-4 u-mb-medium">
                                            <div class="c-choice c-choice--checkbox">
                                                <input class="c-choice__input" id="launch_time" name="launch_time" value="1" type="checkbox">
                                                <label class="c-choice__label" for="launch_time">&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 u-mb-medium">
                                            <select name="global_start_time" class="c-select col-md-2" id="global_start_time">
                                                 @php
                                                for($i=0; $i < count($arrTime); $i++ )
                                                {@endphp
                                                <option value="{{ $time[$i] }}" {{ ($time[$i] == '12:00' ? 'selected="selected"' : '') }} >{{ $time[$i] }}</option>
                                                @php}
                                                @endphp
                                            </select>
                                            
                                        </div>
                                        <div class="col-md-4 u-mb-medium">
                                            <select name="global_end_time" class="c-select col-md-2" id="global_end_time">
                                                 @php
                                                for($i=0; $i < count($arrTime); $i++ )
                                                {@endphp
                                                <option value="{{ $time[$i] }}" {{ ($time[$i] == '14:00' ? 'selected="selected"' : '') }} >{{ $time[$i] }}</option>
                                                @php}
                                                @endphp
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
                                    <input class="c-choice__input" id="no_business_hour_adjust" value="1" name="no_business_hour_adjust" type="checkbox">
                                    <label class="c-choice__label" for="no_business_hour_adjust">{{ trans('employee.no-business-hours-adjust') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a class="c-stage__header u-flex u-justify-between collapsed" data-toggle="collapse" href="#stage-pane3" aria-expanded="true" aria-controls="stage-pane3">
                                    <h6 class="u-text-mute u-text-uppercase u-text-small u-mb-zero">{{ trans('employee.global-holidays') }}</h6>
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </a>
                                <div class="c-stage__panel c-stage__panel--mute collapse show" id="stage-pane3" style="">
                                    <div class="u-p-medium">
                                        <div class="form-group">
                                            <div class="c-field has-addon-left">
                                                <label class="c-field__label" for="holidayfrom">{{ trans('employee.holiday-global-from') }}</label> 
                                                <input class="c-input form-control" data-toggle="datepicker" id="holidayfrom" name="holidayfrom" type="text" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <div class="c-field has-addon-left">
                                                <label class="c-field__label" for="holidayto">{{ trans('employee.holiday-global-to') }} </label> 
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
                                <input class="c-btn c-btn--info " value="{{ trans('employee.add-employee') }}" type="submit">&nbsp;&nbsp;
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


</style>

@endsection