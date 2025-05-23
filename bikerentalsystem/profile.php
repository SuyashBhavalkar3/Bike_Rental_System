<?php
session_start();
include 'db.php';

// Check if user is logged in
if (!isset($_SESSION['salesperson_id']) && !isset($_COOKIE['user_email'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Fetch user details
if (isset($_SESSION['salesperson_id'])) {
    $stmt = $conn->prepare("SELECT Name, Phone, Email FROM salesperson WHERE id = ?");
    $stmt->execute([$_SESSION['salesperson_id']]);
} else {
    $stmt = $conn->prepare("SELECT Name, Phone, Email FROM cust_info WHERE Email = ?");
    $stmt->execute([$_COOKIE['user_email']]);
}

$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="images.jpeg">
    <title>Profile</title>
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

        .profile-container {
            margin-top: 100px; /* Push content down to avoid header overlap */
            padding: 20px;
        }

        .profile-card {
            display: inline-block;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            text-align: left;
        }

        h2 {
            color: #333;
        }

        .logout-btn {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .logout-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body style="background-color:rgb(58, 57, 57);">

<header style="background-color: rgb(26, 25, 24);;" >
<?php include 'header.php'; ?>
</header>

<div  style="margin-top: 150PX; color: white;">
    <h1>Profile</h1>
    <p>Here are your details:</p>
</div>

<div class="profile-container">
    <div class="profile-card">
        <h2>Welcome, <?php echo htmlspecialchars($user['Name']); ?>!</h2>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['Phone']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['Email']); ?></p>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</div>
<div style="position: fixed; bottom: 0; left: 0; width: 100%; background-color: #f1f1f1; text-align: center;">
    <?php include 'footer.php'; ?>
</div>

</body>
</html>
