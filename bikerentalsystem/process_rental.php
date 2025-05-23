<?php
session_start();
include 'db.php'; // Ensure this contains a PDO connection ($conn)

if (!isset($_SESSION['id'])) {
    die("User not logged in. Please log in first.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cust_id = $_SESSION['id']; // User ID from session
    $Bike_ID = $_POST['bike_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    try {
        // Fetch bike price per day
        $query = "SELECT Price FROM bikes WHERE Bike_ID = :bike_id";
        $stmt = $conn->prepare($query);
        $stmt->execute(['bike_id' => $Bike_ID]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $price_per_day = $row['Price'];

            // Calculate total price
            $start = new DateTime($start_date);
            $end = new DateTime($end_date);
            $interval = $start->diff($end);
            $days = max(1, $interval->days); // Ensure minimum 1 day
            $total_price = $days * $price_per_day;

            // Insert into rentals table
            $insert_query = "INSERT INTO rentals (id, Bike_ID, start_date, end_date, total_price, status)
                             VALUES (:cust_id, :bike_id, :start_date, :end_date, :total_price, 'Active')";
            $stmt = $conn->prepare($insert_query);
            $stmt->execute([
                'cust_id' => $cust_id,
                'bike_id' => $Bike_ID,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'total_price' => $total_price
            ]);

            // echo "Bike rented successfully!";
            header("Location: rentsuccess.php");
            exit();

        } else {
            echo "Bike not found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
