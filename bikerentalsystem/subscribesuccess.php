<?php
session_start();
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rental Success</title>
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
            background-color: #333;
            color: white;
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

        .message-box {
            background: #444;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 10px rgba(255, 69, 0, 0.5);
            width: 300px;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #ff4500;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        footer {
            background: #222;
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="wrapper" >
    <main>
        <div class="message-box" style="margin-bottom : 550px;">
            <h2>Thank You for Subscribing!</h2>
            <p>Your bike Subscribtion was successful.</p>
            <a class="btn" href="index.php">Return to Home</a>
        </div>
    </main>

    
</div>
<div style="margin-bottom : 00px;"><?php include 'footer.php'; ?></div>
</body>
</html>
