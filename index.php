<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Greenmag</title>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="style.css" rel="stylesheet">
    <link href="https://www.w3schools.com/lib/w3-theme-blue.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500" rel="stylesheet">
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/form-elements.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <style type="text/css">
       body{
           background-color:#333;
       }
    </style>
</head>
<body>
    <!-- Top content -->
    <div class="top-content">
        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1>Welcome to <strong>Greenmag</strong></h1>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3><i class="fa fa-lock"></i> Login</h3>
                                    <p>Enter email and password to log on:</p>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form action="login.php" class="login-form" method="post" role="form">
                                    <div class="form-group">
                                        <input class="form-email form-control" id="login-email" name="login-email" placeholder="Email Address..." required="" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-password form-control" id="login-password" name="login-password" placeholder="Password..." required="" type="password">
                                    </div><button class="btn" type="submit">Sign in!</button>
                                </form><br>
                                <a href="" id="forgottenpassword">Forgotten Password?</a>
                                <h4 id="incorrectPasswordLogin" style="display:none;padding-top:5px !important;color:#ff3333;font-size: 14px;"><i aria-hidden="true" class="fa fa-times"></i> Invalid Username or Password!</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1 middle-border"></div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-5">
                        <div class="form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3><i class="fa fa-pencil"></i> Register</h3>
                                    <p>Fill in the form below to get instant access:</p>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form action="register.php" class="registration-form" method="post" role="form">
                                    <div class="form-group">
                                        <input class="form-email form-control" id="register-email" name="register-email" placeholder="Email Address" required="" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-password form-control" id="register-password" name="register-password" placeholder="Password" required="" type="password">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-password form-control" id="register-password-confirm" name="register-password-confirm" placeholder="Confirm Password" required="" type="password">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="option" required="">
                                            <option disabled selected value="">
                                                Choose your faculty
                                            </option>
                                            <option value="1">
                                                Faculty of Architecture, Computing & Humanities
                                            </option>
                                            <option value="2">
                                                Business School
                                            </option>
                                            <option value="3">
                                                Faculty of Education & Health
                                            </option>
                                            <option value="4">
                                                Faculty of Engineering & Science
                                            </option>
                                        </select>
                                    </div><button class="btn" onclick="validatePassword()" type="submit">Sign me up!</button>
                                    <h4 id="incorrectEmailRegister" style="display:none;padding-top:5px !important;color:#ff3333;font-size: 14px;"><br>
                                    <i aria-hidden="true" class="fa fa-times"></i> Username already exists!</h4>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="w3-container w3-theme-d4" style="text-align:center; position: fixed;bottom: 0;left: 0;width: 100%;font-size: 14px !important;padding-top: 9.25px !important;padding-bottom: 0px !important;font-weight: 400;">
        <p>Copyright © 2017 Greenmag. All rights reserved. Developed by Kung Fu Pandas</p>
    </footer>
    <script src="assets/js/jquery-1.11.1.min.js">
    </script>
    <script type="text/javascript">
    var user_logged_in = <?php echo json_encode($_SESSION["user_logged_in"]); ?>;
    var failed_login = <?php echo json_encode($_SESSION["failed_login"]); ?>;
    var failed_register = <?php echo json_encode($_SESSION["failed_register"]); ?>;
    var incorrectPasswordLogin = document.getElementById("incorrectPasswordLogin");
    var incorrectEmailRegister = document.getElementById("incorrectEmailRegister");
    var registerpassword = document.getElementById("register-password");
    var registerpasswordconfirm = document.getElementById("register-password-confirm");

    function LoginFunction (){
        if(user_logged_in == true){
            window.location.replace("http://www.greenmag.co.uk/home.php");
        }
        else if(failed_login == true){
            incorrectPasswordLogin.style.display = "block";
        }
    }

    function RegisterFunction(){
        if(failed_register == true){
            incorrectEmailRegister.style.display = "block";
        }
    }

    function validatePassword() {
      if (registerpassword.value != registerpasswordconfirm.value) {
        registerpasswordconfirm.setCustomValidity("Passwords Don't Match!");
      } else {
        registerpasswordconfirm.setCustomValidity('');
      }
    }

    LoginFunction();
    RegisterFunction();

    </script>
</body>
</html>