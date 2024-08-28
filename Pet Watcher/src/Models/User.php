<?php

namespace src\Models;

use DateTime;
use src\Services\Hydratation;

class User {

    private int $id_user;
    private string $lastname;
    private string $firstname;
    private string $mail;
    private string $password;
    private int $id_role = 1;
    private int $activated = 0;
    private DateTime $dtm_created;

    use Hydratation;

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

    /**
     * Get the value of lastname
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of firstname
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     */
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of mail
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     */
    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of id_role
     */
    public function getIdRole(): int
    {
        return $this->id_role;
    }

    /**
     * Set the value of id_role
     */
    public function setIdRole(int $id_role): self
    {
        $this->id_role = $id_role;

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

    /**
     * Get the value of activated
     */
    public function getActivated(): int
    {
        return $this->activated;
    }

    /**
     * Set the value of activated
     */
    public function setActivated(int $activated): self
    {
        $this->activated = $activated;

        return $this;
    }
}