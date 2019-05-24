<?php
//SCRIPT FOR RETRIEVING CLASS INFORMATION

if ($_SESSION['member_type'] == "Teacher") {// Checks whether the logged in user is Teacher
    //execute query and assigning variables
  include 'include/connect.php';
   $sql = ("SELECT `class_id`, `class_name`, `subject_name`, `class_days`, concat(class_start,' - ',class_end) as 'Time', `class_start`,`class_end`, `class_room`, `class_tags`, `class_description`, `class_adviser`, `class_dateCreate` FROM `tbl_class` WHERE `class_id` = ".$_GET['id']."  AND `class_adviser` =".$_SESSION['member_id']." AND `class_status` = 'Active'");

                        $results = mysqli_query($conn , $sql);
                                          
                        if (mysqli_num_rows($results) > 0){

                            while ($row = mysqli_fetch_array($results)) {
                                                   
                                $classID = $row['class_id'];
                                $classname = $row['class_name'];
                                $subject = $row['subject_name'];
                                $classtart = $row['class_start'];
                                $classend = $row['class_end'];
                                $classdays = $row['class_days'];
                                $classtags = $row['class_tags'];
                                $adviser = $row['class_adviser'];
                                $description = $row['class_description'];
                                $classroom = $row['class_room'];
                            }
                        }else{
                            ?>
                            <script type="text/javascript">window.location ='pages-error-403.php';</script>
                            <?php
                        }

}elseif ($_SESSION['member_type'] == "Student") {// Checks whether the logged in user is Student
   //execute query and assigning variables
  include 'include/connect.php';
   $sql = ("SELECT `class_id`, `class_name`, `subject_name`, `class_days`, concat(class_start,' - ',class_end) as 'Time', `class_start`,`class_end`, `class_room`, `class_tags`, `class_description`, `class_adviser`, `class_dateCreate` FROM `tbl_class` WHERE `class_id` = ".$_GET['id']." AND `class_status` = 'Active'");

                        $results = mysqli_query($conn , $sql);
                                          
                        if (mysqli_num_rows($results) > 0){

                            while ($row = mysqli_fetch_array($results)) {
                                                   
                                $classID = $row['class_id'];
                                $classname = $row['class_name'];
                                $subject = $row['subject_name'];
                                $classtart = $row['class_start'];
                                $classend = $row['class_end'];
                                $classdays = $row['class_days'];
                                $classtags = $row['class_tags'];
                                $adviser = $row['class_adviser'];
                                $description = $row['class_description'];
                                $classroom = $row['class_room'];
                            }
                        }else{
                            ?>
                            <!-- <script type="text/javascript">window.location ='pages-error-404.php';</script> -->
                            <?php
                        }
}//END SCRIPT

?>