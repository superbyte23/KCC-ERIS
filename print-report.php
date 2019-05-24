<?php require 'include/connect.php'; ?>


<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Print</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/print.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <style type="text/css">
    .test{
    	line-height: 3px;
    }
        img{
            width: 60%;
           
        }
        @media print{

            a[href]:after{
                content: none !important;
            }
            .theme-settings{
                display: none;
            }
            .data{
            	margin-top: -50px;
            }
        }
            
    </style>
    <body class="page-container-boxed">
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            <!-- PAGE CONTENT -->
            <div class="page-content">
                <div align="center" style="padding: 3%;" class="title">
                    <table>
                    	<tr>
                        	<td align="center"><img src="img/kcclogo.png"></td>
                        	<td align="center" class="test">
                        		<h2>Kabankalan Catholic College</h2>
                        		Guanzon Street Kabankalan City 9111
                        	</td>
                        </tr>
                        
                    </table>
                   
                </div>
                <?php

                if (isset($_GET['quizid'])) {
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

                	// ###############################################################################################################

                		include 'include/connect.php';
								// sql quiz details
								$sqlquiz = mysqli_query($conn, "SELECT * FROM tbl_quiz WHERE quiz_id=".$_GET['quizid']);
								if (mysqli_num_rows($sqlquiz)>0) {
								    while ($quizinfo = mysqli_fetch_assoc($sqlquiz)) {
								        $quiz_name = $quizinfo['quiz_name'];
								        $quiz_deadline = $quizinfo['quiz_deadline'];
								    }
								}

		                    ?>
                    <br><br>
                    <div align="center"><h3>Class Quiz Reports</h3></div>
                    <div class="panel panel-default">
                                <div class="panel-body" style="line-height: 10px; background-color: #1caf9a; color: #1d1d1d;">
                                    <h3>Quiz Details</h3><hr style="margin-top: 0px; margin-bottom: 11px;">
                                    <p>Quiz Title : <b><?php echo $quiz_name; ?></b></p>
                                    <p>Deadline : <b><?php echo $quiz_deadline; ?></b></p>
                                    <p>Total No of Items : <b><?php echo $items; ?></b></p>
                                </div>
                            </div>
                            <div class="data">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><b>Quiz Results</b></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table">
                                        <table id="customers2" class="table table-bordered">
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
                            <!-- END DATATABLE EXPORT --> 
                		</div>
                		</div>
                		<?php

                	// ###############################################################################################################

                }elseif (isset($_GET['ass_id'])) {

                	// ###############################################################################################################
		                include 'include/connect.php';
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
		                                $ass_date = date_create($ass['ass_deadline']);
		                                $date = date_format($ass_date,"m-d-Y");
		                            }
		                        }
		                    ?>
                    <br><br>
                    <div align="center"><h3>Class Assignment Reports</h3></div>
                    <div class="panel panel-default">
                                <div class="panel-body" style="line-height: 10px; background-color: #1caf9a; color: #1d1d1d;">
                                    <h3>Assignment Details</h3><hr style="margin-top: 0px; margin-bottom: 11px;">
                                    <p>Assignment Title : <b><?php echo $ass_title; ?></b></p>
                                    <p>Deadline : <b><?php echo $ass_deadline; ?></b></p>
                                </div>
                            </div>
                            <div class="data">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><b>Assignment Results</b></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="10">Student Name</th>
                                                    <th width="10">File Name</th>
                                                    <th width="10">Date Submitted</th>
                                                    <th width="10">Status</th>
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
                                </div>
                            </div>
                            <!-- END DATATABLE EXPORT --> 
                		</div>
                
                <?php

                // ###############################################################################################################

                } // end else statement

               	?>
                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

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
        <script type="text/javascript">
		 window.onload = function() { window.print(); }
		</script>
		<script>
			 (function () {
		        var beforePrint = function () {
		            
		        };

		        var afterPrint = function () {
		           window.close();
		        };

		        window.onbeforeprint = beforePrint;
		        window.onafterprint = afterPrint;

		    }());
		</script>
    <!-- END SCRIPTS -->          
    </body>
</html>






