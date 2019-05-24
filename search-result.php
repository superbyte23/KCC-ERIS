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
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Search</li>
                </ul>
                <!-- END BREADCRUMB -->
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START SEARCH -->                            
                            <div class="panel panel-default">
                                <div class="panel-body">                                    
                                    <div class="row stacked">
                                        <div class="col-md-12">
                                            <form>
                                            <div class="input-group push-down-10">
                                                <span class="input-group-addon"><span class="fa fa-search"></span></span>
                                                <input class="form-control" placeholder="Search..." name="Search" id="Search" minlength="3" required="" type="text">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-primary">Search</button>
                                                </div>
                                            </div>
                                            </form>
                            <!-- END SEARCH -->
                            
                            <!-- START SEARCH RESULT -->
                            
                                <?PHP 
                                $search = $_GET['Search'];
                        
                                $Result = MYSQLI_QUERY($conn, "SELECT * FROM tbl_class 
                                WHERE `class_id` LIKE '%$search%' 
                                OR `class_name` LIKE '%$search%' 
                                OR `subject_name` LIKE '%$search%' 
                                OR `class_days` LIKE '%$search%' 
                                OR `class_start` LIKE '%$search%' 
                                OR `class_end` LIKE '%$search%' 
                                OR `class_room` LIKE '%$search%' 
                                OR `class_tags` LIKE '%$search%' 
                                OR `class_tags` LIKE '%$search%' 
                                OR `class_adviser` LIKE '%$search%' 
                                OR `class_dateCreate` LIKE '%$search%' 
                                OR `class_status` LIKE '%$search%'");
                                $count = MYSQLI_NUM_ROWS($Result);
                                ?>
                                <span class="line-height-30">Search Results for <strong><?php echo $search; ?></strong> (<?php if ($count <= 1) { echo $count.' result'; }elseif($count > 1){echo $count.' results';} ?>)</span>
                                                </div>
                                            </div>
                                        </div>                                                                
                                    </div>
                                <div class="search-results">

                                <?php
                                if (MYSQLI_NUM_ROWS($Result)>0) {
                                while ($srow = mysqli_fetch_assoc($Result)) {

                                   echo '<div class="sr-item">
                                    <a href="class.php?id='.$srow['class_id'].'" class="sr-item-title" style="color: #404cd7;">'.$srow['class_name'].' - '.$srow['subject_name'].'</a>
                                    <div class="sr-item-link">http://www.kcc-eris.educ.ph</div>
                                    <p>Joli Admin – is a powerful admin template based on Bootstrap 3.2. Template is fully responsive and retina ready. In downloaded package you will find .less files, documentation, clean and commented source code. Joli Admin is easy to use and customize, also you will find lots of ready to use elements.</p>
                                    
                                        </div>';

                                }
                            }
                        ?>

                                                               
                                
                            </div>
                            <!-- END SEARCH RESULT -->
                            
                            <ul class="pagination pagination-sm pull-right push-down-20">
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






