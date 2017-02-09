<?php

declare(strict_types = 1);

namespace Domain\Entity;

/**
 * Class Fish
 * @package Domain\Entity
 */
class Fish extends Entity
{
    /**
     * @var int
     */
    private $weight;

    /**
     * @var Bear
     */
    private $bear;

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     * @return self
     */
    public function setWeight(int $weight): self
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return Bear
     */
    public function getBear(): Bear
    {
        return $this->bear;
    }

    /**
     * @param Bear $bear
     * @return self
     */
    public function setBear(Bear $bear): self
    {
        $this->bear = $bear;
        return $this;
    }
}
