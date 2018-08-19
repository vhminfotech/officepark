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

        <style>
            .invoice-box {
                max-width: 800px;
                margin: auto;
                padding: 30px;
                border: 1px solid #eee;
                box-shadow: 0 0 10px rgba(0, 0, 0, .15);
                font-size: 16px;
                line-height: 24px;
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                color: #555;
            }

            .invoice-box table {
                width: 100%;

                text-align: left;
            }

            .invoice-box table td {
                padding: 5px;
                vertical-align: top;
            }

            .invoice-box table tr td:nth-child(2) {
                text-align: right;
            }

            .invoice-box table tr.top table td {
                padding-bottom: 20px;
            }

            .invoice-box table tr.top table td.title {
                font-size: 45px;
                line-height: 45px;
                color: #333;
            }

            .invoice-box table tr.information table td {
                padding-bottom: 40px;
            }

            .invoice-box table tr.heading td {
                background: #eee;
                border-bottom: 1px solid #ddd;
                font-weight: bold;
            }

            .invoice-box table tr.details td {
                padding-bottom: 20px;
            }

            .invoice-box table tr.item td{
                border-bottom: 1px solid #eee;
            }

            .invoice-box table tr.item.last td {
                border-bottom: none;
            }

            .invoice-box table tr.total td:nth-child(2) {
                border-top: 2px solid #eee;
                font-weight: bold;
            }
            .small {
                font-size: smaller;
                text-align: right;
            }



            /** RTL **/
            .rtl {
                direction: rtl;
                font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            }

            .rtl table {
                text-align: right;
            }

            .rtl table tr td:nth-child(2) {
                text-align: left;
            }
            .f-12{
                font-size:12px;
            }
        </style>
    </head>

    <body>
        <div class="invoice-box">
            <table width="100%">
                <tr class="top">
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <u><span style="font-size: 12px;">Office Park GbR - Münsterstraße 330, Gebäude B - 40470 Düsseldorf</span></u><br>
                                    <br>
                                    <b>- persönlich -</b><br><br>

                                    ATA Finanzservice<br>
                                    Promenadenstr. 23<br>
                                    41460 Neuss<br>
                                    <br>
                                    <br>
                                    <br>
                                    Rufumleitung einrichten (alle Angaben ohne Gewähr)<br>

                                </td>

                                <td>
                                    <span style="font-size:25px;">office Park<br>
                                        <span style="font-size: 10px;"> GbR</span>
                                    </span><br>
                                    <br>
                                    <br>

                                    <span class="f-12" style="line-height: 80%;">
                                        Gesellschafter/ Geschäftsführer<br>
                                        Baris Ak
                                    </span><br><

                                    <br>
                                    <span class="f-12" style="line-height: 80%;">Gesellschafter<br>
                                        Mustafa Basun</span><br><br>
                                    <span class="f-12" style="line-height: 80%;">
                                        Münsterstraße 330
                                        <br>
                                        Gebäude B
                                        <br>
                                        40470 Düsseldorf
                                        Telefon: +49 (0) 211 368 74 190<br>
                                        Telefax: +49 (0) 211 368 74 190 01<br>
                                        Web: www.officepark.group<br>
                                        E-Mail: info@officepark.group<br><br>
                                        Service-/ Bürozeiten:<br>
                                        Mo. bis Fr.<br>
                                        09:00 - 19:00 Uhr<br><br>
                                        Düsseldorf, den 22.05.2018<br><br>
                                        Finanzamt<br>
                                        Düsseldorf-Nord<br>
                                        Steuernummer: 105/5902/4492<br>
                                        Ust-IdNr.: DE317564846
                                    </span>
                                </td>
                            </tr>
                            
                        </table>
                    </td>
                </tr>

                <tr class="information">
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <b>Sehr geehrter Herr Tuzkaya</b>,<br>
                                    <br>
                                    mit dieser Anleitung möchten wir Ihnen die Rufumleitung zu Office Park
                                    erklären. In wenigen Schritten ist die Rufumleitung aktiviert. So können Sie
                                    unseren Service schnellstmöglich vollumfänglich nutzen.<br>

                                    <br>

                                    <h4><b>Ihre Anrufe leiten Sie bitte an unsere folgende Rufnummer:</b></h4><br>
                                    0211/ 368 74 190 04
                                    <br>
                                    <br>
                                    <span><b>Bequeme Rufumleitung über Tasenkombination Ihres Telefons:</b></span>
                                    <ul>
                                        <li>Geben Sie bitte folgende Tastenkombination in Ihr Telefon ein: *21*02113687419004#</li>
                                        <li>Drücken Sie nun die Wähltaste und warten Sie die Bandabsage ab.</li>
                                        <li>Die Ansage wird Ihnen abschließend bestätigen, dass der Dienst nun aktiviert ist.*</li>
                                    </ul>
                                    <span>Mit freundlichen Grüßen</span><br>
                                    <span>Ihr OFFICE PARK-Team</span>
                                    <br>
                                    <br>
                                    <br>
                                    <span style="font-size: 10px;"> * Zur Deaktivierung der Rufumleitung drücken Sie: #21#und bestätigen Sie die Wähltaste.</span>
                                    <hr>
                                </td>
                            </tr>
                        </table>
                        <table width="100%">
                            <tr>
                                <td>
                                    <span style="font-size: 20px;">Office Park <span class="f-12">GbR</span></span>
                                </td>
                                <td>
                                    <span class="f-12">
                                        <b>Bankverbindung:</b><br>
                                        Bank: Postbank AG<br>
                                        IBAN: DE78 4401 0046 0381 0084 63<br>
                                        BIC/Swift: PBNKDEFF<br>
                                        Gläubiger-ID: DE91ZZZ00002054440<br>
                                    </span>
                                </td>
                                <td>
                                    <span class="f-12">
                                        Seite 1 von 1<br>
                                        Schreiben vom 22.05.18
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>
        </div>
    </body>
</html>