<?php
namespace src\Controllers;

use src\Models\Database;
use src\Models\User;
use src\Repositories\UserRepository;
use src\Services\Reponse;

class UserControllers{

  use Reponse;

  public function Login()
  {
    $data = file_get_contents("php://input");
    $user = (json_decode($data, true));
    if (!empty($user)) {
      $obj = new User($user);
      $mail = $obj->getMail();
      if (isset($mail) && !empty($mail)) {
        $mail = htmlspecialchars($mail);
      }
      $password = $obj->getPassword();
      if (isset($password) && !empty($password)) {
        $password = hash("whirlpool", $password);
      }
      $DbConnexion = new Database();
      $UserRepository = new UserRepository($DbConnexion);
      if ($UserRepository->login($mail, $password)) {
        $_SESSION["connected"] = TRUE;
        $_SESSION["user"] = serialize($UserRepository->getThisUserById($mail));
        echo HOME_URL . 'dashboard';
        die();
      } else {
        header('location: ' . HOME_URL . '?erreur=connexion');
        die();
      }
    }
  }

  public function Registeration(){

    $data = file_get_contents("php://input");
    $userTableau = (json_decode($data, true));

    if (!empty($userTableau)) {
      $userObjet = new User($userTableau);

      $lastName = $userObjet->getLastname();
      $firstName = $userObjet->getFirstname();
      $email = $userObjet->getMail();
      $password = $userObjet->getPassword();

      if (isset($lastName) && !empty($lastName)) {
        $lastName = htmlspecialchars($lastName);
      }
      if (isset($firstName) && !empty($firstName)) {
        $firstName = htmlspecialchars($firstName);
      }
      if (isset($email) && !empty($email)) {
        $email = htmlspecialchars($email);
      }
      if (isset($password) && !empty($password)) {
        $password = hash("whirlpool", $password);
      }

      $dbConnexion = new Database();
      $UserRepository = new UserRepository($dbConnexion);

      if ($UserRepository->getThisUserById($email)) {
        header('location: ' . HOME_URL . '?erreur=alreadyUsed');
        die();
      } else {
        if ($UserRepository->createUser($userObjet)) {
          echo HOME_URL;
          die();
        } else {
          header('location: ' . HOME_URL . '?erreur=enregistrement');
          die();
        }
      }
    }
  }
  

}
