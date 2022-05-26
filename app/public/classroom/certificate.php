<?php
require_once('../../../private/initialize.php');
$cert = $_GET['cert'] ?? 1;
$notary = Certificate::find_by_certificate_no($cert);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $notary->fullname ?> e-Notary Certificate</title>
    <script src="<?php echo url_for('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php echo url_for('assets/js/jquery_qrcode.min.js') ?>"></script>
    <link rel="stylesheet" type="text/css" href="style.css?v=1.0">
</head>

<body>

    <div class="certificate__container">

        <div class="certificate__img">
            <img src="https://gettonote.com/img/main.svg" alt="tonote logo">
            <div class="qrcode">
                <div id="qrcode"></div>
                <?php echo $notary->certificate_no ?>
            </div>
        </div>

        <div class="certificate__header">
            <h1>Certificate <span>of</span> Completion</h1>
        </div>

        <div class="certificate__body">
            <p>Awarded to</p>
            <p class="certificate__owner"> <b><?php echo $notary->fullname ?></b></p>
            <p>With Commission <u><b>No.<?php echo $notary->commission_no ?></u></b><br>
                For successfully completing the training requirements for <br> ToNote <span class="text-blue-500"> <b>e-Notary</b> </span> </p>
            <p>on this day <?php echo date('F d, Y', strtotime($notary->created_at)) ?>.</p>
            <p>This certificate is awarded in recognition of achievement and commitment to delivering the highest degree of customer service on the platform</p>
        </div>

        <div class="certificate__footer">
            <p class="certificate__trainer"> Fikayo Durosinmi-Etti</p>
            <p class="certificate__specialist">Training Specialist</p>
        </div>
    </div>

</body>
<input type="hidden" id="cert_id" value="<?php echo $notary->certificate_no ?>">
<script type="text/javascript">
    var cert_id = $('#cert_id').val();
    $('#qrcode').qrcode({
        text: "https:///gettonote.com/app/public/classroom/certificate.php?cert=" + cert_id,
        size: 80,
        // text: "https://gettonote.com#solutions"
    });
    $(document).ready(function() {
        setTimeout(function() {
            window.print();
        }, 1000); //wait 1 seconds

        setTimeout(function() {
            window.close();
        }, 1000); //wait 1 seconds
    });
</script>

</html>