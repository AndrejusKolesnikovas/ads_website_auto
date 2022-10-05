<?php

declare(strict_types=1);

use Andrejus\AdsWebsiteAuto\Controller\AuthController;
use Andrejus\AdsWebsiteAuto\Controller\AdsController;
use Andrejus\AdsWebsiteAuto\Router;

require 'vendor/autoload.php';

session_start();

$router = new Router();
$router->add('GET', '/ads/list', function () {
    (new AdsController())->showList();
});

$router->add('GET', '/login', function () {
    (new AuthController())->showLogin();
});

$router->add('POST', '/login', function () {
    (new AuthController())->handleLogin();
});
$router->add('GET', '/logout', function () {
    (new AuthController())->logout();
});

$router->add('GET', '/registration', function () {
    (new AuthController())->showRegistration();
});

$router->add('POST', '/registration', function () {
    (new AuthController())->handleRegistration();
});
$router->add('GET', '/ads/create', function () {
    (new AdsController())->showCreateAds();
});
$router->add('POST', '/ads/create', function () {
    (new AdsController())->handleCreateAds();
});

$router->add('GET', '/view/style.css', function () {
    require './view/style.css';
    header('Content-Type: text/css');
});

$router->add('GET', '/', function () {
    require './view/page.php';
});

$router->route($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);