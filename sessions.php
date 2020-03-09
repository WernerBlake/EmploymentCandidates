<?php include('templates/header.php'); ?>

<h2>Sessions Information:</h2>
<form method="post">
    <p>Session Num:  <br><input type="text" name="session_num" placeholder="Enter Number"><br>
    <p>Session Description:  <br><input type="text" name="session_desc" placeholder="Coding Bootcamp..."><br>
    <p>Date Held:  <br><input type="text" name="date_held" placeholder="YYYY-MM-DD"><br>
    <p>Course Number: <br><input type="text" name="course_num" placeholder="Enter Number"><br>
       <input type="submit" value="Submit">
</form>

<?php
if(isset($_POST["session_num"], $_POST["session_desc"], $_POST["date_held"], $_POST["course_num"])){
    $sql = "INSERT into certificates values (" .  $_POST["session_num"] . "," . "'" .  $_POST["session_desc"] . "'" ."," . "'" .  $_POST["date_held"] . "'" ."," .  $_POST["course_num"] . ")";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn); 
}

?>
<?php include('reports_footer.php'); ?>