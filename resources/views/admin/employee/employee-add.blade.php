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
                                    <label class="c-field__label" for="callbacksms"> Call Back msg</label> 
                                    <select class="c-select" id="callbacksms" name="callbacksms">
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
                                    <input class="c-choice__input" id="checkbox3" name="checkboxes" type="checkbox">
                                    <label class="c-choice__label" for="checkbox3">Transfer Incoming call To Telephone</label>
                                </div>
                            </div>
                            <div class="c-field u-mb-small">
                                <div class="c-choice c-choice--checkbox">
                                    <input class="c-choice__input" id="checkbox3" name="checkboxes" type="checkbox">
                                    <label class="c-choice__label" for="checkbox3">Transfer Incoming call To Mobile Phone</label>
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
                                    <input class="c-choice__input" id="checkbox3" name="checkboxes" type="checkbox">
                                    <label class="c-choice__label" for="checkbox3">Transfer Incoming call To Mobile Phone</label>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <a class="c-stage__header u-flex u-justify-between collapsed" data-toggle="collapse" href="#stage-panel2" aria-expanded="false" aria-controls="stage-panel2">
                                <h6 class="u-text-mute u-text-uppercase u-text-small u-mb-zero">Bussines Hours/Global</h6>

                                <i class="fa fa-angle-down u-text-mute"></i>
                            </a>

                           <div class="c-stage__panel c-stage__panel--mute collapse" id="stage-panel2" style="">
                                <div class="u-p-medium">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita quo dicta, accusantium, nesciunt vero reiciendis deserunt voluptas ullam aperiam ipsa obcaecati. Perspiciatis est, ut quas at, eaque itaque dicta quibusdam.</p>
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