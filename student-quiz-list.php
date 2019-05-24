<?php
include 'include/header.php';
include 'class-module.php';

if ($_GET['quizcat'] == '1') {
   // sql count # of items
    $sqlNoitems = mysqli_query($conn, "SELECT COUNT(*) as 'items' FROM tblquiz_questions WHERE quiz_id =".$_GET['quizid']);
    if (mysqli_num_rows($sqlNoitems)>0) {
        while ($rowi = mysqli_fetch_array($sqlNoitems)) {
            $items = $rowi['items'];
        }
    }
}elseif ($_GET['quizcat'] == '2') {
    // sql count # of items
    $sqlNoitems = mysqli_query($conn, "SELECT COUNT(*) as 'items' FROM tbl_quiz_identification WHERE quiz_id =".$_GET['quizid']);
    if (mysqli_num_rows($sqlNoitems)>0) {
        while ($rowi = mysqli_fetch_array($sqlNoitems)) {
            $items = $rowi['items'];
        }
    }
}if ($_GET['quizcat'] == '3') {
    // sql count # of items
    $sqlNoitems = mysqli_query($conn, "SELECT COUNT(*) as 'items' FROM tbl_quiz_mc WHERE quiz_id =".$_GET['quizid']);
    if (mysqli_num_rows($sqlNoitems)>0) {
        while ($rowi = mysqli_fetch_array($sqlNoitems)) {
            $items = $rowi['items'];
        }
    }
}


