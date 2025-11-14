<?php 
   include("Header.html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="CSS/Menu.css">
    <link rel="stylesheet" href="CSS/Header.css">
    <link rel="stylesheet" href="CSS/Footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

    <div class="menu-contents">
        <div class="menu-tab">
            <button class="menu-button active" data-category="delicacies"><i class="fa-solid fa-cookie"></i><span style="color: white;"> Delicacies</span></button>
            <button class="menu-button" data-category="ulams"><i class="fa-solid fa-utensils"></i><span style="color: white;"> Ulams</span></button>
            <button class="menu-button" data-category="rice-meals"><i class="fa-solid fa-utensils"></i><span style="color: white;"> Rice Meals</span></button>
            <button class="menu-button" data-category="drinks"><i class="fa-solid fa-whiskey-glass"></i><span style="color: white;"> Drinks</span></button>
            <button class="menu-button" data-category="bilaos"><i class="fa-solid fa-stroopwafel"></i><span style="color: white;"> Bilaos</span></button>
            <button class="menu-button" data-category="desserts"><i class="fa-solid fa-ice-cream"></i><span style="color: white;"> Desserts</span></button>
            <button class="menu-button" data-category="bilao-package"><i class="fa-solid fa-stroopwafel"></i><span style="color: white;"> Bilao Package</span></button>
            <button class="menu-button" data-category="packaged-meals"><i class="fa-solid fa-basket-shopping"></i><span style="color: white;"> Packaged Meals</span></button>
            <button class="menu-button" data-category="food-trays"><i class="fa-solid fa-utensils"></i><span style="color: white;"> Food Trays</span></button>
        </div>

        <!-- Menu items for delicacies -->
        <div id="delicacies-grid" class="menu-grid active-grid">
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Baked Ube Halaya with Leche Flan.png" alt="Baked Ube Halaya with Leche Flan">
                <h3>Baked Ube Halaya w/ Leche Flan</h3>
                <p class="price">₱85.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Baked Ube Halaya.png" alt="Baked Ube Halaya">
                <h3>Baked Ube Halaya</h3>
                <p class="price">₱60.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Bibingka sa Latik.png" alt="Bibingka sa Latik">
                <h3>Bibingka sa Latik</h3>
                <p class="price">₱70.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Biko.png" alt="Biko">
                <h3>Biko</h3>
                <p class="price">₱50.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Black Kutchinta.png" alt="Black Kutchinta">
                <h3>Black Kutchinta</h3>
                <p class="price">₱70.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Carbonara with Garlic Bread.png" alt="Carbonara with Garlic Bread">
                <h3>Carbonara w/ Garlic Bread</h3>
                <p class="price">₱75.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Carbonara.png" alt="Carbonara with Puto">
                <h3>Carbonar w/ Puto</h3>
                <p class="price">₱70.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Carbonara.png" alt="Carbonara">
                <h3>Carbonara</h3>
                <p class="price">₱60.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Cassava Cake.png" alt="Cassava Cake">
                <h3>Cassava Cake</h3>
                <p class="price">₱60.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Empanada.png" alt="Empanada">
                <h3>Empanada</h3>
                <p class="price">₱45.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Ginataang Bilo Bilo.png" alt="Ginataang Bilo Bilo">
                <h3>Ginataang Bilo Bilo</h3>
                <p class="price">₱50.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Kalamay sa Latik.png" alt="Kalamay sa Latik">
                <h3>Kalamay sa Latik</h3>
                <p class="price">₱50.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Leche Flan.png" alt="Leche Flan">
                <h3>Leche Flan</h3>
                <p class="price">₱65.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Lumpiang Sariwa.png" alt="Lumpiang Sariwa">
                <h3>Lumpiang Sariwa</h3>
                <p class="price">₱75.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Maja Blanca.png" alt="Maja Blanca">
                <h3>Maja Blanca</h3>
                <p class="price">₱50.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Maruya.png" alt="Maruya">
                <h3>Maruya</h3>
                <p class="price">₱30.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Nilupak.png" alt="Nilupak">
                <h3>Nilupak</h3>
                <p class="price">₱50.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/No Baked Macaroni.png" alt="No Baked Macaroni">
                <h3>No Baked Macaroni</h3>
                <p class="price">₱60.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Okoy.png" alt="Okoy">
                <h3>Okoy</h3>
                <p class="price">₱30.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Palabok with Puto.png" alt="Palabok with Puto">
                <h3>Palabok w/ Puto</h3>
                <p class="price">₱45.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Palabok.png" alt="Palabok">
                <h3>Palabok</h3>
                <p class="price">₱60.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Palitaw with Yema Filling.png" alt="Palitaw with Yema Filling">
                <h3>Palitaw w/ Yema Filling</h3>
                <p class="price">₱50.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Palitaw with Yema.png" alt="Palitaw with Yema">
                <h3>Palitaw w/ Yema</h3>
                <p class="price">₱60.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Pichi Pichi.png" alt="Pichi Pichi">
                <h3>Pichi Pichi</h3>
                <p class="price">₱50.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Puto.png" alt="Puto">
                <h3>Puto</h3>
                <p class="price">₱40.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Ready to Fry Longganisa 8pcs.png" alt="Ready to Fry Longganisa 8pcs">
                <h3>Ready to Fry: Longganisa 8pcs</h3>
                <p class="price">₱100.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Ready to Steam Asado Siopao.png" alt="Ready to Steam Asado Siopao">
                <h3>Ready to Steam: Asado Siopao</h3>
                <p class="price">₱350.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Sapin Sapin Bites.png" alt="Sapin Sapin Bites">
                <h3>Sapin Sapin Bites</h3>
                <p class="price">₱75.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Siomai 10pcs.png" alt="Siomai 10pcs">
                <h3>Siomai (10pcs)</h3>
                <p class="price">₱140.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Siopao.png" alt="Siopao">
                <h3>Siopao</h3>
                <p class="price">₱60.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Sopas.png" alt="Sopas">
                <h3>Sopas</h3>
                <p class="price">₱50.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Sotanghon with Puto.png" alt="Sotanghon with Puto">
                <h3>Sotanghon w/ Puto</h3>
                <p class="price">₱50.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Sotanghon.png" alt="Sotanghon">
                <h3>Sotanghon</h3>
                <p class="price">₱70.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Suman Lihiya.png" alt="Suman Lihiya">
                <h3>Suman Lihiya</h3>
                <p class="price">₱50.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Turon Bites.png" alt="Turon Bites">
                <h3>Turon Bites</h3>
                <p class="price">₱60.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Ube Macapuno Turon 3pcs.png" alt="Ube Macapuno Turon 3pcs">
                <h3>Ube Macapuno Turon (3pcs)</h3>
                <p class="price">₱60.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Delicacies/Yema Ube Biko.png" alt="Yema Ube Biko">
                <h3>Yema Ube Biko</h3>
                <p class="price">₱60.00</p>
            </div>
        </div>

        <!-- Menu items for ulams -->
        <div id="ulams-grid" class="menu-grid">
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Adobong Baboy.png" alt="Adobong Baboy">
                <h3>Adobong Baboy</h3>
                <p class="price">₱150.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Beef Caldereta.png" alt="Beef Caldereta">
                <h3>Beef Caldereta</h3>
                <p class="price">₱150.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Beef Kare Kare.png" alt="Beef Kare Kare">
                <h3>Beef Kare Kare</h3>
                <p class="price">₱150.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Binagoongan.png" alt="Binagoongan">
                <h3>Binagoongan</h3>
                <p class="price">₱130.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Bistek Tagalog.png" alt="Bistek Tagalog">
                <h3>Bistek Tagalog</h3>
                <p class="price">₱150.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Bopis.png" alt="Bopis">
                <h3>Bopis</h3>
                <p class="price">₱130.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Buttered Shrimp.png" alt="Buttered Shrimp">
                <h3>Buttered Shrimp</h3>
                <p class="price">₱140.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Chicken Adobo.png" alt="Chicken Adobo">
                <h3>Chicken Adobo</h3>
                <p class="price">₱150.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Chicken Afritada.png" alt="Chicken Afritada">
                <h3>Chicken Afritada</h3>
                <p class="price">₱140.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Chicken Caldereta.png" alt="Chicken Caldereta">
                <h3>Chicken Caldereta</h3>
                <p class="price">₱140.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Chicken Curry.png" alt="Chicken Curry">
                <h3>Chicken Curry</h3>
                <p class="price">₱140.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Chicken Feet.png" alt="Chicken Feet">
                <h3>Chicken Feet</h3>
                <p class="price">₱110.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Chicken Hamonado.png" alt="Chicken Hamonado">
                <h3>Chicken Hamonado</h3>
                <p class="price">₱140.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Chopsuey.png" alt="Chopsuey">
                <h3>Chopsuey</h3>
                <p class="price">₱100.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Crispy Beef Kare Kare.png" alt="Crispy Beef Kare Kare">
                <h3>Crispy Beef Kare Kare</h3>
                <p class="price">₱140.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Crispy Pork Kare Kare.png" alt="Crispy Chicken Kare Kare">
                <h3>Crispy Pork Kare Kare</h3>
                <p class="price">₱150.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Dinuguan.png" alt="Dinuguan">
                <h3>Dinuguan</h3>
                <p class="price">₱140.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Garlic Parmesan Chicken.png" alt="Garlic Parmesan Chicken">
                <h3>Garlic Parmesan Chicken</h3>
                <p class="price">₱60.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Gatang Monggo.png" alt="Gatang Monggo">
                <h3>Gatang Monggo</h3>
                <p class="price">₱150.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Gatang Sitaw Kalabasa with Shrimp.png" alt="Gatang Sitaw Kalabasa with Shrimp">
                <h3>Gatang Sitaw Kalabasa w/ Shrimp</h3>
                <p class="price">₱45.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Gatang Tilapia.png" alt="Gatang Tilapia">
                <h3>Gatang Tilapia</h3>
                <p class="price">₱130.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Giniling with Boiled Egg.png" alt="Giniling with Boiled Egg">
                <h3>Giniling with Boiled Egg</h3>
                <p class="price">₱150.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Chicken Feet.png" alt="Chicken Feet">
                <h3>Honey Garlic Chicken</h3>
                <p class="price">₱140.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Laing with Lechon.png" alt="Laing with Lechon">
                <h3>Laing w/ Lechon</h3>
                <p class="price">₱130.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Lechon Paksiw.png" alt="Lechon Paksiw">
                <h3>Lechon Paksiw</h3>
                <p class="price">₱150.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Lechon Sisig.png" alt="Lechon Sisig">
                <h3>Lechon Sisig</h3>
                <p class="price">₱150.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Longganisa 8pcs.png" alt="Longganisa 8pcs">
                <h3>Longganisa (8pcs)</h3>
                <p class="price">₱100.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Meatballs with Gravy.png" alt="Meatballs with Gravy">
                <h3>Meatballs w/ Gravy</h3>
                <p class="price">₱100.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Menudo.png" alt="Menudo">
                <h3>Menudo</h3>
                <p class="price">₱150.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Miswa with Meatballs.png" alt="Miswa with Meatballs">
                <h3>Miswa w/ Meatballs</h3>
                <p class="price">₱100.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Nilagang Pork Ribs.png" alt="Nilagang Pork Ribs">
                <h3>Nilagang Pork Ribs</h3>
                <p class="price">₱150.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Orange Chicken.png" alt="Orange Chicken">
                <h3>Orange Chicken</h3>
                <p class="price">₱140.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Oyster Beef with Mixed Veggies.png" alt="Oyster Beef with Mixed Veggies">
                <h3>Oyster Beef w/ Mixed Veggies</h3>
                <p class="price">₱60.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Paksiw na Pata.png" alt="Paksiw na Pata">
                <h3>Paksiw na Pata</h3>
                <p class="price">₱150.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Pan Grilled Liempo.png" alt="Pan Grilled Liempo">
                <h3>Pan Grilled Liempo</h3>
                <p class="price">₱140.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Pork Steak.png" alt="Pork Steak">
                <h3>Pork Steak</h3>
                <p class="price">₱140.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Ready to Fry Cordon Bleu.png" alt="Ready to Fry Cordon Bleu">
                <h3>Ready to Fry: Cordon Bleu</h3>
                <p class="price">₱150.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Ready to Fry Embutido.png" alt="Ready to Fry Embutido">
                <h3>Ready to Fry: Embutido</h3>
                <p class="price">₱140.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Ready to Fry Fish Fillet.png" alt="Ready to Fry Fish Fillet">
                <h3>Ready to Fry: Fish Fillet</h3>
                <p class="price">₱120.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Ready to Fry Shanghai.png" alt="Ready to Fry Shanghai">
                <h3>Ready to Fry: Shanghai</h3>
                <p class="price">₱100.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Ready to Fry Siomai 10pcs.png" alt="Ready to Fry Siomai 10pcs">
                <h3>Ready to Fry: Siomai (10pcs)</h3>
                <p class="price">₱140.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Ready to Heat Tapa.png" alt="Ready to Heat Tapa">
                <h3>Ready to Heat Tapa</h3>
                <p class="price">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Roast Beef.png" alt="Roast Beef">
                <h3>Roast Beef</h3>
                <p class="price">₱150.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Sipo Egg.png" alt="Sipo Egg">
                <h3>Sipo Egg</h3>
                <p class="price">₱140.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Sisig.jpg" alt="Sisig">
                <h3>Sisig</h3>
                <p class="price">₱150.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Sparibs Caldereta sa Gata.png" alt="Sparibs Caldereta sa Gata">
                <h3>Sparibs Caldereta sa Gata</h3>
                <p class="price">₱140.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Sparibs Caldereta.png" alt="Sparibs Caldereta">
                <h3>Sparibs Caldereta</h3>
                <p class="price">₱140.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Sweet and Sour Meatballs.png" alt="Sweet and Sour Meatballs">
                <h3>Sweet & Sour Meatballs</h3>
                <p class="price">₱100.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Ulam/Tortang Talong.png" alt="Tortang Talong">
                <h3>Tortang Talong</h3>
                <p class="price">₱100.00</p>
            </div>
        </div>

        <!-- Menu items for rice meals -->
        <div id="rice-meals-grid" class="menu-grid">
            <div class="menu-item">
                <img src="Images/Full Menu/Rice Meals/Beef Pares with Rice.jpg" alt="Beef Pares with Rice">
                <h3>Beef Pares w/ Rice</h3>
                <p class="price">₱100.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Rice Meals/Cheesedogsilog.png" alt="Cheesedogsilog">
                <h3>Cheesedogsilog</h3>
                <p class="price">₱100.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Rice Meals/Chicken Fingers.png" alt="Chicken Fingers">
                <h3>Chicken Fingers</h3>
                <p class="price">₱75.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Rice Meals/Chow Pan with 4pcs Siomai.png" alt="Chow Pan with 4pcs Siomai">
                <h3>Chow Pan w/ 4pcs Siomai</h3>
                <p class="price">₱80.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Rice Meals/Hamsilog.png" alt="Hamsilog">
                <h3>Hamsilog</h3>
                <p class="price">₱100.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Rice Meals/Longsilog.png" alt="Longsilog">
                <h3>Longsilog</h3>
                <p class="price">₱60.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Rice Meals/Molo Soup.png" alt="Molo Soup">
                <h3>Molo Soup</h3>
                <p class="price">₱75.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Rice Meals/Shanghai Rice.png" alt="Shanghai Rice">
                <h3>Shanghai Rice</h3>
                <p class="price">₱75.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Rice Meals/Siomai Chow Pan.png" alt="Siomai Chow Pan">
                <h3>Siomai Chow Pan</h3>
                <p class="price">₱80.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Rice Meals/Siomai Rice.png" alt="Siomai Rice">
                <h3>Siomai Rice</h3>
                <p class="price">₱75.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Rice Meals/Sisig Rice.png" alt="Sisig Rice">
                <h3>Sisig Rice</h3>
                <p class="price">₱120.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Rice Meals/Tapsilog.png" alt="Tapsilog">
                <h3>Tapsilog</h3>
                <p class="price">₱120.00</p>
            </div>
        </div>

        <!-- Menu items for drinks -->
        <div id="drinks-grid" class="menu-grid">
            <div class="menu-item">
                <img src="Images/Full Menu/Drinks/Avocado Shake.png" alt="Avocado Shake">
                <h3>Avocado Shake</h3>
                <p class="price">₱70.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Drinks/Banana Con Yelo.png" alt="Banana Con Yelo">
                <h3>Banana Con Yelo</h3>
                <p class="price">₱60.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Drinks/Gulaman.png" alt="Gulaman">
                <h3>Gulaman</h3>
                <p class="price">₱35.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Drinks/Macapuno Jar.png" alt="Macapuno Jar">
                <h3>Macapuno Jar</h3>
                <p class="price">₱240.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Drinks/Mais Con Yelo.png" alt="Mais Con Yelo">
                <h3>Mais Con Yelo</h3>
                <p class="price">₱60.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Drinks/Mango Con Yelo.png" alt="Mango Con Yelo">
                <h3>Mango Con Yelo</h3>
                <p class="price">₱70.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Drinks/Mango Shake.png" alt="Mango Shake">
                <h3>Mango Shake</h3>
                <p class="price">₱70.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Drinks/Special Halo Halo.png" alt="Special Halo Halo">
                <h3>Special Halo Halo</h3>
                <p class="price">₱80.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Drinks/Ube Macapuno.png" alt="Ube Macapuno">
                <h3>Ube Macapuno</h3>
                <p class="price">₱75.00</p>
            </div>
        </div>

        <!-- Menu items for bilaos -->
        <div id="bilaos-grid" class="menu-grid">
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/2 in 1 Biko and Maja Blanca.jpg" alt="2 in 1 Biko and Maja Blanca">
                <h3>2 in 1 Biko and Maja Blanca</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/2 in 1 Sapin Sapin Bites and Maja Blanca.jpg" alt="2 in 1 Biko and Maja Blanca">
                <h3>2 in 1 Sapin Sapin Bites and Maja Blanca</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/2 in 1 Sapin Sapin Bites and Pichi Pichi.jpg" alt="2 in 1 Biko and Maja Blanca">
                <h3>2 in 1 Sapin Sapin Bites and Pichi Pichi</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/3 in 1 Biko Maja Blanca and Pichi Pichi.jpg" alt="2 in 1 Biko and Maja Blanca">
                <h3>3 in 1 Biko Maja Blanca and Pichi Pichi</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/3 in 1 Cassava Sapin Sapin Bites and Pichi Pichi.jpg" alt="2 in 1 Biko and Maja Blanca">
                <h3>3 in 1 Cassava Sapin Sapin Bites and Pichi Pichi</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/3 in 1 Maja Blanca Sapin Sapin Bite and Pichi Pichi.jpg" alt="2 in 1 Biko and Maja Blanca">
                <h3>3 in 1 Maja Blanca Sapin Sapin Bite and Pichi Pichi</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/3 in 1 Pichi Pichi Sapin Sapin Bites and Biko.jpg" alt="2 in 1 Biko and Maja Blanca">
                <h3>3 in 1 Pichi Pichi Sapin Sapin Bites and Biko</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/3 in 1 Pichi Pichi Sapin Sapin Bites and Maja Blanca.jpg" alt="2 in 1 Biko and Maja Blanca">
                <h3>3 in 1 Pichi Pichi Sapin Sapin Bites and Maja Blanca</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/3 in 1 Sapin Sapin Bites 2pcs Cassava and Maja Blanca.jpg" alt="2 in 1 Biko and Maja Blanca">
                <h3>3 in 1 Sapin Sapin Bites 2pcs Cassava and Maja Blanca</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/3 in 1 Sapin Sapin Pichi Pichi and Black Kutchinta.jpg" alt="2 in 1 Biko and Maja Blanca">
                <h3>3 in 1 Sapin Sapin Pichi Pichi and Black Kutchinta</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/4 in 1 Pichi Pichi Sapin Sapin Maja Blanca and Biko.jpg" alt="4 in 1 Pichi Pichi Sapin Sapin Maja Blanca and Biko">
                <h3>4 in 1 Pichi Pichi Sapin Sapin Maja Blanca and Biko</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/4 in 1 Puto Sapin Sapin Pichi Pichi and Maja Blanca.jpg" alt="4 in 1 Puto Sapin Sapin Pichi Pichi and Maja Blanca">
                <h3>4 in 1 Puto Sapin Sapin Pichi Pichi and Maja Blanca</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/4 in 1 Sapin Sapin Bite Black Kutchinta Palitaw and Pichi Pichi.jpg" alt="4 in 1 Sapin Sapin Bite Black Kutchinta Palitaw and Pichi Pichi">
                <h3>4 in 1 Sapin Sapin Bites Black Kutchinta Palitaw and Pichi Pichi</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/4 in 1 Sapin Sapin Bites Biko Cassava and Kutchinta.jpg" alt="4 in 1 Sapin Sapin Bites Biko Cassava and Kutchinta">
                <h3>4 in 1 Sapin Sapin Bites Biko Cassava and Kutchinta</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price" id="bilao-price-2in1">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/4 in 1 Sapin Sapin Maja Blanca Kutchinta Biko.jpg" alt="4 in 1 Sapin Sapin Maja Blanca Kutchinta Biko">
                <h3>4 in 1 Sapin Sapin Maja Blanca Kutchinta Biko</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price" id="bilao-price-2in1">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/Biko.jpg" alt="Biko">
                <h3>Biko</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price" id="bilao-price-2in1">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/Cassava.jpg" alt="Cassava">
                <h3>Cassava</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price" id="bilao-price-2in1">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/Cordon Bleu.jpg" alt="Cordon Bleu">
                <h3>Cordon Bleu</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price" id="bilao-price-2in1">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/Fish Fillet.jpg" alt="Fish Fillet">
                <h3>Fish Fillet</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price" id="bilao-price-2in1">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/Maja Blanca.jpg" alt="Maja Blanca">
                <h3>Maja Blanca</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price" id="bilao-price-2in1">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/Puto.jpg" alt="Puto">
                <h3>Puto</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price" id="bilao-price-2in1">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/Sapin Sapin Bites.jpg" alt="Sapin Sapin Bites">
                <h3>Sapin Sapin Bites</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price" id="bilao-price-2in1">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/Sapin Sapin.jpg" alt="Sapin Sapin">
                <h3>Sapin Sapin</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price" id="bilao-price-2in1">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/Shanghai.jpg" alt="Shanghai">
                <h3>Shanghai</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price" id="bilao-price-2in1">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/Spaghetti.jpg" alt="Spaghetti">
                <h3>Spaghetti</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price" id="bilao-price-2in1">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/Special Pancit Bihon.jpg" alt="Special Pancit Bihon">
                <h3>Special Pancit Bihon</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price" id="bilao-price-2in1">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/Special Pancit Canton.jpg" alt="Special Pancit Canton">
                <h3>Special Pancit Canton</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price" id="bilao-price-2in1">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/Special Seafood Palabok.jpg" alt="Special Seafood Palabok">
                <h3>Special Seafood Palabok</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price" id="bilao-price-2in1">₱250.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/Special Sotanghon Guisado.jpg" alt="Special Sotanghon Guisado">
                <h3>Special Pancit Canton</h3>
                <button class="bilao-button" data-size="12" data-price="250">12 inch</button>
                <button class="bilao-button" data-size="14" data-price="500">14 inch</button>
                <button class="bilao-button" data-size="16" data-price="750">16 inch</button>
                <button class="bilao-button" data-size="18" data-price="1000">18 inch</button>
                <p class="price" id="bilao-price-2in1">₱250.00</p>
            </div>
        </div>

        <!-- Menu items for desserts -->
        <div id="desserts-grid" class="menu-grid">
            <div class="menu-item">
                <img src="Images/Full Menu/Desserts/Biscoff Graham Cake.jpg" alt="Biscoff Graham Cake">
                <h3>Biscoff Graham Cake</h3>
                <p class="price">₱150.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Desserts/Graham De Leche.png" alt="Graham De Leche">
                <h3>Graham De Leche</h3>
                <p class="price">₱140.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Desserts/Mango Graham.png" alt="Mango Graham">
                <h3>Mango Graham</h3>
                <p class="price">₱130.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Desserts/Oreo Graham.png" alt="Oreo Graham">
                <h3>Oreo Graham</h3>
                <p class="price">₱130.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Desserts/Puto Bumbong.png" alt="Puto Bumbong">
                <h3>Puto Bumbong</h3>
                <p class="price">₱75.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Desserts/Tiramisu.png" alt="Tiramisu">
                <h3>Tiramisu</h3>
                <p class="price">₱150.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Desserts/Ube Halaya.png" alt="Ube Halaya">
                <h3>Ube Halaya</h3>
                <p class="price">₱120.00</p>
            </div>
        </div>

        <!-- Menu items for bilao packages -->
        <div id="bilao-package-grid" class="menu-grid">
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/4 in 1 Pichi Pichi Sapin Sapin Maja Blanca and Biko.jpg" alt="Bilao Package">
                <h3>Custom Bilao Package (Select 4 Delicacies)</h3>
                <div class="delicacy-selection" style="text-align: left; margin-top: 10px;">
                    <label><input type="checkbox" name="delicacy" value="Biko" disabled> Biko</label><br>
                    <label><input type="checkbox" name="delicacy" value="Cassava Cake" disabled> Cassava Cake</label><br>
                    <label><input type="checkbox" name="delicacy" value="Maja" disabled> Maja</label><br>
                    <label><input type="checkbox" name="delicacy" value="Kutchinta" disabled> Kutchinta</label><br>
                    <label><input type="checkbox" name="delicacy" value="Sapin-sapin" disabled> Sapin-sapin</label><br>
                    <label><input type="checkbox" name="delicacy" value="Puto" disabled> Puto</label><br>
                    <label><input type="checkbox" name="delicacy" value="Palitaw w/ Yema" disabled> Palitaw w/ Yema</label><br>
                    <label><input type="checkbox" name="delicacy" value="Baked Ube Halaya w/ Leche Flan" disabled> Baked Ube Halaya w/ Leche Flan</label><br>
                    <label><input type="checkbox" name="delicacy" value="Black Kutchinta" disabled> Black Kutchinta</label><br>
                    <label><input type="checkbox" name="delicacy" value="Bilo-bilo" disabled> Bilo-bilo</label><br>
                    <label><input type="checkbox" name="delicacy" value="Yema Ube Biko" disabled> Yema Ube Biko</label><br>
                    <label><input type="checkbox" name="delicacy" value="Pichi-pichi" disabled> Pichi-pichi</label><br>
                </div>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/4 in 1 Pichi Pichi Sapin Sapin Maja Blanca and Biko.jpg" alt="Bilao Package">
                <h3>Pancit Bilao Package (Select 4 Delicacies)</h3>
                <div class="delicacy-selection" style="text-align: left; margin-top: 10px;">
                    <label><input type="checkbox" name="delicacy" value="Palabok" disabled> Palabok</label><br>
                    <label><input type="checkbox" name="delicacy" value="Pancit Canton" disabled> Pancit Canton</label><br>
                    <label><input type="checkbox" name="delicacy" value="Pancit Bihon" disabled> Pancit Bihon</label><br>
                    <label><input type="checkbox" name="delicacy" value="Carbonara" disabled> Carbonara</label><br>
                    <label><input type="checkbox" name="delicacy" value="Spaghetti" disabled> Spaghetti</label><br>
                </div>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/4 in 1 Pichi Pichi Sapin Sapin Maja Blanca and Biko.jpg" alt="Bilao Package">
                <h3>Fried Specialties Bilao Package (Select 4 Delicacies)</h3>
                <div class="delicacy-selection" style="text-align: left; margin-top: 10px;">
                    <label><input type="checkbox" name="delicacy" value="Cordon Bleu" disabled> Cordon Bleu</label><br>
                    <label><input type="checkbox" name="delicacy" value="Shanghai" disabled> Shanghai</label><br>
                    <label><input type="checkbox" name="delicacy" value="Fish Fillet" disabled> Fish Fillet</label><br>
                </div>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Bilaos/4 in 1 Pichi Pichi Sapin Sapin Maja Blanca and Biko.jpg" alt="Bilao Package">
                <h3>Ulam Bilao Package (Select 4 Delicacies)</h3>
                <div class="delicacy-selection" style="text-align: left; margin-top: 10px;">
                    <label><input type="checkbox" name="ulam" value="Laing" disabled> Laing</label><br>
                    <label><input type="checkbox" name="ulam" value="Dinuguan" disabled> Dinuguan</label><br>
                    <label><input type="checkbox" name="ulam" value="Menudo" disabled> Menudo</label><br>
                    <label><input type="checkbox" name="ulam" value="Crispy Kare Kare" disabled> Crispy Kare Kare</label><br>
                    <label><input type="checkbox" name="ulam" value="Buttered Shrimp" disabled> Buttered Shrimp</label><br>
                </div>
            </div>
            <h2>Price: ₱2,900.00</h2>
        </div>
        <!-- Menu items for packaged meals -->
        <div id="packaged-meals-grid" class="menu-grid">
            <div id="step-1" class="packaged-meal-step active-step">
                <h2 style="grid-column: 1 / -1; text-align: center;">Step 1: Choose your packaged</h2>
                <div class="menu-item package-option" data-price="149" data-package="1">
                    <img src="Images/Full Menu/Packaged Meals/Package1.png" alt="Packaged Meal 1">
                    <h3>1 Rice, 1 Main & 1 Veggie</h3>
                    <p class="price">₱149.00</p>
                    <p class="available">Available orders: 1</p>
                </div>
                <div class="menu-item package-option" data-price="200" data-package="2">
                    <img src="Images/Full Menu/Packaged Meals/Package2.png" alt="Packaged Meal 2">
                    <h3>1 Rice, 2 Main & 1 Veggie</h3>
                    <p class="price">₱200.00</p>
                    <p class="available">Available orders: 1</p>
                </div>
            </div>

            <div id="step-2" class="packaged-meal-step">
                <h2 style="grid-column: 1 / -1; text-align: center;">Step 2: Choose your main</h2>
                <div class="menu-item main-option" data-main="Dinuguan">
                    <img src="Images/Full Menu/Packaged Meals/Dinuguan.png" alt="Dinuguan">
                    <h3>Dinuguan</h3>
                </div>
                <div class="menu-item main-option" data-main="Chicken afritada">
                    <img src="Images/Full Menu/Packaged Meals/Chicken afritada.png" alt="Chicken afritada">
                    <h3>Chicken afritada</h3>
                </div>
                <div class="menu-item main-option" data-main="Sisig">
                    <img src="Images/Full Menu/Packaged Meals/Sisig.png" alt="Sisig">
                    <h3>Sisig</h3>
                </div>
                <div class="menu-item main-option" data-main="Bicol Express">
                    <img src="Images/Full Menu/Packaged Meals/Bicol Express.png" alt="Bicol Express">
                    <h3>Bicol Express</h3>
                </div>
                <div class="menu-item main-option" data-main="Menudo">
                    <img src="Images/Full Menu/Packaged Meals/Menudo.png" alt="Menudo">
                    <h3>Menudo</h3>
                </div>
                <div class="menu-item main-option" data-main="Kare-kare">
                    <img src="Images/Full Menu/Packaged Meals/Kare-kare.png" alt="Kare-kare">
                    <h3>Kare-kare</h3>
                </div>
                <div class="menu-item main-option" data-main="Roast beef">
                    <img src="Images/Full Menu/Packaged Meals/Roast beef.png" alt="Roast beef">
                    <h3>Roast beef</h3>
                </div>
                <div class="menu-item main-option" data-main="Pork steak">
                    <img src="Images/Full Menu/Packaged Meals/Pork steak.png" alt="Pork steak">
                    <h3>Pork steak</h3>
                </div>
                <div class="menu-item main-option" data-main="Beef broccoli">
                    <img src="Images/Full Menu/Packaged Meals/Beef broccoli.png" alt="Beef broccoli">
                    <h3>Beef broccoli</h3>
                </div>
                <div class="menu-item main-option" data-main="Meatballs">
                    <img src="Images/Full Menu/Packaged Meals/Meatballs.png" alt="Meatballs">
                    <h3>Meatballs</h3>
                </div>
                <div class="menu-item main-option" data-main="Lechon paksiw">
                    <img src="Images/Full Menu/Packaged Meals/Lechon paksiw.png" alt="Lechon paksiw">
                    <h3>Lechon paksiw</h3>
                </div>
                <div class="menu-item main-option" data-main="Binagoongan">
                    <img src="Images/Full Menu/Packaged Meals/Binagoongan.png" alt="Binagoongan">
                    <h3>Binagoongan</h3>
                </div>
                <div class="menu-item main-option" data-main="Calderetang ribs">
                    <img src="Images/Full Menu/Packaged Meals/Calderetang ribs.png" alt="Calderetang ribs">
                    <h3>Calderetang ribs</h3>
                </div>
            </div>

            <div id="step-3" class="packaged-meal-step">
                <h2 style="grid-column: 1 / -1; text-align: center;">Step 3: Choose your veggie</h2>
                <div class="menu-item veggie-option" data-veggie="Chopsuey">
                    <img src="Images/Full Menu/Packaged Meals/Chopsuey.png" alt="Chopsuey">
                    <h3>Chopsuey</h3>
                </div>
                <div class="menu-item veggie-option" data-veggie="Laing">
                    <img src="Images/Full Menu/Packaged Meals/Laing.png" alt="Laing">
                    <h3>Laing</h3>
                </div>
                <div class="menu-item veggie-option" data-veggie="Pakbet">
                    <img src="Images/Full Menu/Packaged Meals/Pakbet.png" alt="Pakbet">
                    <h3>Pakbet</h3>
                </div>
                <div class="add-button-container" style="grid-column: 1 / -1; text-align: right; margin-top: 20px;">
                    <button class="add-button" style="background-color: #d9534f; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Add</button>
                </div>
            </div>
        </div>
        
        <!-- Menu items for food trays -->
        <div id="food-trays-grid" class="menu-grid">
            <div class="menu-item">
                <img src="Images/Full Menu/Food Trays/Beef Tapa with Brocolli and Eggs.jpg" alt="Beef Tapa with Brocolli and Eggs">
                <h3>Beef Tapa w/ Brocolli and Eggs</h3>
                <p class="price">₱70.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Food Trays/Buttered Shrimp.jpg" alt="Buttered Shrimp">
                <h3>Buttered Shrimp</h3>
                <p class="price">₱60.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Food Trays/Carbonara.jpg" alt="Carbonara">
                <h3>Carbonara</h3>
                <p class="price">₱35.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Food Trays/Cassava Cake.jpg" alt="Cassava Cake">
                <h3>Cassava Box</h3>
                <p class="price">₱240.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Food Trays/Beef Tapa with Brocolli and Eggs.jpg" alt="Beef Tapa with Brocolli and Eggs">
                <h3>Beef Tapa with Brocolli and Eggs</h3>
                <p class="price">₱70.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Food Trays/Cordon Bleu.jpg" alt="Cordon Bleu">
                <h3>Cordon Bleu</h3>
                <p class="price">₱60.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Food Trays/Embutido.jpg" alt="Embutido">
                <h3>Embutido</h3>
                <p class="price">₱70.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Food Trays/Fried Chicken.jpg" alt="Fried Chicken">
                <h3>Fried Chicken</h3>
                <p class="price">₱70.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Food Trays/Liempo.jpg" alt="Liempo">
                <h3>Liempo</h3>
                <p class="price">₱80.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Food Trays/Beef Tapa with Brocolli and Eggs.jpg" alt="Beef Tapa with Brocolli and Eggs">
                <h3>Lumpiang Shanghai</h3>
                <p class="price">₱75.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Food Trays/Menudo.jpg" alt="Menudo">
                <h3>Menudo</h3>
                <p class="price">₱70.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Food Trays/Pork Caldereta.jpg" alt="Pork Caldereta">
                <h3>Pork Caldereta</h3>
                <p class="price">₱80.00</p>
            </div>
            <div class="menu-item">
                <img src="Images/Full Menu/Food Trays/Turon.jpg" alt="Turon">
                <h3>Turon</h3>
                <p class="price">₱75.00</p>
            </div>
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
    <script src="JavaScript/Menu.js"></script>
    <script src="JavaScript/Header.js"></script>
</body>
</html>
