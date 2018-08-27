<!--<html>
    <head>
        <title>Invoice</title>
    </head>
    <body>
        <h1> Test Invoice </h1>
        <p>User ID : {{ $id }}</p>
    </body>
</html>-->
<!doctype html>
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
            table.boxtable{
/*                border: 1px solid #000;
                height: 15px;
                width: 25px;*/
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
                    @php
  //  print_r($arrOrder);exit;
                    @endphp
                    <td colspan="2">
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
                                <td style="font-size: 20px;"><b>Herzlich Willkommen bei OFFICE PARK</b></td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>Sehr {{ $arrOrder[0]['center_to_customer_route'] }},</td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>wir freuen uns, dass wir Sie als neuen OFFICE PARK-Kunden begrüßen
                                    dürfen. Ihr Erreichbarkeitsservice ist ab sofort einsatzbereit und unsere
                                    Agenten nehmen Ihre Anrufe entgegen. </td>

                            </tr>

                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>Mit diesem Schreiben erhalten Sie eine Übersicht über Ihre Kundendaten,
                                    unsere AGB‘s, die Preisliste sowie Hinweise für Ihren persönlichen Kundenbereich.
                                    Bitte nehmen Sie sich am Anfang etwas Zeit um alle Daten zu
                                    kontrollieren und ggf. zu ergänzen!</td>

                            </tr>

                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>Weiterhin bitten wir Sie, uns die beiliegende Sepa-Lastschrift-Verfügung
                                    unterschrieben zurückzusenden - gerne auch per E-Mail.</td>

                            </tr>

                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>Wir wünschen Ihnen viel Erfolg mit Ihrem neuen Telefonsekretariat und
                                    freuen uns auf eine gute und langjährige Zusammenarbeit. Sollten Sie
                                    weitere Fragen haben, stehen Ihnen unsere Mitarbeiter aus dem
                                    <!--Service-Team gerne telefonisch unter {{ $arrOrder[0]['system_genrate_no'] }} zur Verfügung</td>-->
                                    Service-Team gerne telefonisch unter 0211 368 74 190 zur Verfügung</td>

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
                            <tr> <td>Düsseldorf-Nord </td> </tr>
                            <tr> <td>Steuernummer: 105/5902/4492 </td> </tr>
                            <tr> <td>Ust-IdNr.: DE317564846 </td> </tr>
                        </table>
                    </td>
                </tr>
                <tr><td colspan="3"><hr/></td></tr>
            </table>
            <!--            <div class="page-break"></div>-->
            <table width="100%">
                <tr>
                    <td><img  src="{{  asset('img/officepark-logo.jpg')  }}"></td>
<!--                    <td><b>Office | Park </b><span>GbR</span> </td>-->
                    <td>
                        <table style="font-size: 12px; line-height: 80%">
                            <tr><td><b>Bankverbindung:</b></td></tr>
                            <tr><td>Bank: Postbank AG</td></tr>
                            <tr><td>IBAN: DE78 4401 0046 0381 0084 63</td></tr>
                            <tr><td>BIC/Swift: PBNKDEFF</td></tr>
                            <tr><td>Gläubiger-ID: DE91ZZZ00002054440</td></tr>
                        </table>
                    </td>
                    <td>
                        <table style="font-size: 12px; line-height: 80%">
                            <tr><td>Seite 1 von 1</td></tr>
                            <tr><td>Schreiben vom 22.05.18</td></tr>
                        </table>
                    </td>
                </tr>
            </table>
            <div class="page-break"></div>

<!--            <table width="100%">
                <tr>
                    <td style="text-align: right; font-size: 22px;" colspan="3"><span >Kommunikation
                        </span><br><span>verbindet</span>
                    </td>
                    <td style="text-align: right; height: 50px;" colspan="3">
                        <img src="{{  asset('img/officepark-logo-footr.jpg')  }}">
                    </td>
                </tr>
            </table>-->
            <table width="100%">
                <tr>
                    <td colspan="3"><h3>Ihre persönlichen Daten</h3></td>
                    <td style="text-align: right; height: 50px;" colspan="3">
                        <img src="{{  asset('img/officepark-logo-footr.jpg')  }}">
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><span>Kundennummer:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $arrOrder[0]['customer_number'] }}</span></td>
                </tr>

                <tr>
                    <td colspan="3"><span>Ihre Umleitungsnummer:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ (empty($arrOrder[0]['generated_no']) ? 'N/A' : '+'.$arrOrder[0]['generated_no']) }}</span></td>
