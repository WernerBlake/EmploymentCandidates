<?php include('templates/header.php'); ?>

<?php
    $sql = 'SELECT CONCAT(fname, \' \', lname) as Name
            from candidates 
            right join register using(candid_code)
            where session_num = (select session_num from ( select session_num, date_held
            from sessions as t
                group by session_num
                order by date_held desc
                limit 1) as t1);';

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
<br>
<?php include('reports_footer.php'); ?>