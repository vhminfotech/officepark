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
                        <h6 class="u-mb-zero">Add new System User</h6>
                    </div>
                </div>
                <form name="edit-user" id="editSystemUser" action="{{ route('system-edit-user',$userDetail[0]->id) }}" method="post">
                    <div class="c-stage__panel u-p-medium">
                        <div class="row">
                            <div class="col-lg-6">
                               @php
                                $name = explode(' ',$userDetail[0]->name);
                                
                                $firstname = $name[0];
                                $lastname = $name[1];
                               @endphp
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="firstName">First Name</label> 
                                    <input class="c-input" name="firstName" id="firstName" placeholder="Jason" type="text" value='{{ $firstname }}'>
                                    <input type="hidden" name="user_id" value="{{ $userDetail[0]->id }}"  class="form-control">
                                    <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="lastName">Last Name</label> 
                                    <input class="c-input" id="lastName" name="lastName" placeholder="Jason" type="text" value='{{ $lastname }}'> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="email">Email</label> 
                                    <input class="c-input" id="email" name="email" placeholder="Enter Email" type="text" value='{{ $userDetail[0]->email }}' readonly> 
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="inoplaName">Inopla username</label> 
                                    <input class="c-input" id="inoplaName" name="inoplaName" placeholder="Jason" type="text" value='{{ $userDetail[0]->inopla_username }}'> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="exNumber">Extension number</label> 
                                    <input class="c-input" id="exNumber" name="exNumber"  placeholder="Jason" type="text" value='{{ $userDetail[0]->extension_number }}'> 
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="langauge">Language selection</label> 
                                    <input class="c-input" id="langauge" name="langauge" placeholder="Jason" type="text" value='{{ $userDetail[0]->var_language }}'> 
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="firstName">Permissions</label> 
                                    <div class="row">
                                        @php
                                        $count = 1;
                                        $checked = '';
                                        @endphp
                                        @for($i = 0 ;$i < count($masterPermission);$i++,$count++)
                                        
                                        <div class="c-choice c-choice--checkbox col-lg-3">
                                            <input class="c-choice__input" value="{{ $masterPermission[$i]->id }}" id="checkbox{{ $count }}" name="checkboxes[]" type="checkbox" 
                                                   {{ (in_array($masterPermission[$i]->id,$userPermission)) ? 'checked="checked" ' : '' }} >
                                            <label class="c-choice__label" for="checkbox{{ $count }}">{{ $masterPermission[$i]->name }}</label>
                                        </div>
                                        @endfor
                                    </div>   

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input class="c-btn c-btn--info c-btn--fullwidth" value="Edit" type="submit">
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