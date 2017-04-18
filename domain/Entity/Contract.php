<?php

declare(strict_types = 1);

namespace Domain\Entity;

use Carbon\Carbon;

/**
 * Class Contract
 * @package Domain\Entity
 */
interface Contract
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id);

    /**
     * @return Carbon
     */
    public function getCreatedAt(): Carbon;

    /**
     * @param Carbon $created_at
     * @return self
     */
    public function setCreatedAt(Carbon $created_at);

    /**
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon;

    /**
     * @param Carbon $updated_at
     * @return self
     */
    public function setUpdatedAt(Carbon $updated_at);

    /**
     * @return Carbon
     */
    public function getDeletedAt(): Carbon;

    /**
     * @param Carbon $deleted_at
     * @return self
     */
    public function setDeletedAt(Carbon $deleted_at);
}
