<?php
session_start();
include 'db.php'; // Ensure this contains a PDO connection ($conn)

if (!isset($_SESSION['id'])) {
    die("User not logged in. Please log in first.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cust_id = $_SESSION['id']; // Correct column name is 'id'
    $bike_id = $_POST['bike_id'];
    $start_date = $_POST['start_date']; 
    $months = $_POST['months'];

    if (empty($bike_id) || empty($start_date) || empty($months)) {
        die("Missing form fields.");
    }

    try {
        // Fetch bike price per month
        $query = "SELECT Price FROM bikes WHERE Bike_ID = :bike_id";
        $stmt = $conn->prepare($query);
        $stmt->execute(['bike_id' => $bike_id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $price_per_month = $row['Price'];

            // Calculate total price
            $total_price = $months * $price_per_month;

            // Insert into subscriptions table
            $insert_query = "INSERT INTO subscriptions (id, bike_id, start_date, duration, total_price, status)
                             VALUES (:cust_id, :bike_id, :start_date, :months, :total_price, 'Active')";
            $stmt = $conn->prepare($insert_query);
            $stmt->execute([
                'cust_id' => $cust_id,
                'bike_id' => $bike_id,
                'start_date' => $start_date,
                'months' => $months,
                'total_price' => $total_price
            ]);

            // echo "Subscription successful!";
            header("Location: subscribesuccess.php");
            exit();
        } else {
            echo "Bike not found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
