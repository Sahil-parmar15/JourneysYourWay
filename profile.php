    <?php
    include 'navbar.php';
    include 'connection.php';
    session_start();

    if (isset($_SESSION['user'])) {
        $email = $_SESSION['user']['email']; // Get the email from session
        echo "$email";
        
    }
    else{
        echo "User not logged in!";
    }

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $mobileno = $_POST['mobileno'];
        $password = $_POST['password'];


    var_dump($name, $mobileno, $password);
    try{

        // Update query to update user's data
        $sql = "UPDATE users SET name=:name, mobileno=:mobileno, password=:password WHERE email=:email";
        $query = $dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR); // Corrected this line
        $query->bindParam(':email', $email, PDO::PARAM_STR); // Binding email from session
        $query->execute();
        $msg = "Profile Updated Successfully";
    }
    catch  (PDOException $e) {
            echo "Error: " . $e->getMessage();
    }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Journeysyourway | Profile</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="banner">
            <div class="tour-container">
                <h1>My Profile</h1>
            </div>
        </div>  
        <div class="privacy">
            <div class="form-container">
                <h2>My Profile</h2>
                <?php if (isset($msg)) { echo "<p>$msg</p>"; } ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="mobileno">Mobile No</label>
                        <input type="tel" id="mobileno" name="mobileno" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <input type="submit" name="update" value="Update">
                </form>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
    </html>
