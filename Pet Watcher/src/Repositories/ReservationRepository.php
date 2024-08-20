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

    public function createReservation (Reservation $reservation) {
        $sql = "INSERT INTO ".PREFIXE."reservation VALUES (NULL,?,?,?,?);";
        $statement = $this->DB->prepare($sql);
        $retour = $statement->execute([
            $reservation->getDtmStart(),
            $reservation->getDtmEnd(),
            $reservation->getComment(),
            $reservation->getIdUser(),
        ]);
        return $retour;
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

    public function getAllReservation ():array {
        $sql = "SELECT * FROM ".PREFIXE."reservation;";
        $statement = $this->DB->prepare($sql);
        $statement->execute();
        $retour = $statement->fetchAll(PDO::FETCH_CLASS, Reservation::class);
        return $retour;
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

    public function deleteThisReservation (int $id_reservation): bool {
        try {
            $sql = "DELETE FROM ".PREFIXE."reservation WHERE id_reservation = :id_reservation;";
            $statement = $this->DB->prepare($sql);
            $retour = $statement->execute([
                ":id_reservation" => $id_reservation
            ]);
            return $retour;
        }
        catch (PDOException $error) {
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