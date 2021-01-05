SECTIONS:

    1.  Understanding website structure

    2.  How to run the website locally

    3.  Using CSS1 to run your website

    4.  Understanding php for final

<----------------------------------Section 1---------------------------------->

The a few files that I uploaded have been heavily commented to explain every
step taken and decision made. A lot of the files are redundant so I only 
commented one of each file type.

In canvas the files have been organized into folders. I had trouble figuring
how to link out of a folder, so for the time being the footer.php files were
removed from the template/ folder and the id-#.php (which contain the queries)
& the insert files (named after the tables they insert into) have had their
respective folders deleted.

As far as I can tell, I have addressed almost all of the different elements of
HTML, CSS, and PHP that were used in the page.

I suggest you read through the code and comments in this order:
    1) header.php           (located in the template folder)
       -covers code that essentially sets up initialization 
        and style for all pages. 

    2) db_connect.php       (located in the config folder)
        -covers code used to connect with the server and 
         SQL database.

    3) db_disconnect.php    (located in the template folder)
        -covers second half of the connection code
         (separated soley for design and style)

    4) footer.php
        -covers code that closes out the website

    5) index.php
        -covers the home page (mostly html code)

    6) id-1.php
        -covers PHP code that is used and SQL query to print
         a table onto a website.

    7) certificate.php
        -covers how HTML Forms are used to retrieve data from
         the user and insert that data into an SQL table


<----------------------------------Section 2---------------------------------->

I set up a few things to run my website locally while still being connected to
the MySQL server. 
This allowed me to simple hit: 
                    ctrl+s -> select browser -> F5
to view how my changes to code affected the webpage. I highly recommend this,
especially if we're losing access to CSS1.

steps:

    1)  download an editor that works with PHP 
        -I had to use Visual Studio Code and add the extensions 
         PHP IntelliSense & PHP Debug.

    2)  Go to: https://www.apachefriends.org/index.html

    3)  download and install

    4)  open your xampp folder (mine was saved under local disc)

    5)  open htdocs folder

    6)  create a new folder for your webpage to be stored

    7)  Open your editor and create a new file in the folder you just made
        -General naming semantics for a first page seem to be 'index.php'
        -My folder address : C:\xampp\htdocs\PHPinVisualStudioCode\
    
    8)  in the empty file type and exclamation mark (!) and hit enter

    9)  Type something like 'Hello, World' (don't use quotes) in between
        they <body></body> tags.

    10) save the file.

        ***************************************************************
        *** If you are on a school network already, skip to step 13 ***
        ***************************************************************

    11) Go to: https://www.seattleu.edu/its/support/downloads/

    12) download the VPN and follow the instructions to set it up
        -its super easy and makes life way easier off campus

    13) Open the xampp-control application in the xampp folder
        -My folder address: C:\xampp

    14) for the Apache Module click the Start Action

        ***************************************************************
        *** If you DO NOT need access to MySQL: continue to step 19 ***
        ***************************************************************

    15) press configure in the top right of the GUI

    16) Open the Service and Port Settings

    17) under the MySQL tab set service name to: cssql.seattleu.edu

    18) save these settings and select Start Action for the MySQL Module

    19) Open a new web browser tab

    20) Open the URL: localhost/'Your_Folder_Name/Your_File_Name.php'
        -My URL was: localhost/PHPinVisualStudioCode/index.php


<----------------------------------Section 3---------------------------------->

1) Open WinSCP

2) open pr create a connection to css1.seattleu.edu

3) log into css1 with your MySU/cs1 log in

4) transfer the files from your computer into css1

5) varify that you are logged into a VPN or wifi with your MySU/cs1/css1 
   credentials

6) open your url in a browser
   -My URL was: css1.seattleu.edu/~wernerblake/index.php


<----------------------------------Section 4---------------------------------->

"These pieces of code from Reeder's slides matches up line by line with the 
 'Key Take Aways' I wrote up. Remember that she said we should be able to solve
  the answers to the PHP questions with a single sentence. So... This is 100%
  overkill."                      
                -Blake

                  *******************************************
                  *** inserting into a database using PHP ***
                  *******************************************
      * certificates.php has a fully commented version of this same procedure. *
    
    Key take aways:
        -PHP code should always be written inside the tags: 
            <?php 
                //PHP code here      
            ?>
        -PHP statements end with a semicolon (;)
        -PHP variables always start with $
        -mysqli_connect() establishes connection and inserts data into $conn to
         verify this
        -mysqli_connect(host, username, password, dbname, port, socket)
         (all parameters are optional)
        -die() prints a string and closes the connection
        -the . operator is used to concatenate strings
            -this allows the php function mysqli_connect_error() to be run 
             and then added to the text that HTML will print
        -SQL statements are inserted into a variable inside double quotes ("")
            -Notice that the strings in the INSERT have single quotes and the
             integers do not; Just like in SQL
        -mysqli_query() verifies that the query worked
        -echo places PHP strings into the html to be displayed on the webpage
        -mysqli_close() closes the connection

