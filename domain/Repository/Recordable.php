<?php

declare(strict_types = 1);

namespace Domain\Repository;

use Domain\Entity\Contract as Entity;

/**
 * Class Recordable
 * @package Domain\Repository
 */
interface Recordable
{
    /**
     * @param Entity $entity
     * @return bool
     */
    public function create(Entity $entity): bool;

    /**
     * @param Entity $entity
     * @return bool
     */
    public function update(Entity $entity): bool;

    /**
     * @param Entity $entity
     * @return bool
     */
    public function delete(Entity $entity): bool;
}
