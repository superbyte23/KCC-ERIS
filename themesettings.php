<?php 
require 'include/session.php';
require 'include/connect.php';

$theme = $_POST['theme'];

$changethmeme ="UPDATE `tbl_usersettings` SET `user_theme`= '$theme' WHERE `user_id` =".$_SESSION['member_id'];
$result = mysqli_query($conn, $changethmeme);

?>