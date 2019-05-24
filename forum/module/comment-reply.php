<?php

include '../../include/connect.php';
include '../../include/session.php';

if (isset($_POST['btncomment'])) {
	$content = $_POST['commentcontent'];
	$user = $_SESSION['member_id'];
	$topic_id = $_GET['topic_id'];
	$thread_id = $_GET['thread_id'];
	$sqlinsertcomment = mysqli_query($conn,"INSERT INTO `tbl_forum_comment`(`comment_content`, `comment_date`, `reply_id`, `user_id`) 
					VALUES ('$content', NOW(), $thread_id, $user)");

	if ($sqlinsertcomment) {
		header("Location: ../topic.php?id=".$topic_id);
	}else{
		mysql_errno($conn);
	}
}

?>