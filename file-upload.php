<?php
require_once 'include/connect.php';
if(isset($_POST['upload']))
{    
    
    $classID = $_POST['classID'];
    
    if (is_dir("assets/uploads/Class ".$classID)) {
    }else{
        mkdir("assets/uploads/Class ".$classID);
    }
    $file = rand(1000,100000)."-".$_FILES['fileToUpload']['name'];
    $file_loc = $_FILES['fileToUpload']['tmp_name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_type = $_FILES['fileToUpload']['type'];

    $folder="assets/uploads/Class ".$classID."/";
    $date =  date("m/d/Y");
    $time =  date("h:i a");
    // new file size in KB
    $new_size = $file_size/1024;  
    // new file size in KB
    
    // make file name in lower case
    $new_file_name = strtolower($file);
    // make file name in lower case
    
    $final_file=str_replace(' ','-',$new_file_name);
    
    if(move_uploaded_file($file_loc,$folder.$final_file))
    {
        $sql="INSERT INTO `tbl_classfiles`(`class_id`, `filename`, `filetype`, `filesize`, `date_uploaded`, `file_dir`) 
            VALUES ($classID,'$final_file','$file_type','$new_size','$date','$folder')";
        //$sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$final_file','$file_type','$new_size')";
        mysqli_query($conn, $sql);
        ?>
        <script>
        alert('successfully uploaded');
        window.location.href='class-files.php?id=<?php echo $classID; ?>';
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
        alert('error while uploading file');
        window.location.href='class-files.php?id=<?php echo $classID; ?>';
        </script>
        <?php
    }
}
?>