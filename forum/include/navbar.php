                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal">
                    <li class="xn-logo">
                        <a href="index.php">Eris Forum</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <!-- <li>
                        <a href=""><span class="fa fa-location-arrow"></span> <span class="xn-text"> Anouncements</span></a>
                    </li> -->
                    <li>
                        <a href="index.php"><span class="fa fa-location-arrow"></span> <span class="xn-text"> Forums</span></a>
                    </li>

                    <!-- <li class="xn-openable" >
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text"> Forum Categories</span></a>
                        <ul class="animated zoomIn">
                        <?php
                            $forumcat = mysqli_query($conn, "SELECT * FROM `tbl_forum_category`");
                            if (mysqli_num_rows($forumcat)>0) {
                                while ($row = mysqli_fetch_assoc($forumcat)) {
                                    echo '<li><a href="topics.php?category='.$row['forum_cat_id'].'"><span class="fa fa-files-o"></span> <span class="xn-text">'.$row['forum_cat_name'].'</span></a></li>';
                                }
                            }
                        ?>
                        </ul>
                    </li> -->
                    <!-- SIGN OUT -->
                    <?php
                      if (isset($_SESSION['member_id'])) {
                        echo  '<li class="pull-right">
                            <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                        </li>';
                        if (isset($_SESSION['usertype'])) {
                            echo ' <li class="pull-right">
                        <a href="index.php"><span class="xn-text"> Hello Admin</span></a>
                    </li>';
                        }
                        }else{
                            echo '<li class="pull-right">
                        <a href="#"><span class="xn-text">Welcome Guest <span class="fa fa-user"></span></span></a>
                    </li>';
                        }
                    ?>

                    <!-- END SIGN OUT -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->
