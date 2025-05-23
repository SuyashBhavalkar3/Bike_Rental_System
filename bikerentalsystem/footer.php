<footer style="background-color:rgb(40, 39, 37);">
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