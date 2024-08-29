<?php

namespace src\Controllers;

use DateTime;
use src\Models\Database;
use src\Models\Reservation;
use src\Repositories\ReservationDetailRepository;
use src\Repositories\ReservationRepository;
use src\Services\Reponse;
use src\Services\Securite;

class ReservationController {

    use Reponse;
    use Securite;

    public function reservation() {
        parse_str(file_get_contents("php://input"), $data);
        $data = self::sanitize($data);

        $reservation = new Reservation($data);

        $DbConnexion = new Database();
        $reservationRepository = ReservationRepository::getInstance($DbConnexion);
        $retour = $reservationRepository->createReservation($reservation);

        if($retour) {
            $reservationDetailRepository = ReservationDetailRepository::getInstance($DbConnexion);
            $dtm_start = new DateTime($retour->getDtmStart());
            $dtm_end = new DateTime($retour->getDtmEnd());
            $freeSpace = $reservationDetailRepository->getRemainingSlots($dtm_start, $dtm_end);
            $_SESSION['reservation'] = serialize($retour);
            $_SESSION['freeSpace'] = serialize($freeSpace);
            $this->render("reservationDetail");
        }
    }

    public function reservationDetail() {

    }
}