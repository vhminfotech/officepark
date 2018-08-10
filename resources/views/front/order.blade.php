@extends('front.layouts.app')
@section('content')
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="portlet light bordered">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <span class="caption-subject font-dark-sharp bold uppercase">Status Facility</span>
                                                    </div>
                                                    <div class="portlet-body form">
                                                        <form method="POST" action="javascript:;" role="form">
                                                            <div class="form-body">
                                                                <div class="form-group">
                                                                    <div class="mt-radio-inline">
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="package" id="optionsRadios4" value="1" checked="">BUSINESS PACKAGE STANDARD
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
                                                                        <option value="2">Choose an option...</option>
                                                                        <option value="3">Company Schmidt - hello my name is Max Mustermann</option>
                                                                        <option value="4">Good day - Max Mustermann from company Schmidt, how can I help you?</option>
                                                                        <option value="5">Company Schmidt - hello my name is Max Mustermann</option>
                                                                        <option value="6">Welcome to company Schmidt, my name is Max Mustermann</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Shall we put the caller through to you (anteroom)?</label>
                                                                    <select name="reroute_confirm" required class="form-control">
                                                                        <option value="14">Choose an option...</option>
                                                                        <option value="15">No, do not make callers</option>
                                                                        <option value="16">Yes, please make all callers</option>
                                                                        <option value="17">Yes, please only make calls that want to place a new order</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Which landline or mobile number should we use to place your caller?</label>
                                                                    <input type="text" class="form-control" required name="center_to_customer_route" placeholder="Your phone number">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>If you are not available, what message should we tell your caller?</label>
                                                                    <select name="unreach_note"  required="required" class="form-control">

                                                                        <option value="7">Choose an option...</option>
                                                                        <option value="8">Currently in the phone conversation, Mr. / Ms. X will call her back</option>
                                                                        <option value="9">Currently in a training, Mr. / Mrs. X will call her back</option>
                                                                        <option value="10">Currently in an appointment, Mr. / Mrs. X will call her back</option>
                                                                        <option value="11">Currently on vacation, Mr. / Mrs. X will call her back.</option>
                                                                        <option value="12">Not in place, Mr. / Mrs. X will call her back</option>
                                                                        <option value="13">in the customer talk, Mr. / Mrs. X will call you back</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>How would you like to be informed about your call?</label>
                                                                    <div class="mt-radio-inline">
                                                                        <label class="mt-radio">
                                                                            <input type="radio" id="inlineCheckbox1" name="info_type" value="1"> only via email
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="mt-radio">
                                                                            <input type="radio" id="inlineCheckbox2" name="info_type" value="2">only by SMS
                                                                        </label>
                                                                        <label class="mt-radio">
                                                                            <input type="radio" id="inlineCheckbox2" name="info_type" value="3"> via e-mail and SMS
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
                                                                <span class="caption-subject font-dark-sharp bold uppercase">YOUR COMPANY DATA</span>
                                                                <h5>Please enter your data correctly as follows:</h5>
                                                            </div>

                                                        </div>
                                                        <div class="portlet-body form">
                                                            <div class="form-body">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" required name="company" placeholder="Company">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" required name="company_type" placeholder="Industry (example: law firm, architects office, doctor's office, etc.)">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>What is your company doing?</label>
                                                                    <textarea  class="form-control" required name="company-info" rows="3" placeholder="Tell us a bit about your business and the business purpose. Your information will help us prepare better for the caller."></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>gender</label>
                                                                    <select required name="gender" class="form-control">
                                                                        <option>choose an option</option>
                                                                        <option value="M">Sir</option>
                                                                        <option value="F">Mrs</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" required name="fullname" placeholder="First and Last Name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" required name="date_of_birth" placeholder="Date of birth">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" required name="address" placeholder="Address &amp; House number">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" required name="postal_code" placeholder="Postcode & city">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" required name="phone" placeholder="Telephone">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" required name="email" placeholder="E-Mail">
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
                                                                <span class="caption-subject font-dark-sharp bold uppercase">PAYMENT DATA</span>
                                                                <h5>Please enter your data correctly as follows:</h5>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body form">
                                                            <div class="form-body">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" required name="account_name" placeholder="Kontoinhaber">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" required name="iban" placeholder="IBAN">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" required name="bic" placeholder="BIC">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="mt-radio-list">
                                                                    <label>
                                                                        <input type="radio" value="sepa" id="payinfo" required name="accept">Yes, I give Office Park GbR a SEPA mandate.
                                                                    </label>
                                                                    <div id="sepa" class="collapse">
                                                                        <p>
                                                                            I authorize Office Park GbR, Münsterstraße 330, Building B, 40470 Düsseldorf, to collect payments from my account by direct debit. At the same time I instruct my bank to redeem the direct debits drawn by Office Park GbR into my account. In the case of a return debit due to lack of cover, a fee of 10, - € will be due net.
                                                                        </p>
                                                                    </div>
                                                                    <label>  <input type="radio" value="uber" id="payinfo" required name="accept"> transfer
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
                                                            <button type="submit" class="btn btn-primary">Sent</button>
                                                            </form>
                                                            <script>
                                                                $('input:radio[name="accept"]').change(function() {
                                                                    if ($(this).val() == 'sepa') {
                                                                        $("#sepa").show();
                                                                    }
                                                                    else {
                                                                        $("#sepa").hide();
                                                                    }
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                    <!-- END SAMPLE FORM PORTLET-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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