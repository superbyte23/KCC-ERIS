<?php
include 'include/header.php';
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
                <ul class="breadcrumb push-down-0">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Error 403</li>
                </ul>
                <!-- END BREADCRUMB -->                                                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">

                            <div class="error-container">
                                <div class="error-code">403</div>
                                <div class="error-text">Forbidden: Access Is Denied</div>
                                <div class="error-subtext">You don't have permission to view this directory or page.</div>
                                <div class="error-actions">                                
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn btn-info btn-block btn-lg" onClick="document.location.href = 'index.php';">Back to dashboard</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-primary btn-block btn-lg" onClick="history.back();">Previous page</button>
                                        </div>
                                    </div>                                
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
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->

    <!-- END SCRIPTS -->         
    </body>
</html>






