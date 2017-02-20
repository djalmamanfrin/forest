<?php

declare(strict_types = 1);

namespace Domain\Factory\Entity;

use Carbon\Carbon;
use Domain\Entity\Fish;

/**
 * Class FishFactory
 * @package Domain\Factory\Entity
 */
class FishFactory implements Contract
{
    public static function createFromArray(array $data): Fish
    {
        $entity = new Fish();

        if (isset($data['id'])) {
            $entity->setId($data['id']);
        }

        if (isset($data['weight'])) {
            $entity->setWeight($data['weight']);
        }

        if (isset($data['bear'])) {
            $entity->setBear(BearFactory::createFromArray($data['bear']));
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
