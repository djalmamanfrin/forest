<?php

declare(strict_types = 1);

namespace Domain\Factory;

use Domain\Entity\Bear;

/**
 * Class BearFactory
 * @package Domain\Factory
 */
class BearFactory implements Contract
{
    public static function createFromArray(array $data): Bear
    {
        $entity = new Bear();

        return $entity;
    }
}