<!--                    <td colspan="3"><span>Ihre Umleitungsnummer:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+49 211 368 741 9004</span></td>-->
                </tr>

            </table>
            <table width="100%">
                <tr>
                    <td colspan="3"><h3>Vertragsdaten</h3></td>
                </tr>
                <tr>
                    <td colspan="3"><span>Vertragsbeginn:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ date('d.m.Y',strtotime($arrOrder[0]['created_at'])) }}</span></td>
                </tr>

                <tr>
                    <td colspan="3"><span>Vertrag:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $arrOrder[0]['is_package'] == 1 ? 'BUSINESS' : '' }} </span></td>
                </tr>
                <tr>
                    <td colspan="3"><span>Zahlungsweise:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SEPA Lastschrift</span></td>
                </tr>
            </table>

            <table width="100%">
                <tr>
                    <td colspan="3"><h3>Bankverbindung</h3></td>
                </tr>
                <tr>
                    <td colspan="3"><span>IBAN:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $arrOrder[0]['account_iban'] }}</span></td>
                </tr>

                <tr>
                    <td colspan="3"><span>BIC:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $arrOrder[0]['account_bic'] }}</span></td>
                </tr>

                <tr>
                    <td colspan="3"><span>Mandatsreferenz:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $arrOrder[0]['customer_number'] }}</span></td>
                </tr>
            </table>  
            <table width="100%">
                <tr>
                    <td colspan="3"><h3>Zugangsdaten</h3></td>
                </tr>
                <tr>
                    <td colspan="3"><span>UserID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $arrOrder[0]['email'] }}</span></td>
                </tr>

                <tr>
                    <td colspan="3"><span>Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tuzkaya2018!</span></td>
                </tr>
            </table>
            <br>
            <br>
            <br>
            <table>
                <tr>
                    <td colspan="3">
                        <div style="width:600px;height:130px;border:1px solid #000;">nur bei Teilnahme am Lastschriftverfahren:
                            <span style="font-size: 15px;">
                                Ich ermächtige OFFICE PARK, Zahlungen von meinem Konto mittels Lastschrift einzuziehen.
                                Zugleich weise ich mein Kreditinstitut an, die von OFFICE PARK auf mein Konto gezogenen Lastschriften
                                einzulösen. Im Falle einer Rücklastschrift mangels Deckung wird eine Gebühr von 10,- € netto fällig.
                                Hinweis: Ich kann innerhalb von acht Wochen, beginnend mit dem Belastungsdatum, die Erstattung des
                                belasteten Betrages verlangen. Es gelten dabei die mit meinem Kreditinstitut vereinbarten Bedingungen.
                                Die Erstlastschrift erfolgt nach 5 Tagen, Folgelastschriften nach 2 Tagen.
                            </span>
                        </div>
                    </td>
                </tr>

                <br>

            </table>

            <br>
            <table width="100%">
                <tr><td colspan="3"><hr/></td></tr>
                <br>
                <br>
                <br>
                <tr>
                    <td><img src="{{asset('img/officepark-logo.jpg') }}"></td>
                    <td>
                        <table style="font-size: 12px; line-height: 80%">
                            <tr><td><b>Bankverbindung:</b></td></tr>
                            <tr><td>Bank: Postbank AG</td></tr>
                            <tr><td>IBAN: DE78 4401 0046 0381 0084 63</td></tr>
                            <tr><td>BIC/Swift: PBNKDEFF</td></tr>
                            <tr><td>Gläubiger-ID: DE91ZZZ00002054440</td></tr>
                        </table>
                    </td>
                    <td>
                        <table style="font-size: 12px; line-height: 80%">
                            <tr><td>Seite 1 von 1</td></tr>
                            <tr><td>Schreiben vom 22.05.18</td></tr>
                        </table>
                    </td>
                </tr>
            </table>

            
          @if($arrOrder[0]['accept'] != 'uber') 
          <div class="page-break"></div>
            <table width="100%">
                <tr>
                     <td style="text-align: right; height: 50px;" colspan="3">
                        <img src="{{  asset('img/officepark-logo-footr.jpg')  }}">
                    </td>
