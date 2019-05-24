<?php
include 'include/header.php';
?>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container ">
            
            <?php
            include 'include/sidebar.php';
            ?>
            
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
               
                
                      <?php
                        include 'include/topbar.php';
                        ?>
                        <?php
                        // RETRIEVE QUIZ INFO & RESULTS OF SPECIFIC QUIZ PARTICIPANTs.

                        $SQL = "SELECT q.*, cl.class_name, m.member_fullname as Author, qc.quizcat_code as quizcode FROM tbl_quiz q
                                left join quiz_category qc on q.quiz_cat = qc.quizcat_id
                                left join tbl_class cl on q.class_id = cl.class_id
                                left JOIN tbl_members m ON q.quiz_author = m.member_id
                                WHERE quiz_id=".$_GET['id'];
                        $RESULT = mysqli_query($conn, $SQL);
                        if (mysqli_num_rows($RESULT)>0) {
                            while ($ROW = mysqli_fetch_assoc($RESULT)) {
                                $classid = $ROW['class_id'];
                                $quizcode =$ROW['quizcode'];
                                $quiz_name = $ROW['quiz_name'];
                                $class_name = $ROW['class_name'];
                                $Author = $ROW['Author'];
                            }
                        }
                        if ($quizcode == 'TF') {
                            // QUERY FOR COUNTING THE TOTAL NUMBER OF ITEMS.
                        $SQLQUIZRESULT = "SELECT COUNT(*) as 'total' FROM tblquiz_answers qa LEFT JOIN tblquiz_questions qq ON qa.`questions` = qq.quest_id WHERE (qa.`quiz_id` = ".$_GET['id']." AND qa.`user_id` = ".$_SESSION['member_id'].")";
                        $QUIZRESULT = mysqli_query($conn, $SQLQUIZRESULT);
                        if (mysqli_num_rows($QUIZRESULT) > 0) {
                            while ($QUIZROW = mysqli_fetch_assoc($QUIZRESULT)) {
                              $total = $QUIZROW['total'];
                            }
                        }

                        // QUERY FOR COUNTING THE TOTAL NUMBER OF CORRECT ANSWERS.
                        $SQLQUIZRESULT = "SELECT COUNT(*) as 'score' FROM tblquiz_answers qa LEFT JOIN tblquiz_questions qq ON qa.`questions` = qq.quest_id WHERE (qa.`quiz_id` = ".$_GET['id']." AND qa.`user_id` = ".$_SESSION['member_id'].") AND (qq.`answer` = qa.`answer`)";
                        $QUIZRESULT = mysqli_query($conn, $SQLQUIZRESULT);
                        if (mysqli_num_rows($QUIZRESULT) > 0) {
                            while ($QUIZROW = mysqli_fetch_assoc($QUIZRESULT)) {
                              $score = $QUIZROW['score'];
                            }
                        }

                        $qoutient = $score / $total;
                        $percentage = $qoutient * 100;

                        }elseif ($quizcode == 'ID') {
                            // QUERY FOR COUNTING THE TOTAL NUMBER OF ITEMS.
                        $SQLQUIZRESULT = "SELECT COUNT(*) as 'total' FROM `tbl_quiz_identification_answer` qa
                                        LEFT JOIN `tbl_quiz_identification` qq ON qa.`questions` = qq.quest_id
                                        WHERE (qa.`quiz_id` = ".$_GET['id']." AND qa.`user_id` = ".$_SESSION['member_id'].")";
                        $QUIZRESULT = mysqli_query($conn, $SQLQUIZRESULT);
                        if (mysqli_num_rows($QUIZRESULT) > 0) {
                            while ($QUIZROW = mysqli_fetch_assoc($QUIZRESULT)) {
                              $total = $QUIZROW['total'];
                            }
                        }

                        // QUERY FOR COUNTING THE TOTAL NUMBER OF CORRECT ANSWERS.
                        $SQLQUIZRESULT = "SELECT COUNT(*) as 'score' FROM `tbl_quiz_identification_answer` qa
                                        LEFT JOIN `tbl_quiz_identification` qq ON qa.`questions` = qq.quest_id
                                        WHERE (qa.`quiz_id` = ".$_GET['id']." AND qa.`user_id` = ".$_SESSION['member_id'].") AND (qq.`answer` = qa.`answer`)";
                        $QUIZRESULT = mysqli_query($conn, $SQLQUIZRESULT);
                        if (mysqli_num_rows($QUIZRESULT) > 0) {
                            while ($QUIZROW = mysqli_fetch_assoc($QUIZRESULT)) {
                              $score = $QUIZROW['score'];
                            }
                        }

                        $qoutient = $score / $total;
                        $percentage = $qoutient * 100;
                        }elseif ($quizcode == 'MC') {
                            // QUERY FOR COUNTING THE TOTAL NUMBER OF ITEMS.
                        $SQLQUIZRESULT = "SELECT COUNT(*) as 'total' FROM `tbl_quiz_mc_answer` qa
                                        LEFT JOIN `tbl_quiz_mc` qq ON qa.`questions` = qq.quest_id
                                        WHERE (qa.`quiz_id` = ".$_GET['id']." AND qa.`user_id` = ".$_SESSION['member_id'].")";
                        $QUIZRESULT = mysqli_query($conn, $SQLQUIZRESULT);
                        if (mysqli_num_rows($QUIZRESULT) > 0) {
                            while ($QUIZROW = mysqli_fetch_assoc($QUIZRESULT)) {
                              $total = $QUIZROW['total'];
                            }
                        }

                        // QUERY FOR COUNTING THE TOTAL NUMBER OF CORRECT ANSWERS.
                        $SQLQUIZRESULT = "SELECT COUNT(*) as 'score' FROM `tbl_quiz_mc_answer` qa
                                        LEFT JOIN `tbl_quiz_mc` qq ON qa.`questions` = qq.quest_id
                                        WHERE (qa.`quiz_id` = ".$_GET['id']." AND qa.`user_id` = ".$_SESSION['member_id'].") AND (qq.`answer` = qa.`answer`)";
                        $QUIZRESULT = mysqli_query($conn, $SQLQUIZRESULT);
                        if (mysqli_num_rows($QUIZRESULT) > 0) {
                            while ($QUIZROW = mysqli_fetch_assoc($QUIZRESULT)) {
                              $score = $QUIZROW['score'];
                            }
                        }

                        $qoutient = $score / $total;
                        $percentage = $qoutient * 100;
                        }
                        

                        ?>
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="#">Class Menu</a></li>
                    <li><a href="manage-class.php">Manage Class</a></li>
                    <li><a href="class.php?id=<?php echo $classid; ?>">Back</a></li>
                    <li class="active">Result</li>
                </ul>
                <!-- END BREADCRUMB -->               
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <!-- WIDGETS -->
                    <div class="row">
                        <?php if ($percentage < 75) {
                            ?>
                            <div class="col-md-12">                        
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"></span><span class="sr-only">Close</span></button>
                                <strong style="font-size: 20px;">Well done!</strong> You successfully finish the quiz.
                                <a href="class.php?id=<?php echo $classid; ?>" style="color: #fff;">
                                    <strong class="pull-right" style="font-size: 20px;">
                                        <span class="fa fa-arrow-circle-left"></span> Back to timeline
                                    </strong>
                                </a>
                            </div>  
                        </div>
                        <div class="col-md-3">
                            <div class="widget widget-danger widget-padding-sm">                            
                                <div class="widget-item-left">
                                    <input class="knob" data-width="100" data-height="100" data-min="0" data-max="100" data-displayInput=false data-bgColor="#d6f4ff" data-fgColor="#FFF" value="<?php echo round($percentage);?>%" data-readOnly="true" data-thickness=".3"/>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-big-int"><span class="num-count"><?php echo round($percentage).'%'; ?></span></div>
                                    <div class="widget-title">Score <?php echo $score; ?> / <?php echo $total; ?> </div>
                                    <a href="#" data-toggle="modal" data-target="#review_answer"><div class="widget-subtitle">Review Answers</div></a>                                
                                </div>                           
                            </div> 
                        </div>
                            <?php
                        }elseif ($percentage >= 75) {
                            ?>
                            <div class="col-md-12">                        
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"></span><span class="sr-only">Close</span></button>
                                <strong style="font-size: 20px;">Well done!</strong> You successfully finish the quiz.
                                <a href="class.php?id=<?php echo $classid; ?>" style="color: #fff;">
                                    <strong class="pull-right" style="font-size: 20px;">
                                        <span class="fa fa-arrow-circle-left"></span> Back to timeline
                                    </strong>
                                </a>
                            </div>  
                        </div>
                        <div class="col-md-3">
                            <div class="widget widget-success widget-padding-sm">                            
                                <div class="widget-item-left">
                                    <input class="knob" data-width="100" data-height="100" data-min="0" data-max="100" data-displayInput=false data-bgColor="#d6f4ff" data-fgColor="#FFF" value="<?php echo round($percentage);?>%" data-readOnly="true" data-thickness=".3"/>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-big-int"><span class="num-count"><?php echo round($percentage).'%'; ?></span></div>
                                    <div class="widget-title">Score <?php echo $score; ?> / <?php echo $total; ?> </div>
                                    <a href="#" data-toggle="modal" data-target="#review_answer"><div class="widget-subtitle">Review Answers</div></a>                                
                                </div>                           
                            </div> 
                        </div>
                            <?php
                        }
                        ?>
                        
                        <div class="col-md-9">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <ul class="list-group border-bottom">
                                        <li class="list-group-item"><h5>Class Name : </h5><h3><strong><?php echo $class_name; ?></strong></h3></li>
                                        <li class="list-group-item"><h5>Quiz Title : </h5><h3><strong><?php echo $quiz_name; ?></strong></h3></li>
                                        <li class="list-group-item"><h5>Adviser : </h5><h3><strong><?php echo $Author; ?></strong></h3></li>
                                        <!-- <li class="list-group-item"><h5>Quiz Status : <strong>asdasdasd</strong></li> -->
                                        <li class="list-group-item"><h5>Total Number of Questions : </h5><h3><strong><?php echo $total; ?></strong></h3></li>
                                        <li class="list-group-item"><h5>Score : </h5><h3><strong><?php echo $score; ?></strong></h3></li>
                                        <!-- <li class="list-group-item">Number of Incorrect answer : <strong>asdasdasd</strong></li> -->
                                    </ul>                                
                                </div>
                            </div>
                        </div>
                    </div>           
                </div>
                <!-- END PAGE CONTENT WRAPPER -->
                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        <!-- Review Answers -->
        <div class="modal fade" id="review_answer" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="largeModalHead">Review Answers</h4>
                    </div>
                    <div class="modal-body">
                                    <!-- <p><code>Highlightened</code> answers is/are incorrect answer.</p> -->
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 60px; text-align: center;">Item #</th>
                                                <th style="width: 501px;">Question</th>
                                                <th style="width: 100px; text-align: center;">Answers</th>
                                                <th style="width: 100px; text-align: center;">Correct Answers</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        if ($quizcode == 'TF') {
                                            $sqlreview = "SELECT qq.questions as question, qa.answer as answer, qq.answer as correctans FROM `tblquiz_answers` qa LEFT JOIN tblquiz_questions qq ON qa.`questions` = qq.quest_id WHERE qa.quiz_id = ".$_GET['id']." AND qa.user_id =".$_SESSION['member_id'];
                                            $reviewresult = mysqli_query($conn, $sqlreview);
                                            if (mysqli_num_rows($reviewresult)>0) {
                                                $item = 0;
                                                while ($rows = mysqli_fetch_assoc($reviewresult)) {
                                                     $item += 1;
                                                    echo '<tr>';
                                                    echo '<td style="text-align: center;">'.$item.'</td>';
                                                    echo '<td>'.$rows['question'].'</td>';
                                                    if ($rows['answer'] !== $rows['correctans']) {
                                                        echo '<td class="text-danger" style="width: 100px; text-align: center;">'.$rows['answer'].' <span class="fa fa-times"></span></td>';
                                                    }
                                                    else{
                                                        echo '<td class="text-success" style="width: 100px; text-align: center;">'.$rows['answer'].' <span class="fa fa-check"></span></td>';
                                                    }
                                                    echo '<td style="width: 100px; text-align: center; font-weight: bold;">'.$rows['correctans'].'</td>';
                                                    echo '</tr>';


                                                }
                                            }
                                        }elseif ($quizcode == 'ID') {
                                            $sqlreview = "SELECT qq.questions as question, qa.answer as answer, qq.answer as correctans FROM `tbl_quiz_identification_answer` qa LEFT JOIN `tbl_quiz_identification` qq ON qa.`questions` = qq.quest_id WHERE qa.quiz_id = ".$_GET['id']." AND qa.user_id =".$_SESSION['member_id'];
                                            $reviewresult = mysqli_query($conn, $sqlreview);
                                            if (mysqli_num_rows($reviewresult)>0) {
                                                $item = 0;
                                                while ($rows = mysqli_fetch_assoc($reviewresult)) {
                                                     $item += 1;
                                                    echo '<tr>';
                                                    echo '<td style="text-align: center;">'.$item.'</td>';
                                                    echo '<td>'.$rows['question'].'</td>';
                                                    if ($rows['answer'] !== $rows['correctans']) {
                                                        echo '<td class="text-danger" style="width: 100px; text-align: center;">'.$rows['answer'].' <span class="fa fa-times"></span></td>';
                                                    }
                                                    else{
                                                        echo '<td class="text-success" style="width: 100px; text-align: center;">'.$rows['answer'].' <span class="fa fa-check"></span></td>';
                                                    }
                                                    echo '<td style="width: 100px; text-align: center; font-weight: bold;">'.$rows['correctans'].'</td>';
                                                    echo '</tr>';


                                                }
                                            }
                                        }elseif ($quizcode == 'MC') {
                                            $sqlreview = "SELECT qq.question as question, qa.answer as answer, qq.answer as correctans FROM `tbl_quiz_mc_answer` qa LEFT JOIN `tbl_quiz_mc` qq ON qa.`questions` = qq.quest_id WHERE qa.quiz_id = ".$_GET['id']." AND qa.user_id =".$_SESSION['member_id'];
                                            $reviewresult = mysqli_query($conn, $sqlreview);
                                            if (mysqli_num_rows($reviewresult)>0) {
                                                $item = 0;
                                                while ($rows = mysqli_fetch_assoc($reviewresult)) {
                                                     $item += 1;
                                                    echo '<tr>';
                                                    echo '<td style="text-align: center;">'.$item.'</td>';
                                                    echo '<td>'.$rows['question'].'</td>';
                                                    if ($rows['answer'] !== $rows['correctans']) {
                                                        echo '<td class="text-danger" style="width: 100px; text-align: center;">'.$rows['answer'].' <span class="fa fa-times"></span></td>';
                                                    }
                                                    else{
                                                        echo '<td class="text-success" style="width: 100px; text-align: center;">'.$rows['answer'].' <span class="fa fa-check"></span></td>';
                                                    }
                                                    echo '<td style="width: 100px; text-align: center; font-weight: bold;">'.$rows['correctans'].'</td>';
                                                    echo '</tr>';


                                                }
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                        
                    </div>
                </div>
            </div>
        </div>
        <!-- end Review Answers -->
        
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
        
        <script type="text/javascript" src="js/plugins/knob/jquery.knob.min.js"></script>
        <script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>        
        <script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>






