<?php
require 'include/header.php';
                include "include/connect.php";
                $sql = "UPDATE `tbl_conversation_reply` SET `status`= 'read' WHERE member_id_fk <> ".$_SESSION['member_id']." AND `c_id_fk` =".$_GET['id'];
                if (mysqli_query($conn, $sql)) {
                    
                }
?>

    <body id="load">
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
                    <li><a href="index.php">Dashboard</a></li>        
                    <li><a href="message.php" class="active">Messages</li>

                </ul>
                <!-- END BREADCRUMB -->
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <!-- START CONTENT FRAME -->
                <div class="content-frame">                                       
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">                        
                        <div class="page-title">                    
                            <h2><span class="fa fa-comments"></span> Messages</h2><!-- <a href="#" class="btn1">Slide UP</a><a href="#" class="btn2">Slide Down</a> -->
                        </div>                                                    
                        <div class="pull-right">
                            <button data-toggle="tab"  href="#new" class="btn btn-rounded btn-info active"><span class="fa fa-comment"></span>New Message</button>
                           <a class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></a>
                        </div>                           
                    </div>
                    <!-- END CONTENT FRAME TOP -->
                    
                    <!-- START CONTENT FRAME RIGHT -->
                    <div class="content-frame-left" >                        
                        <div class="list-group list-group-contacts border-bottom push-down-10 scroll" style="max-height: 460px;">
                          
                            <?php
                            $id = $_SESSION['member_id'];

                                $query= mysqli_query($conn, "SELECT DISTINCT U.member_id,U.member_fullname, C.c_id,U.member_username,U.member_email
                                        FROM tbl_members U, tbl_conversation C, tbl_conversation_reply R
                                        WHERE 
                                        CASE
                                        WHEN C.user_one = '$id'
                                        THEN C.user_two = U.member_id
                                        WHEN C.user_two = '$id'
                                        THEN C.user_one= U.member_id
                                        END
                                        AND
                                        C.c_id = R.c_id_fk
                                        AND
                                        (C.user_one = '$id' OR C.user_two ='$id') ORDER BY date_sent DESC") or die(mysqli_error());

                                while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                {
                                $c_id=$row['c_id'];
                                $user_id=$row['member_id'];
                                $username=$row['member_username'];
                                $fullname = $row['member_fullname'];
                                $email=$row['member_email'];

                                $cquery= mysqli_query($conn, "SELECT R.cr_id,R.member_id_fk,R.c_id_fk,R.time_sent,R.reply,R.status FROM tbl_conversation_reply R WHERE R.c_id_fk='$c_id' ORDER BY R.cr_id DESC LIMIT 1") or die(mysqli_error());


                                $crow=mysqli_fetch_array($cquery,MYSQLI_ASSOC);

                                $cr_id=$crow['cr_id'];
                                $reply=$crow['reply'];
                                $member_id_fk = $crow['member_id_fk'];
                                $time=$crow['time_sent'];
                                $status = $crow['status'];
                                $c_id = $crow['c_id_fk'];

                                // Count number of unread messages.
                                $sqlcount = "SELECT COUNT(`status`) as 'count' FROM tbl_conversation_reply R WHERE R.c_id_fk= '$c_id' AND status = 'unread'";
                                $countresult = mysqli_query($conn, $sqlcount);

                                if (mysqli_num_rows($countresult) > 0) {
                                    while($row = mysqli_fetch_assoc($countresult)) {
                                        $inboxcount = $row['count'];
                                    }
                                }
                                if ($c_id == $_GET['id']) {
                                    echo '<a href="read-message.php?id='.$c_id.'" class="list-group-item read active" data-index="'.$cr_id.'">                                
                                                    <div class="list-group-status status-online"></div>
                                                    <img src="assets/images/users/no-image.jpg" class="read pull-left">
                                                    <span class="contacts-title">'.ucwords($fullname).'</span>
                                                    
                                                    <p>'.$reply.'</p>
                                                </a>';
                                 }elseif ( $inboxcount <> 0 AND $member_id_fk <> $_SESSION['member_id'] ) {
                                   echo '<a href="read-message.php?id='.$c_id.'" class="list-group-item read" style="background-color: rgba(0, 226, 255, 0.4);" data-index="'.$cr_id.'">                                
                                                    <div class="list-group-status status-online"></div>
                                                    <img src="assets/images/users/no-image.jpg" class="read pull-left">
                                                    <span class="contacts-title">'.ucwords($fullname).'</span> <span class="label label-danger pull-right">'.$inboxcount.'</span>
                                                    <p>'.$reply.'</p>
                                                </a>';
                                }else{
                                    echo '<a href="read-message.php?id='.$c_id.'" class="list-group-item read" data-index="'.$cr_id.'">                                
                                                    <div class="list-group-status status-online"></div>
                                                    <img src="assets/images/users/no-image.jpg" class="read pull-left">
                                                    <span class="contacts-title">'.ucwords($fullname).'</span> <span class="label label-danger pull-right"></span>
                                                    <p>'.$reply.'</p>
                                                </a>';
                                }
                                 
                                

                                }
                                ?>             
                        </div>
                        
                        <!-- <div class="block">
                            <h4>Status</h4>
                            <div class="list-group list-group-simple">                                
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-success"></span> Online</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-warning"></span> Away</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-muted"></span> Offline</a>
                            </div>
                        </div> -->
                        
                    </div>
                    <!-- END CONTENT FRAME RIGHT -->
                
                    <!-- START CONTENT FRAME BODY -->
                    <div class="content-frame-body content-frame-body-right tab-content">                     
                        <div class="tab-content">
                            <div id="new" class="tab-pane fade in ">
                                <form method="POST" action="send-message.php">
                                    <div class="row">
                                        <div class="col-md-8">
                                        <div class="form-group">
                                        <div class="col-md-12 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-search"></span> Send to :</span>
                                                <input data-toggle="modal" data-target="#modal_no_footer" id="contactname" class="form-control" name="recipient" autocomplete="off" placeholder="Select Contact" type="text" required="">
                                                <input type="text" id="recipientID" hidden="" name="recipientID">
                                            </div>                                            
                                            <span class="help-block"></span>
                                        </div>
                                        </div>
                                        <!-- message content here -->
                                        <div class="form-group">
                                        <div class="col-md-12 col-xs-12">                                            
                                            <textarea class="form-control" rows="4" name="msgcontent" placeholder="Type your message here"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 col-xs-12"> 
                                                <button type="submit" name="btnsend" class="btn btn-lg btn-rounded btn-primary pull-right">
                                                    <span class="glyphicon glyphicon-send"></span>
                                                </button>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                                    
                                                                                                                    
                                    </div>
                                        
                                    </div>
                                    <div class="col-md-4">
                                        
                                        <!-- START WIDGET CLOCK -->
                                        <div class="widget widget-info widget-padding-sm">
                                            <div class="widget-big-int plugin-clock"></div>                            
                                            <div class="widget-subtitle plugin-date"></div>
                                            <div class="widget-controls">                                
                                                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                                            </div>                            
                                            <div class="widget-buttons widget-c3">
                                                <div class="col">
                                                    <a href="#"><span class="fa fa-clock-o"></span></a>
                                                </div>
                                                <div class="col">
                                                    <a href="#"><span class="fa fa-bell"></span></a>
                                                </div>
                                                <div class="col">
                                                    <a href="#"><span class="fa fa-calendar"></span></a>
                                                </div>
                                            </div>                            
                                        </div>                        
                                        <!-- END WIDGET CLOCK -->
                                    </div>
                                    </div>
                                </form>
                            </div> 
                            <div id="1" class="tab-pane fade in active">
                                <div class="messages messages-img" id="ecran" style='overflow:auto;height:450px;'>
                                <?php
                                    $query= mysqli_query($conn, "SELECT R.cr_id,R.time_sent,R.reply,U.member_id,U.member_fullname,U.member_username,U.member_email 
                                        FROM tbl_members U, tbl_conversation_reply R 
                                        WHERE R.member_id_fk=U.member_id and R.c_id_fk = ".$_GET['id']."
                                        ORDER BY R.cr_id ASC") or die(mysqli_error());

                                    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                    {
                                    $cr_id=$row['cr_id'];
                                    $time=$row['time_sent'];
                                    $reply=$row['reply'];
                                    $user_id=$row['member_id'];
                                    $username=$row['member_username'];
                                    $fullname = $row['member_fullname'];
                                    $email=$row['member_email'];

                                    if ($user_id == $_SESSION['member_id']) {
                                      echo '<div class="item in">
                                        <div class="image">
                                            <img src="assets/images/users/no-image.jpg">
                                        </div>
                                        <div class="text">
                                            <div class="heading">
                                                <a href="#">'.ucwords($fullname).'</a>
                                                <span class="date">'.$time.'</span>
                                            </div>
                                            '.$reply.'
                                        </div>
                                    </div>';
                                    }else{
                                        echo '<div class="item">
                                        <div class="image">
                                            <img src="assets/images/users/no-image.jpg">
                                        </div>
                                        <div class="text">
                                            <div class="heading">
                                                <a href="#">'.ucwords($fullname).'</a>
                                                <span class="date">'.$time.'</span>
                                            </div>
                                            '.$reply.'
                                        </div>
                                    </div>';
                                    }
                                   
                                //    echo '<div class="item item-visible">
                                //     <div class="text">
                                //         <div class="heading">
                                //             <a href="#">'.$username.'</a>
                                //             <span class="date">08:33</span>
                                //         </div>
                                //         '.$reply.'
                                //     </div>
                                // </div>';

                                    }
                                    ?>
                            </div>
                                <div class="panel panel-default push-up-10">
                                    <div class="panel-body panel-body-search">
                                         <form method="POST" action="send-reply.php?id=<?php echo $_GET['id'];?>">
                                            <div class="input-group">
                                            <!-- <div class="input-group-btn">
                                                <button class="btn btn-default"><span class="fa fa-camera"></span></button>
                                                <button class="btn btn-default"><span class="fa fa-chain"></span></button>
                                            </div> -->
                                            <input type="text" class="form-control" name="reply" placeholder="Your message..." autocomplete="off"/>
                                            <div class="input-group-btn">
                                                <button name="send" class="btn btn-default">Send</button>
                                            </div>
                                            
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <!-- END CONTENT FRAME BODY -->      
                </div>
                <!-- END PAGE CONTENT FRAME -->        
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
        <!--MODAL SEND MSG-->
        <div class="modal fade" id="modal_no_footer" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="defModalHead">Select Contact</h4>
                    </div>
                        <div class="modal-body">
                            <div class="row">
                            <?php
                                $sql = "SELECT *  FROM `tbl_members` WHERE `member_id` <> ".$_SESSION['member_id'];

                                        $results = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($results) > 0) {                                           
                                           while ($members = mysqli_fetch_assoc($results)) {
                                            
                                                echo '<div class="col-md-2 col-xs-2">
                                            <a data-toggle="tab" data-dismiss="modal" data-value="'.ucwords($members['member_fullname']).'" data-index="'.$members['member_id'].'" href="#new" class="friend">
                                                <img src="assets/images/users/no-image.jpg">
                                                <span><p style="font-size: 10px;">'.ucwords($members['member_fullname']).'</p></span>
                                                
                                              
                                            </a>                                            
                                        </div>';
                                           }
                                        }
                                    ?>                          
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--END MODAL SEND MSG-->
        <button type="button" id="sms" onClick="noty({text: 'Message Successfully Sent', layout: 'topRight', type: 'success'});" hidden=""></button>
        <button type="button" id="1sms" onClick="noty({text: 'Error Sending message', layout: 'topRight', type: 'warning'});" hidden=""></button>

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
        
        <script type="text/javascript" src="js/demo_tables.js"></script>
            <script type='text/javascript' src='js/plugins/noty/jquery.noty.js'></script>
            <script type='text/javascript' src='js/plugins/noty/layouts/topCenter.js'></script>
            <script type='text/javascript' src='js/plugins/noty/layouts/topLeft.js'></script>
            <script type='text/javascript' src='js/plugins/noty/layouts/topRight.js'></script>            
            
            <script type='text/javascript' src='js/plugins/noty/themes/default.js'></script>

        <!-- END THIS PAGE PLUGINS-->  
        
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        <script type='text/javascript'>
        var height = 0;
        $('#ecran').each(function(i, value){
            height += parseInt($(this).height());
        });

        height += '';

        $('#ecran').animate({scrollTop: height});
        </script>
                <script>
                  $(document).ready(function(){ 
                  $(".friend").click(function(){
                    var selected = $(this).data('index');
                    var contact = $(this).data('value');
                     $("#recipientID").val(selected);
                     $('#contactname').val(contact)

                  });
                  });
                </script>
                <script>
                $(document).ready(function(){
                    $(".btn1").click(function(){
                        $(".item").mCustomScrollbar();
                    });
                    $(".btn2").click(function(){
                        $(".item").mCustomScrollbar();
                    });
                });
                </script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->                 
    </body>
</html>






