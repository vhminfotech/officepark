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
                        <h6 class="u-mb-zero">Edit Customer Status</h6>
                    </div>
                </div>
                <form class="orderStatus" name="orderStatus" action="{{ route('edit-order',array('id' => $arrOrder[0]->id,'userId' => $arrOrder[0]->user_id )) }}" id="orderStatus">
                    <div class="c-stage__panel u-p-medium">
                      
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="phone_to_reroute">{{ trans('customer.phone_to_redirect')}}</label> 
                                   <input  class="c-input  phone_to_reroute" value="{{ $arrOrder[0]->phone_to_reroute }}" id="phone_to_reroute" name='phone_to_reroute'>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="firstName">{{ trans('customer.welcome_msg')}}</label> 
                                     <select name="welcome_note" required="required" class="c-input  welcome_note">
                                        @foreach ($welcome_note as $indexkey=>$val)
                                        <option value="{{$indexkey}}" {{ ($welcome_note[$arrOrder[0]->welcome_note] == $val ? 'selected="selected"' : '') }}>{{$val}}</option>
                                        @endforeach
                                    </select>
                                    <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                    <input class="c-input" type="hidden" name="orderid" id="id" value="{{ $arrOrder[0]->id }}">
                                    <input class="c-input" type="hidden" name="user_id" id="user_id" value="{{ $arrOrder[0]->user_id }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="surname">{{ trans('customer.unavailable_msg')}}</label> 
                                     <select name="unreach_note" required="required" class="c-input  unreach_note">
                                        @foreach ($unreach_note as $indexkey=>$val)
                                        <option value="{{$indexkey}}" {{ ($unreach_note[$arrOrder[0]->unreach_note] == $val ? 'selected="selected"' : '') }}>{{$val}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="company">{{ trans('customer.reroute_confirm')}}</label> 
                                     <select name="reroute_confirm"  required="required" class="c-input  reroute_confirm">
                                        @foreach ($reroute_confirm as $indexkey=>$val)
                                        <option value="{{$indexkey}}" {{ ($reroute_confirm[$arrOrder[0]->reroute_confirm] == $val ? 'selected="selected"' : '') }}>{{$val}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="position">{{ trans('customer.forward_msg')}}</label> 
                                      <select id="forward_message" name='forward_message'required="required" class="c-input  forward_message">
                                        @foreach ($unreach_note as $indexkeys=>$vals)
                                        <option value="{{$indexkeys}}" {{ ($unreach_note[$arrOrder[0]->unreach_note] == $vals ? 'selected="selected"' : '') }}>{{$vals}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="telephone_number">{{ trans('customer.telephone_number')}}</label> 
                                    <input class="c-input" id="telephone_number" value="{{ $arrOrder[0]->phone }}" name="telephone_number" maxlength="12" placeholder="Telephone number" type="number"> 
                                </div>
                            </div>
                        </div>
                     
                        <div class="row">
                            <div class="col-lg-3">
                                <input class="c-btn c-btn--info c-btn--fullwidth" value="{{ trans('customer.add')}}" type="submit">
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