@extends('front.layouts.app')
@section('content')
<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".flash_message").fadeTo(4500, 0).slideUp(4500, function() {
                $(this).hide();
            });
        });
    });
</script>

<body class="page-container-bg-solid">
    <div class="page-wrapper">
        <div class="page-wrapper-row full-height">
            <div class="page-wrapper-middle">
                <!-- BEGIN CONTAINER -->
                <div class="page-container">
                    <div class="page-content-wrapper">
                        <div class="page-content">
                            <div class="container-fluid">
                                <div class="page-content-inner">
                                    <!--<form method="POST" action="{{ route('order') }}" role="form" id="addOrderForm">-->
                                        <!--<input name="_token" value="{{ csrf_token() }}" type="hidden">-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if(Session::has('message'))
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p class="flash_message alert {{ Session::get('class') }}">{{ Session::get('message') }}</p>
                                                </div>
                                            </div>
                                            @endif
                                            @if($errors->count() > 0)
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>The following errors have occurred:</p>
                                                    <ul class="error-list">
                                                        @foreach( $errors->all() as $message )
                                                        <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        {{ Form::model(array('method' => 'post'),['class' => '', 'id'=>'addOrderForm']) }}
                                        <div class="col-md-6">
                                            <div class="portlet light bordered">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <span class="caption-subject font-dark-sharp bold uppercase">Status Facility</span>
                                                    </div>
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <div class="mt-radio-inline">
                                                                    <label class="mt-radio">
                                                                        <input type="radio" name="is_package" id="optionsRadios4" value="1" checked="">BUSINESS PACKAGE STANDARD
                                                                        <span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Please enter the phone number you would like to forward to us</label>
                                                                <input type="text" class="form-control" required name="phone_to_reroute" placeholder="Your phone number">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>How should we contact you on the phone?</label>
                                                                <select name="welcome_note" required="required" class="form-control">
                                                                    @foreach ($welcome_note as $indexkey=>$val)
                                                                    <option value="{{$indexkey}}">{{$val}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Shall we put the caller through to you (anteroom)?</label>
                                                                <select name="reroute_confirm" required class="form-control">
                                                                    @foreach ($reroute_confirm as $indexkey=>$val)
                                                                    <option value="{{$indexkey}}">{{$val}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Which landline or mobile number should we use to place your caller?</label>
                                                                {{ Form::text('center_to_customer_route', null, array('class' => 'form-control', 'placeholder' => 'Your phone number', 'required')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label>if they are not reachable, we should inform the caller of the soft message.</label>
                                                                <select name="unreach_note"  required="required" class="form-control">
                                                                    @foreach ($unreach_note as $indexkey=>$val)
                                                                    <option value="{{$indexkey}}">{{$val}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>How would you like to be informed about your call?</label>
                                                                <div class="mt-radio-inline">
                                                                    <label class="mt-radio">
                                                                        <input type="radio" id="inlineCheckbox1" name="info_type" value="1" checked> only via email
                                                                        <span></span>
                                                                    </label>
                                                                    <label class="mt-radio">
                                                                        <input type="radio" id="inlineCheckbox2" name="info_type" value="2">only by SMS
                                                                        <span></span>
                                                                    </label>
                                                                    <label class="mt-radio">
                                                                        <input type="radio" id="inlineCheckbox3" name="info_type" value="3"> via e-mail and SMS
                                                                        <span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END SAMPLE FORM PORTLET-->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <!-- BEGIN SAMPLE FORM PORTLET-->
                                                    <div class="portlet light bordered">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <span class="caption-subject font-dark-sharp bold uppercase" style="margin-bottom: 10px;display: block;">YOUR COMPANY DATA</span>
                                                                <p>Please enter your data correctly as follows:</p>
                                                            </div>

                                                        </div>
                                                        <div class="portlet-body form">
                                                            <div class="form-body">
                                                                <div class="form-group">
                                                                    {{ Form::text('company_name', null, array('class' => 'form-control', 'placeholder' => 'Company Name', 'required')) }}
                                                                </div>
                                                                <div class="form-group">
                                                                    {{ Form::text('company_type', null, array('class' => 'form-control', 'placeholder' => "Industry (example: law firm, architects office, doctor's office, etc.)", 'required')) }}
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>What is your company doing?</label>
                                                                    {{ Form::textarea('company_info', null, array('class' => 'form-control', 'placeholder' => "Company Info", 'required')) }}
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>gender</label>
                                                                    <select name="gender" required="required" class="form-control">
                                                                        <option value="">choose an option</option>
                                                                        @foreach ($gender as $indexkey=>$val)
                                                                        <option value="{{$indexkey}}">{{$val}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    {{ Form::text('fullname', null, array('class' => 'form-control', 'placeholder' => 'First and Last Name', 'required')) }}
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="c-field has-addon-left">
                                                                        <!--<span class="c-field__addon"><i class="fa fa-calendar"></i></span>-->
                                                                        <label class="c-field__label u-hidden-visually" for="input9">Disabled Input</label>
                                                                        <input class="c-input form-control" style="border: 1px solid #c2cad8;color:#555;" data-toggle="datepicker" id="input9" name="date_of_birth" type="text" placeholder="Date of birth" required>
                                                                    </div>
                                                                    <!--{{ Form::text('date_of_birth', null, array('class' => 'form-control dateField', 'placeholder' => 'Date of birth', 'required')) }}-->
                                                                </div>
                                                                <div class="form-group">
                                                                    {{ Form::text('address', null, array('class' => 'form-control', 'placeholder' => 'Address & House number', 'required')) }}
                                                                </div>
                                                                <div class="form-group">
                                                                    {{ Form::text('postal_code', null, array('class' => 'form-control', 'placeholder' => 'Postcode & city', 'required')) }}
                                                                </div>
                                                                <div class="form-group">
                                                                    {{ Form::text('phone', null, array('class' => 'form-control', 'placeholder' => 'Telephone', 'required')) }}
                                                                </div>
                                                                <div class="form-group">
                                                                    {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'E-Mail', 'required')) }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END SAMPLE FORM PORTLET-->
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- BEGIN SAMPLE FORM PORTLET-->
                                                    <div class="portlet light bordered">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <span class="caption-subject font-dark-sharp bold uppercase" style="margin-bottom: 10px;display: block;">PAYMENT DATA</span>
                                                                <p>Please enter your data correctly as follows:</p>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body form">
                                                            <div class="form-body accountInfo">
                                                                <div class="form-group">
                                                                    {{ Form::text('account_name', null, array('class' => 'form-control', 'placeholder' => 'Kontoinhaber')) }}
                                                                </div>
                                                                <div class="form-group">
                                                                    {{ Form::text('account_iban', null, array('class' => 'form-control', 'placeholder' => 'IBAN')) }}
                                                                </div>
                                                                <div class="form-group">
                                                                    {{ Form::text('account_bic', null, array('class' => 'form-control', 'placeholder' => 'BIC')) }}
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="mt-radio-list">
                                                                    <label>
                                                                        <input type="radio" value="sepa" id="payinfo" required name="accept" class="accept"> Yes, I give Office Park GbR a SEPA mandate.
                                                                    </label>
                                                                    <div id="sepa" class="collapse">
                                                                        <p>
                                                                            I authorize Office Park GbR, Münsterstraße 330, Building B, 40470 Düsseldorf, to collect payments from my account by direct debit. At the same time I instruct my bank to redeem the direct debits drawn by Office Park GbR into my account. In the case of a return debit due to lack of cover, a fee of 10, - € will be due net.
                                                                        </p>
                                                                    </div>
                                                                    <label>  
                                                                        <input type="radio" value="uber" id="payinfo" required name="accept" class="accept"> transfer
                                                                        <span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="mt-checkbox-inline">
                                                                    <label class="mt-checkbox">
                                                                        <input type="checkbox" name="aggrement" required id="inlineCheckbox1" value="1">  <a target="_blank" href="https://uzaktansekreter.de/allgemeine-geschaeftsbedingungen/">I have read the terms and conditions and I agree.</a>
                                                                        <span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Send</button>
                                                        </div>
                                                    </div>
                                                    <!-- END SAMPLE FORM PORTLET-->
                                                </div>
                                            </div>
                                        </div>
                                        {{ Form::close() }}
                                    </div>
                                    <!--</form>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection