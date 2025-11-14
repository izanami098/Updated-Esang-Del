<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Home.css">
    <link rel="stylesheet" href="CSS/Header.css">
    <link rel="stylesheet" href="CSS/Footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Home</title>
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
            <a href="../app/views/auth/LogIn.php" class="login-button">Log In</a>
            <a href="../app/views/auth/SignUp.php" class="signup-button">Sign Up</a>
        </div>
    </nav>

    <div class="carousel">
        <div class="slides">
            <div class="slide"><img src="Images/Card1.png" alt="Slide 1"></div>
            <div class="slide"><img src="Images/Card2.png" alt="Slide 2"></div>
            <div class="slide"><img src="Images/Card3.png" alt="Slide 3"></div>
        </div>
        <button class="arrow left" onclick="moveToSlide(currentSlide - 1)">&#10094;</button>
        <button class="arrow right" onclick="moveToSlide(currentSlide + 1)">&#10095;</button>
        <div class="indicators">
            <div class="indicator active" onclick="moveToSlide(0)"></div>
            <div class="indicator" onclick="moveToSlide(1)"></div>
            <div class="indicator" onclick="moveToSlide(2)"></div>
        </div>
    </div>
    <!-- Design lang muna-->
    <div class="container">
        <!-- Menu Categories Section -->
        <div class="menu-categories-section">
            <h2 class="section-title">Explore Our Delicious Offerings</h2>

            <div class="grid-container">
                <!-- Category Card 1: Delicacies -->
                <div class="category-card">
                    <img src="../public/Images/Full Menu/Delicacies/Black Kutchinta.png" alt="Delicacies" class="category-card-image">
                    <div class="category-card-content">
                        <h3 class="category-card-title">Delicacies</h3>
                        <p class="category-card-description">Sweet and savory treats for every occasion.</p>
                    </div>
                </div>

                <!-- Category Card 2: Frozen Desserts -->
                <div class="category-card">
                    <img src="../public/Images/Full Menu/Desserts/Oreo Graham.png" alt="Frozen Desserts" class="category-card-image">
                    <div class="category-card-content">
                        <h3 class="category-card-title">Frozen Desserts</h3>
                        <p class="category-card-description">Cool and refreshing delights, perfect for any time.</p>
                    </div>
                </div>

                <!-- Category Card 3: Rice Meals -->
                <div class="category-card">
                    <img src="../public/Images/Full Menu/Rice Meals/Siomai Chow Pan.png" alt="Rice Meals" class="category-card-image">
                    <div class="category-card-content">
                        <h3 class="category-card-title">Rice Meals</h3>
                        <p class="category-card-description">Hearty and satisfying rice-based dishes.</p>
                    </div>
                </div>

                <!-- Category Card 4: Drinks -->
                <div class="category-card">
                    <img src="../public/Images/Full Menu/Drinks/Gulaman.png" alt="Drinks" class="category-card-image">
                    <div class="category-card-content">
                        <h3 class="category-card-title">Drinks</h3>
                        <p class="category-card-description">Quench your thirst with our refreshing beverages.</p>
                    </div>
                </div>

                <!-- Category Card 5: Packaged Meals -->
                <div class="category-card">
                    <img src="../public/Images/Full Menu/Packaged Meals/Package1.png" alt="Packaged Meals" class="category-card-image">
                    <div class="category-card-content">
                        <h3 class="category-card-title">Packaged Meals</h3>
                        <p class="category-card-description">Convenient and delicious meals, ready to go.</p>
                    </div>
                </div>

                <!-- Category Card 6: Bilaos -->
                <div class="category-card">
                    <img src="../public/Images/Full Menu/Bilaos/2 in 1 Puto and Cassava.jpg" alt="Bilaos" class="category-card-image">
                    <div class="category-card-content">
                        <h3 class="category-card-title">Bilaos</h3>
                        <p class="category-card-description">Traditional Filipino platters for sharing.</p>
                    </div>
                </div>

                <!-- Category Card 7: Bilao Package -->
                <div class="category-card">
                    <img src="../public/Images/Full Menu/Delicacies/Black Kutchinta.png" alt="Bilao Package" class="category-card-image">
                    <div class="category-card-content">
                        <h3 class="category-card-title">Bilao Package</h3>
                        <p class="category-card-description">Curated bilao combinations for your gatherings.</p>
                    </div>
                </div>

                <!-- Category Card 8: Food Trays -->
                <div class="category-card">
                    <img src="../public/Images/Full Menu/Food Trays/Fried Chicken.jpg" alt="Food Trays" class="category-card-image">
                    <div class="category-card-content">
                        <h3 class="category-card-title">Food Trays</h3>
                        <p class="category-card-description">Large servings perfect for parties and events.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- "New Ground with Esang Delicacies" Section -->
        <div class="intro-section">
            <p class="intro-text">New Ground with Esang Delicacies <br> to be Enjoyed!</p>
            <!-- See Our Menu Button -->
            <a href="Menu.php" class="menu-button">See Our Menus</a>
        </div>
    </div>

    <div class="discover">
        <!-- Discover Best Sellers! Section -->
        <div class="section-header">
            <h2 class="title">Discover Best Sellers!</h2>
        </div>

        <div class="card-grid best-sellers">
            <!-- Sapin-Sapin Bites Card -->
            <div class="card">
                <div class="card-image-container">
                    <img src="../public/Images/Full Menu/Delicacies/Sapin Sapin Bites.png" alt="Sapin-Sapin Bites" class="card-img">
                <div class="price-tag">₱75 <small>PER TUB</small></div>
            </div>
            <div class="card-body">
                <h3 class="card-title">SAPIN - SAPIN BITES</h3>
                <p class="card-text">Sapin-Sapin is made of glutinous rice flour and coconut milk. Soft, chewy, and with rich topping. It's a colorful and delicious treat for all ages.</p>
            </div>
        </div>

            <!-- Palitaw with Yema Card -->
            <div class="card">
                <div class="card-image-container">
                    <img src="../public/Images/Full Menu/Delicacies/Palitaw with Yema.png" alt="Palitaw with Yema" class="card-img">
                    <div class="price-tag">₱60 <small>PER TUB</small></div>
                </div>
                <div class="card-body">
                    <h3 class="card-title">PALITAW WITH YEMA</h3>
                    <p class="card-text">A small, flat, sweet rice cake eaten in the Philippines. These are boiled, drained, and topped with grated coconut, toasted sesame seeds, and brown sugar.</p>
                </div>
            </div>

            <!-- Bibingka sa Latek Card -->
            <div class="card">
                <div class="card-image-container">
                    <img src="../public/Images/Full Menu/Delicacies/Bibingka sa Latik.png" alt="Bibingka sa Latik" class="card-img">
                    <div class="price-tag">₱70 <small>PER TUB</small></div>
                </div>
                <div class="card-body">
                    <h3 class="card-title">BIBINGKA SA LATIK</h3>
                    <p class="card-text">Julia's Mangyanong soft, special made of glutinous rice, coconut milk, and brown sugar perfectly baked, creamy and milky.</p>
                </div>
            </div>
        </div>

        <!-- Featured Rice meals Section -->
        <div class="section-header">
            <h2 class="title">Featured Rice Meals</h2>
        </div>

        <div class="card-grid rice-meals">
            <!-- Chowpan with 4pcs shanghai Card -->
            <div class="card">
                <img src="../public/Images/Full Menu/Rice Meals/Chow Pan with 4pcs Siomai.png" alt="Chowpan with 4pcs shanghai" class="card-img rice-meal-img">
                <div class="card-body rice-meal-body">
                    <h3 class="card-title rice-meal-title"><b>Chowpan with 4pcs shanghai</b></h3>
                    <div class="card-footer-content">
                        <span class="price-text">₱80</span>
                        <button class="cart-icon-bg">
                            <!-- SVG for shopping bag icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.76.759-1.76 1.717v5.697a1.75 1.75 0 0 0 1.76 1.717H20.487c.96 0 1.76-.759 1.76-1.717V8.47a1.75 1.75 0 0 0-1.76-1.717H16.5V6a4.5 4.5 0 1 0-9 0ZM12 9a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 12 9Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Chowpan siomai Card -->
            <div class="card">
                <img src="../public/Images/Full Menu/Rice Meals/Siomai Chow Pan.png" alt="Chowpan siomai" class="card-img rice-meal-img">
                <div class="card-body rice-meal-body">
                    <h3 class="card-title rice-meal-title"><b>Chowpan Siomai</b></h3>
                    <div class="card-footer-content">
                        <span class="price-text">₱80</span>
                        <button class="cart-icon-bg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.76.759-1.76 1.717v5.697a1.75 1.75 0 0 0 1.76 1.717H20.487c.96 0 1.76-.759 1.76-1.717V8.47a1.75 1.75 0 0 0-1.76-1.717H16.5V6a4.5 4.5 0 1 0-9 0ZM12 9a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 12 9Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tapsilog Card -->
            <div class="card">
                <img src="../public/Images/Full Menu/Rice Meals/Tapsilog.png" alt="Tapsilog" class="card-img rice-meal-img">
                <div class="card-body rice-meal-body">
                    <h3 class="card-title rice-meal-title"><b>Tapsilog</b></h3>
                    <div class="card-footer-content">
                        <span class="price-text">₱120</span>
                        <button class="cart-icon-bg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.76.759-1.76 1.717v5.697a1.75 1.75 0 0 0 1.76 1.717H20.487c.96 0 1.76-.759 1.76-1.717V8.47a1.75 1.75 0 0 0-1.76-1.717H16.5V6a4.5 4.5 0 1 0-9 0ZM12 9a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 12 9Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Longsilog Card -->
            <div class="card">
                <img src="../public/Images/Full Menu/Rice Meals/Longsilog.png" alt="Longsilog" class="card-img rice-meal-img">
                <div class="card-body rice-meal-body">
                    <h3 class="card-title rice-meal-title"><b>Longsilog</b></h3>
                    <div class="card-footer-content">
                        <span class="price-text">₱60</span>
                        <button class="cart-icon-bg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.76.759-1.76 1.717v5.697a1.75 1.75 0 0 0 1.76 1.717H20.487c.96 0 1.76-.759 1.76-1.717V8.47a1.75 1.75 0 0 0-1.76-1.717H16.5V6a4.5 4.5 0 1 0-9 0ZM12 9a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 12 9Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="feedback">

        <!-- Left Section: Title and Stars -->
        <div>
            <h1>
                Our<br>Customer<br>Feedbacks
            </h1>
            <div class="star-rating">
                <!-- 5 Star Rating -->
                <svg viewBox="0 0 24 24">
                    <path d="M12 .587l3.668 7.568 8.332 1.209-6.001 5.856 1.416 8.292L12 18.896l-7.415 3.896 1.416-8.292-6.001-5.856 8.332-1.209L12 .587z"/>
                </svg>
                <svg viewBox="0 0 24 24">
                    <path d="M12 .587l3.668 7.568 8.332 1.209-6.001 5.856 1.416 8.292L12 18.896l-7.415 3.896 1.416-8.292-6.001-5.856 8.332-1.209L12 .587z"/>
                </svg>
                <svg viewBox="0 0 24 24">
                    <path d="M12 .587l3.668 7.568 8.332 1.209-6.001 5.856 1.416 8.292L12 18.896l-7.415 3.896 1.416-8.292-6.001-5.856 8.332-1.209L12 .587z"/>
                </svg>
                <svg viewBox="0 0 24 24">
                    <path d="M12 .587l3.668 7.568 8.332 1.209-6.001 5.856 1.416 8.292L12 18.896l-7.415 3.896 1.416-8.292-6.001-5.856 8.332-1.209L12 .587z"/>
                </svg>
                <svg viewBox="0 0 24 24">
                    <path d="M12 .587l3.668 7.568 8.332 1.209-6.001 5.856 1.416 8.292L12 18.896l-7.415 3.896 1.416-8.292-6.001-5.856 8.332-1.209L12 .587z"/>
                </svg>
            </div>
        </div>

        <!-- Right Section: Customer Reviews -->
        <div>

            <!-- Review 1 -->
            <div class="review-card">
                <img src="https://placehold.co/40x40/FF6347/FFFFFF?text=User" alt="User Avatar">
                <div class="review-content">
                    <p>
                        Thank you pooo ubos agad namin ng partner ko di tinipid, solid pa ng lasa ❤️🥰 sure na oorder ulitt
                    </p>
                </div>
                <span class="heart-icon">&#x2764;&#xFE0F;</span>
            </div>

            <!-- Review 2 with Reply -->
            <div class="review-card has-reply">
                <div class="flex items-start space-x-3 w-full">
                    <img src="https://placehold.co/40x40/FF6347/FFFFFF?text=User" alt="User Avatar">
                    <div class="review-content">
                        <p>
                            Thankyou po, ansaraaaap po ng kare-kare!
                        </p>
                    </div>
                    <span class="heart-icon">&#x2764;&#xFE0F;</span>
                </div>
                <!-- Reply -->
                <div class="reply-bubble">
                    Thank you po ma'am
                    <span class="heart-icon">&#x2764;&#xFE0F;</span>
                </div>
            </div>

            <!-- Review 3 -->
            <div class="review-card">
                <img src="https://placehold.co/40x40/FF6347/FFFFFF?text=User" alt="User Avatar">
                <div class="review-content">
                    <p>
                        Taob na po agad samin mag asawa lang pti kaldero
                    </p>
                </div>
                <span class="heart-icon">&#x2764;&#xFE0F;</span>
            </div>

        </div>
    </div>

    <div id="follow">
        <div class="text">
            <i class="fab fa-facebook icon"></i>
            <h2>Follow Esang Delicacies</h2>
            <h5>Freshly Bake Everyday</h5>
        </div>
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
    <script src="JavaScript/Home.js"></script>
</body>
</html>