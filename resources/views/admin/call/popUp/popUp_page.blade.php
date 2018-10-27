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
                                    <b>Company 1</b></h4>                                        
                                <ul>
                                    <li class="c-plan__feature">
                                        <strong>Customer Number :</strong>
                                        <br> op-211-1741
                                    </li>
                                    <li class="c-plan__feature">
                                        <strong>System Number :</strong>
                                        <br> 0213-145236
                                    </li>
                                    <li class="c-plan__feature">
                                        <strong>Name Surname :</strong> 
                                        <br>Mr. Max Mustermann
                                    </li>

                                    <li class="c-plan__feature">
                                        <strong>Email :</strong> 
                                        <br>xyz@gmail.com 
                                    </li>

                                    <li class="c-plan__feature">
                                        <strong>Telephone :</strong>
                                        <br>+9111111111
                                    </li>
                                </ul>
                                <br>
                                <h4><b>Business/Hours</b> </h4>
                                <ul>
                                    <li class="c-plan__feature">
                                        <strong>Monday :</strong>
                                        <br> 09:00 - 10:00
                                    </li>
                                    <li class="c-plan__feature">
                                        <strong>Tuesday :</strong>
                                        <br> 09:00 - 10:00
                                    </li>
                                    <li class="c-plan__feature">
                                        <strong>Wednesday :</strong> 
                                        <br>09:00 - 10:00
                                    </li>

                                    <li class="c-plan__feature">
                                        <strong>Thursday :</strong> 
                                        <br>09:00 - 10:00 
                                    </li>

                                    <li class="c-plan__feature">
                                        <strong>Friday :</strong>
                                        <br>09:00 - 10:00
                                    </li>

                                    <li class="c-plan__feature">
                                        <strong>Saturday :</strong>
                                        <br>Closed
                                    </li>

                                    <li class="c-plan__feature">
                                        <strong>Sunday :</strong>
                                        <br>Closed
                                    </li>
                                </ul>
                                <br>
                                <h4><b>Lunch Time</b></h4>
                                <ul >
                                    <li class="c-plan__feature" >
                                        <strong>12:00 - 13:00</strong>                                                
                                    </li>
                                </ul>
                                <br>
                                <h4><b>Global Holidays</b></h4>

                                <ul >
                                    <li class="c-plan__feature">
                                        <strong>Global Holidays From :</strong>
                                        <br>20.11.2018
                                    </li>                                            
                                    <li class="c-plan__feature">
                                        <strong>Global Holidays To :</strong>
                                        <br>30.11.2018
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
                                        <br> Company Schmidt - Hello My name is max mustermann.
                                    </li>

                                    <li class="c-plan__feature">
                                        <strong>Shall we put the caller though to you ?</strong>
                                        <br> Yes, Please only make calls that want to place a new order.
                                    </li>

                                    <li class="c-plan__feature">
                                        <strong>Information</strong>
                                        <br> vcnxv,xcnbvbnvnlblkgnf,xngoifgf
                                        <br> vcnxv,xcnbvbnvnlblkgnf,xngoifgf
                                        <br> vcnxv,xcnbvbnvnlblkgnf,xngoifgf
                                    </li>
                                </ul>
                                <h4><b>Employee</b></h4>
                                <div class="container">
                                    <div class="c-tabs">
                                        <ul class="c-tabs__list c-tabs__list--splitted nav nav-tabs" id="myTab" role="tablist">
                                            <li class="c-tabs__item"><a class="c-tabs__link active" id="nav-home-tab" data-toggle="tab" href="#accounting" role="tab" aria-controls="nav-home" aria-selected="true">Accounting</a></li>
                                            <li class="c-tabs__item"><a class="c-tabs__link" id="nav-profile-tab" data-toggle="tab" href="#advisor" role="tab" aria-controls="nav-profile" aria-selected="false">Customer Advisor</a></li>
                                            <li class="c-tabs__item"><a class="c-tabs__link" id="nav-profile-tab" data-toggle="tab" href="#services" role="tab" aria-controls="nav-profile" aria-selected="false">Technical Services</a></li>
                                        </ul>

                                            <div class="c-tabs__content " id="nav-tabContent">
                                                <div class="c-tabs__pane active" id="accounting" role="tabpanel" aria-labelledby="nav-home-tab">
                                                    <div class="row">
                                                          
                                                                <div class="col-3 ">
                                                                    <div class="c-avatar  u-inline-block">
                                                                        <img class="c-avatar__img" src="{{ url('img/avatar1-72.jpg')}}" alt="Avatar">
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="col-9">
                                                                     <ul>
                                                                        <li class="c-plan__feature">
                                                                            <strong><span style="font-size:16px;"> Herray Mastermann </span>
                                                                            <br> Job title :</strong> Accounting
                                                                            <br> Company Schmidt - Hello My name is max mustermann.
                                                                        </li>
                                                                     </ul>
                                                                </div>
                                                          
                                                     </div>
                                                    
                                                    <div class="row">
                                                          
                                                                <div class="col-3 ">
                                                                    <div class="c-avatar  u-inline-block">
                                                                        <img class="c-avatar__img" src="{{ url('img/avatar1-72.jpg')}}" alt="Avatar">
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="col-9">
                                                                     <ul>
                                                                        <li class="c-plan__feature">
                                                                            <strong><span style="font-size:16px;"> Herray Mastermann </span>
                                                                            <br> Job title :</strong> Accounting
                                                                            <br> Company Schmidt - Hello My name is max mustermann.
                                                                        </li>
                                                                     </ul>
                                                                </div>
                                                          
                                                     </div>
                                                    
                                                    
                                                    <div class="row">
                                                          
                                                                <div class="col-3 ">
                                                                    <div class="c-avatar  u-inline-block">
                                                                        <img class="c-avatar__img" src="{{ url('img/avatar1-72.jpg')}}" alt="Avatar">
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="col-9">
                                                                     <ul>
                                                                        <li class="c-plan__feature">
                                                                            <strong><span style="font-size:16px;"> Herray Mastermann </span>
                                                                            <br> Job title : </strong>Accounting
                                                                            <br> Company Schmidt - Hello My name is max mustermann.
                                                                        </li>
                                                                     </ul>
                                                                </div>
                                                          
                                                     </div>
                                                </div>

                                            <div class="c-tabs__pane" id="advisor" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <div class="row">
                                                          
                                                                <div class="col-3 ">
                                                                    <div class="c-avatar  u-inline-block">
                                                                        <img class="c-avatar__img" src="{{ url('img/avatar1-72.jpg')}}" alt="Avatar">
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="col-9">
                                                                     <ul>
                                                                        <li class="c-plan__feature">
                                                                            <strong><span style="font-size:16px;"> Herray Mastermann </span>
                                                                            <br> Job title :</strong> Advisor
                                                                            <br> Company Schmidt - Hello My name is max mustermann.
                                                                        </li>
                                                                     </ul>
                                                                </div>
                                                          
                                                     </div>
                                                    
                                                    <div class="row">
                                                          
                                                                <div class="col-3 ">
                                                                    <div class="c-avatar  u-inline-block">
                                                                        <img class="c-avatar__img" src="{{ url('img/avatar1-72.jpg')}}" alt="Avatar">
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="col-9">
                                                                     <ul>
                                                                        <li class="c-plan__feature">
                                                                            <strong><span style="font-size:16px;"> Herray Mastermann </span>
                                                                            <br> Job title :</strong> Advisor
                                                                            <br> Company Schmidt - Hello My name is max mustermann.
                                                                        </li>
                                                                     </ul>
                                                                </div>
                                                          
                                                     </div>
                                                    
                                                    
                                                    <div class="row">
                                                          
                                                                <div class="col-3 ">
                                                                    <div class="c-avatar  u-inline-block">
                                                                        <img class="c-avatar__img" src="{{ url('img/avatar1-72.jpg')}}" alt="Avatar">
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="col-9">
                                                                     <ul>
                                                                        <li class="c-plan__feature">
                                                                            <strong><span style="font-size:16px;"> Herray Mastermann </span>
                                                                            <br> Job title : </strong> Advisor
                                                                            <br> Company Schmidt - Hello My name is max mustermann.
                                                                        </li>
                                                                     </ul>
                                                                </div>
                                                          
                                                     </div>
                                            </div>

                                            <div class="c-tabs__pane" id="services" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <div class="row">
                                                          
                                                                <div class="col-3 ">
                                                                    <div class="c-avatar  u-inline-block">
                                                                        <img class="c-avatar__img" src="{{ url('img/avatar1-72.jpg')}}" alt="Avatar">
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="col-9">
                                                                     <ul>
                                                                        <li class="c-plan__feature">
                                                                            <strong><span style="font-size:16px;"> Herray Mastermann </span>
                                                                            <br> Job title :</strong> Services
                                                                            <br> Company Schmidt - Hello My name is max mustermann.
                                                                        </li>
                                                                     </ul>
                                                                </div>
                                                          
                                                     </div>
                                                    
                                                    <div class="row">
                                                          
                                                                <div class="col-3 ">
                                                                    <div class="c-avatar  u-inline-block">
                                                                        <img class="c-avatar__img" src="{{ url('img/avatar1-72.jpg')}}" alt="Avatar">
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="col-9">
                                                                     <ul>
                                                                        <li class="c-plan__feature">
                                                                            <strong><span style="font-size:16px;"> Herray Mastermann </span>
                                                                            <br> Job title :</strong> Services
                                                                            <br> Company Schmidt - Hello My name is max mustermann.
                                                                        </li>
                                                                     </ul>
                                                                </div>
                                                          
                                                     </div>
                                                    
                                                    
                                                    <div class="row">
                                                          
                                                                <div class="col-3 ">
                                                                    <div class="c-avatar  u-inline-block">
                                                                        <img class="c-avatar__img" src="{{ url('img/avatar1-72.jpg')}}" alt="Avatar">
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="col-9">
                                                                     <ul>
                                                                        <li class="c-plan__feature">
                                                                            <strong><span style="font-size:16px;"> Herray Mastermann </span>
                                                                            <br> Job title : </strong> Services
                                                                            <br> Company Schmidt - Hello My name is max mustermann.
                                                                        </li>
                                                                     </ul>
                                                                </div>
                                                          
                                                     </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4">

                            <article class="c-plan">
                               <h4><b>Sent Call Information Mail</b></h4>

                                        <form>
                                            <div class="c-field u-mb-small">
                                                            <select class="c-input">
                                                                <option value="mr">Mr.</option>
                                                                <option value="mrs">Mrs.</option>
                                                                <option value="miss">Miss.</option>
                                                            </select>
                                            </div> 

                                            <div class="c-field u-mb-small">
                                                <input class="c-input" type="text" id="name_surname" placeholder="Name And Surname"> 
                                            </div>

                                            <div class="c-field u-mb-small">
                                                <input class="c-input" type="text" id="telephoneNumber" placeholder="Telephone number"> 
                                            </div>

                                            <div class="c-field u-mb-small">
                                                <select class="c-input">
                                                    <option value="">Caller Notes Template </option>                                                            
                                                </select>
                                            </div> 

                                            <div class="c-field u-mb-small">
                                                <textarea class="c-input"></textarea>
                                            </div>

                                            <div class="c-field u-mb-small">
                                                <select class="c-input">
                                                    <option value="">Select Employee</option>                                                            
                                                </select>
                                            </div> 

                                            <button class="c-btn c-btn--info right" type="submit">Sign Up</button>

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