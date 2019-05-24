<?php
$ds          = DIRECTORY_SEPARATOR;
 
$storeFolder = 'uploads';
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];
      
    $targetPath = dirname('uploads') . $ds. $storeFolder . $ds;
     
    $targetFile =  $targetPath. $_FILES['file']['name'];
 
    move_uploaded_file($tempFile,$targetFile);
     
}
?>     
<form method="POST" action="upload.php">
	<input type="file" name="file">
	<input type="submit" name="upload" value="Upload">
</form>