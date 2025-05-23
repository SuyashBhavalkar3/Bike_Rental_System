<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bike_sales_maintenance";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch bikes from the database
$query = "SELECT * FROM bikes";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="images.jpeg">
    <title>Available Bikes</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { padding: 20px; }
        .bike-list { display: flex; flex-wrap: wrap; gap: 20px; }
        .bike-item { background-color: white; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); width: calc(33% - 20px); box-sizing: border-box; }
        .bike-item img { width: 100%; height: auto; border-radius: 5px; }
        .bike-item h3 { font-size: 1.2rem; margin-top: 10px; }
        .bike-item .price { font-weight: bold; font-size: 1.2rem; }
    </style>
</head>
<body style="background-color: #333;">
    <?php include 'header.php'; ?>
    <div class="container" style="margin-top: 130px;">
        <h1 style="text-align: center; color: #f4f4f4; margin-right: 40px;">Bikes Available</h1>
        <div class="bike-list">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class='bike-item'>
                    <img src='uploads/<?= $row['Image'] ? $row['Image'] : "bike1.jpeg" ?>' alt='Bike Image'>
                    <h3><?= $row['Bike_Name'] ?></h3>
                    <p><?= $row['Description'] ?></p>
                    <p class='price'>Price: Rs<?= $row['Price'] ?>  Per Month </p>
                    
                    <!-- Rent Form -->
                    <form action="process_rental.php" method="POST">
                        <input type="hidden" name="bike_id" value="<?= $row['Bike_ID'] ?>">
                        <label>Start Date: <input type="date" name="start_date" required></label>
                        <label>End Date: <input type="date" name="end_date" required></label>
                        <button type="submit">Rent This Bike</button>
                    </form>
                    
                    <!-- Subscribe Form -->
                    <form action="process_subscription.php" method="POST">
                        <input type="hidden" name="bike_id" value="<?= $row['Bike_ID'] ?>">
                        <label>Subscription Duration (Months): <input type="number" name="months" min="1" required></label>
                        <label>Start Date: <input type="date" name="start_date" required></label>
                        <button type="submit">Subscribe to This Bike</button>
                    </form>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
<?php $conn->close(); ?>
