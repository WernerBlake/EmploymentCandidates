<?php include('templates/header.php'); ?>

<?php
    $sql = 'SELECT qualifications.qual_name, qualifications.req_hours, qualifications.desription, sessions.*
            from course right outer join sessions
            on sessions.course_num = course.course_num
            right outer join qualifications on course.qual_code = qualifications.qual_code
            order by sessions.date_held desc';

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border = '1'>\n";
        // output data of each row
        while($row = mysqli_fetch_row($result)) {
            echo "<tr>\n";
            for ($i = 0; $i < mysqli_num_fields($result); $i++) 
            {
                echo "<td>" . $row[$i] . "</td>\n";
            }
            echo "</tr>\n";
        }
        echo "</table>\n";
    } 
    else {
        echo "0 results";
    }
    mysqli_free_result($result);
    mysqli_close($conn);
?> 
<?php include('reports_footer.php'); ?>