<?php
session_start();
include 'db.php';

// Check if user is logged in
if (!isset($_SESSION['salesperson_id']) && !isset($_COOKIE['user_email'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Fetch cart items
if (isset($_SESSION['salesperson_id'])) {
    $stmt = $conn->prepare("SELECT b.Bike_Name, b.Price FROM cart c JOIN bikes b ON c.Bike_ID = b.Bike_ID WHERE c.salesperson_id = ?");
    $stmt->execute([$_SESSION['salesperson_id']]);
} else {
    $stmt = $conn->prepare("SELECT b.Bike_Name, b.Price FROM cart c JOIN bikes b ON c.Bike_ID = b.Bike_ID WHERE c.Email = ?");
    $stmt->execute([$_COOKIE['user_email']]);
}

$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        header {
            background-color: #333;
            color: white;
            padding: 15px;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        .cart-container {
            margin-top: 100px; /* Push content down to avoid header overlap */
            padding: 20px;
        }

        .cart-table {
            width: 60%;
            margin: auto;
            border-collapse: collapse;
        }

        .cart-table th, .cart-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .cart-table th {
            background-color: #007bff;
            color: white;
        }

        .cart-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .checkout-btn {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: white;
            background-color: #28a745;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .checkout-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<header>
    <h1>Your Cart</h1>
</header>

<div class="cart-container">
    <table class="cart-table">
        <tr>
            <th>Bike Name</th>
            <th>Price</th>
        </tr>
        <?php if (count($cartItems) > 0): ?>
            <?php foreach ($cartItems as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['Bike_Name']); ?></td>
                    <td>$<?php echo htmlspecialchars($item['Price']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="2">Your cart is empty.</td>
            </tr>
        <?php endif; ?>
    </table>

    <?php if (count($cartItems) > 0): ?>
        <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
    <?php endif; ?>
</div>

</body>
</html>
