<?php require '../include/connect.php';
$delete = "DELETE FROM `tbl_subject` WHERE subj_id =".$_GET['id'];
if (mysqli_query($conn,$delete)) {
	header("Location: ../subjectlist.php");
}else{
	mysql_errno($conn);
}
?>