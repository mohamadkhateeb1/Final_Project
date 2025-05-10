<?php
$serverName = "localhost";
$username = "root"; 
$password = ""; 
$databaseName = "database";

$conn= new mysqli($serverName, $username, $password, $databaseName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$createData="CREATE TABLE IF NOT EXISTS products_cart (
    id INT PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT NOT NULL, 
    image VARCHAR(255) NOT NULL,
    section VARCHAR(50) NOT NULL
)";
// $re = $conn->query($createData);

?>