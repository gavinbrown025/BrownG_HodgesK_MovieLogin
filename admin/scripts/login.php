<?php


function login($username, $password, $ip)
{
    $pdo = Database::getInstance()->getConnection();

//! checking if account is not locked
    $get_user_query = 'SELECT * FROM tbl_user WHERE user_name =:username AND user_pass=:password AND locked=0';
    $user_set = $pdo->prepare($get_user_query);
    $user_set->execute(
        array(
            ':username' => $username,
            ':password' => $password
        )
    );

//! successful username and password and account NOT locked I DID NOT TOUCH THIS SECTION! IT IS THE SAME AS PAN'S CLASS FILE
    if($found_user = $user_set->fetch(PDO::FETCH_ASSOC)) {
        //? we found user in the DB, let him in!
        $found_user_id = $found_user['user_id'];

        //?Write the username and userid into session data
        $_SESSION['user_id'] = $found_user_id;
        $_SESSION['user_name'] = $found_user['user_fname'];
        $_SESSION['user_date'] = $found_user['user_date'];
        $_SESSION['user_ip'] = $found_user['user_ip'];
        $_SESSION['user_logins'] = $found_user['user_logins']+1;

//? Update the user IP, login date, and successful logins
//? reset failed logins to 0 so they have three attempts every time they login.
        $update_user_query = 
           'UPDATE tbl_user SET 
            user_ip= :user_ip, 
            user_date = now(), 
            user_logins = user_logins +1, 
            failed_login = 0
            WHERE user_id = :user_id';

        $update_user_set = $pdo->prepare($update_user_query);
        $update_user_set->execute(
            array(
                ':user_ip' =>$ip,
                ':user_id' =>$found_user_id
            )
        );
//! END OF PAN'S FILE
        //?Redirect user back to index.php
        redirect_to('index.php');

//! unsuccessful OR account LOCKED
    }else {
        $get_user_query = 'SELECT user_id, failed_login, locked FROM tbl_user WHERE user_name =:username';
        $user_set = $pdo->prepare($get_user_query);
        $user_set->execute(
            array(
                ':username' => $username,
            )
        );

//! if username is found get failed login attempts from DB
        if($found_user = $user_set->fetch(PDO::FETCH_ASSOC)) {
            //? username matched
            $found_user_id = $found_user['user_id'];
            //? get login attempt # from DB
            $attempt_num = $found_user['failed_login'];
//! if login failed twice previously, lock account
            if($attempt_num >= 2) {
                $update_user_query = 'UPDATE tbl_user SET locked=1 WHERE user_id=:user_id'; 
                $update_user_set = $pdo->prepare($update_user_query);
                $update_user_set->execute(
                    array(
                        ':user_id' =>$found_user_id
                    )
                );
                return 'Account locked. Contact Admin.';

//! attempts under 2, add 1 to attempt and update DB
            }else{
                $attempt = $attempt_num+1;
                $update_user_query = 'UPDATE tbl_user SET failed_login=:attempt WHERE user_id=:user_id';
                $update_user_set = $pdo->prepare($update_user_query);
                $update_user_set->execute(
                    array(
                        ':attempt' =>$attempt,
                        ':user_id' =>$found_user_id
                    )
                );
                $attempts_left = 3 - $attempt;
                return 'Password incorrect '.$attempts_left.' attempts left before account locked.';
        }
//! user not found in DB
        }else{
            //? This is invalid attempt, reject this mf
            return 'Try again';
        }
    }
}
//! login successful if session user id is set
function confirm_logged_in() 
{
    if (!isset($_SESSION['user_id'])) {
        redirect_to('admin_login.php');
    }
}
//!logout
function logout()
{
    session_destroy();

    redirect_to('admin_login.php');
}
