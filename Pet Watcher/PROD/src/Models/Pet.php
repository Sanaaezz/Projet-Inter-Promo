<?php

namespace src\Models;

use src\Services\Hydratation;

class Pet {

    private int $id_pet;
    private string $type;
    private int $max;

    use Hydratation;


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
     * Get the value of type
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set the value of type
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of max
     */
    public function getMax(): int
    {
        return $this->max;
    }

    /**
     * Set the value of max
     */
    public function setMax(int $max): self
    {
        $this->max = $max;

        return $this;
    }
}