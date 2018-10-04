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
                margin-top: 0px;
            }
            table.boxtable{
/*                border: 1px solid #000;
                height: 15px;
                width: 25px;*/
            }
            table.boxtable { border-collapse: collapse; }
            table.boxtable td { border: 1px solid gray;font-weight: bold;padding: 5px;font-size: 10px;line-height: 10px; }
            table.boxtable1 td { border: 1px solid gray;font-weight: bold;font-size: 10px;padding: 5px;line-height: 10px;}
             table.boxtable1 { border-collapse: collapse; }
     
        </style>
    </head>
    <body style="background-color: #fff;">
        <div class="invoice-box">
            <table class="mainleftside"  width="100%">
                <tr>
                    <td class="main-header" colspan="3">
                        <!--<span >Office | Park</span>-->
                        <img  src="{{  asset('img/officepark-logo.jpg')  }}">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">Office Park GbR - Münsterstraße 330, Gebäude B - 40470 Düsseldorf</td>
                </tr>
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
                                <td style="font-size: 20px;"><b>Herzlich Willkommen bei OFFICE PARK</b></td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>{{ ($arrOrder[0]['gender'] == 'M' ? 'Sehr geehrter' : 'Sehr geehrte') }} {{ $arrOrder[0]['fullname'] }},</td>
                            </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">
                            <tr>
                                <td>
                                    wir freuen uns, dass wir Sie als neuen OFFICE PARK-Kunden begrüßen
                                    dürfen. Ihr Erreichbarkeitsservice ist ab sofort einsatzbereit und unsere
                                    Agenten nehmen Ihre Anrufe entgegen. 
                                </td>

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
                    <td width="20%"  class="small-fornt" >
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
<!--                            <tr> <td>  Gesellschafter</td> </tr>
                            <tr> <td>  Mustafa Basun</td> </tr>-->

                        </table>
                        <table width="100%" style="margin-top: 20px;">  
                            <tr> <td>Service-/ Bürozeiten: </td> </tr>
                            <tr> <td>Mo. bis Fr.</td></tr> 
                            <tr> <td>09:00 - 19:00 Uhr</td></tr> 

                        </table>
                        <table width="100%" style="margin-top: 20px;">  
                            <tr> <td>Düsseldorf, den {{ date('d.m.y') }} </td> </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">  
                            <tr> <td>Finanzamt </td> </tr>
                            <tr> <td>Düsseldorf-Nord </td> </tr>
                            <tr> <td>Steuernummer: 105/5902/4492 </td> </tr>
                            <tr> <td>Ust-IdNr.: DE317564846 </td> </tr>
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
                        <table width="100%" style="margin-top: 10px;">  
                            <tr> <td>&nbsp; </td> </tr>
                            <tr> <td>&nbsp; </td> </tr>
                        </table>
                        
                        
                    </td>
                </tr>
                <tr><td colspan="3">&nbsp;</td></tr>
                <tr><td colspan="3">&nbsp;</td></tr>
                <tr><td colspan="3">&nbsp;</td></tr>
                <tr><td colspan="3"><hr/></td></tr>
            </table>
            <table width="100%">
                <tr>
                    <td><img  src="{{  asset('img/officepark-logo.jpg')  }}"></td>
