<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOURNEYSYOURWAY</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <!-- <link rel="icon" type="image/x-icon" href="image/logo-png-removebg-preview.png">. -->
</head>
<body>
    <!-- header start -->
    <header>
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
            <!-- <li><a href="destination.php">Destination</a></li>  -->
            <li><a href="tour.php">Tour</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="btn">
                    <i class="fas fa-bars menu-btn"></i>
                </div>
        <div>
           <?php
                include "./profiledisplay.php";
           ?>
        </div>
    </nav>
        </div>
    </header>
<!-- header end -->
<!-- slider start -->
    <main>
        <div class="slide-container swiper">
            <div class="slide-content swiper-wrapper">
                <div class="overlay swiper-slide">
                    <img src="./image/bg.jpg" alt="">
                    <div class="img-overlay">
                        <p>Let's Travel the world with us</p>
                        <h2><span>Discover</span>The world</h2>
                        <h2>With Our Guide</h2>
                    </div>
                </div>
                <div class="overlay swiper-slide">
                    <img src="./image/view-starry-night-sky-with-nature-mountains-landscape.jpg" alt="">
                    <div class="img-overlay">
                        <p>Let's Travel the world with us</p>
                        <h2><span>Discover</span>The world</h2>
                        <h2>With Our Guide</h2>
                    </div>
                </div>
                <div class="overlay swiper-slide">
                    <img src="./image/beautiful-shot-dusk-new-york.jpg" alt="">
                    <div class="img-overlay">
                        <p>Let's Travel the world with us</p>
                        <h2>Discover The world</h2>
                        <h2>With Our <span>JOURNEYSYOURWAY</span></h2>
                    </div>
                </div>
                <div class="overlay swiper-slide">
                    <img src="./image/beautiful-tropical-beach-sea-ocean-with-coconut-palm-tree-sunrise-time.jpg" alt="">
                    <div class="img-overlay">
                        <p>Let's Travel the world with us</p>
                        <h2>Discover The world</h2>
                        <h2>With Our <span>JOURNEYSYOURWAY</span></h2>
                    </div>
                </div>
                <div class="overlay swiper-slide">
                    <img src="./image/wide-angle-shot-single-tree-growing-clouded-sky-sunset-surrounded-by-grass.jpg" alt="">
                    <div class="img-overlay">
                        <p>Let's Travel the world with us</p>
                        <h2>Discover The world</h2>
                        <h2>With Our <span>JOURNEYSYOURWAY</span></h2>
                    </div>
                </div>
                
            </div>
        </div>
    </main>
     <!-- slider end -->
     <!-- services start -->
       <section class="services">
        <h1 class="heading-title">Our Services</h1>
        <div class="box-container">
            <div class="box">
                <img class="small-images" src="./image/adventure.png" alt="">
                <h3>adventure</h3>
            </div>

            <div class="box">
                <img class="small-images" src="./image/Pi7_tour-guide.png" alt="">
                <h3>tour guide</h3>
            </div>

            <div class="box">
                <img class="small-images" src="./image/Pi7_trekking (1).png" alt="">
                <h3>trekking</h3>
            </div>

            <div class="box">
                <img class="small-images" src="./image/Pi7_fire.png" alt="">
                <h3>camp fire</h3>
            </div>

            <div class="box">
                <img class="small-images" src="./image/Pi7_jeep.png" alt="">
                <h3>off road</h3>
            </div>

            <div class="box">
                <img class="small-images" src="./image/Pi7_camping.png" alt="">
                <h3>camping</h3>
            </div>
        </div>
       </section>
     <!-- services end -->
      <!-- static counter start -->
       <section id="static-counter">
        <div class="container">
            <div class="static-wrapper">
                <div class="static-icons">
                    <i class="fa fa-plane-departure"></i>
                    <p class="numbers" data-ceil="600">600</p>
                    <p class="txt">Flight Booking</p>
                </div>
                <div class="static-icons">
                    <i class="fa fa-home"></i>
                    <p class="numbers" data-ceil="250">250</p>
                    <p class="txt">Amazing Tour</p>
                </div>
                <div class="static-icons">
                    <i class="fa fa-ship"></i>
                    <p class="numbers" data-ceil="100">100</p>
                    <p class="txt">Cruies Booking</p>
                </div>
                <div class="static-icons">
                    <i class="fa fa-ticket"></i>
                    <p class="numbers" data-ceil="100">100</p>
                    <p class="txt">Ticket Bookings</p>
                </div>
            </div>
        </div>
       </section>
      <!-- static counter end -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="./js/swiper.js"></script>
    <script src="./js/script.js"></script>
    <?php
     include 'footer.php';
    ?> 
</body>
</html>