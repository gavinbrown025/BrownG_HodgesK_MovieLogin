<?php

function createUser($user_data)
{
    //?return var_export($user_data, true);

    //! sql query to insert user
    $pdo = Database::getInstance()->getConnection();

    $create_user_query ='INSERT INTO tbl_user(user_fname, user_name, user_pass, user_email, locked)';
    $create_user_query .= ' VALUES(:name, :username, :password, :email, 0)';

    $create_user_set = $pdo->prepare($create_user_query);
    $create_user_result = $create_user_set->execute(
        array(
            ':name' => $user_data['fname'],
            ':username' => $user_data['username'],
            ':password' => $user_data['password'],
            ':email' => $user_data['email']
        )
    );

    //! redirect to index if sucessfull || return error
    //! new message to welcome new user?

    if($create_user_result){
            $email_to = $_POST['email'];
            $email_subject = "Welcome " . $_POST['fname'];
            $email_message = "Welcome to Roku
            
            Your username and password are :" . $_POST['username'] . " / " . $_POST['rand_pass'] 
            .PHP_EOL.
            
            
            "Please visit http://localhost/BrownG_HodgesK_MovieLogin/admin/admin_login.php to login.";
            $email_headers = array(     
            'From'=>'noreply@roku.ca',     
            'Reply-To'=>'accounts@roku.ca');  
            
        mail($email_to, $email_subject, $email_message, $email_headers);
        redirect_to('index.php');
    } else {
        return 'invalid';
    }
}