<!--                    <td><b>Office | Park </b><span>GbR</span> </td>-->
                    <td>
                        <table style="font-size: 12px; line-height: 80%;color: #45484d;">
                            <tr><td><b style="color: #0c0c0c;">Bankverbindung:</b></td></tr>
                            <tr><td>Bank: Postbank AG</td></tr>
                            <tr><td>IBAN: DE78 4401 0046 0381 0084 63</td></tr>
                            <tr><td>BIC/Swift: PBNKDEFF</td></tr>
                            <tr><td>Gläubiger-ID: DE91ZZZ00002054440</td></tr>
                        </table>
                    </td>
                    <td>
                        <table style="font-size: 12px; line-height: 80%;color: #45484d;">
                            <tr><td>Seite 1 von 4</td></tr>
                            <tr><td>Schreiben vom {{ date('d.m.y') }}</td></tr>
                        </table>
                    </td>
                </tr>
            </table>
            
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
                    <td colspan="3"><span>Ihre Umleitungsnummer:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ (empty($arrOrder[0]['system_genrate_no']) ? 'N/A' : $arrOrder[0]['system_genrate_no']) }}</span></td>
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
                    <td colspan="3"><span>Vertrag:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $websites  }} - {{ $getService['service'][0]['packages_name']  }} </span></td>
                </tr>
                <tr>
                    <td colspan="3"><span>Zahlungsweise:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ ($arrOrder[0]['accept'] != 'uber' ? 'SEPA Lastschrift' : 'Überweisung') }}</span></td>
                </tr>
            </table>
            @if($arrOrder[0]['accept'] != 'uber') 
            <table width="100%">
                <tr>
                    <td colspan="3"><h3>{{ $arrOrder[0]['company_name'] }} - Bankverbindung </h3></td>
                </tr>
                <tr>
                    <td colspan="3"><span>IBAN:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ wordwrap($arrOrder[0]['account_iban'], 4, ' ', true) }}</span></td>
                </tr>

                <tr>
                    <td colspan="3"><span>BIC:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $arrOrder[0]['account_bic'] }}</span></td>
                </tr>

                <tr>
                    <td colspan="3"><span>Mandatsreferenz:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $arrOrder[0]['customer_number'] }}</span></td>
                </tr>
            </table> 
            @else
            <table width="100%">
                <tr>
                    <td colspan="3"><h3>Office Park - Bankverbindung </h3></td>
                </tr>
                <tr>
                    <td colspan="3"><span>IBAN:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DE78 4401 0046 0381 0084 63</span></td>
                </tr>

                <tr>
                    <td colspan="3"><span>BIC:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PBNKDEFF</span></td>
                </tr>

                <tr>
                    <td colspan="3"><span>Ihre Kundennummer:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $arrOrder[0]['customer_number'] }}</span></td>
                </tr>
            </table>
            @endif
            <table width="100%" style="margin-bottom: 10px;">
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
            
            @if($arrOrder[0]['accept'] != 'uber') 
            <table style="margin-bottom: 10px;">
                <tr>
                    <td colspan="3">
                        <div style="border:1px solid #000;padding: 5px;">nur bei Teilnahme am Lastschriftverfahren:<br/>
                            <span style="font-size: 12px;">
                                Ich ermächtige OFFICE PARK, Zahlungen von meinem Konto mittels Lastschrift einzuziehen.
                                Zugleich weise ich mein Kreditinstitut an, die von OFFICE PARK auf mein Konto gezogenen Lastschriften
                                einzulösen. Im Falle einer Rücklastschrift mangels Deckung wird eine Gebühr von 10,- <i class="fa fa-eur euroicone" aria-hidden="true"></i> netto fällig.
                                Hinweis: Ich kann innerhalb von acht Wochen, beginnend mit dem Belastungsdatum, die Erstattung des
                                belasteten Betrages verlangen. Es gelten dabei die mit meinem Kreditinstitut vereinbarten Bedingungen.
                                Die Erstlastschrift erfolgt nach 5 Tagen, Folgelastschriften nach 2 Tagen.
                            </span>
                        </div>
                    </td>
                </tr>
            </table>
            @else
            
            @endif
            <br>
            <table width="100%">
                <tr><td colspan="3"><hr/></td></tr>
                
                <tr>
                    <td colspan="3">
                        <table width="100%">
                            <tr>
                                <td><img  src="{{  asset('img/officepark-logo.jpg')  }}"></td>
            <!--                    <td><b>Office | Park </b><span>GbR</span> </td>-->
                                <td>
                                    <table style="font-size: 12px; line-height: 80%;color: #45484d;">
                                        <tr><td><b style="color: #0c0c0c;">Bankverbindung:</b></td></tr>
                                        <tr><td>Bank: Postbank AG</td></tr>
                                        <tr><td>IBAN: DE78 4401 0046 0381 0084 63</td></tr>
                                        <tr><td>BIC/Swift: PBNKDEFF</td></tr>
                                        <tr><td>Gläubiger-ID: DE91ZZZ00002054440</td></tr>
                                    </table>
                                </td>
                                <td>
                                    <table style="font-size: 12px; line-height: 80%;color: #45484d;">
                                        <tr><td>Seite 2 von 4</td></tr>
                                        <tr><td>Schreiben vom {{ date('d.m.y') }}</td></tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            
          @if($arrOrder[0]['accept'] != 'uber') 
          <!--<div class="page-break"></div>-->
            <table width="100%">
                <tr>
                    
                     <td colspan="3">
                        <img style="float: right; " src="{{  asset('img/officepark-logo-footr.jpg')  }}">
                    </td>
                    
                </tr>
                <tr>
                    <td colspan="3" style="margin-bottom: 10px;border-bottom: 1px solid #ccc;width: 100%;">
                        <h4 style="margin: 0px;">SEPA-Lastschriftmandat</h4>
                        <p style="margin: 0px;font-size: 12px;">Office Park GbR</p>                          
                        <span style="margin: 0px;font-size: 10px;">Münsterstr 330, Gebäude B | 40470 Düsseldorf | Deutschland</span>                          
                    </td>
                </tr>
