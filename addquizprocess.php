

    <?php
    include 'include/connect.php';
    /* set a query for inserting records */
    $name = $_POST['name'];
    $category = $_POST['category'];
    $classidgg = $_POST['classid2'];

    $sqlQuery = "INSERT INTO `tbl_quiz`(`quiz_name`, `class_id`, `quiz_cat`, `quiz_created`)
    VALUES ('$name', $classidgg, $category ,DATE_FORMAT(NOW(),'%m-%d-%Y'))";
    /* execute the query */
    $result = mysqli_query($conn, $sqlQuery);
    /* checking if the query has successfully executed. */
    if ($result > 0) {
    /* set a query for retrieving the data .*/
    $sqlQuery = "SELECT quiz.*, qc.`quizcat_name` FROM `tbl_quiz` quiz 
                 LEFT JOIN quiz_category qc ON quiz.`quiz_cat` = qc.`quizcat_id` 
                 WHERE class_id =".$classidgg." ORDER BY quiz_name ASC";
    /* execute the query */
   $result = mysqli_query($conn, $sqlQuery);
    /* loop the executed query */
    while ($row = mysqli_fetch_array($result)) {
     
    echo '<tr>';
    echo '<td><a href="quiz/">' .$row['quiz_name'].'</a></td>';
    echo '<td>'. $row['quizcat_name'].'</td>';
                                                   
    echo '<td>'. $row['quiz_created'].'</td>';

    echo '<td>Active</td>';
    echo '</tr>';
    }
    }else{
        echo "ERROR";
    }
    ?>

<script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script> 