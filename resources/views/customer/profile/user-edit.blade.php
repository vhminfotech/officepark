@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <div class="row u-mb-large">
                <div class="col-12">
                    <div class="c-tabs">
                        <ul class="c-tabs__list c-tabs__list--splitted nav nav-tabs" id="myTab" role="tablist">
                            <li class="c-tabs__item"><a class="c-tabs__link active show" id="nav-profile-tab" data-id="2"  data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Change Password</a></li>
                            </ul>
                    
                        <div class="c-tabs__content tab-content" id="nav-tabContent">
                            <div class="c-tabs__pane active show " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <form name="editUser" enctype="multipart/form-data" id="changepassword" action="{{ route('customer-change-password') }}" method="post">
                                    <div class="row changepassworddiv" style="" >
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="col-lg-2 u-text-center">
                                            <div class="c-avatar c-avatar--xlarge u-inline-block">
                                                <img class="c-avatar__img" src="{{ url('uploads/employee/'.$detail['user_image']) }}" alt="Avatar">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="c-field u-mb-small">
                                                <label class="c-field__label" for="currentpassword">Old Password</label> 
                                                <input class="c-input" id="currentpassword"  name="currentpassword"  type="password"> 
                                            </div>
                                            <div class="c-field u-mb-small">
                                                <label class="c-field__label" for="newpassword">New Password</label> 
                                                <input class="c-input" id="newpassword"  name="newpassword"  type="password"> 
                                            </div>
                                            <div class="c-field u-mb-small">
                                                <label class="c-field__label" for="confirmpassword">Confirm Password</label>
                                                <input class="c-input" id="confirmpassword"  name="confirmpassword"  type="password">
                                            </div>
                                        </div>
                                        <div class="col-lg-5"></div>
                                        <div class="">
                                            <label class="c-field__label col-lg-offset-4" for=""></label>
                                            <div class="col-lg-12 ">
                                                <div class="col u-mb-medium">
                                                    <input type="submit" class="c-btn c-btn--info c-btn--fullwidth" value="ChangePassword">
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- // .col-12 -->
                </div>
            </div><!-- // .col-12 -->
        </div>
    </div><!-- // .container -->
    <style>
        input.has-errosr {
            border-color: red;
        }
    </style>
    @endsection
