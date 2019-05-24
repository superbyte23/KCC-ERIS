<?php
include 'include/header.php';
?>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
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
                    <li class="active">Manage Class</li>
                </ul>
                <!-- END BREADCRUMB -->
               

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                  <a href="manage-class.php" type="button" class="btn btn-info active">View Class</a>
                                   <?php
                                   if ($_SESSION['member_type'] == 'Teacher') {
                                       echo '<a href="create-class.php" class="btn btn-success">Create Class</a>    ';
                                       
                                      // echo '<a href="class-request.php" type="button" class="btn btn-danger active">Class Request</a>    ';

                                   }else{

                                    echo '<button type="button" data-toggle="modal" data-target="#modalsubject" class="btn btn-success">Join Class</button> ';
                                     
                                       echo '<a href="class-request.php" type="button" class="btn btn-danger active">Class Request</a>    ';
                                   }
                                   ?>
                                    
                                   

                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>Class ID</th>
                                                <th>Class Name</th>
                                                <th>Subject Name</th>
                                               <?php if ($_SESSION['member_type'] == 'Student' ) {
                                                   echo '<th>Adviser</th>';
                                                }elseif ($_SESSION['member_type'] == 'Teacher' ) {
                                                   echo '<th>Room</th>
                                                <th>Time</th>
                                                <th>Days</th>';
                                                }
                                                ?>
                                            </tr>
                                        </thead>
                                       <tbody>
                                            <?php 

                                $membertype = $_SESSION['member_type'];
                                if ($membertype == 'Teacher') {
                                   include 'include/connect.php';
   $sql = ("SELECT `class_id`, `class_name`, `subject_name`, `class_days`, concat(class_start,' - ',class_end) as 'Time', `class_room`, `class_tags`, `class_description`, `class_adviser`, `class_dateCreate` FROM `tbl_class` WHERE `class_status` = 'Active' AND `class_adviser` =".$_SESSION['member_id']);

                        $results = mysqli_query($conn , $sql);
                                          
                        if (mysqli_num_rows($results) > 0){

                            while ($row = mysqli_fetch_array($results)) {
                                                   
                            
                            echo "<tr>";
                            echo "<td class='col-red'><b>".$row['class_id']."</b></td>";
                            echo "<td><a href='class.php?id=".$row['class_id']."'>".$row['class_name']."</a></td>";
                            echo "<td>".$row['subject_name']."</td>";
                          
                            echo "<td>".$row['class_room']."</td>";
                            echo "<td>".$row['Time']."</td>";
                            echo "<td>".$row['class_days']."</td>";
                            echo "</tr>";
                                                }
                                            }
                                }elseif ($membertype == 'Student') {

                                    include 'include/connect.php';
   $sql = ("SELECT class.`class_id` as 'class_id', class.`class_name` as 'class_name', class.`subject_name` as 'subject_name', class.`class_room` as 'class_room', class.`class_status` as 'Stauts', memb.`member_fullname` as 'class_adviser'
FROM `tbl_class` class 
LEFT JOIN `tbl_members` memb ON class.`class_adviser` = memb.`member_id`
LEFT JOIN `tbl_classmembers` clm ON class.`class_id` = clm.`class_id`
WHERE clm.`verification` = 'Yes' AND clm.`member_id` =".$_SESSION['member_id']);

                        $results = mysqli_query($conn , $sql);
                                          
                        if (mysqli_num_rows($results) > 0){

                            while ($row = mysqli_fetch_array($results)) {
                                                   
                            
                            echo "<tr>";
                            echo "<td class='col-red'><b>".$row['class_id']."</b></td>";
                           
                                if ($row['Stauts'] == 'Inactive') {
                                    echo "<td><a disabled  data-toggle='tooltip' data-placement='top' title='' data-original-title='".$row['class_name']." is Disabled'>".$row['class_name']."</a></td>";
                                }else{
                                      echo "<td><a href='class.php?id=".$row['class_id']."'>".$row['class_name']."</a></td>";
                                }    
                            echo "<td>".$row['subject_name']."</td>";
                            echo "<td>".$row['class_adviser']."</td>";
                            echo "</tr>";
                                                }
                                            }
                                   
                                }
                                

                                ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->

                        </div>
                    </div>                                
                    
                </div>
                <!-- PAGE CONTENT WRAPPER -->                                
            </div>    
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
         <!-- Large Size -->
            <div class="modal fade" id="modalsubject" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="panel panel-colorful">
                                <div class="panel-heading ui-draggable-handle">
                                     <h3 class="panel-title">Type Class Code (eg. XXXXXX). Class Code is provided by your Teacher</h3>
                                </div>
                               <form role="form" class="form-horizontal" action="join-class.php" method="POST">
                                <div class="panel-body">
                                    
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="input-group input-group-lg">                                            
                                                <span class="input-group-addon"><span class="fa fa-key"></span></span>
                                                <input name="classcode" type="number" class="form-control" placeholder="Enter Class Code">
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-default" data-dismiss="modal">Back</button>
                                     <input name="btnjoin" type="submit" class="btn btn-primary pull-right" value="Join Class">
                                </div>
                                </form>                          
                            </div>
                    </div>
                </div>
            </div>       
        
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

        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>    
        <!-- END PAGE PLUGINS -->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>

                 
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS --> 
        
    </body>
</html>






