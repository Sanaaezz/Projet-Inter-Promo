<?php

namespace src\Repositories;

use DateTime;
use PDO;
use PDOException;
use src\Models\Database;
use src\Models\Reservation;

class ReservationRepository {
    private $DB;

    private function __construct() {
        $database = new Database();
        $this->DB = $database->getDB();
        require_once __DIR__.'/../../config.php';
    }

    public static function getInstance(Database $db): self {
        return new self($db);
    }

    public function createReservation(Reservation $reservation) {

        try {
            $sql = "INSERT INTO ".PREFIXE."reservation (dtm_start, dtm_end, comment, id_user) VALUES (:dtm_start, :dtm_end, :comment, :id_user);";
            $statement = $this->DB->prepare($sql);
            $retour = $statement->execute([
                ":dtm_start" => $reservation->getDtmStart(),
                ":dtm_end" => $reservation->getDtmEnd(),
                ":comment" => $reservation->getComment(),
                ":id_user" => $reservation->getIdUser(),
            ]);

            if ($retour === false) {
                throw new \RuntimeException("Erreur lors de l'exécution de la requête");
            }

            $lastInsertedId = $this->DB->lastInsertId();

            $reservationData = [
                'id_reservation' => $lastInsertedId,
                'dtm_start' => $reservation->getDtmStart(),
                'dtm_end' => $reservation->getDtmEnd(),
                'comment' => $reservation->getComment(),
                'id_user' => $reservation->getIdUser()
            ];
            
            return new Reservation($reservationData);

        } 
        catch (PDOException $error) {
            throw new \Exception("Database error: " . $error->getMessage());
        }
    }
    

    public function getThisReservationById (int $id_reservation):Reservation {
        $sql = "SELECT * FROM ".PREFIXE."reservation WHERE id_reservation = :id_reservation;";
        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ":id" => $id_reservation
        ]);
        $statement->setFetchMode(PDO::FETCH_CLASS, Reservation::class);
        $reservation = $statement->fetch();
        return $reservation;
    }

    public function getAllReservation(): array {
        try {
            $sql = "SELECT 
                    r.id_reservation,
                    r.dtm_start,
                    r.dtm_end,
                    r.comment,
                    r.id_user,
                    r.validated,
                    r.dtm_created,
                    u.lastname,
                    u.firstname,
                    u.mail
                FROM 
                    ".PREFIXE."reservation r
                INNER JOIN ".PREFIXE."user u ON r.id_user = u.id_user
                GROUP BY 
                    r.id_reservation,
                    r.dtm_start,
                    r.dtm_end,
                    r.comment,
                    r.id_user,
                    r.validated,
                    r.dtm_created,
                    u.lastname,
                    u.firstname,
                    u.mail
                ";
            $statement = $this->DB->prepare($sql);
            $statement->execute();
            $retour = $statement->fetchAll(PDO::FETCH_ASSOC);

            if (empty($retour)) {
                throw new \Exception("No reservation found");
            }
            return $retour;
        } catch (\PDOException $error) {
            throw new \Exception("Database error: " . $error->getMessage());
        }
    }

    public function getAllReservationByDate(DateTime $date): array {
        $sql = "SELECT * FROM ".PREFIXE."reservation WHERE :date BETWEEN dtm_start AND dtm_end;";
        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ':date' => $date->format('Y-m-d')
        ]);
        $reservations = $statement->fetchAll(PDO::FETCH_CLASS, Reservation::class);
        return $reservations;
    }

    public function getAllReservationByIdUser (int $id_user): array {
        $sql = "SELECT * FROM ".PREFIXE."reservation WHERE id_user = :id_user;";
        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ":id_user" => $id_user
        ]);
        $retour = $statement->fetchAll(PDO::FETCH_CLASS, Reservation::class);
        return $retour;
    }

    public function getAllDetailReservationByIdUser(int $id_user): array {
        try {
            $sql = "SELECT ".PREFIXE."reservation.*, ".PREFIXE."reservation_detail.*, ".PREFIXE."pet.type
                    FROM ".PREFIXE."reservation
                    LEFT JOIN ".PREFIXE."reservation_detail ON ".PREFIXE."reservation_detail.id_reservation = ".PREFIXE."reservation.id_reservation
                    LEFT JOIN ".PREFIXE."pet ON ".PREFIXE."pet.id_pet = ".PREFIXE."reservation_detail.id_pet
                    WHERE ".PREFIXE."reservation.id_user = :id_user;";
            $statement = $this->DB->prepare($sql);
            $statement->execute([
                ":id_user" => $id_user
            ]);
            $retour = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $retour;
        }
        catch (PDOException $error) {
            throw new \Exception("Database error: " . $error->getMessage());
        }
    }
    

    public function deleteThisReservation(int $id_reservation): bool {
        try {
            $this->DB->beginTransaction();

            $sql_detail = "DELETE FROM ".PREFIXE."reservation_detail WHERE id_reservation = :id_reservation;";
            $statement_detail = $this->DB->prepare($sql_detail);
            $retour_detail = $statement_detail->execute([
                ":id_reservation" => $id_reservation
            ]);

            if ($retour_detail) {
                $sql = "DELETE FROM ".PREFIXE."reservation WHERE id_reservation = :id_reservation;";
                $statement = $this->DB->prepare($sql);
                $retour = $statement->execute([
                    ":id_reservation" => $id_reservation
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
        catch (PDOException $error) {
            $this->DB->rollBack();
            throw new \Exception("Database error: " . $error->getMessage());
        }
    }

    public function updateThisReservation (Reservation $reservation) {
        try {
            $sql = "UPDATE ".PREFIXE."reservation SET
                        validated = :validated
                    WHERE id_reservation = :id_reservation;";
            $statement = $this->DB->prepare($sql);
            $retour = $statement->execute([
                ":validated" => $reservation->isValidated(),
                ":id_reservation" => $reservation->getIdReservation()
            ]);
            return $retour;
        } catch (PDOException $error) {
            throw new \Exception("Database error: " . $error->getMessage());
        }
    }
}