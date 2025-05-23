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
    <link rel="icon" type="image/jpeg" href="favicon.png">
    <title>Bike Sales and Maintenance</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/jpeg" href="images.jpeg">

    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensures content takes full height before footer */
        }

        /* Header */
        header {
            background-color: #222;
            padding: 15px 0;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            text-align: center;
        }

        /* Navigation Bar */
        .navbar ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .navbar ul li {
            display: inline;
        }
        .navbar a {
            color: white;
            text-decoration: none;
        }
        .navbar a:hover {
            color: #f39c12;
        }

        /* Hero Section */
        .hero-section {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50vh;
        }
        .hero-section h1 {
            color: white;
            font-size: 2.5rem;
        }

        /* Content Section */
        .content {
            flex-grow: 1; /* Allows content to expand without affecting footer */
            padding: 20px;
            text-align: center;
        }
        .reasons {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .reason {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 250px;
        }
        .reason img {
            width: 80px;
            margin-bottom: 10px;
        }
        .reason h3 {
            color: #007BFF;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .reason p {
            color: #555;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: auto; /* Pushes footer to the bottom */
        }
        .footer-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }
        footer section {
            flex: 1;
            min-width: 150px;
        }
        footer h2 {
            font-size: 16px;
            margin-bottom: 10px;
        }
        footer a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        footer a:hover {
            color: #f39c12;
        }
    </style>
</head>
<body>

<!-- Header -->
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
                    <li class="user-menu">
                        <a href="#" class="profile-link">Menu</a>
                        <ul class="dropdown">
                            <li><a href="cart.php">Cart</a></li>
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="logout.php">Logout</a></li>

                            <?php if ($isSalespersonLoggedIn): ?>
                                <li><a href="add_bike.php">Add Bike</a></li>
                            <?php endif; ?>

                            <?php if ($isCustomerLoggedIn): ?>
                                <li><a href="view_bikes.php">View Bikes</a></li>
                            <?php endif; ?>
                        </ul>
                        <div class="email-display">
                            <?php
                            if ($isCustomerLoggedIn) {
                                echo htmlspecialchars($userEmail);
                            } else if ($isSalespersonLoggedIn) {
                                echo htmlspecialchars($salespersonName);
                            }
                            ?>
                        </div>
                    </li>
                <?php else: ?>
                    <li><a href="login.php" class="cta-button">Login</a></li>
                    <li><a href="signup.php" class="cta-button">Customer Signup</a></li>
                    <li><a href="salesperson_signup.php" class="cta-button">Salesperson Signup</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<!-- Hero Section -->
<div class="hero-section" style="background-color: #333; color: #fefefe;">
    <h1 style="color: #fefefe; margin-top: 30px;">Why Choose Us</h1>
</div>

<!-- Content Section -->
<div class="content" style="background-color: #333;">
    <div class="container">
        <div class="reasons">
            <div class="reason">
                <img src="reason1.jpeg" alt="Expert Technicians">
                <h3>Expert Technicians</h3>
                <p>Our team is highly skilled and experienced in bike maintenance.</p>
            </div>
            <div class="reason">
                <img src="reason2.jpeg" alt="Quality Bikes">
                <h3>Quality Bikes</h3>
                <p>We offer only the highest quality bikes from top brands.</p>
            </div>
            <div class="reason">
                <img src="reason3.png" alt="Affordable Prices">
                <h3>Affordable Prices</h3>
                <p>Competitive pricing to fit your budget without compromising quality.</p>
            </div>
            <div class="reason">
                <img src="reason4.jpeg" alt="Excellent Customer Support">
                <h3>Excellent Customer Support</h3>
                <p>Our customer service team is here to assist you with any queries.</p>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <div class="footer-container">
        <section><h2><a href="testimonials.php">Testimonials</a></h2></section>
        <section><h2><a href="promotional.php">Promotional</a></h2></section>
        <section><h2><a href="chooseus.php">Why Choose Us</a></h2></section>
    </div>
</footer>

</body>
</html>