<?php
    $servername = "cssql.seattleu.edu";
    $username = “***";
    $password = “***";
    $dbname = “***";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO COURSES VALUES ('CS460', 'Software Engineering', 'U4', 5)";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?> 

    -If you want to insert multiple rows into a table with only one "New Record..." 
     returned, you have two options that Reeder included in the slides:
        1) simple connect more data using a comma 
            $sql = "INSERT INTO COURSES 
                    VALUES('CS420', 'Security', 'U4', 5),(...),(ect);";
            Nothing else has to change.
        
        2) use the .= operator to concatenate another insert statement in
            in the $sql variable pass it into mysqli_multi_query():

            $sql = "INSERT INTO COURSES VALUES ('CS550', 'Algorithm', 'G1', 6);";
            $sql .= "INSERT INTO COURSES VALUES ('CS530', 'Linear', 'G2', 6);";
            
            if (mysqli_multi_query($conn, $sql)){...}

                  *******************************************
                  *** Selecting from a database using PHP ***
                  *******************************************
      * id-1.php has a fully commented version of this same procedure. *
    
    Key take aways:
        -Connection stuff is the same as above
        -$result is an array that basically holds the table found using the 
         query in $sql
        -mysqli_num_rows() verifys that there are rows to return from that 
         table query
        -the echos in this if() statement simply push table information into
         the html so that it back be displayed on the webpage
        -the while loop runs until mysqli_fetch_row() places what is essentially
         an 'empty' inside $row
            -don't mix this up with == from other languages
        -a for loop prints every column cell of the table using $row[i] until
         mysqli_num_fields() determines that the row has no more columns
        -and then before closing the connection (like in the Insert example)
         we use mysqli_free_result() to free the data inside the $result array.

<?php
    $servername = "cssql.seattleu.edu";
    $username = “***";
    $password = “***";
    $dbname = “***";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT COURSE_CODE, COURSE_NAME FROM COURSES";

    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<table border = '1'>\n";

        // output data of each row
        while($row = mysqli_fetch_row($result)) {
            echo "<tr>\n";
            for ($i = 0; $i < mysqli_num_fields($result); $i++){
            echo "<td>" . $row[$i] . "</td>\n";
            }
            echo "</tr>\n";
        }
        echo "</table>\n";
    } else {
        echo "0 results";
    }
    mysqli_free_result($result);
    mysqli_close($conn);
?> 

            *******************************************************
            *** Updating and Deleting from a database using PHP ***
            *******************************************************
    Key take aways:        
        
        -Its the exact same code as insert except that:
            -you use a UPDATE or DELETE statement
            -your if statement at the end prints information related to
             UPDATE or DELETE
<?php
    //connection semantics simulated

    $sql = "UPDATE COURSES SET COURSE_NAME = 'Computer Networks' 
            WHERE COURSE_CODE = 'CS420'";
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>
<?php
    $sql = “delete from COURSES where COURSE_CODE = ‘CS420’”;
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>

                     ************************************
                     *** HTML Forms: $_POST and $_GET ***
                     ************************************
   * certificates.php has a fully commented version of these forms in action *

    Key take aways:
        -$_POST and $_GET are forms
        -Forms can be used with input statements to hold data passed in by the
         webpage visitor
        -$_POST and $_GET are operate like Hash Maps, requiring a key
        -$_POST is private and have no size limit
        -$_GET is public, displays data in the URL, and has a size limit
         of 2000 characters
        -$_POST and $_GET are known as 'super globals' because they can be
         used anywhere reguardless of scope.
        -method determines what Form will be used
        -input:
            -type determines what is stored
            -name determines the key that will be used to access the data from
             the Form
            -placeholder is the light grey text inside the text bar

<form method="post">
    Course Number:  <input type="text" name="course_num" placeholder="Enter integer">
    Qualification code:  <input type="text" name="qual_code" placeholder="Enter Code">
    Course Description:  <input type="text" name="date_earned" placeholder="Intro to Databases...">
        <input type="submit" value="Submit">
</form>
<?php
    $sql = "INSERT into course values 
            ("  . $_POST["course_num"]   . "," 
            . "'" .  $_POST["qual_code"] . "'" . "," 
            . "'" .   $_POST["date_earned"] . "'" . ")";
?>
