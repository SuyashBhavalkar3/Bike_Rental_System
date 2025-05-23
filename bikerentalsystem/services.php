<?php
session_start();  // Start session for user authentication

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
    <title>Our Services</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }
        header, footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px;
            position: fixed;
            width: 100%;
            left: 0;
        }
        header {
            top: 0;
        }
        footer {
            bottom: 0;
        }
        .container {
            width: 80%;
            margin: auto;
        }
        .content {
            flex: 1;
            margin-top: 80px;
            margin-bottom: 60px;
            text-align: center;
            padding: 20px;
        }
        .service-box {
            background: #f4f4f4;
            margin: 20px auto;
            padding: 20px;
            width: 50%;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body style="background-color: #333;">

<header>
<?php include 'header.php'; ?>
</header>
<div style="background-color: #333; margin-top: 100px;">
<div class="content" style="background-color: #333; margin-top: auto;">
    <h2 style="color: #f4f4f4;">Services</h2>
    <div class="service-box">
        <h3>Bike Sales</h3>
        <p>We offer a wide range of bikes at competitive prices.</p>
    </div>
    <div class="service-box">
        <h3>Maintenance & Repairs</h3>
        <p>Our experts ensure your bike is always in top condition.</p>
    </div>
    <div class="service-box">
        <h3>Spare Parts</h3>
        <p>Genuine spare parts for all major bike brands.</p>
    </div>
    <div class="service-box">
        <h3>Customization</h3>
        <p>Customize your bike to suit your style and needs.</p>
    </div>
</div>
</div>
</body>
</html>
