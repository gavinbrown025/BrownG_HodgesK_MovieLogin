<?php

function login($username, $password, $ip){

    $pdo = Database::getInstance()->getConnection();

    $get_user_query = 'SELECT * FROM tbl_user WHERE user_name =:username AND user_pass =:password ';

    $user_set = $pdo->prepare($get_user_query);
    $user_set->execute(
        array(
            ':username'=>$username,
            ':password'=>$password
        )
    );

    if($found_user = $user_set->fetch(PDO::FETCH_ASSOC)){
        //* we found user in the db, get him in
        $found_user_id = $found_user['user_id'];

        //* write the username and id into session
        $_SESSION['user_id'] = $found_user_id;
        $_SESSION['user_name'] = $found_user['user_name'];

        //* update the user IP by the current logged in one
        $update_user_query = 'UPDATE tbl_user SET user_ip= :user_ip, user_date = now() WHERE user_id = :user_id';
        $update_user_set = $pdo->prepare($update_user_query);
        $update_user_set->execute(
            array(
                ':user_ip'=> $ip,
                ':user_id'=> $found_user_id
                )
            );
        //* if valid redirect to index.php
        redirect_to('index.php');

    } else {
        //* reject invalid user
        return 'Username Invalid';
    }
}

function confirm_logged_in() {

    if(!isset($_SESSION['user_id'])){
        redirect_to('admin_login.php');
    }
}

function logout() {
    session_destroy();
    redirect_to('admin_login.php');
}