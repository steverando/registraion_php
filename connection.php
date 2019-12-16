<?php
$serverName = "localhost";
$userName = "root";
$password = "password";
$databaseName = "larvine";

$conn = mysqli_connect($serverName, $userName, $password, $databaseName);

if (!$conn) {
    echo "!!! not connected";
} else {
    //echo "connected";
}
