<?php


$title = $_POST['title'];

$start = $_POST['start'];

$end = $_POST['end'];

require "../../include/connect.php";

$sql = "INSERT INTO events (title, start, end) VALUES ('$title', '$start', '$end')";

$add = mysqli_query($conn, $sql);


?>