<?php include 'include/connect.php';

$sql = mysqli_query($conn, "SELECT * FROM `tbl_assignment_ans` WHERE `ans_id`=".$_GET['id']);

if (mysqli_num_rows($sql)>0) {
	while ($row = mysqli_fetch_assoc($sql)) {
		echo '<iframe src="http://docs.google.com/gview?url=http://kcceris.epizy.com/'.$row['ans_file_path'].'/'.$row['ans_file'].'" style="width:100%; height:100%;" frameborder="0"></iframe>';
	}
}
?>


