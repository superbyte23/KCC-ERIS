<?php
try {

	require "test_config.php";
	if ($conn) {
	echo "Connected";
}
} catch(Exception $e) {

	exit('Unable to connect to database.');

}



?>