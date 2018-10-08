<div style="width:100%; margin:0px; padding: 0px;">
    <!-- main -->
    <div style="padding: 48px;">
        <div style="width: 560px; margin: 0 auto; display: block; box-shadow: 0px 0px 14px 0px rgba(142, 140, 140, 0.67); background: #fff; padding: 48px;">
            <!-- wrapper -->
            <p style="">
                <img src="<?php echo url('img/logo.png'); ?>" style="display: block;float: left;width: 50px;margin-right: 20px;">
                <h1>International Communication</h1>
            </p>
            
            <h2 style="padding: 26px 0 0px 7px;text-align: center;">   You have new incoming call!</h2>
            <div style="margin-top: 78px; box-shadow: 0px 0px 16px 0px rgba(0, 0, 0, 0.33); padding: 16px;">
                <table>
                    <tr>
                        <th colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    </tr>
                    <tr>
                        <th colspan="3">Call Information</th>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>{{ $data['gender'] }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{ $data['first_last_name'] }}</td>
                    </tr>
                    <tr>
                        <td>Caller Email</td>
                        <td>{{ $data['caller_email'] }}</td>
                    </tr>
                    <tr>
                        <td>Caller Telefon</td>
                        <td>{{ $data['telephone_number'] }}</td>
                    </tr>
                    <tr>
                        <td>Note</td>
                        <td>{{ $data['caller_note'] }}</td>
                    </tr>
                    <tr>
                        <td>Date / Time:</td>
                        <td>{{ date('d-m-Y h:i:s') }}</td>
                    </tr>
                    <tr>
                        <td>Agent</td>
                        <td></td>
                    </tr>
                </table>
                <p>Kind Regards</p>
                <p>Office Park Team</p>
            </div>
            <!-- content over -->
        </div>
        <!-- wrapper over -->
    </div>
</div>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

</style>