<!--created a separate file for database disconnection code to simplify modification; 
    allowing more options with access, exclusion and placement of connection status string-->
<?php 
    if (!$conn) {
        //die() is an alias for exit() and will print a string and then execute
        die("Connection failed: " . mysqli_connect_error());
    } 
    //else
    echo "Connected successfully";
?>