@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')
<style>
    .c-table {
        display: table !important;
        width: 20% !important;
        max-width: 20% !important;
        word-wrap: break-word !important;
        border: 1px solid #f5f8fa;
    }
    .c-table__cell {
        padding: 20px 0 20px 30px;
        color: #354052;
        font-size: .875rem;
        font-weight: 500;
        text-align: left;
        vertical-align: middle;
        white-space: unset !important;
    }
    .c-table-full-width {
    width: 100% !important;
}
</style>
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <div class="c-stage__header o-media u-justify-start">
<!--                <div class="c-stage__icon o-media__img">
                    <i class="fa fa-plus"></i>
                </div>
                <div class="c-stage__header-title o-media__body">-->
                    <h2 class="u-mb-zero">System Mails </h2>
                <!--</div>-->
            </div>
            <div c-table-responsive> 
                <div class="c-card u-p-medium u-mb-small">
                    <div class="row">
                        <div class="col-md-3">
                            <h3>Today</h3>
                            <table class="c-table" id="">
                                <thead class=" c-table__head--slim">
                                    <tr class="c-table__row">
                                        <td colspan="" class="c-table__cell " style="">Calls</td>
                                        <td colspan="" class="c-table__cell" style="">42</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">mustermann gmbh</td>
                                        <td class="c-table__cell">Company Name</td>
                                    </tr>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">mustermann gmbh</td>
                                        <td class="c-table__cell">Company Name</td>
                                    </tr>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">mustermann gmbh</td>
                                        <td class="c-table__cell">Company Name</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br/>
                            <table class="c-table" id="" style="">
                                <thead class=" c-table__head--slim">
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell " style="">Sent Mail</td>
                                        <td colspan="2" class="c-table__cell" style="">31</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">jalian thomas</td>
                                        <td class="c-table__cell">mustram</td>
                                        <td class="c-table__cell">14</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br/>
                            <table class="c-table" id="">
                                <thead class=" c-table__head--slim">
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell " style="">Not Sent Mails</td>
                                        <td colspan="2" class="c-table__cell" style="">31</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">shrikant thomas</td>
                                        <td class="c-table__cell">mustram</td>
                                        <td class="c-table__cell">2</td>
                                    </tr>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">baric</td>
                                        <td class="c-table__cell">u-rain</td>
                                        <td class="c-table__cell">2</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br/>
                            <table class="c-table" id="">
                                <thead class=" c-table__head--slim">
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell " style="">Agent Statistics</td>
                                        <td colspan="" class="c-table__cell" style="">31</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="c-table__row">
                                        <td colspan="" class="c-table__cell">julian thomas</td>
                                        <td colspan="" class="c-table__cell"></td>
                                        <td class="c-table__cell">2</td>
                                    </tr>
                                    <tr class="c-table__row">
                                        <td colspan="" class="c-table__cell">baric</td>
                                        <td colspan="" class="c-table__cell">&nbsp;</td>
                                        <td class="c-table__cell">2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <h3>Week</h3>
                            <table class="c-table" id="">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th colspan="" class="c-table__cell " style="">Calls</th>
                                        <th colspan="" class="c-table__cell" style="">42</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">mustermann gmbh</td>
                                        <td class="c-table__cell">Company Name</td>
                                    </tr>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">mustermann gmbh</td>
                                        <td class="c-table__cell">Company Name</td>
                                    </tr>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">mustermann gmbh</td>
                                        <td class="c-table__cell">Company Name</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br/>
                            <table class="c-table" id="">
                                <thead class=" c-table__head--slim">
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell " style="">Sent Mail</td>
                                        <td colspan="2" class="c-table__cell" style="">31</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">jalian thomas</td>
                                        <td class="c-table__cell">mustram</td>
                                        <td class="c-table__cell">14</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br/>
                            <table class="c-table" id="">
                                <thead class=" c-table__head--slim">
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell " style="">Not Sent Mails</td>
                                        <td colspan="2" class="c-table__cell" style="">31</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">shrikant thomas</td>
                                        <td class="c-table__cell">mustram</td>
                                        <td class="c-table__cell">2</td>
                                    </tr>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">baric</td>
                                        <td class="c-table__cell">u-rain</td>
                                        <td class="c-table__cell">2</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br/>
                            <table class="c-table" id="">
                                <thead class=" c-table__head--slim">
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell " style="">Agent Statistics</td>
                                        <td colspan="" class="c-table__cell" style="">31</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="c-table__row">
                                        <td colspan="" class="c-table__cell">julian thomas</td>
                                        <td colspan="" class="c-table__cell"></td>
                                        <td class="c-table__cell">2</td>
                                    </tr>
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell">baric</td>
                                        <td colspan="" class="c-table__cell"></td>
                                        <td class="c-table__cell">2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <h3>Months</h3>
                            <table class="c-table" id="">

                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th colspan="" class="c-table__cell " style="">Calls</th>
                                        <th colspan="" class="c-table__cell" style="">42</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">mustermann gmbh</td>
                                        <td class="c-table__cell">Company Name</td>
                                    </tr>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">mustermann gmbh</td>
                                        <td class="c-table__cell">Company Name</td>
                                    </tr>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">mustermann gmbh</td>
                                        <td class="c-table__cell">Company Name</td>
                                    </tr>
                                </tbody>

                            </table>
                            <br/>
                            <table class="c-table" id="">
                                <thead class=" c-table__head--slim">
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell " style="">Sent Mail</td>
                                        <td colspan="2" class="c-table__cell" style="">31</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">jalian thomas</td>
                                        <td class="c-table__cell">mustram</td>
                                        <td class="c-table__cell">14</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br/>
                            <table class="c-table" id="">
                                <thead class=" c-table__head--slim">
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell " style="">Not Sent Mails</td>
                                        <td colspan="2" class="c-table__cell" style="">31</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">shrikant thomas</td>
                                        <td class="c-table__cell">mustram</td>
                                        <td class="c-table__cell">2</td>
                                    </tr>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">baric</td>
                                        <td class="c-table__cell">u-rain</td>
                                        <td class="c-table__cell">2</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br/>
                            <table class="c-table" id="">
                                <thead class=" c-table__head--slim">
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell " style="">Agent Statistics</td>
                                        <td colspan="" class="c-table__cell" style="">31</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="c-table__row">
                                        <td colspan="" class="c-table__cell">julian thomas</td>
                                        <td colspan="" class="c-table__cell"></td>
                                        <td class="c-table__cell">2</td>
                                    </tr>
                                    <tr class="c-table__row">
                                        <td colspan="" class="c-table__cell">baric</td>
                                        <td colspan="" class="c-table__cell"></td>
                                        <td class="c-table__cell">2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <h3>Years</h3>
                            <table class="c-table" id="">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th colspan="" class="c-table__cell " style="">Calls</th>
                                        <th colspan="" class="c-table__cell" style="">42</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">mustermann gmbh</td>
                                        <td class="c-table__cell">Company Name</td>
                                    </tr>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">mustermann gmbh</td>
                                        <td class="c-table__cell">Company Name</td>
                                    </tr>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">mustermann gmbh</td>
                                        <td class="c-table__cell">Company Name</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br/>
                            <table class="c-table" id="">
                                <thead class=" c-table__head--slim">
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell " style="">Sent Mail</td>
                                        <td colspan="2" class="c-table__cell" style="">31</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">jalian thomas</td>
                                        <td class="c-table__cell">mustram</td>
                                        <td class="c-table__cell">14</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br/>
                            <table class="c-table" id="">
                                <thead class=" c-table__head--slim">
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell " style="">Not Sent Mails</td>
                                        <td colspan="2" class="c-table__cell" style="">31</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">shrikant thomas</td>
                                        <td class="c-table__cell">mustram</td>
                                        <td class="c-table__cell">2</td>
                                    </tr>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">baric</td>
                                        <td class="c-table__cell">u-rain</td>
                                        <td class="c-table__cell">2</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br/>
                            <table class="c-table" id="">
                                <thead class=" c-table__head--slim">
                                    <tr class="c-table__row">
                                        <td colspan="2" class="c-table__cell " style="">Agent Statistics</td>
                                        <td colspan="" class="c-table__cell" style="">31</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">julian thomas</td>
                                        <td colspan="" class="c-table__cell"></td>
                                        <td class="c-table__cell">2</td>
                                    </tr>
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">baric</td>
                                        <td colspan="" class="c-table__cell"></td>
                                        <td class="c-table__cell">2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <div c-table-responsive>                
                <table class="c-table c-table-full-width" id="datatable" style="width: 100% !important;max-width: 100% !important;">
                    <caption class="c-table__title">
                        <div class="c-stage__panel ">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="c-field u-mb-small">
                                        <select class="c-select form-control" id="select1">
                                            <option>Date & Time</option>
                                            <option>5:20 20:20:20</option>
                                            <option>8:50 10:20:20</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="c-field u-mb-small">
                                        <select class="c-select">
                                            <option value=''>Customer</option>
                                            <option value=''>aheemad</option>
                                            <option value=''>jecllin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="c-field u-mb-small">
                                        <select class="c-select">
                                            <option>Agent</option>
                                            <option>mustafir</option>
                                            <option>shehjad</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </caption>

                    <thead class="c-table__head c-table__head--slim">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">Date / Time</th>
                            <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">Caller&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Agent&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Customer&nbsp;&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="c-table__cell">17.05.2018 - 10:23:10</td>
                            <td class="c-table__cell">+663527411477</td>
                            <td class="c-table__cell">Julian</td>
                            <td class="c-table__cell">Mustafir</td>
                        </tr>
                    </tbody>
                </table>
            </div><!-- // .col-12 -->
        </div>
    </div>
</div>

<style>
    input.has-error {
        border-color: red;
    }
</style>

@endsection