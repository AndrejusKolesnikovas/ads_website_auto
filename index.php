<?php

declare(strict_types=1);

use Andrejus\AdsWebsiteAuto\Controller\ListController;
use Andrejus\AdsWebsiteAuto\Controller\AuthController;

require 'vendor/autoload.php';

session_start();
$requestPath = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestPath === '/list') {
    $controller = new ListController();
    $controller->showList();
    die();
} else if ($requestPath === '/registration') {
    if ($requestMethod === 'GET') {
        $controller = new AuthController();
        $controller->showRegistration();
        die;
    } else if ($requestMethod === 'POST') {
        $controller = new AuthController();
        $controller->handleRegistration();
        die;

    } else {
        die('Unknown request type');
    }
} else if ($requestPath === '/login') {
    if ($requestMethod === 'GET') {

        $inner = './view/login.php';

    } else if ($requestMethod === 'POST') {
        $users = json_decode(file_get_contents('./data/user.json'), true);

        $_SESSION['logged_in'] = false;
        foreach ($users as $id => $user) {
            if ($user['email'] === $_POST['email']
                && password_verify($_POST['password'], $user['password'])) {

                /*
              issaugoti vartotojo duomenis i sesija. id ir ar prisijunges
              pvz.:
              $_SESSION['logged_in'] = true;
              $_SESSION['user_id'] = 1;
              */
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $id;

                header('Location: /list');
//                $inner = './view/list.php';
                die();

            }
        }
        die('Invalid username or password');


    }
} else if ($requestPath === '/view/style.css') {
    require './view/style.css';
    header('Content-Type: text/css');
    die;
}
require './view/page.php';