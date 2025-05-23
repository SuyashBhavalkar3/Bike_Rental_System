<?php
session_start();  // Start the session to manage user login state

// Check if customer or salesperson is logged in
$isCustomerLoggedIn = isset($_COOKIE['user_email']);
$isSalespersonLoggedIn = isset($_SESSION['salesperson_id']);
$userEmail = isset($_COOKIE['user_email']) ? $_COOKIE['user_email'] : '';
$salespersonName = isset($_SESSION['name']) ? $_SESSION['name'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="images.jpeg">
    <title>Bike Sales and Maintenance</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <div class="container">
        <div class="logo">
            <a href="index.php"><img src="images.jpeg" alt="Bike Sales and Maintenance"></a>
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="featured_bikes.php">Featured Bikes</a></li>
                <li><a href="services.php">Services</a></li>
                
                <?php if ($isCustomerLoggedIn || $isSalespersonLoggedIn): ?>
                    <!-- If the user is logged in (either as customer or salesperson) -->
                    <li class="user-menu">
                        <a href="#" class="profile-link">Menu</a>
                        <ul class="dropdown">
                            <li><a href="cart.php">Cart</a></li>
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="logout.php">Logout</a></li>

                            <?php if ($isSalespersonLoggedIn): ?>
                                <!-- If the logged-in user is a salesperson, show the "Add Bike" option -->
                                <li><a href="add_bike.php">Add Bike</a></li>
                            <?php endif; ?>

                            <?php if ($isCustomerLoggedIn): ?>
                                <!-- If the logged-in user is a customer, show the "View Bikes" option -->
                                <li><a href="view_bikes.php">View Bikes</a></li>
                            <?php endif; ?>
                        </ul>
                        <div class="email-display">
                            <?php
                            if ($isCustomerLoggedIn) {
                                echo htmlspecialchars($userEmail);  // Display customer email
                            } else if ($isSalespersonLoggedIn) {
                                echo htmlspecialchars($salespersonName);  // Display salesperson name
                            }
                            ?>
                        </div>
                    </li>
                <?php else: ?>
                    <!-- If the user is not logged in -->
                    <li><a href="login.php" class="cta-button">Login</a></li>
                    <li><a href="signup.php" class="cta-button">Customer Signup</a></li>
                    <li><a href="salesperson_signup.php" class="cta-button">Salesperson Signup</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
</body>
</html>
