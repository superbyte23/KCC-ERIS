<?php include "include/header.php";
// this include navigation ?>

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li class="active"><a href="../index.php">Dashboard</a></li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                      <div class="col-md-2 col-xs-12">
                        <?php
                          if (isset($_SESSION['usertype'])) {
                            echo '<a href="add-category.php" class="btn btn-info active btn-block">Add Category</a>';
                            }
                          ?>
                        <div class="panel panel-default">
                          
                          <div class="panel-heading ui-draggable-handle">
                              <h3 class="panel-title">Recent Threads</h3>
                          </div>
                          <div class="panel-body">
                              <ul class="list-group border-bottom">
                                <?php
                                  $rthreads = mysqli_query($conn, "SELECT * FROM `tbl_forum_topic` ORDER BY `topic_date` ASC LIMIT 5");
                                  if (mysqli_num_rows($rthreads)>0) {
                                    while ($rtrow = mysqli_fetch_assoc($rthreads)) {
                                      echo '<li class="list-group-item"><small><a href="topic.php?id='.$rtrow['topic_id'].'">'.$rtrow['topic_title'].'</a></small></li>';
                                    }
                                  }
                                ?>
                                  
                                  
                              </ul>
                          </div>
                        </div>
                      </div>
                        <div class="col-md-8 col-xs-12">
                            <div class="panel panel-default">
                                <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Topics</th>
                                                <?php
                                                if (isset($_SESSION['usertype'])) {
                                                  echo '<th>Actions</th>';
                                                }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $forumcat = mysqli_query($conn, "SELECT * FROM `tbl_forum_category`");
                                                if (mysqli_num_rows($forumcat)>0) {
                                                    while ($row = mysqli_fetch_assoc($forumcat)) {
                                                        $sqlcount = mysqli_query($conn, "SELECT COUNT(*) as 'counter' FROM tbl_forum_topic WHERE cat_id =".$row['forum_cat_id']."");
                                                        if (mysqli_num_rows($sqlcount) > 0) {
                                                          while ($rowcount = mysqli_fetch_assoc($sqlcount)) {
                                                            $count = $rowcount['counter'];
                                                          }
                                                        }

                                                        echo '<tr>';
                                                        echo '<td><a href="forum.php?id='.$row['forum_cat_id'].'">'.$row['forum_cat_name'].'</a></td>';
                                                        echo '<td>'.$row['forum_cat_desc'].'</td>';
                                                        echo '<td>'.$count.'</td>';
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
