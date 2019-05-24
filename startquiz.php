<?php
include 'include/header.php';
// sql to check usertype
$sqlcheckauthor = mysqli_query($conn, "SELECT * FROM `tbl_quiz` WHERE `quiz_author` = ".$_SESSION['member_id']." AND `quiz_id` = ".$_GET['id']."");
if (mysqli_num_rows($sqlcheckauthor)>0) {
    while ($auth = mysqli_fetch_assoc($sqlcheckauthor)) {
        $qID = $auth['quiz_id'];
        $cID = $auth['class_id'];
    }
}
if ($sqlcheckauthor) {
    ?>
        <script type="text/javascript">window.location = "student-quiz-list.php?id=<?php echo $cID;?>&quizid=<?php echo $qID;?>"</script>
    <?php
}



    if (isset($_POST['submit_quiz_TF'])) {
    $quest = $_POST['questions'];
    $answer = $_POST['answer'];
    $sql = array();
        foreach ($quest as $key => $val) {
            $sql[] = '('.$_GET['id'].',"'.$_SESSION['member_id'].'", '.$val.', "'.$answer[$key].'")';
        }
        $submitans = mysqli_query($conn, 'INSERT INTO `tblquiz_answers`(`quiz_id`,`user_id`,`questions`, `answer` ) VALUES '.implode(',', $sql));
        if (!$submitans){
            mysqli_errno($conn);
        }else{
            ?>
            <script type="text/javascript">window.location = "quiz-result.php";</script>
            <?php
        }
    }elseif (isset($_POST['submit_quiz_ID'])) {
    $quest = $_POST['questions'];
    $answer = $_POST['answer'];
    $sql = array();
        foreach ($quest as $key => $val) {
            $sql[] = '('.$_GET['id'].',"'.$_SESSION['member_id'].'", '.$val.', "'.$answer[$key].'")';
        }
        $submitans = mysqli_query($conn, 'INSERT INTO `tbl_quiz_identification_answer`(`quiz_id`,`user_id`,`questions`, `answer` ) VALUES '.implode(',', $sql));
        if (!$submitans){
            mysqli_errno($conn);
        }else{
            ?>
            <script type="text/javascript">window.location = "quiz-result.php";</script>
            <?php
        }
    }
    elseif (isset($_POST['submit_quiz_MC'])) {
    $quest = $_POST['questions'];
    $answer = $_POST['Radio1'].$_POST['Radio2'].$_POST['Radio3'].$_POST['Radio4'];
    $sql = array();
        foreach ($quest as $key => $val) {
            $sql[] = '('.$_GET['id'].',"'.$_SESSION['member_id'].'", '.$val.', "'.$answer[$key].'")';
        }
        $submitans = mysqli_query($conn, 'INSERT INTO `tbl_quiz_mc_answer`(`quiz_id`,`user_id`,`questions`, `answer` ) VALUES '.implode(',', $sql));
        if (!$submitans){
            mysqli_errno($conn);
        }else{
            ?>
            <script type="text/javascript">window.location = "quiz-result.php";</script>
            <?php
        }
    }


        
    $sqlq = "SELECT q.*,qc.`quizcat_name`, qc.`quizcat_code` as quizcode, a.`member_fullname` as Author, cl.`class_name` FROM `tbl_quiz` q 
            LEFT JOIN quiz_category qc ON q.`quiz_cat` = qc.`quizcat_id` 
            LEFT JOIN tbl_members a ON q.`quiz_author` = a.`member_id`
            LEFT JOIN tbl_class cl ON q.`class_id` = cl.`class_id` WHERE `quiz_id` =".$_GET['id'];
                $res = mysqli_query($conn, $sqlq);
                    if (mysqli_num_rows($res)) {
                        while ($quizrow = mysqli_fetch_assoc($res)) {
                            $class_name = $quizrow['class_name'];
                            $quiz_name = $quizrow['quiz_name'];
                            $quiz_time_limit = $quizrow['quiz_time_limit'];
                            $quiz_instruction = $quizrow['quiz_instruction'];
                            $quizcat_name = $quizrow['quizcat_name'];
                            $quizcat_code = $quizrow['quizcode'];
                            $Author = $quizrow['Author'];
                            $quiz_created = $quizrow['quiz_created'];
                            $quiz_deadline = $quizrow['quiz_deadline'];
                        }
                    }else{
                        mysqli_errno($conn);
                    }

    // QUERY TO SELECT USERS IF ALREADY TAKEN THE QUIZ. IF YES THEN REDIRECT TO QUIZ RESULT PAGE.
    $SQLCHECKQUIZTF ="SELECT * FROM `tblquiz_answers`
                    WHERE `quiz_id`=".$_GET['id']." AND user_id =".$_SESSION['member_id'];
    $rslt = mysqli_query($conn, $SQLCHECKQUIZTF);

    if (mysqli_num_rows($rslt) > 0){
       header('location: quiz-result.php?id='.$_GET['id']);
    }
    $SQLCHECKQUIZID ="SELECT * FROM `tbl_quiz_identification_answer`
                    WHERE `quiz_id`=".$_GET['id']." AND user_id =".$_SESSION['member_id'];
    $rslt = mysqli_query($conn, $SQLCHECKQUIZID);

    if (mysqli_num_rows($rslt) > 0){
       header('location: quiz-result.php?id='.$_GET['id']);
    }

    $SQLCHECKQUIZMC ="SELECT * FROM `tbl_quiz_mc_answer`
                    WHERE `quiz_id`=".$_GET['id']." AND user_id =".$_SESSION['member_id'];
    $rslt = mysqli_query($conn, $SQLCHECKQUIZMC);

    if (mysqli_num_rows($rslt) > 0){
       header('location: quiz-result.php?id='.$_GET['id']);
    }

