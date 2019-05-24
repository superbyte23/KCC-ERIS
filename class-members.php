<div class="panel panel-default">
                                <div class="panel-heading ui-draggable-handle">
                                    <h3 class="panel-title">Members</h3>
                                </div>
                                           
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                <table class="table datatable ">
                                                    <thead>
                                                        <tr>
                                                            <th style="min-width: 12%;">Member ID</th>
                                                            <th style="min-width: 50%;">Name</th>
                                                            <th>Course</th>
                                                            <th>Year</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Member  ITEM -->
                                                    <?php
                                                    $sql = "SELECT clmb.`classmember_id` as 'memberid' , memb.`member_id`, memb.`member_fullname`, crs.`course_Name`, yrl.`yrlvl_name` FROM `tbl_members` memb LEFT JOIN `tbl_classmembers` clmb ON memb.`member_id` = clmb.`member_id` LEFT JOIN `tbl_student` student ON clmb.`member_id` = student.`member_id` LEFT JOIN `tblcourse` crs ON student.`user_course` = crs.`course_ID` LEFT JOIN `tblyearlevel` yrl ON student.`user_year` = yrl.`yrlvl_ID` WHERE clmb.`class_id` = $classID AND clmb.`verification` = 'Yes' ";
                                                    $result = mysqli_query($conn, $sql);
                                                    if (mysqli_num_rows($result) > 0) {
                                                    // output data of each row
                                                        while($row = mysqli_fetch_assoc($result)) {
                                                        echo '<tr style="font-weight: bold;">';
                                                        echo '<td><p style="padding-top: 5px;">'.$row['member_id'].'</p></td>';
                                                        echo '<td><img style="border: 2px solid #F5F5F5; border-radius: 20%; width: 30px;}" src="assets/images/users/no-image.jpg" alt="'.$row['member_fullname'].'"> '.$row['member_fullname'].'</td>';
                                                        if ($row['course_Name'] == "") {
                                                            echo '<td>Not Set</td>';
                                                        }else{
                                                            echo '<td><p style="padding-top: 5px;">'.$row['course_Name'].'</p></td>';
                                                        }
                                                        if ($row['yrlvl_name'] == "") {
                                                            echo '<td>Not Set</td>';
                                                        }else{
                                                            echo '<td><p style="padding-top: 5px;">'.$row['yrlvl_name'].'</p></td>';
                                                        }
                                                        echo '<td><h3 style="padding-top: 5px;"><span class="fa fa-envelope-o text-success"></span> <span class="fa fa-trash-o text-danger"></span></h3></td>';
                                                        
                                                        
                                                        echo '</tr>';
                                                        }
                                                    }
                                               
                                            ?>
                                                        
                                                        <!-- END Member  ITEM -->
                                                        
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                        </div>