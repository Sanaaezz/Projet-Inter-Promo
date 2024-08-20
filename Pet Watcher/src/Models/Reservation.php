<?php

namespace src\Models;

use DateTime;
use src\Services\Hydratation;

class Reservation {

    private int $id_reservation;
    private DateTime $dtm_start;
    private DateTime $dtm_end;
    private string $comment;
    private int $id_user;

    use Hydratation;

    /**
     * Get the value of id_reservation
     */
    public function getIdReservation(): int
    {
        return $this->id_reservation;
    }

    /**
     * Set the value of id_reservation
     */
    public function setIdReservation(int $id_reservation): self
    {
        $this->id_reservation = $id_reservation;

        return $this;
    }

    /**
     * Get the value of dtm_start
     */
    public function getDtmStart(): string
    {
        return $this->dtm_start->format('Y-m-d');
    }

    /**
     * Set the value of dtm_start
     */
    public function setDtmStart(string|DateTime $dtm_start): void
    {
        if($dtm_start instanceof DateTime) {
            $this->dtm_start = $dtm_start;
        }
        else {
            $this->dtm_start = new DateTime($dtm_start);
        }
    }

    /**
     * Get the value of dtm_end
     */
    public function getDtmEnd(): string
    {
        return $this->dtm_end->format('Y-m-d');
    }

    /**
     * Set the value of dtm_end
     */
    public function setDtmEnd(string|DateTime $dtm_end): void
    {
        if($dtm_end instanceof DateTime) {
            $this->dtm_end = $dtm_end;
        }
        else {
            $this->dtm_end = new DateTime($dtm_end);
        }
    }

    /**
     * Get the value of comment
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     */
    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get the value of id_user
     */
    public function getIdUser(): int
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     */
    public function setIdUser(int $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }
}