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

                                <a href="#timeline" data-toggle="tab" class="list-group-item active"><span class="fa fa-clock-o text-default"></span>Timeline </a>
                               <!--  <a href="#message" data-toggle="tab" class="list-group-item"><span class="fa fa-comments text-primary"></span>Messages</a> -->
                                <a href="class-assignment.php?id=<?php echo($classID); ?>" class="list-group-item"><span class="fa fa-bolt text-default"></span>Assignments <span class="badge badge-danger" style="background-color: #ff5858; color: white; border-color: white;"><?php assignments();?></span></a>
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
                    <!-- END CONTENT FRAME TOP -->
                    
                    <!-- START CONTENT FRAME BODY -->
                    <div class="content-frame-body">
                        <div class="row push-up-10">
                             <div class="col-md-12 tab-content">
                                    <!-- START TIMELINE TAB-->
                                        <div class="tab-pane fade in active" id="timeline">
                                            <div class="row">
                                                <div class="col-md-12 col-xs-12">
                                                    <div class="form-group">
                                                      <h3>Timeline</h3>
                                                        <form action="class-post.php" method="POST">
                                                            <input type="text" name="classID" hidden="" value="<?php echo($classID); ?>">       
                                                        <div id="textbox">
                                                            <textarea name="posttext" class="form-control push-down-10" id="new_task" rows="4" placeholder="Whats on your mind?" required=""></textarea>
                                                        </div>
                                                        <button name="btnpost" class="btn btn-warning" id="post"><span class="fa fa-edit"></span> POST</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timeline timeline-right">
                                
                                                <!-- START TIMELINE ITEM -->
                                                <div class="timeline-item timeline-main">
                                                    <div class="timeline-date">New Posts    </div>
                                                </div>
                                                <!-- END TIMELINE ITEM -->
                                                <?php
                                                // START DISPLAY POST
                                                $sql = "SELECT mem.`member_id`,mem.`member_username`,mem.`member_fullname`, p.* FROM `tbl_classpost` p
                                                        LEFT JOIN tbl_members mem ON p.`user_id` = mem.`member_id`
                                                        WHERE p.`class_id` =".$classID."  ORDER BY `post_date` DESC, post_id DESC";
                                                $r = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($r)>0) {
                                                    while ($row=mysqli_fetch_assoc($r)) {
                                                        $POST_ID = $row['post_id'];
                                                        $member_id = $row['member_id'];
                                                        $member_fullname =$row['member_fullname'];
                                                        $member_username = $row['member_username'];
                                                        $post_time = $row['post_time'];
                                                        $content = $row['post_content'];
                                                        $date = date_create($row['post_date']);
                                                        // START HERE
                                                        ?>
                                                        <div class="timeline-item timeline-item-right">
                                                        <div class="timeline-item-info"><?PHP ECHO date_format($date,"M d, Y");?></div>
                                                        <div class="timeline-item-icon"><span class="fa fa-comment"></span></div>
                                                        <div class="timeline-item-content">
                                                            <div class="timeline-heading" style="padding-bottom: 10px;">
                                                                <img src="assets/images/users/no-image.jpg">
                                                                <a href="view-profile.php?id='.$member_id.'">From : <?PHP ECHO $member_fullname; ?></a><small class="text-muted"> @<?PHP ECHO $member_username; ?></small><span class="pull-right"><?PHP ECHO $post_time ?> <a href="delete-post.php?id=<?php echo $POST_ID;?>"><span class="fa fa-trash-o"></span></a></span>
                                                            </div>
                                                            <div class="timeline-body" style="background-color: #ffffff;">
                                                                <!-- <img src="assets/images/gallery/nature-4.jpg" class="img-text" width="150" align="left"> -->
                                                                    <label><?PHP ECHO $content;?></label>    
                                                            </div>
                                                            <?php 
                                                            //START DISPLAY COMMENTS

                                                            $cquery= mysqli_query($conn, "SELECT * FROM (SELECT  U.member_id, U.`member_fullname`, U.`member_username`, CLR.`postreply_id`, CLR.`post_id`, CLR.`user_id`, CLR.`reply_content`, CLR.`reply_date`, CLR.`reply_time` FROM tbl_classpost_reply CLR LEFT JOIN tbl_members U ON CLR.user_id = U.member_id WHERE `post_id`='".$row["post_id"]."' ORDER BY postreply_id DESC LIMIT 3 )sub ORDER BY postreply_id ASC ") or die(mysqli_error());

                                                            while ($crow=mysqli_fetch_array($cquery,MYSQLI_ASSOC)){
                                                            $postreplyid_id=$crow['postreply_id'];
                                                            $user = $crow['member_id'];
                                                            $reply=$crow['reply_content'];
                                                            $date=$crow['reply_date'];
                                                            $time = $crow['reply_time'];
                                                            $postid = $crow['post_id'];

                                                            if ($postid == $POST_ID) { // IF COMMENTS FROM SELECTED POST IS AVAILABLE THEN DISPLAY COMMENT
                                                                 echo ' <form method="POST" action = "class-post-reply.php?id='.$row["post_id"].'">                                    
                                                                <div class="timeline-body comments">
                                                                    <div class="comment-item">
                                                                        <img src="assets/images/users/no-image.jpg">
                                                                        <p class="comment-head">
                                                                            <a href="view-profile.php?id='.$user.'">'.$crow['member_fullname'].'</a> <span class="text-muted">@'.$crow["member_username"].'</span>
                                                                        </p>
                                                                        <p>'.$reply.'</p>
                                                                        <small class="text-muted">'.$time.'</small>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                </form>';
                                                            } // END IF STATEMENT

                                                            }//END WHILE LOOP

                                                            // END DISPLAY COMMENTS
                                                            ?>
                                                            <form method="POST" action = "class-post-reply.php?id=<?php echo $POST_ID;?>">
                                                                <div class="timeline-body comments">
                                                                    <div class="comment-write">                                                
                                                                        <textarea class="form-control" placeholder="Write a comment" rows="1" name="reply" required autocomplete="off"></textarea> 
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                // START COUNT COMMENT
                                                                $sqlcount = "SELECT COUNT(*) as countcomment FROM tbl_classpost_reply WHERE `post_id` = ".$POST_ID;
                                                                $res = mysqli_query($conn, $sqlcount);
                                                                if (mysqli_num_rows($res)>0) {
                                                                   while ($rows = mysqli_fetch_assoc($res)) {
                                                                       $commentcount = $rows['countcomment'];
                                                                   }
                                                                }
                                                                 // END COUNT COMMENT
                                                                ?>
                                                                <div class="timeline-footer">
                                                                    <a href="#">Read more</a>
                                                                    <div class="pull-right">
                                                                        <a href="#"><span class="fa fa-comment"></span> <?php echo $commentcount;?></a> 
                                                                        <button type="submit" id="comment" name="comment" class="btn btn-info btn-xs">comment</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                        <?php // END HERE
                                                    }
                                                }
                                                ?>
                                                
                                                
                                                <!-- START TIMELINE ITEM -->
                                                <div class="timeline-item timeline-main">
                                                    <div class="timeline-date"><a href="#"><span class="fa fa-ellipsis-h"></span></a></div>
                                                </div>                                
                                                <!-- END TIMELINE ITEM -->

                                            </div>
                                            
                                        </d iv>
                                        <!-- END TIMELINE TAB -->                                        
                                
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
        <?php //classfooter(); ?>
        <!-- MODALS -->        
        <div class="modal fade" id="sendmessage" tabindex="-1" role="dialog" aria-labelledby="taskEditModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="taskEditModalHead">Send Message</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Message Content</label>
                            <textarea class="form-control" id="task-text" rows="4" required="true"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Task group</label>
                            <select class="form-control select">
                                <option>Work</option>
                                <option>Home</option>
                                <option>Friends</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn btn-primary">Send</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>        
        <!-- END MODALS -->
        <!-- MODAL Create quiz -->        
        <div class="modal fade" id="quizadd" tabindex="-1" role="dialog" aria-labelledby="taskEditModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="form-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Create Quiz</strong></h3>
                                    <ul class="panel-controls">
                                       <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                    </ul>
                                </div>
                                <div class="panel-body">     
                                                                                              
                                  
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Quiz Name</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="quizname" id="quizname" />
                                            </div>                                            
                                            <span class="help-block">Quiz Name</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Quiz Category</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select class="form-control select" name="quizcat" id="quizcat" required="">
                                                <option>Select Category</option>
                                                <option value="1">True or False</option>
                                                <option value="2">Multiple Choice</option>
                                                <option value="5">Identification</option>
                                            </select>
                                            <span class="help-block">Category</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <a href="#" class="btn btn-default" data-dismiss="modal">Cancel</a>                                    
                                    <button id="submit" class="btn btn-primary pull-right">Create quiz</button>
                                </div>
                            </div>
                            </div>
                </div>
            </div>
        </div>        
        <!-- END MODALS -->
        <!--  MESSAGE BOX -->
        <!-- <div class="message-box animated fadeIn" data-sound="alert" id="remove-post">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times"></span> Remove <strong>Data</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to remove this row?</p>                    
                        <p>Press Yes if you sure.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <button class="btn btn-success btn-lg mb-control-yes">Yes</button>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- END MESSAGE BOX -->
        <!-- MESSAGE BOX-->
          <?php include 'include/footer.php'; ?>
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
        
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>                
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>    
        <script type="text/javascript" src="js/demo_tables.js"></script>
        <script type="text/javascript" src="js/plugins/dropzone/dropzone.min.js"></script>
        <script type="text/javascript" src="js/plugins/fileinput/fileinput.min.js"></script>        
        <script type="text/javascript" src="js/plugins/filetree/jqueryFileTree.js"></script>    
        
        <script type="text/javascript" src="js/plugins/summernote/summernote.js"></script>    
        
        <script type='text/javascript' src='js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='js/plugins/validationengine/jquery.validationEngine.js'></script>        

        <script type='text/javascript' src='js/plugins/jquery-validation/jquery.validate.js'></script>       
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        
        <!-- END TEMPLATE -->

                                                <script> 
                                                $(document).ready(function(){
                                                    $("#hide").click(function(){
                                                        $("#textbox").slideToggle("fast");
                                                    });
                                                });
                                                </script>
    <script type="text/javascript" >
     
    $(document).on("click", "#submit", function () {
    /* load all variables */
    var name = document.getElementById('quizname').value
    var category = document.getElementById('quizcat').value
    var classid2 = document.getElementById('classid2').value
   
    $.ajax({ //create an ajax request to load_page.php
    type:"POST",
    url: "addquizprocess.php",
    dataType: "text", //expect html to be returned
    data:{name:name, category:category, classid2:classid2},
    success: function(data){
    $(".loaddata").html(data);
     
    }
     
    });
     
    });
    </script>
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