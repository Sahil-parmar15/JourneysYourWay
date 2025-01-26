<?php
    include "navbar.php";
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title></title>
</head>
<body class="tour">
    <div class="banner">
        <div class="tour-container">
            <h1>Package-List</h1>
         </div>
    </div>  
        <div class="package-list">
        <?php 
        // Query to fetch package details from the database
        $sql = "SELECT * FROM tourpackages";  // Replace with your actual table name
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        
        if($query->rowCount() > 0)
        {
            foreach($results as $result)
            { 
        ?>
        <div class="package">
                <!-- Dynamically displaying the image and package details -->
                <img src="./image/<?php echo htmlentities($result->packageImage);?>" alt="Paris and Switzerland">
                <div class="package-info">
                    <h2>Package Name: <?php echo htmlentities($result->packageName);?></h2>
                    <p>Package Type: <?php echo htmlentities($result->packageType);?></p>
                    <p>Package Location: <?php echo htmlentities($result->packageLocation);?></p>
                    <p>Features: <?php echo htmlentities($result->packageFeatures);?></p>
                </div>
                <div class="package-price">
                    <p>₹ <?php echo htmlentities($result->packagePrice);?></p>
                    
                    <a href="package-details.php?pkgid=<?php echo htmlentities($result->packageId);?>" class="details-btn">Details</a>
                </div>
            </div>
        <?php 
            }
        } 
        else 
        {
            echo "<p>No packages found.</p>";
        }
        ?>
    </div>
        
    </div>
    <?php
        include "footer.php";
    ?>
</body>
</html>