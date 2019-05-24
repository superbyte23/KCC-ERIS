<?php
include 'include/connect.php';
include 'include/session.php';
if (isset($_POST['send-email'])) {
    //$email_id = $email_id + 1;
    $from = $_POST['sendfrom'];
    $to = $_POST['sendto'];
    $subject = $_POST['subject'];
    if ($subject == '') {
    	$subject = "No subject";
    }
    $content = trim($_POST['content']);
    $date =  date("m/d/Y");
    $time =  date("h:i a");

    $sqlsendemail="INSERT INTO `emails`( `sender_email`, `receiver_email`, `subject`, `content`, `date_sent`, `time_sent`,`status`)
                  VALUES ('$from','$to','$subject','$content','$date','$time','unread')";


if (mysqli_query($conn, $sqlsendemail)) {
   ?><script type="text/javascript">window.location="email-sent.php";</script><?php
} else {
    echo "Error: " . $sqlsendemail . "<br>" . mysqli_error($conn);
}

}

?>