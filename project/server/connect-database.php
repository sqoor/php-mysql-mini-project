<?php
$hostname = "localhost";
$username = "root";
$password = "mysql120130";
$dbname = "users";

global $conn;
$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected to database...<br>";
}