<!--                <tr>
                    <td colspan="3"><span>&nbsp;</span></td>
                </tr>-->
                <tr>
                    <td colspan="1">
                        <table class="boxtable1">
                            <tr>
                                @php
                                $numberStatic = str_split('DE91ZZZ00002054440');
                                @endphp
                                @for($i = 0; $i < count($numberStatic);$i++)
                                <td>{{ $numberStatic[$i] }}</td>
                                @endfor
                                <p class="simpletext" style="font-size: 10px;margin: 0px;">&nbsp;</p>
                                <p class="simpletext" style="font-size: 10px;margin: 0px;">Gläubiger-Identifikationsnummer / creditor identifler</p>
                            </tr>
                            
                        </table> 
                    </td>
                    <td colspan="1">
                        <table class="boxtable1">
                            <tr>
                                <td>X</td>
                                <p class="simpletext" style="font-size: 10px;margin: 0px;">Wiederkehrende Zahlung</p>
                                <p class="simpletext" style="font-size: 10px;margin: 0px;">Zahlungsart:</p>
                                
                            </tr>
                        </table>
                    </td>
                    <td colspan="1">
                        <table class="boxtable1">
                            <tr>
                                <td>&nbsp;</td>
                                <p class="simpletext" style="font-size: 10px;margin: 0px;">Einmalige Zahlung</p>
                                <p class="simpletext" style="font-size: 10px;margin: 0px;">Zahlungsart:</p>
                                
                            </tr>
                        </table>
                    </td>
                   
                </tr>
<!--                <tr>
                    <td colspan="3"><span>&nbsp;</span></td>
                </tr>-->
                <tr>
                    <td colspan="3">
                        <h4 style="margin: 0px;font-size: 10px;">Office Park GbR,</h4>
                        <h4 style="margin: 0px;font-size: 10px;"> Münsterstraße 330, Gebäude B</h4>
                        <h4 style="margin: 0px;font-size: 10px;"> 40470 Düsseldorf</h4>
                        <h4 style="margin: 0px;font-size: 10px;"> Deutschland</h4>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><span>&nbsp;</span></td>
                </tr>
<!--                <tr>
                    <td style="margin: 0px;border-bottom: 1px solid #000;" colspan="3"><span>&nbsp;</span></td>
                </tr>-->
                
<!--                <tr>
                    <td colspan="3"><span>&nbsp;</span></td>
                </tr>-->
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
                                <p class="simpletext" style="font-size: 10px;margin: 0px;">Mandatsreferenz / Mandate reference</p>
                            </tr>
                        </table>
                    </td>
                </tr>
                
