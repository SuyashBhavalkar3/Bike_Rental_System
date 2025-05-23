<?php
session_start();  // Start the session to manage user login state

// Check if customer or salesperson is logged in
$isLoggedIn = isset($_COOKIE['user_email']) || isset($_SESSION['salesperson_id']);
$userEmail = isset($_COOKIE['user_email']) ? $_COOKIE['user_email'] : '';
$salespersonName = isset($_SESSION['name']) ? $_SESSION['name'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="images.jpeg">
    <title>Featured Bikes - Bike Sales and Maintenance</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styles */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f5f5f5;
            padding-top: 60px; /* Space to avoid header overlap */
        }

        /* Header Styles */
        header {
            background-color: #333;
            color: white;
            padding: 20px 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            width: 100%;
        }

        header .container {
            width: 90%;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .logo img {
            height: 50px;
        }

        header .navbar ul {
            list-style-type: none;
            display: flex;
            gap: 20px;
        }

        header .navbar ul li {
            position: relative;
        }

        header .navbar ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        header .navbar ul li a:hover {
            color: #ff6f61;
        }

        header .user-menu {
            position: relative;
        }

        header .user-menu .dropdown {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: #333;
            border-radius: 5px;
            width: 150px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        header .user-menu:hover .dropdown {
            display: block;
        }

        header .email-display {
            color: white;
            font-size: 14px;
        }

        .cta-button {
            background-color: #ff6f61;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }

        .cta-button:hover {
            background-color: #e55a4d;
        }

        /* Main Content */
        main {
            padding: 40px 0;
        }

        .featured-bikes {
            padding: 40px 0;
            text-align: center;
        }

        .featured-bikes h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .bike-cards {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .bike-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            padding: 20px;
        }

        .bike-card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .bike-card h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .bike-card p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        footer .container {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        footer section h2 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        footer section a {
            color: white;
            text-decoration: none;
        }

        footer section a:hover {
            color: #ff6f61;
        }

    </style>
</head>
<body style="background-color:rgb(82, 78, 78);">
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
                <?php if ($isLoggedIn): ?>
                    <!-- If the user is logged in (either as customer or salesperson) -->
                    <li class="user-menu">
                        <a href="#" class="profile-link">Menu</a>
                        <ul class="dropdown">
                            <li><a href="cart.php">Cart</a></li>
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                        <div class="email-display">
                            <?php
                            if (isset($_COOKIE['user_email'])) {
                                echo htmlspecialchars($userEmail);  // Display customer email
                            } else if (isset($_SESSION['name'])) {
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

<main>
    <section class="featured-bikes">
        <div class="container">
            <h2 style="color: #f5f5f5;">Our Featured Bikes</h2>
            <div class="bike-cards">
                <div class="bike-card">
                    <img src="ac.png" alt="Bike Model 1">
                    <h3>Activa</h3>
                    <p>Rs1,000</p>
                    <a href="bike1_details.php" class="cta-button">Learn More</a>
                </div>
                <!-- <div class="bike-card">
                    <img src="pul.png" alt="Bike Model 2">
                    <h3>Pulsar</h3>
                    <p>Rs1,500</p>
                    <a href="bike2_details.php" class="cta-button">Learn More</a>
                </div>
                <div class="bike-card">
                    <img src="bike3.jpeg" alt="Bike Model 3">
                    <h3>Hunter</h3>
                    <p>Rs1,800</p>
                    <a href="bike3_details.php" class="cta-button">Learn More</a>
                </div> -->
                <div class="bike-card">
                    <img src="pi.png" alt="Bike Model 1">
                    <h3>Pulsar</h3>
                    <p>Rs1,1500</p>
                    <a href="bike1_details.php" class="cta-button">Learn More</a>
                </div>
                <div class="bike-card">
                    <img src="bike3.png" alt="Bike Model 1">
                    <h3>Hunter</h3>
                    <p>Rs1,280</p>
                    <a href="bike1_details.php" class="cta-button">Learn More</a>
                </div>
                <div class="bike-card">
                    <img src="sp.png" alt="Bike Model 1">
                    <h3>Splendor</h3>
                    <p>Rs900</p>
                    <a href="bike1_details.php" class="cta-button">Learn More</a>
                </div>
                
            </div>
        </div>
    </section>
</main>



</body>
</html>
