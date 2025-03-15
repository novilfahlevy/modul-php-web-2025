<?php

// Database connection
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "website_ulasan_buku";

$conn = mysqli_connect($hostname, $username, $password, $dbname, 3360);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}