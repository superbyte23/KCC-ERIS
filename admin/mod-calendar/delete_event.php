<?php


$id = $_POST['id'];


require "../../include/connect.php";

$sql = "DELETE from events WHERE id=".$id;

$add = mysqli_query($conn, $sql);


?>