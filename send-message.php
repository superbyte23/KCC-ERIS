<?php
include 'include/connect.php';
session_start();

if (isset($_POST['btnsend'])) {
	$recipient = $_POST['recipientID'];
	$sender = $_SESSION['member_id'];
	$content = $_POST['msgcontent'];

}
// check if the conversation already exist.
$sqlcheck = "SELECT c_id FROM tbl_conversation
			WHERE (user_one = '$sender'  AND user_two = $recipient )
			OR (user_one= '$recipient' AND user_two= '$sender')";

$r = mysqli_query($conn, $sqlcheck);

$ip=$_SERVER['REMOTE_ADDR'];

//inserting new conversation if result = 0;
	
if (mysqli_num_rows($r) == 0) {
	$query = mysqli_query($conn, "INSERT INTO tbl_conversation (user_one,user_two,ip,date_create,time_create)
		VALUES ('$sender','$recipient','$ip',DATE_FORMAT(CURRENT_DATE(),'%m-%d-%Y'),DATE_FORMAT(CURRENT_TIME(),'%h:%i:%s %p'))") or die(mysqli_error());

	$q=mysqli_query($conn,"SELECT c_id FROM tbl_conversation WHERE user_one='$sender' ORDER BY c_id DESC limit 1");


	while ($row=mysqli_fetch_assoc($q)) {

		$cid = $row['c_id'];
		$uid=$_SESSION['member_id'];
		$ip=$_SERVER['REMOTE_ADDR'];

		$qreply = "INSERT INTO tbl_conversation_reply (member_id_fk,reply,ip,date_sent,time_sent,status,c_id_fk) 
					VALUES ('$uid','$content','$ip',DATE_FORMAT(CURRENT_DATE(),'%m-%d-%Y'),DATE_FORMAT(CURRENT_TIME(),'%h:%i:%s %p'),'unread','$cid')";
		if (mysqli_query($conn,$qreply)) {
			?><script type="text/javascript">
				window.location = "read-message.php?id=<?php echo $cid;?>";	
			</script>
			<?php
		}
	}

	
	

}else{
	$q=mysqli_query($conn,"SELECT c_id FROM tbl_conversation WHERE user_one='$sender' ORDER BY c_id DESC limit 1");


	while ($row=mysqli_fetch_assoc($q)) {

		$cid = $row['c_id'];
		$uid=$_SESSION['member_id'];
		$ip=$_SERVER['REMOTE_ADDR'];

		$qreply = "INSERT INTO tbl_conversation_reply (member_id_fk,reply,ip,date_sent,time_sent,status,c_id_fk) 
					VALUES ('$uid','$content','$ip',DATE_FORMAT(CURRENT_DATE(),'%m-%d-%Y'),DATE_FORMAT(CURRENT_TIME(),'%h:%i:%s %p'),'unread','$cid')";
		if (mysqli_query($conn,$qreply)) {
			?><script type="text/javascript">
				window.location = "read-message.php?id=<?php echo $cid;?>";	
			</script>
			<?php
		}
	}
}
	


?>
