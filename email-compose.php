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
                    <li class="active">Compose</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <!-- START CONTENT FRAME -->
                <div class="content-frame">                                    
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">
                        <div class="page-title">                    
                            <h2><span class="fa fa-pencil"></span> Compose</h2>
                        </div>                         
                        
                        <div class="pull-right">                                                                                    
                            <button class="btn btn-default"><span class="fa fa-cogs"></span> Settings</button>
                            <button class="btn btn-default"><span class="fa fa-floppy-o"></span> Save</button>
                            <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
                        </div>
                    </div>
                    <!-- END CONTENT FRAME TOP -->
                    
                    <!-- START CONTENT FRAME LEFT -->
                    <div class="content-frame-left">
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
                        <div class="block">
                        <form method="POST" action="send-email.php" class="form-horizontal" >
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <button class="btn btn-default"><span class="fa fa-trash-o"></span> Delete Draft</button>
                                    </div>
                                    <div class="pull-right">
                                        <button class="btn btn-danger" name="send-email"><span class="fa fa-envelope"></span> Send Message</button>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">From:</label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" readonly="" placeholder="add email" name="sendfrom" value="<?php echo $member_email; ?>" required="">
                                    
                                </div>
                            </div>                        
                            <div class="form-group">
                                <label class="col-md-2 control-label">To:</label>
                                <div class="col-md-9">                                      
                                    <input type="email" class="form-control"  placeholder="add email" name="sendto" required="">                               
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-link toggle" data-toggle="mail-cc">Cc</button>
                                </div>
                            </div>
                            <div class="form-group hidden" id="mail-cc">
                                <label class="col-md-2 control-label">Cc:</label>
                                <div class="col-md-10">                                        
                                <input type="text" class="tagsinput" data-placeholder="add email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Subject:</label>
                                <div class="col-md-10">                                        
                                    <input type="text" class="form-control" name="subject">                                
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Attachments:</label>
                                <div class="col-md-10">                                        
                                    <input type="file" class="file" data-filename-placement="inside">
                                </div>                                
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">                            
                                    <textarea class="summernote" name="content">                                        
                                    </textarea>                            
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <button class="btn btn-default"><span class="fa fa-trash-o"></span> Delete Draft</button>
                                    </div>
                                    <div class="pull-right">
                                        <button class="btn btn-danger" name="send-email"><span class="fa fa-envelope"></span> Send Message</button>
                                    </div>                                    
                                </div>
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
        <script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>       
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>        
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>

        <script type='text/javascript' src='js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='js/plugins/validationengine/jquery.validationEngine.js'></script>        

        <script type='text/javascript' src='js/plugins/jquery-validation/jquery.validate.js'></script>                

        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>






