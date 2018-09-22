<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Office Park</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600" rel="stylesheet">

        <!-- Favicon -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

        <!-- Stylesheet -->
        <link rel="stylesheet" href="{{  asset('css/main.pdf.css?v=2.0') }}">
   
        <style>
            .main-header{
/*                font-size: 35px;
                line-height: 35px;*/
                text-align: right;
            }
            
            .text-undeline{
                text-decoration: underline;
                font-size: 11px;
                line-height: 200%;
            }
            .small-fornt{
                font-size: 10px;
                text-align: right;
                padding-top: -85px;
                padding-left: -10px;
                color: #40403f;
            }
            .page-break {
                page-break-after: always;
            }
            .padding-l-5{
                padding-left: 5px;
            }
            .sectionClient td{
                /*padding-top: -200px;*/
                 line-height: 11px;
            }
            .small-fornt td{
                line-height: 7px;
            }
            .lastdescription td{
                line-height: 11px;
                font-size: 11px;
            }
            .lastdescription th{
                font-size: 12px;
                line-height: 17px;
            }
            .euroicone{
                font-weight: normal;
            }
        </style>
    </head>

    <body style="background-color: #fff;">
        <div class="invoice-box">
            <table class="mainleftside" width="100%">
                <tr>
                    <td class="main-header" colspan="3">
                        <!--<span >Office | Park</span>-->
                        <img style="margin: 0px;"  src="{{  asset('img/officepark-logo.jpg')  }}">
                    </td>
                </tr>
                <tr>
                    <td  class="" colspan="3">Office Park GbR - Münsterstraße 330, Gebäude B - 40470 Düsseldorf</td>
                </tr>
<!--                <tr>
                    <td class="text-undeline" colspan="3"><hr/></td>
                </tr>-->
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
                        <table width="100%" style="margin-top: 40px;">
                            <tr>
                                <td><b>Ihre Rechnung für den Zeitraum ({{ date('d.m.Y',strtotime($getInvoice[0]['start_date'])) .' - '. date('d.m.Y',strtotime($getInvoice[0]['end_date'])) }})</b></td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-top: 40px;">
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
                        <table width="100%" style="margin-top: 10px;">       
                            <tr> <td>  Gesellschafter</td> </tr>
                            <tr> <td>  Mustafa Basun</td> </tr>
                        </table>
                        <table width="100%" style="margin-top: 10px;">  
                            <tr> <td>Münsterstraße 330 </td> </tr>
                            <tr> <td>Gebäude B</td></tr> 
                            <tr> <td>40470 Düsseldorf</td></tr> 
                            <tr> <td>Telefon: +49 (0) 211 368 74 190</td></tr> 
                            <tr> <td>Telefax: +49 (0) 211 368 74 190 01</td></tr> 
                            <tr> <td>Web:    www.officepark.group</td></tr> 
                            <tr> <td>E-Mail:  info@officepark.group</td></tr> 
<!--                            <tr> <td>  Gesellschafter</td> </tr>
                            <tr> <td>  Mustafa Basun</td> </tr>-->
                        </table>
                        <table width="100%" style="margin-top: 10px;">  
                            <tr> <td>Service-/ Bürozeiten: </td> </tr>
                            <tr> <td>Mo. bis Fr.</td></tr> 
                            <tr> <td>09:00 - 19:00 Uhr</td></tr> 
                        </table>
                        <table width="100%" style="margin-top: 10px;">  
                            <tr> <td>Düsseldorf, den 22.05.2018 </td> </tr>
                        </table>
                        <table width="100%" style="margin-top: 10px;">  
                            <tr> <td>Finanzamt </td> </tr>
                            <tr> <td>Düsseldorf-Nord </td></tr>
                        </table>
                        <table width="100%" style="margin-top: 10px;">  
                            <tr> <td>Rechnungs-Nr. {{ $getInvoice[0]['invoice_no'] }} </td> </tr>
                            <tr> <td>Kunden-Nr. {{ $getInvoice[0]['customer_number'] }} </td> </tr>
                        </table>
                    </td>
                </tr>

            </table>

            <table class="lastdescription" width="100%" border="1" rules="rows">

                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Bezeichnung</th>
                        <th>Menge</th>
                        <th>Einzelpreis</th>
                        <th>Betrag</th>
                    </tr>
                </thead>
                <tbody>

                    @for($k = 0; $k < count($getInvoice); $k++)
                    <tr>
                        <td>&nbsp;</td>
                        <td>{{ $getInvoice[$k]['bezeichnung'] }}</td>
                        <td class="padding-l-5">{{ $getInvoice[$k]['menge'] }}</td>
                        <td class="padding-l-5">{{ number_format($getInvoice[$k]['einzelpreis'],2) }} <i class="fa fa-eur euroicone" aria-hidden="true"></i></td>
                        <td class="padding-l-5">{{ number_format($getInvoice[$k]['total'],2) }} <i class="fa fa-eur euroicone" aria-hidden="true"></i></td>
                    </tr>
                    @endfor
                    <tr>
                        <td colspan="3"></td>
                        
                        <td><span>Final amount</span> 
                       </td>
                        <td> <b style="margin-left: 50px;">{{ number_format($getInvoice[0]['invoiceTotal'],2) }} €</b>
                       </td>

                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        
                        <td style="border-top: none;" colspan="2">
                            <span class="small-fornt">Gemäß §19 UStG enthält der Rechnungsbetrag keine Umsatzsteuer</span>
                        </td>

                    </tr>
                </tbody>
            </table>
            <br>
            <table class="lastdescription" width="100%">
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
                        <span>Account holder: {{ $getInvoice[0]['account_name'] }}</span>
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
            <table class="lastdescription" width="100%">
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