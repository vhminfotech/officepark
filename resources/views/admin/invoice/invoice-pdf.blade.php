
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
                    <td  class="text-undeline" colspan="3">O ffi ce Park GbR - Münsterstraße 330, Building B - 40470 Düsseldorf</td>
                </tr>
                <tr>
                    <td colspan="3"><h3>- personally -</h3></td>
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
                                <td>Your invoice for the period ({{ date('d.m.Y',strtotime($getInvoice[0]['start_date'])) .' - '. date('d.m.Y',strtotime($getInvoice[0]['end_date'])) }})</td>
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
                                <td>Your booked telephone service tariff: {{ $getInvoice[0]['telephone_service'] }} </td>
                            </tr>
                        </table>
                    </td>
                    <td class="small-fornt">
                        <table width="100%">
                            <tr> <td>  Partner / Managing Director Baris Ak</td> </tr>
                            <tr> <td>  Baris Ak</td> </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">       
                            <tr> <td>  shareholder</td> </tr>
                            <tr> <td>  Mustafa Basun</td> </tr>

                        </table>
                        <table width="100%" style="margin-top: 20px;">  
                            <tr> <td>Münsterstraße 330 </td> </tr>
                            <tr> <td>building B</td></tr> 
                            <tr> <td>40470 Düsseldorf</td></tr> 
                            <tr> <td>phone: +49 (0) 211 368 74 190</td></tr> 
                            <tr> <td>fax: +49 (0) 211 368 74 190 01</td></tr> 
                            <tr> <td>Web:www.oﬃcepark.group</td></tr> 
                            <tr> <td>E-Mail: info@oﬃcepark.group</td></tr> 


                        </table>
                        <table width="100%" style="margin-top: 20px;">  
                            <tr> <td>Service-/ office hours: </td> </tr>
                            <tr> <td>Mon.  to  Fri.</td></tr> 
                            <tr> <td>09:00 - 19:00 Uhr</td></tr> 

                        </table>
                        <table width="100%" style="margin-top: 20px;">  
                            <tr> <td>Düsseldorf, den 01.07.2018</td> </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">  
                            <tr> <td>Tax office </td> </tr>
                            <tr> <td>Dusseldorf-Nord </td> </tr>
                            <tr> <td>Tax number: 105/5902/4492 </td> </tr>
                            <tr> <td>VAT ID: DE317564846</td> </tr>
                        </table>
                        <table width="100%" style="margin-top: 20px;">  
                            <tr> <td>billing -Nr. 016/18 </td> </tr>
                            <tr> <td>Customer -Nr. OP-211-1705</td> </tr>
                        </table>
                    </td>
                </tr>

            </table>

            <table width="100%" border="1">

                <thead>
                    <tr>
                        <td>designation</td>
                        <td class="padding-l-5">amount</td>
                        <td class="padding-l-5">Price</td>
                        <td class="padding-l-5">amount</td>
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
                        <td>final amount
                            <br>
                            <span class="small-fornt">According to §19 UStG, the invoice amount does not include VAT</span>
                        </td>
                        <td>{{ number_format($getInvoice[0]['invoiceTotal'],2) }} €</td>

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
                        <span>Commerzbank Düsseldorf • Account holder: {{ $getInvoice[0]['account_name'] }}</span>
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
        </div>
        <table width="100%">
            <tr>
                <td>Office | Park <span>GbR</span> </td>
                <td>
                    <table>
                        <tr><td><b>Bank details:</b></td></tr>
                        <tr><td>Postbank AG</td></tr>
                        <tr><td>IBAN: DE78 4401 0046 0381 0084 63</td></tr>
                        <tr><td>BIC/Swift: PBNKDEFF</td></tr>
                        <tr><td>creditor -ID: DE91ZZZ00002054440</td></tr>
                    </table>
                </td>
                <td>
                    <table>
                        <tr><td>Page 1 of 1
                            </td>
                        </tr>
                        <tr><td>Write from 01.07.18</td></tr>
                    </table>
                </td>
            </tr>
        </table>

    </div>
</body>
</html>