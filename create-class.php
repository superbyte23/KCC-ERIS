<?php
include 'include/header.php';

 require('include/connect.php');

if (isset($_POST['btncreate'])) {

    $classid = $_POST['classcode'];
    $classname = ucwords($_POST['classname']);
    $subjectname = $_POST['subject'];
    $classdays = $_POST['classdays'];
    $timestart = $_POST['timestart'];
    $timeend = $_POST['timeend'];
    $classroom = $_POST['classroom'];
    $classtags = $_POST['classtags'];
    $description = $_POST['description'];
    $adviserID = $_SESSION['member_id'];


    echo $classid;
  

// sql to Insert record table
  $sqlcreateclass = "INSERT INTO `tbl_class`(`class_id`,`class_name`,`subject_name`, `class_days`, `class_start`, `class_end`, `class_room`, `class_tags`, `class_description`, `class_adviser`, `class_dateCreate`,`class_status`) 
    VALUES ($classid,'$classname','$subjectname','$classdays','$timestart','$timeend', '$classroom', '$classtags','$description',$adviserID, DATE_FORMAT(NOW(),'%m-%d-%Y'),'Active')";
     
    if (mysqli_query($conn, $sqlcreateclass)) {
       ?>
          <script type="text/javascript">                      
                window.location = "manage-class.php";
          </script>
       <?php 
       } else {
        echo "Error: " . $sqlcreateclass . "<br>" . mysqli_error($conn);
    }
     
    mysqli_close($conn);

   }
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
                    <li><a href="#">Home</a></li>                    
                    <li><a href="#">Class Menu</a></li>
                    <li><a href="manage-class.php">Manage Class</a></li>
                    <li class="active"><a href="create-class.php">Create Class</a></li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            
                           
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                   <a href="manage-class.php" type="button" class="btn btn-info">View Class</a>
                                   <?php
                                   if ($_SESSION['member_type'] == 'Teacher') {
                                       echo '<a href="create-class.php" class="btn btn-success active">Create Class</a>    ';
                                       
                                      // echo '<a href="class-request.php" type="button" class="btn btn-danger">Class Request</a>    ';

                                   }else{

                                    echo '<button type="button" data-toggle="modal" data-target="#modalsubject" class="btn btn-success">Join Class</button> ';
                                     
                                       echo '<a href="class-request.php" type="button" class="btn btn-danger">Class Request</a>    ';
                                   }
                                   ?>

                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <!--<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>-->
                                        <!--<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>-->
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                     <form class="form-horizontal" method="POST" action="create-class.php">
                                    <?php 
function GeraHash($qtd){ 
//Under the string $Caracteres you write all the characters you want to be used to randomly generate the code. 
$Caracteres = '123456789'; 
$QuantidadeCaracteres = strlen($Caracteres); 
$QuantidadeCaracteres--; 

$Hash=NULL; 
    for($x=1;$x<=$qtd;$x++){ 
        $Posicao = rand(0,$QuantidadeCaracteres); 
        $Hash .= substr($Caracteres,$Posicao,1); 
    } 

return $Hash; 
} 

$classcode = GeraHash(6);
//Here you specify how many characters the returning string must have 
echo'<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Class ID</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <input type="text" name="classcode" hidden value="'.$classcode.' "> 
                                                <h1 class="text-success">'.$classcode.'</h1>
                                            </div>                                            
                                            <span class="help-block">Class ID is auto generated characters. It automatically change when refreshing the page. Changing class Id is unavailable after creating the class. </span>
                                        </div>
                                    </div>';                        
?>    
                                                                                              
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Class Name</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input name="classname" type="text" class="form-control"/ required=""> 
                                            </div>                                            
                                            <span class="help-block">Class Name</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Subject Name</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input name="subject" type="text" class="form-control"/ required="">
                                            </div>            
                                            <span class="help-block">Subject Name</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Class Time</label>
                                        <div class="col-md-3">
                                            <div class="input-group bootstrap-timepicker">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                                <input name="timestart" type="text" class="form-control timepicker" required="">                                             
                                            </div>
                                            <span class="help-block">Time Start</span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group bootstrap-timepicker">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                                <input name="timeend" type="text" class="form-control timepicker" required="">                                             
                                            </div>
                                            <span class="help-block">Time End</span>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Class Days</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select class="form-control select" name="classdays" required="">
                                                <option></option>
                                                        <option value="M.W.">M.W.</option>
                                                        <option value="T.TH.">T.TH.</option>
                                                        <option value="Friday">Friday</option>
                                            </select>
                                            <span class="help-block">Select Class Days</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Class Tags</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <input name="classtags" type="text" class="tagsinput"/>
                                            <span class="help-block">Add tags</span>
                                        </div>
                                    </div>                           
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">About Your Class</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea name="description" class="form-control" rows="5"></textarea>
                                            <span class="help-block">Add Description to your class</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Class Room</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select class="form-control select" name="classroom" required="">
                                                <option value=""></option>
                                                <?php
                                                               // Count number of unread messages.
                                                                $sqlcourse = "SELECT * FROM `tbl_classroom`";
                                                                $result = mysqli_query($conn, $sqlcourse);

                                                                if (mysqli_num_rows($result) > 0) {
                                                                    while($row = mysqli_fetch_assoc($result)) {
                                                                      echo '<option value="'.$row['room_name'].'">'.$row['room_name'].'</option>';
                                                                    }

                                                                }
                                                               ?>

                                            </select>
                                            <span class="help-block">Select Class Room</span>
                                        </div>
                                    </div>
                                <div class="panel-footer">
                                    <a href="create-class.php" class="btn btn-default">Clear Form</a>                                    
                                    <input type="submit" name="btncreate" class="btn btn-primary pull-right" value="Create Class">
                                </div>
                            </form>
                            </div>
                           
                            
                        </div>
                        <!-- END PANEL --> 

                    </div>                    
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        
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
        
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>                
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        
        <script type='text/javascript' src='js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='js/plugins/validationengine/jquery.validationEngine.js'></script>        

        <script type='text/javascript' src='js/plugins/jquery-validation/jquery.validate.js'></script>                

        <!-- END THIS PAGE PLUGINS -->       
        
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
        
    <!-- END SCRIPTS -->                   
    </body>
</html>






