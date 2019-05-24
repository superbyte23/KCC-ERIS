<?php
include 'include/header.php';
include 'class-module.php';
?>
<?php
    if (isset($_POST['TF'])) {
    $classid = $_GET['id'];
    $quiztitle = $_POST['quizname'];
    $quizcat = $_POST['quizcat'];
    $quiz_author = $_SESSION['member_id'];
    $quizrules = $_POST['quizrules'];
    $quiztimelimit = $_POST['timelimit'];
    $quizdeadline = $_POST['quizdeadline'];
    $quizdeadlinetime = $_POST['quizdeadlinetime'];
    $quest = $_POST['questions'];
    $answer = $_POST['answer'];

    $quizcatquery = mysqli_query($conn, "SELECT * FROM `quiz_category` WHERE quizcat_id =".$quizcat."");
    if (mysqli_num_rows($quizcatquery)>0) {
        while ($qrow = mysqli_fetch_assoc($quizcatquery)) {
            $quizcatname = $qrow['quizcat_name'];
        }
    }


        $sqlquiz = "INSERT INTO `tbl_quiz`(`class_id`, `quiz_name`,`quiz_instruction`, `quiz_cat`,`quiz_time_limit`, `quiz_author`, `quiz_created`, `quiz_deadline`)
                    VALUES ('$classid','$quiztitle','$quizrules','$quizcat','$quiztimelimit','$quiz_author',DATE_FORMAT(NOW(),'%Y-%m-%d'),CONCAT('$quizdeadline',' ','$quizdeadlinetime'))";
       
            if (mysqli_query($conn, $sqlquiz)) {
                $last_id = mysqli_insert_id($conn);
                $sql = array();
                    foreach ($quest as $key => $val) {
                        $sql[] = '('.$last_id.', "'.$val.'", "'.$answer[$key].'")';
                    }
                    $res = mysqli_query($conn,'INSERT INTO `tblquiz_questions`( `quiz_id`,`questions`, `answer` ) VALUES '.implode(',', $sql));
                    if (!$res) {
                        die(mysqli_errno());
                    }else{
                        $sqladdpost = ("INSERT INTO `tbl_classpost`(`class_id`, `user_id`, `post_content`,`post_date`, `post_time`)
                        VALUES ('$classid','$quiz_author',
                        '<label>Added New Quiz</label>
                        <p>Quiz Title  : <strong>".$quiztitle."</strong></p>
                        <p>Quiz Catgory: <strong>".$quizcatname."</strong></p>
                        <p>Quiz Deadline: <strong>".$quizdeadline." - ".$quizdeadlinetime."</strong></p>
                        <a href=".'"'."startquiz.php?id=$last_id".'"'." class=".'"'."btn btn-info active btn-lg".'"'.">Start Quiz Now</a>',
                        DATE_FORMAT(NOW(),'%m/%d/%Y'), DATE_FORMAT(CURTIME(),'%h:%i %p'))");
                          if (mysqli_query($conn, $sqladdpost)) {
                            header('location: class-quiz.php?id='.$classid);
                          } 
                    }
            }   
    
    }elseif (isset($_POST['ID'])) {
    $classid = $_GET['id'];
    $quiztitle = $_POST['quizname'];
    $quizcat = $_POST['quizcat'];
    $quiz_author = $_SESSION['member_id'];
    $quizrules = $_POST['quizrules'];
    $quiztimelimit = $_POST['timelimit'];
    $quizdeadline = $_POST['quizdeadline'];
    $quizdeadlinetime = $_POST['quizdeadlinetime'];
    $quest = $_POST['questions'];
    $answer = $_POST['answer'];

    $quizcatquery = mysqli_query($conn, "SELECT * FROM `quiz_category` WHERE quizcat_id =".$quizcat."");
    if (mysqli_num_rows($quizcatquery)>0) {
        while ($qrow = mysqli_fetch_assoc($quizcatquery)) {
            $quizcatname = $qrow['quizcat_name'];
        }
    }

    $sqlquiz = "INSERT INTO `tbl_quiz`(`class_id`, `quiz_name`,`quiz_instruction`, `quiz_cat`,`quiz_time_limit`, `quiz_author`, `quiz_created`, `quiz_deadline`)
                VALUES ('$classid','$quiztitle','$quizrules','$quizcat','$quiztimelimit','$quiz_author',DATE_FORMAT(NOW(),'%Y-%m-%d'),CONCAT('$quizdeadline',' ','$quizdeadlinetime'))";
   

        if (mysqli_query($conn, $sqlquiz)) {
            $last_id = mysqli_insert_id($conn);
            $sql = array();
                foreach ($quest as $key => $val) {
                    $sql[] = '('.$last_id.', "'.$val.'", "'.$answer[$key].'")';
                }
                $res = mysqli_query($conn,'INSERT INTO `tbl_quiz_identification`( `quiz_id`,`questions`, `answer` ) VALUES '.implode(',', $sql));
                if (!$res) {
                    mysqli_errno($conn);
                }else{
                    $sqladdpost = ("INSERT INTO `tbl_classpost`(`class_id`, `user_id`, `post_content`,`post_date`, `post_time`)
                    VALUES ('$classid','$quiz_author',
                    '<label>Added New Quiz</label>
                    <p>Quiz Title  : <strong>".$quiztitle."</strong></p>
                    <p>Quiz Catgory: <strong>".$quizcatname."</strong></p>
                    <p>Quiz Deadline: <strong>".$quizdeadline." - ".$quizdeadlinetime."</strong></p>
                    <a href=".'"'."startquiz.php?id=$last_id".'"'." class=".'"'."btn btn-info active btn-lg".'"'.">Start Quiz Now</a>',
                    DATE_FORMAT(NOW(),'%m/%d/%Y'), DATE_FORMAT(CURTIME(),'%h:%i %p'))");
                      if (mysqli_query($conn, $sqladdpost)) {
                        header('location: class-quiz.php?id='.$classid);
                      } 
                }
        }   
    
     }elseif (isset($_POST['MC'])) {
    
    $classid = $_GET['id'];
    $quiztitle = $_POST['quizname'];
    $quizcat = $_POST['quizcat'];
    $quiz_author = $_SESSION['member_id'];
    $quizrules = $_POST['quizrules'];
    $quiztimelimit = $_POST['timelimit'];
    $quizdeadline = $_POST['quizdeadline'];
    $quizdeadlinetime = $_POST['quizdeadlinetime'];

    $choiceA = $_POST['choiceA'];
    $choiceB = $_POST['choiceB'];
    $choiceC = $_POST['choiceC'];
    $choiceD = $_POST['choiceD'];

    $quest = $_POST['questions'];
    $answer = $_POST['answer'];

    $quizcatquery = mysqli_query($conn, "SELECT * FROM `quiz_category` WHERE quizcat_id =".$quizcat."");
    if (mysqli_num_rows($quizcatquery)>0) {
        while ($qrow = mysqli_fetch_assoc($quizcatquery)) {
            $quizcatname = $qrow['quizcat_name'];
        }
    }

    $sqlquiz = "INSERT INTO `tbl_quiz`(`class_id`, `quiz_name`,`quiz_instruction`, `quiz_cat`,`quiz_time_limit`, `quiz_author`, `quiz_created`, `quiz_deadline`)
                VALUES ('$classid','$quiztitle','$quizrules','$quizcat','$quiztimelimit','$quiz_author',DATE_FORMAT(NOW(),'%Y-%m-%d'),CONCAT('$quizdeadline',' ','$quizdeadlinetime'))";
   

        if (mysqli_query($conn, $sqlquiz)) {
            $last_id = mysqli_insert_id($conn);
                $sql = array();
                foreach ($quest as $key => $val) {
                    $sql[] = '('.$last_id.',"'.$val.'","'.$choiceA[$key].'","'.$choiceB[$key].'","'.$choiceC[$key].'","'.$choiceD[$key].'","'.$answer[$key].'")';
                }

                $res = mysqli_query($conn,'INSERT INTO `tbl_quiz_mc`( `quiz_id`, `question`, `mc_A`, `mc_B`, `mc_C`, `mc_D`, `answer` ) VALUES '.implode(',', $sql));
                if (!$res) {
                    mysqli_errno($conn);
                }else{
                    $sqladdpost = ("INSERT INTO `tbl_classpost`(`class_id`, `user_id`, `post_content`,`post_date`, `post_time`)
                    VALUES ('$classid','$quiz_author',
                    '<label>Added New Quiz</label>
                    <p>Quiz Title  : <strong>".$quiztitle."</strong></p>
                    <p>Quiz Category: <strong>".$quizcatname."</strong></p>
                    <p>Quiz Deadline: <strong>".$quizdeadline." - ".$quizdeadlinetime."</strong></p>
                    <a href=".'"'."startquiz.php?id=$last_id".'"'." class=".'"'."btn btn-info active btn-lg".'"'.">Start Quiz Now</a>',
                    DATE_FORMAT(NOW(),'%m/%d/%Y'), DATE_FORMAT(CURTIME(),'%h:%i %p'))");
                      if (mysqli_query($conn, $sqladdpost)) {
                        header('location: class-quiz.php?id='.$classid);
                      } 
                }
        }   
    
     }
?>
    <body onload="hideall();">
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
                    <li><a href="#" onclick="history.back();"><?php echo $classname; ?></a></li>
                    <li class="active">Create Quiz</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- Start PAGE CONTENT WRAP -->
                <div class="page-content-wrap">
                    <form role="form" method="POST" action="">
                    <div class="row">
                        <div class="form-horizontal">
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Quiz Title</label>
                                    <div class="col-md-10">                                            
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="quizname" id="quizname" required="" placeholder="Enter title here....">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Quiz Rules & Instruction</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" wrap="" rows="2" style="resize: none;" placeholder="Type quiz rules and intructions here..." name="quizrules"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Quiz Category</label>
                                    <div class="col-md-10">                                            
                                        <select class="form-control" name="quizcat" id="quizcat" required="">
                                            <option onclick="hideall1()"" value="">Select Category</option>
                                            
                                            <?php
                                                // Count number of unread messages.
                                                $sqlcourse = "SELECT * FROM `quiz_category`";
                                                $result = mysqli_query($conn, $sqlcourse);

                                                if (mysqli_num_rows($result) > 0) {
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="'.$row['quizcat_id'].'" myTag="'.$row['quizcat_code'].'">'.$row['quizcat_name'].'</option>';
                                                    }
                                                }
                                            ?>   
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-md-2 control-label">Quiz Deadline</label>
                                        <div class="col-md-5 col-xs-12">
                                            <div class="input-group">
                                                <input class="form-control datetimepicker" name="quizdeadline" id="quizdeadline" type="text" placeholder="YYYY-mm-dd" required="">
                                                <span class="input-group-addon add-on"><span class="fa fa-calendar"></span></span>

                                            </div>

                                        </div>
                                        <div class="col-md-5 col-xs-12">
                                            <div class="input-group">
                                                <input class="form-control timepicker" name="quizdeadlinetime" id="quizdeadlinetime" type="text" required="">
                                                <span class="input-group-addon add-on"><span class="fa fa-clock-o"></span></span>
                                            </div>

                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Quiz Time Limit</label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="Enter limit by minutes"  name="timelimit" required="">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="margin-top: 10px;">
                            <div class="panel panel-default panel-hidden-controls">
                                <div class="panel-heading ui-draggable-handle">
                                    <h3 class="panel-title"><strong>Questions</strong></h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span> Refresh</a></li>
                                            </ul>                                        
                                        </li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div id="TF">
                                        <div class="panel-body">
                                             <div class="col-md-12">
                                                <div class="block">
                                                    <h4>TRUE OR FALSE</h4>
                                                        <div id="container_TF">
                                                        </div>
                                                </div>
                                            </div>
                                            <!-- END COL 12 -->
                                        </div>
                                        <!--   END PANEL BODY  -->
                                        <div class="panel-footer">
                                                <a id="add_field_TF" class="col md-6 btn btn-info btn-lg active"><b>ADD QUESTION</b></a>
                                                <button type="submit" class="col md-6 btn btn-success btn-lg active" name="TF"><b>DONE</b></button>
                                        </div>
                                </div>
                                <div id="ID">
                                        <div class="panel-body">
                                             <div class="col-md-12">
                                                <div class="block">
                                                    <h4>IDENTIFICATION</h4>
                                                        <div id="container_ID">
                                                        </div>
                                                </div>
                                            </div>
                                            <!-- END COL 12 -->
                                        </div>
                                        <!--   END PANEL BODY  -->
                                        <div class="panel-footer">
                                                <a id="add_field_ID" class="col md-6 btn btn-info btn-lg active"><b>ADD QUESTION</b></a>
                                                <button type="submit" class="col md-6 btn btn-success btn-lg active" name="ID"><b>DONE</b></button>
                                        </div>
                                </div>
                                <div id="MC">
                                        <div class="panel-body">
                                             <div class="col-md-12">
                                                <div class="block">
                                                    <h4>MULTIPLE CHOICE</h4>
                                                        <div id="container_MC">
                                                        </div>
                                                </div>
                                            </div>
                                            <!-- END COL 12 -->
                                        </div>
                                        <!--   END PANEL BODY  -->
                                        <div class="panel-footer">
                                                <a id="add_field_MC" class="col md-6 btn btn-info btn-lg active"><b>ADD QUESTION</b></a>
                                                <button type="submit" class="col md-6 btn btn-success btn-lg active" name="MC"><b>DONE</b></button>
                                        </div>
                                </div>
                            </div>
                          <!--   END PANEL DEFAULT -->
                        </div>
                       <!--  END COL MD 12 -->
                    </div>
                    <!-- END ROW -->
                    </form>
                </div>
                <!-- END PAGE CONTENT WRAP -->
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
        <script>
            $('#quizdeadline').datepicker({
                startDate: new Date()
            });
            $('#quizdeadlinetime').timepicker({
                
            });
        </script>                
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>     
        <!-- END THIS PAGE PLUGINS-->
<script>
    $(function() {
        $("#quizcat").change(function(){ 
            var option = $('option:selected', this).attr('mytag');
                if (option == "ID") {
                    $("#ID").fadeIn("fast");
                    $("#MC").hide();
                    $("#TF").hide();
                }else if(option == "TF"){
                    $("#TF").fadeIn("fast");
                    $("#ID").hide();
                    $("#MC").hide();
                }else if (option == "MC"){
                    $("#MC").fadeIn("fast");
                    $("#TF").hide();
                    $("#ID").hide();
                }else{
                    $("#ID").hide();
                    $("#MC").hide();
                    $("#TF").hide();
                }
                }); 
            }); 
    function hideall(){
        $("#ID").hide();
        $("#MC").hide();
        $("#TF").hide();
    }
</script>        
<script type="text/javascript">
    var counter_ID = 0;
    var counter_TF = 0;
    var counter_MC = 0;
    
    $(function(){
     $('a#add_field_TF').click(function(){

     counter_TF += 1;
     $('#container_TF').append(
        '<div class="form-group">'
        + '<div class="row">'
        + '<div class="col-md-10 col-xs-12">'
        +    '<div class="input-group">'
        +       '<span class="input-group-addon"><b>No. '+ counter_TF +'</b></span>'
        +       '<input type="text" class="form-control" name="questions[]"  placeholder="Question">'
        +    '</div>'
        + '</div>'
        +  '<div class="col-md-2 col-xs-6">'
        +     '<select class="form-control select" name="answer[]" required="">'
        +    '<option value="">Select Answer</option>'
        +    '<option value="TRUE">TRUE</option>'
        +    '<option value="FALSE">FALSE</option>'
        +  '</select>'
        +  '</div>'
        +  '</div>' 
        +'</div>' );
     });

    });
    $(function(){

     $('a#add_field_ID').click(function(){

     counter_ID += 1;

     $('#container_ID').append(

        '<div class="form-group">'
        + '<div class="row">'
        + '<div class="col-md-10 col-xs-12">'
        +    '<div class="input-group">'
        +       '<span class="input-group-addon"><b># '+ counter_ID +'</b></span>'
        +       '<input type="text" class="form-control" name="questions[]" placeholder="Question">'
        +    '</div>'
        + '</div>'
        +  '<div class="col-md-2 col-xs-6">'
        +        '<div class="input-group">'
        +            '<input type="text" class="form-control" name="answer[]" placeholder="Answer">'
        +    '</div>'
        +  '</div>'
        +  '</div>' 
        +'</div>' );
     });

    });
    $(function(){

     $('a#add_field_MC').click(function(){

     counter_MC += 1;

     $('#container_MC').append(
                                                    '<div class="form-group">'
                                                        + '<div class="row">'
                                                        + '<div class="col-md-12 col-xs-12">'
                                                                + '<div class="input-group">'
                                                                    + '<span class="input-group-addon"><b>No. '+ counter_MC +'</b></span>'
                                                                    + '<input class="form-control" name="questions[]" placeholder="Question" type="text">'
                                                                + '</div>'
                                                        + '</div>'
                                                        + '</div>'
                                                    + '</div>'
                                                    + '<div class="form-group">'
                                                        + '<div class="row">'
                                                            + '<div class="col-md-2 col-xs-12">'
                                                                + '<div class="input-group">'
                                                                    + '<span class="input-group-addon"><b>A</b></span>'
                                                                    + '<input type="text" class="form-control" name="choiceA[]" placeholder="Answer" required="">'
                                                               + ' </div>'
                                                            + '</div>'
                                                            + '<div class="col-md-2 col-xs-12">'
                                                                + '<div class="input-group">'
                                                                    + '<span class="input-group-addon"><b>B</b></span>'
                                                                    + '<input type="text" class="form-control" name="choiceB[]" placeholder="Answer" required="">'
                                                                + '</div>'
                                                            + '</div>'
                                                            + '<div class="col-md-2 col-xs-12">'
                                                                + '<div class="input-group">'
                                                                    + '<span class="input-group-addon"><b>C</b></span>'
                                                                    + '<input type="text" class="form-control" name="choiceC[]" placeholder="Answer" required="">'
                                                                + '</div>'
                                                            + '</div>'
                                                            + '<div class="col-md-2 col-xs-12">'
                                                                + '<div class="input-group">'
                                                                    + '<span class="input-group-addon"><b>D</b></span>'
                                                                    + '<input type="text" class="form-control" name="choiceD[]" placeholder="Answer" required="">'
                                                                + '</div>'
                                                            + '</div>'
                                                            + '<div class="col-md-4 col-xs-12">'
                                                                + '<div class="form-group">'
                                                                    + '<label class="col-md-4 col-xs-4 control-label">Correct Answer</label>'
                                                                    + '<div class="col-md-8 col-xs-8">  '                                      
                                                                        + '<select class="form-control" name="answer[]" required="">'
                                                                            + '<option value="">Choose the correct Answer</option>'
                                                                            + '<option value="A">A</option>'
                                                                            + '<option value="B">B</option>'
                                                                            + '<option value="C">C</option>'
                                                                            + '<option value="D">D</option>'
                                                                        + '</select>'
                                                                    + '</div>'
                                                                + '</div>'
                                                            + '</div>'
                                                        + '</div>'
                                                    + '</div>' );
     });

    });
    </script>
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        
        <!-- END TEMPLATE -->   
    
    <!-- END SCRIPTS -->         
    </body>
</html>