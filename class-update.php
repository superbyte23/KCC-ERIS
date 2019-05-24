<?php
require_once 'include/connect.php';

if (isset($_POST['update'])) {
	$class_id = $_POST['classcode'];
	$classname= $_POST['classname'];
	$subject= $_POST['subject'];
	$timestart= $_POST['timestart'];
	$timeend= $_POST['timeend'];
	$classdays= $_POST['classdays'];
	$classtags= $_POST['classtags'];
	$description= $_POST['description'];
	$classroom= $_POST['classroom'];

	$sql1 = "UPDATE `tbl_class`
    		SET `class_name`= '$classname',
    			`subject_name`= '$subject',
    			`class_days`= '$classdays',
    			`class_start`= '$timestart',
    			`class_end`='$timeend',
    			`class_room`='$classroom',
    			`class_tags`='$classtags',
    			`class_description`='$description'
    			WHERE `class_id` = ".$class_id;
    if (mysqli_query($conn, $sql1)) {
    	?>
            <script type="text/javascript">
                //alert('Class Deactivated Succesfully.');
                history.back();
                //window.location ='class-settings.php?id=<?php echo($class_id); ?>';
            </script>
        <?php
    }else{
    	?>
            <script type="text/javascript">
	            alert('Error Updating Class.');
	            history.back();
	            //window.location ='class-settings.php?id=<?php echo($class_id); ?>';
            </script>
         <?php
    }
}
