<?php

declare(strict_types = 1);

namespace Domain\Entity;

/**
 * Class Bear
 * @package Domain\Entity
 */
class Bear extends Entity
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $danger_level;

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
        $this->slug = (str_slug($name));

        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

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
    public function getDangerLevel(): int
    {
        return $this->danger_level;
    }

    /**
     * @param int $danger_level
     * @return self
     */
    public function setDangerLevel(int $danger_level): self
    {
        $this->danger_level = $danger_level;
        return $this;
    }
}