<!--                    <td style="text-align: right; font-size: 22px;" colspan="3"><span >Kommunikation
                        </span><br><span>verbindet</span>
                    </td>-->
                </tr>
                <tr>
                    <td colspan="3" style="border-bottom: 1px solid #ccc;width: 100%;">
                        <h4 style="margin: 0px;">SEPA-Lastschriftmandat</h4>
                        <p style="margin: 0px;">Oftice Park</p>                          
                        <span>Muinsterstr 330, Gebaude B I 40470 Dusseldorf 1 Deutschland</span>                          
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><span>&nbsp;</span></td>
                </tr>
                <tr>
                    <td colspan="1" width="55%">
                        <table class="boxtable">
                            <tr>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <p class="simpletext" style="font-size: 12px;margin: 0px;">Lorem Ipsum is simply</p>
                            </tr>
                            
                        </table> 
                    </td>
                    <td colspan="1" width="20%">
                        <table class="boxtable">
                            <tr>
                                <td width="30%">X</td>
                                <p class="simpletext" style="font-size: 12px;margin: 0px;">Lorem Ipsum is simply</p>
                                <p class="simpletext" style="font-size: 12px;margin: 0px;">Lorem Ipsum is simply</p>
                            </tr>
                        </table>
                    </td>
                    <td colspan="1" width="20%">
                        <table class="boxtable">
                            <tr>
                                <td width="30%">&nbsp;</td>
                                <p class="simpletext" style="font-size: 12px;margin: 0px;">Lorem Ipsum is simply</p>
                                <p class="simpletext" style="font-size: 12px;margin: 0px;">Lorem Ipsum is simply</p>
                            </tr>
                        </table>
                    </td>
                   
                </tr>
                <tr>
                    <td colspan="3"><span>&nbsp;</span></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h4 style="margin: 0px;">Office Park GbR</h4>
                        <h4 style="margin: 0px;"> Münsterstraße 330, Gebäude B</h4>
                        <h4 style="margin: 0px;"> 40470 Düsseldorf</h4>
                        <h4 style="margin: 0px;"> Deutschland</h4>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><span>&nbsp;</span></td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px solid #000;" colspan="3"><span>&nbsp;</span></td>
                </tr>
                
                <tr>
                    <td colspan="3"><span>&nbsp;</span></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table class="boxtable">
                            <tr>
                                @php
                                $customerNumber = str_split($arrOrder[0]['customer_number']);
                                @endphp
                                @for($i = 0; $i < count($customerNumber);$i++)
                                <td>{{ $customerNumber[$i] }}</td>
                                @endfor
                                <td></td>
                                <td></td>
                                <p class="simpletext" style="font-size: 12px;margin: 0px;">Lorem Ipsum is simply</p>
                            </tr>
                        </table>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="3"><span>&nbsp;</span></td>
                </tr>
                 
                <tr>
                    <td colspan="3">
                        <table class="boxtable">
                            <tr>
                                @php
                                $companyName = str_split($arrOrder[0]['company_name']);
                                @endphp
                                @for($i = 0; $i < count($companyName);$i++)
                                <td>{{ $companyName[$i] }}</td>
                                @endfor
                                <p class="simpletext" style="font-size: 12px;margin: 0px;">Lorem Ipsum is simply</p>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><span>&nbsp;</span></td>
                </tr>
                <tr>
                    <td colspan="3"><span>&nbsp;</span></td>
                </tr>
                
                <tr>
                    <td colspan="3">
                        <table class="boxtable">
                            <tr>
                                @php
                                $address = str_split($arrOrder[0]['address']);
                                @endphp
                                @for($i = 0; $i < count($address);$i++)
                                <td>{{ $address[$i] }}</td>
                                @endfor
                                <p class="simpletext" style="font-size: 12px;margin: 0px;">Lorem Ipsum is simply</p>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="3">
                        <table class="boxtable">
                            <tr>
                                @php
                                $postal_code = str_split($arrOrder[0]['postal_code']);
                                @endphp
                                @for($i = 0; $i < count($postal_code);$i++)
                                <td>{{ $postal_code[$i] }}</td>
                                @endfor
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <p class="simpletext" style="font-size: 12px;margin: 0px;">Lorem Ipsum is simply</p>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table class="boxtable">
                            <tr>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <p class="simpletext" style="font-size: 12px;margin: 0px;">Lorem Ipsum is simply</p>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table class="boxtable">
                            <tr>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <p class="simpletext" style="font-size: 12px;margin: 0px;">Lorem Ipsum is simply</p>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table class="boxtable">
                            <tr>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <td>B</td>
                                <p class="simpletext" style="font-size: 12px;margin: 0px;">Lorem Ipsum is simply</p>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="50%">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                    </td>
                    <td width="50%">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                    </td>
                    <td width="0%">
                        
                    </td>
               </tr>
            </table>
          <table width='100%'>
                <tr>
                    <td>______________</td>
                    <td>______________</td>
                    <td>__________________________________</td>
                </tr>
                <tr>
                    <td>ort</td>
                    <td>Datum</td>
                    <td>Unterschrift(en) des Zahlungspffichtigen (Kontoinhaber)</td>
                </tr>
            </table>
            @endif
            <div class="page-break"></div>
