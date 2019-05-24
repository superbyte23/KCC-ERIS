<?php

function class_counter() {

    require 'include/connect.php';
    
    if ($_SESSION['member_type'] == 'Student') {
        

        $sql = mysqli_query($conn, "SELECT COUNT(`classmember_id`) as 'classcount' FROM tbl_classmembers WHERE `member_id` = ".$_SESSION['member_id']." AND `verification` = 'Yes'");
        if (mysqli_num_rows($sql)>0) {
            while ($row = mysqli_fetch_assoc($sql)) {
                echo $row['classcount'];
            }
        }
    }elseif ($_SESSION['member_type'] == 'Teacher') {
        

        $sql = mysqli_query($conn, "SELECT COUNT(`class_id`) as 'classcount' FROM tbl_class WHERE `class_adviser` = ".$_SESSION['member_id']." AND `class_status` = 'Active'");
        if (mysqli_num_rows($sql)>0) {
            while ($row = mysqli_fetch_assoc($sql)) {
                echo $row['classcount'];
            }
        }
    }
    

}
function email_counter() {
    require 'include/connect.php';
    $find = "select member_email FROM tbl_members where `member_id` = ".$_SESSION['member_id'];
    $findres = mysqli_query($conn, $find);
    if (mysqli_num_rows($findres)>0) {
    	while ($findrow = mysqli_fetch_assoc($findres)) {
    		$email = $findrow['member_email'];
    	}
    	$sql = mysqli_query($conn, "SELECT DISTINCT COUNT(`email_id`) as 'emailcount' FROM emails WHERE sender_email = '$email' OR receiver_email = '$email'");
	    if (mysqli_num_rows($sql)>0) {
	    	while ($row = mysqli_fetch_assoc($sql)) {
	    		echo $row['emailcount'];
	    	}
	    }

    }
    
}
function message_counter() {
    require 'include/connect.php';

    $sql = mysqli_query($conn, "SELECT DISTINCT COUNT(`c_id`) as 'msgcount' FROM tbl_conversation WHERE user_one = '".$_SESSION['member_id']."' OR user_two = '".$_SESSION['member_id']."'");
    if (mysqli_num_rows($sql)>0) {
    	while ($row = mysqli_fetch_assoc($sql)) {
    		echo $row['msgcount'];
    	}
    }

}
?>