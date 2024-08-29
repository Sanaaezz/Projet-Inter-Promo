<?php

namespace src\Models;

use src\Services\Hydratation;

class Role {

    private int $id_role;
    private string $name;

    use Hydratation;


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
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}