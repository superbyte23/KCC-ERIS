

    <?php
    include 'include/connect.php';
    
    $classidgg = $_POST['classid2'];

   
    /* set a query for retrieving the data .*/
    $sqlQuery = "SELECT * FROM `tbl_quiz` WHERE class_id =".$classidgg;
    /* execute the query */
   $result = mysqli_query($conn, $sqlQuery);
    /* loop the executed query */
    while ($row = mysqli_fetch_array($result)) {
     
    echo '<tr>';
    echo '<td>' .$row['quiz_name'].'</a></td>';
    echo '<td>'. $row['quiz_cat'].'</td>';
                                                   
    echo '<td>'. $row['quiz_created'].'</td>';
    echo '<td>'. $row['quiz_deadline'].'</td>';
    echo '<td>Active</td>';
    echo '</tr>';
    }
    
    ?>

