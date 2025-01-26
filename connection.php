<?php
// Database credentials
$host = 'localhost';  // Your database host (usually 'localhost')
$dbname = 'journeysyourway';  // Your database name
$username = 'root';  // Your database username
$password = '';  // Your database password

try {
    // Create PDO connection
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If there's an error in connecting, output the error
    die("Connection failed: " . $e->getMessage());
}
?>
