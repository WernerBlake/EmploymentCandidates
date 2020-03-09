<?php include('templates/header.php'); ?>

<h2>Candidate Information:</h2>
	<form method="post">
		<p>Candidate code:  <br><input type="text" name="candid_code" placeholder="Enter integer"><br>
		<p>First Name: <br><input type="text" name="fname" placeholder="Jane"><br>
		<p>Last Name:  <br><input type="text" name="lname" placeholder="Doe"><br>
		<p>Phone Number: <br><input type="text" name="phone" placeholder="0123456789"><br>
		<p>Gender:  <br><input type="text" name="gender" placeholder="M or F"><br>
		<p>Age:  <br><input type="text" name="age" placeholder="Enter integer"><br>
			<input type="submit" value="Submit">
	</form>
<br>
<?php           
	if(isset($_POST["candid_code"], $_POST["fname"], $_POST["lname"], $_POST["phone"], $_POST["gender"], $_POST["age"])){
		$sql = "INSERT into candidates values (" . $_POST["candid_code"] ."," . "'" .  $_POST["fname"] . "'" ."," . "'" .  $_POST["lname"] . "'" ."," .  $_POST["phone"] ."," . "'" .  $_POST["gender"] . "'" . "," .  $_POST["age"] . ")";
		if (mysqli_query($conn, $sql)) {
			echo "New record created successfully";
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn); 
	}

?>
<br>
<?php include('reports_footer.php'); ?>
