<!-- <?php
include 'include/connect.php';
        $id = $_SESSION['member_id'];

                                        // Count number of all unread messages.
                                        $sqlcount = "SELECT COUNT(R.status) as 'count' FROM tbl_conversation_reply R LEFT JOIN tbl_conversation C ON R.c_id_fk = C.c_id WHERE R.status = 'unread' AND C.user_two =".$id;
                                        $countresult = mysqli_query($conn, $sqlcount);

                                        if (mysqli_num_rows($countresult) > 0) {
                                            while($row = mysqli_fetch_assoc($countresult)) {
                                                
                                                $inboxcount = $row['count'];
                                                $GLOBALS['count'] = $inboxcount;
                                            }

                                        }

                                     ?> -->
<li class="xn-icon-button pull-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Messages">
    <a href="#"><span class="fa fa-comments-o"></span></a>
    <!-- <div class="informer informer-danger"><?php  if ($GLOBALS['count'] <> 0) { echo $GLOBALS['count'];} ?></div> -->
    <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>                                
            <div class="pull-right">
                <!-- <span class="label label-danger"><?php echo $GLOBALS['count']; ?> New Messages</span> -->
            </div>
        </div>
        <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                             
                        
                               <?php
                                   
                                $query= mysqli_query($conn, "SELECT DISTINCT U.member_id,U.member_fullname, C.c_id,U.member_username,U.member_email
                                        FROM tbl_members U, tbl_conversation C, tbl_conversation_reply R
                                        WHERE 
                                        CASE
                                        WHEN C.user_one = '$id'
                                        THEN C.user_two = U.member_id
                                        WHEN C.user_two = '$id'
                                        THEN C.user_one= U.member_id
                                        END
                                        AND
                                        C.c_id = R.c_id_fk
                                        AND
                                        (C.user_one = '$id' OR C.user_two ='$id') ORDER BY date_sent DESC Limit 5") or die(mysqli_error());

                                if (mysqli_num_rows($query) > 0) {
                                     while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                {
                                $c_id=$row['c_id'];
                                $user_id=$row['member_id'];
                                $username=$row['member_username'];
                                $fullname = $row['member_fullname'];
                                $email=$row['member_email'];

                                $cquery= mysqli_query($conn, "SELECT R.cr_id,R.member_id_fk,R.c_id_fk,R.time_sent,R.reply,R.status FROM tbl_conversation_reply R WHERE R.c_id_fk='$c_id' ORDER BY R.cr_id DESC LIMIT 1") or die(mysqli_error());


                                $crow=mysqli_fetch_array($cquery,MYSQLI_ASSOC);

                                $cr_id=$crow['cr_id'];
                                $reply=$crow['reply'];
                                $member_id_fk = $crow['member_id_fk'];
                                $time=$crow['time_sent'];
                                $status = $crow['status'];
                                $c_id = $crow['c_id_fk'];

                                // Count number of unread messages per users.
                                $sqlcount = "SELECT COUNT(`status`) as 'count' FROM tbl_conversation_reply R WHERE R.c_id_fk= '$c_id' AND status = 'unread'";
                                $countresult = mysqli_query($conn, $sqlcount);

                                if (mysqli_num_rows($countresult) > 0) {
                                    while($row = mysqli_fetch_assoc($countresult)) {
                                        $inboxcount = $row['count'];
                                    }

                                }
                                if ( $inboxcount <> 0 AND $member_id_fk <> $_SESSION['member_id'] ) {
                                   echo '<a href="read-message.php?id='.$c_id.'" class="list-group-item read" style="background-color: rgba(0, 226, 255, 0.4);" data-index="'.$cr_id.'">                                
                                                    <div class="list-group-status status-online"></div>
                                                    <img src="assets/images/users/no-image.jpg" class="read pull-left">
                                                    <span class="contacts-title">'.ucwords($fullname).'</span> <span class="label label-danger pull-right">'.$inboxcount.'</span>
                                                    <p>'.$reply.'</p>
                                                </a>';
                                }else{
                                    echo '<a href="read-message.php?id='.$c_id.'" class="list-group-item read" data-index="'.$cr_id.'">                                
                                                    <div class="list-group-status status-online"></div>
                                                    <img src="assets/images/users/no-image.jpg" class="read pull-left">
                                                    <span class="contacts-title">'.ucwords($fullname).'</span> <span class="label label-danger pull-right"></span>
                                                    <p>'.$reply.'</p>
                                                </a>';
                                }
                                 
                                

                                }
                                }else{
                                    echo '<a href="#" class="list-group-item read" data-index="">                                
                                                   <div class="list-group-status status-offline"></div>
                                                    <span class="contacts-title">No Message yet.</span>
                                                    <p>Try sending new message</p>
                                                </a>';
                                }
                               
                                ?>
                                </div>     
                            <div class="panel-footer text-center">
                                <a href="message.php">Show all messages</a>
                            </div>                            
                        </div>                        
                    </li>