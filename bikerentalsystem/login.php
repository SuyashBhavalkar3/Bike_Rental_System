<?php
include 'db.php'; // Database connection

session_start(); // Start session

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST['role']; 
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } else {
        try {
            if ($role === 'customer') {
                $stmt = $conn->prepare("SELECT id, Password FROM cust_info WHERE Email = ?");
            } elseif ($role === 'salesperson') {
                $stmt = $conn->prepare("SELECT ID, Name, Password FROM salesperson WHERE Email = ?");
            } else {
                $error_message = "Invalid role selected.";
                $stmt = null;
            }

            if ($stmt) {
                $stmt->execute([$email]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($result && password_verify($password, $result['Password'])) {
                    if ($role === 'customer') {
                        $_SESSION['id'] = $result['id'];  // Store customer ID
                        $_SESSION['user_email'] = $email;
                        setcookie('user_email', $email, time() + 3600, "/");
                    } elseif ($role === 'salesperson') {
                        $_SESSION['salesperson_id'] = $result['ID'];
                        $_SESSION['name'] = $result['Name'];
                    }

                    header("Location: index.php"); // Redirect to homepage or dashboard
                    exit();
                } else {
                    $error_message = "Invalid email or password.";
                }
            }
        } catch (PDOException $e) {
            $error_message = "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/jpeg" href="images.jpeg">
</head>
<body style="background-color: #333;">
<div style="background-color: #333;">
    <div class="wrapper" style="margin-top: 70px;">
        <?php include 'header.php'; ?>
        <main>
            <form action="login.php" method="post">
                <h2>Login</h2>
                <?php if (!empty($error_message)) { echo "<p style='color: red;'>$error_message</p>"; } ?>
                <select name="role" required>
                    <option value="">Select Role</option>
                    <option value="customer">Customer</option>
                    <option value="salesperson">Salesperson</option>
                </select>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" style="background-color: #ff4500;">Login</button>
            </form>
        </main>
        
    </div>
    <div style="display: flex; color: #ff4500; flex-direction: column; justify-content: center; align-items: center; background-color: #333; margin-top: 10px;">
        <div style="color:rgb(255, 85, 23);"><p>Dont have account</p></div>
        <div style="color:rgb(255, 85, 23);"><a href="signup.php" style="color: #ff4500;">Signup as CUSTOMER</a></div>
        <div style="color: red;"><a href="salesperson_signup.php" style="color: #ff4500;">Signup as SALESPERSON</a></div>
    </div>

    </div>
    <div style="position: fixed; bottom: 0; left: 0; width: 100%; background-color: #f1f1f1; text-align: center;">
    <?php include 'footer.php'; ?>
    </div>
    
</body>
</html>
