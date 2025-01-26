<?php
error_reporting(E_ALL);  // Enable error reporting for debugging
ini_set('display_errors', 1);

include "navbar.php";
include "connection.php";

$msg = "";  // Initialize message variable
$error = "";  // Initialize error variable

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobileno'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];

    // Prepare SQL query
    $sql = "INSERT INTO enquiry (FullName, EmailId, MobileNumber, Subject, Description) VALUES (:fname, :email, :mobileno, :subject, :description)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':mobileno', $mobile, PDO::PARAM_STR);
    $query->bindParam(':subject', $subject, PDO::PARAM_STR);
    $query->bindParam(':description', $description, PDO::PARAM_STR);

    // Execute query and check result
    if ($query->execute()) {
        $lastInserted = $dbh->lastInsertId();
        if ($lastInserted) {
            $msg = "Enquiry successfully submitted";  // Success message
            // Redirect to the home page after showing the message
            echo "<script>
                    alert('Enquiry successfully submitted.');
                    setTimeout(function() {
                        window.location.href = 'index.php'; // Redirect to home page
                    }, 1000); // Redirect after 3 seconds
                  </script>";
        } else {
            $error = "Something went wrong, please try again";  // Error message
        }
    } else {
        $error = "Error in query execution";  // Error message
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>JOURNEYSYOURWAY | Contact Us</title>
</head>
<body>
    <section class="contact">
        <div class="content">
            <h2>Contact Us</h2>
            <p>Whether you have a question, need support, or want to share feedback, we'd love to hear from you. Please use the form below to reach out for:</p>
        </div>
        <div class="con-container">
            <div class="contactinfo">
                <div class="con-box">
                    <div class="box-icon"><i class="fa fa-map-location"></i></div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>4671, Sugar Camp Road,<br>Owatonna, Minnesota,<br>55060</p>
                    </div>
                </div>
                <div class="con-box">
                    <div class="box-icon"><i class="fa fa-phone-volume"></i></div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>546546656465</p>
                    </div>
                </div>
                <div class="con-box">
                    <div class="box-icon"><i class="fa-solid fa-envelope"></i></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>abc@xyz.com</p>
                    </div>
                </div>
            </div>
            <div class="contactForm">
                <form action="contact.php" method="post">                
                    <h2>Send Message</h2>
                    <div class="inputBox">
                        <input type="text" name="fname" required="required">
                        <span>Full Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="email" required="required">
                        <span>Email</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="mobileno" required="required">
                        <span>Mobile no</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="subject" required="required">
                        <span>Subject</span>
                    </div>
                    <div class="inputBox">
                        <textarea name="description" required rows="6" cols="35"></textarea>
                        <span>Description</span>
                    </div>
                    <div class="inputbox">
                        <input type="submit" name="submit" class="submit">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php
        include "footer.php";
    ?>
</body>
</html>
