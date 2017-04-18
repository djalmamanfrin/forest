<?php

declare(strict_types = 1);

namespace Domain\Entity;

use Carbon\Carbon;

/**
 * Class Entity
 * @package Domain\Entity\Entity
 */
abstract class Entity implements Contract
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Carbon;
     */
    private $created_at;

    /**
     * @var Carbon
     */
    private $updated_at;

    /**
     * @var Carbon
     */
    private $deleted_at;

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }

    /**
     * @param Carbon $created_at
     * @return self
     */
    public function setCreatedAt(Carbon $created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->updated_at;
    }

    /**
     * @param Carbon $updated_at
     * @return self
     */
    public function setUpdatedAt(Carbon $updated_at): self
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return Carbon
     */
    public function getDeletedAt(): Carbon
    {
        return $this->deleted_at;
    }

    /**
     * @param Carbon $deleted_at
     * @return self
     */
    public function setDeletedAt(Carbon $deleted_at): self
    {
        $this->deleted_at = $deleted_at;
        return $this;
    }
}
