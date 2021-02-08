<?php
require_once '../load.php';
confirm_logged_in();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" href="../css/master.css">

    <title>Welcome to the admin login</title>
</head>
<body>
   <main class="landing-wrapper" id="app">
		<header>
			<img src="../images/roku-logo.png" alt="Roku Logo">
			<div class="kabab-menu">
				<div class="k-dot"></div>
				<div class="k-dot"></div>
				<div class="k-dot"></div>
			</div>
		</header>
        <section class="admin-con">
            <h2>Welcome to the Admin Panel <?php echo $_SESSION['user_name'];?>!</h2>
            <div class="admin-info">
                <p>Last Login: <?php echo $_SESSION['user_date'];?></p>
                <p>Total Logins: <?php echo $_SESSION['user_logins'];?></p>
            </div>

            <a class="button" href="admin_logout.php">Log Out</a>

        </section>
    </main>
</body>
</html>

