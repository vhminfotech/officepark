@extends('front.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="o-page__card o-page--center">
            <h2 style="text-align: center;">Create Client</h2>
            
                <form class="form-horizontal c-card__body" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="c-field u-mb-small {{ $errors->has('fname') ? ' has-error' : '' }}">
                <label class="c-field__label" for="input1">First name</label> 
                <input class="c-input" type="text" name="fname" id="input1" placeholder="Enter Firstname"> 
                @if ($errors->has('fname'))
                <span class="help-block">
                    <strong>{{ $errors->first('fname') }}</strong>
                </span>
                @endif
            </div>

            <div class="c-field u-mb-small {{ $errors->has('lname') ? ' has-error' : '' }}">
                <label class="c-field__label" for="input2">Last Name</label> 
                <input class="c-input" type="text" name="lanme" id="input2" placeholder="Enter Lasttname"> 
                @if ($errors->has('lname'))
                <span class="help-block">
                    <strong>{{ $errors->first('lname') }}</strong>
                </span>
                @endif
            </div>
            
            <div class="c-field u-mb-small {{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="c-field__label" for="input3">Email</label> 
                <input class="c-input" type="email" name="email" id="input3" placeholder="Enter Email"> 
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            
            <div class="c-field u-mb-small {{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="c-field__label" for="input4">Password</label> 
                <input class="c-input" type="password" name="password" id="input4" placeholder="Enter Password"> 
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="c-field u-mb-small {{ $errors->has('cpassword') ? ' has-error' : '' }}">
                <label class="c-field__label" for="input5">Confirm Password</label> 
                <input class="c-input" type="password" name="cpassword" id="input5" placeholder="Enter Confirm Password"> 
                @if ($errors->has('cpassword'))
                <span class="help-block">
                    <strong>{{ $errors->first('cpassword') }}</strong>
                </span>
                @endif
            </div>
            <div class="c-field u-mb-small {{ $errors->has('company_name') ? ' has-error' : '' }}">
                <label class="c-field__label" for="input6">Company Name</label> 
                <input class="c-input" type="text" name="company_name" id="input6" placeholder="Enter Company"> 
                @if ($errors->has('company_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('company_name') }}</strong>
                </span>
                @endif
            </div>
            <div class="c-field u-mb-small {{ $errors->has('company_phone') ? ' has-error' : '' }}">
                <label class="c-field__label" for="input7">Company Phone no</label> 
                <input class="c-input" type="text" name="company_phone" id="input7" placeholder="Enter Phone number"> 
                @if ($errors->has('company_phone'))
                <span class="help-block">
                    <strong>{{ $errors->first('company_phone') }}</strong>
                </span>
                @endif
            </div>
            <div class="c-field u-mb-small {{ $errors->has('address') ? ' has-error' : '' }}">
                <label class="c-field__label" for="input8">Address</label> 
                <textarea class="c-input" name="address" id="input8" placeholder="Enter Address"></textarea> 
                @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
                @endif
            </div>

            <button class="c-btn c-btn--info c-btn--fullwidth" type="submit">Sign In</button>

        </form>
           
        </div>
    </div>
</div>
@endsection
