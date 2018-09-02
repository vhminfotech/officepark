@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <article class="c-stage">
                <div class="c-stage__header o-media u-justify-start">
                    <div class="c-stage__icon o-media__img">
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="c-stage__header-title o-media__body">
                        <h6 class="u-mb-zero">Add Addressbook</h6>
                    </div>
                </div>
                <form name="addInvoice" id="addInvoice"  method="post">
                    <div class="c-stage__panel u-p-medium">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="invoiceno">Invoice No</label> 
                                    <input class="c-input" name="invoice_no" id="invoice_no" placeholder="Invoice No" type="text">
                                    <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="customer">Select Customer</label> 
                                    <select class="c-select" id="select1" name="customer">
                                        <option>choose an Customer</option>
                                        @foreach($customers as $indexkey)
                                        <option value="{{$indexkey['id']}}">{{$indexkey['first_name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="date_from">Date From</label> 
                                    <input class="c-input form-control" data-toggle="datepicker" id="date_from" name="date_from" type="text" placeholder="Date From" required>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="c-field u-mb-small">
                                    <label class="c-field__label" for="date_to">Date To</label> 
                                    <input class="c-input form-control" data-toggle="datepicker" id="date_to" name="date_to" type="text" placeholder="Date To" required>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <input class="c-btn c-btn--info c-btn--fullwidth" value="Add" type="submit">
                            </div>
                        </div>
                    </div>
                </form>
            </article>
        </div>
    </div>
</div>
<style>
    input.has-error {
        border-color: red;
    }
</style>
@endsection