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

    public function getAllUser (): array {
        $sql = "SELECT * FROM ".PREFIXE."user;";
        $statement = $this->DB->prepare($sql);
        $statement->execute();
        $retour = $statement->fetchAll(PDO::FETCH_CLASS, User::class);
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

    public function updateThisUserRole (User $user) {
        try {
            $sql = "UPDATE ".PREFIXE."user SET
                        id_role = :id_role
                    WHERE id_user = :id_user;";
            $statement = $this->DB->prepare($sql);
            $retour = $statement->execute([
                ":id_role" => $user->getIdRole(),
                ":id_user" => $user->getIdUser()
            ]);
            return $retour;
        } catch (PDOException $error) {
            throw new \Exception("Database error: " . $error->getMessage());
        }
    }

    public function activateThisUser (User $user) {
        try {
            $sql = "UPDATE ".PREFIXE."user SET
                        activated = :activated
                    WHERE id_user = :id_user;";
            $statement = $this->DB->prepare($sql);
            $retour = $statement->execute([
                ":activated" => $user->getIdRole(),
                ":id_user" => $user->getIdUser()
            ]);
            return $retour;
        } catch (PDOException $error) {
            throw new \Exception("Database error: " . $error->getMessage());
        }
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