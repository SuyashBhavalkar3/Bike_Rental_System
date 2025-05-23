<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "bike_sales_maintenance";
$port = "3306"; // Try 3306 first, change to 3307 if needed

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Database connection successful!";
?>
