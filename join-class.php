<?php 
	
	require 'include/connect.php';

	session_start();



if (isset($_POST['btnjoin'])) {
	$classcode = $_POST['classcode'];
	
	//check class code if exist in the class table
	$sql = "SELECT * FROM `tbl_class` WHERE `class_status` = 'Active' AND class_id = $classcode";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {

			//check Student id if exist or already send a request or joined in the class.
			$sql = "SELECT * FROM `tbl_classmembers` WHERE class_id = $classcode AND  `member_id` = ".$_SESSION["member_id"];
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) > 0) {

					//NOTIFY USER THAT HE/SHE ALREADY JOINED
					?>
					  <script type="text/javascript">
					    	window.alert("You already joined the class or waiting for verification.");
					    	window.location ='manage-class.php';
					  </script>
					<?php
					
				   
				}else{

					//ADD NEW REQUEST FOR JOINING THE CLASS.
			$sql = "INSERT INTO `tbl_classmembers`(`class_id`, `member_id`, `verification`) 
			VALUES ($classcode,".$_SESSION["member_id"].",'No')";

			if (mysqli_query($conn, $sql)) {
				?>
				  <script type="text/javascript">
				   	window.location ='class-request.php';
				  </script>
				<?php

				}
		   }

		} else {
		   ?>
		   <script type="text/javascript">
		   	window.alert("Class does not exist. Check your Class Code and try again.");
		   	window.location ='manage-class.php';
		   </script>

		   <?php
		}

}
?>