@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
@php
 $time = array_keys($arrTime);

@endphp
<div class="container">
    {{ Form::open( array('method' => 'post', 'class' => '','files' => true, 'id' => 'editplan' )) }}
    <div class="row u-mb-large">
        <div class="col-6">
            <article class="c-stage">
                <div class="c-stage__header o-media u-justify-start">
                    <div class="c-stage__icon o-media__img">
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="c-stage__header-title o-media__body">
                        <h6 class="u-mb-zero">Add Plan</h6>
                    </div>
                </div>
                
                <div class="c-stage__panel u-p-medium">
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <input type="hidden" value="{{ $customer_id }}" name="customer_id" id="customer_id">
                                <input type="hidden" value="{{ $editplan['0']['id']  }}" name="id" id="id">

                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="startdate">Start Date</label> 
                                <input class="c-input"  name="startdate" id="startdate1" placeholder="Star Date" type="text" value="{{ date('Y.m.d', strtotime($editplan['0']['start_date']))}}">
                            </div>
                        </div>
                        
                        
                        <div class="col-lg-6">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="starttime">Start Time</label> 
                               
                                <select name="starttime" class="c-select" id="starttime">
                                    @php
                                   for($i=0; $i < count($arrTime); $i++ )
                                   {@endphp
                                   <option value="{{ $time[$i] }}" {{ ($time[$i] == substr($editplan[0]['start_time'],0,5) ? 'selected="selected"' : '') }} >{{ $time[$i] }}</option>
                                   @php}
                                   @endphp
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="enddate">End Date</label> 
                                <input class="c-input"  name="enddate" id="enddate1" placeholder="End Date" type="text" value="{{ date('Y.m.d', strtotime($editplan['0']['end_date']))}}">
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="endtime">End Time</label> 
                                
                                <select name="endtime" class="c-select" id="endtime">
                                    @php
                                   for($i=0; $i < count($arrTime); $i++ )
                                   {@endphp
                                   <option value="{{ $time[$i] }}" {{ ($time[$i] == substr($editplan[0]['end_time'],0,5) ? 'selected="selected"' : '') }} >{{ $time[$i] }}</option>
                                   @php}
                                   @endphp
                                </select>
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
                                <label class="c-field__label" for="status">Status</label> 
                                <!--<input class="c-input" required name="status" id="status" placeholder="status" type="text">-->
                                <select class="c-input" name="status" id="status" >
                                    <option value="">Select status</option>
                                    
                                @for($i=0;$i < count($plan_status); $i++)
                                <option value="{{ $i+1 }}" {{ ($i+1 == $editplan['0']['status'] ? 'selected="selected"' : '') }}>{{ $plan_status[$i+1] }}</option>
                                @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="message">If they are not reachable ,we should inform caller of the soft message</label> 
                                <!--<input class="c-input" required name="message" id="message" placeholder="message" type="text">-->
                                <select class="c-input" name="message" id="message" >
                                    <option value="">Select Message</option>
                                    
                                @for($i=0;$i < count($msg); $i++)
                                <option value="{{ $i+1 }}" {{ ($i+1 == $editplan['0']['message'] ? 'selected="selected"' : '') }} >{{ $msg[$i+1] }}</option>
                                @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="number">Transefer Telephone Number</label> 
                                <input class="c-input" name="transfercall" id="transfercall" placeholder="Transefer Telephone Number" value="{{ $editplan['0']['transfer_call_no'] }}" type="text">
                                 <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="number">Responsibility</label> 
                                <!--<input class="c-input" required name="number" id="number" placeholder="number" type="text">-->
                                <select class="c-select" name="responsibility" id="responsibility" >
                                    <option value="">Select Responsibility</option>
                                    
                                @for($i=0;$i < count($responsibility); $i++)
                                <option value="{{ $i+1 }}" {{ ($i+1 == $editplan['0']['responsibilty'] ? 'selected="selected"' : '') }}>{{ $responsibility[$i+1] }}</option>
                                @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="employee">Employee</label> 
                                <!--<input class="c-input" required name="information" id="information" placeholder="information" type="text">-->
                                <select class="c-select " name="employee" id="employee" >
                                    <option value="">Select employee</option>
                                    
                                @for($i=0;$i < count($employessList); $i++)
                                <option value="{{ $employessList[$i]['id'] }}" {{ ($employessList[$i]['id'] == $editplan['0']['employee'] ? 'selected="selected"' : '') }} >{{ $employessList[$i]['first_name'] }} {{ $employessList[$i]['last_name'] }}</option>
                                @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="note">Note</label> 
                                <textarea rows="4"  class="c-input" cols="50" name="note">{{ $editplan['0']['Note'] }}</textarea>
                            </div>
                        </div>
                    </div>
                    <br/>
                        <div class="c-field u-mb-small left">
                            <div class="col-mg-3">
                                <input class="c-btn c-btn--info " value="Edit Plan" type="submit">&nbsp;&nbsp;
                                <input class="c-btn c-btn--secondary " value="{{ trans('employee.cancel') }}" type="reset">
                            </div> 
                        </div>
                        
            </article>
        </div>
    </div>
    {{ Form::close() }}
</div>
<style>
    input.has-error {
        border-color: red;
    }


</style>

@endsection
