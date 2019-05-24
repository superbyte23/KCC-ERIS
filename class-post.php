<?php
include 'include/connect.php';
include 'include/session.php';


if (isset($_POST['btnpost'])) {
	$classID = $_POST['classID'];
	$userid = $_SESSION['member_id'];
	$content = $_POST['posttext'];
	$date = date('m/d/Y');
	$time = date("h:i a");

	$sql = "INSERT INTO `tbl_classpost`(`class_id`, `user_id`, `post_content`, `post_date`, `post_time`) 
			VALUES ($classID, $userid, '$content', '$date', '$time')";

	if(mysqli_query($conn, $sql)){
		?><script type="text/javascript">
				window.location = "class.php?id=" + <?php echo $classID; ?>;
		</script>
		<?php
	}

}

?>