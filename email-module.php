<?php

function emailnav()
{
	?>
		<div class="list-group border-bottom">
            <?php
                if ($_SESSION['member_type'] == 'Student') {
                    // START QUERY
                    include "include/connect.php";
                    $sqlprofile = "SELECT S.*,M.*,C.*,Y.* FROM `tbl_student` S LEFT JOIN tbl_members M ON S.`member_id` = M.`member_id` LEFT JOIN tblcourse C ON S.`user_course` = C.`course_ID` LEFT JOIN tblyearlevel Y ON S.`user_year` = Y.`yrlvl_ID` WHERE S.`member_id`=".$_SESSION['member_id'];

                            $result = mysqli_query($conn, $sqlprofile);
                            if (mysqli_num_rows($result)>0) {
                                while ($r = mysqli_fetch_assoc($result)) {
                                    $user_id = $r['user_id'];
                                    $member_id = $r['member_id'];
                                    $member_fullname = $r['member_fullname'];
                                    $member_email = $r['member_email'];
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
                            // END QUERY
                }elseif ($_SESSION['member_type'] == 'Teacher'){
                   // START QUERY
                    include "include/connect.php";
                    $sqlprofile = "SELECT T.* , M.* FROM `tbl_teacher` T LEFT JOIN tbl_members M ON T.`member_id` = M.`member_id` WHERE T.`member_id`=".$_SESSION['member_id'];

                            $result = mysqli_query($conn, $sqlprofile);
                            if (mysqli_num_rows($result)>0) {
                                while ($r = mysqli_fetch_assoc($result)) {
                                    $user_id = $r['user_id'];
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
                                    //$user_father = $r['user_father'];
                                    //$user_mother = $r['user_mother'];
                                    //$user_guardian = $r['user_guardian'];
                                    $user_contact_person = $r['user_contact_person'];
                                    $contact_person_num = $r['contact_person_num'];
                                   // $course_ID = $r['course_ID'];
                                    //$course_Name = $r['course_Name'];
                                    //$yrlvl_ID = $r['yrlvl_ID'];
                                    //$yrlvl_name = $r['yrlvl_name'];
                                }
                            }
                            // END QUERY
                }
                $sql = "SELECT COUNT(*) FROM emails WHERE receiver_email='$member_email' AND `status` = 'unread'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $inboxcount = $row['COUNT(*)'];
                    }
                }
            ?>
                <a href="email-inbox.php" class="list-group-item"><span class="fa fa-inbox"></span> Inbox <span class="badge badge-primary"><?php echo $inboxcount;?> unread</span></a>
                <!-- <a href="#" class="list-group-item"><span class="fa fa-star"></span> Starred <span class="badge badge-warning">6</span></a> -->
                <a href="email-sent.php" class="list-group-item"><span class="fa fa-rocket"></span> Sent</a>
                                <!-- <a href="#" class="list-group-item"><span class="fa fa-flag"></span> Flagged</a> -->
                <a href="#" class="list-group-item"><span class="fa fa-trash-o"></span> Deleted <span class="badge badge-default">0</span></a>					                            
        </div>
	<?php
}


?>