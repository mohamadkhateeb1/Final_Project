<?php
$serverName = "localhost";
$username = "root"; 
$password = ""; 
$databaseName = "database";
$conn= new mysqli($serverName, $username, $password, $databaseName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$usersTable = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) DEFAULT 'user'
)";

// $re = $conn->query($usersTable);

?>