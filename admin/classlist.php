<?php
include 'include/header.php';
?>
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
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Student List </li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <a href="#" onclick="history.back();"><h2><span class="fa fa-arrow-circle-o-left"></span> Back</h2></a>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Class List</h3>
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">
                                            <!-- <li><a href="#" onClick ="$('#student').tableExport({type:'json',escape:'false'});"><img src='img/icons/json.png' width="24"/> JSON</a></li>
                                            <li><a href="#" onClick ="$('#student').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src='img/icons/json.png' width="24"/> JSON (ignoreColumn)</a></li>
                                            <li><a href="#" onClick ="$('#student').tableExport({type:'json',escape:'true'});"><img src='img/icons/json.png' width="24"/> JSON (with Escape)</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#student').tableExport({type:'xml',escape:'false'});"><img src='img/icons/xml.png' width="24"/> XML</a></li>
                                            <li><a href="#" onClick ="$('#student').tableExport({type:'sql'});"><img src='img/icons/sql.png' width="24"/> SQL</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#student').tableExport({type:'csv',escape:'false'});"><img src='img/icons/csv.png' width="24"/> CSV</a></li>
                                            <li><a href="#" onClick ="$('#student').tableExport({type:'txt',escape:'false'});"><img src='img/icons/txt.png' width="24"/> TXT</a></li>
                                            <li class="divider"></li> -->
                                            <li><a href="#" onClick ="$('#student').tableExport({type:'excel',escape:'false'});"><img src='img/icons/xls.png' width="24"/> XLS</a></li><!-- 
                                            <li><a href="#" onClick ="$('#student').tableExport({type:'doc',escape:'false'});"><img src='img/icons/word.png' width="24"/> Word</a></li>
                                            <li><a href="#" onClick ="$('#student').tableExport({type:'powerpoint',escape:'false'});"><img src='img/icons/ppt.png' width="24"/> PowerPoint</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#student').tableExport({type:'png',escape:'false'});"><img src='img/icons/png.png' width="24"/> PNG</a></li>
                                            <li><a href="#" onClick ="$('#student').tableExport({type:'pdf',escape:'false'});"><img src='img/icons/pdf.png' width="24"/> PDF</a></li> -->
                                        </ul>
                                    </div>                                    
                                    
                                </div>
                                <div class="panel-body">
                                    <table id="student" class="table datatable table-striped">
                                        <thead>
                                            <tr>
                                                <th>Class ID</th>
                                                <th>Name</th>
                                                <th>Adviser</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $Student = mysqli_query($conn,"SELECT * FROM `tbl_class` c left join tbl_members adv on c.class_adviser=adv.member_id");
                                                if (mysqli_num_rows($Student)>0) {
                                                    while ($row = mysqli_fetch_assoc($Student)) {
                                                    echo '<tr>';
                                                        echo '<td>'.$row['class_id'].'</td>';
                                                        echo '<td>'.$row['class_name'].'</td>';
                                                        echo '<td>'.$row['member_fullname'].'</td>';  
                                                        echo '<td><a href="view-class.php?id='.$row['class_id'].'" class="btn btn-info active btn-xs">View</a></td>';
                                                    echo '</tr>';
                                                    }
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
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
        
        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/plugins/tableexport/tableExport.js"></script>
        <script type="text/javascript" src="js/plugins/tableexport/jquery.base64.js"></script>
        <script type="text/javascript" src="js/plugins/tableexport/html2canvas.js"></script>
        <script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/sprintf.js"></script>
        <script type="text/javascript" src="js/plugins/tableexport/jspdf/jspdf.js"></script>
        <script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/base64.js"></script>

        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>     
        <!-- END THIS PAGE PLUGINS-->  
        
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->                 
    </body>
</html>













