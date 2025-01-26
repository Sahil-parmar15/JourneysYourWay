<?php
// Start session
session_start();

// Check if user is logged in
if (isset($_SESSION['user'])) {
    // User is logged in, display profile
    $user = $_SESSION['user'];
    echo "<div class='user-profile'>";
    echo "<p class='white'>Welcome, " . htmlspecialchars($user['name']) . "!</p>";  // User's name, sanitized for security
    echo "";
    ?>
  <a href='./profile.php' class='white'>View Profile</a> | <a href='logout.php' class='white'>Logout</a>
    <?php
    echo "</div>";
} else {
    // User is not logged in, display login link
    echo "<button class='button'><a href='login.php'>Login</a></button>";
}
?>