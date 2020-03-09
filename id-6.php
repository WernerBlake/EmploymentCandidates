<?php include('templates/header.php'); ?>

<?php
    $sql = 'SELECT candidates.fname, candidates.lname from candidates left join certificates
            on candidates.candid_code = certificates.candid_code
            where candidates.candid_code in(select certificates.candid_code from certificates left join prereq
            on certificates.qual_code = prereq.qual_code where prereq.qual_code = 0);';

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