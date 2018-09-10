
<html>
    <head>
        <meta charset="utf-8">
        <title>Office Park</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            .main-header{
                font-size: 35px;
                line-height: 35px;
                text-align: right;
            }
            .text-undeline{
                text-decoration: underline;
            }
            .small-fornt{
                font-size: 11px;
                text-align: right;
            }
            .page-break {
                page-break-after: always;
            }
            .padding-l-5{
                padding-left: 5px;
            }
        </style>
    </head>

    <body>
        <div class="invoice-box">
            <table width="100%">
                <tr>
                    <td class="main-header" colspan="3"><span >Office | Park</span></td>
                </tr>
                <tr>
                    <td  class="text-undeline" colspan="3">Office Park GbR - Münsterstraße 330, Gebäude B - 40470 Düsseldorf</td>
                </tr>
                <tr>
                    <td colspan="3"><h3>- persönlich -</h3></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table width="100%">
                            <tr>
                                <td>{{ $getCustomerInfo['company_name'] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $getCustomerInfo['address'] }}</td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>Ihre Rechnung für den Zeitraum ({{ date('d.m.Y',strtotime($getInvoice[0]['start_date'])) .' - '. date('d.m.Y',strtotime($getInvoice[0]['end_date'])) }})</td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>Sehr geehrte Damen und Herren,</td>
                            </tr>
                            <tr>
                                <td>anbei übersenden wir Ihnen Ihre aktuelle Monatsabrechnung.</td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>Ihr gebuchter Telefonservice-Tarif: {{ $getInvoice[0]['telephone_service'] }} </td>
                            </tr>
                        </table>
                    </td>
                    <td class="small-fornt">
                        <table width="100%">
                            <tr> <td>  Gesellschafter/ Geschäftsführer</td> </tr>
                            <tr> <td>  Baris Ak</td> </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">       
                            <tr> <td>  Gesellschafter</td> </tr>
                            <tr> <td>  Mustafa Basun</td> </tr>

                        </table>
                        <table width="100%" style="margin-top: 20px;">  
                            <tr> <td>Münsterstraße 330 </td> </tr>
                            <tr> <td>Gebäude B</td></tr> 
                            <tr> <td>40470 Düsseldorf</td></tr> 
                            <tr> <td>Telefon: +49 (0) 211 368 74 190</td></tr> 
                            <tr> <td>Telefax: +49 (0) 211 368 74 190 01</td></tr> 
                            <tr> <td>Web:www.oﬃcepark.group</td></tr> 
                            <tr> <td>E-Mail: info@oﬃcepark.group</td></tr> 


                        </table>
                        <table width="100%" style="margin-top: 20px;">  
                            <tr> <td>Service-/ Bürozeiten: </td> </tr>
                            <tr> <td>Mo. bis Fr.</td></tr> 
                            <tr> <td>07:30 - 20:00 Uhr</td></tr> 

                        </table>
                        <table width="100%" style="margin-top: 20px;">  
                            <tr> <td>Düsseldorf, den 01.10.2017</td> </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">  
                            <tr> <td>Finanzamt </td> </tr>
                            <tr> <td>Düsseldorf-Nord</td> </tr>
                            <tr> <td>Rechnungs-Nr. 002/17</td> </tr>
                            <tr> <td>Kunden-Nr. OP-211-1704</td> </tr>
                        </table>
                    </td>
                </tr>

            </table>

            <table width="100%" border="1">

                <thead>
                    <tr>
                        <td>Bezeichnung</td>
                        <td class="padding-l-5">Menge</td>
                        <td class="padding-l-5">Einzelpreis</td>
                        <td class="padding-l-5">Betrag</td>
                    </tr>
                </thead>
                <tbody>

                    @for($k = 0; $k < count($getInvoice); $k++)
                    <tr>
                        <td >{{ $bezeichnung[$getInvoice[$k]['bezeichnung']] }}</td>
                        <td class="padding-l-5">{{ $getInvoice[$k]['menge'] }}</td>
                        <td class="padding-l-5">{{ number_format($getInvoice[$k]['einzelpreis'],2) }}€x</td>
                        <td class="padding-l-5">{{ number_format($getInvoice[$k]['total'],2) }} €</td>
                    </tr>
                    @endfor
                    <tr>
                        <td colspan="2"></td>
                        <td>Endbetrag: 
                            <br>
                            <span class="small-fornt">Gemäß §19 UStG enthält der Rechnungsbetrag keine Umsatzsteuer</span>
                        </td>
                        <td>{{ number_format($getInvoice[0]['invoiceTotal'],2) }} €</td>

                    </tr>
                </tbody>
            </table>
            <br>
            <table width="100%">
                <tr>
                    <td>
                        <span>Der Betrag in Höhe von 47,45 € wird per SEPA-Mandat von Ihrem Konto eingezogen. Erstlastschriften werden
Ihrem Konto nach 3 Werktagen, Folgelastschriften nach 1 Werktag belastet. </span>
                    </td>
                </tr>
                <br>
                <tr>
                    <td>
                        <span>Ihre Bankverbindung:
                            {{ chunk_split($getInvoice[0]['account_iban'], 4, ' ') }}  • 
                            {{ $getInvoice[0]['account_bic'] }}  
                        </span>
                    </td>

                </tr>
                <br>
                <tr>
                    <td>
                        <span>Stadtsparkasse Düsseldorf  {{ $getInvoice[0]['account_name'] }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>Mandatsreferenz: {{ $getInvoice[0]['customer_number'] }} • Creditor ID:  {{ $getInvoice[0]['system_genrate_no'] }} </span>
                    </td>
                </tr>
                <tr>
                    <td>
                       Mit freundlichen Grüßen
                    </td>
                </tr>
            </table>
        </div>
        <table width="100%">
            <tr>
                <td>Ihr OFFICE PARK-Team</td>
                <td>
                    <table>
                        <tr><td><b>Bankverbindung:</b></td></tr>
                        <tr><td>Postbank AG</td></tr>
                        <tr><td>IBAN: DE78 4401 0046 0381 0084 63</td></tr>
                        <tr><td>BIC/Swift: PBNKDEFF</td></tr>
                        <tr><td>Gläubiger -ID: DE91ZZZ00002054440</td></tr>
                    </table>
                </td>
                <td>
                    <table>
                        <tr><td>Seite 1 von 1
                            </td>
                        </tr>
                        <tr><td>Schreiben vom 01.10.17</td></tr>
                    </table>
                </td>
            </tr>
        </table>

    </div>
</body>
</html>