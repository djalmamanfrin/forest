<?php

declare(strict_types = 1);

namespace Domain\Entity;

/**
 * Class Tree
 * @package Domain\Entity
 */
class Tree extends Entity
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $age;

    /**
     * @var Bear
     */
    private $bear;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return self
     */
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     * @return self
     */
    public function setAge(int $age): self
    {
        $this->age = $age;
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
