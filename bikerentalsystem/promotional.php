<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotional Offers</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/jpeg" href="images.jpeg">
    <script>
        function startCountdown(duration) {
            let timer = duration, hours, minutes, seconds;
            setInterval(function () {
                hours = Math.floor(timer / 3600);
                minutes = Math.floor((timer % 3600) / 60);
                seconds = timer % 60;
                document.getElementById('countdown-timer').textContent = 
                    (hours < 10 ? "0" : "") + hours + ":" +
                    (minutes < 10 ? "0" : "") + minutes + ":" +
                    (seconds < 10 ? "0" : "") + seconds;
                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }
        window.onload = function () {
            let countdownTime = 24 * 60 * 60;
            startCountdown(countdownTime);
        };
    </script>
</head>
<body style="background-color: #333;">
<?php include 'header.php'; ?>
<div style="display: flex; background-color: rgb(40, 39, 37); justify-content: center; align-items: center; height: 10vh;">
    <h1 style="color: white;">Promotional</h1>
</div>
    <section class="promotional" style="background-color: #333;">
        <div class="container">
            <h2>Special Offers</h2>
            <p>Don't miss our exclusive deals on bikes and accessories.</p>
            <div class="offer">
                <h2>Limited Time Offer!</h2>
                <p>Get up to 20% off on selected bikes.</p>
                <p>Offer expires in:</p>
                <div id="countdown-timer">00:00:00</div>
                <a href="offers.php" class="cta-button">View All Offers</a>
            </div>
        </div>
    </section>
</body>
</html>
<footer style="background-color: rgb(40, 39, 37);
               color: white; text-align: center;
               padding: 10px; width: 100%;
               position: fixed; bottom: 0;">
    <div class="footer-container">
        <section id="testimonials">
            <h2><a href="testimonials.php">Testimonials</a></h2>
        </section>

        <section id="promotional">
            <h2><a href="promotional.php">Promotional</a></h2>
        </section>

        <section id="why-choose-us">
            <h2><a href="chooseus.php">Why Choose Us</a></h2>
        </section>
    </div>
    <style>
        footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
            margin-top: 0px;
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
</footer>
