<?php

use src\Services\Routing;
use src\Controllers\HomeController;
use src\Controllers\ReservationController;
use src\Controllers\UserController;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];

$HomeController = new HomeController;
$UserController = new UserController;
$ReservationController = new ReservationController;

$routeComposee = Routing::routeComposee($route);

switch ($route) {
    case HOME_URL:
        $HomeController->index();
        break;
    case HOME_URL . 'login':
        switch ($methode) {
            case 'GET' :
                $HomeController->to_login();
                break;
            case 'POST' :
                $UserController->login();
                break;
        }
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

    case HOME_URL . 'dashboard' :
        $HomeController->pageDashboard();
        break;
    case HOME_URL . 'reservation' :
        switch ($methode) {
            case 'GET' :
                $HomeController->to_reservation();
                break;
            case 'POST' :
                $ReservationController->reservation();
                break;
        }
        break;
    case HOME_URL . 'reservationDetail' :
        switch ($methode) {
            case 'GET' :
                $HomeController->to_reservationDetail();
                break;
            case 'POST' :
                $ReservationController->reservationDetail();
                break;
        }
        break;
    case HOME_URL . 'reservation/{id_reservation}' :
        $HomeController->to_this_reservation($_GET['id_reservation']);
        break;
    case HOME_URL . 'deconnexion':
        $HomeController->deconnexion();
        break;
    default :
        $HomeController->not_found();
        break;
}
