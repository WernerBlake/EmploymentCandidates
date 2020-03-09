<?php include('templates/header.php'); ?>

<?php
    $sql = 'SELECT candidates.*, certificates.qual_code, certificates.date_earned, certificates.hours_spent, certificates.host, qualifications.*, course.course_num, course.course_desc
            from candidates
            left outer join certificates
                on certificates.candid_code = candidates.candid_code
            left outer join qualifications
                on qualifications.qual_code = certificates.qual_code
            left outer join course
                on course.qual_code = qualifications.qual_code;';

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