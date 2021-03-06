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
                                <a href="class-assignment.php?id=<?php echo($classID); ?>" class="list-group-item active"><span class="fa fa-bolt text-default"></span>Assignments <span class="badge badge-danger" style="background-color: #ff5858; color: white; border-color: white;"><?php assignments();?></span></a>
                                <a href="class-files.php?id=<?php echo($classID); ?>" class="list-group-item"><span class="fa fa-files-o text-default"></span>Files</a>
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
                                <!--   Message Alert if Create Assignment Success.  -->
                                <?php if (isset($_GET['upload'])) {
                                    echo '<div class="upload upload-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <strong>Success!</strong> New assignment is created.
                                </div>';
                                }
                                ?>
                                <!--   END Message Alert if Create Assignment Success.  -->
                               <h3><span class="fa fa-book"></span> Assignments for <?php echo $classname; ?></h3>
                                    <input type="text" hidden="" id="classid2" name="classid" value="<?php echo $classID; ?>">
                                <?php if ($_SESSION['member_type'] == "Teacher") {
                                    echo '<span><a href="create-assignment.php?id='.$classID.'" class="btn btn-info active">Add New Assignment</a></span>';
                                } ?>
                            <hr>
                            </div>
                            <div class="panel-body" style="margin-top: -30px;">
                                <div class="table-responsive">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>Assigment Title</th>
                                                <th>Date Created</th>
                                                <th>Deadline</th>
                                                <?php if ($_SESSION['member_type']=='Teacher') {
                                                    echo ' <th style="text-align: center;">Action</th>';
                                                } ?>
                                            </tr>
                                        </thead>
                                        <tbody class="loaddata">
                                            <?php 
                                            $sqlassignments = mysqli_query($conn, "SELECT * FROM `tbl_assignments` WHERE `class_id` =".$classID);
                                            if (mysqli_num_rows($sqlassignments)>0) {
                                                while ($assrow = mysqli_fetch_assoc($sqlassignments)) {
                                                    $ass_cr=date_create($assrow["ass_date"]);
                                                     $ass_dead=date_create($assrow["ass_deadline"]);
                                                   echo '<tr>';
                                                    echo '<td><a href="view-assignment.php?id='.$_GET['id'].'&ass_id='.$assrow['ass_id'].'">'.$assrow["ass_title"].'</a></td>';
                                                    echo '<td>'.date_format($ass_cr,"M d, Y h:i:A").'</td>';
                                                    echo '<td>'.date_format($ass_dead,"M d, Y h:i:A").'</td>';
                                                    if ($_SESSION['member_type']=='Teacher') {
                                                    echo '<td><a href="module/delete-assignment.php?id='.$assrow['ass_id'].'" class="btn btn-danger btn-block btn-xs"><span class="fa fa-trash-o"></span> Delete</td>';
                                                    }
                                                    echo '</tr>';
                                                }
                                            }

                                            ?>                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
        
        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>   
        <script type="text/javascript" src="js/plugins/fileinput/fileinput.min.js"></script> 
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        
        <!-- END TEMPLATE -->
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
            .upload-success {
                background-color: #77ac1f;
                color: #FFF;
                border-color: #77ac1f;
            }
        </style> 
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





