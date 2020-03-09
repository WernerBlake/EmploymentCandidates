<?php include('templates/header.php'); ?>

<h2>Prerequisites Information:</h2>
<form method="post">
    <p>Qualification code:  <br><input type="text" name="qual_code" placeholder="Enter Code"><br>
    <p>Course Number:  <br><input type="text" name="course_num" placeholder="Enter Number"><br>
        <input type="submit" value="Submit">
</form>

<?php
if(isset($_POST["qual_code"], $_POST["course_num"])){
    $sql = "INSERT into certificates values (" . "'" . $_POST["qual_code"] . "'" . "," .  $_POST["course_num"] . ")";
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