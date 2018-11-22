@extends('layouts.app')
@section('content')
@include('layouts.include.body_header')

<script>
    var bezeichnung = '<?php echo json_encode($bezeichnung) ?>';
</script>
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <article class="c-stage">
                <div class="c-stage__header o-media u-justify-start">
                    <div class="c-stage__icon o-media__img">
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="c-stage__header-title o-media__body">
                        <h6 class="u-mb-zero">Create bill for {{ $customerNumber }}</h6>
                    </div>
                </div>
                <form action="{{ route('add-invoice',$customerNumber ) }}" method='post' id='invoiceForm'>
                     <div class="c-card u-p-medium u-mb-small">
                    <div class="row">


                        <div class="col-md-9">
                            <br/><br/>
                            <input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                            <input class="c-input" type="hidden" name="customer_id"  value="{{ $getCustomerInfo['customer_id'] }}">
                            <span><u>Office Park GbR - Münsterstraße 330, Gebäude B - 40470 Düsseldorf</u></span><br/>
                            <span><h3>- persönlich -</h3></span><br/>
                            <span>{{ $getCustomerInfo['company_name'] }}</span><br/>
                            <span>{{ $getCustomerInfo['address'] }} </span><br/><br/>
                            <!--<span>40470 Düsseldorf </span><br/>-->

                            <span><b>Ihre Rechnung für den Zeitraum </b>&nbsp;&nbsp;&nbsp;<input type="tex" class='c-input form-control' data-toggle="datepicker" name="start_date" style='display:inline-block;width: 30%;'> -- <input type="tex" data-toggle="datepicker" name="end_date" class='c-input form-control' style='display:inline-block;width: 30%;'></span>
                            <br/><br/>

                            <span>Sehr geehret Damen und Herren, <br/> anbei übersenden wir ihnen ihre aktuelle Monatsabrechnung.</span>
                            <br/><br/>
                            <div class='row'>
                                <div class='col-md-5'>Ihr gebuchter Telefonservice -Tarif:</div>
                                <div class='col-md-3'>
                                    <select class='form-control c-select selectpackege' name='service_id'>
                                        <option value="">Select Packages</option>
                                        @foreach($getServiceName as $value)
                                        <option value="{{$value->id}}" {{ ($value->id == $getCustomerInfo['is_package'] ? 'selected="selected"' : '') }}>
                                            {{$value->packages_name}}
                                        </option>
                                        <!--<option value='Business Packet Stander'>Business Packet Stander</option>-->
                                        @endforeach
                               </select>
                                </div>
                            </div>
                            <span>   &nbsp;&nbsp;&nbsp;
                                
                            </span>

                        </div>

                        <div class="col-md-3">
                            <p><img  src="{{  asset('img/officepark-logo.jpg')  }}"></p>
                            <p> Gesellschafter/ </p>
                            <p> Geschäftsführer </p>
                            <p> Baris Ak </p><br/>
                            <p> Gesellschafter </p>
                            <p> Mustafa Basun </p><br/>
                            <p> Münsterstraße 330 </p>
                            <p> 40470 Düsseldorf </p>
                            <p> Telefon: +49 (0) 211 368 74 190 </p>
                            <p> Telefax: +49 (0) 211 368 74 190 01 </p>
                            <p> Web:www.officepark.group </p>
                            <p> E-Mail: info@officepark.group </p><br/>
                            <p> Service-/ Bürozeiten: </p>
                            <p> Mo. bis Fr. </p>
                            <p> 09:00 - 19:00 Uhr </p><br/>
                            <p> Düsseldorf, den {{ date('d.m.Y') }} </p><br/>
                            <p> Finanzamt </p>
                            <p> Düsseldorf-Nord </p><br/>
                            <p> Rechnungs-Nr. {{ $invoiceNo }}</p>
                            <p> Kunden-Nr. {{ $customerNumber }} </p><br/>
                        </div>
                    </div>

                    <hr/>
                    <br/>
                    <!--                    <div class="row">-->
                    <table class="c-table">

                        <thead class="c-table__head c-table__head--slim">
                            <tr class="c-table__row">
                                <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">Bezeichnung</th>
                                <th class="c-table__cell c-table__cell--head">Menge&nbsp;&nbsp;€</th>
                                <th class="c-table__cell c-table__cell--head">Einzelpreis&nbsp;&nbsp;</th>
                                <th colspan="2" class="c-table__cell c-table__cell--head">Betrag&nbsp;&nbsp;€<a href="javascript:;" class="add_new_row" style="margin-left: 20px;"><i class="fa fa-plus"></i></a></th>
                            </tr>
                        </thead>
                        <tbody class="dataAppend">    
                            
<!--                            <tr class="c-table__row">
                                <td>
                                    <select class='c-select' name='bezeichnung[]'>
                                        <option value=''>Select Bezeichnung</option>
                                        @foreach($bezeichnung as $key => $val)
                                            <option value='{{$key}}'>{{$val}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" class="qty c-input" name="menge[]"/></td>
                                <td><input type="text" class="price c-input" name="price[]"/></td>
                                <td><input type="hidden" name="total[] "class="Rowtotal"><span class="total"></span></td>
                            </tr>-->
                        </tbody>
                    </table>
                    <table class="c-table">
                        <tr class="c-table__row">
                            <td></td>
                            <td></td>
                            <td>Endbetrag : </td>
                            <td><span class='finalTotal'></span>€</td>
                        </tr>
                        <tr class="c-table__row">
                            <td></td>
                            <td></td>
                            <td colspan="2">Gemba 19 UstG enthalt der Rechnungsbetrag keine Umsatzsteuer</td>
                        </tr>

                    </table>

                    <!--</div>-->
                    <br/><br/>
                    <span>
                        Der Betrag in Hohe <span class='finalTotal'>47,45</span> € wird per SEPA-Mandat von ihrem Konto eingezogen.Erstlastschriften werden ihrem Konto nach 3 werktagen, Folgelastschriften nach 1 Werktagen belastet.
                    </span>
                    <br/>
                    <span>
                        Ihre Bankeverbindung: DE14 3005 0110 1007 340182 . DUSSDEDDXXX <br/>
                        Stadtsparkasse Dusseldorf  . Kontoinhaber : Chousein Touzlatzi <br/>
                        Mandatsreferenz : OP-211-1704 . Glaubiger-ID : DE91ZZZZ00002054440
                    </span>
                    <br/>

                    <hr/>
                    <br/>
                    <div class="c-field u-mb-small right">
                        <div class="col-mg-3">
                            
                            <input class="c-btn c-btn--info c-btn--fullwidth" value="Create New Bill" type="submit">
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