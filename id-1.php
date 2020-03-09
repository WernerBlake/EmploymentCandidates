<?php include('templates/header.php'); ?>

<?php
    //inserting the query into a variable
    $sql = 'SELECT candidates.candid_code, candidates.lname, qualifications.*,  certificates.date_earned, certificates.hours_spent, certificates.host
            from  certificates
            right outer join qualifications on qualifications.qual_code = certificates.qual_code
            right outer join candidates on candidates.candid_code = certificates.candid_code
            group by qualifications.qual_code desc';

    //For successful SELECT queries it will return a mysqli_result object.
    //For other successful queries it will return TRUE. FALSE on failure
    $result = mysqli_query($conn, $sql);
    
    //mysqli_num_rows() returns the number of rows retrieved
    if (mysqli_num_rows($result) > 0) {
        //echo will print this statement into the html/css to specify the table cell style
        echo "<table border = '1'>\n";
        // output data of each row
        while($row = mysqli_fetch_row($result)) {
            echo "<tr>\n";
            //output data for each column
            for ($i = 0; $i < mysqli_num_fields($result); $i++) 
            {
                //
                echo "<td>" . $row[$i] . "</td>\n";
            }
            echo "</tr>\n";
        }
        echo "</table>\n";
    } 
    else {
        echo "0 results";
    }
    //emptys the $result array 
    mysqli_free_result($result);
    //closes the connection
    mysqli_close($conn);
?> 
<?php include('reports_footer.php'); ?>