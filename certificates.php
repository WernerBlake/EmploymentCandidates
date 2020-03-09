<!--includes the header file in this file-->
<?php include('templates/header.php'); ?>
<!--title of this page-->
<h2>Certificates Information:</h2>

<!-- Forms are kind of like maps that last for the scope of a page -->

<!--$_GET form can hold 2000 characters and updates using the URL, making the information public for everyone
    good if you want to bookmark the page with the information you have inserted-->

<!--$_POST form has no limit and is private, updating via the HTTP request.
    Cannot be bookmarked because no date is given the url-->

<!--$_GET and $_POST as refered to as superglobals because they can be accessed anywhere reguardless of scope-->

    <!--this form is set to insert data into a $_POST with method="post"-->
    
    <!--method-"get" would insert data into the $_GET-->
<form method="post">
    <!--I placed the <p> tag to allow the option of editing the title for each text box-->
    <p>Qualification code:  <br><input type="text" name="qual_code" placeholder="Enter Code"><br>
                        <!--The input tags allow use to have text boxes-->
    <p>Candidate code:  <br><input type="text" name="candid_code" placeholder="Enter integer"><br>
                                        <!--The name is the key that the text will be stored with-->
    <p>Date Earned:  <br><input type="text" name="date_earned" placeholder="YYYY-MM-DD"><br>
                                                        <!--the placeholder is the grey text within the text box-->
    <p>Hours Spent: <br><input type="text" name="hours_spent" placeholder="Enter integer"><br>
                        <!--<br> is an html new line tag-->
    <p>Qualification Host: <br><input type="text" name="host" placeholder="Enter Host Name"><br>
    <!--type="submit" creates a button-->
                        <!--value is the text inside the button-->
    <input type="submit" value="Submit">
<!--This is how you close a form-->
</form>

<!--IMPORTANT: canvas slides did not use forms and instead inserted the values directly in the code-->
<?php
//if() statement verifies that the form has a value for each text box we created
//isset() returns true if there is a value in the form
if(isset($_POST["qual_code"], $_POST["candid_code"], $_POST["date_earned"], $_POST["hours_spent"], $_POST["host"])){
            //strings and php variables need to be separated so that the php can pull the value out of the form
                                            // . is used to concatenate strings together
                                                                // don't forget that SQL strings need single quotes
            //the string doesnt seem to recognise queries that dont start in all UPPER CASE
    $sql = "INSERT into certificates values (" . "'" . $_POST["qual_code"] . "'" . "," .  $_POST["candid_code"] ."," . "'" .  $_POST["date_earned"] . "'" ."," .  $_POST["hours_spent"] . "," . "'" .  $_POST["host"] . "'" . ")";
    //if() statement checks the connection to the database and that the table and query work 
        //mysqli_query() returns bool of the connection status and table exist
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } 
    //else statement triggers error because SQL query MUST have all values for all columns
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    //closes the connection
    mysqli_close($conn); 
}
?>
<!--attatches the footer to this file-->
<!--I created multiple wrappers for footer.php so that I could give different files different hyperlinks
    because I wanted to be able to exclude 'Home' on the home page, etc, etc-->
<?php include('reports_footer.php'); ?>