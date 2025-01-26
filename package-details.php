<?php
// Start output buffering
ob_start();

// Include your database connection and other dependencies
include('navbar.php');
include('connection.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the user is logged in
    if (!isset($_SESSION['user'])) {
        // Redirect to login page if not logged in
        header("Location: login.php");
        exit();
    }

    // User is logged in, proceed with booking
    $pid = intval($_GET['pkgid']);
    $useremail = $_SESSION['user']['email'];  // Use the email from session
    $fromdate = $_POST['fromdate'] ?? '';
    $todate = $_POST['todate'] ?? '';
    $comment = $_POST['comment'] ?? '';

    // Simple validation check (you can add more as needed)
    if (empty($fromdate) || empty($todate)) {
        echo "<script>alert('Please select both from and to dates.');</script>";
    } else {
        // Insert booking into the database
        $sql = "INSERT INTO booking (PackageId, UserEmail, FromDate, ToDate, Comment) 
                VALUES (:pid, :useremail, :fromdate, :todate, :comment)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':pid', $pid, PDO::PARAM_INT);
        $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
        $query->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
        $query->bindParam(':todate', $todate, PDO::PARAM_STR);
        $query->bindParam(':comment', $comment, PDO::PARAM_STR);
        $query->execute();

        // Check if booking was successful
        if ($dbh->lastInsertId()) {
            echo "<script>alert('Booking Successful!');</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
        }
    }
}

// Get the package ID from the URL
$pkgid = intval($_GET['pkgid']);

// SQL query to fetch the package details
$sql = "SELECT * FROM tourpackages WHERE packageId = :pkgid";
$query = $dbh->prepare($sql);
$query->bindParam(':pkgid', $pkgid, PDO::PARAM_INT);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

// Check if the package exists
if ($result) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($result['packageName']); ?> | Package Details</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Link to your external CSS file -->
</head>
<body class="pd">
<div class="banner">
    <div class="tour-container">
        <h1>Package Details</h1>
    </div>
</div> 

<!-- Booking form -->
<form name="book" method="post" action="">
    <div class="package-details-container">
        <!-- Header with Image and Info -->
        <div class="package-header">
            <img src="./image/<?php echo htmlspecialchars($result['packageImage']); ?>" alt="Package Image">
            <div class="package-info">
                <h2><?php echo htmlspecialchars($result['packageName']); ?> (<?php echo htmlspecialchars($result['packageType']); ?>)</h2>
                <p>#PKG-<?php echo htmlspecialchars($result['packageId']); ?></p>
                <p><strong>Package Location:</strong> <?php echo htmlspecialchars($result['packageLocation']); ?></p>
                <p><strong>Features:</strong> <?php echo htmlspecialchars($result['packageFeatures']); ?></p>
                <p>Grand Total</p>
                <p class="package-price">₹<?php echo number_format($result['packagePrice'], 2); ?></p>
            </div>
        </div>

        <!-- Date Picker -->
        <div class="date-picker">
            <input type="text" name="fromdate" placeholder="From (DD-MM-YYYY)" onfocus="(this.type='date')" required min="<?php echo date('Y-m-d'); ?>">
            <input type="text" name="todate" placeholder="To (DD-MM-YYYY)" onfocus="(this.type='date')" required min="<?php echo date('Y-m-d'); ?>">
        </div>

        <!-- Package Description Section -->
        <div class="package-description">
            <h3 class="section-title">Package Details</h3>
            <p><?php echo htmlspecialchars($result['packageDetails']); ?></p>
        </div>

        <!-- Comment Section -->
        <div class="comment-section">
            <h3 class="section-title">Travels</h3>
            <p>Comment</p>
            <input type="text" name="comment" placeholder="Add your comment">
            <div class="book_btn">
                <button type="submit" name="submit2">Book</button>
            </div>
        </div>
    </div>
</form>
</body>
</html>

<?php
} else {
    echo "<p>No package found.</p>";
}
?>
