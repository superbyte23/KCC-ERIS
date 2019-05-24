<?php
require_once 'include/connect.php';
session_start();
// select USERS
$user_id = $_SESSION['member_id'];
$sql= mysqli_query($conn, "SELECT * FROM tbl_members where member_id =".$user_id);
if (mysqli_num_rows($sql)>0) {
   while ($row = mysqli_fetch_assoc($sql)) {
       $member_fullname = $row['member_fullname'];
   }
}

if(isset($_POST['uploadass'])) {

    $classID = $_GET['id'];
    $ass_id = $_GET['ass_id'];
    $datefolder = $_POST['datefolder'];
    $ass_title = $_POST['ass_title'];
   
    // CHECK USER IF ALready submmited the Assignment

   $sqlchecksubmission = mysqli_query($conn, "SELECT * FROM `tbl_assignment_ans` where user_id =".$user_id." AND ass_id=".$ass_id);
    if (mysqli_num_rows($sqlchecksubmission)>0) {
        ?>
            <script>
            window.location.href='view-assignment.php?id=<?php echo $_GET['id'];?>&ass_id=<?php echo $_GET['ass_id'] ?>&submit=0';
            </script>
        <?php
     // END CHECK USER IF ALready submmited the Assignment

    }else{ // if STUDENTS HAVE NO yaz_record(id, pos, type)

        if (!is_dir("assets/uploads/Class-".$classID."/Assignments/".$datefolder."/Answers/".$ass_title."/")) {
            // mkdir("assets/uploads/Class-".$classID."/Assignments/".$datefolder."/Answers/".$ass_title."/");
            mkdir("assets/uploads/Class-".$classID."/Assignments/".$datefolder."/Answers/".$ass_title."/");
            echo "confirm";
        } 
        
        $file = $_FILES['assfile']['name'];
        $file_loc = $_FILES['assfile']['tmp_name'];

        $folder="assets/uploads/Class-".$classID."/Assignments/".$datefolder."/Answers/".$ass_title."/";
        // remove file name and repalce the students fullname
        $fileext = strstr($file,".docx");
        $USERNAME= strtoupper($member_fullname);
        // make file name in lower case
        $new_file_name = $USERNAME.$fileext;

        
        $final_file=str_replace(' ','-',$new_file_name);
        
        if(move_uploaded_file($file_loc,$folder.$final_file))
        {
            $sql="INSERT INTO `tbl_assignment_ans`(`ans_file`, `ans_file_path`, `ans_date`, `ass_id`, `user_id`)
                VALUES ('$final_file','$folder',NOW(),'$ass_id','$user_id')";
            //$sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$final_file','$file_type','$new_size')";
            mysqli_query($conn, $sql);
            ?>
            <script>
            alert('successfully uploaded');
            window.location.href='view-assignment.php?id=<?php echo $_GET['id'];?>&ass_id=<?php echo $_GET['ass_id'] ?>&submit=1';
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
            // alert('error while uploading file');
            // window.location.href='view-assignment.php?id=<?php echo $_GET['id'];?>&ass_id=<?php echo $_GET['ass_id'] ?>';
            </script>
            <?php
        }
    }
}

?>