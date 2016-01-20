<?php

define('DB_USER','sankalan_main');
define('DB_PASS','main2015');
define('DB_HOST','localhost');
define('DB_DB','sankalan_main2015');

/*$conn = mysql_connect(DB_HOST,DB_USER,DB_PASS) or die('Could not connect to the MySQL Database. Please try again later. '.mysql_error());

if($conn) 
{
    mysql_select_db(DB_DB);
} 
else 
{
    echo "<p class=\"warning\">Could not connect to the dataBase.</p>";
    echo "<p>We apologise for the inconvenience</p>";
    exit();
}*/
/*$servername = "localhost";
$username = "root";
$password = "";
$database = "sank";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);*/
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_DB);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>