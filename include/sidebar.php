                    <?php require ('connect.php');
                    if ($_SESSION['member_type']=='Student') {
                       $sqlprofile = "SELECT D.* , U.*, C.*, Y.* FROM `tbl_student` D
                        LEFT JOIN tbl_members U ON D.`member_id` = U.`member_id`
                        LEFT JOIN tblcourse C ON D.`user_course` = C.`course_ID`
                        LEFT JOIN tblyearlevel Y ON D.`user_year` = Y.`yrlvl_ID`
                        WHERE D.`member_id`=".$_SESSION['member_id'];

                        $result = mysqli_query($conn, $sqlprofile);
                        if (mysqli_num_rows($result)>0) {
                            while ($r = mysqli_fetch_assoc($result)) {
                                $userid = $r['user_id'];
                                $member_id = $r['member_id'];
                                $member_fullname = $r['member_fullname'];
                                $member_email = $r['member_email'];
                                $member_password = $r['member_password'];
                                $member_username = $r['member_username'];
                                $user_address = $r['user_address'];
                                $user_age = $r['user_age'];
                                $user_bday = $r['user_bday'];
                                $user_gender = $r['user_gender'];
                                $user_contact = $r['user_contact'];
                                $user_civilstatus = $r['user_civilstatus'];
                                $user_citizenship = $r['user_citizenship'];
                                $user_religion = $r['user_religion'];
                                $user_father = $r['user_father'];
                                $user_mother = $r['user_mother'];
                                $user_guardian = $r['user_guardian'];
                                $user_contact_person = $r['user_contact_person'];
                                $contact_person_num = $r['contact_person_num'];
                                $course_ID = $r['course_ID'];
                                $course_Name = $r['course_Name'];
                                $yrlvl_ID = $r['yrlvl_ID'];
                                $yrlvl_name = $r['yrlvl_name'];
                            }
                        }

                        if ($user_address == '' && $user_age == '' && $user_bday == '' && $user_gender == '' && $user_contact == '' && $user_civilstatus == '' && $user_citizenship == '' && $user_religion == '' && $user_father == '' && $user_mother == '' && $user_guardian == '' && $user_contact_person == '' && $contact_person_num == '' && $course_ID == '' && $yrlvl_ID == '' ) {
                        echo '<a id="notify" class="mb-control" data-box="#message-box-default" hidden="yes"></a>';
                        }elseif ($user_address == '' || $user_age == '' ||  $user_bday == ''||  $user_gender == ''||  $user_contact == '' ||  $user_civilstatus == '' ||  $user_citizenship == '' ||  $user_religion == ''||  $user_father == '' ||  $user_mother == '' || $user_guardian == '' ||  $user_contact_person == ''||  $contact_person_num == '' ||  $course_ID == '' ||  $yrlvl_ID == '' ) {
                            echo '<a id="notify" class="mb-control" data-box="#message-box-default1" hidden="yes"></a>';
                        }
                    }elseif ($_SESSION['member_type']=='Teacher') {
                        $sqlprofile = "SELECT T.*, U.* FROM `tbl_teacher` T LEFT JOIN tbl_members U ON T.`member_id` = U.`member_id` WHERE T.`member_id`=".$_SESSION['member_id'];

                        $result = mysqli_query($conn, $sqlprofile);
                        if (mysqli_num_rows($result)>0) {
                            while ($r = mysqli_fetch_assoc($result)) {
                                $userid = $r['user_id'];
                                $member_id = $r['member_id'];
                                $member_fullname = $r['member_fullname'];
                                $member_email = $r['member_email'];
                                $member_password = $r['member_password'];
                                $member_username = $r['member_username'];
                                $user_address = $r['user_address'];
                                $user_age = $r['user_age'];
                                $user_bday = $r['user_bday'];
                                $user_gender = $r['user_gender'];
                                $user_contact = $r['user_contact'];
                                $user_civilstatus = $r['user_civilstatus'];
                                $user_citizenship = $r['user_citizenship'];
                                $user_religion = $r['user_religion'];
                                $user_contact_person = $r['user_contact_person'];
                                $contact_person_num = $r['contact_person_num'];
                                
                            }
                        }
                        if ($user_address == '' && $user_age == '' && $user_bday == '' && $user_gender == '' && $user_contact == '' && $user_civilstatus == '' && $user_citizenship == '' && $user_religion == '' && $user_contact_person == '' && $contact_person_num == '') {
                            echo '<a id="notify" class="mb-control" data-box="#message-box-default" hidden="yes"></a>';
                        }elseif ($user_address == '' || $user_age == '' ||  $user_bday == ''||  $user_gender == ''||  $user_contact == '' ||  $user_civilstatus == '' ||  $user_citizenship == '' ||  $user_religion == ''|| $user_contact_person == ''||  $contact_person_num == '') {
                            echo '<a id="notify" class="mb-control" data-box="#message-box-default1" hidden="yes"></a>';
                        }
                    }
 
                    
                    
                    ?>
