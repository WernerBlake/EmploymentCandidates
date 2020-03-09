<!--This is how you write a comment in HTML-->

<!--When opening an .html or .php page in most editors; type in '!' (an exclamation mark) and hit enter
    and the HTML5 formating will automatically populate-->
<!DOCTYPE html>
<html lang="en">
<head>
    <!--title tag places this text in the tab-->
    <title>TEC Database</title>
</head>
<!--  including the databade connection settings for all files that include the header -->
<?php include("config/db_connect.php"); ?>
<body>

    <!-- setting the orientation to center for all files that include the header -->
    <div class="row">
        <div class="col-xs-1 center-block" style="text-align:center;">
            
            <!--setting the style for all tags that include the header-->
            <style>
                a {
                    font-size: 16px;
                    color: #7a3b2e;
                }
                h1 {
                color: #454140;
                }
                h2 {
                    color: #587e76;
                font-size: 20px;
                }
                p {
                    color: #a79e84;
                font-size: 16px;
                }
                table {
                border-collapse: collapse;
                }
                table, th, td {
                border: 1px solid black;
                }
                html, body {
                    width: 100%;
                }
                table {
                    margin: 0 auto;
                }
                tr:nth-child(even) {background-color: #f2f2f2;}
            </style>