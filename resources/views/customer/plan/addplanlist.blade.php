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
                        <h6 class="u-mb-zero">Add Plan</h6>
                    </div>
                </div>
                {{ Form::open( array('method' => 'post', 'class' => '','files' => true, 'id' => 'addplan' )) }}
                <div class="c-stage__panel u-p-medium">
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <input type="hidden" value="{{ $customer_id }}" name="customer_id" id="customer_id">

                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="date">Date</label> 
                                <input class="c-input"  name="date" id="date" placeholder="Date" type="text" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="startdate">Start Date</label> 
                                <input class="c-input"  name="startdate" id="startdate" placeholder="Star Date" type="text" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="enddate">End Date</label> 
                                <input class="c-input"  name="enddate" id="enddate" placeholder="End Date" type="text" required>
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
                                <label class="c-field__label" for="message">Message</label> 
                                <!--<input class="c-input" required name="message" id="message" placeholder="message" type="text">-->
                                <select class="c-select" name="message" id="message" >
                                    <option value="">Select Message</option>
                                    
                                @for($i=0;$i < count($plan_message); $i++)
                                <option value="{{ $i+1 }}">{{ $plan_message[$i+1] }}</option>
                                @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="status">Status</label> 
                                <!--<input class="c-input" required name="status" id="status" placeholder="status" type="text">-->
                                <select class="c-select" name="status" id="status" >
                                    <option value="">Select status</option>
                                    
                                @for($i=0;$i < count($plan_status); $i++)
                                <option value="{{ $i+1 }}">{{ $plan_status[$i+1] }}</option>
                                @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="number">Number</label> 
                                <!--<input class="c-input" required name="number" id="number" placeholder="number" type="text">-->
                                <select class="c-select" name="number" id="number" >
                                    <option value="">Select Number</option>
                                    
                                @for($i=0;$i < count($plan_mo_no); $i++)
                                <option value="{{ $i+1 }}">{{ $plan_mo_no[$i+1] }}</option>
                                @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="information">Information</label> 
                                <!--<input class="c-input" required name="information" id="information" placeholder="information" type="text">-->
                                <select class="c-select " name="information" id="information" >
                                    <option value="">Select Information</option>
                                    
                                @for($i=0;$i < count($plan_info); $i++)
                                <option value="{{ $i+1 }}">{{ $plan_info[$i+1] }}</option>
                                @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="note">Note</label> 
                                <textarea rows="4"  class="c-input" cols="50" name="note"></textarea>
                            </div>
                        </div>
                    </div>
                    <br/>
                        <div class="c-field u-mb-small left">
                            <div class="col-mg-3">
                                <input class="c-btn c-btn--info " value="Add Plan" type="submit">&nbsp;&nbsp;
                                <input class="c-btn c-btn--secondary " value="{{ trans('employee.cancel') }}" type="reset">
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
