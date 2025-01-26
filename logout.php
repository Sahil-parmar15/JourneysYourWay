<?php
// Start session
session_start();

// Destroy the session and log the user out
session_destroy();

// Redirect to login page
header("Location: index.php");
exit;
?>