<!--                <tr>
                    <td colspan="3"><span>&nbsp;</span></td>
                </tr>-->
                 
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
                                <p class="simpletext" style="font-size: 10px;margin: 0px;">Name des Zahlungspflichtigen (Kontoinhaber) / Name of the debtor (account holder)</p>
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
<!--                <tr>
                    <td colspan="3"><span>&nbsp;</span></td>
                </tr>-->
                
                <tr>
                    <td colspan="3">
                        <table class="boxtable">
                            <tr>
                                @php
                                function str_split_unicode($str, $length = 1) {
                                    $tmp = preg_split('~~u', $str, -1, PREG_SPLIT_NO_EMPTY);
                                    if ($length > 1) {
                                        $chunks = array_chunk($tmp, $length);
                                        foreach ($chunks as $i => $chunk) {
                                            $chunks[$i] = join('', (array) $chunk);
                                        }
                                        $tmp = $chunks;
                                    }
                                    return $tmp;
                                }
                                $address = str_split_unicode($arrOrder[0]['address']);
                                
                                @endphp
                                @for($i = 0; $i < count($address);$i++)
                                <td>{{ $address[$i] }}</td>
                                @endfor
                                <p class="simpletext" style="font-size: 10px;margin: 0px;">Anschrift des Zahlungspflichtigen (Kontoinhaber / Address of the debtor (account holder)</p>
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
                                function str_split_unicode1($str, $length = 1) {
                                    $tmp = preg_split('~~u', $str, -1, PREG_SPLIT_NO_EMPTY);
                                    if ($length > 1) {
                                        $chunks = array_chunk($tmp, $length);
                                        foreach ($chunks as $i => $chunk) {
                                            $chunks[$i] = join('', (array) $chunk);
                                        }
                                        $tmp = $chunks;
                                    }
                                    return $tmp;
                                }
                                $postal_code = str_split_unicode1($arrOrder[0]['postal_code']);
                                @endphp
                                @for($i = 0; $i < count($postal_code);$i++)
                                <td>{{ $postal_code[$i] }}</td>
                                @endfor
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <p class="simpletext" style="font-size: 10px;margin: 0px;">Anschrift des Zahlungspflichtigen (Kontoinhaber / Address of the debtor (account holder)</p>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table class="boxtable">
                            <tr>
                                
                                @php
                                function str_split_unicode2($str, $length = 1) {
                                    $tmp = preg_split('~~u', $str, -1, PREG_SPLIT_NO_EMPTY);
                                    if ($length > 1) {
                                        $chunks = array_chunk($tmp, $length);
                                        foreach ($chunks as $i => $chunk) {
                                            $chunks[$i] = join('', (array) $chunk);
                                        }
                                        $tmp = $chunks;
                                    }
                                    return $tmp;
                                }
                                $address = str_split_unicode2($arrOrder[0]['address']);
                                
                                @endphp
                                @for($i = 0; $i < count($address);$i++)
                                <td>{{ $address[$i] }}</td>
                                @endfor
                                <p class="simpletext" style="font-size: 10px;margin: 0px;">Anschrift des Zahlungspflichtigen (Kontoinhaber / Address of the debtor (account holder)</p>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table class="boxtable">
                            <tr>
                               @php
                                $account_iban = str_split($arrOrder[0]['account_iban']);
                                @endphp
                                @for($i = 0; $i < count($account_iban);$i++)
                                <td>{{ $account_iban[$i] }}</td>
                                @endfor
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <p class="simpletext" style="font-size: 10px;margin: 0px;">IBAN des Zahlungspflichtigen / IBAN of the debtor</p>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table class="boxtable">
                            <tr>
                                @php
                                $account_bic = str_split($arrOrder[0]['account_bic']);
                                @endphp
                                @for($i = 0; $i < count($account_bic);$i++)
                                <td>{{ $account_bic[$i] }}</td>
                                @endfor
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <p class="simpletext" style="font-size: 10px;margin: 0px;">BIC des Zahlungspflichtigen / BIC of the debtor</p>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!--<tr><td colspan="3">&nbsp;</td></tr>-->
                <tr>
                    <td colspan="3">
                        <table width='100%'>
                            <tr>
                                <td style="font-size: 10px;width:50%;">
                                    Ich ermächtige (Wir ermächtigen) den Zahlungsempfänger Office Park GbR, Zahlungen von meinem (unserem) Konto mittels Lastschrift einzuziehen. Zugleich weise ich mein (weisen wir unser) Kreditinstitut an, die von Office Park GbR auf mein (unsere) Konto gezogenen Lastschriften einzulösen.
                                </td>
                                <td  style="font-size: 10px;width:40%;">
                                     Hinweis: Ich kann (Wir können) innerhalb von acht Wochen, beginnend mit dem Belastungsdatum, die Erstattung des belasteten Betrages verlangen. Es gelten dabei die mit einem (unserem) Kreditinstitut vereinbarten Bedingungen.
                                </td>
                            </tr>
                        </table>
                    </td>
               </tr>
               <!--<tr><td colspan="3">&nbsp;</td></tr>-->
               <tr>
                   <td colspan="3">
                       <table width='100%'>
                            <tr>
                                <td>______________</td>
                                <td>______________</td>
                                <td>__________________________________</td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px;">ort</td>
                                <td style="font-size: 12px;">Datum</td>
                                <td style="font-size: 12px;">Unterschrift(en) des Zahlungspffichtigen (Kontoinhaber)</td>
                            </tr>
                        </table>
                   </td>
               </tr>
               
               <tr>
                   <td colspan="3">
                       <table width="100%">
                <tr><td colspan="3"><hr/></td></tr>
                <tr>
                    <td colspan="3">
                        <table width="100%">
                            <tr>
                                <td><img  src="{{  asset('img/officepark-logo.jpg')  }}"></td>
            <!--                    <td><b>Office | Park </b><span>GbR</span> </td>-->
                                <td>
                                    <table style="font-size: 12px; line-height: 80%;color: #45484d;">
                                        <tr><td><b style="color: #0c0c0c;">Bankverbindung:</b></td></tr>
                                        <tr><td>Bank: Postbank AG</td></tr>
                                        <tr><td>IBAN: DE78 4401 0046 0381 0084 63</td></tr>
                                        <tr><td>BIC/Swift: PBNKDEFF</td></tr>
                                        <tr><td>Gläubiger-ID: DE91ZZZ00002054440</td></tr>
                                    </table>
                                </td>
                                <td>
                                    <table style="font-size: 12px; line-height: 80%;color: #45484d;">
                                        <tr><td>Seite 3 von 4</td></tr>
                                        <tr><td>Schreiben vom {{ date('d.m.y') }}</td></tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
                   </td>
               </tr>
            </table>
          
            @endif
             
            @if($arrOrder[0]['accept'] == 'uber') 
             <div class="page-break"></div>
            @endif
            
            <table width='100%'>
                <tr>
                    <td colspan="2">Ihr gebuchter Telefonservice-Tarif: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $websites  }} - {{ $getService['service'][0]['packages_name']  }}</td>
                     <td style="text-align: right; height: 50px;" colspan="3">
                        <img src="{{  asset('img/officepark-logo-footr.jpg')  }}">
                    </td>
                </tr>
            </table>
            <br>
            <br>
            <br>
            <table width='100%'>
                <div style="width:700px;height:auto;border:1px solid gray;">
                    <span style="margin-left: 10px;">Telefonservice</span><p style="float: right; margin-right: 30px !important;">{{ $websites  }} - {{ $getService['service'][0]['packages_name']  }}</p>
                    <br>
                    <br>
                    <br>
                    <br>
                    @php
                    $storeAyy = $getService['service_detail'];
                    @endphp
                    @for($j = 0; $j < count($storeAyy);$j++)
                    <span style="margin-left: 10px;">{{  $storeAyy[$j]['title'] }}</span>
                    @if(is_numeric($storeAyy[$j]['price']))
                    @php $price = $storeAyy[$j]['price']; @endphp
                    @else
                    @php $price = 0; @endphp
                    @endif
                    <p style="float: right; margin-right: 30px !important;"> {{  number_format($price,2) }} <i class="fa fa-eur euroicone" ari($storeAyya-hidden="true"></i></p>
                    <hr>
                   @endfor
                </div>
            </table>
            <br/>
            <table width="100%" style="margin-top: 100px;">
                <tr><td colspan="3"><hr/></td></tr>
                <tr>
                    <td colspan="3">
                        <table width="100%">
                            <tr>
                                <td><img  src="{{  asset('img/officepark-logo.jpg')  }}"></td>
            <!--                    <td><b>Office | Park </b><span>GbR</span> </td>-->
                                <td>
                                    <table style="font-size: 12px; line-height: 80%;color: #45484d;">
                                        <tr><td><b style="color: #0c0c0c;">Bankverbindung:</b></td></tr>
                                        <tr><td>Bank: Postbank AG</td></tr>
                                        <tr><td>IBAN: DE78 4401 0046 0381 0084 63</td></tr>
                                        <tr><td>BIC/Swift: PBNKDEFF</td></tr>
                                        <tr><td>Gläubiger-ID: DE91ZZZ00002054440</td></tr>
                                    </table>
                                </td>
                                <td>
                                    <table style="font-size: 12px; line-height: 80%;color: #45484d;">
                                        <tr><td>Seite 4 von 4</td></tr>
                                        <tr><td>Schreiben vom {{ date('d.m.y') }}</td></tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>