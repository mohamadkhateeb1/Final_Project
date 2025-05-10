<?php
$serverName="localhost";
$userename="root";
$Password="";
$databaseName="database";
$conn=new mysqli($serverName,$userename,$Password,$databaseName);
if($conn->connect_error){
    die("coneection filed :". $conn->connect_error);
}
$createData="CREATE TABLE IF NOT EXISTS products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT NOT NULL, 
    image VARCHAR(255) NOT NULL
)";

?>
