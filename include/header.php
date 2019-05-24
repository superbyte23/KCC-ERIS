<?php
//require 'include/session.php';
session_start();

include 'include/connect.php';

if (!isset($_SESSION['member_id'])) {
   ?>
        <script type="text/javascript">
            window.location = "login.php";
        </script>
    <?php
}

require ('connect.php');

if (isset($_GET['search'])) {
    $search = $_GET['search'];    
    header("location: search-result.php?Search=$search");
}
if (isset($_SESSION['usertype']))  {
    header("Location: admin/");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Eris</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->
       
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                 
    </head>