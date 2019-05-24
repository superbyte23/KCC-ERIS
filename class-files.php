<?php
include 'include/header.php';
include 'class-module.php';
if ($_SESSION['member_type']=='Teacher') {
   $membership = mysqli_query($conn,"SELECT * FROM `tbl_classmembers` CL RIGHT JOIN tbl_class C ON CL.`class_id` = C.`class_id` WHERE C.`class_id` = ".$_GET['id']." AND C.`class_adviser` = ".$_SESSION['member_id']."");
    if (mysqli_num_rows($membership)>0) {
       
    }else{
         header("location: pages-error-403.php");
    }
}elseif ($_SESSION['member_type']=='Student') {
  $membership = mysqli_query($conn,"SELECT * FROM `tbl_classmembers` CL left JOIN tbl_class C ON CL.`class_id` = C.`class_id` WHERE C.`class_id` = ".$_GET['id']." AND CL.`member_id` = ".$_SESSION['member_id']."");
    if (mysqli_num_rows($membership)>0) {
       
    }else{
         header("location: pages-error-403.php");
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
               
                
                      <?php
                        include 'include/topbar.php';
                        ?>            
                 <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="index.php">Dashboard</a></li>                    
                    <li><a href="#">Class Menu</a></li>
                    <li><a href="manage-class.php">Manage Class</a></li>
                    <li class="active"><a href="class.php?id=<?php echo $classID; ?>"><?php echo $classname; ?></a></li>
                </ul>
                <!-- END BREADCRUMB -->
                             
                
                <!-- START CONTENT FRAME -->
                <div class="content-frame">
                    
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">                        
                        <div class="page-title">                    
                            <h2><span class="fa fa-windows"></span>  <?php echo ucwords($classname); ?></h2>
                        </div>                                                
                        <div class="pull-right">
                            <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
                        </div>  
                    </div>  
                    <!-- END CONTENT FRAME TOP -->
                    
                    <!-- START CONTENT FRAME LEFT -->
                    <div class="content-frame-left">
                        <!-- <div class="form-group push-up-10">
                            <h4>Search in Class</h4>
                            <form>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-search"></span></div>
                                <input type="text" class="form-control" placeholder="keyword..."/>
                            </div>
                            </form>
                        </div> -->
                        <div class="form-group">
                            <h4>Class Menu</h4>
                            <div class="list-group border-bottom">

                                <a href="class.php?id=<?php echo($classID) ?>" class="list-group-item"><span class="fa fa-clock-o text-default"></span>Timeline </a>
                               <!--  <a href="#message" data-toggle="tab" class="list-group-item"><span class="fa fa-comments text-primary"></span>Messages</a> -->
                                <a href="class-assignment.php?id=<?php echo($classID); ?>" class="list-group-item"><span class="fa fa-bolt text-default"></span>Assignments <span class="badge badge-danger" style="background-color: #ff5858; color: white; border-color: white;"><?php assignments();?></span></a>
                                <a href="class-files.php?id=<?php echo($classID); ?>" class="list-group-item active"><span class="fa fa-files-o text-default"></span>Files</a>
                               <a href="class-quiz.php?id=<?php echo($classID); ?>" class="list-group-item"><span class="fa fa-folder text-default"></span>
                               Quiz <span class="badge badge-danger" style="background-color: #ff5858; color: white; border-color: white;"><?php quiz();?></span></</a>
                                <a href="#photos" data-toggle="tab" class="list-group-item"><span class="fa fa-image text-default"></span> 
                                Photos of <?php echo $classname; ?></a>
                                
                            </div>
                        </div>
                        <?php
                            if ($_SESSION['member_type'] == "Teacher") {
                                echo '<div class="form-group">
                            
                            <div class="list-group border-bottom">
                                <a href="class-settings.php?id='.$classID.'" class="list-group-item"><span class="fa fa-gears"></span> 
                                Class Settings</a>

                            </div>
                        </div>';
                            }
                        ?>
                        <style type="text/css">
                            .img{
                                width: 50px;
                                height: 50px;
                                margin-right: 5px;
                                border: 2px solid #FFF;
                                -moz-border-radius: 20%;
                                -webkit-border-radius: 20%;
                                border-radius: 20%;
                            }
                            div.caption {
                            padding: 1px;
                            font-size: 9px;
                            text-align: center;
                            }
                        </style>
                        <div class="form-group">
                            <h4>Members:</h4>
                            <div class="row">
                                <?php $sql = "SELECT clmb.`classmember_id` as 'memberid' , memb.`member_id`, memb.`member_fullname`, crs.`course_Name`, yrl.`yrlvl_name` FROM `tbl_members` memb LEFT JOIN `tbl_classmembers` clmb ON memb.`member_id` = clmb.`member_id` LEFT JOIN `tbl_student` student ON clmb.`member_id` = student.`member_id` LEFT JOIN `tblcourse` crs ON student.`user_course` = crs.`course_ID` LEFT JOIN `tblyearlevel` yrl ON student.`user_year` = yrl.`yrlvl_ID` WHERE clmb.`class_id` = $classID AND clmb.`verification` = 'Yes' ";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                       while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<div class="col-md-3 col-xs-3">
                                                <img class="img" src="assets/images/users/no-image.jpg" alt="Nature">
                                                    <div class="caption">
                                                      <p>'.$row['member_fullname'].'</p>
                                                    </div>
                                              </div>';
                                       }
                                    }
                                ?>
                               
                               
                            </div>                            
                        </div>
                        <div class="form-group">
                            <h4>Tags:</h4>
                            <ul class="list-tags">
                                <?php $sql = "SELECT class_tags FROM tbl_class WHERE class_id =".$classID;
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                       while ($row = mysqli_fetch_assoc($result)) {
                                           $tag = $row['class_tags'];
                                       }
                                    }

                                    $array = (explode(",",$tag));
                                    foreach ($array as $key => $tags) {
                                      echo ' <li><a href="#"><span class="fa fa-tag"></span> '.$tags.'</a></li>';
                                    } ?>
                               
                               
                            </ul>                            
                        </div>
                        
                    </div>  
                    <!-- END CONTENT FRAME LEFT -->
                    
                    <!-- START CONTENT FRAME BODY -->
                    <div class="content-frame-body">
                        <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-mail-forward"></span> File Uploads</h3>
                                    <form action="file-upload.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Add File</label><br>
                                                <input type="text" name="classID" hidden="" value="<?php echo $classID; ?>">
                                               <input type="file" multiple id="file-simple" name="fileToUpload"  required="" />
                                               <button class="btn btn-primary" type="submit" name="upload"><span class="fa fa-upload"></span> Upload File</button>
                                            </div>
                                        </div>
                                        <hr>
                                    </form>
                                </div> <!-- END panel BODY -->
                                <div class="panel-body" style="margin-top: -30px;">
                                    <h3><span class="fa fa-file"></span> Files</h3>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped datatable">
                                            <thead>
                                                <tr>
                                                    <th width="50%">File Name</th>
                                                    <th width="10%">Details</th>
                                                    <th width="15%">Action</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql = "SELECT * FROM tbl_classfiles  WHERE `class_id` =".$classID." ORDER BY `file_id` DESC"; ;
                                                    $r = mysqli_query($conn, $sql);
                                                    if (mysqli_num_rows($r) > 0) {
                                                        while ($row=mysqli_fetch_assoc($r)) {
                                                            $date = date_create($row['date_uploaded']);

                                                            echo '<tr>';
                                                            echo '<td><strong>'.$row['filename'].'</strong></td>';
                                                            echo '<td><strong>'.date_format($date,'M-d-y').'</strong></td>';
                                                            echo '<td><span><a href="assets/uploads/Class '.$classID.'/'.$row["filename"].'" class="btn btn-xs btn-info active" target="_blank">view file</a></span>
                                                            <span><button class="btn btn-xs btn-danger" >Delete</button></span>
                                                            </td>';
                                                            echo '</tr>';
                                                        }
                                                    }
                                                ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div> <!-- end panel body -->
                        </div>
                    </div>
                    <!-- END CONTENT FRAME BODY -->
                </div>
                <!-- END CONTENT FRAME -->
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                 
        
     <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>   
        <script type="text/javascript" src="js/plugins/fileinput/fileinput.min.js"></script> 
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        
        <!-- END TEMPLATE -->
    <script>
            $(function(){
                $("#file-simple").fileinput({
                        showUpload: false,
                        showCaption: false,
                        browseClass: "btn btn-danger",
                        fileType: "any"
                });            
                $("#filetree").fileTree({
                    root: '/',
                    script: 'assets/filetree/jqueryFileTree.php',
                    expandSpeed: 100,
                    collapseSpeed: 100,
                    multiFolder: false                    
                }, function(file) {
                    alert(file);
                }, function(dir){
                    setTimeout(function(){
                        page_content_onresize();
                    },200);                    
                });                
            });            
        </script>
    
    <!-- END SCRIPTS -->         
    </body>
</html>
<?php 
    function assignments(){
        include 'include/connect.php';
        $sql = mysqli_query($conn, "SELECT COUNT(*) as 'assignments' FROM `tbl_assignments` WHERE class_id =".$_GET['id']);
        if (mysqli_num_rows($sql)>0) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $ass_num = $row['assignments'];
                echo $ass_num;
            }
        }
    }

    function quiz(){
         include 'include/connect.php';
        $sql = mysqli_query($conn, "SELECT COUNT(*) as 'quiz' FROM `tbl_quiz` WHERE class_id =".$_GET['id']);
        if (mysqli_num_rows($sql)>0) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $ass_num = $row['quiz'];
                echo $ass_num;
            }
        }
    }
?>