<!--            <table width="100%">
                <tr>
                    <td style="text-align: right; font-size: 22px;" colspan="3"><span >Kommunikation
                        </span><br><span>verbindet</span>
                    </td>
                </tr>
            </table>-->
            <table width='100%'>
                <tr>
                    <td colspan="2">Ihr gebuchter Telefonservice-Tarif: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Business</td>
                     <td style="text-align: right; height: 50px;" colspan="3">
                        <img src="{{  asset('img/officepark-logo-footr.jpg')  }}">
                    </td>
                </tr>
            </table>
            <br>
            <br>
            <br>
            <table width='700px'>
                <div style="width:700px;height:510px;border:1px solid gray;">
                    <span style="margin-left: 10px;">Telefonservice</span><p style="float: right; line-height: 20%;margin-right: 30px !important;">business.call</p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <span style="margin-left: 10px;">Mindestumsatz, pro Monat </span>
                    <p style="float: right; line-height: 20%;margin-right: 30px !important;"> 30,00 €</p>
                    <hr>
                    <span style="margin-left: 10px;">Anrufannahme, pro Anruf </span>
                    <p style="float: right; line-height: 20%;margin-right: 30px !important;"> 1,00 € </p>
                    <hr>
                    <span style="margin-left: 10px;">Benachrichtigungsanruf an Ihren Kunden, pro Anruf </span>
                    <p style="float: right; line-height: 20%;margin-right: 30px !important;"> 1,00 € </p>

                    <hr>
                    <span style="margin-left: 10px;">Anrufbearbeitung, pro Minute  </span>
                    <p style="float: right; line-height: 20%;margin-right: 30px !important;"> 0,00 €  </p>

                    <hr>
                    <span style="margin-left: 10px;">Benachrichtigung per E-Mail, pro E-Mail  </span>
                    <p style="float: right; line-height: 20%;margin-right: 30px !important;"> kostenfrei </p>

                    <hr>
                    <span style="margin-left: 10px;">Weiterleitungsgebühren, dt. Mobilnetz, pro Min. </span>
                    <p style="float: right; line-height: 20%;margin-right: 30px !important;"> 0,25 €  </p>

                    <hr>
                    <span style="margin-left: 10px;">Weiterleitungsgebühren, dt. Festnetz, pro Min. </span>
                    <p style="float: right; line-height: 20%;margin-right: 30px !important;"> 0,15 €  </p>

                    <hr>
                    <span style="margin-left: 10px;">AnrufaBenachrichtigung per SMS, pro SMS (optional)nnahme</span>
                    <p style="float: right; line-height: 20%;margin-right: 30px !important;"> 0,20 €0,20 € </p>

                    <hr>
                    <span style="margin-left: 10px;">Vertragslaufzeit</span>
                    <p style="float: right; line-height: 20%;margin-right: 30px !important;"> auf unbestimmte Zeit  </p>

                    <hr>
                    <span style="margin-left: 10px;">Kündigungsfrist</span>
                    <p style="float: right; line-height: 20%;margin-right: 30px !important;"> auf unbestimmte Zeit  </p>

                    <hr>
                    <span style="margin-left: 10px;">Abrechnungszeitraum</span>
                    <p style="float: right; line-height: 20%;margin-right: 30px !important;"> 27. - 26. des Folgemonats
                    </p>
                    <hr>
                    <span style="margin-left: 10px;">Servicezeiten</span>
                    <p style="float: right; line-height: 20%;margin-right: 30px !important;"> 09:00 - 19:00 Uhr 
                    </p>
                    <hr>
                </div>
            </table>
            <br>
            <br>
            <br>
            <br>
            <br>
            <table width="100%">
                <tr><td colspan="3"><hr/></td></tr>
                <tr>
                    <td><img src="{{  asset('img/officepark-logo.jpg')  }}"></td>
                    <td>
                        <table style="font-size: 12px; line-height: 80%">
                            <tr><td><b>Bankverbindung:</b></td></tr>
                            <tr><td>Bank: Postbank AG</td></tr>
                            <tr><td>IBAN: DE78 4401 0046 0381 0084 63</td></tr>
                            <tr><td>BIC/Swift: PBNKDEFF</td></tr>
                            <tr><td>Gläubiger-ID: DE91ZZZ00002054440</td></tr>
                        </table>
                    </td>
                    <td>
                        <table style="font-size: 12px; line-height: 80%">
                            <tr><td>Seite 1 von 1</td></tr>
                            <tr><td>Schreiben vom 22.05.18</td></tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>