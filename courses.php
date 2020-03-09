<?php include('templates/header.php'); ?>

<h2>Courses Information:</h2>
<form method="post">
    <p>Course Number:  <br><input type="text" name="course_num" placeholder="Enter integer"><br>
    <p>Qualification code:  <br><input type="text" name="qual_code" placeholder="Enter Code"><br>
    <p>Course Description:  <br><input type="text" name="date_earned" placeholder="Intro to Databases..."><br>
        <input type="submit" value="Submit">
</form>

<?php
if(isset($_POST["course_num"], $_POST["qual_code"], $_POST["date_earned"])){
    $sql = "INSERT into course values ("  . $_POST["course_num"]   . "," . "'" .  $_POST["qual_code"] . "'" ."," . "'" .   $_POST["date_earned"] . "'" . ")";
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