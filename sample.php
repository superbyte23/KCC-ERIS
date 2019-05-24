<?php

$server="localhost";
$user="root";
$password = "";
$db="messenger";

$conn = mysqli_connect($server, $user, $password, $db);

if (!$conn) {
	die("connection Failed :" . mysqli_connect_error());
	# code...
}

if (isset($_POST['send'])) {
	$message = $_POST['message'];
}

$sqlconv= "INSERT INTO `conversation`(`creator_id`) VALUES (1)";

	
if (mysqli_query($conn, $sqlconv)) {
		$sqlgetconvid = "SELECT * FROM `conversation` WHERE `creator_id` = 1";
			$result = mysqli_query($conn, $sqlgetconvid);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					$id = $row['id'];
					echo $id."<br>";
				}
			}

	}	
	

?>
<form action="sample.php" method="POST">
Type Message here: <input type="text" name="message">

<input type="submit" name="send" value="Send"><br>
</form>