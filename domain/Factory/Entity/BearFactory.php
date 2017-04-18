<?php

declare(strict_types = 1);

namespace Domain\Factory\Entity;

use Carbon\Carbon;
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

        if (isset($data['id'])) {
            $entity->setId($data['id']);
        }

        if (isset($data['name'])) {
            $entity->setName($data['name']);
        }

        if (isset($data['type'])) {
            $entity->setType($data['type']);
        }

        if (isset($data['danger_level'])) {
            $entity->setDangerLevel($data['danger_level']);
        }

        if (isset($data['created_at'])) {
            $entity->setCreatedAt(Carbon::createFromFormat('Y-m-d H:i:s', $data['created_at']));
        }

        if (isset($data['updated_at'])) {
            $entity->setUpdatedAt(Carbon::createFromFormat('Y-m-d H:i:s', $data['updated_at']));
        }

        if (isset($data['deleted_at'])) {
            $entity->setDeletedAt(Carbon::createFromFormat('Y-m-d H:i:s', $data['deleted_at']));
        }

        return $entity;
    }
}
