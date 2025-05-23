<?php
session_start();  // Start the session to manage user login state

// Check if salesperson is logged in
$isLoggedIn = isset($_SESSION['salesperson_id']);
$salespersonName = isset($_SESSION['name']) ? $_SESSION['name'] : '';

if (!$isLoggedIn) {
    // If salesperson is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// Database connection (adjust with your credentials)
$servername = "localhost";
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "bike_sales_maintenance"; // Replace with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Form submission handling (for adding a new bike)
    $bikeModel = $_POST['model'];
    $bikePrice = $_POST['price'];
    $bikeStock = $_POST['stock']; // Updated field name to Stock
    $bikeDescription = $_POST['description'];

    // Handle the image upload
    $image = $_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $imageError = $_FILES['image']['error'];

    // Sanitize the input to prevent SQL injection
    $bikeModel = $conn->real_escape_string($bikeModel);
    $bikePrice = (int)$bikePrice;
    $bikeStock = (int)$bikeStock;
    $bikeDescription = $conn->real_escape_string($bikeDescription);

    // Debugging the input data
    echo "<pre>";
    //print_r($_POST);
    //print_r($_FILES);
    echo "</pre>";

    // Prepare the image for upload
    if ($imageError === 0) {
        $imageExt = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($imageExt, $allowedExtensions)) {
            if ($imageSize < 5000000) { // Limit file size to 5MB
                $imageNewName = uniqid('', true) . '.' . $imageExt;
                $imageDestination = 'uploads/' . $imageNewName;

                // Move the uploaded image to the 'uploads' directory
                if (move_uploaded_file($imageTmp, $imageDestination)) {
                    // Prepare the SQL query to insert the bike details
                    $query = "INSERT INTO bikes (Bike_Name, Price, Stock, Description, Image) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("siiss", $bikeModel, $bikePrice, $bikeStock, $bikeDescription, $imageNewName);

                    // Execute the query to insert the bike details
                    if ($stmt->execute()) {
                        echo "<p>Bike added successfully!</p>";
                        
                    } else {
                        echo "<p>Error executing query: " . $stmt->error . "</p>";
                        error_log("Error: " . $stmt->error); // Logs error to PHP error log
                    }

                    $stmt->close();
                } else {
                    echo "Error uploading image.";
                }
            } else {
                echo "Image size is too large. Maximum allowed size is 5MB.";
            }
        } else {
            echo "Invalid image type. Allowed types: jpg, jpeg, png, gif.";
        }
    } else {
        echo "Error uploading the image. Please try again.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bike</title>

    <!-- CSS to style the form -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: white;
            padding: 20px 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .container {
            width: 75%;  /* Reduced width to avoid header overlapping */
            margin: 0 auto;
            padding-top: 140px; /* Increased padding to prevent overlap with fixed header */
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }

        header {
    background-color: #333;
    color: white;
    padding: 20px 0;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    width: 100%;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    height: 80px; /* You can adjust this to your header's height */
}

.container {
    width: 75%;  /* Reduced width to avoid header overlapping */
    margin: 0 auto;
    padding-top: 100px; /* Increased padding to prevent overlap with fixed header */
}


        input[type="submit"] {
            background-color: #f39c12;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 15px;
        }

        input[type="submit"]:hover {
            background-color: #e67e22;
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
        }

        .back-link {
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }

        .back-link:hover {
            color: #f39c12;
        }
    </style>
</head>
<body style="background-color: #333;">
<?php include 'header.php'; ?>

    <div class="container">
        <h1 style="color: #f4f4f4;">Add New Bike</h1>
        <div class="form-container" style="margin-top: 80px;">
            <form method="POST" enctype="multipart/form-data">
                <label for="model">Bike Model:</label>
                <input type="text" id="model" name="model" required>

                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required></textarea>

                <label for="price">Price:</label>
                <input type="number" id="price" name="price" required>

                <label for="stock">Stock Quantity:</label>
                <input type="number" id="stock" name="stock" required>

                <label for="image">Upload Image:</label>
                <input type="file" id="image" name="image" accept="image/*" required>

                <input type="submit" value="Add Bike" style="background-color: red;">
            </form>

            <div class="form-footer">
                <a href="index.php" class="back-link">Back to Home</a>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
