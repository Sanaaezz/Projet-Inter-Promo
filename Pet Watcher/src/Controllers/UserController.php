<?php

namespace src\Controllers;

use src\Models\Database;
use src\Models\User;
use src\Repositories\UserRepository;
use src\Services\Reponse;
use src\Services\Securite;

class UserController {
    use Reponse;
    use Securite;

    public function register() {
        parse_str(file_get_contents("php://input") , $data);
        $data = self::sanitize($data);
        
        $user = new User($data);

        if (
            $user->getFirstname() &&
            $user->getLastname() &&
            $user->getMail() 

            // isset($data['password']) && isset($data['password2']) &&
            // $data['password'] === $data['password2'] &&

            // filter_var($user->getMail(), FILTER_VALIDATE_EMAIL)
        ) {
            $DbConnexion = new Database();
            $UserRepository = UserRepository::getInstance($DbConnexion);
            $userExistant = $UserRepository->getThisUserByMail($user->getMail());
            if ($userExistant == FALSE) {
                $user->setPassword(password_hash($data['password'], PASSWORD_DEFAULT));
                $UserRepository->createUser($user);
                $this->render("accueil", ["succes" => $_SESSION['succes']]);
                exit;
            } 
            else {
                return ['echec' => "Email déjà utilisé, veuillez vous connecter."];
            }
        }
    }

    public function login():void {
        $data = file_get_contents("php://input");
        parse_str($data, $user);

        if(!empty($user)) {
            $user = $this->sanitize($user);
            $email = $user['str_email'];
            $mdp = $user['str_mdp'];
            $DbConnexion = new Database();
            $UserRepository = UserRepository::getInstance($DbConnexion);
            $user = $UserRepository->login($email, $mdp);
            if($user){
                $_SESSION["connecte"] = TRUE;
                $_SESSION["user"] = serialize($user);
                $_SESSION['succes'] = "Vous êtes connecté";
                $this->render("dashboard",["succes" => $_SESSION['succes']]);
                die();
            } 
            else{
                $_SESSION["erreur"] = "Echec de connexion";
                $this->render('connexion', ["erreur" => $_SESSION["erreur"]]);
                die();
            }
        }
    }

}

