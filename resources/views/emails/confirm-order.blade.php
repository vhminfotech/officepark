<div style="width:100%; margin:0px; padding: 0px;">
    <!-- main -->
    <div style="padding: 48px;">
        <div style="width: 560px; margin: 0 auto; display: block; box-shadow: 0px 0px 14px 0px rgba(142, 140, 140, 0.67); background: #fff; padding: 48px;">
            <!-- wrapper -->
            <p style=""><img src="<?php echo url('img/logo.png'); ?>" style="display: block;margin: 0 auto; text-align: center; width: 200px;padding: 10px;"></p>
            <div style="background: linear-gradient(#fff,rgba(222, 13, 0, 0.16)); box-shadow: 0px 0px 16px 0px rgba(0, 0, 0, 0.33); padding: 16px;">
                   <p>Dear {{ $data['interUser'] }}</p>
                   <p>Here, I would like to Attached PDF file which should be generated when Customer fill order form and click Send button.</p>
                   <p>Normally. There are two PDF that issued when customer fill order form.</p>
                   <p>1. OfficePark-Begrüßungsschreiben-OP-211-XXX.pdf</p>
                   <p>2. OfficePark-Rufumleitung-OP-211-XXX.pdf</p>
                   <p>"Officepark_- Welcome letter _ATA_Finanz" PDF file should compulsory issued them customer fill order form. </p>
                   <p>"Office Park Call Forwarding _ATA_Finance" PSD file should be issued only when customer selected " Yes, I give Office Park GbR a SEPA mandate." payment option.</p>

                   <p>I will provide you another PSD that should be issue when customer selected Transfer option in Payment section of order page.</p>
                   <p>Here I would like to attach format of the PDF files. where you will get idea which data you have to fetch from put in on PDF file. You will aslo get idea of a format of PDF files. </p>
                   <p>PDF files are in German language but for you understanding I have also attached PDF of English language.</p>
                   <p>Kind Regards</p>
                   <p>Office Park Team</p>
            </div>
            <!-- content over -->
        </div>
        <!-- wrapper over -->
    </div>
</div>