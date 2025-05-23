<?php
// Database connection
$host = 'localhost';
$port = '3306';
$dbname = 'bike_sales_maintenance';
$username = 'root';
$password = '';  // Your MySQL password

// Create a MySQLi connection
$conn = new mysqli($host, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize error message
$error_message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } elseif (strlen($password) < 6) { // Check for password length
        $error_message = "Password must be at least 6 characters long.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO salesperson (Name, Email, Phone, Password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $hashed_password);

        // Execute the statement
        if ($stmt->execute()) {
            //echo "New salesperson record created successfully";
            header("Location: login.php");
            exit();
        } else {
            $error_message = "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Salesperson Signup</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/jpeg" href="images.jpeg">
    <style>
        /* Ensure full height and flexbox layout */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex-grow: 1; /* Pushes the footer to the bottom */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        form {
            background: #f4f4f4;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
            width: 100%;
        }
    </style>
</head>
<body style="background-color: #333;">

<div class="wrapper">
    <?php include 'header.php'; ?>

    <main>
        <form action="salesperson_signup.php" method="post">
            <h2>Salesperson Signup</h2>
            <?php
            if (!empty($error_message)) {
                echo "<p style='color: red;'>$error_message</p>";
            }
            ?>
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="tel" name="phone" placeholder="Phone" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" style="background-color : #ff4500;">Signup</button>
        </form>
    </main>

    <?php include 'footer.php'; ?>
</div>

</body>
</html>
