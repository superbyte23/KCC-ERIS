<?php
require '../include/connect.php';

require '../include/session.php';

				/*	# create logs for signing out #
                    $logs = ("UPDATE `member_logs` SET `logout_time`= DATE_FORMAT(NOW(),'%h:%i %p')
                              WHERE `member_id` = ".$_SESSION['member_id']." AND `log_date` = DATE_FORMAT(NOW(),'%m-%d-%Y')");

                        if (mysqli_query($conn, $logs)) {
								
								} else {
								    echo "Error updating record: " . mysqli_error($conn);
								}
                    # end log # */
session_unset();
session_destroy();
?>

<script type="text/javascript">
    window.location = "index.php";
</script>
