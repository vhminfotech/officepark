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
                <form name="add-user" id="addSystemUser" action="{{ route('system-add-user') }}" method="post">
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
                                    <select class="c-select" id="jobtitle" name="jobtitle">
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="responsibility">Responsibility</label> 
                                    <select class="c-select" id="responsibility" name="responsibility">
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="langauge">P away msg</label> 
                                    <select class="c-select" id="langauge" name="langauge">

                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="callbacksms1"> Call Back msg</label> 
                                    <select class="c-select" id="callbacksms1" name="callbacksms1">
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                    </select>
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
                                    <textarea rows="4" cols="60" name="anyotherinformation">
                                        
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
                        <div class="col-lg-6">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="callbacksms">My Profile</label> 
                                <select class="c-select" id="callbacksms" name="standard">
                                    <option value="Standard">Standard</option>
                                    <option value=""></option>
                                    <option value=""></option>
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
                                <div class="u-p-medium">
                                    <div class="u-p-medium">
                                        
                                    </div>
                                </div>   
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
                                <div class="u-p-medium">
                                    <div class="col-lg-12">
                                        <div class="col-lg-2">
                                            <input class="c-choice__input" id="checkbox5" name="checkboxes" type="checkbox">
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="c-field u-mb-small">
                                                <select class="c-select" id="ch1" name="ch1">
                                                    <option value="Standard">Standard</option>
                                                    <option value="">1</option>
                                                    <option value="">12</option>
                                                </select>
                                            </div>
                                        </div>
\                                    </div>   
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
                            <a class="c-stage__header u-flex u-justify-between collapsed" data-toggle="collapse" href="#stage-pane3" aria-expanded="false" aria-controls="stage-pane3">
                                <h6 class="u-text-mute u-text-uppercase u-text-small u-mb-zero">Global Holidays</h6>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                            <div class="c-stage__panel c-stage__panel--mute collapse" id="stage-pane3" style="">
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


</style>

@endsection