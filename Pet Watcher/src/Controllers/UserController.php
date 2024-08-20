<?php
namespace src\Controllers;

use src\Services\Reponse;

class UserControllers{

  use Reponse;

  public function Login()
  {
    $data = file_get_contents("php://input");
    $user = (json_decode($data, true));
    if (!empty($user)) {
      $obj = new User($user);
      $mail = $obj->getEmailUser();
      if (isset($mail) && !empty($mail)) {
        $mail = htmlspecialchars($mail);
      }
      $password = $obj->getPasswordUser();
      if (isset($password) && !empty($password)) {
        $password = hash("whirlpool", $password);
      }
      $DbConnexion = new Database();
      $UserRepository = new UserRepository($DbConnexion);
      if ($UserRepository->login($mail, $password)) {
        $_SESSION["connected"] = TRUE;
        $_SESSION["user"] = serialize($UserRepository->getThisUserByMail($mail));
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

      $lastName = $userObjet->getLastNameUser();
      $firstName = $userObjet->getFirstNameUser();
      $address = $userObjet->getAddressUser();
      $email = $userObjet->getEmailUser();
      $password = $userObjet->getPasswordUser();

      if (isset($lastName) && !empty($lastName)) {
        $lastName = htmlspecialchars($lastName);
      }
      if (isset($firstName) && !empty($firstName)) {
        $firstName = htmlspecialchars($firstName);
      }
      if (isset($address) && !empty($address)) {
        $address = htmlspecialchars($address);
      }
      if (isset($email) && !empty($email)) {
        $email = htmlspecialchars($email);
      }
      if (isset($password) && !empty($password)) {
        $password = hash("whirlpool", $password);
      }

      $dbConnexion = new Database();
      $UserRepository = new UserRepository($dbConnexion);

      if ($UserRepository->getThisUserByMail($email)) {
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
