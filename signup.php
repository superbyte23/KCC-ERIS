<?php
//require 'include/session.php';
session_start();
include 'include/connect.php';

if (isset($_SESSION['member_id'])) {
    header('Location: index.php');
}

if (isset($_POST['btnregister'])) {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = sha1(($_POST['password']));
    $membertype = $_POST['membertype'];
    $status = "active";



    $sql = "INSERT INTO `tbl_members`(`member_fullname`, `member_email`, `member_username`, `member_password`, `member_type`, `status`) 
        VALUES ('".ucwords($fullname)."','$email','$username', '$password','$membertype','$status')";

                        if (mysqli_query($conn, $sql)) {

                                    $sql = "SELECT * FROM `tbl_members` 
                                    WHERE `member_email` = '".$email."' and  `member_password` = '".$password."'";
                                    $results = mysqli_query($conn , $sql);
                                    if (mysqli_num_rows($results) > 0) {

                                         while($row = mysqli_fetch_assoc($results)) {
                                            $_SESSION["member_id"] = $row['member_id'];
                                            $_SESSION["member_type"] = $row['member_type'];
                                        }
                                        ###########################################################
                                        #   create user informations                              #
                                        ###########################################################
                                        if ($membertype == 'Student') {
                                            // EXECUTE QUERY IF MEMBER TYPE IS STUDENT
                                            $tbl_student = ("INSERT INTO `tbl_student`(`member_id`) VALUES (".$_SESSION["member_id"].")");

                                                 if (mysqli_query($conn, $tbl_student)) {
                                                      
                                                       } else {
                                                        echo "Error: " . $tbl_student . "<br>" . mysqli_error($conn);
                                                    }
                                        }elseif ($membertype == 'Teacher') {
                                            // EXECUTE QUERY IF MEMBER TYPE IS TEACHER
                                            $tbl_teacher = ("INSERT INTO `tbl_teacher`(`member_id`) VALUES (".$_SESSION["member_id"].")");

                                                 if (mysqli_query($conn, $tbl_teacher)) {
                                                      
                                                       } else {
                                                        echo "Error: " . $tbl_teacher . "<br>" . mysqli_error($conn);
                                                    }
                                        }
                                            
                                        ########################### END CODE #######################

                                        # if result is correct will redirect to teacher site
                                        ?>
                                        <script type="text/javascript">
                                            //then it will be redirected to index.php\
                                            alert('Thanks for registering KCC-ERIS');
                                            window.location = "index.php";
                                        </script>
                                        <?php
                                    }
                            } else {
                                ?>
                                <script type="text/javascript">
                                    alert("Error Creating Account. Please Try Again");
                                    window.location = "signup.php";
                                </script>
                               <?php
                            }

                            
    }
?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Sign Up to Eris</title>            
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
        
        <div class="register-container lightmode">
        
            <div class="register-box animated fadeInDown">
                <div class="register-logo"></div>
                <div class="register-body">
                    <div class="register-title"><strong>Create</strong>  an account</div>
                    <form action="signup.php" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="fullname" class="form-control" placeholder="Full Name " required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="username" class="form-control" placeholder="username" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="email" name="email" class="form-control" placeholder="E-mail" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password" class="form-control" placeholder="password" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <Select class="form-control" required="" name="membertype">
                                <option value="">Select User Type</option>
                                <option value="Student">Student</option>
                                <option value="Teacher">Teacher</option>
                            </Select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-lg-6">
                            <button class="btn btn-info btn-block" type="submit" name="btnregister">Create</button>
                        </div>
                    </div>
                    <div class="register-subtitle">
                        Already have an account? <a href="login.php">Login to your Account</a>
                    </div>
                    </form>
                </div>
                <div class="register-footer">
                    <div class="pull-left">
                        &copy; 2018 ERIS
                    </div>
                    <div class="pull-right">
                        <a href="#">About</a> |
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
</html>






