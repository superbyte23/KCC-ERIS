<?php
include '../../include/connect.php';
include '../../include/session.php';
if (isset($_POST['create'])) {
	$name = $_POST['name'];
	$desc = $_POST['desc'];
	// insert views for each visitors
	$sqladdcat = mysqli_query($conn,"INSERT INTO `tbl_forum_category`(`forum_cat_name`, `forum_cat_desc`, `date_added`)
									VALUES ('$name','$desc',NOW())");
	if (!$sqladdcat) {
		# code...
	}else{
	header('Location: ../index.php');
	}
}


?>