<?php
require_once 'include/connect.php';
require 'include/session.php';

if (isset($_POST['emailreply'])) {
	$SENDER = mysqli_query($conn,"SELECT `member_email` FROM `tbl_members` WHERE member_id =".$_SESSION["member_id"]."");
		if (mysqli_num_rows($SENDER)>0) {
			while ($rw=mysqli_fetch_assoc($SENDER)) {
				$sender_email = $rw['member_email'];
			}
		}

	$email_id = $_GET['id'];
	$replycontent = $_POST['replycontent'];
	
	$time = date('H:i:s a');
	$date = date('m-d-Y');

	$sqlpostr = "INSERT INTO `emails_reply`(`email_id`, `sender_email`, `content`, `date_sent`, `time_sent`)
				VALUES ('$email_id', '$sender_email', '$replycontent', '$date', '$time')";
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

