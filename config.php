<?php


//SQL Connect
$host = 'localhost';
$user = 'root';
$pass = 'rooted';
$db = 'cci_odn';



$sql_connect = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}