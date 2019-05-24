<?php require_once "include/session.php";?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>
        <!-- META SECTION -->
        <title>Home | Eris</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->
    </head>
<body>

  <section class="header" style="margin-bottom: -20px;" >
    <div class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">KCC ERIS</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Course Offered</a></li>
            <li><a href="#">Events</a></li>
            <li><a href="#">Administrators</a></li>
            <li><a href="#">Programs</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>

            <?php
              if (!logged_in()) {
                echo '<li><a href="signup.php">Register</a></li>';
                echo '<li><a href="login.php">Login</a></li>';
              }else{
                echo '<li><a href="index.php">Dashboard</a></li>';
              }
            ?>

          </ul>
        </div>
      </div>
    </div>
  </section>
  <section class="register-container lightmode">

  </section>
  <section class="register-container section1">

  </section>
  <section class="register-container section2">

  </section>
<!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

        <script type="text/javascript" src="js/plugins/highlight/jquery.highlight-4.js"></script>
        <!-- END THIS PAGE PLUGINS-->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>

        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/actions.js"></script>
        <script type="text/javascript" src="js/faq.js"></script>
        <!-- END TEMPLATE -->
</body>
</html>
