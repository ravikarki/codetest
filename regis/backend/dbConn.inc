<?php

define('DB_USER','sankalan_main');
define('DB_PASS','main2015');
define('DB_HOST','localhost');
define('DB_DB','sankalan_main2015');
/*
define('DB_USER','sankalan_testing');
define('DB_PASS','test2015');
define('DB_HOST','localhost');
define('DB_DB','sankalan_testing2015');
/*
define('DB_USER','root');
define('DB_PASS','');
define('DB_HOST','localhost');
define('DB_DB','sank');
*/
// Create connection
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_DB);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>