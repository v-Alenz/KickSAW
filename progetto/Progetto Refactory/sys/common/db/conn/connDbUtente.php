<?php

$servername = "localhost"; //192.168.1.166 //localhost
$username = "S4750770";
$password = "Animalcrossing"; //saw2021 //
$dbname = "S4750770";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if (!$conn) {
 echo "Failed to connect to MySQL: " . mysqli_error($conn);
}

?>
