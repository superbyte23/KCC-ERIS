 <?php
session_start();
if (isset($_SESSION['usertype'])) {
    header('Location: index.php');
}
include '../include/connect.php';

if(isset($_POST['btnlogin'])){
    $username = trim($_POST['username']);
    $password = sha1($_POST['password']);

   
            $sql = "SELECT * FROM `tbluser` WHERE `username` = '".$username."' AND `userpass` = '".$password."'";
                $results = mysqli_query($conn , $sql);
                if (mysqli_num_rows($results) > 0) {

                     while($row = mysqli_fetch_assoc($results)) {
                        $_SESSION["member_id"] = $row['userID'];
                        $_SESSION['fullName'] = $row['userFname'].' '.$row['userLname'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['usertype'] = $row['usertype'];
                        
                    }

                            # This a code for making logs for member login and logout. the purpose of this script to monitor the login and logout of the members in the website.

                            ###########################################################
                            #          checking log data if exist for today           #
                            ###########################################################
                   
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

?><!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Eris | Login</title>            
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
        
        <div class="login-container container-fluid">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Admin</strong> Login</div>
                    <form action="login.php" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="username" class="form-control" placeholder="username" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password" class="form-control" placeholder="Password" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-info btn-block" name="btnlogin">Log In</button>
                        </div>
                    </div>
                  
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2017 - 2018 ERIS
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
</html>






