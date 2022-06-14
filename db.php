<?php
$server = "localhost";
$username = "root";
$password = "";
$dbName = "school";

$conn = mysqli_connect($server, $username, $password, $dbName);

if ($conn) {
    // echo "Connected";
} else {
    // echo "Error";
}
