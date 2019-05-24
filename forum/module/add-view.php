<?php
include '../../include/connect.php';
include '../../include/session.php';

// insert views for each visitors
$sqlview = mysqli_query($conn,"UPDATE `tbl_forum_topic` SET  `topic_view`= `topic_view` + 1 WHERE `topic_id`=".$_GET['id']);
if (!$sqlview) {
	# code...
}else{
	header('Location: ../topic.php?id='.$_GET['id']);
}


?>