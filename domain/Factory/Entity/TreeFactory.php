<?php

declare(strict_types = 1);

namespace Domain\Factory\Entity;

use Carbon\Carbon;
use Domain\Entity\Tree;

/**
 * Class TreeFactory
 * @package Domain\Factory\Entity
 */
class TreeFactory implements Contract
{
    public static function createFromArray(array $data): Tree
    {
        $entity = new Tree();

        if (isset($data['id'])) {
            $entity->setId($data['id']);
        }

        if (isset($data['age'])) {
            $entity->setAge($data['age']);
        }

        if (isset($data['type'])) {
            $entity->setType($data['type']);
        }

        if (isset($data['bear_id'])) {
            $entity->setBear(BearFactory::createFromId($data['bear_id']));
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
