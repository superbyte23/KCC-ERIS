<?php
require 'include/header.php';
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
                    <li class="active">About Eris</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> About Eris</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <!-- Start About Eris Code Here!     -->
                            <h1>ERIS - Educational Resource Information System</h1>
                            <p><strong>Powered by: PHP and MYSQL Database</strong></p>
                            <p>Version 1.0 Rev. 10.29.2017</p>
                            <h4><strong>Kabankalan Catholic College </strong></h4><small> All Rights Resereved &copy 2017-2018</small>
                                                                   
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
        
        <script type="text/javascript" src="js/plugins/highlight/jquery.highlight-4.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        <script type="text/javascript" src="js/faq.js"></script>
        <!-- END TEMPLATE -->

    <!-- END SCRIPTS -->         
    </body>
</html>






