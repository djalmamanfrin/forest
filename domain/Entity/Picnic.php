<?php

declare(strict_types = 1);

namespace Domain\Entity;

/**
 * Class Picnic
 * @package Domain\Entity
 */
class Picnic extends Entity
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $taste_level;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getTasteLevel(): int
    {
        return $this->taste_level;
    }

    /**
     * @param int $taste_level
     * @return self
     */
    public function setTasteLevel(int $taste_level): self
    {
        $this->taste_level = $taste_level;
        return $this;
    }
}
