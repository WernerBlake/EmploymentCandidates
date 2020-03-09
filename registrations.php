<?php include('templates/header.php'); ?>

<h2>Registrations Information:</h2>
<form method="post">
    <p>Candidate code:  <br><input type="text" name="candid_code" placeholder="Enter integer"><br>
    <p>Session Number: <br><input type="text" name="session_num" placeholder="Enter Number"><br>
    <p>Date Registered:  <br><input type="text" name="date_reg" placeholder="YYYY-MM-DD"><br>
        <input type="submit" value="Submit">
</form>

<?php
if(isset($_POST["candid_code"], $_POST["session_num"], $_POST["date_reg"])){
    $sql = "INSERT into register values (" . $_POST["candid_code"] ."," . $_POST["session_num"] . "," . "'" . $_POST["date_reg"] . "'" . ")";
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