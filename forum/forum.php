<?php include "include/header.php"; // this include navigation
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
                            <?php
                              if (isset($_SESSION['member_id'])) {
                                echo '<a href="create.php?id='.$_GET['id'].'" class="btn btn-info active btn-block">Add New Topic</a><br><br>';
                              }
                            ?>

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
                                <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Topics</th>
                                                <th>Author</th>
                                                <th>Threads</th>
                                                <th>Last Post</th>
                                                <?php
                                                if (isset($_SESSION['usertype'])) {
                                                  echo '<th>Actions</th>';
                                                }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $forumcat = mysqli_query($conn, "SELECT * FROM `tbl_forum_topic` topic left join tbl_members user on topic.user_id = user.member_id WHERE cat_id =".$_GET['id']);
                                                if (mysqli_num_rows($forumcat)>0) {
                                                    while ($row = mysqli_fetch_assoc($forumcat)) {
                                                        $countreplies = mysqli_query($conn,"SELECT COUNT(*) as count FROM tbl_forum_replies WHERE `topic_id` =".$row['topic_id']);
                                                        if (mysqli_num_rows($countreplies) > 0) {
                                                          while ($cr = mysqli_fetch_assoc($countreplies)) {
                                                            $countr = $cr['count'];
                                                          }
                                                        }
                                                        echo '<tr>';
                                                        echo '<td><a href="module/add-view.php?id='.$row['topic_id'].'">'.$row['topic_title'].'</a></td>';
                                                        echo '<td>'.$row['member_fullname'].'</td>';
                                                        echo '<td>'.$countr.'</td>';
                                                        echo '<td>0</td>';
                                                        if (isset($_SESSION['usertype'])) {
                                                          echo '<td><a href="#">Delete</a></td>';
                                                        }
                                                        echo '</tr>';
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
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
    </body>
</html>
