<?php
date_default_timezone_set('Asia/Manila');

$servername = "localhost";
$username = "root";
$password = "";
$db = 'kcceris';



// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
?>
                    <script type="text/javascript">
                        window.location = "error-500.php";
                    </script>
                    <?php
    
}
?>