<?php
setcookie("user","Superbyte");
header("X-Sample-Test: foo");
header("Content-type: text/plain");
?>

<html>
<body>

<?php
// What headers are to be sent?
var_dump(headers_list());
?>

</body>
</html> 