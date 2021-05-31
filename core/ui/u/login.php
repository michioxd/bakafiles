<?php
/*               bakafiles >~<
            by Michio Nakano (michio.xd)

    License: GNU GENERAL PUBLIC LICENSE (GPL)

      https://github.com/michioxd/bakafiles

File: login.php
*/
if (isset($_POST['login_index'])) {
  $login__username = filter_var(strip_tags($_POST['u_name']), FILTER_SANITIZE_STRING);
  $login__password = md5(filter_var(strip_tags($_POST['u_pass']), FILTER_SANITIZE_STRING));
  if (empty($login__password) or empty($login__password)) {
    $_login_error = "Username or password can't empty";
  } else {
    if ($_POST['u_name'] == $SS_USERNAME and $_POST['u_pass'] == $SS_PASSWORD) {
      $__tokensetjson = base64_encode(base64_encode('{"uu_username":"' . $login__username . '","uu_password":"' . $login__password . '"}'));
      setcookie('bkf_token', $__tokensetjson,  0, '/');
      header("Location: " . $_SERVER['REQUEST_URI'] . "");
    } else {
      $_login_error = "Wrong username of password";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>bakafiles</title>
  <link rel="stylesheet" href="assets/font/GoogleSans/main.css">
  <link rel="stylesheet" href="assets/font/MaterialIcons/main.css">
  <link rel="stylesheet" href="plugins/mdl/material.min.css">
  <script src="plugins/mdl/material.min.js"></script>
  <script src="plugins/jquery/jquery-3.6.0.min.js"></script>
  <style>
    * {
      margin: 0px;
      padding: 0px;
      font-family: Google Sans !important;
      color: #fff !important
    }

    .material-icons {
      font-family: Material Icons !important;
    }

    body {
      background-color: #2B2B2B;
      background: url('assets/background.png');
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .section-login {
      width: 450px;
      margin: auto;
      top: 50px;
      position: relative;
      background-color: #252525;
    }

    .section-login .section-splash-login img {
      width: 100%;
    }

    .section-login .section-main-login {
      padding: 25px;
      width: 88.8%;
      text-align: center;
    }

    .section-login .section-main-login .mdl-textfield {
      width: 100%;
    }

    .section-login .section-main-login .mdl-textfield .material-icons {
      float: left;
      display: inline;
      left: 0;
      position: absolute;
    }

    .section-login .section-main-login .mdl-textfield .mdl-textfield__input {
      float: right;
      width: 92%;
    }

    .section-login .section-main-login .mdl-textfield .mdl-textfield__label span {
      left: 30px;
      float: left;
      position: absolute;
    }

    .section-login .section-main-login .mdl-button {
      width: 100%;
    }

    .section-login .section-main-login .section-copy {
      margin-top: 50px;
      font-size: 12px;
      color: grey !important;
    }

    @media only screen and (max-width:470px) {
      .section-login {
        top: 0;
        width: 100%;
        position: absolute;
        height: 100%;
      }
    }
  </style>
</head>

<body>
  <div class="section-login mdl-card mdl-shadow--2dp">
    <div class="section-splash-login">
      <img src="http://release.michio.ga/.well-known/bakafiles/login-splash.jpg">
    </div>
    <div class="section-main-login">
      <form action="" method="POST">
        <p style="color: red !important;font-size: 15px"><?php if (isset($_login_error)) {
                                                            echo $_login_error;
                                                          } ?></p>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <span class="material-icons">person</span>
          <input name="u_name" class="mdl-textfield__input" type="text" id="username">
          <label class="mdl-textfield__label" for="username"><span>Username</span></label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <span class="material-icons">lock</span>
          <input name="u_pass" class="mdl-textfield__input" type="password" id="password">
          <label class="mdl-textfield__label" for="password"><span>Password</span></label>
        </div>
        <button type="submit" name="login_index" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
          Login
        </button>
      </form>
      <div class="section-copy">
        bakafiles &copy; 2021 michio nakano
      </div>
    </div>
  </div>
</body>

</html>