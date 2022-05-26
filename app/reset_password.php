<?php 
require_once('../private/initialize.php'); 
$errors = [];
$email = '';
$password = '';

if (is_post_request()) { 
  // $clients = $_POST['clients'] ?? '';
  $login = $_POST['login'] ?? '';
  if ($login) {

    $email = $login['email'] ?? '';
    $password = $login['password'] ?? ''; 

    // Validations
    if (is_blank($email)) {
      $errors[] = "Email cannot be blank.";
    }
    if (is_blank($password)) {
      $errors[] = "Password cannot be blank.";
    }


    // if there were no errors, try to login
    if (empty($errors)) {
      $admin = Admin::find_by_email($email);

      
      // test if admin found and password is correct
      if ($admin != false && $admin->verify_password($password)) {
        // Logged out Customer and riders before login in Admin
        $session->logout(true); //for admin logout
        $session->logout('', true); //for Riders logout

        // Mark admin as logged in
        $session->login($admin);
        
        //for logging actions in the log file
        log_action('Admin Login', "{$admin->full_name()} Logged in.", "login");
        redirect_to(url_for('/redirect.php'));

      } else {
        // email not found or password does not match
        $errors[] = "Log in not successful.";
      }
      // end
      
    }
  }
} else {
  $admin = new Admin;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Log In | ToNote - Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/fav.png">
        
        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    </head>

    <body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">
                            <!-- Logo -->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="#">
                                    <span><img src="assets/images/tlogo.png" alt="" height="20"></span>
                                </a>
                            </div>
                            
                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 fw-bold">Reset Password</h4>
                                    <p class="text-muted mb-4">Enter New password to reset .</p>
                                </div>

                                <form action="#">
                                    <!-- <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Email address</label>
                                        <input class="form-control" type="email" id="emailaddress" required="" placeholder="Enter your email" autocomplete="off" data-has-passwords-badge="true" style="background-image: url(&quot;chrome-extension://bmhejbnmpamgfnomlahkonpanlkcfabg/srcdist/shared/icons/passwords-icon-48.png&quot;); background-repeat: no-repeat; background-size: auto 50%; background-position: 96% 50%; cursor: auto;">
                                    </div> -->

                                    <div class="mb-3">
                                        <label for="password" class="form-label">New Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" name="login[password]" id="password" class="form-control" placeholder="Enter your password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Confirm Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" name="login[password]" id="password" class="form-control" placeholder="Enter your password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-0 text-center">
                                        <button class="btn btn-primary" type="submit">Reset Password</button>
                                    </div>
                                </form>
                            </div> <!-- end card-body-->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Back to <a href="<?php echo url_for('login.php') ?>" class="text-muted ms-1"><b>Log In</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            <?php echo date('Y') ?> &copy; ToNote
        </footer>

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>