<?php
include 'include/connect.php';

/* set a query for inserting records */
$sqlQuery = "UPDATE `tbl_classmembers` SET `verification`= 'Yes' WHERE `classmember_id` =".$_POST['MEMBERID'];
/* execute the query */

$result = mysqli_query($conn, $sqlQuery);

/* checking if the query has successfully executed. */
if ($result==1) {
	/* set a query for retrieving the data .*/ 
     $sql = "SELECT clmb.`class_id`, clmb.`classmember_id` , memb.`member_id`, memb.`member_fullname`, crs.`course_Name`, yrl.`yrlvl_name` FROM `tbl_members` memb LEFT JOIN `tbl_classmembers` clmb ON memb.`member_id` = clmb.`member_id` LEFT JOIN `tbl_student` student ON clmb.`member_id` = student.`member_id` LEFT JOIN `tblcourse` crs ON student.`user_course` = crs.`course_ID` LEFT JOIN `tblyearlevel` yrl ON student.`user_year` = yrl.`yrlvl_ID` WHERE clmb.`class_id` = ".$_POST['classID2']." AND clmb.`verification` = 'No' ";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
      echo '<tr id="trow_1">';
      echo '<td class="text-center">'.$row['member_id'].'</td>';
      echo '<td class="text-center"><strong>'.$row['member_fullname'].'</strong></td>';
      echo '<td class="text-center"><span class="label label-success">New</span></td>';
      echo '<td class="text-center">'.$row['course_Name'].'</td>';
      echo '<td class="text-center">'.$row['yrlvl_name'].'</td>';
      echo '<td class="text-center"><input type="text" name="classID2" id="classID2" value="'.$row['class_id'].'" hidden>
            <button type="button" value="'.$row['classmember_id'].'" class="subjects btn btn-success btn-rounded btn-sm" id ="confirm">Confirm <span class="fa fa-check"></span></button>
            <button class="btn btn-danger btn-rounded btn-sm" onclick="delete_row("trow_1");"><span class="fa fa-times"></span></button>
                                  </td>';
      echo '</tr>';
      }
  }else{
      echo '<tr id="trow_1">';
      echo "<td>No data available</td>";
      echo '</tr>';
  }                    
}
?>
<script>
  $(document).ready(function(){ 
  $(".subjects").click(function(){
    var selected = $(this).val();
    
    $("#subname").val(selected);
    });
  });
</script>
  