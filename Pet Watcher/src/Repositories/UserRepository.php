<?php
namespace src\Repositories;

use PDO;
use PDOException;
use src\Models\Database;
use src\Models\User;

class UserRepository {
    private $DB;

    private function __construct() {
        $database = new Database();
        $this->DB = $database->getDB();
        require_once __DIR__.'/../../config.php';
    }

    public function createUser (User $user) {
        $password = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        $sql = "INSERT INTO ".PREFIXE."user VALUES (NULL,?,?,?,?,?);";
        $statement = $this->DB->prepare($sql);
        $retour = $statement->execute([
            $user->getLastname(),
            $user->getFirstname(),
            $user->getMail(),
            $password,
            $user->getIdRole(),
        ]);
        return $retour;
    }

    public function getThisUserById (int $id_user): User {
        $sql = "SELECT * FROM ".PREFIXE."user WHERE id_user = :id;";
        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ":id" => $id_user
        ]);
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
        $retour = $statement->fetch();
        return $retour;
    }

    public function login(string $mail, string $password): ?User {
        try {
            $sql = "SELECT * FROM ".PREFIXE."user WHERE mail = :mail;";
            $statement = $this->DB->prepare($sql);
            $statement->execute([
                ":mail" => $mail,
            ]);

            $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
            $user = $statement->fetch();

            if ($user && password_verify($password, $user->getPassword())) {
                return $user;
            } else {
                return null;
            }
        } catch (PDOException $error) {
            throw new \Exception("Database error: " . $error->getMessage());
        }
    }
}