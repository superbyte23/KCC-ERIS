<?php include "include/header.php";
// this include navigation
// count number of views
$countview = mysqli_query($conn,"SELECT `topic_view` as count FROM tbl_forum_topic WHERE `topic_id` =".$_GET['id']);
  if (mysqli_num_rows($countview) > 0) {
    while ($cv = mysqli_fetch_assoc($countview)) {
      $countv = $cv['count'];
    }
  }
$countreplies = mysqli_query($conn,"SELECT COUNT(*) as count FROM tbl_forum_replies WHERE `topic_id` =".$_GET['id']);
  if (mysqli_num_rows($countreplies) > 0) {
    while ($cr = mysqli_fetch_assoc($countreplies)) {
      $countr = $cr['count'];
    }
  }
?>
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li class="active"><a href="../index.php">Dashboard</a></li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-2">
                              <!-- <div class="panel panel-default">
                                <div class="panel-heading ui-draggable-handle">
                                    <h3 class="panel-title">Recent Post</h3>
                                </div>
                                <div class="panel-body">
                                    <ul class="list-group border-bottom">
                                        <li class="list-group-item">Lorem ipsum dolor sit amet</li>
                                        <li class="list-group-item">Mauris placerat justo ut augue</li>
                                        <li class="list-group-item">Donec ac venenatis elit</li>
                                        <li class="list-group-item">Maecenas mauris diam</li>
                                        <li class="list-group-item">Curabitur porttitor massa justo</li>
                                    </ul>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-md-8">
                          <div class="panel panel-default">
                              <div class="panel-body posts">
                                <?php
                                $sqltopic = mysqli_query($conn, "SELECT * FROM tbl_forum_topic topic left join tbl_members user on topic.user_id = user.member_id WHERE topic_id =".$_GET['id']);
                                if (mysqli_num_rows($sqltopic) > 0) {
                                  while ($row = mysqli_fetch_assoc($sqltopic)) {
                                    $datet=date_create($row['topic_date']);
                                    $topic_title = $row['topic_title'];
                                    $topic_subject = $row['topic_subject'];
                                    $topic_date = date_format($datet,"M d, Y h:i:A");
                                    $topic_content = $row['topic_content'];
                                    $member_fullname = $row['member_fullname'];
                                  }
                                }
                                ?>
                                  <div class="post-item">
                                      <div class="post-title">
                                          Topic : <strong><?php echo $topic_title; ?></strong>
                                      </div>
                                      <div class="post-date">
                                        <span class="fa fa-calendar"></span> <?php echo $topic_date; ?> / <a style="color: #63b3ff" href="pages-profile.html">Author:  <?php echo $member_fullname; ?></a></div>
                                      <div class="post-text">
                                          <?php echo $topic_content; ?>
                                      </div>
                                      <?php 
                                      
                                      ?>
                                      <span style="color: #63b3ff" class="fa fa-eye"></span> <span style="color: #63b3ff"> Views (<?php echo $countv; ?>) </span>| 
                                      <span style="color: #8bc34a" class="fa fa-reply"></span> <span style="color: #8bc34a"> Threads (<?php echo $countr; ?>) </span>
                                  </div>
                              </div>
                              <!-- end panel body posts -->
                              <!-- start threads panel body posts -->
                              <div class="panel-body posts">
                                  <h3 class="push-down-20">Threads</h3>
                                    <?php
                                      $sqlreplies = mysqli_query($conn, "SELECT * FROM tbl_forum_replies fr 
                                        left join tbl_members user on fr.user_id = user.member_id
                                        left join tbl_forum_topic ft on fr.topic_id = ft.topic_id
                                        WHERE fr.topic_id =".$_GET['id']);
                                      if (mysqli_num_rows($sqlreplies)>0) {
                                        while ($listr = mysqli_fetch_assoc($sqlreplies)) {
                                          $dater=date_create($listr['reply_date']);
                                    ?>
                                  <div class="table">
                                    <div class="det">
                                      &nbsp&nbsp<span class="fa fa-calendar"></span>&nbsp&nbsp <?php echo date_format($dater,"M d, Y h:i:A"); ?>
                                    </div>
                                      <table class="table table-bordered table-striped table-actions" style="border: 1px solid #171414;">
                                        <tbody>                                            
                                          <tr id="trow_1">
                                              <td width="150" class="text-center"><strong><?php echo $listr['member_fullname']; ?></strong>
                                                <p><?php echo $listr['member_username'];?></p>
                                              </td>
                                              <td><strong>Re: <?php echo $listr['topic_title'];?></strong>
                                              <p><?php echo $listr['reply_content'];?></p>
                                              </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                      <div class="panel-comment">
                                        <?php
                                          $countcomments = mysqli_query($conn,"SELECT count(*) as counter FROM `tbl_forum_comment` WHERE `reply_id` =".$listr['reply_id']);
                                          if (mysqli_num_rows($countcomments) > 0) {
                                            while ($cc = mysqli_fetch_assoc($countcomments)) {
                                              $commentc = $cc['counter'];
                                            ?>
                                        &nbsp&nbsp<span class="fa fa-comment"></span> Comments (<?php echo $commentc; ?>)
                                        <?php
                                            }
                                          }                                        
                                        ?>
                                        <?php
                                          $sqlcommments = mysqli_query($conn, "SELECT * FROM `tbl_forum_comment` comment left join tbl_members user on comment.user_id=user.member_id WHERE `reply_id` =".$listr['reply_id']);
                                          if (mysqli_num_rows($sqlcommments)>0) {
                                            while ($rowc = mysqli_fetch_assoc($sqlcommments)) {
                                                $datec=date_create($rowc['comment_date']);
                                              echo '<div class="panel-body list-group list-group-contacts">                                
                                          <a class="list-group-item" style="border-radius: 0px;">                                    
                                            <img src="../assets/images/users/no-image.jpg" class="pull-left">
                                              <span class="contacts-title">'.$rowc['member_fullname'].'</span> <span>'.date_format($datec,"M d, Y h:i:A").'</span>
                                                <p>'.$rowc['comment_content'].'</p>                                  
                                          </a>                              
                                        </div>';
                                            } // end while
                                          } // end if
                                        ?>
                                      </div>
                                      <div class="panel-footer" id="commentform">
                                          <?php
                                          if (!isset($_SESSION['member_id'])) {
                                            echo "<h6>Comment</h6>";
                                            echo '<a href="../signup.php">Register to comment to this thread</a>';
                                          }else{
                                            ?>
                                          <form action="module/comment-reply.php?topic_id=<?php echo $_GET['id'];?>&thread_id=<?php echo $listr['reply_id'];?>" method="POST">
                                            <h6>Comment to this thread</h6>
                                            <input type="text" class="form-control" placeholder="Type comment" name="commentcontent" required="">
                                            <div class="pull-right" style="color: #1caf9a;">
                                              <button type="submit" name="btncomment" id="btn-comment" class="send pull-right">
                                                  <span class="fa fa-comment-o"></span> Comment
                                              </button>
                                            </div>
                                          </form>
                                            <?php
                                          } // end if statement
                                          ?>
                                        </div>
                                    <?php
                                        } // end while statement
                                      } // end if statement
                                    ?>
                                  <?php
                                    if (!isset($_SESSION['member_id'])) {
                                    echo  '<a href="../signup.php" class="btn btn-info active">Register to Post Thread</a>';
                                    }else{
                                      ?>
                                        <form class="" action="module/reply-topic.php?topic_id=<?php echo($_GET['id']); ?>" method="post">
                                          <label>Reply to this topic</label>
                                          <textarea name="reply_content" rows="4" cols="80" class="form-control summernote_lite" style="border-radius: 0px;"></textarea>
                                          <div class="det">
                                            <button type="submit" name="reply" id="btn-post-thread" class="send pull-right"><span class="fa fa-check"></span> Post Thread</button>
                                          </div>
                                        </form>
                                      <?php
                                    } // end if statement
                                  ?>
                              </div>
                              <!-- end threads panel body posts -->
                              
                        </div>
                        <!-- END PAnel -->
                        </div>
                        <!-- end col-md-8 -->
                        <div class="col-md-2">

                        </div>
                    </div>
                </div>
                <!-- PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <?php require_once 'include/footer.php'; // FOOTER INCLUDE THE MAIN SCRIPT FOR THIS PAGE. ADD CUSTOM SCRIPT BELOW THIS LINE ?>
        <script type="text/javascript" src="../js/plugins/summernote/summernote.js"></script>
        <script type="text/javascript" src="../js/demo_tables.js"></script>
        <style type="text/css">
  .det{
    background-color: rgb(29, 33, 39);;
    color: #FFF;
    float: left;
    width: 100%;
    margin-bottom: 0px;
    line-height: 21px;
  }
  .panel-comment{
    padding: 1px;
    background-color: #95b3ff;
    margin-top: -20px;
    color: #FFF;
    float: left;
    width: 100%;
    margin-bottom: 10px;
    line-height: 21px;
  }
  #commentform{
    margin-bottom: 10px; 
    margin-top: -10px;
  }
  #btn-comment{
    margin: 3px;
    margin-top: 5px;
    margin-bottom: -5px; 
    font-size: 10px; 
    background-color: transparent; 
    border: 1px solid #16a085; 
    border-radius: 0px; 
    line-height: 15px;
  }
  #btn-post-thread{
    margin: 5px; 
    background-color: transparent; 
    border: 1px solid #16a085;
  }
</style>
    </body>
</html>
