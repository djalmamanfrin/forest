<?php

declare(strict_types = 1);

namespace Domain\Repository\Eloquent;

use App\Models\Picnic;
use Domain\Entity\Contract as Entity;

/**
 * Class PicnicRepository
 * @package Domain\Repository\Eloquent
 */
class PicnicRepository extends Repository
{
    /**
     * @var Picnic
     */
    protected $model;

    /**
     * PicnicRepository constructor.
     * @param Picnic $model
     */
    public function __construct(Picnic $model)
    {
        $this->model = $model;
    }

    public function create(Entity $entity): bool
    {
        $this->model->name = $entity->getName();
        $this->model->taste_level = $entity->getTasteLevel();

        if ($save = $this->model->save()) {
            $entity->setId($this->model->id);
            $entity->setCreatedAt($this->model->created_at);
            $entity->setUpdated($this->model->updated_at);
        }

        return $save;
    }

    public function update(Entity $entity): bool
    {
        $model = $this->find($this->getId());

        $model->name = $entity->getName();
        $model->taste_level = $entity->getTasteLevel();

        if ($update = $model->save()) {
            $entity->setUpdated($model->updated_at);
        }

        return $update;
    }
}
