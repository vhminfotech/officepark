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
                font-size: 8px;
                color: #000;
                margin-top: 3px;
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
                                <td>{{ $arrOrder[0]['company_name'] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $arrOrder[0]['address'] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $arrOrder[0]['postal_code'] }}</td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>Rufumleitung einrichten(alle Angaben ohne Gewähr)</td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>{{ ($arrOrder[0]['gender'] == 'M' ? 'Sehr geehrter' : 'Sehr geehrte') }} {{ $arrOrder[0]['fullname'] }},</td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>mit  dieser  Anleitung  möchten  wir  Ihnen  die  Rufumleitung  zu  Office  Park    
                                    erklären. In wenigen Schritten ist die Rufumleitung aktiviert. So können Sie 
                                    unseren Service schnellstmöglich vollumfänglich nutzen
                                    . </td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>Ihre Anrufe leiten Sie bitte an unsere folgende Rufnummer: </td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>{{ $arrOrder[0]['system_genrate_no'] }} </td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>Bequeme Rufumleitung über Tasenkombination Ihres Telefons: </td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>
                                    <ul>
                                        <li> Geben Sie bitte folgende Tastenkombination in Ihr Telefon ein: *21*{{ str_replace("-","",$arrOrder[0]['system_genrate_no']) }}#</li>
                                        <li> Drücken Sie nun die Wähltaste und warten Sie die Bandabsage ab. </li>
                                        <li> Die Ansage wird Ihnen abschließend bestätigen, dass der Dienst nun aktiviert ist.*</li>
                                    </ul> 
                                </td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>
                                    Mit freundlichen Grüßen
                                </td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>
                                    Ihr OFFICE PARK-Team
                                </td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>
                                    * Zur Deaktivierung der Rufumleitung drücken Sie: #21#und bestätigen Sie die Wähltaste.
                                </td>
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
                            <tr> <td>Düsseldorf, den {{ date('d.m.Y') }} </td> </tr>
                        </table>
                        <table width="100%" style="margin-top: 10px;">  
                            <tr> <td>Finanzamt </td> </tr>
                            <tr> <td>Düsseldorf-Nord </td></tr>
                        </table>
                        <table width="100%" style="margin-top: 50px;">  
                            <tr> <td>&nbsp; </td> </tr>
                            <tr> <td>&nbsp; </td> </tr>
                        </table>
                        <table width="100%" style="margin-top: 50px;">  
                            <tr> <td>&nbsp; </td> </tr>
                            <tr> <td>&nbsp; </td> </tr>
                        </table>
                        <table width="100%" style="margin-top: 10px;">  
                            <tr> <td>&nbsp; </td> </tr>
                            <tr> <td>&nbsp;</td> </tr>
                        </table>
                        <table width="100%" style="margin-top: 10px;">  
                            <tr> <td>&nbsp; </td> </tr>
                            <tr> <td>&nbsp; </td> </tr>
                        </table>
                        <table width="100%" style="margin-top: 10px;">  
                            <tr> <td>&nbsp; </td> </tr>
                            <tr> <td>&nbsp; </td> </tr>
                        </table>
                        <table width="100%" style="margin-top: 10px;">  
                            <tr> <td>&nbsp; </td> </tr>
                            <tr> <td>&nbsp; </td> </tr>
                        </table>
                    </td>
                </tr>

            </table>

            
            <br>
            
            <table class="lastdescription" width="100%">
                <tr><td colspan="3"><hr/></td></tr>
                <tr><td colspan="3">&nbsp;</td></tr>
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