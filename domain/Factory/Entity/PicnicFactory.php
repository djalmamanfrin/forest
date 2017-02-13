<?php

declare(strict_types = 1);

namespace Domain\Factory\Entity;

use Carbon\Carbon;
use Domain\Entity\Picnic;

/**
 * Class PicnicFactory
 * @package Domain\Factory\Entity
 */
class PicnicFactory implements Contract
{
    public static function createFromArray(array $data): Picnic
    {
        $entity = new Picnic();

        if (isset($data['id'])) {
            $entity->setId($data['id']);
        }

        if (isset($data['name'])) {
            $entity->setName($data['name']);
        }

        if (isset($data['taste_level'])) {
            $entity->setTasteLevel($data['taste_level']);
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

    public static function createFromId(int $id): Picnic
    {
        return self::createFromArray([]);
    }
}
