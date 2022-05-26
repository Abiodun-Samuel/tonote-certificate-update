<?php require_once('../private/initialize.php'); 
if (is_post_request()) { 
    $args = $_POST;
    $notary = New Certificate($args);
    $result_set = $notary->save();
    if ($result_set == true) {
         //for logging actions in the log file
        log_action('Notary Assessment', "{$_POST['fullname']} signup for assessment.", "Notart assessment");
        redirect_to(url_for('../quiz/quiz.php?id=' . $notary->id));
    }
   
}else{
    $notary = new Certificate;
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToNote E-cademy</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/gb-theme.css">
    <link rel="icon" type="image/png" href="../img/fav.png">
</head>
<body>
    <div class="form-body">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <h3>Welcome to ToNote E-cademy</h3>
                    <p> Assessment for Notaries Public </p>
                    <img src="../img/class-asset.png" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="website-logo-inside">
                            <a href="#">
                                <div class="logo">
                                    <img class="logo-size" src="../img/white-logo.png" alt="">  
                                </div>
                            </a>
                        </div>
                        <div class="page-links">
                            <div href="login9.html" class="active text-light">Enter your fullname below as it should apear on your Certificate</div>
                        </div>
                        <?php if ($notary->errors) { ?>
                              <?php echo display_errors($notary->errors); ?> 
                          <?php } ?>
                        <form method="post" id='notary_form'>
                            <input class="form-control" type="text" name="fullname" placeholder="Fullname" required value="<?php echo $notary->fullname ?>">
                            <input class="form-control" type="email" name="email" placeholder="Email" required value="<?php echo $notary->email ?>">
                            <input class="form-control" id="commission_no" type="text" name="commission_no" placeholder="Notary Commission Number" required value="<?php echo $notary->commission_no ?>">
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Proceed</button> 
                            </div>
                        </form>
                        <div class="mt-2"></div>
                        <a href="www.gettonote.com" class="text-light " style="font-size: 12px;">
                            &copy; <?php echo date('Y') ?> Powered by: ToNote Technologies Ltd.
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>