@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
<div class="container">
    @include('admin.call.popUp.popUpModel')
    
    
    
    <div class="row u-mb-large">
        <div class="col-12">
            <div c-table-responsive>
                <div class="c-table table-responsive">
                    <table class="" id="ManageEmployerList">
                        <thead class="c-table__head c-table__head--slim">
                            <tr class="c-table__row">
                                <!--<th><input class="checkAll" type="checkbox"></th>-->
                                <th class="c-table__cell c-table__cell--head">Id &nbsp;&nbsp;</th>
                                <th class="c-table__cell c-table__cell--head">Date/Time</th>
                                <th class="c-table__cell c-table__cell--head">Caller</th>
                                <th class="c-table__cell c-table__cell--head">Agent</th>
                                <th class="c-table__cell c-table__cell--head">Customer</th>
                                <th class="c-table__cell c-table__cell--head">Notiz</th>
                                <th class="c-table__cell c-table__cell--head">Mail Notification</th>
                                <th></th>
                                <th>Call View</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div><!-- // .col-12 -->
        </div>
        
    </div>
    <!-- Modal -->
    <div class="c-modal c-modal--small modal fade" id="modal8" tabindex="-1" role="dialog" aria-labelledby="modal8" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">

                <div class="c-modal__header">
                    <h3 class="c-modal__title">Sent mail</h3>
                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>
                <div class="c-modal__subheader">
                    <p>Customer First and Last Name : <span class="first_last_name"></span></p>
                </div>
                <div class="c-modal__body">
                    <form action="{{ route('send-email') }}" method="post" class=" u-mb-small send_email" id="send_email" style="">
                        <div class="c-field u-mb-xsmall">
                            <label class="c-field__label" for="input-project">Gender</label>
                            <select class="c-select" name="gender" id="gender">
                                @foreach ($gender as $indexkey=>$val)
                                <option value="{{$indexkey}}">{{$val}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
                        <input type="hidden" name="editId" id="editId" class="editId" value=""> 
                        <div class="c-field u-mb-xsmall">
                            <label class="c-field__label" for="input-project">First And Last Name</label>
                            <input type="text" name="first_last_name" class="c-input first_last_name" id="first_last_name" placeholder="First And Last Name">
                        </div>
                        <div class="c-field u-mb-xsmall">
                            <label class="c-field__label" for="input-project">Caller Email</label>
                            <input type="email" name="caller_email" class="c-input caller_email" id="caller_email" placeholder="caller Email">
                        </div>
                        <div class="c-field u-mb-xsmall">
                            <label class="c-field__label" for="input-project">telephone number</label>
                            <input type="text" name="telephone_number" class="c-input telephone_number" id="telephone_number" placeholder="telephone number">
                        </div>
                        <div class="c-field u-mb-xsmall">
                            <label class="c-field__label" for="input-project">Caller Notes Template <span style="float: right;"><a href="javascript:;" class="addTemplate">+ add new Template</a></span></label>
                            <select class="c-select" name="template" id="template">
                            </select>
                        </div>
                        <div class="c-field u-mb-xsmall">
                            <label class="c-field__label" for="input-project">Caller Notes</label>
                            <textarea name="caller_note" class="c-input" id="caller_note" placeholder="Caller Notes" value=""></textarea>
                        </div>
                        <div class="c-modal__footer u-justify-center">
                            <input type="submit" name="submit" class="c-btn c-btn--success" value="Send E-mail">
                        </div>
                    </form>
                </div>
            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->

    <!-- Modal -->
    <div class="c-modal c-modal--small modal fade" id="templateModel" tabindex="-1" role="dialog" aria-labelledby="modal8" data-backdrop="static">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content">

                <div class="c-modal__header">
                    <h3 class="c-modal__title">Add template</h3>
                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>

                <div class="c-modal__body">
                    <form action="{{ route('add-template') }}" method="post" class=" u-mb-small addTemlate" id="addTemlate" style="">
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 

                        <div class="c-field u-mb-xsmall">
                            <label class="c-field__label" for="input-project">Enter Message</label>
                            <textarea name="message" class="c-input" id="message" placeholder="Enter Message" value=""></textarea>
                        </div>
                        <div class="c-modal__footer u-justify-center">
                            <input type="submit" name="submit" class="c-btn c-btn--success" value="Add Template">
                        </div>
                    </form>
                </div>
                <div class="c-modal__footer templateList">
                    
                </div>
            </div><!-- // .c-modal__content -->
        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->
    
    

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

@endsection
