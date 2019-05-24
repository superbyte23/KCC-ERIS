<?php

require 'include/connect.php';

$sql = "DELETE FROM `tbl_quiz` WHERE `quiz_id` =".$_GET['id'];

if (mysqli_query($conn, $sql)) {
   $sql1 = "DELETE FROM `tblquiz_questions` WHERE `quiz_id` =".$_GET['id'];
	if (mysqli_query($conn, $sql1)) {
	    echo '<script type="text/javascript">history.back();</script>';
	}
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

?>