?>
<!-- SCRIPT TO DISABLE BACK BUTTON WHEN QUIZ STARTED -->
<script type="text/javascript">
    history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
});
</script>
<!-- END SCRIPT -->
<script>
    
</script>

    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container page-navigation-toggled">
            
            <?php
            include 'include/sidebar.php';
            ?>
            
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
               <?php include 'include/topbar.php'; ?>            
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li><a href="#">Class Menu</a></li>
                    <li><a href="manage-class.php">Manage Class</a></li>
                    <li><a href="#" onclick="history.back();"><?php echo $class_name; ?></a></li>
                    <li class="active">Quiz</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">

                            <form class="form-horizontal" action="" method="POST">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-2 col-xs-6">
                                           <h3 class="panel-title">Quiz Title :<strong> <?php echo $quiz_name;?></strong></h3> 
                                        </div>
                                        <div class="col-md-3 col-xs-6">
                                            <h3 class="panel-title"> Deadline :<strong> <?php echo $quiz_deadline;?></strong></h3>
                                        </div>
                                        <div class="col-md-3 col-xs-6">
                                            <h3 class="panel-title"> Author :<strong> <?php echo $Author;?></strong></h3>
                                        </div>
                                        <div class="col-md-2 col-xs-6">
                                            <h3 class="panel-title"> Category :<strong> <?php echo $quizcat_name;?></strong></h3>
                                        </div>
                                        <div class="col-md-2 col-xs-12">
                                            <h3  class="panel-title"><strong>Time ends at </strong></h3>
                                            <input type="text" name="timelimit" id="timelimit" hidden="" value="<?php echo $quiz_time_limit;?>">
                                            <h1 class="panel-title" id="timer" style="color: #e00; font-weight: bold; font-family: arial; font-size: 30px; text-align: center;"><strong> 0:00</strong></h1>
                                        </div>
                                    </div>
                                </div>
                                 <div class="panel-body form-group-separated">
                                <?php

                                if ($quizcat_code == 'TF' ) {
                                    $sqlquiz = "SELECT * FROM `tblquiz_questions` WHERE `quiz_id` =".$_GET['id'];
                                    $result = mysqli_query($conn, $sqlquiz);
                                    if (mysqli_num_rows($result) > 0) {
                                        $count = 0;

                                      while ($row = mysqli_fetch_array ($result)) {
                                        $count += 1;
                                        echo '<div class="form-group">
                                        <div class="col-md-10 col-xs-12">                                            
                                            <div class="input-group">
                                                <input type="text" name="questions[]" value="'.$row['quest_id'].'" hidden>
                                                <label style="font-size: 15px;">&nbsp&nbsp&nbsp&nbsp&nbsp'.$row['questions'].'</label>
                                            </div>
                                            <span class="help-block">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspQuestion # '.$count.'</span>
                                        </div>
                                        <div class="col-md-2 col-xs-12">                                            
                                            <div class="input-group">
                                                <select class="form-control" name="answer[]">
                                                    <option value="">Choose your Answer</option>
                                                    <option value="TRUE">TRUE</option>
                                                    <option value="FALSE">FALSE</option>
                                                </select>
                                            </div>                                            
                                            <span class="help-block">Answer #  '.$count.'</span>
                                        </div>
                                    </div>';
                                       }
                                    }
                                }elseif ($quizcat_code == 'ID') {
                                    $sqlquiz = "SELECT * FROM `tbl_quiz_identification` WHERE `quiz_id` =".$_GET['id'];
                                    $result = mysqli_query($conn, $sqlquiz);
                                    if (mysqli_num_rows($result) > 0) {
                                        $count = 0;

                                      while ($row = mysqli_fetch_array ($result)) {
                                        $count += 1;
                                        echo '<div class="form-group">
                                        <div class="col-md-10 col-xs-12">                                            
                                            <div class="input-group">
                                                <input type="text" name="questions[]" value="'.$row['quest_id'].'" hidden>
                                                <label style="font-size: 15px;">&nbsp&nbsp&nbsp&nbsp&nbsp'.$row['questions'].'</label>
                                            </div>
                                            <span class="help-block">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspQuestion # '.$count.'</span>
                                        </div>
                                        <div class="col-md-2 col-xs-12">                                            
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="answer[]" placeholder="Type your answer" autocomplete="off">
                                            </div>                                            
                                            <span class="help-block">Answer #  '.$count.'</span>
                                        </div>
                                    </div>';
                                       }
                                    }
                                }elseif ($quizcat_code == 'MC') {
                                    $sqlquiz = "SELECT * FROM `tbl_quiz_mc` WHERE `quiz_id` =".$_GET['id'];
                                    $result = mysqli_query($conn, $sqlquiz);
                                    if (mysqli_num_rows($result) > 0) {
                                        $count = 0;

                                      while ($row = mysqli_fetch_array ($result)) {
                                        $count += 1;
                                        echo '<div class="block">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                        <input type="text" name="questions[]" value="'.$row['quest_id'].'" hidden>
                                                            <h3><span>No. '.$count.':</span> '.$row['question'].'</h3>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="radio">
                                                            <div class="col-md-3">
                                                            <label>
                                                            <input name="Radio'.$count.'" value="A" type="radio">
                                                                <b>A :</b> '.$row['mc_A'].'
                                                            </label>
                                                            </div>
                                                            <div class="col-md-3">
                                                            <label>
                                                            <input name="Radio'.$count.'" value="B" type="radio">
                                                                <b>B :</b> '.$row['mc_B'].'
                                                            </label>
                                                            </div>
                                                            <div class="col-md-3">
                                                            <label>
                                                            <input name="Radio'.$count.'" value="C" type="radio">
                                                                <b>C: </b> '.$row['mc_C'].'
                                                            </label>
                                                            </div>
                                                            <div class="col-md-3">
                                                            <label>
                                                            <input name="Radio'.$count.'"'.$count.' value="D" type="radio">
                                                                <b>D :</b> '.$row['mc_D'].'
                                                            </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>             
                                            </div>';
                                       }
                                    }
                                }

                                ?>
                                </div>
                                <div class="panel-footer">                               
                                    <?php
                                        if ($quizcat_code == 'TF') {
                                            echo '<button class="btn btn-primary pull-right" name="submit_quiz_TF" id="submit">Finish</button>';
                                        }elseif ($quizcat_code == 'ID') {
                                            echo '<button class="btn btn-primary pull-right" name="submit_quiz_ID" id="submit">Finish</button>';
                                        }elseif ($quizcat_code == 'MC') {
                                            echo '<button class="btn btn-primary pull-right" name="submit_quiz_MC" id="submit">Finish</button>';
                                        }
                                    ?>
                                </div>
                            </div>
                            </form>
                            
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
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>                
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>    
        <script type="text/javascript" src="js/demo_tables.js"></script> 
        <script type='text/javascript' src='js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='js/plugins/validationengine/jquery.validationEngine.js'></script>        

        <script type='text/javascript' src='js/plugins/jquery-validation/jquery.validate.js'></script>       
        <!-- END THIS PAGE PLUGINS-->        
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        <script type="text/javascript">
            var timelimit  = document.getElementById("timelimit").value
            document.getElementById('timer').innerHTML = timelimit + ":" + 00;
            startTimer();

            function startTimer()
            {
                var presentTime = document.getElementById('timer').innerHTML;
                var timeArray = presentTime.split(/[:]+/);
                var m = timeArray[0];
                var s = checkSecond((timeArray[1]-1));
                if (s==59) {m=m-1}
                    //if(m<0){alert('timer completed')}
                document.getElementById('timer').innerHTML = m + ":" + s;
                setTimeout(startTimer, 1000);
                // timer stop and call button click to submit answers.
                 if ("0:00" == m + ":" + s) {
                    alert('times Up');
                    document.getElementById("submit").click();
                    //window.location = "startquiz.php?id=<?php echo $_GET['id']?>";
                }

            }

            function checkSecond(sec)

            {
                if (sec < 10 && sec >= 0) {
                    sec = "0" + sec};
                    //add zero in front of numbers < 10
                    if (sec < 0) {          
                    sec = "59"};
                    return sec;
            }

            
           

            

        </script>
        
        <!-- END TEMPLATE -->  
    </body>
</html>