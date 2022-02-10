<?php

$servername = "192.168.1.166";
$username = "root";
$password = "saw2021";
$dbname = "starterpunchdatabase";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if (!$conn) {
 echo "Failed to connect to MySQL: " . mysqli_error($conn);
}

?>
