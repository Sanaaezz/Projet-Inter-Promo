<?php

namespace src\Controllers;

use src\Models\User;
use src\Repositories\UserRepository;
use src\Services\Reponse;
use src\Services\Securite;

class UserController {
    use Reponse;
    use Securite;

    public function register() {
        $data = !empty($_POST) ? self::sanitize($_POST) : self::sanitize(json_decode(file_get_contents("php://input")));

        $user = new User($data);

        if (
            $user->getFirstname() &&
            $user->getLastname() &&
            $user->getMail() &&

            isset($data['password']) && isset($data['password2']) &&
            $data['password'] === $data['password2'] &&

            filter_var($user->getMail(), FILTER_VALIDATE_EMAIL)
        ) {
            $UserRepo = new UserRepository;
            $userExistant = $UserRepo->getThisUserByMail($user->getMail());
            if (!$userExistant) {
                $user->setPassword(password_hash($data['password'], PASSWORD_DEFAULT));
                $UserRepo = new UserRepository;
                $UserRepo->createUser($user);
                header('Location: '.HOME_URL);
                exit;
            } 
            else {
                return ['echec' => "Email déjà utilisé, veuillez vous connecter."];
            }
        }
    }

    public function login() {
        if (isset($_POST['mail']) && isset($_POST['password'])){
            $UserRepo = new UserRepository;

            $user = $UserRepo->login($_POST['mail'], $_POST['password']);

            if ($user) {
              $_SESSION['connecté'] = true;
              $_SESSION['user'] = serialize($user);

              header('location: '.HOME_URL.'dashboard');
              exit;
            } else {
              header('location: '.HOME_URL.'connexion?erreur=denied');
            }
          }
    }

}