// sql quiz details
$sqlquiz = mysqli_query($conn, "SELECT * FROM tbl_quiz WHERE quiz_id=".$_GET['quizid']);
if (mysqli_num_rows($sqlquiz)>0) {
    while ($quizinfo = mysqli_fetch_assoc($sqlquiz)) {
        $quiz_name = $quizinfo['quiz_name'];
        $quiz_deadline = $quizinfo['quiz_deadline'];
    }
}

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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Class Menu</a></li>
                    <li><a href="manage-class.php">Manage Class</a></li>
                    <li><a href="class.php?id=<?php echo $classID; ?>"><?php echo $classname; ?></a></li>
                    <li class="active">Student Quiz Results </li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-body" style="line-height: 10px; background-color: #1caf9a; color: #1d1d1d;">
                                    <h3>Quiz Details <a href="#" onclick="history.back();" class="pull-right" style="color: #FFF;"><span class="fa fa-arrow-circle-o-left"></span> Back</a></h3><hr style="margin-top: 0px; margin-bottom: 11px;">
                                    <p>Quiz Title : <b><?php echo $quiz_name; ?></b></p>
                                    <p>Deadline : <b><?php echo $quiz_deadline; ?></b></p>
                                    <p>Total No of Items : <b><?php echo $items; ?></b></p>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><b>Quiz Results</b></h3>

                                    <div class="btn-group pull-right">
                                        <a href="print-report.php?id=<?php echo $classID;?>&quizid=<?php echo $_GET['quizid'];?>&quizcat=<?php echo $_GET['quizcat']?>" target="_blank" class="btn btn-default"><img src='img/icons/printer.png' width="24"/> PRINT REPORT</a>
                                    </div>                       
                                    
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <table id="customers2" class="table datatable">
                                        <thead>
                                            <tr>
                                                <th width="100">Student ID</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th width="100">Quiz Score</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if ($_GET['quizcat'] == 1) {
                                            $sql = mysqli_query($conn, "SELECT DISTINCT m.member_fullname, m.member_id FROM `tblquiz_answers` A LEFT JOIN tbl_members m ON A.user_id = m.member_id WHERE A.`quiz_id` =".$_GET['quizid']);
                                                if (mysqli_num_rows($sql)>0) {
                                                    
                                                    while ($row = mysqli_fetch_array($sql)) {

                                                        $sqlcounter = mysqli_query($conn, "SELECT COUNT(*) as 'score' FROM tblquiz_answers A LEFT JOIN tblquiz_questions Q ON A.`questions` = Q.quest_id WHERE Q.quiz_id =".$_GET['quizid']." AND A.answer = Q.answer AND A.user_id =".$row['member_id']);
                                                        if (mysqli_num_rows($sqlcounter)>0) {
                                                            while ($rows = mysqli_fetch_array($sqlcounter)) {
                                                                $userscore = $rows['score'];
                                                            }
                                                        }

                                                        $sqlnorec[] = " AND M.member_id <> ".$row['member_id']."";

                                                    echo '<tr>';
                                                    echo '<td>'.$row['member_id'].'</td>';
                                                    echo '<td>'.$row['member_fullname'].'</td>';
                                                    echo '<td class="text-success"><span class="fa fa-check-square-o"></span> Submitted</td>';
                                                    echo '<td style="text-align: center;">'.$userscore.'</td>';
                                                    echo '</tr>';
                                                    }
                                                // query to select members who did not taken the quiz
                                                $norecord = mysqli_query($conn, "SELECT m.member_fullname, m.member_id FROM tbl_classmembers C LEFT JOIN tbl_members M ON C.member_id = M.member_id WHERE C.class_id =".$_GET['id']." ".implode($sqlnorec));
                                                    if (mysqli_num_rows($norecord)>0) {
                                                        while ($rowN = mysqli_fetch_assoc($norecord)) {
                                                            echo '<tr>';
                                                            echo '<td>'.$rowN['member_id'].'</td>';
                                                            echo '<td>'.$rowN['member_fullname'].'</td>';
                                                            echo '<td class="text-danger"><span class="fa fa-times"></span> No Record</td>';
                                                            echo '<td style="text-align: center;">0</td>';
                                                            echo '</tr>';
                                                        }
                                                    }
                                                // end script
                                                    
                                                }else{ /// if no is submitted
                                                        norecord();
                                                    }  
                                            }elseif ($_GET['quizcat'] == 2) {
                                                $sql = mysqli_query($conn, "SELECT DISTINCT m.member_fullname,   m.member_id FROM `tbl_quiz_identification_answer` A LEFT JOIN tbl_members m ON A.user_id = m.member_id WHERE A.`quiz_id` =".$_GET['quizid']);
                                                    if (mysqli_num_rows($sql)>0) {
                                                        while ($row = mysqli_fetch_array($sql)) {

                                                            $sqlcounter = mysqli_query($conn, "SELECT COUNT(*) as 'score' FROM tbl_quiz_identification_answer A LEFT JOIN tbl_quiz_identification Q ON A.`questions` = Q.quest_id WHERE Q.quiz_id =".$_GET['quizid']." AND A.answer = Q.answer AND A.user_id =".$row['member_id']);
                                                            if (mysqli_num_rows($sqlcounter)>0) {
                                                                while ($rows = mysqli_fetch_array($sqlcounter)) {
                                                                    $userscore = $rows['score'];
                                                                }
                                                            }
                                                             $sqlnorec[] = " AND M.member_id <> ".$row['member_id']."";

                                                        echo '<tr>';
                                                        echo '<td>'.$row['member_id'].'</td>';
                                                        echo '<td>'.$row['member_fullname'].'</td>';
                                                        echo '<td class="text-success"><span class="fa fa-check-square-o"></span> Submitted</td>';
                                                        echo '<td style="text-align: center;">'.$userscore.'</td>';
                                                        echo '</tr>';
                                                        }
                                                // query to select members who did not taken the quiz
                                                $norecord = mysqli_query($conn, "SELECT m.member_fullname, m.member_id FROM tbl_classmembers C LEFT JOIN tbl_members M ON C.member_id = M.member_id WHERE C.class_id =".$_GET['id']." ".implode($sqlnorec));
                                                    if (mysqli_num_rows($norecord)>0) {
                                                        while ($rowN = mysqli_fetch_assoc($norecord)) {
                                                            echo '<tr>';
                                                            echo '<td>'.$rowN['member_id'].'</td>';
                                                            echo '<td>'.$rowN['member_fullname'].'</td>';
                                                            echo '<td class="text-danger"><span class="fa fa-times"></span> No Record</td>';
                                                            echo '<td style="text-align: center;">0</td>';
                                                            echo '</tr>';
                                                        }
                                                    }
                                                // end script
                                                    }else{ /// if no is submitted
                                                        norecord();
                                                    }       
                                            }elseif ($_GET['quizcat'] == 3) {
                                            $sql = mysqli_query($conn, "SELECT DISTINCT m.member_fullname,   m.member_id FROM `tbl_quiz_mc_answer` A LEFT JOIN tbl_members m ON A.user_id = m.member_id WHERE A.`quiz_id` =".$_GET['quizid']);
                                                if (mysqli_num_rows($sql)>0) {
                                                    while ($row = mysqli_fetch_array($sql)) {

                                                        $sqlcounter = mysqli_query($conn, "SELECT COUNT(*) as 'score' FROM tbl_quiz_mc_answer A LEFT JOIN tbl_quiz_mc Q ON A.`questions` = Q.quest_id WHERE Q.quiz_id =".$_GET['quizid']." AND A.answer = Q.answer AND A.user_id =".$row['member_id']);
                                                            if (mysqli_num_rows($sqlcounter)>0) {
                                                                while ($rows = mysqli_fetch_array($sqlcounter)) {
                                                                    $userscore = $rows['score'];
                                                                }
                                                            }

                                                        $sqlnorec[] = " AND M.member_id <> ".$row['member_id']."";
                                                        
                                                    echo '<tr>';
                                                    echo '<td>'.$row['member_id'].'</td>';
                                                    echo '<td>'.$row['member_fullname'].'</td>';
                                                    echo '<td class="text-success"><span class="fa fa-check-square-o"></span> Submitted</td>';
                                                    echo '<td style="text-align: center;">'.$userscore.'</td>';
                                                    echo '</tr>';
                                                    }
                                                // query to select members who did not taken the quiz
                                                $norecord = mysqli_query($conn, "SELECT m.member_fullname, m.member_id FROM tbl_classmembers C LEFT JOIN tbl_members M ON C.member_id = M.member_id WHERE C.class_id =".$_GET['id']." ".implode($sqlnorec));
                                                    if (mysqli_num_rows($norecord)>0) {
                                                        while ($rowN = mysqli_fetch_assoc($norecord)) {
                                                            echo '<tr>';
                                                            echo '<td>'.$rowN['member_id'].'</td>';
                                                            echo '<td>'.$rowN['member_fullname'].'</td>';
                                                            echo '<td class="text-danger"><span class="fa fa-times"></span> No Record</td>';
                                                            echo '<td style="text-align: center;">0</td>';
                                                            echo '</tr>';
                                                        }
                                                    }
                                                // end script
                                                }else{ /// if no is submitted
                                                        norecord();
                                                    }  
                                            }
                                            
                                        ?>
                                        </tbody>
                                    </table>
                                    </div>
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
        <!-- END THIS PAGE PLUGINS-->  
        
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->                 
    </body>
