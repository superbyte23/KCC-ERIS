 <?php
 include 'include/connect.php';
$sql = "SELECT member_fullname FROM tbl_members WHERE member_fullname LIKE '%".$_REQUEST["q"]."%'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
  
  foreach ($result as $key => $a) {
      echo "<a href='' data-index=''>".$a['']."</a>";
  }
}

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?> 