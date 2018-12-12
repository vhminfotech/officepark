@extends('layouts.login_layout')
@section('content')
<div class="o-page__card o-page--center">
    <div class="c-card u-mb-xsmall">
        <header class="c-card__header u-pt-large">
            <a class="c-card__icon" href="#!">
                <img src="{{ asset('img/logo-login.svg') }}" alt="Dashboard UI Kit">
            </a>
            <h1 class="u-h3 u-text-center u-mb-zero">Forgot your password</h1>
            <p class="u-h6 u-text-mute"> Enter your email address to receive password reset instructions </p>
        </header>

        <form class="form-horizontal c-card__body" id="forgot-password" method="POST" action="{{ route('forgot-password') }}">
            {{ csrf_field() }}
            <div class="c-field u-mb-small ">
                <label class="c-field__label" for="input1">Email Address</label> 
                <input class="c-input" type="email" name="email" value="" id="input1" placeholder="clark@dashboard.com"> 
            </div>
            <button class="c-btn c-btn--info c-btn--fullwidth" type="submit">Reset Password</button>
        </form>
    </div>
</div>
@endsection
