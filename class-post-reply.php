<?php
require_once 'include/connect.php';
require 'include/session.php';

if (isset($_POST['comment'])) {

	$post_id = $_GET['id'];
	$postreply = $_POST['reply'];
	$user_id = $_SESSION['member_id'];
	$time = date('H:i:s a');
	$date = date('m-d-Y');

	$sqlpostr = "INSERT INTO `tbl_classpost_reply`(`post_id`, `user_id`, `reply_content`,`reply_date`, `reply_time`)
				VALUES ('$post_id','$user_id','$postreply','$date','$time')";
				if (mysqli_query($conn, $sqlpostr)) {
					?>
					<script type="text/javascript">
							history.back();
						</script>
					<?php
				}else{
					?>
					<script type="text/javascript">
							alert('Error!')
							history.back();
						</script>
					<?php
				}
 
}

?>