<body onload="notify()">
    
        <!-- START PAGE CONTAINER -->
        <div id="nav" class="page-container page-navigation-top-fixed" >
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index.php"><b>KCC ERIS</b></a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="assets/images/users/no-image.jpg" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <?php
                                
                                                    include 'include/connect.php';
                                                    
                                                    $select_path="SELECT * FROM `user_photos` WHERE `pri` = 'yes'  and member_id = " .$_SESSION['member_id'].""; //providing image id

                                                     $results = mysqli_query($conn , $select_path);

                                                    if (mysqli_num_rows($results) > 0) {
                                                        while($row = mysqli_fetch_assoc($results)){
                                                        $image_name = $row["filename"];//image name 
                                                       
                                                        ?>
                                                   
                                                        <img src="assets/images/users/no-image.jpg"/>

                                                   
                                                        <?php
                                                        }
                                                    }else{
                                                    ?>
                                                    
                                                        <img src="assets/images/users/no-image.jpg"/>
                                                   
                                                        <?php
                                                        }
                                                    ?> 
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo ucwords($member_fullname); ?></div>
                                <div class="profile-data-title">@<?php echo $member_username; ?></div>
                                <small><?php echo $member_email; ?></small>
                            </div>
                            <div class="profile-controls">
                                <a href="profile.php" class="profile-control-left" data-toggle="tooltip" data-placement="top" title="Profile"><span class="fa fa-info"></span></a>
                                <a href="email-inbox.php" class="profile-control-right" data-toggle="tooltip" data-placement="top" title="E-mail"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navigation</li>
                    <li id="indexpage" class="">
                        <a href="index.php"><span class="fa fa-desktop"></span> <span class="xn-text">Home</span></a>                        
                    </li>                    
                    <li id="usermenu" class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Users Menu</span></a>
                        <ul>
                            <li id="profilestatus" class=""><a href="profile.php"><span class="fa fa-user"></span> Profile</a></li>
                            <!-- <li><a href="gallery.php?id=<?php echo $_SESSION['member_id']; ?>"><span class="fa fa-image"></span> Gallery</a></li> -->
                            <li id="mailboxnav" class="xn-openable">
                                <a href="#"><span class="fa fa-envelope"></span> Mailbox</a>
                                <ul>
                                    <li id="mailcompose" class=""><a href="email-compose.php"><span class="fa fa-pencil"></span> Compose</a></li>
                                    <li id="mailinbox" class=""><a href="email-inbox.php"><span class="fa fa-inbox"></span> Inbox</a></li>
                                    <li id="mailsent" class=""><a href="email-sent.php"><span class="glyphicon glyphicon-send"></span> Sent</a></li>
                                </ul>
                            </li>
                            <li id="messagestatus" class=""><a href="message.php"><span class="fa fa-comments"></span> Messages</a></li>
                            <!-- <li><a href="pages-address-book.html"><span class="fa fa-users"></span> Friends</a></li>  -->                        
                        </ul>
                    </li>
                    
                    <!--<li class="xn-title">Class</li>-->
                    <li id="classmenu" class="xn-openable">
                        <a href="#"><span class="fa fa-pencil-square"></span> <span class="xn-text">Class Menu</span></a>                        
                        <ul>
                            <li id="manageclassstatus" class=""><a href="manage-class.php"><span class="fa fa-laptop"></span> Manage Class</a></li>                            
                            
                            <!-- <li><a href="ui-buttons.html"><span class="fa fa-square-o"></span> Exam</a></li>                            
                            <li><a href="ui-panels.html"><span class="fa fa-pencil-square-o"></span> Quiz</a></li>
                            <li><a href="ui-typography.html"><span class="fa fa-pencil"></span> Assignments</a></li>
                            <li><a href="ui-icons.html"><span class="fa fa-magic"></span> Study Materials</a><div class="informer informer-warning">+679</div></li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="calendar.php"><span class="fa fa-calendar"></span> <span class="xn-text">Calendar</span></a>
                    </li> 
                    <li>
                        <a href="forum/"><span class="fa fa-refresh"></span> <span class="xn-text">ERIS Forum</span></a>
                    </li>  
                    <!-- <li>
                        <a href="faq.php"><span class="fa fa-question-circle"></span><span class="xn-text">FAQ</span></a>
                    </li> -->
                    <li>
                        <a href="about-eris.php"><span class="fa fa-question-circle"></span><span class="xn-text">About Eris</span></a>
                    </li>              
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
