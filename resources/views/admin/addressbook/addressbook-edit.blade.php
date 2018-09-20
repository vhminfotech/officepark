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
                        <h6 class="u-mb-zero">Edit Addressbook</h6>
                    </div>
                </div>
                <form name="edit-addressbook" id="editAddressbook" action="{{ route('address-book-edit' ,$addbkDetail[0]->id ) }}" method="post">
                    <div class="c-stage__panel u-p-medium">
                         <div class="row">
                            <div class="col-lg-6 col-lg-offset-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="firstName">Customer Number</label> 
                                    {{ Form::select('customer_id', $arrOrderInfo , (empty($addbkDetail[0]->customer_id) ? null : $addbkDetail[0]->customer_id), array('class' => 'c-select', 'id' => 'customer_id')) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="firstName">Gender</label> 
                                    <select class="c-select" id="select1" name="gender">
                                        <!--<option>choose an option</option>-->
                                        @foreach ($gender as $indexkey=>$val)
                                        <option value="{{$indexkey}}" {{ ($addbkDetail[0]->gender == $indexkey ? 'selected="selected"' : '') }}>{{$val}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="firstName">First Name</label> 
                                    <input class="c-input" name="firstname" id="firstname" placeholder="First Name" type="text" value="{{ $addbkDetail[0]->firstname }}">
                                    <input class="c-input" name="address_book_id" placeholder="First Name" type="hidden" value="{{ $addbkDetail[0]->id }}">
                                    <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="surname">Surname</label> 
                                    <input class="c-input" id="surname" name="surname" placeholder="Surname" type="text" value="{{ $addbkDetail[0]->surname }}"> 
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="company">Company</label> 
                                    <input class="c-input" id="company" name="company" placeholder="Enter Company" type="text" value="{{ $addbkDetail[0]->company }}"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="position">Position</label> 
                                    <input class="c-input" id="position" name="position" placeholder="Position" type="text" value="{{ $addbkDetail[0]->position }}"> 
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="telephone_number">Telephone number</label> 
                                    <input class="c-input" id="telephone_number" name="telephone_number" placeholder="Telephone number" type="text" value="{{ $addbkDetail[0]->telephone_number }}"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="mobile_number">Mobile number</label> 
                                    <input class="c-input" id="mobile_number" name="mobile_number" maxlength="12" value="{{ $addbkDetail[0]->mobile }}" placeholder="Mobile number" type="number"> 
                                </div>
                            </div> 
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="telephone">Telefax</label> 
                                    <input class="c-input" id="telephone" name="telephone" maxlength="6" value="{{ $addbkDetail[0]->telefax }}" placeholder="Telefax" type="number"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="email">Email</label> 
                                    <input class="c-input" id="email" name="email"  placeholder="Email" type="email" value="{{ $addbkDetail[0]->email }}" readonly="true">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="note">Note</label> 
                                    <input class="c-input" id="note" name="note" value="{{ $addbkDetail[0]->note }}" placeholder="note" type="text"> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <input class="c-btn c-btn--info c-btn--fullwidth" value="Edit" type="submit">
                            </div>
                        </div>
                    </div>
                </form>
            </article>
        </div>
    </div>
</div>
<style>
    input.has-error { border-color: red; }
</style>
@endsection