<?php

namespace src\Repositories;

use DateTime;
use PDO;
use src\Models\Database;
use src\Models\Reservation_detail;

class ReservationDetailRepository {
    private $DB;

    private function __construct() {
        $database = new Database();
        $this->DB = $database->getDB();
        require_once __DIR__.'/../../config.php';
    }

    public static function getInstance(Database $db): self {
        return new self($db);
    }

    public function createReservationDetail (Reservation_detail $reservation_detail) {
        $sql = "INSERT INTO ".PREFIXE."reservation_detail VALUES (NULL,?,?,?);";
        $statement = $this->DB->prepare($sql);
        $retour = $statement->execute([
            $reservation_detail->getQuantity(),
            $reservation_detail->getIdReservation(),
            $reservation_detail->getIdPet()
        ]);
        return $retour;
    }

    public function getRemainingSlots(DateTime $dtm_start, DateTime $dtm_end): array {
        $sql = "
        WITH RECURSIVE date_range AS (
            SELECT :dtm_start AS date
            UNION ALL
            SELECT DATE_ADD(date, INTERVAL 1 DAY) 
            FROM date_range
            WHERE date < :dtm_end
        )
        SELECT 
            dr.date,
            ".PREFIXE."pet.type,
            ".PREFIXE."pet.max - COALESCE(SUM(".PREFIXE."reservation_detail.quantity), 0) AS remaining
        FROM 
            date_range dr
        CROSS JOIN 
            ".PREFIXE."pet
        LEFT JOIN 
            ".PREFIXE."reservation_detail ON ".PREFIXE."pet.id_pet = ".PREFIXE."reservation_detail.id_pet
        LEFT JOIN 
            ".PREFIXE."reservation ON ".PREFIXE."reservation_detail.id_reservation = ".PREFIXE."reservation.id_reservation
            AND dr.date BETWEEN DATE(".PREFIXE."reservation.dtm_start) AND DATE(".PREFIXE."reservation.dtm_end)
        GROUP BY 
            dr.date, ".PREFIXE."pet.type, ".PREFIXE."pet.max
        ORDER BY 
            dr.date, ".PREFIXE."pet.type
        ";
        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ':dtm_start' => $dtm_start->format('Y-m-d'),
            ':dtm_end' => $dtm_end->format('Y-m-d')
        ]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}