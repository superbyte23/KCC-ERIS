<?php

function checkuser(){

  if (!logged_in()) {
    echo  '<div class="alert alert-success" role="alert">
    <strong>Welcome Guest!</strong>
  </div>';
  }else{
    echo '<a href="create.php?id='.$_GET['id'].'" class="btn btn-info active btn-block">New Topic</a><br><br>';
  }
  
}

?>
