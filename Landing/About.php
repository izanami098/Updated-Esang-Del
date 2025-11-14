<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="CSS/Header.css">
    <link rel="stylesheet" href="CSS/Footer.css">
    <link rel="stylesheet" href="CSS/About.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-logo">
            <img src="Images/Logo.png" alt="Logo"> </div>
        <a href="#" class="toggle-button" aria-label="Toggle navigation">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div class="navbar-links">
            <ul>
                <li><a href="Index.php">Home</a></li>
                <li><a href="Menu.php">Menu</a></li>
                <li><a href="Location.php">Location</a></li>
                <li><a href="About.php">About Us</a></li>
            </ul>
        </div>
        <div class="navbar-buttons">
            <a href="../app/views/auth/LogIn.html" class="login-button">Log In</a>
            <a href="../app/views/auth/SignUp.html" class="signup-button">Sign Up</a>
        </div>
    </nav>

    <main>
        <section id="about" class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <img src="Images/Picture1.png" alt="Esang Delicacies owner preparing food" class="hero-image">
                    <div class="hero-text">
                        <p>Esang Delicacies started with a passion for bringing homemade treats to every table. What began in a small kitchen is now a beloved branding North, Caloocan City known for its rich flavors, dishes and delicacies recipes.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="bestseller" class="bestseller-section">
            <div class="container">
                <h2 class="section-title">Best Seller</h2>
                <div class="bestseller-content">
                    <div class="bestseller-text">
                        <p>Our best-selling Leche Flan is a crowd favorite, known for its silky-smooth texture, rich caramel glaze, and melt-in-your-mouth goodness. Each bite delivers a nostalgic taste of home, made with the perfect balance of creamy custard and golden caramel, just like how grandma used to make it.</p>
                    </div>
                    <img src="Images/Full Menu/Delicacies/Leche Flan.png" alt="Esang Delicacies Leche Flan" class="bestseller-image">
                </div>
            </div>
        </section>

        <section id="owner" class="owner-section">
            <div class="container">
                <div class="owner-content">
                    <img src="Images/Card2.png" alt="Maria Theresa Esguerra, Owner of Esang's Delicacies" class="owner-image">
                    <div class="owner-text">
                        <p>Maria Theresa Esguerra's passion for creating delicious homemade delicacies goes beyond just great flavors it's about sharing tradition, love, and inspiration. Her journey with Esang Delicacies is a testament to hard work and dedication, inspiring others to pursue their dreams and turn their passion into something meaningful. Through her business, she continues to bring joy to people's tables while encouraging aspiring entrepreneurs to follow their own paths.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer-container">
        <div class="footer-left">
            <img src="Images/Logo 2.png" alt="Esang Delicacies Logo" class="footer-logo">
        </div>
        <div class="footer-right">
            <p class="follow-text">Follow us and Contact us Via:</p>
            <div class="contact-item">
                <i class="fas fa-envelope icon"></i>
                <span>Esangsdelicacies@gmail.com</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-map-marker-alt icon"></i>
                <span>Sampaguita Street,Palmera Springs 1 Subdivision</span>
            </div>
            <div class="contact-item">
                <i class="fab fa-facebook icon"></i>
                <a href="https://www.facebook.com/pastillasflan">Esang Delicacies</a>
            </div>
        </div>
    </footer>
    <script src="JavaScript/Header.js"></script>
</body>
</html>