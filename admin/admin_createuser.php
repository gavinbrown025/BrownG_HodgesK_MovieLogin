<?php
    require_once '../load.php';
    //confirm_logged_in();
    $rand_pass = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890!@#$%^&*()_+";
    $rand_pass = substr(str_shuffle($rand_pass),0,10);

    if (isset($_POST['submit'])) {

        $data = array(
            'fname' => trim($_POST['fname']),
            'username' => trim($_POST['username']),
            'email' => trim($_POST['email'])
        );

         if(empty($_POST['rand_pass'])){
             $data['password'] = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
         } else {
             $data['password'] = password_hash($_POST['rand_pass'], PASSWORD_DEFAULT);
         }

         $message = createUser($data);

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" href="../css/master.css">

    <title>Create User</title>
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
            <form class="user-form" action="admin_createuser.php" method="post">
                <h2>Fill in to create an account</h2>

                <input id="firstname" type="text" name="fname" placeholder="first name" value="">
                <input id="username" type="text" name="username" placeholder="username" value="">

               <input id="password" type="password" name="password" placeholder="password" 
                value="">

                <div class="pass-gen">
                    <input id="rand_pass" type="checkbox" name="rand_pass" value="<?php echo $rand_pass;?>">
                    <label for="rand_pass">Generate Random Password?</label>
                </div>

                <input id="email" type="email" name="email" placeholder="email" >
                <?php echo !empty($message)?$message:''; ?>

                <button class="button" type="submit" name="submit">CONTINUE</button>
                <p>Already have an account?
                    <a href="admin_login.php"> Login</a>
                </p>
            </form>
        </section>
    </main>
</body>
</html>