<?php include('templates/header.php'); ?>

<?php
    $sql = 'SELECT candidates.fname, candidates.lname
            from candidates, certificates
            where candidates.candid_code = certificates.candid_code
            and certificates.qual_code not in (select prereq.qual_code
            from prereq, certificates where prereq.qual_code = certificates.qual_code)';

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