<?php
// Database configuration
$server = "localhost";
$user = "root";
$pws = "";  // Default XAMPP password is empty
$db = "db_electronic";
$port = 3307;  // ADD THIS LINE - MySQL is running on port 3307

// Create connection with port specified
$conn = mysqli_connect($server, $user, $pws, $db, $port);

// Check connection
if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Optional: Set charset
mysqli_set_charset($conn, "utf8mb4");

echo "Connected successfully";
?>