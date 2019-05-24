<?php
require '../../include/connect.php';
        if (isset($_POST['addroom'])) {
            $roomname = $_POST['roomname'];
            $sql = mysqli_query($conn, "INSERT INTO `tbl_classroom`(`room_name`) VALUES ('$roomname')");
            if (!$sql) {
                mysql_errno($conn);
            }else{
            	header("Location: ../roomlist.php");
            }
        }
            
        ?>