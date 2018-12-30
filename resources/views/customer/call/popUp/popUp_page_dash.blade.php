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
                <div class="col-md-5">
                    <article class="c-plan">
                        <h4>
                            <b><span id="company_named"> <i class="fa fa-info-circle"></i> Agent Details</span></b></h4>                                        
                        <ul>
                            <li class="c-plan__feature">
                                <strong>Agent Id:</strong>
                                <br> <span id="customer_number"></span>
                            </li>
                            <li class="c-plan__feature">
                                <strong>Agent Name :</strong>
                                <br> <span id="system_number"></span>
                            </li>
                            <li class="c-plan__feature">
                                <strong>{{ trans('calls.datetime') }}:</strong> 
                                <br><span id="dates"></span>
                            </li>

                            <li class="c-plan__feature">
                                <strong>{{ trans('calls.firstname') }} :</strong> 
                                <br><span id="">a dsasdsa dasd</span>
                            </li>

                            <li class="c-plan__feature">
                                <strong>{{ trans('calls.caller-e-mail') }}:</strong>
                                <br><span class="email" id="email">test@gmail.cm</span>
                            </li>  
                             <li class="c-plan__feature">
                                <strong>Agent Message:</strong>
                                <br><span id="caller">test messagd</span>
                            </li>
                            <li class="c-plan__feature">
                                <strong>{{ trans('calls.caller-notes') }}:</strong>
                                <br><span id="caller">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                            </li>
                        </ul>
                    </article>
                </div>
                <div class="col-md-7">

                    <article class="c-plan">
                        <h3><b>Support Contact </b></h3>
                        <h6><b>Please feel the form. We will contect you soon as possible.</b></h6>

                        <form action="{{ route('customer-send-email-bigpopup') }}" method="post" class=" u-mb-small send_email" id="send_email_big" style="">
                            <div class="c-field u-mb-xsmall">
                                <label class="c-field__label" for="input-project">Wie konnen wir Ihnen helfen?</label>
                                <select class="c-select c-input information" name="information" id="information">
                                    @for($i=0;$i < count($responsibility); $i++)
                                <option value="{{ $i+1 }}">{{ $responsibility[$i+1] }}</option>
                                @endfor
                                </select>
                            </div>
                            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
                            <input type="hidden" name="callsId" id="callsId" class="bigeditId" value="">
                            <input type="hidden" name="agentEmail" id="agentEmail" class="agentEmail" value=""> 
                            <input type="hidden" name="email" id="email" class="email" value=""> 
                            <div class="c-field u-mb-xsmall">
                                <label class="c-field__label" for="input-project">{{ trans('calls.customer-number') }}</label>
                                <input type="text" name="telephone_number" class="c-input telephone_number" id="big_telephone_number" placeholder="Bet reff">
                            </div>
                           
                           
                            <div class="c-field u-mb-xsmall">
                                <label class="c-field__label" for="input-project">{{ trans('calls.caller-notes') }}</label>
                               <textarea  name="caller_note" class="c-input " id="" placeholder="Called Notes"></textarea>
                            </div>
                            <div class="c-modal__footer u-justify-center">
                                <input type="submit" name="submit" class="c-btn c-btn--success" value="{{ trans('calls.send-e-mail') }}">
                            </div>
                        </form>
                        <!--                        <form action="{{ route('send-email') }}" method="post" class=" u-mb-small send_email" id="send_email_big" style="">
                        
                                                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
                                                    <div class="c-field u-mb-small">
                                                        <select class="c-input" name='sex'>
                                                            <option value="mr">Mr.</option>
                                                            <option value="mrs">Mrs.</option>
                                                            <option value="miss">Miss.</option>
                                                        </select>
                                                    </div> 
                        
                                                    <div class="c-field u-mb-small">
                                                        <input class="c-input" type="text" name='surname' id="name_surname" placeholder="Name And Surname"> 
                                                    </div>
                        
                                                    <div class="c-field u-mb-small">
                                                        <input class="c-input" type="text" name='telephone' id="telephoneNumber" placeholder="Telephone number"> 
                                                    </div>
                        
                                                    <div class="c-field u-mb-small">
                                                        <select class="c-input" name='caller_notes'>
                                                            <option value="">Caller Notes Template </option>                                                            
                       
                                                        </select>
                                                    </div> 
                        
                                                    <div class="c-field u-mb-small">
                                                        <textarea class="c-input" name='message'></textarea>
                                                    </div>
                        
                                                    <div class="c-field u-mb-small">
                                                        <select class="c-input" name='employe'>
                                                            <option value="">Select Employee</option>
                       
                                                        </select>
                                                    </div> 
                        
                                                    <button class="c-btn c-btn--info right" type="submit">Sign Up</button>
                        
                                                </form>-->

                    </article><!-- // .c-plan -->

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