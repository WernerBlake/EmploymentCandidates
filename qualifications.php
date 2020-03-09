<?php include('templates/header.php'); ?>

<h2>Qualifications Information:</h2>
<form method="post">
    <p>Qualification Code:  <br><input type="text" name="qual_code" placeholder="Enter Code"><br>
    <p>Qualification Name:  <br><input type="text" name="qual_name" placeholder="Enter Name"><br>
    <p>Required Hours:  <br><input type="text" name="req_hours" placeholder="Enter hours"><br>
    <p>Brief Description: <br><input type="text" name="description" placeholder="Intro to Databases..."><br>
      <input type="submit" value="Submit">
</form>

<?php
if(isset($_POST["qual_code"], $_POST["qual_name"], $_POST["req_hours"], $_POST["description"])){
    $sql = "INSERT into certificates values (" . "'" . $_POST["qual_code"] . "'" . "," . "'" . $_POST["qual_name"] . "'" ."," . $_POST["req_hours"] ."," . "'" .  $_POST["description"] . "'" . ")";
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