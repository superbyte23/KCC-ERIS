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
                    <li><a href="profile.php">Profile</a></li>
                    <li class="active">Profile Update</li>
                </ul>
                <!-- END BREADCRUMB -->                                                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <!-- START ROW -->
                    <div class="row">
                        <!-- START COL-MD-3 -->
                        <div class="col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-body profile" style="background: url('assets/images/gallery/wall.jpg') center center no-repeat;">
                                    <div class="profile-image">
                                        <img src="assets/images/users/no-image.jpg" alt="<?php echo $member_fullname; ?>"/>
                                    </div>
                                    <div class="profile-data">
                                        <div class="profile-data-name"  style="color: #000;"><?php echo $member_fullname; ?></div>
                                        <div class="profile-data-title" style="color: #000;">@<?php echo $member_username; ?></div>
                                    </div>
                                    <!-- <div class="profile-controls">
                                        <a href="#" class="profile-control-left twitter"><span class="fa fa-twitter"></span></a>
                                        <a href="#" class="profile-control-right facebook"><span class="fa fa-facebook"></span></a>
                                    </div>  -->                                   
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
                                    <a href="#" class="list-group-item "><span class="fa fa-bar-chart-o"></span> Activity</a>
                                    <a href="manage-class.php" class="list-group-item"><span class="fa fa-coffee"></span> Class <span class="badge badge-default"><?php if ($_SESSION['member_type'] == 'Student') { echo($numclass); }elseif ($_SESSION['member_type'] == 'Teacher') {
                                       echo($Tnumclass);
                                    }  ?></span></a>                                
                                    <!-- <a href="" class="list-group-item"><span class="fa fa-users"></span> Friends <span class="badge badge-danger">+7</span></a> -->
                                    <!--     -->
                                    <a href="#" class="list-group-item active"><span class="fa fa-cog"></span> Settings</a>
                                </div>
                                <!-- <div class="panel-body">
                                    <h4 class="text-title">Friends</h4>
                                    <div class="row">
                                        <div class="col-md-4 col-xs-2">
                                            <a href="#" class="friend">
                                                <img src="assets/images/users/user.jpg"/>
                                                <span>Dmitry Ivaniuk</span>
                                            </a>                                            
                                        </div>
                                    </div>
                                
                                    <h4 class="text-title">Photos</h4>
                                    <div class="col-md-12 col-xs-4">
                                    <div class="gallery" id="links">                                                
                                        <a href="assets/images/gallery/music-1.jpg" title="Music Image 1" class="gallery-item" data-gallery>
                                            <div class="image">
                                                <img src="assets/images/gallery/music-1.jpg" alt="Music Image 1"/>
                                            </div>                                            
                                        </a>
                                                                                
                                    </div>
                                    </div>
                                </div> -->

                            </div>                            
                            
                        </div>
                        <!-- END COL-MD-3 -->
                        
                        <div class="col-md-9">
                            <!-- form -->
                            <div class="form-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-heading ui-draggable-handle">
                                    <h3 class="panel-title"><strong>Update User Profile</strong></h3>
                                </div>
                                <div class="panel-body">
                                    <!-- First Name -->
                                                    <div class="form-group">                   
                                                            <input type="text" id="user-id" name="user-id" value="<?php echo $userid; ?>" hidden>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">Full Name</label>
                                                        <div class="col-md-6 col-xs-12">                                            
                                                            <input type="text" class="form-control" placeholder="First Name" id="fullname" name="fullname" value="<?php echo $member_fullname; ?>">
                                                        </div>
                                                    </div>
                                                   <!--  Middle Name -->
                                                    <!-- <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">Middle Name</label>
                                                        <div class="col-md-6 col-xs-12">                                            
                                                            <input type="text" class="form-control" placeholder="Middle Name">
                                                        </div>
                                                    </div> -->
                                                    <!-- Last Name -->
                                                    <!-- <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">Last Name</label>
                                                        <div class="col-md-6 col-xs-12">                                            
                                                            <input type="text" class="form-control" placeholder="Last Name">
                                                        </div>
                                                    </div> -->
                                                    <!-- Course -->
                                                   <?php
                                                   if ($_SESSION['member_type'] == 'Student') {
                                                      ?>
                                                      <div class="form-group">                                        
                                                        <label class="col-md-3 col-xs-12 control-label">Course</label>
                                                        <div class="col-md-4">
                                                            <select class="form-control select" name="course" id="course">
                                                                <option value="<?php echo($course_ID);?>"><?php echo($course_Name); ?></option>
                                                               <?php
                                                               // Count number of unread messages.
                                                                $sqlcourse = "SELECT * FROM `tblcourse` WHERE `course_Name` <> '$course_Name'";
                                                                $result = mysqli_query($conn, $sqlcourse);

                                                                if (mysqli_num_rows($result) > 0) {
                                                                    while($row = mysqli_fetch_assoc($result)) {
                                                                      echo '<option value="'.$row['course_ID'].'">'.$row['course_Name'].'</option>';
                                                                    }

                                                                }
                                                               ?>

                                                            </select>
                                                        </div>                                            
                                                    </div>
                                                    <!-- Year level -->
                                                    <div class="form-group">                                        
                                                        <label class="col-md-3 col-xs-12 control-label">Year Level</label>
                                                        <div class="col-md-4">
                                                            <select class="form-control select" name="year" id="year">
                                                                <option value="<?php echo($yrlvl_ID);?>"><?php echo($yrlvl_name); ?></option>
                                                               <?php
                                                               // Count number of unread messages.
                                                                $sqlcourse = "SELECT * FROM `tblyearlevel` WHERE `yrlvl_name` <> '$yrlvl_name'";
                                                                $result = mysqli_query($conn, $sqlcourse);

                                                                if (mysqli_num_rows($result) > 0) {
                                                                    while($row = mysqli_fetch_assoc($result)) {
                                                                      echo '<option value="'.$row['yrlvl_ID'].'">'.$row['yrlvl_name'].'</option>';
                                                                    }

                                                                }
                                                               ?>
                                                                                                                        
                                                            </select>
                                                        </div>                                            
                                                    </div>
                                                      <?php
                                                   }
                                                   ?>
                                                    
                                                    <!--  Date of birth -->
                                                    <div class="form-group">                                        
                                                        <label class="col-md-3 col-xs-12 control-label">Date of birth</label>
                                                       <div class="col-md-6">
                                                            <input type="text" class="form-control datepicker" id="bday" name="bday" placeholder="Date of Birth" value="<?php echo $user_bday; ?>">
                                                        </div>                                              
                                                    </div>
                                                     <!--  Age -->
                                                    <div class="form-group">                                        
                                                        <label class="col-md-3 col-xs-12 control-label">Age</label>
                                                       <div class="col-md-6">
                                                            <input type="number" class="form-control" placeholder="Age" id="age" name="age" value="<?php echo $user_age; ?>">
                                                        </div>                                              
                                                    </div>
                                                     <!--  Contact -->
                                                    <div class="form-group">                                        
                                                        <label class="col-md-3 col-xs-12 control-label">Contact Number</label>
                                                       <div class="col-md-6">
                                                            <input type="number" class="form-control" placeholder="Contact" id="contact" name="contact" value="<?php echo $user_contact; ?>">
                                                        </div>                                              
                                                    </div>
                                                    <!--  address -->
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">Address</label>
                                                        <div class="col-md-6 col-xs-12">                                            
                                                            <textarea class="form-control" rows="5" id="address" name="address" placeholder="Address"><?php echo $user_address; ?></textarea>
                                                            
                                                        </div>
                                                    </div>
                                                  <!--   gender -->
                                                    <div class="form-group">                                        
                                                        <label class="col-md-3 col-xs-12 control-label">Gender</label>
                                                        <div class="col-md-4">
                                                            <select class="form-control select" id="gender" name="gender">
                                                                <?php if ($user_gender == "Male") {
                                                                    echo "<option selected value='Male'>Male</option>";
                                                                    echo "<option value='Female'>Female</option>";
                                                                }elseif ($user_gender == "Female") {
                                                                   echo "<option value='Male'>Male</option>";
                                                                   echo "<option selected value='Female'>Female</option>";
                                                                }else{
                                                                    echo "<option></option>";
                                                                     echo "<option value='Male'>Male</option>";
                                                                    echo "<option value='Female'>Female</option>";
                                                                } ?>
                                                                                           
                                                            </select>
                                                        </div>                                            
                                                    </div>
                                                    <!-- Religion -->
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">Religion</label>
                                                        <div class="col-md-6 col-xs-12"> 
                                                             <input type="text" class="form-control" placeholder="Religion" id="religion" name="religion" value="<?php echo $user_religion; ?>">
                                                        </div>
                                                    </div>
                                                     <!-- Civil Status -->
                                                    <div class="form-group">                                        
                                                        <label class="col-md-3 col-xs-12 control-label">Civil Status</label>
                                                        <div class="col-md-4">
                                                            <select class="form-control select" id="civilstatus" name="civilstatus">
                                                                <?php if ($user_civilstatus == "Single") {
                                                                    echo "<option selected value='Single'>Single</option>";
                                                                    echo "<option value='Married'>Married</option>";
                                                                    echo "<option value='Widow'>Widow</option>";
                                                                }elseif ($user_civilstatus == "Married") {
                                                                    echo "<option selected value='Married'>Married</option>";
                                                                    echo "<option value='Single'>Single</option>";
                                                                    echo "<option value='Widow'>Widow</option>";
                                                                }elseif ($user_civilstatus == "Widow") {
                                                                    echo "<option value='Married'>Married</option>";
                                                                    echo "<option  value='Single'>Single</option>";
                                                                    echo "<option selected value='Widow'>Widow</option>";
                                                                }else{
                                                                    echo "<option></option>";
                                                                    echo "<option value='Married'>Married</option>";
                                                                    echo "<option value='Single'>Single</option>";
                                                                    echo "<option value='Widow'>Widow</option>";
                                                                }
                                                                ?>                
                                                            </select>
                                                        </div>                                            
                                                    </div>
                                                     <!-- citizenship -->
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">Citizenship</label>
                                                        <div class="col-md-6 col-xs-12"> 
                                                             <input type="text" class="form-control" placeholder="citizenship" id="citizenship" name="citizenship" value="<?php echo $user_citizenship; ?>">
                                                        </div>
                                                    </div>
                                                    <?php
                                                        if ($_SESSION['member_type']=='Student') {
                                                            ?>
                                                            <hr>
                                                    <!--  Fathers Name -->
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">Fathers Name</label>
                                                        <div class="col-md-6 col-xs-12">                                            
                                                            <input type="text" class="form-control" placeholder="Fathers Name" id="father" name="father" value="<?php echo $user_father; ?>">
                                                        </div>
                                                    </div>
                                                    <!--  Mothers Name -->
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">Mothers Name</label>
                                                        <div class="col-md-6 col-xs-12">                                            
                                                            <input type="text" class="form-control" placeholder="Mothers Name" id="mother" name="mother" value="<?php echo $user_mother; ?>">
                                                        </div>
                                                    </div>
                                                    <!--  Guardians Name -->
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">Guardians Name</label>
                                                        <div class="col-md-6 col-xs-12">                                            
                                                            <input type="text" class="form-control" placeholder="Guardians Name" id="guardian" name="guardian" value="<?php echo $user_guardian; ?>">
                                                        </div>
                                                    </div>
                                                            <?php
                                                        }
                                                    ?>
                                                    <hr>
                                                    <!--  Contact Person Name -->
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">Contact Person in Case of Emergency</label>
                                                        <div class="col-md-6 col-xs-12">                                            
                                                            <input type="text" class="form-control" placeholder="Contact Person Name" id="contactperson" name="contactperson" value="<?php echo $user_contact_person; ?>">
                                                        </div>

                                                    </div>
                                                    <!--  Contact Person Number -->
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">Contact Number</label>
                                                        <div class="col-md-6 col-xs-12">                                            
                                                            <input type="number" class="form-control" placeholder="Contact Person Number" id="contactpersonnumber" name="contactpersonnumber" value="<?php echo $contact_person_num; ?>">
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">Username</label>
                                                        <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                            <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $member_username; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">E-mail</label>
                                                        <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                            <input type="email" class="form-control" autocomplete="No" id="user-email" name="user-email" value="<?php echo $member_email; ?>" readonly="">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">Password</label>
                                                        <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                            <input type="password" class="form-control" autocomplete="No" id="user-pass" name="user-pass" value="<?php echo $member_password; ?>" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label"></label>
                                                        <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                            <button id="update" type="submit" name="updateinfo" class="btn btn-warning pull-right" onClick="">Save Changes <span class="fa fa-floppy-o fa-right"></span></button>
                                                        </div>
                                                    </div>
                                </div>
                                <div class="panel-footer">
                                    
                                </div>
                            </div>
                            </div>
                            <!-- END form -->          
                        </div>
                        
                    </div>
                    <!-- END ROW -->

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
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>   
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
        <script type="text/javascript" >
           
        $(document).on("click", "#update", function () {
            <?php
            /*
            * UPDATE USER INFORMATION USING AJAX METHOD.
            */

            /*
            * CHECK IF THE CURRENT USER IS A STUDENT USING A SESSION VARIABLE FOR USER TYPE
            */
            if ($_SESSION['member_type'] == 'Student') {
                # if student then declare variable for student
                # START AJAX 
                ?>
                /* load all variables */
                var fullname = document.getElementById('fullname').value
                var userid1 = document.getElementById('user-id').value
                var course = document.getElementById('course').value
                var year = document.getElementById('year').value
                var age = document.getElementById('age').value
                var contact = document.getElementById('contact').value
                var bday = document.getElementById('bday').value
                var address = document.getElementById('address').value
                var gender = document.getElementById('gender').value
                var religion = document.getElementById('religion').value
                var civilstatus = document.getElementById('civilstatus').value
                var citizenship = document.getElementById('citizenship').value
                var father = document.getElementById('father').value
                var mother = document.getElementById('mother').value
                var guardian = document.getElementById('guardian').value
                var contactperson = document.getElementById('contactperson').value 
                var contactpersonnumber = document.getElementById('contactpersonnumber').value
                var user_name = document.getElementById('user_name').value 
                //var email = document.getElementById('email').value
                
               
                $.ajax({ //create an ajax request to load_page.php
                type:"POST",
                url: "updateprofile.php",
                dataType: "text", //expect html to be returned
                data:{userid1:userid1, course:course, year:year, age:age, address:address, bday:bday, contact:contact, gender:gender, civilstatus:civilstatus, citizenship:citizenship, religion:religion, father:father, mother:mother, guardian:guardian, contactperson:contactperson, contactpersonnumber:contactpersonnumber, user_name:user_name,fullname:fullname},
                success: function(data){
               
                 noty({text: 'Updated Successfully', layout: 'topCenter', type: 'success'});
                    
                    setTimeout(function() {
                        $.noty.closeAll();
                    }, 2000);
                }
                 
                });
                <?php # END AJAX
            }elseif ($_SESSION['member_type']=='Teacher') {
                # if student then declare variable for Teacher
                # START AJAX 
                ?>
                /* load all variables */
                var fullname = document.getElementById('fullname').value
                var userid1 = document.getElementById('user-id').value
                //var course = document.getElementById('course').value
                //var year = document.getElementById('year').value
                var age = document.getElementById('age').value
                var contact = document.getElementById('contact').value
                var bday = document.getElementById('bday').value
                var address = document.getElementById('address').value
                var gender = document.getElementById('gender').value
                var religion = document.getElementById('religion').value
                var civilstatus = document.getElementById('civilstatus').value
                var citizenship = document.getElementById('citizenship').value
                //var father = document.getElementById('father').value
                //var mother = document.getElementById('mother').value
                //var guardian = document.getElementById('guardian').value
                var contactperson = document.getElementById('contactperson').value 
                var contactpersonnumber = document.getElementById('contactpersonnumber').value
                var user_name = document.getElementById('user_name').value 
                //var email = document.getElementById('email').value


                $.ajax({ //create an ajax request to load_page.php
                type:"POST",
                url: "updateprofile.php",
                dataType: "text", //expect html to be returned
                data:{userid1:userid1, age:age, address:address, bday:bday, contact:contact, gender:gender, civilstatus:civilstatus, citizenship:citizenship, religion:religion, contactperson:contactperson, contactpersonnumber:contactpersonnumber, user_name:user_name,fullname:fullname},
                success: function(data){
               
                 noty({text: 'Updated Successfully', layout: 'topCenter', type: 'success'});
                    
                    setTimeout(function() {
                        $.noty.closeAll();
                    }, 2000);
                }
                 
                });
                <?php # END AJAX
                # code...
            }
        ?>
         
        });
        </script>
    <!-- END SCRIPTS -->         
    </body>
</html>