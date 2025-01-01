<?php
    session_start();
    require_once '../vendor/autoload.php';

    $login = new App\classes\Login;
    $login->adminLogout();


