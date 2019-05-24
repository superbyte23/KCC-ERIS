<?php

include '../../include/connect.php';

include '../../include/session.php';
if (isset($_POST['reply'])) {
	$user_id = $_SESSION['member_id'];
	$reply_content = $_POST['reply_content'];
	$topic_id = $_GET['topic_id'];

	$sqlreply = mysqli_query($conn, "INSERT INTO `tbl_forum_replies`(`reply_content`, `reply_date`, `topic_id`, `user_id`) 
				VALUES ('$reply_content', NOW(),'$topic_id','$user_id')");
	if (!$sqlreply) {
		mysql_errno($conn);
	}else{
		?>
		<script type="text/javascript">
			history.back();
		</script>
		<?php
	}
}


?>