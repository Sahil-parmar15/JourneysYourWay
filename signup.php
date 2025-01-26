<?php
// Start session

// Check if form is submitted
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $mobile_no = $_POST['mobileno'] ?? '';

    // Validation checks
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password) || empty($mobile_no)) {
        $error = "All fields are required!";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        // Hash the password before storing
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Connect to the database
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "journeysyourway";

        // Create connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if email already exists
        $checkEmail = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $checkEmail->bind_param("s", $email);
        $checkEmail->execute();
        $result = $checkEmail->get_result();

        if ($result->num_rows > 0) {
            $error = "Email already exists!";
        } else {
            // Insert user into the database
            $stmt = $conn->prepare("INSERT INTO users (name, email, password, mobileno) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $username, $email, $hashed_password, $mobile_no);

            if ($stmt->execute()) {
                // Redirect to login page after successful registration
                header("Location: login.php");
                exit;
            } else {
                $error = "Error: " . $stmt->error;
            }
        }

        // Close the connection
        $stmt->close();
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body class=login>
<div class="center">
        <h1>Create Your Account </h1>
        <form method="post" action="signup.php">
            <div class="txt_field">
                <input type="text" name="username" required autocomplte="off">
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="text" name="email" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" required autocomplete="off">
                <span></span>
                <label>Password</label>
            </div>
            <div class="txt_field">
                <input type="password" name="confirm_password" required autocomplete="off">
                <span></span>
                <label>Confirm Password</label>
            </div>
            <div class="txt_field">
                <input type="text" name="mobileno" required>
                <span></span>
                <label>Mobile number</label>
            </div>
            <!-- <div class="pass">Forgot Password?</div> -->
            <input type="submit" value="Signup">
            <div class="signup_link">
                already have account? <a href="login.php">Login</a>
                </div>
            </form>
        </div>

</body>
</html>