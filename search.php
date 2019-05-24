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
                    <li><a href="index.php">Dashboard</a></li>                    
                    <li><a href="#">Search Result</a></li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
    
                                <div class="page-body search-result">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form>
                            <div class="form-group has-feedback">
                                <input class="form-control input-lg" placeholder="Search..." name="Search" id="Search" minlength="3" required="" type="text">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </form>
                        
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
                                <div class="result-info"><?php if ($count <= 1) { echo $count.' result'; }elseif($count > 1){echo $count.' results';} ?> found <small>(0.32 seconds)</small></div>
                                <?php
                            if (MYSQLI_NUM_ROWS($Result)>0) {
                                while ($srow = mysqli_fetch_assoc($Result)) {

                                   echo '<div class="result-list">';
                            echo '<div class="result">';
                                echo '<a href="class.php?id='.$srow['class_id'].'" class="title">'.$srow['class_name'].' - '.$srow['subject_name'].'</a>';
                                echo '<a href="javascript:void(0);" class="link">http://www.kcc-eris.com</a>';
                                echo '<div class="summary">Lorem ipsum dolor sit amet, noster eruditi intellegat ne usu, an tibique persecuti mel. Quo id quando corpora, verear dolores eu duo. Ea harum ornatus petentium has, nec quem idque instructior ne. Mucius efficiendi et eos, id mel habemus gubergren.</div>';
                            echo '</div>';
                        echo '</div>';

                                }
                            }
                        ?>
                        
                        <div class="result-pagination">
                            <ul class="pagination">
                                <li>
                                    <a href="javascript:void(0);" aria-label="Previous">
                                        <span aria-hidden="true">«</span>
                                    </a>
                                </li>
                                <li class="active"><a href="javascript:void(0);">1</a></li>
                                <li><a href="javascript:void(0);">2</a></li>
                                <li><a href="javascript:void(0);">3</a></li>
                                <li><a href="javascript:void(0);">4</a></li>
                                <li><a href="javascript:void(0);">5</a></li>
                                <li><a href="javascript:void(0);">6</a></li>
                                <li><a href="javascript:void(0);">7</a></li>
                                <li><a href="javascript:void(0);">8</a></li>
                                <li><a href="javascript:void(0);">9</a></li>
                                <li><a href="javascript:void(0);">10</a></li>
                                <li><a href="javascript:void(0);">...</a></li>
                                <li>
                                    <a href="javascript:void(0);" aria-label="Next">
                                        <span aria-hidden="true">»</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->

                        </div>
                    </div>                                
                    
                </div>
                <!-- PAGE CONTENT WRAPPER -->                                
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

        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

        <!-- END PAGE PLUGINS -->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>

                 
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS --> 
                       
<style type="text/css">
.form-control.input-lg {
    font-size: 16px;
    padding: 6px 12px;
}
textarea:focus, textarea:active, textarea:hover, input:focus, input:active, input:hover, button:focus, button:active, button:hover, a:focus, a:active, a:hover, .btn:focus, .btn:active, .btn:hover {
    outline: none !important;
}
.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
.input-lg {
    height: 46px;
    padding: 10px 16px;
    font-size: 18px;
    line-height: 1.3333333;
    border-radius: 6px;
}
    .panel .panel-body {
    font-size: 13px;
    color: #666;
    line-height: 22px;
}
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.search-result .result-list .result {
    padding: 20px 0;
    border-bottom: 1px solid #e9e9e9;
}
.search-result .result-list .result .title {
    display: block;
    font-weight: bold;
    color: #2682d2;
    font-size: 16px;
    text-decoration: none;
}
.search-result .result-list .result .link {
    color: #009688;
    font-weight: 600;
    font-size: 13px;
    display: block;
    text-decoration: none;
}
.search-result .result-list .result .summary {
    margin-top: 8px;
    color: #888;
    font-size: 12px;
}
.search-result .result-pagination {
    text-align: center;
    margin-bottom: -15px;
    margin-top: 20px;
}
</style>
    </body>
</html>






