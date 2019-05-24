<?php
include 'include/header.php';
//Student Class Count
$sqlclasscount = "SELECT COUNT(`class_id`) as numclass FROM tbl_classmembers WHERE `member_id` = ".$_SESSION['member_id']." AND `verification` = 'Yes'";
$res = mysqli_query($conn, $sqlclasscount);
if (mysqli_num_rows($res) > 0) {
   while ($r = mysqli_fetch_assoc($res)) {
      $numclass = $r['numclass'];
   }
}
//teacher Class Count
$sqlTclasscount = "SELECT COUNT(`class_id`) as Tnumclass FROM tbl_class WHERE `class_adviser` = ".$_SESSION['member_id']." AND `class_status` = 'Active'";
$classresult = mysqli_query($conn, $sqlTclasscount);
if (mysqli_num_rows($classresult) > 0) {
   while ($class = mysqli_fetch_assoc($classresult)) {
      $Tnumclass = $class['Tnumclass'];
   }
}
?>
    <body>
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
                    <li class="active">Profile</li>
                </ul>
                <!-- END BREADCRUMB -->                                                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="row">
                        <div class="col-md-3">
                            
                            <div class="panel panel-default">
                                <div class="panel-body profile" style="background: url('assets/images/gallery/wall.jpg') center center no-repeat;">
                                    <div class="profile-image">
                                        <img src="assets/images/users/no-image.jpg" alt="<?php echo $member_fullname; ?>"/>
                                    </div>
                                    <div class="profile-data">
                                        <div class="profile-data-name"><?php echo $member_fullname; ?></div>
                                        <div class="profile-data-title" style="color: #FFF;">@<?php echo $member_username; ?></div>
                                    </div>
                                    <!-- <div class="profile-controls">
                                        <a href="#" class="profile-control-left twitter"><span class="fa fa-twitter"></span></a>
                                        <a href="#" class="profile-control-right facebook"><span class="fa fa-facebook"></span></a>
                                    </div>   -->                                  
                                </div>                               
                                <!-- <div class="panel-body">                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn btn-info btn-rounded btn-block"><span class="fa fa-check"></span> Following</button>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="message.php" class="btn btn-primary btn-rounded btn-block"><span class="fa fa-comments"></span> Chat</a>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="panel-body list-group border-bottom">
                                    <a href="#" class="list-group-item active"><span class="fa fa-bar-chart-o"></span> Activity</a>
                                    <a href="manage-class.php" class="list-group-item"><span class="fa fa-coffee"></span> Class <span class="badge badge-default">
                                    <?php if ($_SESSION['member_type'] == 'Student') { echo($numclass); }elseif ($_SESSION['member_type'] == 'Teacher') {
                                       echo($Tnumclass);
                                    }  ?></span></a>                                
                                   <!--  <a href="#" class="list-group-item"><span class="fa fa-users"></span> Friends <span class="badge badge-danger">+7</span></a> -->
                                    <!-- <a href="#" class="list-group-item"><span class="fa fa-folder"></span> Apps</a> -->
                                    <a href="profile-update.php" class="list-group-item"><span class="fa fa-cog"></span> Settings</a>
                                </div>
                                <!-- <div class="panel-body">
                                    <h4 class="text-title">Friends</h4>
                                    <div class="row">
                                        <div class="col-md-4 col-xs-4">
                                            <a href="#" class="friend">
                                                <img src="assets/images/users/user.jpg"/>
                                                <span>Dmitry Ivaniuk</span>
                                            </a>                                            
                                        </div>
                                    </div>
                                
                                    <h4 class="text-title">Photos</h4>
                                    <div class="gallery" id="links">                                                
                                        <a href="assets/images/gallery/music-1.jpg" title="Music Image 1" class="gallery-item" data-gallery>
                                            <div class="image">
                                                <img src="assets/images/gallery/music-1.jpg" alt="Music Image 1"/>
                                            </div>                                            
                                        </a>
                                                                                
                                    </div>
                                </div> -->
                            </div>                            
                            
                        </div>
                        
                        <div class="col-md-9">

                            <!-- START TIMELINE -->
                            <div class="timeline timeline-right">
                                
                                <!-- START TIMELINE ITEM -->
                                <div class="timeline-item timeline-main">
                                    <div class="timeline-date">Today</div>
                                </div>
                                <!-- END TIMELINE ITEM -->                                                  
                                
                                <!-- START TIMELINE ITEM -->
                                <div class="timeline-item timeline-item-right">
                                    <div class="timeline-item-info">21:37</div>
                                    <div class="timeline-item-icon"><span class="fa fa-users"></span></div>                                   
                                    <div class="timeline-item-content">
                                        <div class="timeline-heading" style="padding-bottom: 10px;">
                                            <img src="assets/images/users/no-image.jpg"/>
                                            <a href="#"><?php echo $member_fullname; ?></a> Joined KCC ERIS
                                        </div>                                        
                                        <div class="timeline-body comments">                                    
                                            <div class="comment-write">                                                
                                                <textarea class="form-control" placeholder="Write a comment" rows="1"></textarea>                                                
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>       
                                <!-- END TIMELINE ITEM -->
                            </div>
                            <!-- END TIMELINE -->                            
                            
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

        <!-- BLUEIMP GALLERY -->
        <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>      
        <!-- END BLUEIMP GALLERY -->        
        
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
        
        <script type="text/javascript" src="js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>        
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->

        <script>            
            document.getElementById('links').onclick = function (event) {
                event = event || window.event;
                var target = event.target || event.srcElement,
                    link = target.src ? target.parentNode : target,
                    options = {index: link, event: event,onclosed: function(){
                        setTimeout(function(){
                            $("body").css("overflow","");
                        },200);                        
                    }},
                    links = this.getElementsByTagName('a');
                blueimp.Gallery(links, options);
            };
        </script>      
        
    <!-- END SCRIPTS -->         
    </body>
</html>






