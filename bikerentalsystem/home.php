<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="images.jpeg">
    <title>Bike Dealership</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }
        .container {
            width: 80%;
            margin: auto;
            text-align: center;
        }
        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }
        .cta-button {
            display: inline-block;
            background: #ff4500;
            color: white;
            padding: 12px 24px;
            font-size: 1.2rem;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s, transform 0.2s;
        }
        .cta-button:hover {
            background: #ff5722;
            transform: scale(1.05);
        }

        /* Hero Section */
        .hero {
            background: url('hero-bg.jpg') center/cover no-repeat;
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
        }
        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }
        .hero-content {
            position: relative;
            max-width: 800px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            backdrop-filter: blur(5px);
        }
        .hero h1 {
            font-size: 3rem;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }
        .hero p {
            font-size: 1.2rem;
        }

        /* Featured Bikes */
        .bike-cards {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        .bike-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
        .bike-card img {
            width: 100%;
            border-radius: 10px;
        }

        /* Services Section */
        .services {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        .service {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 250px;
            text-align: center;
        }
        .service img {
            width: 80px;
        }

        /* Testimonials */
        .testimonial {
            background: #eee;
            padding: 20px;
            margin: 10px 0;
            border-radius: 5px;
        }

        /* Promotional Section */
        .promotional {
            background: #ff5722;
            color: white;
            padding: 40px 0;
        }
        .countdown {
            font-size: 1.5rem;
            margin-top: 10px;
        }

        /* Why Choose Us */
        .reasons {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        .reason {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 250px;
            text-align: center;
        }
        .reason img {
            width: 80px;
        }

        /* Social Proof */
        .social-links {
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        .social-links img {
            width: 40px;
        }

        /* Newsletter */
        .newsletter {
            background: #333;
            color: white;
            padding: 40px 0;
        }
        .newsletter input {
            padding: 10px;
            width: 250px;
            border-radius: 5px;
            border: none;
        }
        .newsletter button {
            padding: 10px 20px;
            border: none;
            background: #ff4500;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .newsletter button:hover {
            background: #ff5722;
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
<div style="background-image: url('divback.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; position: relative;">
        <section class="hero">
            <div class="hero-content">
                <h1>Ride Your Dream Bike</h1>
                <p>Explore our exclusive collection of bikes and experience the thrill of the road.</p>
                <a href="featured_bikes.php" class="cta-button">Explore Our Bikes</a>
            </div>
        </section>
</div>

    

    <!-- Featured Bikes Section -->
    <section class="featured-bikes" id="bikes" style="background-image: url('top.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; background-color: rgba(0, 0, 0, 0.1); position: relative;">
        <div class="container">
            <h2 style="color: #eee;">Our Top Picks for You</h2>
            <div class="bike-cards">
                <div class="bike-card">
                    <img src="bike1.jpeg" alt="Bike Model 1">
                    <h3>Bike Model 1</h3>
                    <p>Rs1,200</p>
                    <a href="#bike1-details" class="cta-button">Learn More</a>
                </div>
                <div class="bike-card">
                    <img src="bike2.jpeg" alt="Bike Model 2">
                    <h3>Bike Model 2</h3>
                    <p>Rs1,500</p>
                    <a href="#bike2-details" class="cta-button">Learn More</a>
                </div>
                <div class="bike-card">
                    <img src="bike3.jpeg" alt="Bike Model 3">
                    <h3>Bike Model 3</h3>
                    <p>Rs1,800</p>
                    <a href="#bike3-details" class="cta-button">Learn More</a>
                </div>
                <div class="bike-card">
                    <img src="b4.jpeg" alt="Bike Model 3">
                    <h3>Bike Model 4</h3>
                    <p>Rs1,600</p>
                    <a href="#bike3-details" class="cta-button">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Overview Section -->
    <section class="services-overview" id="services" style="background-color: #333;">
        <div class="container">
            <h2 style="color: #eee;">Services We Offer</h2>
            <div class="services">
                <div class="service">
                    <img src="Maintainence.jpeg" alt="Service 1">
                    <h3>Bike Maintenance</h3>
                    <p>Regular check-ups and repairs to keep your bike in top shape.</p>
                </div>
                <div class="service">
                    <img src="customisation.jpeg" alt="Service 2">
                    <h3>Customization</h3>
                    <p>Personalize your bike with various accessories and upgrades.</p>
                </div>
                <div class="service">
                    <img src="Insurance.jpeg" alt="Service 3">
                    <h3>Insurance</h3>
                    <p>Protect your bike with our comprehensive insurance plans.</p>
                </div>
            </div>
        </div>
    </section>

</body>
</html>