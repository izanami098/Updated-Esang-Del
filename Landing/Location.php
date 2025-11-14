<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location</title>
    <link rel="stylesheet" href="CSS/Header.css">
    <link rel="stylesheet" href="CSS/Footer.css">
    <link rel="stylesheet" href="CSS/Location.css">
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

   <div class="location">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d482.27979649812823!2d121.038679!3d14.755596!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b1e4bd1003f3%3A0xb140b5e153eb5efb!2sEsang&#39;s%20Delicacies!5e0!3m2!1sen!2sph!4v1753102439712!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
   </div>

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