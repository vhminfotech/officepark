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
                        <h6 class="u-mb-zero">Create bill for OP-211-1719</h6>
                    </div>
                </div>
                <div class="invoice-box">
                    <div class="row">


                        <div class="col-md-9">
                            <br/><br/>
                            <span><u>Office Park GbR - Münsterstraße 330, Gebäude B - 40470 Düsseldorf</u></span><br/>
                            <span><h3>- persönlich -</h3></span><br/>
                            <span>Proton GmbH</span><br/>
                            <span>Münsterstraße 330 </span><br/>
                            <span>40470 Düsseldorf </span><br/><br/>

                            <span><b>Ihre Rechnung für den Zeitraum </b>&nbsp;&nbsp;&nbsp;<input type="tex" name="start_date"> -- <input type="tex" name="end_date"></span>
                            <br/><br/>

                            <span>Sehr geehret Damen und Herren, <br/> anbei übersenden wir ihnen ihre aktuelle Monatsabrechnung.</span>
                            <br/><br/>

                            <span> Ihr gebuchter Telefonservice -Tarif:  &nbsp;&nbsp;&nbsp;<select>
                                    <option>Business Packet Stander</option>
                                    <option>Business Packet Stander1</option>
                                    <option>Business Packet Stander2</option>
                                </select></span>

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
                            <p> Düsseldorf, den 22.05.2018 </p><br/>
                            <p> Finanzamt </p>
                            <p> Düsseldorf-Nord </p><br/>
                            <p> Rechnungs-Nr. 002/17</p>
                            <p> Kunden-Nr. OP-211-1704 </p><br/>
                        </div>
                    </div>

                    <hr/>
                    <br/>
                    <!--                    <div class="row">-->
                    <table class="c-table">

                        <thead class="c-table__head c-table__head--slim">
                            <tr class="c-table__row">
                                <th class="c-table__cell c-table__cell--head" style="margin-left: 5px;">Bezeichnung</th>
                                <th class="c-table__cell c-table__cell--head">Menge&nbsp;&nbsp;</th>
                                <th class="c-table__cell c-table__cell--head">Einzelpreis&nbsp;&nbsp;</th>
                                <th colspan="2" class="c-table__cell c-table__cell--head">Betrag&nbsp;&nbsp;<a href="javascript:;" class="add_new_row">Add</a></th>
                            </tr>
                        </thead>
                        <tbody class="dataAppend">    
                            <tr class="c-table__row">
                                <td>
                                    <select>
                                        <option>Option Address 1</option>
                                        <option>Option Address 2</option>
                                        <option>Option Address 3</option>
                                        <option>Option Address 4</option>
                                    </select>
                                </td>
                                <td><input type="text" name="menge" value="2"/></td>
                                <td><input type="text" name="price" value="1,00"/>€</td>
                                <td>2,00€</td>
                            </tr>
                            <tr class="c-table__row">
                                <td>
                                    <select>
                                        <option>Option Address 1</option>
                                        <option>Option Address 2</option>
                                        <option>Option Address 3</option>
                                        <option>Option Address 4</option>
                                    </select>
                                </td>
                                <td><input type="text" name="menge" value="2"/></td>
                                <td><input type="text" name="price" value="1,00"/>€</td>
                                <td>2,00€</td>
                            </tr>
                            <tr class="c-table__row">
                                <td>
                                    <select>
                                        <option>Option Address 1</option>
                                        <option>Option Address 2</option>
                                        <option>Option Address 3</option>
                                        <option>Option Address 4</option>
                                    </select>
                                </td>
                                <td><input type="text" name="menge" value="2"/></td>
                                <td><input type="text" name="price" value="1,00"/>€</td>
                                <td>2,00€</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="c-table">
                        <tr class="c-table__row">
                            <td></td>
                            <td></td>
                            <td>Endbetrag : </td>
                            <td>10,00€</td>
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
                        Der Betrag in Hohe 47,45 € wird per SEPA-Mandat von ihrem Konto eingezogen.Erstlastschriften werden ihrem Konto nach 3 werktagen, Folgelastschriften nach 1 Werktagen belastet.
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