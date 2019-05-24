<?php
include 'include/header.php';
include 'class-module.php';
$uploadOK = 1;
if(isset($_POST['createass']))
{    
    $today = date("m-d-Y");
    $ass_title = $_POST['ass_title'];
    $ass_date = $_POST['ass_date'];
    $ass_time = $_POST['ass_time'];
    $ass_ins = $_POST['ass_ins'];
    

    $ass_deadline = $ass_date.' '.$ass_time;

    if (is_dir("assets/uploads/Class-".$classID)) {
    }else{
        mkdir("assets/uploads/Class-".$classID);
    }
    if (is_dir("assets/uploads/Class-".$classID."/Assignments")) {
    }else{
        mkdir("assets/uploads/Class-".$classID."/Assignments/");
    }
    if (is_dir("assets/uploads/Class-".$classID."/Assignments/".$today."/")) {
    }else{
        mkdir("assets/uploads/Class-".$classID."/Assignments/".$today."/");
    }
    if (is_dir("assets/uploads/Class-".$classID."/Assignments/".$today."/Answers/")) {
    }else{
        mkdir("assets/uploads/Class-".$classID."/Assignments/".$today."/Answers/");
    }

    $file = "Assignment-".$_FILES['ass_file']['name'];
    $file_loc = $_FILES['ass_file']['tmp_name'];
    $file_size = $_FILES['ass_file']['size'];
    $file_type = $_FILES['ass_file']['type'];

    $folder="assets/uploads/Class-".$classID."/Assignments/".$today."/";
    $target_file = $folder . basename($_FILES["ass_file"]["name"]);

    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Allow certain file formats
    if($imageFileType != "docx" && $imageFileType != "doc" && $imageFileType != "xls"
    && $imageFileType != "xlam" && $imageFileType != "xltx"  && $imageFileType != "xlsx") {
        $uploadOK =0;
    }else{
    
    // new file size in KB
    $new_size = $file_size/1024;  
    // new file size in KB
    
    // make file name in lower case
    $new_file_name = strtolower($file);
    // make file name in lower case
    
    $final_file=str_replace(' ','-',$new_file_name);
    
    if(move_uploaded_file($file_loc,$folder.$final_file))
    {
        $sql="INSERT INTO `tbl_assignments`(`ass_title`, `ass_instruction`, `ass_date`, `ass_deadline`, `ass_filename`, `ass_file_path`, `class_id`)
         VALUES ('$ass_title','$ass_ins',NOW(),'$ass_deadline','$final_file','$folder','$classID')";
        //$sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$final_file','$file_type','$new_size')";
        mysqli_query($conn, $sql);
        ?>
        <script>
        //alert('successfully uploaded');
        window.location.href='class-assignment.php?id=<?php echo $classID; ?>&upload';
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
        alert('error while uploading file');
        //window.location.href='class-assignment.php?id=<?php echo $classID; ?>';
        </script>
        <?php
    }
}
}
?>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container page-navigation-toggled">
            
            <?php
            include 'include/sidebar.php';
            ?>
            
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
               <?php include 'include/topbar.php'; ?>            
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li><a href="#">Class Menu</a></li>
                    <li><a href="manage-class.php">Manage Class</a></li>
                    <li><a href="#" onclick="history.back();"><?php echo $classname; ?></a></li>
                    <li class="active">Create Assignment</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- Start PAGE CONTENT WRAP -->
                <div class="page-content-wrap">
                    <form role="form" method="POST" action="create-assignment.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">
                        <?php
                        if ($uploadOK == 0) {
                            echo ('<div class="upload upload-fail">
                                <strong>Warning!</strong> Only Word(".docx",".doc") and Excel(".xlam",".xltx",".xls",".xlsx") extension file is allowed.
                            </div>');
                        }
                        ?>
                    <div class="row">
                        <div class="form-horizontal">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Assignment Title</label>
                                    <div class="col-md-10">                                            
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="ass_title" id="quizname" required="" placeholder="Enter title here....">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Assignment Rules & Instruction</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" wrap="" rows="2" style="resize: none;" placeholder="Type assignment rules and intructions here..." name="ass_ins"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Assignment Deadline</label>
                                        <div class="col-md-5 col-xs-12">
                                            <div class="input-group">
                                                <input class="form-control datepicker" name="ass_date" id="quizdeadline" type="text" placeholder="YYYY-mm-dd" required="">
                                                <span class="input-group-addon add-on"><span class="fa fa-calendar"></span></span>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-xs-12">
                                            <div class="input-group">
                                                <input class="form-control timepicker" name="ass_time" id="quizdeadlinetime" type="text" value="00:00 " required="">
                                                <span class="input-group-addon add-on"><span class="fa fa-clock-o"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="margin-top: 10px;">
                            <div class="panel panel-default panel-hidden-controls">
                                <div class="panel-heading ui-draggable-handle">
                                    <div class="col-md-6">
                                        <input type="file" class="fileinput btn-primary" name="ass_file" id="filename" title="Attach File"/>
                                    </div>                         
                                            
                                    <div class="col-md-6">
                                        <div class="pull-right">
                                            <button type="submit" name="createass" class="btn btn-info">Create Assignment</button>
                                            <a href="class-assignment.php?id=<?php echo($classID) ?>" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>  
                          <!--   END PANEL DEFAULT -->
                        </div>
                       <!--  END COL MD 12 -->
                    </div>
                    <!-- END ROW -->
                    </form>
                </div>
                <!-- END PAGE CONTENT WRAP -->
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
          <?php include 'include/footer.php'; ?>
        <!-- END MESSAGE BOX-->    
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>    
        <script>
            $('#quizdeadline').datepicker({ 
                startDate: new Date() 
            });
        </script>            
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>     
        <!-- END THIS PAGE PLUGINS-->
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        
        <!-- END TEMPLATE -->   
        
    <!-- END SCRIPTS -->
<style type="text/css">
    .upload {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .upload{
        float: left;
        width: 100%;
        margin-bottom: 10px;
        line-height: 21px;
    }
    .upload-fail {
        background-color: #fe9e19;
        color: #FFF;
        border-color: #fe9e19;
    }
</style>
    </body>
</html>