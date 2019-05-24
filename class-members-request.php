
<div class="panel panel-default">
                                <div class="panel-heading ui-draggable-handle">
                                    <h3 class="panel-title">Member Request</h3>
                                </div>

                                <div class="panel-body panel-body-table">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="50">Student ID</th>
                                                    <th class="text-center" width="100">Student Name</th>
                                                    <th class="text-center" width="50">status</th>
                                                    <th class="text-center" width="100">Course</th>
                                                    <th class="text-center" width="100">Year Level</th>
                                                    <th class="text-center" width="130">actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="display">

                                            <?php
                                                $sql = "SELECT clmb.`class_id`, clmb.`classmember_id` , memb.`member_id`, memb.`member_fullname`, crs.`course_Name`, yrl.`yrlvl_name` FROM `tbl_members` memb LEFT JOIN `tbl_classmembers` clmb ON memb.`member_id` = clmb.`member_id` LEFT JOIN `tbl_student` student ON clmb.`member_id` = student.`member_id` LEFT JOIN `tblcourse` crs ON student.`user_course` = crs.`course_ID` LEFT JOIN `tblyearlevel` yrl ON student.`user_year` = yrl.`yrlvl_ID` WHERE clmb.`class_id` = $classID AND clmb.`verification` = 'No' ";
                                                                $result = mysqli_query($conn, $sql);
                                                                if (mysqli_num_rows($result) > 0) {
                                                                // output data of each row
                                                                    while($row = mysqli_fetch_assoc($result)) {
                                                                    echo '<tr id="trow_'.$row['classmember_id'].'">';
                                                                    echo '<td class="text-center">'.$row['member_id'].'</td>';
                                                                    echo '<td class="text-center"><strong>'.$row['member_fullname'].'</strong></td>';
                                                                    echo '<td class="text-center"><span class="label label-success">New</span></td>';
                                                                    echo '<td class="text-center">'.$row['course_Name'].'</td>';
                                                                    echo '<td class="text-center">'.$row['yrlvl_name'].'</td>';
                                                                    echo '<td class="text-center"><input type="text" name="classID2" id="classID2" value="'.$row['class_id'].'" hidden>
                                                                        
                                                                        <button type="button" value="'.$row['classmember_id'].'" class="subjects btn btn-success btn-rounded btn-sm" id ="confirm">Confirm <span class="fa fa-check"></span></button>
                                                                          <button class="btn btn-danger btn-rounded btn-sm" onClick="delete_row('.("'trow_".$row['classmember_id']."'").');"><span class="fa fa-times"></span></button>
                                                                          </td>';
                                                                    echo '</tr>';
                                                                    
                                                    }
                                                                    
                                                }else{
      echo '<tr id="trow_1">';
      echo "<td>No data available</td>";
      echo '</tr>';
  }   
                                                           
                                            ?>
                                            <input type="text" id="subname" hidden>
                                            </tbody>
                                        </table>
                                    </div>                                

                                </div>
                            </div>
