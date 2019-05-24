<?php
include 'include/header.php';
include 'email-module.php';

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
                <ul class="breadcrumb push-down-0">
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="#">Mailbox</a></li>
                    <li class="active">Inbox</li>
                </ul>
                <!-- END BREADCRUMB -->                
                                
                <!-- START CONTENT FRAME -->
                <div class="content-frame">                                    
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">                        
                        <div class="page-title">                    
                            <h2><span class="fa fa-inbox"></span> Inbox <!--<small>(3 unread)</small>--></h2>
                        </div>                                                                                
                        
                        <div class="pull-right">                            
                            <button class="btn btn-default"><span class="fa fa-cogs"></span> Settings</button>
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
                        </div>
                        <!-- <div class="block">
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
                                <label class="check mail-checkall">
                                    <input type="checkbox" class="icheckbox"/>
                                </label>
                                <div class="btn-group">
                                    <button class="btn btn-default"><span class="fa fa-mail-reply"></span></button>
                                    <button class="btn btn-default"><span class="fa fa-mail-reply-all"></span></button>
                                    <button class="btn btn-default"><span class="fa fa-mail-forward"></span></button>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-default"><span class="fa fa-star"></span></button>                                    
                                    <button class="btn btn-default"><span class="fa fa-flag"></span></button>
                                </div>                                
                                <button class="btn btn-default"><span class="fa fa-warning"></span></button>
                                <button class="btn btn-default"><span class="fa fa-trash-o"></span></button>                                                                    
                                <div class="pull-right" style="width: 150px;">
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
                                        <input class="form-control datepicker" type="text" data-orientation="left"/>                                    
                                    </div>
                                </div>
                            </div>

                            <div class="panel-body mail">
                                
                                <?php require 'include/connect.php';

                                $sql = "SELECT  * FROM emails WHERE  `receiver_email` = '$member_email' ORDER BY `date_sent` DESC, `time_sent` DESC";

                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result)) {
                                   while ($row=mysqli_fetch_assoc($result)) {

                                    if ($row['status'] == 'unread') {
                                       echo('<div class="mail-item mail-unread mail-info">                                    
                                    <div class="mail-checkbox">
                                        <input type="checkbox" class="icheckbox"/>
                                    </div>
                                    <div class="mail-star">
                                        <span class="fa fa-star-o"></span>
                                    </div>
                                    <div class="mail-user" style="width: 30%;">'.$row['sender_email'].'</div>                                    
                                    <a href="email-message.php?id='.$row['email_id'].'" class="mail-text">'.$row['subject'].'</a>                                    
                                    <div class="mail-date">'.$row['date_sent'].', '.$row['time_sent'].'</div>
                                </div>');
                                    }else{
                                        echo('<div class="mail-item mail-success">                                    
                                    <div class="mail-checkbox">
                                        <input type="checkbox" class="icheckbox"/>
                                    </div>
                                    <div class="mail-star">
                                        <span class="fa fa-star-o"></span>
                                    </div>
                                    <div class="mail-user" style="width: 30%;">'.$row['sender_email'].'</div>                                    
                                    <a href="email-message.php?id='.$row['email_id'].'" class="mail-text">'.$row['subject'].'</a>                                    
                                    <div class="mail-date">'.$row['date_sent'].', '.$row['time_sent'].'</div>
                                </div>');
                                    }
                                       
                                   }
                                    
                                }

                                ?>                           
                                
                            </div>

                            <div class="panel-footer">                                
                                <div class="btn-group">
                                    <button class="btn btn-default"><span class="fa fa-mail-reply"></span></button>
                                    <button class="btn btn-default"><span class="fa fa-mail-reply-all"></span></button>
                                    <button class="btn btn-default"><span class="fa fa-mail-forward"></span></button>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-default"><span class="fa fa-star"></span></button>                                    
                                    <button class="btn btn-default"><span class="fa fa-flag"></span></button>
                                </div>
                                
                                <button class="btn btn-default"><span class="fa fa-warning"></span></button>
                                <button class="btn btn-default"><span class="fa fa-trash-o"></span></button>                                    
                                
                                <ul class="pagination pagination-sm pull-right">
                                    <li class="disabled"><a href="#">«</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>                                    
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>                            
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
        
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>     
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>






