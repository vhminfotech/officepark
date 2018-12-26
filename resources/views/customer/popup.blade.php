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
           
                <div class="col-md-6">
                    <article class="c-plan">
                        <i class="fa fa-info-circle fa-3x" aria-hidden="true"></i>&nbsp;&nbsp;
                        <span id="company_name" style="font-size:40px">Email Information</span>                                    
                        <ul>
                            <li class="c-plan__feature">
                                <strong></strong>
                                <br> <span id="customer_number"></span>
                            </li>
                            <li class="c-plan__feature">
                                <strong></strong>
                                <br> <span id="system_number"></span>
                            </li>
                            <li class="c-plan__feature">
                                <strong><h5>Id Number : 2309 </h5></strong> 
                            </li>

                            <li class="c-plan__feature">
                                <strong><h5>Agent : ABC XYZ</h5></strong> 
                            </li>

                            <li class="c-plan__feature">
                                <strong><h5>Date/Time : 10-11-2018 12:45pm</h5></strong>
                            </li>
                            
                            <li class="c-plan__feature">
                                <strong><h5>Caller Name : Mack Jonson</h5></strong>
                            </li>
                            
                            <li class="c-plan__feature">
                                <strong><h5>Caller Name : Kartik Desai</h5></strong>
                            </li>
                            
                            <li class="c-plan__feature">
                                <strong><h5>Caller Email : parthkhunt12@gmail.com</h5></strong>
                            </li>
                            
                            <li class="c-plan__feature">
                                <strong><h5>Telephone Number : +91-111111111</h5></strong>
                            </li>
                            
                            <li class="c-plan__feature">
                                <strong><h5>Agent Message : <br>ABC ABC BAC You asked, Font Awesome delivers with 41 shiny new icons in version ABC ABC BAC You asked, Font Awesome delivers with 41 shiny new icons in version </h5></strong>
                            </li>
                        </ul>
                        <br>
                     

                    </article>
                </div>
                <div class="col-md-6">

                    <article class="c-plan">
                        <!-- <h4><b>Guten Tag Herr Max Musatenman</b></h4>
                        <h5><b>Firma : Uray Infotech</b></h5>
                        <h6><b>Bestllernumber : AW123EWS </b></h6>
                        <h6><b>Kundennummer : OP-1709  </b></h6> -->
                        <form action="{{ route('send-email-bigpopup') }}" method="post" class=" u-mb-small send_email" id="send_email_big" style="">
                            <div class="c-field u-mb-xsmall">
                                <label class="c-field__label" for="input-project">Information</label>
                                <select class="c-select c-input" name="gender" id="biggender">
                                    <option value="">Select Information</option>
                                    <option value="1">Hello I am Shiri</option>
                                    <option value="2">Good Morning</option>
                                    <option value="3">Have a nice day</option>
                                    <option value="4">Today is great day</option>
                                    <option value="5">Let's  Enjoy</option>
                                </select>
                            </div>
                            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
                            
                            <div class="c-field u-mb-xsmall">
                                <label class="c-field__label" for="input-project">Customer Id</label>
                                <input type="text" name="first_last_name" class="c-input first_last_name" id="big_first_last_name" placeholder="Customer Id">
                            </div>
                            
                            <div class="c-field u-mb-xsmall">
                                <label class="c-field__label" for="input-project">Caller Notes</label>
                                <textarea name="caller_note" class="c-input" id="bigcaller_note" placeholder="Caller Notes" value=""></textarea>
                            </div>
                            
                            <div class="c-modal__footer u-justify-center">
                                <input type="submit" name="submit" class="c-btn c-btn--success" value="Send">
                            </div>
                        </form>
                        

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