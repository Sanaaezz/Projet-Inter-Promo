<?php

use src\Services\Routing;
use src\Controllers\HomeController;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];

$HomeController = new HomeController;

$routeComposee = Routing::routeComposee($route);

switch ($route) {
    case HOME_URL:
        $HomeController->index();
        break;
    case HOME_URL . 'login':
        $HomeController->to_login();
        break;
    case HOME_URL . 'register':
        switch ($methode) {
            case 'GET' :
                $HomeController->to_register();
                break;
            case 'POST' :
                $UserController->register();
                break;
        }
        break;
    case HOME_URL . 'deconnexion':
        $HomeController->deconnexion();
        break;
    default :
        $HomeController->not_found();
        break;
}
