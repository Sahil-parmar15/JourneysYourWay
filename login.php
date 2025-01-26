<?php
// Start session
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validation checks
    if (empty($email) || empty($password)) {
        $error = "Email and password are required!";
    } else {
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

        // Check if email exists and fetch the password
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Fetch user data
            $user = $result->fetch_assoc();
            
            // Verify password
            if ($password == $user['password']) {
                // After successful login, store user data in session
                $_SESSION['user'] = [
                    'name' => $user['name'],  // Store username in session
                    'email' => $user['email'], // Store email in session
                    // You can store other user-related data here
                ];

                // Redirect to homepage after login
                header("Location: index.php");
                exit;
            } else {
                $error = "Invalid password!";
            }
        } else {
            $error = "Email not found!";
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
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body class="login">
<div class="center">
    <h1>Login to Your Account</h1>
    <form method="post" action="login.php">
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
        <input type="submit" value="Login">
        <div class="signup_link">
            Don't have an account? <a href="signup.php">Sign up</a>
        </div>
        <div class="signup_link">
            <a href="admin/index.php">Admin Login</a>
        </div>
    </form>
    <?php
    if (isset($error)) {
        echo "<p style='color: red; text-align: center;'>$error</p>";
    }
    ?>
</div>
</body>
</html>
