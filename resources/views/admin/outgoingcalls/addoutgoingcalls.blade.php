@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
@php
 $time = array_keys($arrTime);
@endphp
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <article class="c-stage">
                <div class="c-stage__header o-media u-justify-start">
                    <div class="c-stage__icon o-media__img">
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="c-stage__header-title o-media__body">
                        <h6 class="u-mb-zero">Add Outgoing Calls</h6>
                    </div>
                </div>
                <form name="add-outgoing-call" id="addoutgoingcalls" action="{{ route('customer-new-outgoing-call') }}" method="post">
                    <div class="c-stage__panel u-p-medium">
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-6">
                                <div class="c-field u-mb-small">
                                    <input class="c-input" name="customer_id" id="customer_id" value='{{ $customer_id }}' type="hidden" >
                                   <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="company">Company</label> 
                                    <input class="c-input" id="company" name="company" placeholder="Enter Company" type="text" required> 
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="firstName">Gender</label> 
                                    <select class="c-select" id="select1" name="gender" required>
                                        <!--<option>choose an option</option>-->
                                        @foreach ($gender as $indexkey=>$val)
                                        <option value="{{$indexkey}}">{{$val}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="firstName">First Name</label> 
                                    <input class="c-input" name="firstname" id="firstname" placeholder="First Name" type="text" required>
                                    
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="surname">Last Name</label> 
                                    <input class="c-input" id="lastname" name="lastname" placeholder="Last Name" type="text" required> 
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="email">Email</label> 
                                    <input class="c-input" id="email" name="email"  placeholder="Email" type="email" required> 
                                </div>
                            </div>
                            
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="telephone1">Telephone 1</label> 
                                    <input class="c-input" id="telephone1" name="telephone1"  placeholder="Telephone 1" type="text" required> 
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="telephone2">Telephone 2</label> 
                                    <input class="c-input" id="telephone2" name="telephone2"  placeholder="Telephone 2" type="text" > 
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="calltime"><h5>When do we have to maake the call ?</h5></label> 
                                </div>
                            </div> 
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="c-choice c-choice--radio">
                                    <input class="c-choice__input" id="calltime" name="calltime" type="radio">
                                    <label class="c-choice__label" for="calltime" value="1">Call as possibles</label>
                                    
                                </div>

                                <div class="c-choice c-choice--radio">
                                    <input class="c-choice__input" id="calltime2" name="calltime" type="radio">
                                    <label class="c-choice__label" for="calltime2" value="2">Running the day</label>
                                </div>
                            </div>
                            <div class="col-lg-1">
                            or
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="c-field u-mb-small">
                                            <label class="c-field__label" for="date">Date</label> 
                                            <input class="c-input" name="date" id="date" placeholder="date" type="text">
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="c-field u-mb-small">
                                            <label class="c-field__label" for="time">Time</label> 
                                            <select name="starttime" class="c-select" id="starttime">
                                                @php
                                               for($i=0; $i < count($arrTime); $i++ )
                                               {@endphp
                                               <option value="{{ $time[$i] }}"  >{{ $time[$i] }}</option>
                                               @php}
                                               @endphp
                                            </select>
                                        </div>
                                     </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="information">Information</label> 
                                    
                                    <select class="c-select" name="information" id="information" required>
                                        <option value="">Information </option>
                                        <option value="1">Information Mittleilen</option>
                                        <option value="2">Terminvereinbarung</option>
                                        <option value="3">Bestellung aufnehmen</option>
                                        <option value="4">Aurufer durchsteller</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="note">Note</label> 
                                    <textarea rows="2"  class="c-input" cols="50" name="note" required></textarea>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="c-choice c-choice--checkbox">
                                    <input class="c-choice__input" id="hereby" name="hereby" type="checkbox" required>
                                    <label class="c-choice__label" for="hereby">I hereby ask officepark GBR to make the call on my behalf.</label>
                                </div>
                            </div>
                            
                        </div>
                      
                        <div class="c-field u-mb-small left">
                            <div class="col-mg-3">
                                <input class="c-btn c-btn--info " value="Add Outgoing call" type="submit">&nbsp;&nbsp;
                                <input class="c-btn c-btn--secondary " value="{{ trans('employee.cancel') }}" type="reset">
                            </div> 
                        </div>
                    </div>
                </form>
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