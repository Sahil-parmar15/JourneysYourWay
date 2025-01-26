<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"> -->
    <title>JOURNEYSYOURWAY</title>
</head>
<body>
    <footer id="footer">
        <div class="container">
          <div class="footer-content">
            <div class="ft-content">
                <div class="icon">
                    <i class="fa fa-phone-volume"></i>
                </div>
                <div class="f-content">
                    <p class="lead">Call us</p>
                    <p>+91 7201078590</p>
                </div>
            </div>
            <div class="ft-content">
                <div class="icon">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="f-content">
                    <p class="lead">Write for us</p>
                    <p>journeysyourway@gmail.com</p>
                </div>
            </div>
            <div class="ft-content">
                <div class="icon">
                    <i class="fa fa-map-location"></i>
                </div>
                <div class="f-content">
                    <p class="lead">Address</p>
                    <p>B-25,Madhav Plaza,Jamnagar</p>
                </div>
            </div>
          </div>
          <div class="footer-wraper">
            <div class="footer-about">
                <div class="img-logo">
                    <img src="image/logo-png-removebg-preview.jpg" alt="">
                </div>
                <p class="Lead">
                "Journeys Your Way: Crafting personalized travel experiences for unforgettable adventures."
                </p>
                <div class="social-icons">
                    <a href="https://www.facebook.com/login.php/"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://x.com/"><i class="fa-brands fa-twitter"></i></a>
                    <a href="https://www.instagram.com/accounts/login/?hl=en"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
            <div class="links">
                <h2>Quick links</h2>
                <ul>
                    <li><a href="index.php" class="white">Home</a></li>
                    <li><a href="about.php" class="white">About</a></li>
                    <li><a href="tour.php" class="white">Tour</a></li>
                    <li><a href="contact.php" class="white">contact</a></li>
                </ul>
            </div>
            <div class="subscribe">
                <h2>subscribe</h2>
                <p class="lead">
                    Signup for our monthly blog letter to stay informed about travel
                </p>
                <form class="footer-form" action="" method="POST">
                    <input type="text" name="email" placeholder="Email Address" required>
                    <button type="submit" class="button">send</button>
                </form>

                <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize email input
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        try {
            // Prepare the SQL statement using PDO
            $stmt = $dbh->prepare("INSERT INTO subscribers (email) VALUES (:email)");

            // Bind the email parameter using bindParam (PDO method)
            $stmt->bindParam(':email', $email);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Thank you for subscribing!";
            } else {
                echo "Error: Failed to execute statement.";
            }
        } catch (PDOException $e) {
            // Output error message if query fails
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Please enter a valid email address.";
    }
}
?>
            </div>
          </div>  
        </div>
    </footer>
</body>
</html>