<?php
    require_once '../load.php';
    $ip = $_SERVER['REMOTE_ADDR'];

    if(isset($_SESSION['user_id'])){
        redirect_to('index.php');
    }

    if(isset($_POST['submit'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        if(!empty($username) && !empty($password)) {
            $result = login($username, $password, $ip);
            $message = $result;
        }else {
            $message = 'please fill in required fields';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" href="../css/master.css">

    <title>Roku | Login</title>
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
		<section id="login-con">
            <form class="user-form" action="admin_login.php" method="post">
                <h2>Log in with your Username</h2>
				<input id="username" type="text" name="username" placeholder="Login" value="">
                <input id="password" type="password" name="password" placeholder="Password" value="">
                <?php echo !empty($message)?$message:''; ?>
                <button class="button" name="submit" type="submit">CONTINUE</button>
				<!-- <P>New to ROKU? 
                    <a @click="showSignUp" href="admin_createuser.php"> Sign Up</a>
                </P> -->
			</form>
		</section>
	</main>
</body>
</html>