<?php
include 'include/header.php';
include 'class-module.php';
?>
<style type="text/css">
    @media only screen and (max-width: 360px) {
  .gggg{
    width:100%
   
  }
  .test{
    font-size: 12px;
     white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .details h2{
    font-size: 13px;
    overflow: hidden;
  }
}
@media print{
    .breadcrumb, .page-title, .page-sidebar, .x-navigation {
        display: none;
    }
    .panel-default{
        width: 700px;
        margin-left: -200px;
    }
    a[href]:after{
                content: none !important;
    }
}
</style>
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
                    <li class="active"><a href="class.php?id=<?php echo $classID; ?>"><?php echo $classname; ?></a></li>
                    <li class="active">View Class Assignments </li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <a href="#" onclick="history.back();"><h2><span class="fa fa-arrow-circle-o-left"></span> Back</h2></a>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <?php
                        $assquery = mysqli_query($conn, "SELECT * FROM `tbl_assignments` WHERE ass_id =".$_GET['ass_id']);
                        if (mysqli_num_rows($assquery)>0) {
                            while ($ass = mysqli_fetch_assoc($assquery)) {
                                $ass_id = $ass['ass_id'];
                                $ass_title = $ass['ass_title'];
                                $ass_instruction = $ass['ass_instruction'];
                                $ass_filename = $ass['ass_filename'];
                                $ass_file_path = $ass['ass_file_path'];
                                $ass_title = $ass['ass_title'];
                                $ass_deadline = $ass['ass_deadline'];
                                $ass_date = date_create($ass['ass_date']);
                                $date = date_format($ass_date,"m-d-Y");
                            }
                        }
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Assignment Title : <b><?php echo $ass_title; ?></b> </h3>

                                    <div class="pull-right"><a target="_blank" href="print-report.php?id=<?php echo $classID;?>&ass_id=<?php echo $ass_id;?>" class="btn btn-default"><i class="fa fa-print"></i><b> PRINT REPORT</b></a></div>
                                    <!-- <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='img/icons/xls.png' width="24"/> XLS</a></li>  xv
                                        </ul>
                                    </div>   -->                                  
                                    
                                </div>
                                <div class="panel-body">
                                    <?php
                                        if ($_SESSION['member_type'] == 'Student') { // if current user is a Student
                                             ?>
                                            <form enctype="multipart/form-data" class="form-horizontal" action="upload-assignment.php?id=<?php echo($_GET['id']);?>&ass_id=<?php echo $_GET['ass_id'] ?>" method="POST">
                                                <div class="hidden">
                                                    <input type="text" name="datefolder" value="<?php echo $date ?>" hidden>
                                                    <input type="text" name="ass_title" value="<?php echo $ass_title ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <a href="<?php echo $ass_file_path; echo $ass_filename;?>" class="btn btn-lg btn-info gggg active" target="_blank"><div class="test"><span class="fa fa-download"></span> Download Attachment : <?php echo $ass_filename;?></div></a>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="details">
                                                        <h2>Instructions : <?php echo $ass_instruction; ?></h2>
                                                        <h2>Date Created : <?php echo $date ?></h2>
                                                        <h2>Deadline : <?php echo $ass_deadline; ?></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            if (isset($_GET['submit']) && $_GET['submit'] == 0) {
                                                echo '<div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="alert alert-warning" role="alert" style="background-color: #fe9e19">
                                                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                            <strong>Sorry.</strong> You already submitted yor assignment.
                                                        </div>
                                                    </div>                                            
                                                </div>';
                                            }elseif (isset($_GET['submit']) && $_GET['submit'] == 1) {
                                               echo '<div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="alert alert-success" role="alert" style="background-color: #6cab05">
                                                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                            <strong>Great Job!</strong> You successfully submitted your assignment.
                                                        </div>
                                                    </div>                                            
                                                </div>';
                                            }
                                            ?>
                                                
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <h3>Upload Assignment</h3>
                                                        <input type="file" id="file-simple" name="assfile">
                                                    </div>                                            
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <button class="btn btn-lg btn-success active" name="uploadass"><span class="fa fa-upload"></span> Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
                                        }else{ // if the current user is a Teacher
                                            ?>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Student Name</th>
                                                        <th>File Name</th>
                                                        <th>Date Submitted</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $listanswers = mysqli_query($conn,"SELECT * FROM tbl_assignment_ans A
                                                    left join tbl_members m on A.user_id = m.member_id WHERE ass_id =".$_GET['ass_id']." ORDER BY `ans_id` ASC");
                                                     if (mysqli_num_rows($listanswers)>0) {
                                                         while ($rows = mysqli_fetch_assoc($listanswers)) {
                                                            $datesub = date_create($rows['ans_date']);
                                                            $diff=date_diff($ass_date,$datesub);
                                                            echo '<tr>';
                                                            echo '<td>'.$rows['member_fullname'].'</td>';
                                                            echo '<td><a href="'.$rows['ans_file_path'].'/'.$rows['ans_file'].'" target="_blank">'.$rows['ans_file'].'</a></td>';
                                                            echo '<td>'.date_format($datesub,"m-d-Y | h:i a").'</td>';
                                                            if ($diff->format("%R%a")>0) {
                                                                echo "<td id='late'><span class='fa fa-warning'></span> LATE</td>";
                                                            }else{
                                                                echo "<td id='ontime'><span class='fa fa-check'></span> ON TIME</td>";
                                                            }
                                                            echo '</tr>';

                                                         }
                                                     }
                                                 ?>
                                                </tbody>
                                                </table>
                                             <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <!-- END DATATABLE EXPORT --> 
                        </div>
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
        
        <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->
        
        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

        <script type="text/javascript" src="js/plugins/fileinput/fileinput.min.js"></script>  
        
        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/plugins/tableexport/tableExport.js"></script>
    	<script type="text/javascript" src="js/plugins/tableexport/jquery.base64.js"></script>
    	<script type="text/javascript" src="js/plugins/tableexport/html2canvas.js"></script>
    	<script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/sprintf.js"></script>
    	<script type="text/javascript" src="js/plugins/tableexport/jspdf/jspdf.js"></script>
    	<script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/base64.js"></script>
        <!-- END THIS PAGE PLUGINS-->  
        
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
        <!-- END SCRIPTS --> 
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
    </body>
</html>
<style type="text/css">
    #late{
        color: #ff3d3d;
        font-weight: bold;
    }
    #ontime{
        color: #00a700;
        font-weight: bold;
    }
</style>