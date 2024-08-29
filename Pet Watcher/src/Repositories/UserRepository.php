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

    public static function getInstance(Database $db): self {
        return new self($db);
    }

    public function createUser (User $user) {
        $sql = "INSERT INTO ".PREFIXE."user(lastname, firstname, mail, password) VALUES (:lastname, :firstname, :mail, :password);";
        $statement = $this->DB->prepare($sql);
        $retour = $statement->execute([
            ":lastname" => $user->getLastname(),
            ":firstname" => $user->getFirstname(),
            ":mail" => $user->getMail(),
            ":password" => $user->getPassword()
        ]);
        return $retour;
    }

    public function getAllUser (): array {
        $sql = "SELECT * FROM ".PREFIXE."user;";
        $statement = $this->DB->prepare($sql);
        $statement->execute();
        $retour = $statement->fetchAll(PDO::FETCH_ASSOC);
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

    public function getThisUserByMail (string $mail): bool|User {
        $sql = "SELECT * FROM ".PREFIXE."user WHERE mail = :mail;";
        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ":mail" => $mail
        ]);
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
        $retour = $statement->fetch();
        if($retour) {
            return $retour;
        }
        else {
            return FALSE;
        }
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
            $sql = "SELECT * FROM ".PREFIXE."user WHERE mail = :mail LIMIT 1;";
            $statement = $this->DB->prepare($sql);
            $statement->execute([
                ":mail" => $mail,
            ]);

            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if($result) {
                $user = new User();
                $user->setIdUser($result['id_user']);
                $user->setLastname($result['lastname']);
                $user->setFirstname($result['firstname']);
                $user->setMail($result['mail']);
                $user->setPassword($result['password']);
                $user->setIdRole($result['id_role']);
                $user->setActivated($result['activated']);
                $user->setDtmCreated($result['dtm_created']);
            }

            if (password_verify($password, $result['password'])) {
                return $user;
            } else {
                return null;
            }
        } catch (PDOException $error) {
            throw new \Exception("Database error: " . $error->getMessage());
        }
    }

    public function deleteThisUser (int $id_user): bool {
        try {
            $this->DB->beginTransaction();
            $sql_detail = "DELETE FROM ".PREFIXE."reservation_detail 
                        INNER JOIN ".PREFIXE."reservation ON ".PREFIXE."reservation_detail.id_reservation = ".PREFIXE."reservation.id_reservation
                        WHERE ".PREFIXE."reservation.id_user = :id_user;";
            $statement_detail = $this->DB->prepare($sql_detail);
            $retour_detail = $statement_detail->execute([
                ":id_user" => $id_user
            ]);
            if($retour_detail) {
                $sql_resa = "DELETE FROM ".PREFIXE."reservation WHERE id_user = :id_user;";
                $statement_resa = $this->DB->prepare($sql_resa);
                $retour_resa = $statement_resa->execute([
                    ":id_user" => $id_user
                ]);
                if($retour_resa) {
                    $sql = "DELETE FROM ".PREFIXE."user WHERE id_user = :id_user;";
                    $statement = $this->DB->prepare($sql);
                    $retour = $statement->execute([
                        ":id_user" => $id_user
                    ]);
                    if ($retour) {
                        $this->DB->commit();
                        return TRUE;
                    } 
                    else {
                        $this->DB->rollBack();
                        return FALSE;
                    }
                }
                else {
                    $this->DB->rollBack();
                    return FALSE;
                }
            }
            else {
                $this->DB->rollBack();
                return FALSE;
            }
        }
        catch (PDOException $error) {
            $this->DB->rollBack();
            throw new \Exception("Database error: " . $error->getMessage());
        }
    }
}