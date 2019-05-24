<?php
include 'include/header.php';
include 'email-module.php';

                include "include/connect.php";
                $sql = "UPDATE `emails` SET `status`= 'read' WHERE `email_id` =".$_GET['id'];
                if (mysqli_query($conn, $sql)) {
                    
                }
?> 
  
            
            <?php
            include 'include/sidebar.php';
            ?>
            
            
            <!-- PAGE CONTENT -->
            <div class="page-content page-navigation-toggled">
                
                <?php
                        include 'include/topbar.php';
                        ?>                 
                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="#">Mailbox</a></li>
                    <li class="active">Message</li>
                </ul>
                <!-- END BREADCRUMB -->                
                <?php
                require_once "include/connect.php";
                $sql = "SELECT mem.`member_fullname`, em.*  FROM emails em LEFT JOIN tbl_members mem ON em.`sender_email` = mem.`member_email` WHERE  em.`email_id` = ".$_GET['id'];
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $sendername = $row['member_fullname'];
                        $from = $row['sender_email'];
                        $to = $row['receiver_email'];
                        $subject = $row['subject'];
                        $content = $row['content'];
                        $date = $row['date_sent'];
                        $time = $row['time_sent'];
                    }
                }
                ?>
                <!-- START CONTENT FRAME -->
                <div class="content-frame">                                    
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">                        
                        <div class="page-title">                    
                            <h2><span class="fa fa-file-text"></span> Message</h2>
                        </div>                                                                                
                        
                        <div class="pull-right">                                                                                    
                            <button class="btn btn-default"><span class="fa fa-print"></span> Print</button>
                            <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
                        </div>                        
                    </div>
                    <!-- END CONTENT FRAME TOP -->
                    
                    <!-- START CONTENT FRAME LEFT -->
                    <div class="content-frame-left">
                        <div class="block">
                            <a href="email-compose.php" class="btn btn-danger btn-block btn-lg"><span class="fa fa-edit"></span> COMPOSE</a>
                        </div>
                        <div class="block">
                            <?php emailnav();?>                           
                        </div><!-- 
                        <div class="block">
                            <h4>Labels</h4>
                            <div class="list-group list-group-simple">                                
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-success"></span> Clients</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-warning"></span> Social</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-danger"></span> Work</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-info"></span> Family</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-primary"></span> Friends</a>
                            </div>
                        </div> -->
                    </div>
                    <!-- END CONTENT FRAME LEFT -->
                    
                    <!-- START CONTENT FRAME BODY -->
                    <div class="content-frame-body">
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <img src="assets/images/users/no-image.jpg" class="panel-title-image" alt="John Doe"/>
                                    <h3 class="panel-title"><?php echo $sendername.' <small>'. $from; ?></sma   ll></h3>
                                </div>
                                <div class="pull-right">
                                    <button class="btn btn-default"><span class="fa fa-mail-reply"></span></button>
                                    <button class="btn btn-default"><span class="fa fa-warning"></span></button>
                                    <button class="btn btn-default"><span class="fa fa-trash-o"></span></button>                                    
                                </div>
                            </div>
                            <form method="POST" action="email-reply.php?id=<?php echo $_GET['id'];?>">
                            <div class="panel-body">
                                <h3>Re: <?php echo $subject; ?> <small class="pull-right text-muted"><span class="fa fa-clock-o"></span>
                                <?php $date=date_create(date($date));
                                echo date_format($date,"l,  M d, Y "). $time; ?> </small></h3>

                                <h5><?php echo $content; ?></h5>   
                                    
                                    <?php 
                                    $ersql = "SELECT mem.member_fullname, mem.member_username, ER.* FROM `emails_reply` ER 
                                    LEFT JOIN tbl_members mem ON ER.`sender_email` = mem.member_email 
                                    WHERE ER.`email_id` =".$_GET['id']." ORDER BY ER.date_sent ASC, ER.time_sent ASC ";
                                    $r = mysqli_query($conn, $ersql);
                                    if (mysqli_num_rows($r)) {
                                       while ($reply = mysqli_fetch_array($r)) {
                                            $rfrom = $reply['member_fullname'];
                                            $remail = $reply['sender_email'];
                                            $rcontent = $reply['content'];
                                            $rdate = $reply['date_sent'];
                                            $rtime = $reply['time_sent'];

                                            
                                           echo '<div class="panel-body">
                                                <hr>
                                                <h4><strong>Reply from :</strong> '.$rfrom.' | <small>' .$remail .'</small> <small class="pull-right text-muted"><span class="fa fa-clock-o"></span>
                                                '. $rdate . $time.'</small></h4>
                                                <h5>'.$rcontent.'</h5>
                                                </div>';
                                       }
                                    }

                                    ?>
                                    
                                     

                                <div class="form-group push-up-20">
                                    <label>Quick Reply</label>
                                    <textarea  class="form-control summernote_lite" name="replycontent" rows="3" placeholder="Type your reply"></textarea>
                                </div>
                            </div>
                            
                            <!-- 
                            <div class="panel-body panel-body-table">
                                <h6>Attachments</h6>
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th width="50">type</th><th>name</th><th width="100">size</th>
                                    </tr>
                                    <tr>
                                        <td><span class="label label-primary">HTML</span></td><td><a href="#">index.html</a></td><td>54 Kb</td>
                                    </tr>
                                    <tr>
                                        <td><span class="label label-success">CSS</span></td><td><a href="#">stylesheet.css</a></td><td>15 Kb</td>
                                    </tr>                                    
                                    <tr>
                                        <td><span class="label label-danger">JS</span></td><td><a href="#">actions.js</a></td><td>3 Kb</td>
                                    </tr>                                    
                                </table>
                            </div> -->
                            <div class="panel-footer">
                                <button name="emailreply" class="btn btn-success pull-right"><span class="fa fa-mail-reply"></span> Post Reply</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- END CONTENT FRAME BODY -->
                </div>
                <!-- END CONTENT FRAME -->                    
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
        
        <script type="text/javascript" src="js/plugins/summernote/summernote.js"></script>    
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>






