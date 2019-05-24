<?php
//require 'include/session.php';
session_start();
include 'include/connect.php';

if (isset($_SESSION['member_id'])) {
    ?>
        <script type="text/javascript">
            window.location = "index.php";
        </script>
    <?php
}

if(isset($_POST['btnlogin'])){
    $email = trim($_POST['email']);
    $password = sha1($_POST['password']);

   
            $sql = "SELECT * FROM `tbl_members` WHERE `member_email` = '".$email."' and  `member_password` = '".$password."'";
                $results = mysqli_query($conn , $sql);
                if (mysqli_num_rows($results) > 0) {

                     while($row = mysqli_fetch_assoc($results)) {
                        $_SESSION["member_id"] = $row['member_id'];
                        $_SESSION["member_type"] = $row['member_type'];
                    }

                            # This a code for making logs for member login and logout. the purpose of this script to monitor the login and logout of the members in the website.

                            ###########################################################
                            #          checking log data if exist for today           #
                            ###########################################################
                    $checklog = ("SELECT `member_id`,`log_date` FROM `member_logs`
                                 WHERE `member_id` = ".$_SESSION['member_id']." AND `log_date` = DATE_FORMAT(NOW(),'%m-%d-%Y')");

                        $result = mysqli_query($conn, $checklog);

                        if (mysqli_num_rows($result) > 0) {

                            ###########################################################
                            #        UPDATE THE EXISTING LOG FOR A SPECIFIC MEMBER    #
                            ###########################################################


                                $logs = ("UPDATE `member_logs` SET `login_time`= DATE_FORMAT(NOW(),'%h:%i %p')
                                          WHERE `member_id` = ".$_SESSION['member_id']." AND `log_date` = DATE_FORMAT(NOW(),'%m-%d-%Y')");

                                    if (mysqli_query($conn, $logs)) {
                                            
                                            } else {
                                                echo "Error updating record: " . mysqli_error($conn);
                                            }
                            ########################### END CODE #######################

                        } else {

                            ###########################################################
                            #   create logs for signing in if record does not exist   #
                            ###########################################################

                                $logs = ("INSERT INTO `member_logs`(`member_id`, `login_time`, `logout_time`, `log_date`) 
                                            VALUES (".$_SESSION["member_id"].", DATE_FORMAT(NOW(),'%h:%i %p'),'', DATE_FORMAT(NOW(),'%m-%d-%Y'))");

                                     if (mysqli_query($conn, $logs)) {
                                          
                                           } else {
                                            echo "Error: " . $logs . "<br>" . mysqli_error($conn);
                                        }
                            ########################### END CODE #######################
                        }

                    

                    # if result is correct will redirect to teacher site
                    ?>
                    <script type="text/javascript">
                        //then it will be redirected to index.php\
                        window.location = "index.php";
                    </script>
                    <?php
                } else {
                   # if result is incorrecr will redirect to index
                    ?>
                    <script type="text/javascript">
                     alert("Invalid email address or password");
                        //then it will be redirected to index.php
                        window.location = "login.php";
                    </script>
                    <?php
                }
            }

?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Login to Eris</title>            
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
        
        <div class="login-container lightmode">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Log In</strong> to your account</div>
                    <form action="login.php" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="email" id="username" name="email" class="form-control" placeholder="E-mail"/ required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password"/ required="" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-link btn-block">Forgot your password?</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block" name="btnlogin">Log In</button>
                        </div>
                    </div>
                    <div class="login-subtitle">
                        Don't have an account yet? <a href="signup.php">Create an account</a>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2018 ERIS | <a href="admin/"> Admin Login</a>
                    </div>
                    <div class="pull-right"><!-- 
                        <a href="#">About</a> |
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a> | -->
                        <a href="forum/">Visit Forum</a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
</html>






