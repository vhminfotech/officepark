<style>
    .c-plan{
        padding:20px 20px 25px;
        margin: 0px;
    }
    .c-tabs__list--splitted .c-tabs__link.active, .c-tabs__list--splitted .c-tabs__link.is-active {
        padding: 10px;
        font-size: 13px;
        display: inline-block;
        -ms-flex-item-align: end;
        align-self: flex-end;
        margin-right: 4px;
    }

    .c-tabs__list--splitted .c-tabs__link {
        display: inline-block;
        -ms-flex-item-align: end;
        align-self: flex-end;
        margin-right: 5px;
        padding: 15px;
        border: 1px solid #dfe3e9;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        font-size: 13px;
        background: #fff;
        background: linear-gradient(180deg,#fff,#f4f7fa);
    }

    .container {
        width: 100%;
        padding-right: 0px; 
        padding-left: 0px; 

    }
</style>
<input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-3">
                    <article class="c-plan">
                        <h4>
                            <b><span id="company_name"></span></b></h4>                                        
                        <ul>
                            <li class="c-plan__feature">
                                <strong>{{ trans('calls.customer-number') }}:</strong>
                                <br> <span id="customer_number"></span>
                            </li>
                            <li class="c-plan__feature">
                                <strong>System Number :</strong>
                                <br> <span id="system_number"></span>
                            </li>
                            <li class="c-plan__feature">
                                <strong>{{ trans('calls.surname') }}:</strong> 
                                <br><span id="name"></span>
                            </li>

                            <li class="c-plan__feature">
                                <strong>{{ trans('customer.email') }} :</strong> 
                                <br><span id="email"></span>
                            </li>

                            <li class="c-plan__feature">
                                <strong>{{ trans('calls.telephone-number') }}:</strong>
                                <br><span id="caller"></span>
                            </li>
                        </ul>
                        <br>
                        <h4><b>Business/Hours</b> </h4>
                        <ul>
                            <li class="c-plan__feature">
                                <strong>{{ trans('employee.monday') }}:</strong>
                                <br> <span id="start_time_1"></span> - <span id="end_time_1"></span> 
                            </li>
                            <li class="c-plan__feature">
                                <strong>{{ trans('employee.tuesday') }}:</strong>
                                <br> <span id="start_time_2"></span> - <span id="end_time_2"></span> 
                            </li>
                            <li class="c-plan__feature">
                                <strong>{{ trans('employee.wednesday') }}:</strong> 
                                <br> <span id="start_time_3"></span> - <span id="end_time_3"></span>
                            </li>

                            <li class="c-plan__feature">
                                <strong>{{ trans('employee.thursday') }} :</strong> 
                                <br>    <span id="start_time_4"></span> - <span id="end_time_4"></span>
                            </li>

                            <li class="c-plan__feature">
                                <strong>{{ trans('employee.friday') }}:</strong>
                                <br><span id="start_time_5"></span> - <span id="end_time_5"></span>
                            </li>

                            <li class="c-plan__feature">
                                <strong>{{ trans('employee.saturday') }}:</strong>
                                <br><span id="start_time_6"></span> - <span id="end_time_6"></span>
                            </li>

                            <li class="c-plan__feature">
                                <strong>{{ trans('employee.sunday') }}:</strong>
                                <br><span id="start_time_0"></span> - <span id="end_time_0"></span>
                            </li>
                        </ul>
                        <br>
                        <h4><b>Lunch Time</b></h4>
                        <ul >
                            <li class="c-plan__feature" >
                                <strong><span id="start_time_lunch"></span> - <span id="end_time_lunch"></span></strong>                                                
                            </li>
                        </ul>
                        <br>
                        <h4><b>{{ trans('employee.global-holidays') }}</b></h4>

                        <ul >
                            <li class="c-plan__feature">
                                <strong>{{ trans('employee.holiday-global-from') }}:</strong>
                                <br><span id="holiday_start"></span>
                            </li>                                            
                            <li class="c-plan__feature">
                                <strong>{{ trans('employee.holiday-global-to') }}:</strong>
                                <br><span id="holiday_end"></span>
                            </li>
                        </ul>
                        <br>
                        <h4><b>Information For Company</b></h4>

                    </article>
                </div>
                <div class="col-md-5">
                    <article class="c-plan">
                        <h4><b>Actually Status - Mr. Max Mustermann</b></h4>
                        <ul>
                            <li class="c-plan__feature">
                                <strong>How should we contact you on the phone ?</strong>
                                <br> <span id="welcome_note"></span>
                            </li>

                            <li class="c-plan__feature">
                                <strong>Shall we put the caller though to you ?</strong>
                                <br> <span id="reroute_confirm"></span>
                            </li>

                            <li class="c-plan__feature">
                                <strong>Information</strong>
                                <br> <span id="company_info"></span>
                            </li>
                        </ul>
                        <h4><b>{{ trans('employee.employee') }}</b></h4>
                        <div class="container">
                            <div class="c-tabs">
                                <ul class="c-tabs__list c-tabs__list--splitted nav nav-tabs" id="myTab" role="tablist">
                                    <li class="c-tabs__item"><a class="c-tabs__link active" id="nav-home-tab" data-toggle="tab" href="#accounting" role="tab" aria-controls="nav-home" aria-selected="true">Accounting</a></li>
                                    <li class="c-tabs__item"><a class="c-tabs__link" id="nav-profile-tab" data-toggle="tab" href="#advisor" role="tab" aria-controls="nav-profile" aria-selected="false">Customer Advisor</a></li>
                                    <li class="c-tabs__item"><a class="c-tabs__link" id="nav-profile-tab" data-toggle="tab" href="#services" role="tab" aria-controls="nav-profile" aria-selected="false">Technical Services</a></li>
                                </ul>

                                <div class="c-tabs__content " id="nav-tabContent"> 
                                    <div class="c-tabs__pane active" id="accounting" role="tabpanel" aria-labelledby="nav-home-tab" style="overflow-y:auto;height:300px">
                                    </div>

                                    <div class="c-tabs__pane" id="advisor" role="tabpanel" aria-labelledby="nav-profile-tab" style="overflow-y:auto;height:300px">
                                    </div>

                                    <div class="c-tabs__pane" id="services" role="tabpanel" aria-labelledby="nav-profile-tab" style="overflow-y:auto;height:300px">                                                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-md-4">

                    <article class="c-plan">
                        <h4><b>Sent Call Information Mail</b></h4>
                        <form action="{{ route('send-email-bigpopup') }}" method="post" class=" u-mb-small send_email" id="send_email_big" style="">
                            <div class="c-field u-mb-xsmall">
                                <label class="c-field__label" for="input-project">{{ trans('calls.gender') }}</label>
                                <select class="c-select c-input" name="gender" id="biggender">
                                    @foreach ($gender as $indexkey=>$val)
                                    <option value="{{$indexkey}}">{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
                            <input type="hidden" name="editId" id="editId" class="bigeditId" value=""> 
                            <div class="c-field u-mb-xsmall">
                                <label class="c-field__label" for="input-project">{{ trans('calls.customer-first-and-last-name') }}</label>
                                <input type="text" name="first_last_name" class="c-input first_last_name" id="big_first_last_name" placeholder="First And Last Name">
                            </div>
                            <div class="c-field u-mb-xsmall">
                                <label class="c-field__label" for="input-project">{{ trans('calls.caller-e-mail') }}</label>
                                <input type="email" name="caller_email" class="c-input caller_email" id="big_caller_email" placeholder="caller Email">
                            </div>
                            <div class="c-field u-mb-xsmall">
                                <label class="c-field__label" for="input-project">{{ trans('calls.telephone-number') }}</label>
                                <input type="text" name="telephone_number" class="c-input telephone_number" id="big_telephone_number" placeholder="telephone number">
                            </div>
                            <div class="c-field u-mb-xsmall">
                                <label class="c-field__label" for="input-project">{{ trans('calls.caller-notes-template') }}<span style="float: right;">
                                        <!--<a href="javascript:;" class="addTemplate">+ add new Template</a>-->
                                    </span>
                                </label>
                                <select class="c-select c-input" name="template" id="bigtemplate">
                                </select>
                            </div>
                            <div class="c-field u-mb-xsmall">
                                <label class="c-field__label" for="input-project">{{ trans('calls.caller-notes') }}</label>
                                <textarea name="caller_note" class="c-input" id="bigcaller_note" placeholder="Caller Notes" value=""></textarea>
                            </div>
                            <div class="c-field u-mb-xsmall">
                                <label class="c-field__label" for="input-project">{{ trans('calls.caller-notes-template') }} <span style="float: right;">
                                    </span>
                                </label>
                                <select class="c-input" name='employe' id="appendoption">
                                    <option  value="">Select Employee</option>
                                   
                                </select>
                            </div>
                            <div class="c-modal__footer u-justify-center">
                                <input type="submit" name="submit" class="c-btn c-btn--success" value="Send E-mail">
                            </div>
                        </form>
                    </article>

                </div>
            </div>
        </div>
    </div>
</div>
<style>
    a.c-board__btn.c-tooltip.c-tooltip--top {
        position: absolute;
        margin-left: 743px;
        margin-bottom: 41px;
    }
    thead {
        height: 22px !important;       /* Just for the demo          */
        overflow-y: auto !important;    /* Trigger vertical scroll    */
        overflow-x: hidden !important;  /* Hide the horizontal scroll */
    }
    #ManageEmployerList_wrapper{
        padding: 10px;
    }
    .dataTables_wrapper .dataTables_filter{
        float: right;
    }
</style>