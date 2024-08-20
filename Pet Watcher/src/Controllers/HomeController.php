<?php

namespace src\Controllers;

use src\Services\Reponse;

class HomeController
{
  use Reponse;

  public function index(): void
  {
    $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
    $this->render('accueil', ['erreur' => $erreur]);
  }

  public function auth(string $password): void
  {
    if ($password === 'admin') {
      $_SESSION['connecté'] = TRUE;
      header('location: ' . HOME_URL . 'dashboard');
      die();
    } else {
      header('location: ' . HOME_URL . '?erreur=connexion');
    }
  }

 
  public function quit(): void
  {
    session_destroy();
    header('location: ' . HOME_URL);
  }


  public function isAuth(): bool
  {
    if (isset($_SESSION['connecté'])) {
      return true;
    } else {
      return false;
    }
  }


  public function page404(): void
  {
    header("HTTP/1.1 404 Not Found");
    echo "La page est introuvable.";
  }
}