</html>

<?php
function norecord(){
// start norecord script

    include 'include/connect.php';
    $memberlist = mysqli_query($conn, "SELECT * FROM tbl_classmembers WHERE class_id =".$_GET['id']);
    if (mysqli_num_rows($memberlist)>0) {
       // query to select members who did not taken the quiz
        $norecord = mysqli_query($conn, "SELECT m.member_fullname, m.member_id FROM tbl_classmembers C LEFT JOIN tbl_members M ON C.member_id = M.member_id WHERE C.class_id =".$_GET['id']);
            if (mysqli_num_rows($norecord)>0) {
                while ($rowN = mysqli_fetch_assoc($norecord)) {
                    echo '<tr>';
                    echo '<td>'.$rowN['member_id'].'</td>';
                    echo '<td>'.$rowN['member_fullname'].'</td>';
                    echo '<td class="text-danger"><span class="fa fa-times"></span> No Record</td>';
                    echo '<td style="text-align: center;">0</td>';
                    echo '</tr>';
                }
            }
        // end script
    }else{
        echo '<button class="btn btn-warning btn-block" id="nostudent" disabled>No Student Enrolled</button>';
    }

// end norecord script
}

?>
<style type="text/css">
    #nostudent{
        margin-top: -5px;
        margin-bottom: 5px;
        opacity: 1;
    }
</style>