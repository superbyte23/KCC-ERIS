<body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index.php">KCC ERIS</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="assets/images/users/no-image.jpg" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="assets/images/users/no-image.jpg" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo ucwords($_SESSION['fullName']); ?></div>
                                <div class="profile-data-title">Adminstrator</div>
                            </div>
                            <div class="profile-controls">
                                <a href="#" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="#" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navigation</li>
                    <li class="active"><a href="index.php"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a></li>
                    <li><a href="calendar.php"><span class="fa fa-calendar"></span> Calendar</a>
                    <li><a href="studentlist.php"><span class="fa fa-users"></span> Students</a></li>
                    <li><a href="teacherlist.php"><span class="fa fa-users"></span> Teachers</a></li>
                    <li><a href="classlist.php"><span class="fa fa-star"></span> Class</a></li>
                    <li><a href="courselist.php"><span class="fa fa-circle"></span> Course</a></li>
                    <!-- <li><a href="subjectlist.php"><span class="fa fa-gavel"></span> Subjects</a></li> -->
                    <li><a href="academicyearlist.php"><span class="fa fa-users"></span> Academic Year</a>
                    <li><a href="departmentlist.php"><span class="fa fa-leaf"></span> <span class="xn-text">Departments</span></a></li>
                    <li><a href="roomlist.php"><span class="fa fa-home"></span> <span class="xn-text">Rooms</span></a></li>
                    <li><a href="../Forum"><span class="fa fa-refresh"></span> <span class="xn-text">ERIS Forum</span></a></li>
                   <!--  <li><a href="faq.php"><span class="fa fa-question-circle"></span><span class="xn-text">FAQ</span></a></li> -->
                    <li><a href="about-eris.php"><span class="fa fa-question-circle"></span><span class="xn-text">About Eris</span></a></li>             
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->