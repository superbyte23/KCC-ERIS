<?php


$id = $_POST['id'];

$title = $_POST['title'];

$start = $_POST['start'];

$end = $_POST['end'];

require "../../include/connect.php";

$sql = "UPDATE `events` SET `title`= '$title' ,`start`='$start',`end`='$end' WHERE id=?";

$add = mysqli_query($conn, $sql);


?>