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
                <?php include 'module/counter-dashboard.php'; ?>
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">        
                    <li class="active"><a href="index.php"> Dashboard</a></li>
                </ul>
                <!-- END BREADCRUMB -->                       
               
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <!-- START WIDGETS -->
                    <div class="row">
                        <div class="col-md-3 col-xs-6" data-toggle="tooltip" data-placement="top" title="Class">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-item-icon" style="background: linear-gradient(to bottom, #f15453 0%, #691f1e 100%);"  onclick="location.href='manage-class.php';">
                                <div class="widget-item-right">
                                    <span class="fa fa-desktop"></span>
                                </div>                             
                                <div class="widget-data-left">
                                    <div class="widget-int num-count"><span class="fa fa-laptop"></span> <?php class_counter(); ?></div>
                                    <div class="widget-title">Manage Class</div>
                                    <div class="widget-subtitle">View Class</div>
                                </div>                                     
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
                        <div class="col-md-3 col-xs-6" data-toggle="tooltip" data-placement="top" title="Email">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-item-icon" style="background: linear-gradient(to bottom, #0f7fe0 0%, #094b85 100%);"  onclick="location.href='email-inbox.php';">
                                <div class="widget-item-right">
                                    <span class="fa fa-envelope"></span>
                                </div>                             
                                <div class="widget-data-left">
                                    <div class="widget-int num-count"><span class="fa fa-envelope-o"></span> <?php email_counter(); ?></div>
                                    <div class="widget-title">View Email</div>
                                    <div class="widget-subtitle">Access Mailbox</div>
                                </div>                                     
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
                        <div class="col-md-3 col-xs-6" data-toggle="tooltip" data-placement="top" title="Messenger">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-item-icon" style="background: linear-gradient(to bottom, #80c808 0%, #5c792b 100%);"  onclick="location.href='message.php';">
                                <div class="widget-item-right">
                                    <span class="fa fa-comments"></span>
                                </div>                             
                                <div class="widget-data-left">
                                    <div class="widget-int num-count"><span class="fa fa-inbox"></span> <?php message_counter(); ?></div>
                                    <div class="widget-title">Messenger</div>
                                    <div class="widget-subtitle">View Messages</div>
                                </div>                                     
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
                        <div class="col-md-3 col-xs-6" data-toggle="tooltip" data-placement="top" title="Profile">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-item-icon" style="background: linear-gradient(to bottom, #14ab95 0%, #084c42 100%);"  onclick="location.href='profile.php';">
                                <div class="widget-item-right">
                                    <span class="fa fa-user"></span>
                                </div>                             
                                <div class="widget-data-left">
                                    <div class="widget-int num-count"><span class="fa fa-user"></span></div>
                                    <div class="widget-title">Profile</div>
                                    <div class="widget-subtitle">Update / Post to your timeline</div>
                                </div>                                     
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-md-3 col-xs-6" data-toggle="tooltip" data-placement="top" title="Forum">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-item-icon" style="background: linear-gradient(to bottom, #15a91b 0%, #000000 100%);"  onclick="location.href='forum/';">
                                <div class="widget-item-right">
                                    <span class="fa fa-sitemap"></span>
                                </div>                             
                                <div class="widget-data-left">
                                    <div class="widget-int num-count"><span class="fa fa-sitemap"></span></div>
                                    <div class="widget-title">Forum</div>
                                    <div class="widget-subtitle">Join a forum</div>
                                </div>                                     
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
                                     
                        <!-- <div class="col-md-3 col-xs-6" data-toggle="tooltip" data-placement="top" title="Gallery">
                            
                           
                            <div class="widget widget-item-icon" style="background: linear-gradient(to bottom, #6b107b 0%, #380940 100%);"  onclick="location.href='gallery.php';">
                                <div class="widget-item-right">
                                    <span class="fa fa-camera-retro"></span>
                                </div>                             
                                <div class="widget-data-left">
                                    <div class="widget-int num-count"><span class="fa fa-picture-o"></span></div>
                                    <div class="widget-title">Gallery</div>
                                    <div class="widget-subtitle">Add Photos</div>
                                </div>                                     
                            </div>                            
                            
                            
                        </div> -->
                       
                        
                        <div class="col-md-3 col-xs-6" data-toggle="tooltip" data-placement="top" title="Calendar">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-item-icon" style="background: linear-gradient(to bottom, #385184 0%, #101215 100%);" onclick="location.href='calendar.php';">
                                <div class="widget-item-right">
                                    <span class="fa fa-calendar"></span>
                                </div>                             
                                <div class="widget-data-left">
                                    <div class="widget-int num-count"><span class="fa fa-calendar-o"></span></div>
                                    <div class="widget-title">Calendar</div>
                                    <div class="widget-subtitle">Add Event</div>
                                </div>                                     
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>

                        <div class="col-md-3 col-xs-6">
                            
                            <!-- START WIDGET CLOCK -->
                            <div class="widget widget-warning widget-padding-sm">
                                <div class="widget-big-int plugin-clock">00:00</div>                            
                                <div class="widget-subtitle plugin-date">Loading...</div>
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
                    <!-- END WIDGETS -->                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        <!-- MESSAGE BOX-->
        <?php include 'include/footer.php'; ?>
        <!-- END MESSAGE BOX-->
        <!-- default -->
        <div class="message-box animated fadeIn" id="message-box-default">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-trophy"></span> Welcome to <strong>KCC ERIS</strong></div>
                    <div class="mb-content">
                        <h6 style="color: #fff;">Thank you for joining KCC Educational Resource Information System.</h6 style="color: #fff;">
                        <h6 style="color: #fff;">Please update your Information to continue.</h6 style="color: #fff;">                 
                    </div>
                    <div class="mb-footer">
                        <a href="profile-update.php" class="btn btn-info btn-sm pull-right">Update Profile</a>
                        <button class="btn btn-default btn-sm mb-control-close">Close</button> 
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- end default -->
        <!-- default -->
        <div class="message-box animated fadeIn" id="message-box-default1">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-user"></span> Update <strong>Profile</strong></div>
                    <div class="mb-content">
                        <h6 style="color: #fff;">Please complete your profile information to disable this notification.</h6 style="color: #fff;">
                    </div>
                    <div class="mb-footer">
                        <a href="profile-update.php" class="btn btn-info btn-sm pull-right">Update Profile</a>
                        <button class="btn btn-default btn-sm mb-control-close">Close</button> 
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- end default -->
       

    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        
        <script type="text/javascript" src="js/demo_dashboard.js"></script>
        <!-- END TEMPLATE -->
        <script>

        function notify() {
            document.getElementById("notify").click();
        }
        </script>
        
    <!-- END SCRIPTS -->         
    </body>
</html>






