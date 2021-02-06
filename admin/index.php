<?php
require_once '../load.php';
confirm_logged_in();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the admin login</title>
</head>
<body>
    <main>
        <h2>Welcome to the admin panel <?php echo $_SESSION['user_name'];?>!</h2>
        <p><?php echo $ip;?></p>
        <a href="admin_logout.php">Log Out</a>
    </main>
</body>
</html>