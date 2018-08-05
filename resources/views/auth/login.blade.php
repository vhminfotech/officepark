@extends('layouts.login_layout')
@section('content')
<div class="o-page__card o-page--center">
    <div class="c-card u-mb-xsmall">
        <header class="c-card__header u-pt-large">
            <a class="c-card__icon" href="#!">
                <img src="{{ asset('img/logo-login.svg') }}" alt="Dashboard UI Kit">
            </a>
            <h1 class="u-h3 u-text-center u-mb-zero">Welcome back! Please login.</h1>
        </header>

        <form class="form-horizontal c-card__body" id="login" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="c-field u-mb-small {{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="c-field__label" for="input1">Log in with your e-mail address</label> 
                <input class="c-input" type="email" name="email" value="{{ old('email') }}" id="input1" placeholder="clark@dashboard.com"> 
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div class="c-field u-mb-small {{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="c-field__label" for="input2">Password</label> 
                <input class="c-input" type="password" name="password" id="input2" placeholder="password"> 
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>

            <button class="c-btn c-btn--info c-btn--fullwidth" type="submit">Sign in to Dashboard</button>

            <span class="c-divider c-divider--small has-text u-mv-medium">Login via social networks</span>

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
        <a class="u-text-mute u-text-small" href="register.html">Donâ€™t have an account yet? Get Started</a>
        <a class="u-text-mute u-text-small" href="forgot-password.html">Forgot Password?</a>
    </div>
</div>
@endsection
