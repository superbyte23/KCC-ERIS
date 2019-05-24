<?php
require_once 'include/connect.php';
require 'include/session.php';	
if (isset($_POST['send']) OR ($_POST['reply'])) {

		$content = $_POST['reply'];	
		$uid=$_SESSION['member_id'];
		$ip=$_SERVER['REMOTE_ADDR'];
		$cid = $_GET['id'];

		$qreply = "INSERT INTO tbl_conversation_reply (member_id_fk,reply,ip,date_sent,time_sent,status,c_id_fk)
					VALUES ('$uid','$content','$ip',DATE_FORMAT(CURRENT_DATE(),'%m-%d-%Y'),DATE_FORMAT(CURRENT_TIME(),'%h:%i:%s %p'),'unread','$cid')";
		if (mysqli_query($conn,$qreply)) {
			?><script type="text/javascript">
				history.back();
			</script>
			<?php
		}
	}
	
?>