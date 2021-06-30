<?php

define('DB_HOST', 'db4free.net');
define('DB_USER','laptop_bekas');
define('DB_PASS' ,'b5a7c9f2');
define('DB_NAME', 'laptop_bekas');
$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
//$con = new mysqli ('db4free.net','laptop_bekas','b5a7c9f2','laptop_bekas');
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
