<?php
include 'include/header.php';
include 'include/connect.php';
   $sql = ("SELECT `class_id`, `class_name`, `subject_name`, `class_days`, concat(class_start,' - ',class_end) as 'Time', `class_start`,`class_end`, `class_room`, `class_tags`, `class_description`, `class_adviser`, `class_dateCreate` FROM `tbl_class` WHERE `class_id` = ".$_GET['id']."  AND `class_adviser` =".$_SESSION['member_id']);

                        $results = mysqli_query($conn , $sql);
                                          
                        if (mysqli_num_rows($results) > 0){

                            while ($row = mysqli_fetch_array($results)) {
                                                   
                                $classID = $row['class_id'];
                                $classname = $row['class_name'];
                                $subject = $row['subject_name'];
                                $classtart = $row['class_start'];
                                $classend = $row['class_end'];
                                $classdays = $row['class_days'];
                                $adviser = $row['class_adviser'];
                                $classtags = $row['class_tags'];
                                $description = $row['class_description'];
                                $classroom = $row['class_room'];
                            }
                        }else{
                            ?>
                            <script type="text/javascript">window.location ='pages-error-404.php';</script>
                            <?php
                        }
    if (isset($_POST['deactivate'])) {
        $pass = sha1($_POST['pass']);
        $sql2 = "SELECT * FROM tbl_members WHERE member_password = '$pass' AND member_id =".$_SESSION['member_id'];
        $result = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($result) > 0) {

           $status = 'Inactive';
            $sql = "UPDATE `tbl_class` SET `class_status`= '$status' WHERE `class_id` =".$_GET['id'];
            if (mysqli_query($conn, $sql)) {
                ?>
                    <script type="text/javascript">
                        alert('Class Deactivated Succesfully.');
                        window.location ='manage-class.php';
                    </script>
                <?php
            }else{
                ?>
                    <script type="text/javascript">
                        alert('There was an error deactivating class.');
                        window.location ='class-settings.php?id=<?php echo $_GET['id'];?>';
                    </script>
                <?php
            }
        }else{
            ?>
                <script type="text/javascript">
                    alert('Invalid password.');
                        window.location ='class-settings.php?id=<?php echo $_GET['id'];?>';
                </script>
            <?php
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
                    <li><a href="#">Dashboard</a></li>                    
                    <li><a href="#">Class Menu</a></li>
                    <li><a href="manage-class.php">Manage Class</a></li>
                    <li class="active"><a href="class.php?id=<?php echo $classID; ?>"><?php echo $classname; ?></a></li>
                    <li class="active"><a href="class-settings.php?id=<?php echo $classID; ?>">Settings</a></li>
                </ul>
                <!-- END BREADCRUMB -->
               


                <!-- START CONTENT FRAME -->
                <div class="content-frame">     
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">                        
                        <div class="page-title">                    
                            <h2><span class="fa fa-gears"></span>  <?php echo $classname; ?> Settings</h2>
                        </div>                                                
                        <div class="pull-right">
                            <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
                        </div>
                    </div>
                    <!-- END CONTENT FRAME TOP -->                 
                    <div class="content-frame-left">
                        <div class="form-group">
                            <a onclick="history.back();" class="btn"><h4><span class="fa fa-chevron-circle-left"></span> Back</h4></a>
                            <div class="list-group border-bottom">
                            <a href="#updatesettings" data-toggle="tab" class="list-group-item"><span class="fa fa-gears text-primary"></span>
                                Update Class Information</a>
                            <a href="#classmembers" data-toggle="tab" class="list-group-item"><span class="fa fa-gears text-primary"></span> 
                                View Members of <b><?php echo $classname; ?></b></a>
                            <a href="#classrequest" data-toggle="tab" class="list-group-item"><span class="fa fa-gears text-primary"></span> 
                                View Member Requests</a>    
                            
                             <a href="#general" data-toggle="tab" class="list-group-item"><span class="fa fa-gears text-primary"></span> 
                                General Settings</a>    
                            </div>
                        </div>
                    </div>       
                    <!-- END CONTENT FRAME TOP -->
                    
                    <!-- START CONTENT FRAME BODY -->
                    <div class="content-frame-body">
                        <div class="row push-up-10">
                            <div class="tab-content">

                                    <!-- START Class SETTINGS TAB-->
                                    <div class="tab-pane fade in active" id="updatesettings">
                                        <?php include 'class-update-settings.php';?>                                           
                                    </div>
                                    <!-- END Class SETTINGS TAB -->
                                        
                                    <!-- START Class members list TAB-->
                                    <div class="tab-pane fade in" id="classmembers">                                             
                                        <?php include 'class-members.php';?>
                                    </div>
                                    <!-- END Class members list TAB -->

                                    <!-- START Class members Request TAB-->
                                    <div class="tab-pane fade in" id="classrequest">
                                        <?php include 'class-members-request.php';?>
                                    </div>
                                    <!-- END Class members Request TAB -->
                                    <!-- START General Settings TAB-->
                                    <div class="tab-pane fade in" id="general">
                                            <div class="panel panel-body">
                                                <button type="button" class="btn btn-warning mb-control" data-box="#message-box-warning">Deactivate</button>
                                            </div>                                                  
                                    </div>
                                    </div>
                                    <!-- END General Settings TAB -->
                                
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
         <!-- warning -->
        <div class="message-box message-box-warning animated fadeIn" id="message-box-warning" data-sound="alert">
            <div class="mb-container">
                <div class="mb-middle">
                    <form method="POST" action="class-settings.php?id=<?php echo $_GET['id'];?>">
                    <div class="mb-title"><span class="fa fa-warning"></span> Deactivate Account</div>
                    <div class="mb-content">
                        <p>Are you sure you want deactivate your class?</p>                 
                    </div>
                     <div class="mb-content">
                        <input class="form-control" name="pass" id="password2" type="password" placeholder="Enter pass">
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <button  name="deactivate" class="btn btn-danger btn-lg">Yes</button>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end warning -->
        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
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
        </div>
        <!-- END MESSAGE BOX--> 
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
        <script type="text/javascript" src="js/demo_tables.js"></script>    
        
        <script type='text/javascript' src='js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='js/plugins/validationengine/jquery.validationEngine.js'></script> 
        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>          

        <script type='text/javascript' src='js/plugins/jquery-validation/jquery.validate.js'></script>       
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        
        <!-- END TEMPLATE -->
 <script>
      $(document).ready(function(){ 
      $(".subjects").click(function(){
        var selected = $(this).val();
        $("#subname").val(selected);
      });
      });
    </script>

    <!-- method for saving and retrieving data without refreshing the page. -->
    <script type="text/javascript" >

    $(document).on("click", "#confirm", function () {

            jQuery("#display").fadeIn(900, 0);   
     /* load all variables */
      
        var MEMBERID = document.getElementById('subname').value 
        var classID2 = document.getElementById('classID2').value 
        $.ajax({    //create an ajax request to load_page.php
            type:"POST",  
            url: "confirm-class-request.php",    
            dataType: "text",   //expect html to be returned  
            data:{classID2:classID2,MEMBERID:MEMBERID},          
            success: function(data){                    
             $("#display").html(data); 
              
            }

        }); 

    }); 
    </script>

    <!-- END SCRIPTS -->         
    </body>
</html>






