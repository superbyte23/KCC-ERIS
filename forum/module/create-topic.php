<?php
include "../../include/connect.php";
include "../../include/session.php";

if (isset($_POST['create'])) {
  $category = $_POST['catid'];
  $title = $_POST['title'];
  $subject = $_POST['subject'];
  $content = $_POST['content'];
  $tags = $_POST['tags'];
  $attach = $_POST['attach'];
  $user = $_SESSION['member_id'];

  $sqlinsert = "INSERT INTO `tbl_forum_topic`(`topic_title`, `topic_subject`, `topic_date`, `cat_id`, `user_id`, `topic_content`)
  VALUES ('$title','$subject', NOW(), $category, $user , '{$content}')";
  $result = mysqli_query($conn, $sqlinsert);
  if (!$result) {
    ?>
      <script type="text/javascript">
      alert('Error');
        //history.back();
      </script>
    <?php
  }else{
    header('location: ../forum.php?id='.$category);
  }
}

?>
