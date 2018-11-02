@extends('layouts.login_layout')
@section('content')
<div class="o-page__card o-page--center">
    <div class="c-card u-mb-xsmall">
        <header class="c-card__header u-pt-large">
            <a class="c-card__icon" href="#!">
                <img src="{{ asset('img/logo-login.svg') }}" alt="Dashboard UI Kit">
            </a>
            <h1 class="u-h3 u-text-center u-mb-zero">{{ trans('login.welcome_back')}}</h1>
        </header>
        
        <div id="errorSection" style="width:100% !important;">

            @if (session('session_error'))
            <div class="alert alert-danger">
                {{ session('session_error') }}
                <div class="pull-right closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
            </div>
            @endif

            @if (session('session_success'))
            <div class="alert alert-success">
                {{ session('session_success') }}
                <div class="pull-right closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
            </div>
            @endif

            @if (session('session_alert'))
            <div class="alert alert-warning">
                {{ session('session_alert') }}
                <div class="pull-right closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
            </div>
            @endif
        </div>

        <form class="form-horizontal c-card__body" id="login" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="c-field u-mb-small {{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="c-field__label" for="input1">{{ trans('login.log_in_with_mail')}}</label> 
                <input class="c-input" type="email" name="email" value="{{ old('email') }}" id="input1" placeholder="clark@dashboard.com"> 
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div class="c-field u-mb-small {{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="c-field__label" for="input2">{{ trans('login.password')}}</label> 
                <input class="c-input" type="password" name="password" id="input2" placeholder="{{ trans('login.password')}}"> 
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>

            <button class="c-btn c-btn--info c-btn--fullwidth" type="submit">{{ trans('login.sign_in_dashborad')}}</button>

            <span class="c-divider c-divider--small has-text u-mv-medium">{{ trans('login.social_network')}}</span>

            <div class="o-line">
                <a class="c-icon u-bg-twitter" href="#!">
                    <i class="fa fa-twitter"></i>
                </a>

                <a class="c-icon u-bg-facebook" href="#!">
                    <i class="fa fa-facebook"></i>
                </a>

                <a class="c-icon u-bg-pinterest" href="#!">
                    <i class="fa fa-pinterest"></i>
                </a>

                <a class="c-icon u-bg-dribbble" href="#!">
                    <i class="fa fa-dribbble"></i>
                </a>
            </div>
        </form>
    </div>

    <div class="o-line">
        <a class="u-text-mute u-text-small" href="register.html">{{ trans('login.register')}}</a>
        <a class="u-text-mute u-text-small" href="forgot-password.html">{{ trans('login.forgot_password')}}</a>
    </div>
</div>

<style>
    .alert {
	margin: 0px 10px;
    }
    .alert-danger{
       background-color: #fc9680; 
    }
    .alert-success{
       background-color: #8ddd72; 
    }
    .alert-warning{
       background-color: #f2ec89; 
    }
</style>
@endsection
