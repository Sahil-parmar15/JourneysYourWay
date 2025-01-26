<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOURNEYSYOURWAY</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/> -->
</head>
<body>
<header class="nav">
        <div class="container">
        <nav>
            <div class="logo">
            <a href="index.php"><span class="logo">JOURNEYSYOURWAY</span></a>
            </div>
            <ul>
                <div class="btn">
                    <i class="fas fa-times close-btn"></i>
                </div>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <!-- <li><a href="destination.php">Destination</a></li> -->
            <li><a href="tour.php">Tour</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="btn">
                    <i class="fas fa-bars menu-btn"></i>
                </div>
        <div>
           <?php
                include "profiledisplay.php";
           ?>
        </div>
    </nav>
        </div>
    </header>
    <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> -->
    <!-- <script src="./js/swiper.js"></script> -->
    <script src="./js/script.js"></script>
</body>
</html>