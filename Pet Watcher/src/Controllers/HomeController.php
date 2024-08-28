<?php

namespace src\Controllers;

use src\Services\Reponse;


class HomeController {
    use Reponse;

    public function index() :void {
        $error = isset($_GET['error']) ? $_GET['error'] : '';
        $this->render("accueil", ["error" => $error]);
    }

    public function to_login() :void {
        $error = isset($_GET['error']) ? $_GET['error'] : '';
        $this->render("login", ["error" => $error]);
    }

    public function to_register() :void {
        $error = isset($_GET['error']) ? $_GET['error'] : '';
        $this->render("register", ["error" => $error]);
    }

    public function to_reservation() :void {
        $error = isset($_GET['error']) ? $_GET['error'] : '';
        $this->render("reservation", ["error" => $error]);
    }

    public function to_reservationDetail() :void {
        $error = isset($_GET['error']) ? $_GET['error'] : '';
        $this->render("reservationDetail", ["error" => $error]);
    }

    public function to_this_reservation() :void {
        $error = isset($_GET['error']) ? $_GET['error'] : '';
        $this->render("showReservation", ["error" => $error]);
    }

    public function pageDashboard():void {
        if(isset($_GET['error'])) {
            $error = htmlspecialchars($_GET['error']);
        } 
        else {
            $error = '';
        }
        $this->render("dashboard", ["error"=>$error]);
    }

    public function deconnexion() :void {
        session_start();
        session_unset();
        session_destroy();
        header("Location: " . HOME_URL);
        exit();
    }

    public function not_found():void {
        http_response_code(404);
        echo "Page not found";
    }
}
