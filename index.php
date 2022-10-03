<?php

declare(strict_types=1);

use Andrejus\AdsWebsiteAuto\Controller\AuthController;
use Andrejus\AdsWebsiteAuto\Controller\ListController;
use Andrejus\AdsWebsiteAuto\Router;

require 'vendor/autoload.php';

session_start();

$router = new Router();
$router->add('GET', '/list', function () {
    (new ListController())->showList();
});

$router->add('GET', '/login', function () {
    (new AuthController())->showLogin();
});

$router->add('POST', '/login', function () {
    (new AuthController())->handleLogin();
});

$router->add('GET', '/registration', function () {
    (new AuthController())->showRegistration();
});

$router->add('POST', '/registration', function () {
    (new AuthController())->handleRegistration();
});

$router->add('GET', '/view/style.css', function () {
    require './view/style.css';
    header('Content-Type: text/css');
});

$router->add('GET', '/', function () {
    require './view/page.php';
});

$router->route($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);