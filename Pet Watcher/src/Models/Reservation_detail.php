<?php

namespace src\Models;

use DateTime;
use src\Services\Hydratation;

class Reservation_detail {

    private int $id_reservation_detail;
    private int $quantity;
    private int $id_reservation;
    private int $id_pet;
    private DateTime $dtm_created;

    use Hydratation;

    /**
     * Get the value of id_reservation_detail
     */
    public function getIdReservationDetail(): int
    {
        return $this->id_reservation_detail;
    }

    /**
     * Set the value of id_reservation_detail
     */
    public function setIdReservationDetail(int $id_reservation_detail): self
    {
        $this->id_reservation_detail = $id_reservation_detail;

        return $this;
    }

    /**
     * Get the value of quantity
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

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
     * Get the value of id_pet
     */
    public function getIdPet(): int
    {
        return $this->id_pet;
    }

    /**
     * Set the value of id_pet
     */
    public function setIdPet(int $id_pet): self
    {
        $this->id_pet = $id_pet;

        return $this;
    }

            /**
     * Get the value of dtm_created
     */
    public function getDtmCreated(): string
    {
        return $this->dtm_created->format('Y-m-d');
    }

    /**
     * Set the value of dtm_created
     */
    public function setDtmCreated(string|DateTime $dtm_created): void
    {
        if($dtm_created instanceof DateTime) {
            $this->dtm_created = $dtm_created;
        }
        else {
            $this->dtm_created = new DateTime($dtm_created);
        }
    }
}