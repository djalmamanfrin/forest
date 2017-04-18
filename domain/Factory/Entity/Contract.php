<?php

declare(strict_types = 1);

namespace Domain\Factory\Entity;

/**
 * Class Contract
 * @package Domain\Factory
 */
interface Contract
{
    public static function createFromArray(array $data);
}
