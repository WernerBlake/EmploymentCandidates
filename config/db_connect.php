<!--created a separate file for database connection code to simplify modification; 
    allowing more options with access and exclusion-->
<?php
    //$ is needed before all variables in PHP (no type needed)
    $servername = "cssql.seattleu.edu";
    $username = "wernerblake";
    $password = "4060970";
    $database = "sr_Team3";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
?>
