<!--php
// Database connection variables
// $host = 'localhost';
// $port = '3306';  // Specify the port
// $dbname = 'bike_sales_maintenance';  // Database name
// $username = 'root';  // Your database username
// $password = '';  // Your database password

// try {
//     // Create a new PDO instance using the DSN string
//     $dsn = "mysql:host=$host;port=$port;dbname=$dbname";
//     $conn = new PDO($dsn, $username, $password);

//     // Set PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
}
?> -->

<?php
// Database connection variables
$host = 'localhost';
$port = '3306';  // Specify the port
$dbname = 'bike_sales_maintenance';  // Database name
$username = 'root';  // Your database username
$password = '';  // Your database password

try {
    // Create a new PDO instance using the DSN string
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname";
    $conn = new PDO($dsn, $username, $password);

    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Log error to a file instead of showing it in the browser
    error_log($e->getMessage(), 3, 'db_errors.log');
    echo "Connection failed. Please try again later.";
}
?>


