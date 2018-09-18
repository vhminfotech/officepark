<!DOCTYPE html>
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
                font-size: 12px;
                text-align: right;
                padding-top: -80px;
                padding-left: -30px;
            }
            .page-break {
                page-break-after: always;
            }
            .padding-l-5{
                padding-left: 5px;
            }
            .sectionClient{
                padding-top: -200px;
            }
            
            table.boxtable { border-collapse: collapse; }
            table.boxtable td { border: 1px solid gray;font-weight: bold;padding: 5px;line-height: 10px; }
        </style>
    </head>

    <body>
        <div class="invoice-box">
            <table width="100%">
                <tr>
                    <td class="main-header" colspan="3">
                        <!--<span >Office | Park</span>-->
                        <img  src="{{  asset('img/officepark-logo.jpg')  }}">
                    </td>
                </tr>
                <tr>
                    <td  class="text-undeline" colspan="3">Office Park GbR - Münsterstraße 330, Gebäude B - 40470 Düsseldorf</td>
                </tr>
                <tr>
                    <td colspan="3"><h3>- persönlich -</h3></td>
                </tr>
                <tr>
                    <td colspan="2" class="sectionClient">
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
                                <td>Dear Sir or Madam,</td>
                            </tr>
                            <tr>
                                <td>Please find attached your current monthly statement.</td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>Your booked telephone service tariff: {{ $getInvoice[0]['packages_name'] }} </td>
                            </tr>
                        </table>
                    </td>

                    <td width="20%"  class="small-fornt">
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
                            <tr> <td>Web:    www.officepark.group</td></tr> 
                            <tr> <td>E-Mail:  info@officepark.group</td></tr> 
                            <tr> <td>  Gesellschafter</td> </tr>
                            <tr> <td>  Mustafa Basun</td> </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">  
                            <tr> <td>Service-/ Bürozeiten: </td> </tr>
                            <tr> <td>Mo. bis Fr.</td></tr> 
                            <tr> <td>09:00 - 19:00 Uhr</td></tr> 
                        </table>
                        <table width="100%" style="margin-top: 20px;">  
                            <tr> <td>Düsseldorf, den 22.05.2018 </td> </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">  
                            <tr> <td>Finanzamt </td> </tr>
                            <tr> <td>Düsseldorf-Nord </td></tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">  
                            <tr> <td>Rechnungs-Nr. 002/17 </td> </tr>
                            <tr> <td>Kunden-Nr. {{ $getInvoice[0]['customer_number'] }} </td> </tr>
                        </table>
                    </td>
                </tr>

            </table>

            <table width="100%" border="1" rules="rows">

                <thead>
                    <tr>
                        <td>Bezeichnung</td>
                        <td>Menge</td>
                        <td>Einzelpreis</td>
                        <td>Betrag</td>
                    </tr>
                </thead>
                <tbody>

                    @for($k = 0; $k < count($getInvoice); $k++)
                    <tr>
                        <td>{{ $getInvoice[$k]['bezeichnung'] }}</td>
                        <td class="padding-l-5">{{ $getInvoice[$k]['menge'] }}</td>
                        <td class="padding-l-5">{{ number_format($getInvoice[$k]['einzelpreis'],2) }}€</td>
                        <td class="padding-l-5">{{ number_format($getInvoice[$k]['total'],2) }} €</td>
                    </tr>
                    @endfor
                    <tr>
                        <td colspan="2"></td>
                        
                        <td colspan="2">Final amount  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{{ number_format($getInvoice[0]['invoiceTotal'],2) }} €</b>
                            <br>
                            <span class="small-fornt">Gemäß §19 UStG enthält der Rechnungsbetrag keine Umsatzsteuer</span>
                        </td>

                    </tr>
                </tbody>
            </table>
            <br>
            <table width="100%">
                <tr>
                    <td>
                        <span>The amount of € {{ number_format($getInvoice[0]['invoiceTotal'],2) }} will be withdrawn from your account via {{ $getInvoice[0]['accept'] }} mandate. First direct debits will be charged to your account after 3 business days, follow-up direct debits after 1 business day.</span>
                    </td>
                </tr>
                <br>
                <tr>
                    <td>
                        <span>Your bank details:
                            {{ chunk_split($getInvoice[0]['account_iban'], 4, ' ') }}  • 
                            {{ $getInvoice[0]['account_bic'] }}  
                        </span>
                    </td>

                </tr>
                <br>
                <tr>
                    <td>
                        <span>Account holder: {{ $getInvoice[0]['account_namestr'] }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>Mandate Reference: {{ $getInvoice[0]['customer_number'] }} • Creditor ID:  {{ $getInvoice[0]['system_genrate_no'] }} </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        Best regards
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr><td colspan="3"><hr/></td></tr>
                <tr>
                    <td><img src="{{  asset('img/officepark-logo.jpg')  }}"></td>
                    <td>
                        <table>
                            <tr><td><b>Bankverbindung:</b></td></tr>
                            <tr><td>Bank: Postbank AG</td></tr>
                            <tr><td>IBAN: DE78 4401 0046 0381 0084 63</td></tr>
                            <tr><td>BIC/Swift: PBNKDEFF</td></tr>
                            <tr><td>Gläubiger-ID: DE91ZZZ00002054440</td></tr>
                        </table>
                    </td>
                    <td>
                        <table style="font-size: 12px; line-height: 80%">
                            <tr><td>Page 1 of 1</td>
                            </tr>
                            <tr><td>Write from {{ date('d.m.y') }}</td></tr>

                        </table>
                    </td>
                </tr>
            </table>

        </div>

    </body>
</html>