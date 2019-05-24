<?php
    include 'include/connect.php';
    include 'include/session.php';
        
            /*
            *Declare Variable for current Login as student
            *
            */
        if ($_SESSION['member_type']=='Student') {
            # GET VARIABLE SUBMIT FROM AJAX SCRIPT AND DECLARE VARIABLES
            $userid1 = $_POST['userid1'];
            $course = $_POST['course'];
            $year = $_POST['year'];
            $age = $_POST['age'];
            $address = $_POST['address'];
            $bday = $_POST['bday'];
            $contact = $_POST['contact'];
            $gender = $_POST['gender'];
            $civilstatus = $_POST['civilstatus'];
            $citizenship = $_POST['citizenship'];
            $religion = $_POST['religion'];
            $father = $_POST['father'];
            $mother = $_POST['mother'];
            $guardian = $_POST['guardian'];
            $contactperson = $_POST['contactperson'];
            $contactpersonnumber = $_POST['contactpersonnumber'];
            $fullname = $_POST['fullname'];
            $user_name = $_POST['user_name'];
            //echo $email = $_POST['user-email'];
            //echo $pass = $_POST['user-pass'];

            // UPDATE QUERY FOR STUDENT DETAILS TABLE
            $sqlQuery = "UPDATE `tbl_student` SET `user_course`= '$course',`user_year`='$year', `user_age`= '$age', `user_address` = '$address', `user_bday` ='$bday', `user_contact` = '$contact', `user_gender` = '$gender', `user_civilstatus` = '$civilstatus', `user_citizenship` = '$citizenship' ,
                `user_religion` = '$religion', `user_father` = '$father', `user_mother` = '$mother',`user_guardian`= '$guardian',`user_contact_person`='$contactperson',`contact_person_num`='$contactpersonnumber' WHERE `user_id` =".$userid1;
            $result = mysqli_query($conn, $sqlQuery);
             // UPDATE QUERY FOR MEMBER TABLE
            $sqlQuery1 = "UPDATE `tbl_members` SET `member_fullname`='$fullname', `member_username`= '$user_name' WHERE `member_id` =".$_SESSION['member_id'];
            $result1 = mysqli_query($conn, $sqlQuery1);


        }elseif ($_SESSION['member_type']=='Teacher') {
            # GET VARIABLE SUBMIT FROM AJAX SCRIPT AND DECLARE VARIABLES
            $userid1 = $_POST['userid1'];
            //$course = $_POST['course'];
            //$year = $_POST['year'];
            $age = $_POST['age'];
            $address = $_POST['address'];
            $bday = $_POST['bday'];
            $contact = $_POST['contact'];
            $gender = $_POST['gender'];
            $civilstatus = $_POST['civilstatus'];
            $citizenship = $_POST['citizenship'];
            $religion = $_POST['religion'];
            //$father = $_POST['father'];
            //$mother = $_POST['mother'];
            //$guardian = $_POST['guardian'];
            $contactperson = $_POST['contactperson'];
            $contactpersonnumber = $_POST['contactpersonnumber'];
            $fullname = $_POST['fullname'];
            $user_name = $_POST['user_name'];
            //echo $email = $_POST['user-email'];
            //echo $pass = $_POST['user-pass'];

            // UPDATE QUERY FOR STUDENT DETAILS TABLE
            $sqlQuery = "UPDATE `tbl_teacher` SET `user_age`= '$age', `user_address` = '$address', `user_bday` ='$bday', `user_contact` = '$contact', `user_gender` = '$gender', `user_civilstatus` = '$civilstatus', `user_citizenship` = '$citizenship' ,
                `user_religion` = '$religion',`user_contact_person`='$contactperson',`contact_person_num`='$contactpersonnumber' WHERE `user_id` =".$userid1;
            $result = mysqli_query($conn, $sqlQuery);
             // UPDATE QUERY FOR MEMBER TABLE
            $sqlQuery1 = "UPDATE `tbl_members` SET `member_fullname`='$fullname', `member_username`= '$user_name' WHERE `member_id` =".$_SESSION['member_id'];
            $result1 = mysqli_query($conn, $sqlQuery1);
            
        }{

        }


    ?>