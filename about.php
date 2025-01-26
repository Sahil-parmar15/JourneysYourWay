<?php
    include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>JOURNEYSYOURWAY</title>
</head>
<body class="about">
    <section class="margin-about">
        <div class="about-us">
            <h1>about us</h1>
            <div class="wrapper">
                <div class="about-content">
                    <h3>
                    About  JourneysYourWay</h3>
                    <p>
                    At JourneysYourWay, we believe that travel should be as unique as the traveler. Founded with a passion for exploration and a deep understanding of what makes a trip truly special, we offer fully customized travel experiences tailored to your preferences. Whether you're seeking thrilling adventures, serene retreats, cultural immersion, or culinary delights, we are here to turn your travel dreams into reality.
                    </p>
                    <div id="moreContent" style="display: none;">
                       <p>Our team of travel experts takes the time to get to know you, your interests, and your travel style. We carefully curate itineraries that suit your desires, from the destinations you’ve always wanted to visit to the hidden gems only the locals know about. No two journeys are the same, because no two travelers are alike.
                        <br>
                        <br>
Our Mission
<br>
To offer personalized, one-of-a-kind travel experiences that inspire, enrich, and create lasting memories.
<br>
Why Choose Us?
<br>
<br>
Customized Itineraries: Every trip is tailored to your interests and preferences.
Expert Recommendations: Benefit from our travel expertise and insider knowledge.
Seamless Planning: We handle the logistics, so you can enjoy a stress-free experience.
Global Destinations: Whether you're dreaming of far-off lands or closer escapes, we've got you covered.
Discover the world on your terms with Journeys Your Way. Your adventure starts here!</p>
                    </div>
                        <button id="readMoreBtn" onclick="toggleContent()" class="button">READ MORE</button>
                    
                    <div class="social">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class='fab fa-instagram'></i></a>
                        <!-- <i class="fa-brands fa-square-instagram"></i> -->
                        </div>
                </div>
                <div class="image-section">
                    <img src="./image/6.jpg" width="100%"  alt="">
                </div>
            </div>
        </div>
    </section>
    <?php
     include 'footer.php';
    ?> 
    <script src="./js/script.js"></script>
</body>

</html>