<?php
$con = new mysqli ('db4free.net','laptop_bekas','b5a7c9f2','laptop_bekas');
$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
