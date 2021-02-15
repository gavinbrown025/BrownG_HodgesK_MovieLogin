<?php
    //!Turn off when Deploying 
    ini_set('display_errors', 1);

    define('ABSPATH', __DIR__);

    session_start();

    require_once ABSPATH.'/config/database.php';
    require_once ABSPATH.'/admin/scripts/read.php';
    require_once ABSPATH.'/admin/scripts/login.php';
    require_once ABSPATH.'/admin/scripts/functions.php';
    require_once ABSPATH.'/admin/scripts/user.php';